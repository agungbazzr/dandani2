<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// models
use App\Models\KategoriJasa;

class kategorijasaController extends Controller
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
            $KategoriJasa = KategoriJasa::where( 'id', 'LIKE', '%' . $q . '%' )->orWhere ( 'nama_kategori_jasa', 'LIKE', '%' . $q . '%' )->orderBy('created_at')->paginate(10);
        }else{
            $KategoriJasa = KategoriJasa::orderBy('created_at')->paginate(10);
        }
        
        
        return view('admin.kategori_jasa.index', compact('KategoriJasa'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori_jasa.create');
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
             'nama_kategori_jasa' => 'required|max:255',
                'keterangan_kategori_jasa' => 'required',
                
        ]);

        $KategoriJasa = KategoriJasa::create([
            'nama_kategori_jasa' => $request->nama_kategori_jasa,
              'keterangan_kategori_jasa' => $request->keterangan_kategori_jasa,
              
        ]);

        if($KategoriJasa){
            return redirect('kategori_jasa')->with('msg', 'Kategori Jasa Berhasil di Tambahkan!');
        } else {
            return redirect()->route('kategori_jasa.create')->with('error', 'KategoriJasa gagal di Tambahkan');
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
        $KategoriJasa = KategoriJasa::where('id', $id)->get();

        return view('admin.kategori_jasa.edit', ['KategoriJasa' => $KategoriJasa]);
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
        $KategoriJasa = array(
            'nama_kategori_jasa' => $request->nama_kategori_jasa,
              'keterangan_kategori_jasa' => $request->keterangan_kategori_jasa,
              
        );

        $update = KategoriJasa::where('id',$id)->update($KategoriJasa);

        return redirect()->route('kategori_jasa.index')->with('msg', 'KategoriJasa Berhasil di ubah');
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
            $KategoriJasa = KategoriJasa::where('id',$id)->delete();
      
            return redirect('kategori_jasa')->with('msg', 'KategoriJasa Berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('kategori_jasa')->with('msg', 'KategoriJasa Gagal dihapus, Sudah digunakan di data lain.');
        }
    }
}
