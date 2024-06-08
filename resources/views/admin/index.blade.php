@extends('layouts.template')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">{{ $page->title }}</h3>
            <a class="btn btn-success ml-auto" href="{{ url('admin/create')}}"><i class="fas fa-plus" style="font-size: 12px"></i> Tambah Buku</a>
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
                <div class="col-md-5 text-right" >
                    <div id="buttons" class="btn-group"></div>
                </div>
            </div> <br>
            <table class="table table-striped" id="table_buku">
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
                        <th>Cover</th>
                        {{-- <th>QRCode</th> --}}
                        <th style="width: 148px">Aksi</th>
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
            serverSide: false,
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
                    data: "gambar",
                    render: function(data, type, row, meta) { // row instead of full
                        var baseUrl = {!!json_encode(url('/'))!!} + '/';
                        var gambar = row["gambar"] ? `storage/${row["gambar"]}` : 'img/coverdummy.png';
                        var imgUrl = baseUrl+gambar;
                        return '<img src="' + imgUrl + '" height="120px"/>';
                    },
                    className: "",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "aksi",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }
            ],
            // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
            // dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    text: 'Copy <i class="fas fa-copy"></i>',
                    title: 'Data Buku Perpustakaan JTI Lantai 6',
                    // message: 'opsional',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                    }
                },
                {
                    extend: 'csv',
                    text: 'CSV <i class="fas fa-file-csv"></i>',
                    title: 'Data Buku Perpustakaan JTI Lantai 6 [CSV]',
                    // message: 'opsional',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel <i class="fas fa-file-excel"></i>',
                    title: ' Data Buku Perpustakaan JTI Lantai 6 [Excel]',
                    // message: 'opsional',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                    }
                },
                {
                    extend: 'pdf',
                    text: 'PDF <i class="fas fa-file-pdf"></i>',
                    title: 'Data Buku Perpustakaan JTI Lantai 6 [PDF]',
                    // message: 'opsional',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                    }
                },
                {
                    extend: 'print',
                    text: 'Print <i class="fas fa-print"></i>',
                    title: 'Data Buku Perpustakaan JTI Lantai 6',
                    // message: 'opsioanl',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                    }
                },
                // 'colvis',
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                ['10', '25', '50', 'All']
            ],
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

        deleteConfirm = function(id) {
            event.preventDefault(); // mencegah form submit
            console.log("buku"+id);
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
                        url: 'api/deleteBuku/' + id,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success == true) {
                                Swal.fire({
                                    title: "Terhapus!",
                                    text: "Data buku telah terhapus!",
                                    icon: "success"
                                }).then((result) => {
                                    dataBuku.ajax.reload();
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