@extends('layouts.main')

@section('container')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Pelanggan</h4>
                    <form class="forms-sample" action="{{ route('customer.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Pelanggan</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan nama pelanggan" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">No. Telepon</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Masukkan nomor telepon" value="{{ old('phone') }}">
                            @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="4" placeholder="Masukkan alamat">{{ old('address') }}</textarea>
                            @error('address')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <a href="{{ route('customer.index') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 