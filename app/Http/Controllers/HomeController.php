<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HomeController extends BaseController
{
    public function showWelcome(){
    	return view('index');
    }

    // Laravel Khoa Pham

    public function testController(){
    	echo "Dang test Controller";
    	return redirect()->route("hcm");
    }
}
