@extends('adminlte::page')
@section('title', 'Welcome')
<style>

</style>
@section('content')
<div class="row">
    @foreach ($data as $item)
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('/storage/photo_barang/'.$item->photo) }}" class="card-img-top">
                    <h7 class="card-title" style="font-size:16px;">{{ $item->name}}</h5>
                    <br/>
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title" style="color:red; font-size:22px;">Rp.{{ $item->harga}}</h5>
                            </div>
                            <div class="col">
                            <h2 class="card-title" style="font-size:14px; color:grey; margin-left:50%; margin-top:5%;">stok :{{ $item->qty}}</h2>
                            </div>
                        </div>
                        <a class="btn btn-outline-danger btn-lg btn-block" href="{{ route('transaksi.create') }}">
                            BELI
                        </a>
                </div>
            </div>
            <br>
        </div>
    @endforeach
</div>
@stop 