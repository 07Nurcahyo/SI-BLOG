@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($buku)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
            </div>
            @else
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID</th>
                    <td>{{ $buku->id_buku }}</td>
                </tr>
                <tr>
                    <th>ISBN</th>
                    <td>{{ $buku->isbn }}</td>
                </tr>
                <tr>
                    <th>Judul Buku</th>
                    <td>{{ $buku->judul_buku }}</td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td>{{ $buku->tahun_terbit }}</td>
                </tr>
                <tr>
                    <th>Kode Penerbit</th>
                    <td>{{ $buku->penerbit->nama_penerbit }}</td>
                </tr>
                <tr>
                    <th>Kode Kategori</th>
                    <td>{{ $buku->kategori->jenis_kategori }}</td>
                </tr>
                <tr>
                    <th>Penulis</th>
                    <td>{{ $buku->penulis }}</td>
                </tr>
                <tr>
                    <th>Lokasi</th>
                    <td>{{ $buku->lokasi->nama_rak }}</td>
                </tr>
                <tr>
                    <th>stok</th>
                    <td>{{ $buku->stok }}</td>
                </tr>
                <tr>
                    <th>Cover</th>
                    <td>
                        <img src="{{ $buku->gambar ? asset('storage/'.$buku->gambar) : asset('img/coverdummy.png') }}"
                            class="img-fluid w-25 d-block" style="max-width:150px">
                    </td>
                </tr>
            </table>
            @endempty
            <a href="{{ url('admin') }}" class="btn btn-sm btn-warning mt-2"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush