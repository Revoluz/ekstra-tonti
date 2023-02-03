<?php

namespace App\Http\Controllers;
use App\Models\berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita=berita::orderBy('id','DESC')->latest()->get();
            return view('adminberita',compact('berita'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('adminberita-add');
            

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
            'judulBerita' => 'required',
            'slug' => 'required|unique:berita',
            'isiBerita' =>'required',
            'thumbnailImg'=>'required|image|file|mimes:jpg,png,jpeg,gif,svg'
        ]);
        $input = $request->all();
        $newName = '';
        if($request->file('thumbnailImg')){
        $extension = $request->file('thumbnailImg')->getClientOriginalExtension();
        $newName = $request->slug.'-'.now()->timestamp.'.'.$extension;
        $request ->file('thumbnailImg')->storeAs('berita', $newName);
        $input['thumbnailImg'] = "$newName";
        }

        // $image =berita::create($request->all());
        berita::create($input);
        return redirect('/dashboard/berita/')->with('success', 'Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(berita $beritum)
    {
            return view('adminberita-edit',[
            'berita' => $beritum
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, berita $beritum)
    {
        $rules = [
            'judulBerita' => 'required',
            'isiBerita' =>'required',
            'thumbnailImg'=>'image|file|mimes:jpg,png,jpeg,gif,svg'
        ];
        if($request->slug != $beritum->slug){
            $rules['slug'] ='required|unique:berita';
        }
        $input =$request->validate($rules);
        // $input = $request->all();
        if($request->file('thumbnailImg')){
            if($beritum->thumbnailImg){
                $thumbnail  = public_path("storage/berita/{$beritum->thumbnailImg}");
                if (File::exists($thumbnail)) { 
                    File::delete($thumbnail); 
                };
            }
        $extension = $request->file('thumbnailImg')->getClientOriginalExtension();
        $newName = $request->slug.'-'.now()->timestamp.'.'.$extension;
        $request ->file('thumbnailImg')->storeAs('berita', $newName);
        $input['thumbnailImg'] = "$newName";
        }
        berita::where('id',$beritum->id)->update($input);
        return redirect('/dashboard/berita')->with('success', 'Berhasil DiUpdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(berita $beritum)
    {
//            if(Storage::delete($beritum->thumbnailImg)) {
//       $beritum->delete();
//    }
        // if($beritum->thumbnailImg){
        // // Storage::delete($beritum->thumbnailImg);
        
        // }
        $thumbnail  = public_path("storage/berita/{$beritum->thumbnailImg}");
    if (File::exists($thumbnail)) { 
        File::delete($thumbnail); 
    }
        berita::destroy($beritum->id);
        return redirect('/dashboard/berita')->with('success', 'Berhasil dihapus');

    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(berita::class, 'slug', $request->judulBerita);
         return response()->json(['slug'=> $slug]);
    }
}
