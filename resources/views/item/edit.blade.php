@extends('Layouts.main')

@section('container')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Item</h4>
                    <form class="forms-sample" method="POST" action="{{ url('item/' . $item->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Kode Barang</label>
                            <input type="text" class="form-control @error('kode_barang') is-invalid @enderror"
                                name="kode_barang" id="exampleInputUsername1"
                                value="{{ @old('kode_barang', $item->kode_barang) }}" placeholder="kode_barang">
                            @error('kode_barang')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Barang</label>
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                value="{{ @old('nama_barang', $item->nama_barang) }}" name="nama_barang"
                                id="exampleInputUsername1" placeholder="nama_barang">
                            @error('nama_barang')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUsername1">Harga Beli</label>
                            <input type="number"
                                class="form-control @error('harga_beli', $item->harga_beli) is-invalid @enderror"
                                name="harga_beli" id="exampleInputUsername1"
                                value="{{ @old('harga_beli', $item->harga_beli) }}" placeholder="harga_beli" min="0">
                            @error('harga_beli')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUsername1">Satuan</label>
                            <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan"
                                id="exampleInputUsername1" placeholder="satuan" value="{{ @old('satuan', $item->satuan) }}">
                            @error('satuan')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control " name="nama_category" id="category">
                                <option value="">Pilih</option>
                                @foreach ($categories as $itemm)
                                    <option value="{{ $itemm->nama }}" @selected(@old('nama_category', $itemm->nama_category) === $item->nama)>{{ $itemm->nama }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <button class="btn btn-light">Kembali</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
