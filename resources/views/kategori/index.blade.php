@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('kategori/create')}}">Tambah</a>
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
                            <select class="form-control" name="id_kategori" id="id_kategori" required>
                                <option value="">-- Semua --</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id_kategori }}">{{ $item->jenis_kategori }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Kategori</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_kategori">
                <thead>
                    <tr style="text-align: center">
                        <th>No</th>
                        <th>ID Kategori</th>
                        <th>Jenis Kategori</th>
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
        var dataKategori = $('#table_kategori').DataTable({
            serverSide: true, // serverSide: true, jika ingin menggunakan server side processing
            ajax: {
                "url": "{{ url('kategori/list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
                    d.id_kategori = $('#id_kategori').val();
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
                    data: "id_kategori",
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                },
                {
                    data: "jenis_kategori",
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
        $('#id_kategori').on('change',function(){
            dataKategori.ajax.reload();
        });
    });
</script>
@endpush