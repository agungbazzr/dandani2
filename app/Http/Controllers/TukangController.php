<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

// models
use App\Models\Tukang;

class TukangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Auth::user()->id;
        
        
        return view('tukang.index',compact('id'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tukang.register');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        
        
        return view('tukang.profile',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_tukang' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'email' => 'required|max:255',
            'geo_lat' => 'required|max:255',
            'geo_long' => 'required|max:255',
            'alamat' => 'required',
                
        ]);
        $image = $request->file('image');
        $image->storeAs('public/image/tukang', $image->hashName());

        $tukang = Tukang::create([
            'image' => $image->hashName(),
              'nama_tukang' => $request->nama_tukang,
              'no_hp' => $request->no_hp,
              'email' => $request->email,
              'geo_lat' => $request->geo_lat,
              'geo_long' => $request->geo_long,
              'alamat' => $request->alamat,
              
        ]);

        if($tukang){
            return redirect('tukang')->with('msg', 'Tukang Berhasil di Tambahkan!');
        } else {
            return redirect()->route('tukang.create')->with('error', 'Tukang gagal di Tambahkan');
        }

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $tukang = Tukang::where('id', $id)->get();

        return view('tukang.edit', ['tukang' => $tukang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update data
        $tukang = array(
            'image' => $request->image,
              'nama_tukang' => $request->nama_tukang,
              'no_hp' => $request->no_hp,
              'email' => $request->email,
              'geo_lat' => $request->geo_lat,
              'geo_long' => $request->geo_long,
              'alamat' => $request->alamat,
              
        );

        $update = Tukang::where('id',$id)->update($tukang);

        return redirect()->route('tukang.index')->with('msg', 'Tukang Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tukang = Tukang::where('id',$id)->delete();
      
            return redirect('tukang')->with('msg', 'Tukang Berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('tukang')->with('msg', 'Tukang Gagal dihapus, Sudah digunakan di data lain.');
        }
    }
}
