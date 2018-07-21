<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thanh_vien extends Model
{
    protected $table='thanh_viens';
    protected $fillable=['user','pass','level'];
    public $timestamps=false; 
}
