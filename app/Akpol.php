<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akpol extends Model
{
    public $table = 't_akpol';
    public $timestamps = false;
    protected $fillable = [
      'dinas', 'keterangan'
    ];
}
