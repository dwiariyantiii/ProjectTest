<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Golongan;
use Carbon\Carbon;
use Auth;

class GolonganController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $golongan = Golongan::where('isactive', 1)->get();
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
     
        $user = 'dwi';
        $golongan->golongan = $request->golongan;
        $golongan->pangkat = $request->pangkat;
        $golongan->createdBy = $user;
        $golongan->updatedBy =$user;
        $golongan->createddate = Carbon::now();
        $golongan->updateddate = $golongan->createdate;
        $golongan->isactive = TRUE;
       
        
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
      
        $user = 'dwi';

        $golongan->golongan = $request->golongan;
        $golongan->pangkat = $request->pangkat;
        $golongan->updatedBy =$user;
        $golongan->updateddate = Carbon::now();
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
         $golongan->isactive = false;
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
