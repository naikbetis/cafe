<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Artisan,Session,DB,Auth,Redirect,Validator,Hash;

class AuthController extends Controller
{
    // Show Form Login
    public function index(){

        return view('login');
    }

    // Do Login
    public function authentication(Request $request){

        $rules = [
            'login'                 => 'required|string',
            'password'              => 'required',
        ];

        $messages = [
            'login.required'        => 'Email/Username field is required',
            'login.string'          => 'Email/Username field is invalid format',
            'password.required'     => 'Password field is required',
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            Session::flush();
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // Proses Authentication Credential Custom
        $login          = $request->get('login');
        $password       = $request->get('password');

        // Check if Exist 
        $exist  = DB::table('users')
                ->where('email',$login)
                ->orWhere('username',$login)
                ->where('role',3)
                ->where('departmentID','<>',1)
                ->where('sttsUser',1)
                ->where('email_verified_at','<>',NULL)
                ->first();        
  
        if (!$exist) 
        {
            Artisan::call('cache:clear');
            Session::flush();
            return Redirect::back()->with('error','Sorry ! Your not register yet or account is not active yet please call administrator')->withInput();
        } 
        else
        {
            
            // Custom Authentication Laravel
            if (filter_var($login, FILTER_VALIDATE_EMAIL)) 
            {
                    if(Auth::attempt(['email'=>$login,'password' => $password],true))
                    {

                        // Put or // Create Session here ...
                        Session::put([
                            'id'       => $exist->id,
                            'user'     => $exist->firstName,
                            'avatar'   => $exist->imgUser,
                            'email'    => $exist->email,
                            'token'    => csrf_token(),
                            'loggin'   => true
                        ]);

                        session()->flash('success','Welcome Back ');
                        return redirect()->route('home');
                    }
                    else
                    {
                        Artisan::call('cache:clear');
                        Session::flush();
                        session()->flash('warning','Sorry ! You have entered invalid email credentials');
                    }
            } 
                else
            {
                    if(Auth::attempt(['username'=> $login,'password' => $password],true))
                    {
                        // Put or // Create Session here ...
                        Session::put([
                            'id'       => $exist->id,
                            'user'     => $exist->firstName,
                            'avatar'   => $exist->imgUser,
                            'email'    => $exist->email,
                            'token'     => csrf_token(),
                            'loggin'   => true
                        ]);

                        return redirect()->route('home');
                    }
                    else
                    {
                        Artisan::call('cache:clear');
                        Session::flush();
                        session()->flash('warning','Sorry ! You have entered username invalid credentials');
                    }
            }
            
            Artisan::call('cache:clear');
            Session::flush();
            return Redirect::back()->with('warning','Sorry! You have entered invalid password')->withInput();

        }

    }

    public function logout(){

        $query = DB::table('loggin')->where('tokenSubmit',Session::get('token'))
        ->update([
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        Auth::logout();
        Artisan::call('cache:clear');
      
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        Session::flush();
        return redirect()->route('login');


    }
}
