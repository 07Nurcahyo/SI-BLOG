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
                          <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-wrench"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a href="#" class="dropdown-item">ini link</a>
                            {{-- <a href="#" class="dropdown-item">Another action</a>
                            <a href="#" class="dropdown-item">Something else here</a>
                            <a class="dropdown-divider"></a>
                            <a href="#" class="dropdown-item">Separated link</a> --}}
                          </div>
                        </div>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-8">
                          <p class="text-center">
                            <strong>Buku yang paling banyak di cari Bulan ini</strong>
                          </p>
      
                          <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                          </div>
                          <!-- /.chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                          <p class="text-center">
                            <strong>Jumlah</strong>
                          </p>
      
                          <div class="progress-group">
                            Kategori
                            <span class="float-right"><b>160</b>/200</span>
                            <div class="progress progress-sm">
                              <div class="progress-bar bg-primary" style="width: 80%"></div>
                            </div>
                          </div>
                          <!-- /.progress-group -->
      
                          <div class="progress-group">
                            Buku Ruang Baca
                            <span class="float-right"><b>310</b>/400</span>
                            <div class="progress progress-sm">
                              <div class="progress-bar bg-danger" style="width: 75%"></div>
                            </div>
                          </div>
      
                          <!-- /.progress-group -->
                          <div class="progress-group">
                            <span class="progress-text">Manual Book</span>
                            <span class="float-right"><b>480</b>/800</span>
                            <div class="progress progress-sm">
                              <div class="progress-bar bg-success" style="width: 60%"></div>
                            </div>
                          </div>
      
                          <!-- /.progress-group -->
                          <div class="progress-group">
                            Skripsi & Tugas Akhir
                            <span class="float-right"><b>250</b>/500</span>
                            <div class="progress progress-sm">
                              <div class="progress-bar bg-warning" style="width: 50%"></div>
                            </div>
                          </div>
                          <!-- /.progress-group -->
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
                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                            <h5 class="description-header">$35,210.43</h5>
                            <span class="description-text">TOTAL REVENUE</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                            <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                            <h5 class="description-header">$10,390.90</h5>
                            <span class="description-text">TOTAL COST</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                            <h5 class="description-header">$24,813.53</h5>
                            <span class="description-text">TOTAL PROFIT</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                          <div class="description-block">
                            <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                            <h5 class="description-header">1200</h5>
                            <span class="description-text">GOAL COMPLETIONS</span>
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
<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
@endpush