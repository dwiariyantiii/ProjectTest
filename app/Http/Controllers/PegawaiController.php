<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Golongan;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::where('IsActive',1)->get();
        return response()->json(['success' => true, 'obj' => $pegawai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongan = Golongan::where('IsActive', 1)->get();
        return response()->json(['success' => true, 'obj' => $golongan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawai = new Pegawai;
        $pegawai->NIP = $request->NIP;
        $pegawai->Nama = $request->Nama;
        $pegawai->Gelar = $request->Gelar;
        $pegawai->Jabatan = $request->Jabatan;
        $pegawai->GolonganID =$request->GolonganID;
        $pegawai->CreatedBy ="dwi";
        $pegawai->UpdatedBy ="dwi";
        $pegawai->IsActive = TRUE;

        $save = $pegawai->save();
        if($save)
        {
        return response()->json(['success' => true]);
        }
        else
        {
        return response()->json(['success' => false, "obj" => $pegawai]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['success' => true, 'obj' => Pegawai::FindOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(['success' => true, 'obj' => Pegawai::FindOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->NIP = $request->NIP;
        $pegawai->Nama = $request->Nama;
        $pegawai->Gelar = $request->Gelar;
        $pegawai->Jabatan = $request->Jabatan;
        $pegawai->GolonganID =$request->GolonganID;
        $pegawai->UpdatedBy ="dwi";        
        $save = $pegawai->save();
        if($save)
        {
        return response()->json(['success' => true]);
        }
        else
        {
        return response()->json(['success' => false, "obj" => $pegawai]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->IsActive = false;
        $save = $pegawai->save();
        if($save)
        {
        return response()->json(['success' => true]);
        }
        else
        {
        return response()->json(['success' => false]);
        }
    }
}
