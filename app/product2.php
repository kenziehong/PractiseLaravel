<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product2 extends Model
{
    protected $table='product2';
    protected $filltable=['id','intro','price','cate_id'];
    public $timestamps=false;
}
