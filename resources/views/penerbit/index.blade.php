@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('penerbit/create')}}">Tambah</a>
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
                            <select class="form-control" name="id_penerbit" id="id_penerbit" required>
                                <option value="">-- Semua --</option>
                                @foreach ($penerbit as $item)
                                    <option value="{{ $item->id_penerbit }}">{{ $item->nama_penerbit }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Penerbit</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_penerbit">
                <thead>
                    <tr style="text-align: center">
                        <th>No</th>
                        <th>ID Penerbit</th>
                        <th>Nama Penerbit</th>
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
        var dataPenerbit = $('#table_penerbit').DataTable({
            serverSide: true, // serverSide: true, jika ingin menggunakan server side processing
            ajax: {
                "url": "{{ url('penerbit/list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
                    d.id_penerbit = $('#id_penerbit').val();
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
                    data: "id_penerbit",
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                },
                {
                    data: "nama_penerbit",
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
        $('#id_penerbit').on('change',function(){
            dataPenerbit.ajax.reload();
        });
    });
</script>
@endpush