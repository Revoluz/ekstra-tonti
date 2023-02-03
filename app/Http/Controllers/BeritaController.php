<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
      public function berita(){
   return view('berita', [
   "title" => "Berita",
   "posts" => berita::all()
]);
}
    public function show(berita $post)
    {
        return view('postnews', [
            "title" => "Berita",
            "post" => $post
        ]);
    }

}