<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statuspembayaran;

class StatuspembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Master Status Pembayaran';
        $data = Statuspembayaran::orderBy('nama','asc')->get();
 
        return view('statuspembayaran.index',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Tambah Status Pembayaran';
 
        return view('statuspembayaran.add',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'nama'=>'required'
        ]);
 
        $data['id'] = \Uuid::generate(4);
        $data['nama'] = $request->nama;
        $data['urutan'] = $request->urutan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
 
        Statuspembayaran::insert($data);
 
        \Session::flash('sukses','Data berhasil ditambah');
        return redirect('status-pembayaran');
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
        //
        $dt = Statuspembayaran::find($id);
        $title = "Edit Status Pembayaran $dt->nama";
 
        return view('statuspembayaran.edit',compact('title','dt'));
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
        //
        $this->validate($request,[
            'nama'=>'required'
        ]);
 
        // $data['id'] = \Uuid::generate(4);
        $data['nama'] = $request->nama;
        $data['urutan'] = $request->urutan;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
 
        Statuspembayaran::where('id',$id)->update($data);
 
        \Session::flash('sukses','Data berhasil diupdate');
        return redirect('status-pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            Statuspembayaran::where('id',$id)->delete();
 
            \Session::flash('sukses','Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect('status-pembayaran');
    }
}
