<?php

namespace App\Http\Controllers;
use App\Models\anggota;
use Illuminate\Http\Request;


use App\Models\tahun_anggota;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
// use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminanggota',[
            'tahun_anggota'=>tahun_anggota::all()

        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('adminanggota-add',[
            'tahun_id'=>tahun_anggota::all()
          ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             $validatedData = $request->validate([
            'name' => 'required',
            'image'=>'image|file|mimes:jpg,png,jpeg,gif,svg',
            'tahun_id'=>'required'
        ]);
        $input = $request->all();
        $newName = '';
        if($request->file('image')){
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
        $request ->file('image')->storeAs('foto_anggota', $newName);
        $input['image'] = "$newName";
        }

        // $image =anggota::create($request->all());
        anggota::create($input);
        return redirect('/dashboard/anggota')->with('success', 'Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(tahun_anggota $anggotum)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(tahun_anggota $anggotum)
    {
        return view('adminanggota-add');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anggota $anggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(tahun_anggota $anggotum)
    {
                $tests = tahun_anggota::with('anggota')->find($anggotum);
        foreach ($tests as $test) {
        
        foreach ($test->anggota as $thumb) {
                $del  = public_path("storage/foto_anggota/{$thumb->image}");
            if (File::exists($del)) { 
                File::delete($del); 
            }   
        }        
    }
               tahun_anggota::destroy($anggotum->id);
        return redirect('/dashboard/anggota')->with('success', 'Berhasil Dihapus');

    }
        public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(anggota::class, 'slug', $request->name);
         return response()->json(['slug'=> $slug]);
    }
      public function detail(tahun_anggota $tahun_anggota){

 }
}
