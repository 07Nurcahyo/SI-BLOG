@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($lokasi)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('lokasi') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
                @else
                <form method="POST" action="{{ url('/lokasi/'.$lokasi->id_rak) }}" class="form-horizontal">
                    @csrf
                    {!! method_field('PUT') !!} <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">ID Rak</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="id_rak" name="id_rak" value="{{ old('id_rak', $lokasi->id_rak) }}" required>
                            @error('id_rak')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Nama Rak</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="nama_rak" name="nama_rak" value="{{ old('nama_rak', $lokasi->nama_rak) }}" required>
                            @error('nama_rak')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Nama Ruang</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" value="{{ old('nama_ruang', $lokasi->nama_ruang) }}" required>
                            @error('nama_ruang')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Lantai</label>
                        <div class="col-11">
                            <input type="number" class="form-control" id="lantai" name="lantai" value="{{ old('lantai', $lokasi->lantai) }}" required>
                            @error('lantai')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('lokasi')}}">Kembali</a>
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