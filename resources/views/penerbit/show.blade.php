@extends('layouts.template')
@section('content')
    <div class="card">
        {{-- <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div> --}}
        <div class="card-body">
            @empty($penerbit)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
            </div>
            @else
            <table class="table table-bordered">
                <tr>
                    <th style="width: 350px">ID Penerbit</th>
                    <td>{{ $penerbit->id_penerbit }}</td>
                </tr>
                <tr>
                    <th>Nama Penerbit</th>
                    <td>{{ $penerbit->nama_penerbit }}</td>
                </tr>
            </table>
            @endempty
            <a href="{{ url('penerbit') }}" class="btn btn-warning mt-2"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush