@extends('layouts.template')
@section('content')
    <div class="card">
        {{-- <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div> --}}
        <div class="card-body">
            @empty($lokasi)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('lokasi') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
                @else
                <form method="POST" action="{{ url('/lokasi/'.$lokasi->id_rak) }}" class="form-horizontal" id="edit_{{ $lokasi->id_rak }}">
                    @csrf
                    {!! method_field('PUT') !!} <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->
                    <div class="form-group">
                        <label>ID Rak</label>
                        <div>
                            <input type="text" class="form-control" id="id_rak" name="id_rak" value="{{ old('id_rak', $lokasi->id_rak) }}" required>
                            @error('id_rak')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Rak</label>
                        <div>
                            <input type="text" class="form-control" id="nama_rak" name="nama_rak" value="{{ old('nama_rak', $lokasi->nama_rak) }}" required>
                            @error('nama_rak')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Ruang</label>
                        <div>
                            <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" value="{{ old('nama_ruang', $lokasi->nama_ruang) }}" required>
                            @error('nama_ruang')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Lantai</label>
                        <div>
                            <input type="number" class="form-control" id="lantai" name="lantai" value="{{ old('lantai', $lokasi->lantai) }}" required>
                            @error('lantai')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success" style="color: black" onclick="updateConfirm('{{ $lokasi->id_rak }}', 'Berhasil mengubah data rak!🗿')"><i class="fas fa-save"></i> Simpan</button>
                            <a class="btn btn-warning ml-1" href="{{ url('lokasi')}}"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
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