<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notadinas extends Model
{
    protected $table = 'notadinas';
    public $timestamps = false;
    protected $fillable = [
        'id' ,
        'instansitujuan' ,
        'instansipengirim' ,
        'nomorsurat' ,
        'tangalsurat' ,
        'sifatsurat'  ,
        'lampiran' ,
        'perihal' ,
        'deskripsi' ,
        'asalkota' ,
        'kotatujuan' ,
        'tanggalberangkat' ,
        'tanggalkembali' ,
        'file' ,
        'isactive' ,  
        'createddate' ,
        'createdby' ,
        'updateddate' ,
        'updatedby' ,
    ];
    public function notadinasdetail()
    {
    return $this->hasMany(Notadinasdetail::class,'id');
    }
}
