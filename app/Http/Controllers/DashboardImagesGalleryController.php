<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardImagesGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(event $image)
    {
        $image = event::with('gallery')->find($image);
        return 
        view('admingallery-images',[
               'images' => $image,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        //
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
    public function destroy(gallery $image)
    {
            $delete  = public_path("storage/foto_gallery/{$image->image}");
            if (File::exists($delete)) { 
                File::delete($delete); 
            }
        gallery::destroy($image->id);
        return redirect('/dashboard/gallery')->with('success', 'Berhasil dihapus');

    }
}
