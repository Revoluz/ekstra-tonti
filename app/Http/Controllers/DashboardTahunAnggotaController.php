<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\tahun_anggota;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardTahunAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminanggota-add');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminanggota-add-tahun');
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
            'masaAktifAnggota' => 'required|digits:4|unique:tahun_anggota',
            'slug' => 'required',

        ]);
        $request['slug'] = Str::slug($request->masaAktifAnggota);
        tahun_anggota::create($validatedData);
        return redirect('/dashboard/anggota')->with('success', 'Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tahun_anggota  $tahun_anggota
     * @return \Illuminate\Http\Response
     */
    public function show(tahun_anggota $tahun_anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tahun_anggota  $tahun_anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(tahun_anggota $tahun_anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tahun_anggota  $tahun_anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tahun_anggota $tahun_anggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tahun_anggota  $tahun_anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(tahun_anggota $tahun_anggota)
    {
        //
    }
        public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(tahun_anggota::class, 'slug', $request->masaAktifAnggota);
         return response()->json(['slug'=> $slug]);
    }
}
