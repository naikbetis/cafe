<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Auth,Artisan,Cache,Session,DB,Redirect,Validator,Datatables,Storage,Str,File,Image;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request, $next) {
        if(Session::get("loggin") == false && empty(Session::get('loggin'))) {
            Auth::logout();
            Artisan::call('cache:clear');
            Redirect::to('/')->send();
        }
        return $next($request);
        });
    }



    
    public function index(){
        return view('pages.home');
    }
}
