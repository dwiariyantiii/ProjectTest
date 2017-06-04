<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
  
    protected $table = 'pegawai';
    public $timestamps = false;
    protected $fillable = [
       'id' ,
       'nip',
       'nama',
       'gelar',
       'jabatan',
       'golonganid',
       'isactive',
       'createddate',
       'createdby',
       'updateddate',
       'updatedby'

    ];
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'golonganid');
    }
}
