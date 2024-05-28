@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $item)
                    <p>{{ $item }}</p>
                @endforeach
            @endif
            <form method="POST" action="{{ url('admin') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">ISBN</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn') }}" required>
                        @error('isbn')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Judul Buku</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="{{ old('judul_buku') }}" required>
                        @error('judul_buku')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tahun Terbit</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
                        @error('tahun_terbit')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Kode Penerbit</label>
                    <div class="col-11">
                        <select class="form-control" id="id_penerbit" name="kode_penerbit" required>
                            <option value="">- Pilih Penerbit -</option>
                            @foreach($penerbit as $item)
                                <option value="{{ $item->id_penerbit }}">{{ $item->nama_penerbit}}</option>
                            @endforeach
                        </select>
                        @error('id_penerbit')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Kode Kategori</label>
                    <div class="col-11">
                        <select class="form-control" id="id_kategori" name="kode_kategori" required>
                            <option value="">- Pilih Kategori -</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->id_kategori }}">{{ $item->jenis_kategori}}</option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Penulis</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="penulis" name="penulis" required>
                        @error('penulis')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Kode Rak</label>
                    <div class="col-11">
                        <select class="form-control" id="id_rak" name="kode_rak" required>
                            <option value="">- Pilih Rak -</option>
                            @foreach($lokasi as $item)
                                <option value="{{ $item->id_rak }}">{{ $item->nama_rak}}</option>
                            @endforeach
                        </select>
                        @error('id_rak')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Stok</label>
                    <div class="col-11">
                        <input type="number" class="form-control" id="stok" name="stok" required>
                        @error('stok')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('admin')}}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush