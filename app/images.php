<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    protected $table='images';
    protected $filltable=['name','cate_id'];
    public $timestamps=false;
    public function product2(){//ten function phai trung ten bang
    	return $this->belongsTo('App\product2');
    }
    
}
