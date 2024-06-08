@extends('layouts.template')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">{{ $page->title }}</h3>
            <a class="btn btn-success ml-auto" href="{{ url('lokasi/create')}}"><i class="fas fa-plus" style="font-size: 12px"></i> Tambah Lokasi</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group row">
                        <label class="pl-2 control-label col-form-label">Filter Rak : </label>
                        <div class="col-3">
                            <select class="form-control" name="id_rak" id="id_rak" required>
                                <option value="">-- Semua --</option>
                                @foreach ($lokasi as $item)
                                    <option value="{{ $item->id_rak }}">{{ $item->nama_rak }}</option>
                                @endforeach
                            </select>
                            {{-- <small class="form-text text-muted">Rak</small> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-5 text-right" >
                    <div id="buttons" class="btn-group"></div>
                </div>
            </div> <br>
            <table class="table table-striped" id="table_lokasi">
                <thead>
                    <tr style="text-align: center">
                        <th>No</th>
                        <th>ID Rak</th>
                        <th>Nama Rak</th>
                        <th>Nama Ruang</th>
                        <th>Lantai</th>
                        <th style="width: 205px">Aksi</th>
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
            serverSide: false, // serverSide: true, jika ingin menggunakan server side processing
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
            ],
            // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
            buttons: [
                {
                    extend: 'copy',
                    text: 'Copy <i class="fas fa-copy"></i>',
                    title: 'Data Penerbit Buku Perpustakaan JTI Lantai 6',
                    // message: 'opsional',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                    }
                },
                {
                    extend: 'csv',
                    text: 'CSV <i class="fas fa-file-csv"></i>',
                    title: 'Data Penerbit Buku Perpustakaan JTI Lantai 6 [CSV]',
                    // message: 'opsional',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel <i class="fas fa-file-excel"></i>',
                    title: ' Data Penerbit Buku Perpustakaan JTI Lantai 6 [Excel]',
                    // message: 'opsional',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                    }
                },
                {
                    extend: 'pdf',
                    text: 'PDF <i class="fas fa-file-pdf"></i>',
                    title: 'Data Penerbit Buku Perpustakaan JTI Lantai 6 [PDF]',
                    // message: 'opsional',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                    }
                },
                {
                    extend: 'print',
                    text: 'Print <i class="fas fa-print"></i>',
                    title: 'Data Penerbit Buku Perpustakaan JTI Lantai 6',
                    // message: 'opsioanl',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                    },
                },
                // 'colvis',
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                ['10', '25', '50', 'All']
            ],
            initComplete: function () {
                var api = this.api();
                api.buttons().container().appendTo('#buttons');
            }
        });
        $('#id_rak').on('change',function(){
            dataLokasi.ajax.reload();
        });
        $('#buttons').html(dataLokasi.buttons().container());

        deleteConfirm = function(id) {
            event.preventDefault(); // mencegah form submit
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data dengan ID " +id+ " akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'api/deleteLokasi/' + id,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success == true) {
                                Swal.fire({
                                    title: "Terhapus!",
                                    text: "Data lokasi telah terhapus!",
                                    icon: "success"
                                }).then((result) => {
                                    dataLokasi.ajax.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "Gagal Terhapus!",
                                    text: response.error,
                                    // icon: "error"
                                    imageUrl: "https://i.gifer.com/XwI7.gif",
                                });
                            }
                        }
                    });
                }
            });
        }
    });
</script>
@endpush