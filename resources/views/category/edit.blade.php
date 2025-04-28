@extends('Layouts.main')

@section('container')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Category</h4>
                    <form class="forms-sample" method="POST" action="{{ url('category/' . $category->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                id="exampleInputUsername1" placeholder="Nama" value="{{ @old('nama', $category->nama) }}">

                            @error('nama')
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
