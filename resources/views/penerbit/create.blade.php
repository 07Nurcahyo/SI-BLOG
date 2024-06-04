@extends('layouts.template')
@section('content')
    <div class="card">
        {{-- <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div> --}}
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $item)
                    <p>{{ $item }}</p>
                @endforeach
            @endif
            <form method="POST" action="{{ url('penerbit') }}" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label class="control-label col-form-label">ID Penerbit</label>
                    <div>
                        <input type="text" class="form-control" id="id_penerbit" name="id_penerbit" value="{{ old('id_penerbit') }}" required>
                        @error('id_penerbit')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-form-label">Nama Penerbit</label>
                    <div>
                        <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" value="{{ old('nama_penerbit') }}" required>
                        @error('nama_penerbit')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-success" style="color: black"><i class="fas fa-save"></i> Simpan</button>
                        <a class="btn btn-warning ml-1" href="{{ url('penerbit')}}"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('penerbit')}}">Kembali</a>
                    </div>
                </div> --}}
            </form>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush