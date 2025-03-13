<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// models
use App\Models\Pemesanan;

class PemesananController extends Controller
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
            $pemesanan = Pemesanan::where( 'id', 'LIKE', '%' . $q . '%' )->orWhere ( 'id_pelanggan', 'LIKE', '%' . $q . '%' )->orderBy('created_at')->paginate(10);
        }else{
            $pemesanan = Pemesanan::orderBy('created_at')->paginate(10);
        }
        
        
        return view('admin.pemesanan.index', compact('pemesanan'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemesanan.create');
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
             'id_pelanggan' => 'required|max:255',
                'id_tukang' => 'required|max:255',
                'id_alamat' => 'required|max:255',
                'id_jasa' => 'required|max:255',
                'total' => 'required|max:255',
                'keterangan' => 'required',
                'pesan' => 'required',
                
        ]);

        $pemesanan = Pemesanan::create([
            'id_pelanggan' => $request->id_pelanggan,
              'id_tukang' => $request->id_tukang,
              'id_alamat' => $request->id_alamat,
              'id_jasa' => $request->id_jasa,
              'total' => $request->total,
              'keterangan' => $request->keterangan,
              'pesan' => $request->pesan,
              
        ]);

        if($pemesanan){
            return redirect('pemesanan')->with('msg', 'Pemesanan Berhasil di Tambahkan!');
        } else {
            return redirect()->route('pemesanan.create')->with('error', 'Pemesanan gagal di Tambahkan');
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
        $pemesanan = Pemesanan::where('id', $id)->get();

        return view('admin.pemesanan.edit', ['pemesanan' => $pemesanan]);
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
        $pemesanan = array(
            'id_pelanggan' => $request->id_pelanggan,
              'id_tukang' => $request->id_tukang,
              'id_alamat' => $request->id_alamat,
              'id_jasa' => $request->id_jasa,
              'total' => $request->total,
              'keterangan' => $request->keterangan,
              'pesan' => $request->pesan,
              
        );

        $update = Pemesanan::where('id',$id)->update($pemesanan);

        return redirect()->route('pemesanan.index')->with('msg', 'Pemesanan Berhasil di ubah');
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
            $pemesanan = Pemesanan::where('id',$id)->delete();
      
            return redirect('pemesanan')->with('msg', 'Pemesanan Berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('pemesanan')->with('msg', 'Pemesanan Gagal dihapus, Sudah digunakan di data lain.');
        }
    }
}
