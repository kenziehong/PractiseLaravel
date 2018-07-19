<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cars extends Model
{
    protected $table = 'cars';
    protected $fillable = ['name','price'];
    public function colors () {
    	return $this->belongsToMany('App\colors','car_colors');
	}
}  