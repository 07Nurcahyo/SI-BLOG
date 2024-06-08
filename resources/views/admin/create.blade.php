@extends('layouts.template')
@section('content')
    <div class="card card-primary">
        {{-- <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div> --}}
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $item)
                    <p>{{ $item }}</p>
                @endforeach
            @endif
            <form method="POST" enctype="multipart/form-data" action="{{ url('admin') }}" class="form-horizontal" id="tambah_">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ISBN</label>
                            <div>
                                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn') }}" required>
                                @error('isbn')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <div>
                                <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="{{ old('judul_buku') }}" required>
                                @error('judul_buku')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <div>
                                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
                                @error('tahun_terbit')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kode Penerbit</label>
                            <div>
                                <select class="form-control" id="id_penerbit" name="kode_penerbit" required>
                                    <option value="">- Pilih Penerbit -</option>
                                    @foreach($penerbit as $item)
                                        <option value="{{ $item->id_penerbit }}">{{ $item->nama_penerbit}}</option>
                                    @endforeach
                                </select>
                                @error('id_penerbit')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kode Kategori</label>
                            <div>
                                <select class="form-control" id="id_kategori" name="kode_kategori" required>
                                    <option value="">- Pilih Kategori -</option>
                                    @foreach($kategori as $item)
                                        <option value="{{ $item->id_kategori }}">{{ $item->jenis_kategori}}</option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Penulis</label>
                            <div>
                                <input type="text" class="form-control" id="penulis" name="penulis" required>
                                @error('penulis')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Lokasi</label>
                            <div>
                                <select class="form-control" id="id_rak" name="kode_rak" required>
                                    <option value="">- Pilih Lokasi -</option>
                                    @foreach($lokasi as $item)
                                        <option value="{{ $item->id_rak }}">{{ $item->nama_rak}}</option>
                                    @endforeach
                                </select>
                                @error('id_rak')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <div>
                                <input type="number" class="form-control" id="stok" name="stok" required>
                                @error('stok')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Cover Buku</label>
                            <div>
                                <input type="file" class="form-control dropify" id="gambar" name="gambar" required>
                                @error('gambar')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-success" style="color: black" onclick="tambahConfirm('Berhasil menambahkan data buku!🗿')"><i class="fas fa-save"></i> Simpan</button>
                        <a class="btn btn-warning ml-1" href="{{ url('admin')}}"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
<script>
    $(document).ready(function() {
        $('.dropify').dropify({
            messages: {
                'default': '<small style="font-size: 20px">Klik atau drag & drop cover buku disini</small>',
                'replace': 'Klik atau drag & drop cover buku disini',
                'remove':  'Hapus',
                'error':   'Ooops, something wrong happended.'
            }
        });

        // tambahConfirm = function() {
        //     console.log('#tambah_');
        //     event.preventDefault();
        //     Swal.fire({
        //         title: "Tersimpan",
        //         text: "Berhasil menambahkan data buku!🗿",
        //         icon: "success"
        //     }).then((result) => {
        //         $('#tambah_').submit();
        //     });
        // }
    })
</script>
@endpush