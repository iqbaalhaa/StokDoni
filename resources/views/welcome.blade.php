@extends('Layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title mb-0">Total Transaksi Barang Masuk Bulan Ini</h6>
                            <h2 class="mt-2 mb-0">{{ $totalTransaksiBarangMasuk }}</h2>
                            {{-- <small class="text-success">+2.5% dari bulan lalu</small> --}}
                        </div>
                        <div class="card-icon bg-primary text-white">
                            <i class="mdi mdi-cart-outline"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title mb-0">Total Supplier</h6>
                            <h2 class="mt-2 mb-0">{{ $totalSuplier }}</h2>
                            {{-- <small class="text-success">+3 supplier baru</small> --}}
                        </div>
                        <div class="card-icon bg-success text-white">
                            <i class="mdi mdi-account-multiple"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title mb-0">Total Pelanggan</h6>
                            <h2 class="mt-2 mb-0">{{ $totalPelanggan }}</h2>
                            {{-- <small class="text-success">+5% dari bulan lalu</small> --}}
                        </div>
                        <div class="card-icon bg-info text-white">
                            <i class="mdi mdi-account-group"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="card-title mb-0">Total Stok</h6>
                            <h2 class="mt-2 mb-0">{{ $totalSemuaItem }}</h2>
                            {{-- <small class="text-danger">-2% dari bulan lalu</small> --}}
                        </div>
                        <div class="card-icon bg-warning text-white">
                            <i class="mdi mdi-package-variant"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Analisis ABC Stok</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="pieChartt" height="300"></canvas>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-4">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-4">Klasifikasi Inventory</h5>
                                    <h5 class="mb-4">Total Nilai : {{ $totalJumlahNilai }}</h5>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="color-bullet bg-primary me-2"></div>
                                        <h6 class="mb-0">Kategori A (High Value)</h6>
                                    </div>
                                    <h6 class="mb-0">(1% - 80% Nilai)</h6>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="color-bullet bg-success me-2"></div>
                                        <h6 class="mb-0">Kategori B (Medium Value)</h6>
                                    </div>
                                    <h6 class="mb-0">(81% - 90% Nilai)</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="color-bullet bg-warning me-2"></div>
                                        <h6 class="mb-0">Kategori C (Low Value)</h6>
                                    </div>
                                    <h6 class="mb-0">(91% - 100% Nilai)</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Total Nilai</th>
                        <th>Persentase</th>
                        <th>Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['nama_barang'] }}</td>
                            <td>{{ $item['harga_beli'] }}</td>
                            <td>{{ $item['total_jumlah'] }}</td>
                            <td>{{ $item['nilai'] }}</td>
                            <td>{{ ceil($item['persenan'] * 100) . ' %' }}</td>
                            <td>{{ $item['grade'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('pieChartt').getContext('2d');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($label); ?>,
                datasets: [{
                    label: 'Klasifikasi Item',
                    data: <?php echo json_encode($labelPersenan); ?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
