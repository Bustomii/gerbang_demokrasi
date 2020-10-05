
<?= $this->extend('menu/footer'); ?>
<?= $this->section('content'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <!-- Main content -->
      <div class="container-fluid">

      <!-- content message -->
      <?php if(session()->getFlashData('success')){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashData('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div><?php }?>
        <!-- end message -->
        
        <div class="row mb-2">
            <div class="col-12 col-sm-6 col-md-6">
              <div class="info-box">
                <button type="button" id="temporary"name ="temporary" class="info-box-icon bg-danger elevation-1 col-md-12"><i class="fas fa-calendar-alt"></i>
                  <span class="info-box-text"> Hasil Perolehan Sementara</span></button>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-6">
              <div class="info-box mb-3">
                <button type="button" id="hasil" name="hasil" class="info-box-icon bg-success elevation-1 col-md-12"><i class="fas fa-check"></i>
                <span class="info-box-text"> Hasil Perolehan Final </span></button>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
        <!-- Info boxes -->
      <div class="temporary">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Daftar Pemilih Tetap</span>
                <span class="info-box-number">
                  <?= $total_dpt; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Suara Sah</span>
                <span class="info-box-number"><?php if($suara_sah==NULL){echo 0;}else{ echo $suara_sah;};?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-window-close"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Suara Rusak</span>
                <span class="info-box-number"><?php if($suara_rusak==NULL){echo 0;}else{ echo $suara_rusak;};?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-map"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Tps</span>
                <span class="info-box-number"><?= $total_tps;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Report Perolehan Suara</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
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
                      <!-- Sales Chart Canvas -->
                      <canvas id="kpu-temporary" height="420" style="height: 420px;"></canvas>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>SUARA MASUK</strong>
                    </p>

                    <div class="progress-group">
                      Total Suara Masuk
                      <span class="float-right"><b><?php if($suara_dpt==NULL){echo 0;}else{ echo $suara_dpt+$suara_sah;};?></b>/<?= $total_dpt; ?></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-info" style="width:  <?php if($suara_dpt==NULL){echo 0/$total_dpt*100;}else{ echo $suara_dpt/$total_dpt*100;};?>%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Total Suara Masuk DPTb
                      <span class="float-right"><b><?php if($suara_dpt==NULL){echo 0;}else{ echo $suara_dpt;};?></b></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-info" style="width:  <?php if($suara_dpt==NULL){echo 0/$total_dpt*100;}else{ echo $suara_dpt/$total_dpt*100;};?>%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    
                    <div class="progress-group">
                      <span class="progress-text">Total Suara Masuk DPTk</span>
                      <span class="float-right"><b><?php if($suara_sah==NULL){echo 0;}else{ echo $suara_sah;};?></b></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width:<?php if($suara_rusak==NULL){echo 0/$total_dpt*100;}else{ echo $suara_rusak/$total_dpt*100;}?>%"></div>
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
                <?php if($grafik->getResultArray()!=NULL){
                foreach ($grafik->getResultArray() as $x){?>
                  <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                      <h1><span class="description-percentage text-success"></i><?= round(($x['jumlah_suara']/($suara_sah)*100),3)?>%</span></h1>
                      <h2 class="description-header"><?= $x['no_urut'];?></h2>
                      <span class="description-text"><?= $x['walikota'];?></span>
                      <p class="description-text"><?= $x['wakilwalikota'];?></p>
                    </div>
                    <!-- /.description-block -->
                  </div>
                <?php }} else { foreach ($calon->getResultArray() as $x){?>
                <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                    <h1><span class="description-percentage text-success"></i>0%</span></h1>
                      <h2 class="description-header"><?= $x['no_urut'];?></h2>
                      <span class="description-text"><?= $x['nama_ketua'];?></span>
                      <p class="description-text"><?= $x['nama_wakil'];?></p>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <?php } }?>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
        </div>
      </div>
            <!-- /.card -->
            <!-- Info boxes -->
      <div class="hasil">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Daftar Pemilih Tetap</span>
                <span class="info-box-number">
                  <?= $total_dpt; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Suara Sah</span>
                <span class="info-box-number"><?php echo 0;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-window-close"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Suara Rusak</span>
                <span class="info-box-number"><?php echo 0;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-map"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Tps</span>
                <span class="info-box-number"><?= $total_tps;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Report Perolehan Suara Final</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
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
                      <!-- Sales Chart Canvas -->
                      <canvas id="kpu-temporary" height="420" style="height: 420px;"></canvas>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>SUARA MASUK</strong>
                    </p>

                    <div class="progress-group">
                      Total Suara Masuk
                      <span class="float-right"><b><?php if($suara_dpt==NULL){echo 0;}else{ echo $suara_dpt+$suara_sah;};?></b>/<?= $total_dpt; ?></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-info" style="width:  <?php if($suara_dpt==NULL){echo 0/$total_dpt*100;}else{ echo $suara_dpt/$total_dpt*100;};?>%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Total Suara Masuk DPTb
                      <span class="float-right"><b><?php echo 0;?></b></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-info" style="width:  <?php if($suara_dpt==NULL){echo 0/$total_dpt*100;}else{ echo $suara_dpt/$total_dpt*100;};?>%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    
                    <div class="progress-group">
                      <span class="progress-text">Total Suara Masuk DPTk</span>
                      <span class="float-right"><b><?php echo 0;?></b></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width:<?php if($suara_rusak==NULL){echo 0/$total_dpt*100;}else{ echo $suara_rusak/$total_dpt*100;}?>%"></div>
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
                <?php if($cekgrafik==0){
                foreach ($grafik->getResultArray() as $x){?>
                  <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                      <h1><span class="description-percentage text-success"></i><?= round(($x['jumlah_suara']/($suara_sah)*100),3)?>%</span></h1>
                      <h2 class="description-header"><?= $x['no_urut'];?></h2>
                      <span class="description-text"><?= $x['walikota'];?></span>
                      <p class="description-text"><?= $x['wakilwalikota'];?></p>
                    </div>
                    <!-- /.description-block -->
                  </div>
                <?php }} else { foreach ($calon->getResultArray() as $x){?>
                <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                    <h1><span class="description-percentage text-success"></i>0%</span></h1>
                      <h2 class="description-header"><?= $x['no_urut'];?></h2>
                      <span class="description-text"><?= $x['nama_ketua'];?></span>
                      <p class="description-text"><?= $x['nama_wakil'];?></p>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <?php } }?>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div><!--/. container-fluid -->
    </section>
  <!-- /.content-wrapper -->
  <?= $this->endSection(); ?>