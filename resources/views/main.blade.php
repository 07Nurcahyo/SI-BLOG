<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI-BLOG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body >

<div class="">
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
          <a href="login_admin" class="btn btn-light rounded-4" role="button">Login admin &nbsp;<i class="fa fa-user" aria-hidden="true"></i></a>
        </form>
      </div>
    </div>
  </nav>

  <!-- Content -->
    <section class="search" id="search">
      <div class="content text-center content-atas">
          <h5>Selamat Datang</h5>
          <h2>Portal Layanan</h2>
          <h1 class="jti">Ruang Baca JTI</h1>
          <div class="input-group searchbar">
            <input type="search" class="form-control" placeholder="Cari Buku.."/>
            <button type="button" class="btn btn-primary btn-lg" data-mdb-ripple-init>Cari</button>
          </div>
      </div>
    </section>

    <a href="listbook" type="button" class="btn btn-light btn-lg start-50 translate-middle mt-1 rounded-5 lihatSemuaBuku" style="">
      <p style="padding-top: 10px"><i class="fa fa-book" aria-hidden="true"></i> ‎ Lihat Semua Buku</p>
    </a>

    <section class="koleksi" id="koleksi">
      <div class="container mt-5">
        <div class="row justify-content-center content text-center">
          <p class="text-koleksi">Koleksi ruang baca</p>
          <div class="col-lg-3">
            <div class="card custom-card">
              <img src="img/books.svg" class="card-img-top card-gambar position-relative start-50 translate-middle" alt="...">
              <div class="card-body">
                <h1 id="jumlah_buku">0</h1>
                <h5 class="card-title">Buku Ruang Baca</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 kategori">
            <div class="card custom-card">
              <img src="img/categories.svg" class="card-img-top card-gambar position-relative start-50 translate-middle" alt="...">
              <div class="card-body">
                <h1 id="jumlah_kategori">0</h1>
                <h5 class="card-title">Kategori</h5>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row justify-content-center content text-center">
          <div class="col-lg-4">
            <span class="badge text-bg-light">
              <h4 id="manual_book">0</h4>
              <p>Manual Book</p>
            </span>
          </div>
          <div class="col-lg-4 skripsi">
            <span class="badge text-bg-light">
              <h4 id="skripsi">0</h4>
              <p>Skripsi & TA</p>
            </span>
          </div>
        </div>
        <br><br>
        <div class="row justify-content-center content text-center">
            <a href="guest/statistik" class="badge btn statistik">
              <p>Statistik &nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></p>
            </a>
        </div>
      </div>
    </section>

</div>

  <!-- jQuery -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/style.js"></script>
  <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('adminlte/dist/js/pages/dashboard2.js') }}"></script>
  <script>
    $(function () {
      async function getBookCount(){
        try {
          const response = await fetch('http://localhost/SI-BLOG/public/api/getBookCount');
          const data = await response.json();
          console.log(data);
          $('#jumlah_buku').html(data.book_count);
          $('#jumlah_kategori').html(data.category_count);
        } catch (error) {
          console.error('Error fetching data:', error);
          return null; // Handle errors gracefully, e.g., display an error message
        }
      }
      getBookCount();

      // manual book dan skripsi
      async function getCategoryCountData() {
        try {
          const response = await fetch('http://localhost/SI-BLOG/public/api/getBookCountByCategory');
          const data = await response.json();
          $.each(data, function(i, item) {
            if (data[i].jenis_kategori=='Manual Book') {
              $('#manual_book').html(data[i].total_buku);
            }else if (data[i].jenis_kategori=='Skripsi & TA') {
              $('#skripsi').html(data[i].total_buku);
            }
            // console.log( data[i].jenis_kategori );
          });
        } catch (error) {
          console.error('Error fetching data:', error);
          return null; // Handle errors gracefully, e.g., display an error message
        }
      }
      getCategoryCountData();
    })
  </script>
</body>
</html>