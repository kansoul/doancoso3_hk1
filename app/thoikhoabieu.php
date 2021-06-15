<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thoikhoabieu extends Model
{
    public $table = "thoikhoabieu";

	protected $fillable = [
        'monhoc_id','idlop','ngaythang','tiethoc'
    ];
}
