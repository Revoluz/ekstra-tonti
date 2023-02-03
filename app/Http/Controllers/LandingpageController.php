<?php

namespace App\Http\Controllers;

use App\Models\dewantonti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingpageController extends Controller
{
      public function index(){
   return view('landingpage', [
   "title" => " BHAMAYOBA ",
   "dt" => dewantonti::all()
]);
}

}
