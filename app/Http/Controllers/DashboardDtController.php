<?php

namespace App\Http\Controllers;

use App\Models\dewantonti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardDtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admindt',[
    'dewantonti' => dewantonti::all()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admindt-add');
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
            'nama' => 'required',
            'foto'=>'image|file|mimes:jpg,png,jpeg,gif,svg',
            'jabatan'=>'required'
        ]);
        $input = $request->all();
        $newName = '';
        if($request->file('foto')){
        $extension = $request->file('foto')->getClientOriginalExtension();
        $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;
        $request ->file('foto')->storeAs('foto_dewantonti', $newName);
        $input['foto'] = "$newName";
        }

        // $image =anggota::create($request->all());
        dewantonti::create($input);
        return redirect('/dashboard/DewanTonti')->with('success', 'Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dewantonti  $dewantonti
     * @return \Illuminate\Http\Response
     */
    public function show(dewantonti $dewantonti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dewantonti  $dewantonti
     * @return \Illuminate\Http\Response
     */
    public function edit(dewantonti $DewanTonti)
    {
                return view('admindt-edit',[
            'dewantonti' => $DewanTonti
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dewantonti  $dewantonti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dewantonti $DewanTonti)
    {
        $rules = [
            'nama' => 'required',
            'foto'=>'image|file|mimes:jpg,png,jpeg,gif,svg',
            'jabatan'=>'required'
        ];
        $input =$request->validate($rules);
        $newName = '';
        if($request->file('foto')){
            if($DewanTonti->foto){
                $foto  = public_path("storage/foto_dewantonti/{$DewanTonti->foto}");
                if (File::exists($foto)) { 
                    File::delete($foto); 
                };
            }
        $extension = $request->file('foto')->getClientOriginalExtension();
        $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;
        $request ->file('foto')->storeAs('foto_dewantonti', $newName);
        $input['foto'] = "$newName";
        }
        dewantonti::where('id',$DewanTonti->id)->update($input);
        return redirect('/dashboard/DewanTonti')->with('success', 'Berhasil Ditambahkan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dewantonti  $dewantonti
     * @return \Illuminate\Http\Response
     */
    public function destroy(dewantonti $DewanTonti)
    {
        if($DewanTonti->foto){
                $foto  = public_path("storage/foto_dewantonti/{$DewanTonti->foto}");
                if (File::exists($foto)) { 
                    File::delete($foto); 
                };
            }
        dewantonti::destroy($DewanTonti->id);
        return redirect('/dashboard/DewanTonti')->with('success', 'Berhasil dihapus');
    }
}
