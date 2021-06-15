<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diemdanh extends Model
{
    public $table = "diemdanh";

	protected $fillable = [
        'ngaythang','masv' ,'ten', 'lop', 'giaovien','monhoc','tinhtrang'
    ];
}
