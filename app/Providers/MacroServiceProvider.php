<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;
class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('cap',function($str){
            return Response::make(strtoupper($str));
        });

        Response::macro('contact', function($action){
            $contact='<form action="'.$action.'"   method="POST">
                Ho Ten <input type="text"/> <br />
                So dien thoai  <input type="text"/> <br />
            </form>';
            return $contact;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
