<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\transaksi; 
use App\Models\Brand; 
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;

class transaksiController extends Controller
{
    public function index() 
    { 
        $data =transaksi::paginate(10);
        $transaksi = Transaksi::all();
        foreach ($data as $item) { 
            $item->brand = Brand::find($item->brands_id); 
            $item->categorie = Categorie::find($item->categories_id);  
        } 
        $tampil['data'] = $data; 

        return view("transaksi.index", compact('data', 'transaksi'));
    } 

    public function create() 
    { 
        $data['transaksi'] = Transaksi::get(); 
        return view("transaksi.create",$data); 
    } 

    public function store(Request $request) 
    { 
        $transaksi = new Transaksi;

        $transaksi->name = $request->get('name');
        $transaksi->categories_id = $request->get('categories_id');
        $transaksi->brands_id = $request->get('brands_id');
        $transaksi->harga = $request->get('harga');
        $transaksi->qty = $request->get('qty');
        
        $transaksi->save();
        return redirect()->route("transaksi.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
 } 
    public function show($transaksi) 
    { 
    // 
    } 

    public function edit($transaksi) 
    { 
        $data = transaksi::findOrFail($transaksi); 
        $data->brand = Brand::get(); 
        $data->categorie = categorie::get();
        $data->categorie = categorie::get();

        return view("transaksi.edit", $data); 
    } 
    public function update(Request $request, $transaksi) 
    { 
        $transaksi = transaksi::findOrFail($transaksi); 
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();

            $filename = 'photo_barang_'.time().'.'.$extension;

            $request->file('photo')->storeAs(
                'public/photo_barang', $filename
            );

            Storage::delete('public/photo_barang/'.$request->get('old_photo'));

            $transaksi->photo = $filename;
        }
        $transaksi->name = $request->get('name');
        $transaksi->categories_id = $request->get('categories_id');
        $transaksi->brands_id = $request->get('brands_id');
        $transaksi->harga = $request->get('harga');
        $transaksi->qty = $request->get('qty');

        

        $transaksi->save();
        
        return redirect()->route("transaksi.index")->with( 
        "success", 
        "Data berhasil diubah." 
    ); 
    } 
    
    public function destroy($transaksi) 
    { 
        $datatransaksi = transaksi::findOrFail($transaksi); 
        $datatransaksi->delete(); 
    } 
}
