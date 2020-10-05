<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">KPU Bandar Lampung</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link"><b><?= $user ?></b></a>
        </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url("images/icon.png")?>" alt="AdminLTE Logo" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Gerbang Demokrasi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if($active == 'dashboard'){ ?>
          <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url()?>/admin" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
          <?php }else{ ?>
          <li class="nav-item">
            <a href="<?= base_url()?>/admin" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
                <p>
                <?php } ?>
                Dashboard
              </p>
            </a>
          </li>
          <?php if($active == 'pasangan_calon' || $active == 'tambah_calon'){ ?>
          <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url()?>/pasangan_calon" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
              <?php }else{ ?>
          <li class="nav-item">
            <a href="<?= base_url()?>/pasangan_calon" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
              <?php } ?>
                Pasangan Calon
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if($active == 'tambah_calon'){ ?>
              <li class="nav-item">
                <a href="<?= base_url()?>/tambah_calon" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <?php }else{ ?>
              <li class="nav-item">
                <a href="<?= base_url()?>/tambah_calon" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <?php } ?>
                  <p>Tambah Calon</p>
                </a>
              </li>
              <?php if($active == 'pasangan_calon'){ ?>
              <li class="nav-item">
                <a href="<?= base_url()?>/pasangan_calon" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <?php }else{ ?>
              <li class="nav-item">
                <a href="<?= base_url()?>/pasangan_calon" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <?php } ?>
                  <p>Lihat Calon</p>
                </a>
              </li>
            </ul>
          </li>
          <?php if($active == 'panitia' || $active == 'generate'){ ?>
          <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url()?>/panitia" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <?php }else{ ?>  
          <li class="nav-item ">
            <a href="<?= base_url()?>/panitia" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <?php } ?>
              <p>
                Panitia
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($active == 'panitia'){ ?>
              <li class="nav-item">
                <a href="<?= base_url()?>/panitia" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <?php }else{ ?>
              <li class="nav-item">
                <a href="<?= base_url()?>/panitia" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <?php } ?>
                  <p>Lihat Panitia</p>
                </a>
              </li>
            </ul>
          </li>
          <?php if($active == 'suara_masuk' || $active == 'suara_validasi'){ ?>
          <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url()?>/suara_masuk" class="nav-link active">
              <i class="nav-icon fas fa-volume-up"></i>
              <?php }else{ ?>
            <li class="nav-item">
            <a href="<?= base_url()?>/suara_masuk" class="nav-link">
              <i class="nav-icon fas fa-volume-up"></i>
              <?php } ?>
              <p>
                Suara
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($active == 'suara_masuk'){ ?>
              <li class="nav-item">
                <a href="<?= base_url()?>/suara_masuk" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <?php }else{ ?>
              <li class="nav-item">
                <a href="<?= base_url()?>/suara_masuk" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <?php } ?>
                  <p>Suara Masuk</p>
                </a>
              </li>
              <?php if($active == 'suara_validasi'){ ?>
              <li class="nav-item">
                <a href="<?= base_url()?>/suara_validasi" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <?php }else{ ?>
              <li class="nav-item">
                <a href="<?= base_url()?>/suara_validasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <?php } ?>
                  <p>Suara Validasi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  