<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statuspesanan;

class StatuspesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $title = 'Status Pesanan';
       $data = Statuspesanan::orderBy('nama','asc')->get();

       return view('statuspesanan.index',compact('title','data'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'tambah status pesanan';

        return view('statuspesanan.add',compact('title'));
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
            'nama'=>'required',
            'urutan'=>'required'
        ]);

        $data['id'] = \Uuid::generate(4);
        $data['nama'] = $request->nama;
        $data['urutan'] = $request->urutan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Statuspesanan::insert($data);

        \Session::flash('sukses','Data berhasil ditambah');

        return redirect('status-pesanan');
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
        $dt = Statuspesanan::find($id);
        $title = "Edit status $dt->nama";
 
        return view('statuspesanan.edit',compact('title','dt'));
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
            'nama'=>'required',
            'urutan'=>'required'
        ]);
 
        // $data['id'] = \Uuid::generate(4);
        $data['nama'] = $request->nama;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['urutan'] = $request->urutan;
 
        Statuspesanan::where('id',$id)->update($data);
 
        \Session::flash('sukses','Data berhasil diupdate');
        return redirect('status-pesanan');
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
            Statuspesanan::where('id',$id)->delete();
 
            \Session::flash('sukses','Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect('status-pesanan');
    }
}
