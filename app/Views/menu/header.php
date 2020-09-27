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
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
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
      <img src="images/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
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
            <a href="/admin" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
          <?php }else{ ?>
          <li class="nav-item">
            <a href="/admin" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
                <p>
                <?php } ?>
                Dashboard
              </p>
            </a>
          </li>
          <?php if($active == 'pasangan_calon' || $active == 'tambah_calon'){ ?>
          <li class="nav-item has-treeview menu-open">
            <a href="/pasangan_calon" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
              <?php }else{ ?>
          <li class="nav-item">
            <a href="/pasangan_calon" class="nav-link">
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
                <a href="/tambah_calon" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <?php }else{ ?>
              <li class="nav-item">
                <a href="/tambah_calon" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <?php } ?>
                  <p>Tambah Calon</p>
                </a>
              </li>
              <?php if($active == 'pasangan_calon'){ ?>
              <li class="nav-item">
                <a href="/pasangan_calon" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <?php }else{ ?>
              <li class="nav-item">
                <a href="/pasangan_calon" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <?php } ?>
                  <p>Lihat Calon</p>
                </a>
              </li>
            </ul>
          </li>
          <?php if($active == 'panitia' || $active == 'generate'){ ?>
          <li class="nav-item has-treeview menu-open">
            <a href="/panitia" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <?php }else{ ?>  
          <li class="nav-item ">
            <a href="/panitia" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <?php } ?>
              <p>
                Panitia
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if($active == 'generate'){ ?>
              <li class="nav-item">
                <a href="/generate" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <?php }else{ ?>
              <li class="nav-item">
                <a href="/generate" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <?php } ?>
                  <p>Generate Akun Panitia</p>
                </a>
              </li>
              <?php if($active == 'panitia'){ ?>
              <li class="nav-item">
                <a href="/panitia" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <?php }else{ ?>
              <li class="nav-item">
                <a href="/panitia" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <?php } ?>
                  <p>Lihat Panitia</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/suara" class="nav-link">
              <i class="nav-icon fas fa-volume-up"></i>
              <p>
                Suara
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
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

  