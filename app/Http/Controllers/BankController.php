<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// models
use App\Models\Bank;

class BankController extends Controller
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
            $bank = Bank::where( 'id', 'LIKE', '%' . $q . '%' )->orWhere ( 'nama_bank', 'LIKE', '%' . $q . '%' )->orderBy('created_at')->paginate(10);
        }else{
            $bank = Bank::orderBy('created_at')->paginate(10);
        }
        
        
        return view('admin.bank.index', compact('bank'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bank.create');
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
             'nama_bank' => 'required|max:255',
                'nama_pemilik' => 'required|max:255',
                'no_rekening' => 'required|max:255',
                'status_bank' => 'required|max:255',
                'content' => 'required',
                
        ]);

        $bank = Bank::create([
            'nama_bank' => $request->nama_bank,
              'nama_pemilik' => $request->nama_pemilik,
              'no_rekening' => $request->no_rekening,
              'status_bank' => $request->status_bank,
              'content' => $request->content,
              
        ]);

        if($bank){
            return redirect('bank')->with('msg', 'Bank Berhasil di Tambahkan!');
        } else {
            return redirect()->route('bank.create')->with('error', 'Bank gagal di Tambahkan');
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
        $bank = Bank::where('id', $id)->get();

        return view('admin.bank.edit', ['bank' => $bank]);
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
        $bank = array(
            'nama_bank' => $request->nama_bank,
              'nama_pemilik' => $request->nama_pemilik,
              'no_rekening' => $request->no_rekening,
              'status_bank' => $request->status_bank,
              'content' => $request->content,
              
        );

        $update = Bank::where('id',$id)->update($bank);

        return redirect()->route('bank.index')->with('msg', 'Bank Berhasil di ubah');
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
            $bank = Bank::where('id',$id)->delete();
      
            return redirect('bank')->with('msg', 'Bank Berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('bank')->with('msg', 'Bank Gagal dihapus, Sudah digunakan di data lain.');
        }
    }
}
