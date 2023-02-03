<?php

namespace App\Http\Controllers;

use App\Models\imgyear;
use Illuminate\Http\Request;

class DashboardImgyearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admingallery');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admingallery-add-tahun');
        
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
            'tahun' => 'required|unique:imgyear',
            // 'slug' => 'required',

        ]);
        imgyear::create($validatedData);
        return redirect('/dashboard/gallery')->with('success', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\imgyear  $imgyear
     * @return \Illuminate\Http\Response
     */
    public function show(imgyear $imgyear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\imgyear  $imgyear
     * @return \Illuminate\Http\Response
     */
    public function edit(imgyear $imgyear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\imgyear  $imgyear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, imgyear $imgyear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\imgyear  $imgyear
     * @return \Illuminate\Http\Response
     */
    public function destroy(imgyear $imgyear)
    {
        //
    }
}
