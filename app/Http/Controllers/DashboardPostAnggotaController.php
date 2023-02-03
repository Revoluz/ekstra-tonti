<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use Illuminate\Http\Request;
use App\Models\tahun_anggota;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DashboardPostAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tahun_anggota  $tahun_anggota
     * @return \Illuminate\Http\Response
     */
    public function show(tahun_anggota $postanggotum)
    {
        return view('adminanggota-detail', [
        "title" => "Anggota Tonti",
        "anggota" => $postanggotum->anggota,
        "test" => $postanggotum->anggota,
        "tahun" => $postanggotum

    
   ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tahun_anggota  $tahun_anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(anggota $postanggotum)
    {
        // return $postanggotum;
        return view('adminanggota-edit', [
        "title" => "Anggota Tonti",
        "anggota" => $postanggotum,
        'tahun_id'=>tahun_anggota::all()

    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tahun_anggota  $tahun_anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anggota $postanggotum)
    {
        $rules = [
            'name' => 'required',
            'image'=>'image|file|mimes:jpg,png,jpeg,gif,svg',
            'tahun_id'=>'required'
        ];
        $input =$request->validate($rules);
        $newName = '';
        if($request->file('image')){
            if($postanggotum->image){
                $foto  = public_path("storage/foto_anggota/{$postanggotum->image}");
                if (File::exists($foto)) { 
                    File::delete($foto); 
                };
            }
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
        $request ->file('image')->storeAs('foto_anggota', $newName);
        $input['image'] = "$newName";
        }
        anggota::where('id',$postanggotum->id)->update($input);
        return redirect('/dashboard/anggota')->with('success', 'Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tahun_anggota  $tahun_anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(anggota $postanggotum)
    {
            if($postanggotum->image){
                $foto  = public_path("storage/foto_anggota/{$postanggotum->image}");
                if (File::exists($foto)) { 
                    File::delete($foto); 
                };
            }
        anggota::destroy($postanggotum->id);
        return redirect('/dashboard/anggota')->with('success', 'Berhasil Dihapus');

    }
}
