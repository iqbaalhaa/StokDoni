@extends('Layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Barang</h4>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <div class="d-flex justify-content-end mb-3">
                    <a href="{{ url('item/create') }}" class="btn btn-primary">Tambah Data Barang</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Kategory</th>
                                    <th>Harga</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_barang }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->nama_category }}</td>
                                        <td>{{ $item->harga_beli }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>
                                            <div class="d-flex gap-4">
                                                <a href="{{ url('item/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm"><i
                                                        class="mdi mdi-pencil"></i></a>

                                                <form action="{{ url('item/' . $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm btn-delete-suratmasuk"
                                                        onclick="return confirm('Data item akan dihapus.')">
                                                        <i class="mdi mdi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
