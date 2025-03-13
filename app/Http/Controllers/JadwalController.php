<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// models
use App\Models\Jadwal;

class JadwalController extends Controller
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
            $jadwal = Jadwal::where( 'id', 'LIKE', '%' . $q . '%' )->orWhere ( 'id_pemesanan', 'LIKE', '%' . $q . '%' )->orderBy('created_at')->paginate(10);
        }else{
            $jadwal = Jadwal::orderBy('created_at')->paginate(10);
        }
        
        
        return view('admin.jadwal.index', compact('jadwal'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jadwal.create');
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
             'id_pemesanan' => 'required|max:255',
                'tanggal_kunjungan' => 'required',
                'tanggal_selesai' => 'required',
                
        ]);

        $jadwal = Jadwal::create([
            'id_pemesanan' => $request->id_pemesanan,
              'tanggal_kunjungan' => $request->tanggal_kunjungan,
              'tanggal_selesai' => $request->tanggal_selesai,
              
        ]);

        if($jadwal){
            return redirect('jadwal')->with('msg', 'Jadwal Berhasil di Tambahkan!');
        } else {
            return redirect()->route('jadwal.create')->with('error', 'Jadwal gagal di Tambahkan');
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
        $jadwal = Jadwal::where('id', $id)->get();

        return view('admin.jadwal.edit', ['jadwal' => $jadwal]);
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
        $jadwal = array(
            'id_pemesanan' => $request->id_pemesanan,
              'tanggal_kunjungan' => $request->tanggal_kunjungan,
              'tanggal_selesai' => $request->tanggal_selesai,
              
        );

        $update = Jadwal::where('id',$id)->update($jadwal);

        return redirect()->route('jadwal.index')->with('msg', 'Jadwal Berhasil di ubah');
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
            $jadwal = Jadwal::where('id',$id)->delete();
      
            return redirect('jadwal')->with('msg', 'Jadwal Berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('jadwal')->with('msg', 'Jadwal Gagal dihapus, Sudah digunakan di data lain.');
        }
    }
}
