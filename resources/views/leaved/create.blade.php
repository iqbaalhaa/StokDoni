@extends('Layouts.main')

@section('container')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Leaving Item</h4>
                    <form class="forms-sample" method="POST" action="{{ url('leaving-item') }}">
                        @csrf

                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <select class="form-control " name="kode_barang" id="kode_barang">
                                <option value="">Pilih</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->kode_barang }}" @selected(@old('kode_barang') === $item->kode_barang)>
                                        {{ $item->kode_barang . ' - (' . $item->nama_barang . ')' }}
                                    </option>
                                @endforeach
                            </select>

                            @error('kode_barang')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                                id="jumlah" placeholder="jumlah" min="1">
                            @error('jumlah')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama_costumer">Costumer</label>
                            <select class="form-control " name="nama_costumer" id="nama_costumer">
                                <option value="">Pilih</option>
                                @foreach ($costumers as $item)
                                    <option value="{{ $item->nama }}" @selected(@old('nama_costumer') === $item->nama)>{{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>

                            @error('nama_costumer')
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
