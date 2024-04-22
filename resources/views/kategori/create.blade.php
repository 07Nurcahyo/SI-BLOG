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
            <form method="POST" action="{{ url('kategori') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">ID Kategori</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="{{ old('id_kategori') }}" required>
                        @error('id_kategori')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Jenis Kategori</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="jenis_kategori" name="jenis_kategori" value="{{ old('jenis_kategori') }}" required>
                        @error('jenis_kategori')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('kategori')}}">Kembali</a>
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