<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notadinas;
use App\Notadinasdetail;
use Carbon\Carbon;
use Auth;

class NotadinasController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $notadinas = Notadinas::where('isactive', 1)->get();
        return response()->json(['success' => true, 'obj' => $notadinas]);
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
        $notadinas = new Notadinas;       
     
        $user = 'dwi';
        $notadinas->instansitujuan = $request->SaveObj['instansitujuan'];
        $notadinas->instansipengirim = $request->SaveObj['instansipengirim'];
        $notadinas->nomorsurat = $request->SaveObj['nomorsurat'];
        $notadinas->tangalsurat =Carbon::parse($request->SaveObj['tangalsurat'])->format('Y-m-d');
        $notadinas->sifatsurat =$request->SaveObj['sifatsurat'];
        $notadinas->lampiran =$request->SaveObj['lampiran'];
        $notadinas->perihal =$request->SaveObj['perihal'];
        $notadinas->deskripsi =$request->SaveObj['deskripsi'];
        $notadinas->asalkota =$request->SaveObj['asalkota'];
        $notadinas->kotatujuan =$request->SaveObj['kotatujuan'];
        $notadinas->tanggalberangkat = Carbon::parse($request->SaveObj['tanggalberangkat'])->format('Y-m-d');
        $notadinas->tanggalkembali = Carbon::parse($request->SaveObj['tanggalkembali'])->format('Y-m-d');
        $notadinas->file =$request->SaveObj['file'];
        $notadinas->isactive = TRUE;
        $notadinas->createddate = Carbon::now();
        $notadinas->createdby = $user;
        $savenotadinas = $notadinas->save();

        $listnotadinasdetail = collect(new Notadinasdetail());
        $notadinasdetail = new Notadinasdetail;
        $notadinasdetail->notadinasid = $notadinas->id;
        $notadinasdetail->pegawaiid = $request->SaveObj['pegawaiid'];
        $notadinasdetail->isactive = true;
        $notadinasdetail->createddate = Carbon::now();
        $notadinasdetail->createdby = $user;
        $listnotadinasdetail->push($notadinasdetail);
        $savenotadinasdetail = $notadinas->notadinasdetail()->saveMany($listnotadinasdetail);

        if($savenotadinas && $savenotadinasdetail)
        {
        return response()->json(['success' => true, 'notadinas'=>$notadinas, 'notadinasdetail'=>$notadinasdetail]);
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
        return response()->json(['success' => true, 'obj' => Notadinas::FindOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(['success' => true, 'obj' => Notadinas::FindOrFail($id)]);
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
        $notadinas = Notadinas::find($id);
      
        $user = 'dwi';

        $notadinas->Notadinas = $request->Notadinas;
        $notadinas->pangkat = $request->pangkat;
        $notadinas->updatedBy =$user;
        $notadinas->updateddate = Carbon::now();
        $save = $notadinas->save();
        //Notadinas::create($notadinas);
      
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
         $notadinas = Notadinas::find($id);
         $notadinas->isactive = false;
         $save = $notadinas->save();
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
