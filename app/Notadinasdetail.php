<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notadinasdetail extends Model
{
    protected $table = 'notadinasdetail';
    public $timestamps = false;
    protected $fillable = [
         'id',
        'notadinasid',
        'pegawaiid',
        'isactive',  
        'createddate',
        'createdby',
        'updateddate',
        'updatedby'
    ];

    public function notadinas()
    {
        return $this->belongsTo(Notadinas::class, 'notadinasid');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawaiid');
    }
}
