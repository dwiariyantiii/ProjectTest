<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
       'id' ,
       'NIP',
       'Nama',
       'Gelar',
       'Jabatan',
       'CreatedBy',
       'UpdatedBy',
       'IsActive',
       'GolonganID'

    ];
}
