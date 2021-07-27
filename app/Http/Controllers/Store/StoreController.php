<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth,Artisan,Cache,Session,DB,Redirect,Validator,Datatables,Storage,Str,File,Image;

class StoreController extends Controller
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

    public function index()
    {
        $qry = DB::table('stores')
                ->leftjoin('store_images','store_images.storeID','=','stores.idStore')
                ->leftjoin('users','users.departmentID','=','stores.idStore')
                ->where('users.id',Session::get("id"))
                ->select('storeName','storeCode','storeArea','storeType','storeAddress','storeMap','storePhone','storeEmail','storeGreeting','store_images.urlImage','store_images.altImage')
                ->get();
      
        $data = ['store' => $qry];
        return view('pages.store.index',$data);
    }
}
  