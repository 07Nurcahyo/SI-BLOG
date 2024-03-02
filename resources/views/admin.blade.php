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
      </form>
    </div>
  </div>
</nav>

<!-- tes qr -->
    <div class="container">
      <div class="row justify-content-md-center">
        
        <h1 class="text-danger pt-4 text-center mb-4"><b>List of Products</b></h1>
        <hr>
        <div class="pb-2">
          <a href="/SI-BLOG/public/create" class="btn btn-success">New Post</a>

        </div>
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Title</th>
                      <th scope="col">Price</th>
                      <th scope="col">Barcode</th>
                      <th scope="col">Description</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($products as $product)
                    <tr>
                        <th>{{ $product->id }}</th>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <!-- {!! DNS2D::getBarcodeHTML("$product->product_code",'DATAMATRIX') !!} -->
                            <!-- {!! DNS1D::getBarcodeHTML("$product->product_code",'PHARMA',2,100) !!} -->
                            <!-- {!! DNS2D::getBarcodeHTML("$product->title",'QRCODE') !!} -->
                            {!! DNS2D::getBarcodeHTML(
                                "[ Informasi Buku ]
Judul     : $product->title
Harga     : $product->price 
Deskripsi : $product->description
Rak       : Ruang Baca"
                            ,'QRCODE',2,2) !!}
                            p - {{ $product->product_code }}
                        </td>
                        <td>{{ $product->description }}</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
                
            
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>