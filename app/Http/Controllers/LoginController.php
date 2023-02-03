<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
             public function login()
      {
   return view('login');
      }
      public function authenticating(Request $request)
      {
      $credentials = $request->validate([
               'username' => ['required'],
               'password' => ['required'],
         ]);
         if (Auth::attempt($credentials)) {

               $request->session()->regenerate();
   
               return redirect()->intended('admin');
         }
         Session::flash('status','filed' );
         Session::flash('massage','Login Invalid' );

         return redirect('login');
      }
   public function logout(Request $request)
   {
     Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('login');
   }
}
