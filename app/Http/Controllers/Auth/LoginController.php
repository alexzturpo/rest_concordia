<?php

namespace sisInventario\Http\Controllers\Auth;

use sisInventario\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath()
    {
      switch(auth()->user()->cargo){
        case 1:
        return '/almacen/producto';
        break;
        case 2:
        return '/cocinero/producto';
        break;
        case 3:
        return '/mesero2/orden';
        break;
      }
    }
}
