<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></link>
    <link rel="stylesheet" href="css/admin_login.css"/>
</head>
<body>

    <!-- navbar -->
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
        </div>
      </div>
    </nav>
        
    <div class="content text-center">
          <h5>Selamat Datang</h5>
          <h2>Portal Layanan</h2>
          <h2 class="jti">Ruang Baca JTI</h2>
    </div>

    <!-- form login -->
        <div class="container mx-auto">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('actionlogin') }}" method="post">
                                @csrf
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    <b>Opps!</b> {{session('error')}}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" name="username" id="username" required>
                                </div>
                                <div class="form-group pw">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                                <div class="text-center">
                                  <button type="submit" class="btn btn-primary">Login</button>
                                  <a href="{{ url('/') }}" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                            <!-- <div class="mt-3 text-center">
                                Lupa username / password? <a href="https://wa.me/62881026595662">Silahkan hubungi nomor ini.</a> Atau bisa dilihat di buku panduan.
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="bootstrap/dist/js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/style.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>