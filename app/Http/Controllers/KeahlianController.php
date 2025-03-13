<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// models
use App\Models\Keahlian;

class KeahlianController extends Controller
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
            $keahlian = Keahlian::where( 'id', 'LIKE', '%' . $q . '%' )->orWhere ( 'nama_keahlian', 'LIKE', '%' . $q . '%' )->orderBy('created_at')->paginate(10);
        }else{
            $keahlian = Keahlian::orderBy('created_at')->paginate(10);
        }
        
        
        return view('admin.keahlian.index', compact('keahlian'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.keahlian.create');
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
             'nama_keahlian' => 'required|max:255',
                'jenis_keahlian' => 'required|max:255',
                'keterangan_keahlian' => 'required',
                
        ]);

        $keahlian = Keahlian::create([
            'nama_keahlian' => $request->nama_keahlian,
              'jenis_keahlian' => $request->jenis_keahlian,
              'keterangan_keahlian' => $request->keterangan_keahlian,
              
        ]);

        if($keahlian){
            return redirect('keahlian')->with('msg', 'Keahlian Berhasil di Tambahkan!');
        } else {
            return redirect()->route('keahlian.create')->with('error', 'Keahlian gagal di Tambahkan');
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
        $keahlian = Keahlian::where('id', $id)->get();

        return view('admin.keahlian.edit', ['keahlian' => $keahlian]);
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
        $keahlian = array(
            'nama_keahlian' => $request->nama_keahlian,
              'jenis_keahlian' => $request->jenis_keahlian,
              'keterangan_keahlian' => $request->keterangan_keahlian,
              
        );

        $update = Keahlian::where('id',$id)->update($keahlian);

        return redirect()->route('keahlian.index')->with('msg', 'Keahlian Berhasil di ubah');
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
            $keahlian = Keahlian::where('id',$id)->delete();
      
            return redirect('keahlian')->with('msg', 'Keahlian Berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('keahlian')->with('msg', 'Keahlian Gagal dihapus, Sudah digunakan di data lain.');
        }
    }
}
