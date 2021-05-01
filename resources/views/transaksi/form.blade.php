{{ csrf_field() }}

<div class="container">
  <div class="row">
    <div class="col-sm-5">
        <div class="form-group">
            <div class="col-sm-10">
                <select name="products_id" class="form-control">
                    @foreach($product as $item)
                        <option value="{{ $item->id }}" {{ ( ($products_id??'')==$item->id) ? 'selected' : '' }}>
                        {{ $item->name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label for="alamat" class="col-sm-2 control-label">Alamat</label>
            <div class="col-sm-10">
            <input type="text" name="alamat" id="alamat" class="form-control" >
        </div>
        </div>
        <div class="form-group">
            <label for="telepon" class="col-sm-2 control-label">No Telp</label>
            <div class="col-sm-10">
                <input type="number" name="no_telp" id="no_telp" class="form-control"  >
            </div>
        </div>
        <div class="form-group">
            <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
            <div class="col-sm-10">
                <input type="number" name="jumlah" id="jumlah" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success btn-md ml-auto" name="simpan" value="BELI">
                <a href="{{ route('home') }}" class="btn btn-primary ml-auto" role="button">Batal</a>
            </div>
        </div>
    </div>
</div>