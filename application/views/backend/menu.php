<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    .bg-menu{
      background-image: linear-gradient(#09aac7 55%, #0ff02d);
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion bg-menu" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
    <div class="sidebar-brand-icon">
      <!-- Ganti ikon dengan gambar lokal -->
      <img src="<?= base_url('assets\images\logo_polos.png'); ?>" alt="Your Logo" width="50">
    </div>
    <div class="sidebar-brand-text mx-3">Mama <sup>laundry</sup></div>
  </a>

  
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
  
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="<?= base_url('dashboard'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
  
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('konsumen'); ?>">
        <i class="fas fa-users"></i><span>Data Konsumen</span>
      </a>
    </li>
  
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('paket'); ?>">
        <i class="fas fa-box-open"></i><span>Data Paket</span>
      </a>
    </li>
  
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('transaksi/tambah') ?>">
        <i class="fas fa-dollar-sign"></i><span>Tambah Transaksi</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('transaksi/riwayat') ?>">
        <i class="fas fa-history"></i><span>Riwayat Transaksi</span>
      </a>
    </li>
  
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('laporan'); ?>">
        <i class="fas fa-file-alt"></i><span>Laporan</span>
      </a>
    </li>

    <hr class="sidebar-divider d-none d-mb-block">

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('login/logout'); ?>">
        <i class="fas fa-sign-out-alt"></i><span>Logout</span>
      </a>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
  
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  
  </ul>
  <!-- End of Sidebar -->
  
</body>
</html>
