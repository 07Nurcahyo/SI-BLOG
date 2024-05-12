<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Buku</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-white navbar-light sticky-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="main" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" style="display: none;">
        <a href="#" class="nav-link" onclick="topFunction()">Back to top</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: url({{asset('img/sidebar.png')}}) rgba(0, 0, 0, 0.7); background-size: cover; background-blend-mode: darken; position: fixed;">
    <!-- Brand Logo -->
    <a href="main" class="brand-link">
      <img src="{{asset('img/ekatalog.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">E-Katalog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header pt-4">FILTER</li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Penulis
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @foreach ($penulis as $item)
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{$item->penulis}}</p>
                  </a>
                </li>
              @endforeach
            </ul>
          </li> --}}
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-male"></i>
              <p>
                Penerbit
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @foreach ($penerbit as $item)
                <li class="nav-item">
                  <a href="{{url('/listbook?penerbit='.$item->id_penerbit)}}" class="nav-link">
                    <i class="fas fa-arrow-right nav-icon" style="font-size: 13px"></i>
                    <p style="font-size: 13px">{{$item->nama_penerbit}}</p>
                  </a>
                </li>
              @endforeach
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Tahun Terbit
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @foreach ($tahun_terbit as $item)
                <li class="nav-item">
                  <a href="{{url('/listbook?tahun_terbit='.$item->tahun_terbit)}}" class="nav-link">
                    <i class="fas fa-arrow-right nav-icon" style="font-size: 13px"></i>
                    <p style="font-size: 13px">{{$item->tahun_terbit}}</p>
                  </a>
                </li>
              @endforeach
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Kategori
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @foreach ($kategori as $item)
                <li class="nav-item">
                  <a href="{{url('/listbook?kategori='.$item->id_kategori)}}" class="nav-link">
                    <i class="fas fa-arrow-right nav-icon" style="font-size: 13px"></i>
                    <p style="font-size: 13px">{{$item->jenis_kategori}}</p>
                  </a>
                </li>
              @endforeach
            </ul>
          </li> 
          <li class="nav-item pt-4">
            <a class="nav-link active text-bold" href="{{url('/listbook')}}" style="background-color: #218838">
              <i class="fas fa-filter nav-icon"></i>
              <p>Reset Filter</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="main">Home</a></li>
              <li class="breadcrumb-item active">Daftar Buku</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              {{-- <div class="card-header">
                <h4 class="card-title">FilterizR Gallery with Ekko Lightbox</h4>
              </div> --}}
              <div class="card-body">
                <div>
                  <div class="mb-2">
                    <a class="btn btn-success" href="{{url('/listbook')}}">
                      Reset Filter 
                      <i class="fas fa-sync-alt nav-icon" style="font-size: 13px"></i>
                    </a>
                    <div class="float-right">
                      <div class="btn-group">
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending <i class="fas fa-arrow-up"></i></a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending <i class="fas fa-arrow-down"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="p-0 row">
                    @foreach ($buku as $b)
                    <div class="col-sm-2">
                      <a href="{{asset('img/coverdummy.png')}}" data-toggle="modal" data-title="{{$b->judul_buku}}" data-target="#modal-default" data-idbuku="{{$b->id_buku}}" name="list_buku">
                        <img src="{{asset('img/coverdummy.png')}}" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                      <table class="table table-borderless table-sm w-auto">
                        <tr>
                          <th class="py-0">Judul</th>
                          <td class="py-0">:</td>
                          <td class="py-0">
                            <div class="d-inline-block text-truncate" style="max-width: 100px;">{{$b->judul_buku}}</div>
                          </td>
                        </tr>
                        <tr>
                          <th class="py-0">Penulis</th>
                          <td class="py-0">:</td>
                          <td class="py-0">
                            <div class="d-inline-block text-truncate" style="max-width: 100px;">{{$b->penulis}}</div>
                          </td>
                        </tr>
                        <tr>
                          <th class="py-0">Penerbit</th>
                          <td class="py-0">:</td>
                          <td class="py-0">
                            <div class="d-inline-block text-truncate" style="max-width: 100px;">{{$b->penerbit->nama_penerbit}}</div>
                          </td>
                        </tr>
                      </table>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="margin: 0px; padding: 0px" >
          <div class="card-body">
            <div class="row">
              <img src="{{asset('img/coverdummy.png')}}" class="card-img-top col-sm-4" alt="..." style="height: 100%; width: 100%;" id="cover-modal">
              <div class="col-sm-8">
                  <table class="table table-borderless table-sm w-auto">
                    <tr>
                      <td>Penerbit</td>
                      <td>:</td>
                      <td id="penerbit"></td>
                    </tr>
                    <tr>
                      <td>Judul buku</td>
                      <td>:</td>
                      <td id="judul_buku"></td>
                    </tr>
                    <tr>
                      <td>Penulis</td>
                      <td>:</td>
                      <td id="penulis"></td>
                    </tr>
                    <tr>
                      <td>Kategori</td>
                      <td>:</td>
                      <td id="kategori"></td>
                    </tr>
                  </table>
              </div>
            </div> <br>
            <h5>Ketersediaan</h5>
            <hr class="border border-3" style="margin-top: -5px; margin-bottom: 5px;">
            <p class="card-text" id="ketersediaan">tersedia</p> {{-- jika stok = 0 maka tidak tersedia --}}
            <br>
            <h5>Lokasi Buku</h5>
            <hr class="border border-3" style="margin-top: -5px; margin-bottom: 5px;">
              <table class="table table-borderless table-sm w-auto">
                <tr>
                  <td>Ruangan</td>
                  <td>:</td>
                  <td id="ruangan"></td>
                </tr>
                <tr>
                  <td>Rak</td>
                  <td>:</td>
                  <td id="rak"></td>
                </tr>
              </table>
            <br>
            <h5>Deskripsi Buku</h5>
            <hr class="border border-3" style="margin-top: -5px; margin-bottom: 5px;">
              <table class="table table-borderless table-sm w-auto">
                <tr>
                  <td>ISBN</td>
                  <td>:</td>
                  <td id="isbn"></td>
                </tr>
                <tr>
                  <td>Judul Buku</td>
                  <td>:</td>
                  <td id="judul_buku_2"></td>
                </tr>
                <tr>
                  <td>Tahun Terbit</td>
                  <td>:</td>
                  <td id="tahun_terbit"></td>
                </tr>
                <tr>
                  <td>Penerbit</td>
                  <td>:</td>
                  <td id="penerbit_2"></td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td>:</td>
                  <td id="kategori_2"></td>
                </tr>
                <tr>
                  <td>Penulis</td>
                  <td>:</td>
                  <td id="penulis_2"></td>
                </tr>
              </table>
          </div>         
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Ekko Lightbox -->
<script src="{{ asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- Filterizr-->
<script src="{{ asset('adminlte/plugins/filterizr/jquery.filterizr.min.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    //   event.preventDefault();
    //   $(this).ekkoLightbox({
    //     alwaysShowClose: false,
    //     // onShown: function() {
    //     // }
    //   });
    //   console.log($('.ekko-lightbox-container'));
    //   // Append alert message to the lightbox container
    //   const description = $('<div></div>')
    //     .addClass('description')
    //     .css({
    //       position: 'absolute',
    //       bottom: '0px',
    //       // right: '10px',
    //       'background-color': 'rgba(0, 0, 0, 0.5)',
    //       padding: '5px',
    //       'border-radius': '5px',
    //     })
    //     .append($('<p></p>').addClass('text-light').text($('#kata').text()));
    //   $('.ekko-lightbox-container').append(description);
    // });
    // $('.filter-container').filterizr({gutterPixels: 3});
    // $('.btn[data-filter]').on('click', function() {
    //   $('.btn[data-filter]').removeClass('active');
    //   $(this).addClass('active');
    // });
    
    
    // $('.list_buku').each(function() {
      $("#modal-default").on('show.bs.modal', function(event) {
        console.log("tes");
        console.log(event);
        const idBuku = $(event.relatedTarget).data('idbuku');
        getDataBuku(idBuku);
        $('#modalBuku').modal('show');
      });
    // });
    function getDataBuku(idBuku) {
      $.ajax({
        url: 'http://localhost/SI-BLOG/public/api/getDataBuku/' + idBuku,
        method: 'GET',
        success: function(data) {
          $('#isbn').text(data.isbn);
          $('#judul_buku').text(data.judul_buku);
          $('#penulis').text(data.penulis);
          $('#penerbit').text(data.penerbit.nama_penerbit);
          $('#kategori').text(data.kategori.jenis_kategori);
          $('#tahun_terbit').text(data.tahun_terbit);
          $('#ruangan').text(data.lokasi.nama_ruang);
          $('#rak').text(data.lokasi.nama_rak);
          if(data.stok == 0) {
            $('#cover-modal').attr('src', "{{asset('img/sidebar.png')}}");
            $('#ketersediaan').text("Tidak Tersedia");
          } else {
            $('#cover-modal').attr('src', "{{asset('img/coverdummy.png')}}");
            $('#ketersediaan').text("Tersedia");
          }
          $('#judul_buku_2').text(data.judul_buku);
          $('#penulis_2').text(data.penulis);
          $('#penerbit_2').text(data.penerbit.nama_penerbit);
          $('#kategori_2').text(data.kategori.jenis_kategori);
        },
        error: function(error) {
          console.log(error);
        }
      });
    }

    

  })
</script>
</body>
</html>

