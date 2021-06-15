<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class monhoc extends Model
{
    public $table = "monhoc";

	protected $fillable = [
        'ten','giaovien'
    ];
}
