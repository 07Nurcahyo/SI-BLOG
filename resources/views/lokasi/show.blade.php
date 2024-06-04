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
            @else
            <table class="table table-bordered">
                <tr>
                    <th style="width: 350px">ID Rak</th>
                    <td>{{ $lokasi->id_rak }}</td>
                </tr>
                <tr>
                    <th>Nama Rak</th>
                    <td>{{ $lokasi->nama_rak }}</td>
                </tr>
                <tr>
                    <th>Nama Ruang</th>
                    <td>{{ $lokasi->nama_ruang }}</td>
                </tr>
                <tr>
                    <th>Lantai</th>
                    <td>{{ $lokasi->lantai }}</td>
                </tr>
            </table>
            @endempty
            <a href="{{ url('lokasi') }}" class="btn btn-warning mt-2"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush