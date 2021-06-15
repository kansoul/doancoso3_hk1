<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dslop extends Model
{
    public $table = "dslop";

	protected $fillable = [
        'name','khoa' 
    ];
}
