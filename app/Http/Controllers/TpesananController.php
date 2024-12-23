<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Paket;
use App\Statuspesanan;
use App\Statuspembayaran;
use App\Tpesanan;
use App\Namausaha;
use PDF;

class TpesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Transaksi Pesanan';
        $data = Tpesanan::latest()->get();
 
        return view('tpesanan.index',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Tambah Pesanan';
        $customer = Customer::orderBy('nama','asc')->get();
        $paket = Paket::orderBy('nama','asc')->get();
        $statuspesanan = Statuspesanan::orderBy('urutan','asc')->get();
        $statuspembayaran = Statuspembayaran::orderBy('nama','asc')->get();
 
        return view('tpesanan.add',compact('title','customer','paket','statuspesanan','statuspembayaran'));
 
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
        // dd($request);
        $this->validate($request,[
            'customer'=>'required',
            'paket'=>'required',
            'berat'=>'required',
            'statuspesanan'=>'required',
            'statuspembayaran'=>'required'
        ]);
 
        $data['id'] = \Uuid::generate(4);
        $data['customer'] = $request->customer;
        $data['paket'] = $request->paket;
        $data['berat'] = $request->berat;
        $data['statuspembayaran'] = $request->statuspembayaran;
        $data['statuspesanan'] = $request->statuspesanan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
 
        $harga = Paket::find($request->paket);
        $harga_paket = $harga->harga;
        $berat = $request->berat;
 
        $grand_total = $harga_paket * $berat;
 
        $data['grand_total'] = $grand_total;
 
        Tpesanan::insert($data);
 
        \Session::flash('sukses','Transaksi berhasil ditambah');
 
        return redirect('transaksi-pesanan/add');
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
        $dt = Tpesanan::find($id);
        $title = "Edit Transaksi";
        $customer = Customer::orderBy('nama','asc')->get();
        $paket = Paket::orderBy('nama','asc')->get();
        $statuspesanan = Statuspesanan::orderBy('urutan','asc')->get();
        $statuspembayaran = Statuspembayaran::orderBy('nama','asc')->get();
 
        return view('tpesanan.edit',compact('title','customer','paket','statuspesanan','statuspembayaran','dt'));
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
            'customer'=>'required',
            'paket'=>'required',
            'berat'=>'required',
            'statuspesanan'=>'required',
            'statuspembayaran'=>'required'
        ]);
 
        // $data['id'] = \Uuid::generate(4);
        $data['customer'] = $request->customer;
        $data['paket'] = $request->paket;
        $data['berat'] = $request->berat;
        $data['statuspembayaran'] = $request->statuspembayaran;
        $data['statuspesanan'] = $request->statuspesanan;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
 
        $harga = Paket::find($request->paket);
        $harga_paket = $harga->harga;
        $berat = $request->berat;
 
        $grand_total = $harga_paket * $berat;
 
        $data['grand_total'] = $grand_total;
 
        Tpesanan::where('id',$id)->update($data);
 
        \Session::flash('sukses','Transaksi berhasil diupdate');
 
        return redirect('transaksi-pesanan');
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
        Tpesanan::where('id',$id)->delete();
 
        \Session::flash('sukses','Data berhasil dihapus');
        return redirect('transaksi-pesanan');
    }

    public function naikkanstatus($id){
        try {
            $transaksi = Tpesanan::find($id);
            $id_status = $transaksi->statuspesanan;
            $urutan_status = $transaksi->statuspesanans->urutan;
 
            $urutan_baru = $urutan_status + 1;
            $status_baru = Statuspesanan::where('urutan',$urutan_baru)->first();
 
            Tpesanan::where('id',$id)->update([
                'statuspesanan'=>$status_baru->id
            ]);
 
            \Session::flash('sukses','Status berhasil dinaikkan');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());   
        }

        return redirect()->back();
    }

    public function naikkanstatuspembayaran($id){
        try {
            $transaksi = Tpesanan::find($id);
            $id_status = $transaksi->statuspembayaran;
            $urutan_status = $transaksi->statuspembayarans->urutan;
 
            $urutan_baru = $urutan_status + 1;
            $status_baru = Statuspembayaran::where('urutan',$urutan_baru)->first();
 
            Tpesanan::where('id',$id)->update([
                'statuspembayaran'=>$status_baru->id
            ]);
 
            \Session::flash('sukses','Status berhasil dinaikkan');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());   
        }

        return redirect()->back();
    }

    public function export($id){
        try {
            $dt = Tpesanan::find($id);
            $nama_usaha = Namausaha::first();
            $pdf = PDF::loadView('tpesanan.pdf', ['dt'=>$dt, 'nama_usaha' =>$nama_usaha]);
            return $pdf->download('tpesanan.pdf');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());

            return redirect()->back();
        }
    }

    public function periode(Request $request){
        try {
            $dari = $request->dari;
            $sampai = $request->sampai;
 
            $title = "Transaksi Pesanan dari $dari sampai $sampai";
 
            $data = Tpesanan::whereDate('created_at','>=',$dari)->whereDate('created_at','<=',$sampai)->orderBy('created_at','desc')->get();
 
            return view('tpesanan.index',compact('title','data'));
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
 
            return redirect()->back();
        }
    }
}
