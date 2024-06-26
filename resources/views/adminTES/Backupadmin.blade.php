<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI-BLOG</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> 
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">-->
    <link rel="stylesheet" href="css/datatables.css">

    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('js/style.js') }}" defer></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script> <!--data table-->
</head>
<body >

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <img src="img/ekatalog.png" class="logo-jti" alt="">
    <a class="navbar-brand" href="#">SI-BLOG</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <form class="d-flex">
        <a href="{{route('actionlogout')}}" class="btn btn-light"><i class="fa fa-sign-out"></i> Logout</a>
      </form>
    </div>
  </div>
</nav>

<!-- sidebar -->
    <div class="d-flex">
    @include('admin.Bakcupsidebar')
    
<!-- tes qr dan list buku -->
    <div class="container">
      <div class="row justify-content-md-center">
        
        <h1 class="pt-4 mb-4"><b>Data Buku</b></h1>
        <hr>
        <div class="pb-2">
        <button type="button" class="btn btn-primary rounded-3" data-bs-toggle="modal" data-bs-target="#exampleModal">+Tambah Buku📖📚</button>

        <!-- form add buku -->
<div class="modal modal-centered fade" id="exampleModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Input Data Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ISBN</label>
            <input type="text" class="form-control">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
          </div>
          <div class="mb-3">
            <label class="form-label">Judul Buku</label>
            <input type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Tahun Terbit</label>
            <input type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Penerbit</label>
            <input type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Kode Kategori</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Kode Penulis</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Kode Rak</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success">Tambah</button>
      </div>
    </div>
  </div>
</div>

        </div>
              <table id="myTable" class="table table-hover table-bordered display" style="width: 100%">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">ISBN</th>
                      <th scope="col">Judul Buku</th>
                      <th scope="col">Tahun Terbit</th>
                      <th scope="col">Penerbit</th>
                      <th scope="col">Kode Kategori</th>
                      <th scope="col">Kode Penulis</th>
                      <th scope="col">Kode Rak</th>
                      <th scope="col">Stok</th>
                      <th scope="col">QRCode</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($data as $d)
                    <tr>
                        <th>{{ $d->id_buku }}</th>
                        <td>{{ $d->isbn }}</td>
                        <td>{{ $d->judul_buku }}</td>
                        <td>{{ $d->tahun_terbit }}</td>
                        <td>{{ $d->penerbit }}</td>
                        <td>{{ $d->kode_kategori }}</td>
                        <td>{{ $d->kode_penulis }}</td>
                        <td>{{ $d->kode_rak }}</td>
                        <td>{{ $d->stok }}</td>
                        <td>
                            {{-- {!! DNS2D::getBarcodeHTML("$d->judul_buku",'DATAMATRIX') !!} 
                            {!! DNS1D::getBarcodeHTML("$d->judul_buku",'PHARMA',2,100) !!}  --}}
                            {{-- {!! DNS2D::getBarcodeHTML("$d->judul_buku",'QRCODE') !!} --}}
                            {!! DNS2D::getBarcodeHTML(
                                "[ Informasi Buku ]
Judul     : $d->judul_buku
Rak       : $d->kode_rak"
                            ,'QRCODE',4,4) !!}
                            isbn - {{ $d->isbn }}
                        </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>  
        </div>

      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/style.js') }}"></script>
</body>
</html>