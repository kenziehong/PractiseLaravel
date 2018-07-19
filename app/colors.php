<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colors extends Model
{
    protected $table = 'colors';
    protected $fillable = ['name'];
    public function cars () {
    	return $this->belongsToMany('App\cars','car_colors');
    }
}
