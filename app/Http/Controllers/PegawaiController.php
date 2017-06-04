<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Golongan;
use Carbon\Carbon;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ///$pegawai = Pegawai::where('IsActive',1)->get();
        $pegawai = Pegawai::with('golongan')->where('isactive',1)->get();
        //$data = $pegawai->$golongan->$golongan;
        return response()->json(['success' => true, 'obj' => $pegawai]);
        //return view('golongan')->with('pegawai',$houses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongan = Golongan::where('isactive', 1)->get();
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
        $user = 'dwi';
        $pegawai->nip = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->gelar = $request->gelar;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->golonganid =$request->golonganid;
        $pegawai->createdby =$user;
        $pegawai->updatedby =$user;
        $pegawai->createddate = Carbon::now();
        $pegawai->updateddate = $pegawai->createdate;
        $pegawai->isactive = TRUE;

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
        
        return response()->json(['success' => true, 'obj' => Pegawai::with('golongan')->FindOrFail($id)]);
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
        $user = 'dwi';
        $pegawai->nip = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->gelar = $request->gelar;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->golonganid =$request->golonganid;
        $pegawai->updatedby =$user;
        $pegawai->updateddate = Carbon::now();     
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
        $pegawai->isactive = false;
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
