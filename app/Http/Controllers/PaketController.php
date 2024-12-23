<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Paket Laundry';
        $data = Paket::get();

        return view('paket.index', compact('title', 'data'));
    }

    public function add(){
        $title = 'Tambah Paket Laundry';

        return view('paket.add', compact('title'));
    }

    public function stores(Request $request){
        $data['id'] = \Uuid::generate(4);
        $data['nama'] = $request->nama;
        $data['harga'] = $request->harga;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
 
        \Session::flash('sukses','Data berhasil ditambah');
 
        Paket::insert($data);
 
        return redirect('paket-laundry');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $dt = Paket::find($id);
        $title = "Edit Paket $dt->nama";
 
        return view('paket.edit',compact('title','dt'));
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
            'harga'=>'required'
        ]);
       
        $data['nama'] = $request->nama;
        $data['harga'] = $request->harga;
        $data['updated_at'] = date('Y-m-d H:i:s');
 
        Paket::where('id',$id)->update($data);
 
        \Session::flash('sukses','Data berhasil di update');
 
        return redirect('paket-laundry');
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
            Paket::where('id',$id)->delete();
 
            \Session::flash('sukses','Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
 
        return redirect('paket-laundry');
    }
}
