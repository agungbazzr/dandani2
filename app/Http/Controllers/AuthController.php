<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
         $user = Auth::user();
         if($user){
             if($user->level =='admin'){
                 return redirect()->intended('admin');
             }
             else if($user->level =='user'){

                 return redirect()->intended('user');

             }else if($user->level =='tukang'){

                return redirect()->intended('tukang');
            }else{
                return redirect()->intended('/');
            }
 
         }
         return view('login');
      }
     //
     public function proses_login(Request $request){
         $request->validate([
             'username'=>'required',
             'password'=>'required'
         ]);
     
        
         $credential = $request->only('username','password');
 
         if(Auth::attempt($credential)){
             $user =  Auth::user();
             if($user->level =='admin'){
                 return redirect()->intended('admin');
 
             }else if($user->level =='user'){
                 return redirect()->intended('user');

             }else if($user->level =='tukang'){
                return redirect()->intended('tukang');
            }
             return redirect()->intended('/');
         }
 
         return redirect('login')
             ->withInput()
             ->withErrors(['login_gagal'=>'These credentials does not match our records']);
 
 
 
      }
 
      public function register(){
         return view('register');
       }
 
 
       public function proses_register(Request $request){ 
         $validator =  Validator::make($request->all(),[
             'name'=>'required',
             'username'=>'required|unique:users',
             'email'=>'required|email|unique:users',
             'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
             'password_confirmation' => 'min:6'
         ]);
         
         if($validator ->fails()){
             return redirect('/register')
              ->withErrors($validator)
              ->withInput();
         }
         $request['password'] = bcrypt($request->password);
 
         User::create($request->all());
 
         return redirect()->route('login');
       }
 
      public function logout(Request $request){
 
         $request->session()->flush();
 
 
         Auth::logout();
         return Redirect('login');
       }
}
