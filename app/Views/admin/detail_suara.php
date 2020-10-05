<?= $this->extend('menu/footer'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Suara</a></li>
              <li class="breadcrumb-item active">Detail Suara Tervalidasi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="card card-info">
        <div class="card-header">
        <?php foreach($pasangan as $y);?>
          <h5 class="card-title col-sm-12">Validasi Oleh <?= $y['admin'] ?></h5> 
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="<?= base_url()?>/validasi" method="POST">
        <?= csrf_field() ?>
          <div class="card-body">
            <div class="row">
            <!-- left card -->
              <div class="col-md-6">
                <div class="card card-warning">   
                  <div class="card-header">
                    <h3 class="card-title col-sm-6">FORM C1</h3> 
                  </div> 
                    <img src="<?php echo base_url("images/icon.png")?>" width="relative" height="958" style="opacity: .8">
                </div>  
              </div>
              <!-- end left card -->
              <!-- right card -->
              <?php foreach($data as $x){?>
            <div class="col-md-6">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title col-sm-6">DATA SUARA</h3> 
                    </div> 
                <div class="card-body">    
                  <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Total Suara</label>
                          <div class="col-sm-8">
                            <input readonly type="hidden" class="form-control" name="id_suara" value="<?= $x->id_suara; ?>">
                            <input readonly type="text" class="form-control" name="total_suara" value="<?= $x->total_suara; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Suara Sah</label>
                          <div class="col-sm-8">
                            <input readonly type="text" class="form-control" name="suara_sah" value="<?= $x->suara_sah; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Suara Tidak Sah</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="suara_tidak_sah" value="<?= $x->suara_tidak_sah; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">DPT</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="DPT" value="<?= $x->DPT; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">DPTb</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="DPTb" value="<?= $x->DPTb; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">DPTk</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="DPTk" value="<?= $x->DPTk; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Total DPT</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="total_DPT" value="<?= $x->total_DPT; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Pengguna DPT</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="pengguna_DPT" value="<?= $x->pengguna_DPT; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Pengguna DPTb</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="pengguna_DPTb" value="<?= $x->pengguna_DPTb; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Pengguna DPTk</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="pengguna_DPTk" value="<?= $x->pengguna_DPTk; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Jumlah Pengguna</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="jumlah_pengguna" value="<?= $x->jumlah_pengguna; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Disabilitas</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="disabilitas" value="<?= $x->disabilitas; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Disabilitas Pemilih</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="disabilitas_pemilih" value="<?= $x->disabilitas_pemilih; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Total Surat Suara</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="total_surat_suara" value="<?= $x->total_surat_suara; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Surat Suara Kembali</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="surat_suara_kembali" value="<?= $x->surat_suara_kembali; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Surat Suara Sisa</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="surat_suara_sisa" value="<?= $x->surat_suara_sisa; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Surat Suara Guna</label>
                          <div class="col-sm-8">
                              <input readonly type="text" class="form-control" name="surat_suara_guna" value="<?= $x->surat_suara_guna; ?>">
                          </div>
                        </div>
                    </div>
                </div>
            </div>  
              <?php }?>
            <!-- end right card -->
            <?php foreach($pasangan as $y){ ?>
            <div class="col-md-12">
              <div class="card card-warning ">
              <div class="card-header">
                        <h5 class="card-title col-sm-12"><?= $y['walikota'].' & '.$y['wakilwalikota'] ?></h5> 
                    </div> 
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">No Urut</label>
                      <div class="col-sm-8">
                        <input readonly type="text" class="form-control" name="no_urut[]" value="<?= $y['no_urut'] ?>">
                      </div>
                    </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Hasil Suara</label>
                      <div class="col-sm-8">
                        <input readonly type="text" class="form-control" name="hasil_suara[]" value="<?= $y['hasil_suara'] ?>">
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          <!-- end card body -->
        </form>
      </div>
      <!-- /.card -->
    <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div>
  <?= $this->endSection(); ?>