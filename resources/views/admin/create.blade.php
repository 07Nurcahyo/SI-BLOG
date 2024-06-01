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
            <form method="POST" enctype="multipart/form-data" action="{{ url('admin') }}" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ISBN</label>
                            <div>
                                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn') }}" required>
                                @error('isbn')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <div>
                                <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="{{ old('judul_buku') }}" required>
                                @error('judul_buku')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <div>
                                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
                                @error('tahun_terbit')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kode Penerbit</label>
                            <div>
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
                        <div class="form-group">
                            <label>Kode Kategori</label>
                            <div>
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
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Penulis</label>
                            <div>
                                <input type="text" class="form-control" id="penulis" name="penulis" required>
                                @error('penulis')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kode Rak</label>
                            <div>
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
                        <div class="form-group">
                            <label>Stok</label>
                            <div>
                                <input type="number" class="form-control" id="stok" name="stok" required>
                                @error('stok')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Cover Buku</label>
                            <div>
                                <input type="file" class="form-control" id="gambar" name="gambar" required>
                                @error('gambar')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div>
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