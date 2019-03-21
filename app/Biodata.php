<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    public $table = 't_biodata';
    public $timestamps = false;
    protected $fillable = [
      'NIK', 'nama_lengkap', 'jenis_kelamin','alamat'
    ];
}
