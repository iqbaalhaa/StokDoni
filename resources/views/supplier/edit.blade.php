@extends('Layouts.main')


@section('container')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Supplier</h4>
                    <form class="forms-sample" method="POST" action="{{ url('supplier/' . $item->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                value="{{ @old('nama', $item->nama) }}" id="exampleInputUsername1" placeholder="Nama">

                            @error('nama')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" value="{{ @old('alamat', $item->alamat) }}"
                                class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                placeholder="alamat">

                            @error('alamat')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_wa">No WA</label>
                            <input type="text" class="form-control @error('no_wa') is-invalid @enderror"
                                value="{{ @old('no_wa', $item->no_wa) }}" name="no_wa" id="no_wa" placeholder="no_wa">

                            @error('no_wa')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
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
