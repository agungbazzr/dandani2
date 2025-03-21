<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

// models
use App\Models\Pemesanan;
use App\Models\Jasa;
use App\Models\Alamat;

class PemesananUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->query)) {
            $q = Auth::user()->id;
            $pemesanan = Pemesanan::where( 'id', '=', $q )->orderBy('created_at','desc')->paginate(10);
        }else{
            $pemesanan = [];
        }
        
        $initialMarkers = [
            [
                'position' => [
                    'lat' => -7.816222898899351,
                    'lng' => 111.16003274917603
                ],
                'label' => [ 'color' => 'white', 'text' => 'P1' ],
                'draggable' => true
            ],

        ];
        return view('user.pemesanan.index', compact('initialMarkers'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home_maintenance()
    {
        $jasa = Jasa::where('jenis_jasa', 'Home Maintenance')->get();
        $id = Auth::user()->id;
        $alamat = Alamat::where('id_pemilik', $id)->where('status', 'Aktif')->get();
        return view('user.pemesanan.home_maintenance', compact('jasa','alamat'));
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
                'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'id_alamat' => 'required|max:255',
                'keterangan' => 'required',
                'pesan' => 'required',
                
        ]);
        $foto = $request->file('foto');
        $foto->storeAs('public/image/pemesanan/', $foto->hashName());
        $id = Auth::user()->id;
        $pemesanan = Pemesanan::create([
                'image' => $foto->hashName(),
                'id_pelanggan' => $id,
                'id_tukang' => '0',
                'id_jasa' =>'0',
                'total' => '0',
                'id_alamat' => $request->id_alamat,
                'keterangan' => $request->keterangan,
                'pesan' => $request->pesan,
              
        ]);

        if($pemesanan){
            return redirect('u_pemesanan/home_maintenance')->with('msg', 'Pemesanan Berhasil di Tambahkan!');
        } else {
            return redirect()->route('u_pemesanan.home_maintenance')->with('error', 'Pemesanan gagal di Tambahkan');
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
