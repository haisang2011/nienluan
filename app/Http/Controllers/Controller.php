<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // function __construct(){
    //     $this->dangnhap();
    // }

    // function dangnhap(){
    //     view()->composer('*', function ($view) {
    //         if(Auth::check()){
    //             $view->with('auth', 'lalalal');
    //         }
    //     });
    // }
}
