@extends('layouts.template')
@section('content')
    <div class="card">
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
            @empty($buku)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('admin') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
                @else
                <form method="POST" enctype="multipart/form-data" action="{{ url('/admin/'.$buku->id_buku) }}" class="form-horizontal" id="edit_{{ $buku->id_buku }}">
                    @csrf
                    {!! method_field('PUT') !!} <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ISBN</label>
                                <div>
                                    <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $buku->isbn) }}" required>
                                    @error('isbn')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <div>
                                    <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="{{ old('judul_buku', $buku->judul_buku) }}" required>
                                    @error('judul_buku')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <div>
                                    <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required>
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
                                            <option value="{{ $item->id_penerbit }}" @if($item->id_penerbit == $buku->kode_penerbit) selected @endif>{{ $item->nama_penerbit }}</option>
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
                                            <option value="{{ $item->id_kategori }}" @if($item->id_kategori == $buku->kode_kategori) selected @endif>{{ $item->jenis_kategori }}</option>
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
                                    <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis', $buku->penulis) }}" required>
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
                                            <option value="{{ $item->id_rak }}" @if($item->id_rak == $buku->kode_rak) selected @endif>{{ $item->nama_rak }}</option>
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
                                    <input type="text" class="form-control" id="stok" name="stok" value="{{ old('stok', $buku->stok) }}" required>
                                    @error('stok')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Cover Buku</label>
                                <div>
                                    <input type="file" id="gambar" name="gambar" class="form-control dropify" data-default-file="{{ $buku->gambar ? asset('storage/'.$buku->gambar) : asset('img/coverdummy.png') }}">
                                    @error('gambar')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success" style="color: black" onclick="updateConfirm({{ $buku->id_buku }}, 'Berhasil mengubah data buku!🗿')"><i class="fas fa-save"></i> Simpan</button>
                            <a class="btn btn-warning ml-1" href="{{ url('admin')}}"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            @endempty
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
                'default': 'Klik atau drag & drop cover buku disini',
                'replace': 'Klik atau drag & drop cover buku disini',
                'remove':  'Hapus',
                'error':   'Ooops, something wrong happended.'
            }
        });

        // updateConfirm = function(id) {
        //     console.log('#edit_'+id);
        //     event.preventDefault();
        //     Swal.fire({
        //         title: "Terubah",
        //         text: "Data buku berhasil diubah!🗿",
        //         icon: "success"
        //     }).then((result) => {
        //         $('#edit_'+id).submit();
        //     });
        // }
    })
</script>
@endpush