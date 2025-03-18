<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


use App\Models\Alamat;


class UserController extends Controller
{
    public function index(){

        return view('user.index');
     }

     public function profile(){
        $id = Auth::user()->id;
        $alamat = Alamat::where('id_pemilik', $id)->get();

        return view('user.profile',compact('alamat'));
     }

     public function alamat(){

         return view('user.alamat');
      }

      public function store_alamat(Request $request){
         $this->validate($request, [
               'title' => 'required|max:255',
               'alamat' => 'required',
               
       ]);

       $alamat = Alamat::create([
           'id_pemilik' => Auth::user()->id,
             'title' => $request->title,
             'alamat' => $request->alamat,
             'detail_alamat' => $request->detail_alamat,
             
       ]);

       if($alamat){
           return redirect('alamat')->with('msg', 'Alamat Berhasil di Tambahkan!');
       } else {
           return redirect()->route('user.alamat')->with('error', 'Alamat gagal di Tambahkan');
       }
      }
}
