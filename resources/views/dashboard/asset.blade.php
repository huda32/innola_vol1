@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
            <a href="/computer">
                <div class="info-box bg-gradient-info">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Komputer</span>
                <span class="info-box-number">{{ $computer}}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  Seluruh Asset Komputer
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
   
      <!-- ./col -->
      <div class="col-md-3 col-sm-6 col-12">
        <a href="/tool">
        <div class="info-box bg-gradient-warning">
          <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Printer Dan Piranti Lain</span>
            <span class="info-box-number">{{ $tool}}</span>

            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              Seluruh Asset Tool IT
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
      </a>
        <!-- /.info-box -->
      </div>
      <!-- ./col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-gradient-danger">
          <span class="info-box-icon"><i class="fas fa-comments"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Server Dan Konfigurasi</span>
            <span class="info-box-number">41,410</span>

            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- ./col -->
      <div class="col-md-3 col-sm-6 col-12">
        <a href="/cctv">
        <div class="info-box bg-gradient-success">
          <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">CCTV</span>
            <span class="info-box-number">41,410</span>

            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </a>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-gradient-success">
          <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Konfigurasi IP</span>
            <span class="info-box-number">41,410</span>

            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-gradient-danger">
          <span class="info-box-icon"><i class="fas fa-comments"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Internet Dan Telfon</span>
            <span class="info-box-number">41,410</span>

            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-gradient-warning">
          <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Stock</span>
            <span class="info-box-number">41,410</span>

            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <a href="#">
            <div class="info-box bg-gradient-info">
          <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Purchase IT</span>
            <span class="info-box-number">41,410</span>

            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        </a>
        <!-- /.info-box -->
      </div>
    </div>
   
  </div><!-- /.container-fluid -->
 
@endsection

