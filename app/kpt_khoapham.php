<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kpt_khoapham extends Model
{
    protected $table = 'kpt_khoaphams';
    protected $fillable=['id','monhoc','giatien','giangvien','image'];
}
