@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($penerbit)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('penerbit') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
                @else
                <form method="POST" action="{{ url('/penerbit/'.$penerbit->id_penerbit) }}" class="form-horizontal">
                    @csrf
                    {!! method_field('PUT') !!} <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">ID Penerbit</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="id_penerbit" name="id_penerbit" value="{{ old('id_penerbit', $penerbit->id_penerbit) }}" required>
                            @error('penerbit')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Nama Penerbit</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" value="{{ old('nama_penerbit', $penerbit->nama_penerbit) }}" required>
                            @error('nama_penerbit')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('penerbit')}}">Kembali</a>
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