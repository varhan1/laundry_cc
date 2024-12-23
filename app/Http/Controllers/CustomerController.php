<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Halaman Customer';
        $data = Customer::latest()->get();

        return view('customer.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Tambah Customer';

        return view('customer.add', compact('title'));
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
            'email'=>'required|unique:users|email',
            'nama'=>'required',
            'nohp'=>'required',
            'alamat'=>'required'
        ]);
 
        $data['id'] = \Uuid::generate(4);
        $data['email'] = $request->email;
        $data['nama'] = $request->nama;
        $data['nohp'] = $request->nohp;
        $data['alamat'] = $request->alamat;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
 
        Customer::insert($data);
 
        \Session::flash('sukses','Data berhasil ditambah');
 
        return redirect('customer');
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
        $data = Customer::find($id);
        $title = "Edit Customer $data->nama";
 
        return view('customer.edit',compact('title','data'));
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
            'email'=>'required',
            'nama'=>'required',
            'nohp'=>'required',
            'alamat'=>'required'
        ]);
 
        $data['email'] = $request->email;
        $data['nama'] = $request->nama;
        $data['nohp'] = $request->nohp;
        $data['alamat'] = $request->alamat;
        $data['updated_at'] = date('Y-m-d H:i:s');
 
        Customer::where('id',$id)->update($data);
 
        \Session::flash('sukses','Data berhasil di update');
        return redirect('customer'); 
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
            Customer::where('id',$id)->delete();

            \Session::flash('sukses','Data berhasil dihapus');
            
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect('customer');
    }
}
