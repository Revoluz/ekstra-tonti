<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminDtController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostnewsController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\DashboardDtController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\PostgalleryController;
use App\Http\Controllers\AdminAnggotaController;
use App\Http\Controllers\AdmingalleryController;
use App\Http\Controllers\DashboardEventController;
use App\Http\Controllers\DashboardBeritaController;
use App\Http\Controllers\DashboardAnggotaController;
use App\Http\Controllers\DashboardGalleryController;
use App\Http\Controllers\DashboardImgyearController;
use App\Http\Controllers\DashboardPostAnggotaController;
use App\Http\Controllers\DashboardPostGalleryController;
use App\Http\Controllers\DashboardTahunAnggotaController;
use App\Http\Controllers\DashboardImagesGalleryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[LandingpageController::class, 'index']);
// Route::get('/{slug}',[LandingpageController::class, 'show']);

Route::get('/anggota',[AnggotaController::class, 'anggota']);
Route::get('/anggota/{tahun_anggota:slug}',[AnggotaController::class, 'show']);

Route::get('berita',[BeritaController::class, 'berita']);
Route::get('/berita/{post:slug}',[BeritaController::class, 'show']);


Route::get('/gallery',[GalleryController::class, 'gallery']);
Route::get('/gallery/{event:slug}',[GalleryController::class, 'show']);

// Route::get('gallery/{slug}',[GalleryController::class, 'show']);

Route::get('profile',[ProfileController::class, 'profile']);

Route::get('postgallery',[PostgalleryController::class, 'postgallery']);
// Route::get('postgallery/{slug}',[PostgalleryController::class, 'show']);


Route::get('/admin',[UserController::class, 'admin'])->middleware('auth');
Route::get('login',[LoginController::class, 'login'])->name('login');
Route::post('login',[LoginController::class, 'authenticating']);
Route::get('logout',[LoginController::class, 'logout']);


Route::get('/dashboard/anggota/tahun/checkSlug',[DashboardTahunAnggotaController::class, 'checkSlug']);
Route::resource('/dashboard/anggota', DashboardAnggotaController::class)->middleware('auth');
Route::resource('/dashboard/anggota/postanggota', DashboardPostAnggotaController::class)->middleware('auth');


Route::resource('/dashboard/anggota/tahun', DashboardTahunAnggotaController::class)->middleware('auth');

Route::get('/dashboard/berita/checkSlug',[DashboardBeritaController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/berita', DashboardBeritaController::class)->middleware('auth');

Route::resource('/dashboard/DewanTonti', DashboardDtController::class)->middleware('auth');

Route::get('/dashboard/gallery/checkSlug',[DashboardGalleryController::class, 'checkSlug']);
Route::resource('/dashboard/gallery', DashboardGalleryController::class)->middleware('auth');
Route::resource('/dashboard/gallery/thumbnail', DashboardPostGalleryController::class)->middleware('auth');
Route::resource('/dashboard/gallery/images', DashboardImagesGalleryController::class)->middleware('auth');

Route::resource('/dashboard/gallery/year', DashboardImgyearController::class)->middleware('auth');







