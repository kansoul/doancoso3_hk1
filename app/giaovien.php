<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giaovien extends Model
{
    public $table = "giaovien";

	protected $fillable = [
        'name','email','password','chucvu'
    ];
}
