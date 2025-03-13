<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// models
use App\Models\Alamat;

class AlamatController extends Controller
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
            $alamat = Alamat::where( 'id', 'LIKE', '%' . $q . '%' )->orWhere ( 'id_pemilik', 'LIKE', '%' . $q . '%' )->orderBy('created_at')->paginate(10);
        }else{
            $alamat = Alamat::orderBy('created_at')->paginate(10);
        }
        
        
        return view('admin.alamat.index', compact('alamat'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alamat.create');
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
             'id_pemilik' => 'required|max:255',
                'title' => 'required|max:255',
                'geo_lat' => 'required|max:255',
                'geo_long' => 'required|max:255',
                'alamat' => 'required',
                
        ]);

        $alamat = Alamat::create([
            'id_pemilik' => $request->id_pemilik,
              'title' => $request->title,
              'geo_lat' => $request->geo_lat,
              'geo_long' => $request->geo_long,
              'alamat' => $request->alamat,
              
        ]);

        if($alamat){
            return redirect('alamat')->with('msg', 'Alamat Berhasil di Tambahkan!');
        } else {
            return redirect()->route('alamat.create')->with('error', 'Alamat gagal di Tambahkan');
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
        $alamat = Alamat::where('id', $id)->get();

        return view('admin.alamat.edit', ['alamat' => $alamat]);
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
        $alamat = array(
            'id_pemilik' => $request->id_pemilik,
              'title' => $request->title,
              'geo_lat' => $request->geo_lat,
              'geo_long' => $request->geo_long,
              'alamat' => $request->alamat,
              
        );

        $update = Alamat::where('id',$id)->update($alamat);

        return redirect()->route('alamat.index')->with('msg', 'Alamat Berhasil di ubah');
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
            $alamat = Alamat::where('id',$id)->delete();
      
            return redirect('alamat')->with('msg', 'Alamat Berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('alamat')->with('msg', 'Alamat Gagal dihapus, Sudah digunakan di data lain.');
        }
    }
}
