@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="card-title">Koleksi Ruang Baca</h5>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <div class="btn-group">
                          <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a href="#" class="dropdown-item">ini link</a>
                            {{-- <a href="#" class="dropdown-item">Another action</a>
                            <a href="#" class="dropdown-item">Something else here</a>
                            <a class="dropdown-divider"></a>
                            <a href="#" class="dropdown-item">Separated link</a> --}}
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-8">
                          <p class="text-center">
                            <strong>Jumlah Buku Berdasarkan Tahun Terbit</strong>
                          </p>
      
                          <div class="chart">
                            <!-- Sales Chart Canvas -->
                            {{-- <canvas id="salesChart" height="180" style="height: 180px;"></canvas> --}}
                            <canvas id="bukuChart" height="" style="height: 180px;"></canvas>
                          </div>
                          <!-- /.chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                          <div class="chart">
                            <p class="text-center">
                              <strong>Jumlah Kategori</strong>
                            </p>
                            <canvas id="kategoriChart" height="300" style=""></canvas>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                            {{-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> --}}
                            <h5 class="description-header" id="jumlah_buku">0</h5>
                            <span class="description-text">JUMLAH BUKU</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                            {{-- <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span> --}}
                            <h5 class="description-header" id="jumlah_kategori">0</h5>
                            <span class="description-text">JUMLAH KATEGORI</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                            {{-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span> --}}
                            <h5 class="description-header" id="jumlah_penerbit">0</h5>
                            <span class="description-text">JUMLAH PENERBIT</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                          <div class="description-block">
                            {{-- <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span> --}}
                            <h5 class="description-header" id="jumlah_penulis">0</h5>
                            <span class="description-text">JUMLAH PENULIS</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
{{-- <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script> --}}
{{-- <script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script> --}}
<script>
  $(function () {
    //buku
    const ctx = document.getElementById('bukuChart').getContext('2d');
    const apiUrl = 'http://localhost/SI-BLOG/public/api/getBookCountByYear';
    async function fetchBookCountData() {
      try {
        const response = await fetch(apiUrl);
        const data = await response.json();
        return data;
      } catch (error) {
        console.error('Error fetching data:', error);
        return null; // Handle errors gracefully, e.g., display an error message
      }
    }
    async function createBookCountChart() {
      const bookCountData = await fetchBookCountData();
      if (!bookCountData) {
        return; // Handle data fetching errors
      }
      const chartData = {
        labels: bookCountData.map(item => item.tahun_terbit),
        datasets: [{
          label: 'Jumlah Buku',
          data: bookCountData.map(item => item.total_buku),
          backgroundColor: bookCountData.map((item, index) => {
            // Generate a random hue based on item length (0-360 degrees)
            const hue = (index * 360) / bookCountData.length;
            // Randomly adjust saturation (0-100%) and lightness (0-100%)
            const saturation = Math.floor(Math.random() * 100) + 1; // 1-100
            const lightness = Math.floor(Math.random() * 50) + 50; // 50-100
            // Create the color string in HSL format
            return `hsl(${hue}, ${saturation}%, ${lightness}%)`;
          }),
          borderColor: '',
          borderWidth: 1
        }]
      };
      const chartOptions = {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        legend: {
          display: false
          // position: 'bottom'
        }
      };
      new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: chartOptions
      });
    }
    createBookCountChart();

    // kategori
    const ctxKategori = document.getElementById('kategoriChart').getContext('2d');
    const apiUrlKategori = 'http://localhost/SI-BLOG/public/api/getBookCountByCategory';
    async function fetchCategoryCountData() {
      try {
        const response = await fetch(apiUrlKategori);
        const data = await response.json();
        return data;
      } catch (error) {
        console.error('Error fetching data:', error);
        return null; // Handle errors gracefully, e.g., display an error message
      }
    }
    async function createCategoryCountChart() {
      const categoryCountData = await fetchCategoryCountData();
      if (!categoryCountData) {
        return; // Handle data fetching errors
      }
      const pieData = {
        labels: categoryCountData.map(item => item.jenis_kategori),
        datasets: [{
          label: 'Jumlah Kategori',
          data: categoryCountData.map(item => item.total_buku),
          backgroundColor: categoryCountData.map((item, index) => {
            // Generate a random hue based on item length (0-360 degrees)
            const hue = (index * 360) / categoryCountData.length;
            // Randomly adjust saturation (0-100%) and lightness (0-100%)
            const saturation = Math.floor(Math.random() * 100) + 1; // 1-100
            const lightness = Math.floor(Math.random() * 50) + 50; // 50-100
            // Create the color string in HSL format
            return `hsl(${hue}, ${saturation}%, ${lightness}%)`;
          }),
          // backgroundColor: 'rgba(255, 99, 132, 0.2)',
          // borderColor: 'rgba(255, 99, 132, 1)',
          // borderWidth: 1
        }]
      };
      const pieOptions = {
        legend: {
          display: true,
          position: 'bottom'
        }
      };
      new Chart(ctxKategori, {
        type: 'doughnut',
        data: pieData,
        options: pieOptions
      });
    }
    createCategoryCountChart();

    // get kategori dkk
    async function getBookCount(){
      try {
        const response = await fetch('http://localhost/SI-BLOG/public/api/getBookCount');
        const data = await response.json();
        $('#jumlah_buku').html(data.book_count);
        $('#jumlah_kategori').html(data.category_count);
        $('#jumlah_penerbit').html(data.publisher_count);
        $('#jumlah_penulis').html(data.distinct_author_count);
      } catch (error) {
        console.error('Error fetching data:', error);
        return null; // Handle errors gracefully, e.g., display an error message
      }
    }
    getBookCount();
  })
</script>
@endpush