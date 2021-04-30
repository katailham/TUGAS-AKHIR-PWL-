<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Product; 
use App\Models\Brand; 
use App\Models\Categorie;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data =Product::paginate(10); 
        $transaksi = Transaksi::all();
        $categorie = Categorie::all();
        $brand = Brand::all();
        foreach ($data as $item) { 
            $item->brand = Brand::find($item->brands_id); 
            $item->categorie = Categorie::find($item->categories_id);  
        } 
        $tampil['data'] = $data; 

        return view("home", compact('data', 'categorie', 'brand', 'transaksi'));
    }
}
