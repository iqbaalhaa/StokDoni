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

                    <div class="d-flex gap-4 justify-content-end mb-3">

                        <form action="{{ 'cetak-opname' }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </form>

                        {{-- <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Cetak
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Laporan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ url('cetak/opname') }}" method="POST">
                                        <div class="modal-body">
                                            <p>Masukan tanggal awal dan akhir</p>
                                        </div>
                                        <div class="modal-footer">
                                            @csrf
                                            <input type="date" class="form-control" name="tanggal_awal">
                                            <input type="date" class="form-control" name="tanggal_akhir">
                                            <button type="submit" class="btn btn-primary">Cetak</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Kategory</th>
                                <th>Satuan</th>
                                <th>Sisa</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item['kode_barang'] }}</td>
                                    <td>{{ $item['nama_barang'] }}</td>
                                    <td>{{ $item['kategori'] }}</td>
                                    <td>{{ $item['satuan'] }}</td>
                                    <td>{{ $item['sisa'] }}</td>
                                    {{-- <td>
                                            <div class="d-flex gap-4">
                                                <a href="{{ url('item/' . $item->id . '/edit') }}"
                                                    class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i></a>

                                                <form action="{{ url('item/' . $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm btn-delete-suratmasuk"
                                                        onclick="return confirm('Data item akan dihapus.')">
                                                        <i class="mdi mdi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td> --}}
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
