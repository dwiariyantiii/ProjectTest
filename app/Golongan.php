<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'golongan';
    public $timestamps = false;
    protected $fillable = [
       'id' ,
       'golongan',
       'pangkat',
       'isactive',
       'createddate',
       'createdby'

    ];
    public function pegawai()
    {
    return $this->hasMany(Pegawai::class,'id');
    }
}
