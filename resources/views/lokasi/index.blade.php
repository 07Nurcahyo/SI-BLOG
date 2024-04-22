@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('lokasi/create')}}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter : </label>
                        <div class="col-3">
                            <select class="form-control" name="id_rak" id="id_rak" required>
                                <option value="">-- Semua --</option>
                                @foreach ($lokasi as $item)
                                    <option value="{{ $item->id_rak }}">{{ $item->nama_rak }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Rak</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_lokasi">
                <thead>
                    <tr style="text-align: center">
                        <th>No</th>
                        <th>ID Rak</th>
                        <th>Nama Rak</th>
                        <th>Nama Ruang</th>
                        <th>Lantai</th>
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
        var dataLokasi = $('#table_lokasi').DataTable({
            serverSide: true, // serverSide: true, jika ingin menggunakan server side processing
            ajax: {
                "url": "{{ url('lokasi/list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
                    d.id_rak = $('#id_rak').val();
                }
            },
            columns: [
                {
                    data: "DT_RowIndex", // nomor urut dari laravel datatable addIndexColumn()
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "id_rak",
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                },
                {
                    data: "nama_rak",
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                },
                {
                    data: "nama_ruang",
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                },
                {
                    data: "lantai",
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                },
                {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false // searchable: true, jika ingin kolom ini bisa dicari
                }
            ]
        });
        $('#id_rak').on('change',function(){
            dataLokasi.ajax.reload();
        });
    });
</script>
@endpush