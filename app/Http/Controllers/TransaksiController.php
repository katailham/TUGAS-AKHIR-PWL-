<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Models\Transaksi; 
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use PDF; 

class TransaksiController extends Controller
{
    public function index() 
    { 
        $data = Transaksi::all();
        $product = Product::all();
        foreach ($data as $item) { 
            $item->product = Product::find($item->products_id);  
        } 
        $tampil['data'] = $data; 
        return view("transaksi.index", compact('data', 'product'));
    } 

    public function create() 
    { 
        $data['product'] = Product::get();
        return view("transaksi.create",$data); 
    } 

    public function store(Request $request) 
    { 
        $transaksi = new Transaksi;

        $transaksi->name = $request->get('name');
        $transaksi->alamat = $request->get('alamat');
        $transaksi->no_telp = $request->get('no_telp');
        $transaksi->products_id = $request->get('products_id');
        $transaksi->jumlah = $request->get('jumlah');
        
        $transaksi->save();
        return redirect()->route("transaksi.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    } 
    
    public function show($kela) 
    { 
    // 
    } 
    
    public function edit($transaksi) 
    {     
        $data = Transaksi::findOrFail($transaksi);
        $data['role'] = Role::get();  
            return view('transaksi.edit', $data); 
        } 
    public function update(Request $request, $user) 
    { 
        $transaksi = Transaksi::findOrFail($transaksi); 

        $transaksi->name = $request->get('name');
        $transaksi->alamat = $request->get('alamat');
        $transaksi->no_telp = $request->get('no_telp');
        $transaksi->product_id = $request->get('product_id');
        $transaksi->jumlah = $request->get('jumlah');

        

        $transaksi->save();
        return redirect()->route("transaksi.index")->with( 
            "success", 
            "Data berhasil diubah." 
        ); 
    } 
    public function destroy($transaksi) 
    { 
        $datatransaksi = Transaksi::findOrFail($transaksi); 
        $datatransaksi->delete(); 
    } 

    public function laporankeluar() 
    { 
        $data =Transaksi::paginate(10);
        $product = Product::all();
        foreach ($data as $item) { 
            $item->product = Product::find($item->products_id); 
        } 
        $tampil['data'] = $data; 

        return view("transaksi.laporankeluar", compact('data','product'));
    } 

    public function cetakBarangKeluar(Request $request) { 
        $data = Transaksi::get();
        $product = Product::get();
        foreach ($data as $item) { 
            $item->product = Product::find($item->products_id);  
        } 
        $tampil['data'] = $data;  
        $pdf = PDF::loadView("transaksi.cetakpdf", compact('data','product')); 
        return $pdf->download('Laporan_barang_keluar.pdf'); 
    } 
}
