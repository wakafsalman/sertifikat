@extends('layout.master')

@section('title', 'E-Sertifikasi Wakaf Salman ITB')

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

  <section class="content-header">  
    <div class="row">
      <div class="col-xs-12">
        <div class="box-body pull-right">
          <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Aksi
              <span class="fa fa-caret-down"></span></button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="" class="hapus_semua">Hapus</a></li>
            </ul>
          </div>
          <a href="" class="btn btn-info mb-4" data-toggle="modal" data-target="#modal-tambah-donatur"><i class="glyphicon glyphicon-plus"></i> Tambah Sertifikat</a>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-import-donatur">
          <i class="glyphicon glyphicon-open"></i>
            Import Data
          </button>
        </div>
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Donasi</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th><input type="checkbox" id="ceklis_semua"></th>
            <th>No</th>
            <th>No Sertifikat</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Nominal</th>
            <th>Dibuat Oleh</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
          <tr id="tr_{{ $row->id }}">
            <th scope="row"><input type="checkbox" class="checkbox" data-id="{{ $row->id }}"></th>
            <td>{{ $no++ }}</td>
            <td><a href="/sertifikat/{{ $row->id }}/preview">{{ $row->no_sertifikat }}</a></td>
            <td>{{ $row->tanggal_indo }}</td>
            <td>{{ $row->nama }}</td>
            <td>Rp. {{ number_format($row->nominal, 0, ',',',') }}.00,-</td>
            <td>{{ $row->users->nama }}</td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Aksi
                  <span class="fa fa-caret-down"></span></button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/eksport_pdf/{{ $row->id }}">Eksport PDF</a></li>
                  <li><a href="" data-toggle="modal" data-target="#modal-rubah-donatur-{{ $row->id }}">Edit</a></li>
                  <li><a href="#" class="hapus" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a></li>
                </ul>
              </div>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

  </section>
  <!-- /.content -->
</div>

@include('donatur.modal')

@endsection