<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI-BLOG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></link>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body >

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <img src="img/jti.png" class="logo-jti" alt="">
    <a class="navbar-brand" href="#">SI-BLOG</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <form class="d-flex">
        <button type="button" class="btn btn-success rounded-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Login admin🙍‍♂️</button>
      </form>
    </div>
  </div>
</nav>

<!-- form login admin -->
<div class="modal modal-centered fade" id="exampleModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Passowrd...">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>

<!-- Content -->
<!-- <div class="text-center">
  <h3>Selamat Datang</h3> -->
  <section class="search" id="search">
    <!-- <div class="content"> -->
      <div class="input-group mb-3 searchfield">
        <input type="text" class="form-control searchfield" placeholder="Cari Buku..." aria-label="" aria-describedby="basic-addon1">
        <div class="input-group-prepend">
          <button class="btn btn-secondary btncari" type="button">Cari</button>
        </div>
      </div>
    <!-- </div> -->
  </section>
<!-- </div> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>