<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dssv extends Model
{
    public $table = "dssv";

	protected $fillable = [
        'masv','ten','idlop' 
    ];
}
