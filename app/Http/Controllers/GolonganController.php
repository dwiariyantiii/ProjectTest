<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Golongan;

class GolonganController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $golongan = Golongan::where('IsActive', 1)->get();
        return response()->json(['success' => true, 'obj' => $golongan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $golongan = new Golongan;

        $golongan->Golongan = $request->Golongan;
        $golongan->Pangkat = $request->Pangkat;
        $golongan->CreatedBy = $request->CreatedBy;
        $golongan->UpdatedBy =$request->CreatedBy;
        $golongan->IsActive = TRUE;
       
        
        $save = $golongan->save();
        //Golongan::create($golongan);
      
        if($save)
        {
        return response()->json(['success' => true]);
        }
        else
        {
        return response()->json(['success' => false]);
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
        return response()->json(['success' => true, 'obj' => Golongan::FindOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(['success' => true, 'obj' => Golongan::FindOrFail($id)]);
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
        $golongan = Golongan::find($id);
        $golongan->Golongan = $request->Golongan;
        $golongan->Pangkat = $request->Pangkat;
        $save = $golongan->save();
        //Golongan::create($golongan);
      
        if($save)
        {
        return response()->json(['success' => true]);
        }
        else
        {
        return response()->json(['success' => false]);
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
         $golongan = Golongan::find($id);
         $golongan->IsActive = false;
         $save = $golongan->save();
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
