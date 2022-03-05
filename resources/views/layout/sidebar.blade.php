<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('img/wakaf-salman-bg.png')  }}" class="img-circle" alt="User Image" style="width:45px; height:45px;">
      </div>
      <div class="pull-left info">
        <p>Welcome,</p>
        <p><b>{{ Auth::user()->nama }}</b></p>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU UTAMA</li>
      <li class="{{ request()->is('beranda') ? 'active' : '' }}"><a href="/beranda"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="{{ request()->is('donatur') ? 'active' : '' }}"><a href="/donatur"><i class="glyphicon glyphicon-user"></i><span>Donasi</span></a></li>
      <li class="{{ request()->is('user') ? 'active' : '' }}"><a href="/user"><i class="glyphicon glyphicon-user"></i><span>Pengaturan</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
