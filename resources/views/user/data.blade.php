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
      <div class="box-body pull-right">
        <a href="" class="btn btn-info mb-4" data-toggle="modal" data-target="#modal-tambah-user"><i class="glyphicon glyphicon-plus"></i> Tambah User</a>
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- /.box -->

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Pengaturan User</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @php
              $no = 1;
          @endphp    
          @foreach($data as $row)
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->roles }}</td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Aksi
                  <span class="fa fa-caret-down"></span></button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="" data-toggle="modal" data-target="#modal-rubah-user-{{ $row->id }}">Edit</a></li>
                  <li><a href="#" class="hapus-user" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a></li>
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

@include('user.modal')

@endsection