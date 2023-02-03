<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\gallery;
use App\Models\imgyear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{

      public function gallery()
   {
      $tahun = imgyear::with('event')->get()->sortByDesc('tahun');
return view('gallery',[
   "title" => "Gallery Tonti",
   'tahun' => $tahun,
   
   'event' => event::all()
] ,  compact('tahun'));

   }
      public function show(event $event){
   return view('postgallery', [
   "title" => "Post Gallery",
   "gallery" => $event->gallery,
   "tanggal" => $event->tanggal,
   "tittle" => $event->nama_event,

   // "gallery" => gallery::all()
]);
}
}