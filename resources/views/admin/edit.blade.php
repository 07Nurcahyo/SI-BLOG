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
            @empty($buku)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('admin') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
                @else
                <form method="POST" action="{{ url('/admin/'.$buku->id_buku) }}" class="form-horizontal">
                    @csrf
                    {!! method_field('PUT') !!} <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->
                        <div class="form-group row">
                            <label class="col-1 control-label col-form-label">ISBN</label>
                            <div class="col-11">
                                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $buku->isbn) }}" required>
                                @error('isbn')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-1 control-label col-form-label">Judul Buku</label>
                            <div class="col-11">
                                <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="{{ old('judul_buku', $buku->judul_buku) }}" required>
                                @error('judul_buku')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-1 control-label col-form-label">Tahun Terbit</label>
                            <div class="col-11">
                                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required>
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
                                        <option value="{{ $item->id_penerbit }}" @if($item->id_penerbit == $buku->id_penerbit) selected @endif>{{ $item->nama_penerbit }}</option>
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
                                        <option value="{{ $item->id_kategori }}" @if($item->id_kategori == $buku->id_kategori) selected @endif>{{ $item->jenis_kategori }}</option>
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
                                <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis', $buku->penulis) }}" required>
                                @error('penulis')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-1 control-label col-form-label">Kode Rak</label>
                            <div class="col-11">
                                <select class="form-control" id="id_rak" name="kode_rak" required>
                                    <option value="">- Pilih Lokasi -</option>
                                    @foreach($lokasi as $item)
                                        <option value="{{ $item->id_rak }}" @if($item->id_rak == $buku->id_rak) selected @endif>{{ $item->nama_rak }}</option>
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
                                <input type="text" class="form-control" id="stok" name="stok" value="{{ old('stok', $buku->stok) }}" required>
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
            @endempty
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush