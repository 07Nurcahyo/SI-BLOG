@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">{{ $page->title }}</h3>
            <a class="btn btn-sm btn-primary ml-auto" href="{{ url('admin/create')}}">Tambah</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="pl-2 control-label col-form-label">Filter Penerbit : </label>
                        <div class="col-3">
                            <select class="form-control" name="id_penerbit" id="id_penerbit" required>
                                <option value="">-- Semua --</option>
                                @foreach ($penerbit as $item)
                                    <option value="{{ $item->id_penerbit }}">{{ $item->nama_penerbit }}</option>
                                @endforeach
                            </select>
                            {{-- <small class="form-text text-muted">Penerbit</small> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-right" >
                    <div id="buttons" class="btn-group"></div>
                </div>
            </div> <br>
            <table class="table table-bordered table-striped table-hover " id="table_buku">
                <thead>
                    <tr style="text-align: center">
                        <th style="width: 45px">ID</th>
                        <th>ISBN</th>
                        <th>Judul Buku</th>
                        <th>Tahun Terbit</th>
                        <th>Penerbit</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Lokasi</th>
                        <th>Stok</th>
                        {{-- <th>QRCode</th> --}}
                        <th style="width: 155px">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    $(document).ready(function() {
        var dataBuku = $('#table_buku').DataTable({
            serverSide: true,
            ajax: {
                url: "{{ url('admin/list') }}",
                dataType: "json",
                type: "POST",
                data: function (d) {
                    d.id_penerbit = $('#id_penerbit').val();
                }
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "isbn",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "judul_buku",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "tahun_terbit",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "penerbit.nama_penerbit",
                    className: "",
                    orderable: false,
                    searchable: true
                },
                {
                    data: "kategori.jenis_kategori",
                    className: "",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "penulis",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "lokasi.nama_rak",
                    className: "",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "stok",
                    className: "",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }
            ],
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
            initComplete: function () {
                var api = this.api();
                // api.buttons().container().appendTo('#table_buku_wrapper .col-md-6:eq(0)');
                api.buttons().container().appendTo('#buttons');
            }
        });
        $('#id_penerbit').on('change',function(){
            dataBuku.ajax.reload();
        });
        $('#buttons').html(dataBuku.buttons().container());
    });
</script>
@endpush