<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tourform extends Model
{
    protected $table = 'tourforms';
    public $fillable = ['destination','name','email','handphone','departure','jml_orang','catatan'];
}
