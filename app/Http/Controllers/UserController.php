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

     public function ubah_alamat($id_alamat){
       
        $status = array(
              'status' => "Aktif",
              
        );
        $update1 = Alamat::where('status','Aktif')->update( array('status' => "",));
        $update = Alamat::where('id',$id_alamat)->update($status);
        
        return redirect()->route('user.profile');
     }

     public function alamat(){

         return view('user.alamat');
      }

      public function store_alamat(Request $request){
         $this->validate($request, [
               'title' => 'required|max:255',
               'alamat' => 'required',
               
       ]);
       $id = Auth::user()->id;
       $alamat = Alamat::where('id_pemilik', $id)->where('status', "Aktif")->exists();
       if ($alamat) {
        $status = "";
       }else{
        $status = "Aktif";
       }
       $alamat = Alamat::create([
             'id_pemilik' => $id,
             'title' => $request->title,
             'alamat' => $request->alamat,
             'status' => $status,
             'detail_alamat' => $request->detail_alamat,
             
       ]);

       if($alamat){
           return redirect('alamat')->with('msg', 'Alamat Berhasil di Tambahkan!');
       } else {
           return redirect()->route('user.alamat')->with('error', 'Alamat gagal di Tambahkan');
       }
      }
}
