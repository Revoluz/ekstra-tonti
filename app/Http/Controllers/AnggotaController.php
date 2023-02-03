<?php

namespace App\Http\Controllers;

// use App\Models\anggota;
// use App\Models\anggota;
use App\Models\anggota;
use App\Models\tahun_anggota;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnggotaController extends Controller
{
      public function anggota()
   {
return view('anggota',[
   "title" => "Anggota Tonti",
   "posts" => anggota::all(),
   "tahun" => tahun_anggota::all()
   
]);
   }
      public function show(tahun_anggota $tahun_anggota){
   return view('postanggota', [
      "title" => "Anggota Tonti",
      "posts" => $tahun_anggota->anggota,
      "year" => $tahun_anggota,
      "tahun" => tahun_anggota::all()

   
   ]);
}
}