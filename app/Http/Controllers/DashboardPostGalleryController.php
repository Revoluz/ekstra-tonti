<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\gallery;
use App\Models\imgyear;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardPostGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(imgyear $thumbnail)
    {
        return $thumbnail;
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
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(imgyear $thumbnail)
    {
       $thumbnail = imgyear::with('event')->find($thumbnail);
    //    $thumbnail = imgyear::with('event')->orderBy('id', 'DESC')->find($thumbnail);
        return view('admingallery-thumbnail',[
               'tahun' => $thumbnail,
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $thumbnail)
    {
        $tahun_id= imgyear::all()->sortByDesc('tahun');

        return view('admingallery-edit',[
            'gallery' => $thumbnail,
            'tahun_id' => $tahun_id,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $thumbnail)
    {
      
        $rules = [
            'nama_event' => 'required',
            'gambar'=>'image',
            'image.*'=>'image',
            'tahun_id'=>'required',
            'tanggal'=>'required|date'
        ];

    $data = $request->all();
    if($request->slug != $thumbnail->slug){
            $rules['slug'] ='required|unique:event';
            // $event -> slug = $data['slug'];
        }
        $event =  event::find($thumbnail->id);
        $event -> nama_event = $data['nama_event'];
            $event -> slug = $data['slug'];
        if($request->file('gambar')){
        $extension = $request->file('gambar')->getClientOriginalExtension();
        $newName = $request->nama_event.'-'.now()->timestamp.'.'.$extension;
        $request ->file('gambar')->storeAs('foto_thumbnailgly', $newName);
        $data['gambar'] = "$newName";
        $event -> gambar = $data['gambar'];
        }
        $event -> tanggal = $data['tanggal'];
        $event -> tahun_id = $data['tahun_id'];
        $event ->save();
        // event::where('id',$thumbnail->id)->update($data);


        $gallery = new gallery;
        $data = $request->all();
            // dd($data);
        if($request->file('image')){
            foreach ($request->file('image') as $image) {
                $imageName = $data['nama_event'].'-image-'.time().rand(1,1000).'.'.$image->extension();
                $image ->storeAs('foto_gallery', $imageName);
                gallery::create([
                    'image'=>$imageName,
                    'event_id'=> $event -> id,
                ]);
                $gallery -> event_id = $event -> id;
            }
        }
        return redirect('/dashboard/gallery')->with('success', 'Berhasil Ditambahkan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $thumbnail)
    {
                $delete  = public_path("storage/foto_thumbnailgly/{$thumbnail->gambar}");
    if (File::exists($delete)) { 
        File::delete($delete); 
    }
        $tests = event::with('gallery')->find($thumbnail);
        foreach ($tests as $test) {
        
        foreach ($test->gallery as $thumb) {
                $del  = public_path("storage/foto_gallery/{$thumb->image}");
            if (File::exists($del)) { 
                File::delete($del); 
            }   
        }        
    }
            event::destroy($thumbnail->id);
        return redirect('/dashboard/gallery')->with('success', 'Berhasil dihapus');
    }
}
