@extends('layout.master')

@section('title','E-Sertifikasi Wakaf Salman ITB')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{$judul}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$judul}}</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- /.box -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $jumlah_donatur }}</h3>

            <p>Donatur</p>
          </div>
          <div class="icon">
            <i class="glyphicon glyphicon-user"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ mata_uang_IDR_desimal_dua($jumlah_donasi_per_bulan->sum('nominal')) }}</h3>

            <p>Donasi Terkumpul ({{ $nama_bulan }})</p>
          </div>
          <div class="icon">
            <i class="glyphicon glyphicon-euro"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{ mata_uang_IDR_desimal_dua($jumlah_donasi) }}</h3>

            <p>Total Donasi</p>
          </div>
          <div class="icon">
            <i class="glyphicon glyphicon-euro"></i>
          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- Main content -->
  <section class="content">
    <!-- /.box -->
    <div class="row">
      <div class="col-md-6">
        <!-- AREA CHART -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Statistik Donatur</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="statistik_donatur" style="height:250px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>

      <div class="col-md-6">
        <!-- AREA CHART -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Statistik Donasi</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="statistik_donasi" style="height:250px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col (RIGHT) -->
    </div>

  </section>
</div>
@endsection