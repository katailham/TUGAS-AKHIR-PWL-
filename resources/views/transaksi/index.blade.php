@extends('adminlte::page')
@section('title', 'TransaksiBarang')
@section('content_header')
    <h1 class="m-0 text-dark">TRANSAKSI BARANG</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12"> 
            <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 20px">NO</th>
                            <th>NAMA PRODUCT</th>
                            <th>TANGGAL PEMESANAN</th>
                            <th>NAMA PEMESAN</th>
                            <th>ALAMAT</th>
                            <th>NO TELP</th>
                            <th>HARGA</th>
                            <th>JUMLAH</th>
                            <th style="width: 80px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        @forelse($data as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_telp }}</td> 
                                <td>{{ $item->product->harga }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success" href="{{ route('product.edit', ['product'=>$item->id]) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-primary" onclick="hapus('{{ $item->id }}')" href="#">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php $no++;?>
                        @empty
                            <tr>
                                <td colspan="6">Tidak ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
    @section('plugins.Sweetalert2', true)
    @section('plugins.Pace', true)
    @section('js')
        <script type="text/javascript">
            function hapus(id){
                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Yakin menghapus data ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d1',
                    cancelButtonColor: '#dd2222',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "/product/"+id,
                            type: 'DELETE',
                            data: {
                                '_token': $('meta[name=csrf-token]').attr("content"),
                            },
                            success: function(result) {
                                Swal.fire(
                                    'Sukses!',
                                    'Berhasil Hapus',
                                    'success'
                                );
                                location.reload();
                            }
                        });
                    }
                })
            }
        </script>
@stop