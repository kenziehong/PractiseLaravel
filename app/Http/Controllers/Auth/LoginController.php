<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Http\Requests\RegisterRequest;
// use App\User;
// use Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    // public function getRegistry(){
    //     return view('auth.register');

    // }
    // public function postRegistry(RegisterRequest $request){
    //     // echo $request->name; (khong chay duoc)

    //     $thanhvien = new User;
    //     $thanhvien->name= $request->name;
    //     $thanhvien->email=$request->email;
    //     $thanhvien->password=Hash::make($request->password);
    //     $thanhvien->remember_token=$request->_token;
    //     $thanhvien->save();

    // }
}
