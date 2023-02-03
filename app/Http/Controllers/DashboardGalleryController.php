<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\gallery;
use App\Models\imgyear;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun= imgyear::all()->sortByDesc('tahun');
        return view('admingallery',[
            'tahun' => $tahun,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admingallery-add',[
            'tahun_id'=>imgyear::all()
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
            'nama_event' => 'required',
            'slug' => 'required',
            // 'image'=>'required|image',
            'gambar'=>'required|image',
            'tahun_id'=>'required',
            'tanggal'=>'required'

        ]);
        $data = $request->all();

        // $data =  $validatedData;
        $event = new event;
        $event -> nama_event = $data['nama_event'];
        $event -> slug = $data['slug'];
        if($request->file('gambar')){
        $extension = $request->file('gambar')->getClientOriginalExtension();
        $newName = $request->nama_event.'-'.now()->timestamp.'.'.$extension;
        $request ->file('gambar')->storeAs('foto_thumbnailgly', $newName);
        $data['gambar'] = "$newName";
        }
        $event -> gambar = $data['gambar'];
        $event -> tanggal = $data['tanggal'];
        $event -> tahun_id = $data['tahun_id'];
        $event ->save();

        $data = $request->all();
        // $gallery = new gallery;
        // $data = $validatedData;
        // ddd($data);
        // $this->validate($request, [
        //     'images' => 'required',
        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            
        // ]);
        $gallery = new gallery;
        if($request->has('images')){
            foreach ($request->file('images') as $image) {
                $imageName = $data['nama_event'].'-image-'.time().rand(1,1000).'.'.$image->extension();
                $image ->storeAs('foto_gallery', $imageName);
                
                $data['image'] = $imageName;
                gallery::create([
                    'event_id'=> $event -> id,
                    'image'=>$imageName,
                    // dd($event)
                ]);
                // // $data['image'] = "$imageName";
                // // $gallery -> image = $data['image'];
                // // $gallery -> event_id = $event -> id;
                // // // gallery::create($);
                // // $gallery ->save();
            }
            // $gallery->image    = json_encode($data['image']);
            // $gallery->event_id = $event->id;
            // $gallery->save();
        }
        return redirect('/dashboard/gallery')->with('success', 'Berhasil Ditambahkan');


        // if($request->file('image')){
        //     foreach ($request->file('image') as $image) {
        //         $imageName = $data['nama_event'].'-image-'.time().rand(1,1000).'.'.$image->extension();
        //         $image ->storeAs('foto_gallery', $imageName);
                
        //         // gallery::create([
        //             // 'image'=>$imageName,
        //             // 'event_id'=> $event -> id,
        //         // ]);
        //         $data['image'] = "$imageName";
        //         $gallery -> image = $data['image'];
        //         $gallery -> event_id = $event -> id;
        //         // gallery::create($gallery);
        //         $gallery ->save();
        //     }
        // }
        // $extension = $request->file('image')->getClientOriginalExtension();
        // $newName = $request->nama_event.'-'.now()->timestamp.'.'.$extension;
        // $image ->file('image')->storeAs('foto_gallery', $newName);
        
        // $image = $request->all();


        // // $image =anggota::create($request->all());
        // gallery::create($image);
        // $gambar = $request->all();
        // $newName = '';
        // if($request->file('gambar')){
        // $extension = $request->file('gambar')->getClientOriginalExtension();
        // $newName = $request->slug.'-'.now()->timestamp.'.'.$extension;
        // $request ->file('gambar')->storeAs('foto_thumbnail', $newName);
        // $gambar['gambar'] = "$newName";
        // }

        // // $image =anggota::create($request->all());
        // event::create($gambar);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(imgyear $gallery)
    {
    // return $gallery;
    //  view('admingallery', [
    //     "title" => "Anggota Tonti",
    //     "event" => $event,
    //     'tahun_id'=>imgyear::all()

    // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(imgyear $gallery)
    {
            $year = imgyear::with('event')->find($gallery);
            foreach ($year as $tests) {
                foreach ($tests->event as $test) {
                $delete  = public_path("storage/foto_thumbnailgly/{$test->gambar}");
                if (File::exists($delete)) { 
                    File::delete($delete); 
                }
                    foreach ($test->gallery as $thumb) {
                            $del  = public_path("storage/foto_gallery/{$thumb->image}");
                        if (File::exists($del)) { 
                            File::delete($del); 
                        }   
                    }        
        }
    }
        imgyear::destroy($gallery->id);
        return redirect('/dashboard/gallery')->with('success', 'Berhasil Dihapus');

    }
        public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(event::class, 'slug', $request->nama_event);
        return response()->json(['slug'=> $slug]);
    }
}
