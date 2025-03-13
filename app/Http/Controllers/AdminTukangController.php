<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

// models
use App\Models\Tukang;

class AdminTukangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->query)) {
            $q = $request->query('query');
            $tukang = Tukang::where( 'id', 'LIKE', '%' . $q . '%' )->orWhere ( 'image', 'LIKE', '%' . $q . '%' )->orderBy('created_at')->paginate(10);
        }else{
            $tukang = Tukang::orderBy('created_at')->paginate(10);
        }
        
        
        return view('admin.tukang.index', compact('tukang'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tukang.create');
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
            return redirect('admin_tukang')->with('msg', 'Tukang Berhasil di Tambahkan!');
        } else {
            return redirect()->route('admin_tukang.create')->with('error', 'Tukang gagal di Tambahkan');
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

        return view('admin.tukang.edit', ['tukang' => $tukang]);
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

        return redirect()->route('admin_tukang.index')->with('msg', 'Tukang Berhasil di ubah');
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
