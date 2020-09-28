<?= $this->extend('menu/footer'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DATA CALON PASANGAN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title col-sm-6">Data Ketua</h3>
          <h3 class="card-title col-sm-6 float-right">Data Wakil</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="<?php echo base_url('AdminControllers/save') ?>" method="POST">
          <div class="card-body">
            <div class="row">
            <!-- left card -->
              <div class="col-md-6">
                <div class="card card-primary ">
                  <div class="card-body">
                    <!-- input nama -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Nama Lengkap*</label>
                      <div class="col-sm-8">
                        <input required type="text" class="form-control" id="nama_lengkap1" name="nama_lengkap1" placeholder="Nama Lengkap" value="">
                      </div>
                    </div>
                    <!-- input nik -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">NIK*</label>
                      <div class="col-sm-8">
                        <input required type="text" maxlength="16" class="form-control" id="nik1" name="nik1" placeholder="NIK KTP">
                      </div>
                    </div>
                    <!-- input tempat/tanggal lahir -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Tempat /Tgl Lahir*</label>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-md-6">
                            <input required type="text" class="form-control" id="tempat_lahir1" name="tempat_lahir1" placeholder="Tempat Lahir" value="">
                          </div>
                          <div class="col-md-6">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="far fa-calendar-alt"></i>
                                </span>
                              </div>
                              <input required type="text" class="form-control float-right" id="tgl_lahir1" name="tgl_lahir1" placeholder="Tgl Lahir" value="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- input jenis kelamin -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Jenis Kelamin*</label>
                      <div class="col-sm-8">
                        <div class="icheck-primary d-inline col-md-2">
                          <input type="radio" id="radioPrimary1" name="jenis_kelamin1" value="Pria">
                          <label for="radioPrimary1">
                          Pria     
                          </label>
                        </div>
                        <div class="icheck-primary d-inline col-md-2">
                          <input type="radio" id="radioPrimary2" name="jenis_kelamin1" value="Pria">
                          <label for="radioPrimary2">
                          Wanita
                          </label>
                        </div>
                      </div>
                    </div>
                    <!-- input agama -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Agama*</label>
                      <div class="col-sm-8">
                          <input required type="text" class="form-control" id="agama1" name="agama1" placeholder="Agama" value="">
                      </div>
                    </div>
                    <!-- input alamat rumah -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Alamat Rumah*</label>
                      <div class="col-sm-8">
                        <textarea required name="alamat_rumah1" id="alamat_rumah1" rows="4" style="width:100%"></textarea>
                          <input required type="text" class="form-control" id="kecamatan1" name="kecamatan1" placeholder="Kecamatan" value=""><br>
                          <input required type="text" class="form-control" id="kelurahan1" name="kelurahan1" placeholder="Kelurahan" value="">
                      </div>
                    </div>
                    <!-- input no.telepon/email -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">No. Telepon/Email</label>
                      <div class="col-sm-8">
                          <input required type="text" class="form-control" id="no_hp1" name="no_hp1" placeholder="HP *)" value="">
                        <br>
                            <input type="text" class="form-control" id="email1" name="email1" placeholder="E-mail" value="">
                      </div>
                    </div>
                    <!-- input pekerjaan -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Pekerjaan*</label>
                      <div class="col-sm-8">
                          <input required type="text" class="form-control" id="pekerjaan1" name="pekerjaan1" placeholder="Pekerjaan" value="">
                      </div>
                    </div>
                    <!-- input status perkawinan -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Status Perkawinan*</label>
                      <div class="col-sm-8">
                        <div class="form-group"><select required name="status-kawin1" class="form-control select2-hidden-accessible" id="pendidikan_terakhir" data-select2-id="pendidikan_terakhir" tabindex="-1" aria-hidden="true">
                            <option data-select2-id="2"></option><option value="Belum Kawin">Belum Menikah</option><option value="Sudah Kawin">Sudah Menikah</option><option value="Bercerai" data-select2-id="11">Bercerai</option><option value="Bercerai Meninggal">Bercerai Meninggal</option>
                            </select>
                      </div>
                    </div>
                    </div>
                    <!-- input foto -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Foto*</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input required type="file" class="custom-file-input" id="customFile" name="foto1">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
              </div>
              <!-- end left card -->
              <!-- right card -->
              <div class="col-md-6">
                <div class="card card-primary ">
                <div class="card-body">    
                  <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Nama Lengkap*</label>
                          <div class="col-sm-8">
                            <input required type="text" class="form-control" id="nama_lengkap2" name="nama_lengkap2" placeholder="Nama Lengkap">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">NIK*</label>
                          <div class="col-sm-8">
                            <input required type="text" maxlength="16" class="form-control" id="nik2" name="nik2" placeholder="NIK KTP" value="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Tempat /Tgl Lahir*</label>
                          <div class="col-sm-8">
                            <div class="row">
                              <div class="col-md-6">
                                <input required type="text" class="form-control" id="tempat_lahir2" name="tempat_lahir2" placeholder="Tempat Lahir" value="">
                              </div>
                              <div class="col-md-6">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="far fa-calendar-alt"></i>
                                    </span>
                                  </div>
                                  <input required type="text" class="form-control float-right" id="tgl_lahir2" name="tgl_lahir2" placeholder="Tgl Lahir" value="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Jenis Kelamin*</label>
                          <div class="col-sm-8">
                            <div class="icheck-primary d-inline col-md-2">
                              <input type="radio" id="radioPrimary3" name="jenis_kelamin2" value="Pria">
                              <label for="radioPrimary3">
                              Pria     
                              </label>
                            </div>
                            <div class="icheck-primary d-inline col-md-2">
                              <input type="radio" id="radioPrimary4" name="jenis_kelamin2" value="Pria">
                              <label for="radioPrimary4">
                              Wanita
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Agama*</label>
                          <div class="col-sm-8">
                              <input required type="text" class="form-control" id="agama2" name="agama2" placeholder="Agama" value="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Alamat Rumah*</label>
                          <div class="col-sm-8">
                            <textarea required name="alamat_rumah2" id="alamat_rumah2" rows="4" style="width:100%"></textarea>
                            <input required type="text" class="form-control" id="kecamatan2" name="kecamatan2" placeholder="Kecamatan" value=""><br>
                            <input required type="text" class="form-control" id="kelurahan2" name="kelurahan2" placeholder="Kelurahan" value="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">No. Telepon/Email*</label>
                          <div class="col-sm-8">
                            <input required type="text" class="form-control" id="no_hp2" name="no_hp2" placeholder="HP *)" value="">
                            <br>
                            <input required type="text" class="form-control" id="email2" name="email2" placeholder="E-mail" value="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Pekerjaan*</label>
                          <div class="col-sm-8">
                              <input required type="text" class="form-control" id="pekerjaan2" name="pekerjaan2" placeholder="Pekerjaan" value="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Status Perkawinan*</label>
                          <div class="col-sm-8">
                            <div class="form-group">
                              <select required name="status-kawin2" class="form-control select2-hidden-accessible" id="pendidikan_terakhir" data-select2-id="pendidikan_terakhir" tabindex="-1" aria-hidden="true">
                                <option data-select2-id="2"></option><option value="Belum Menikah">Belum Menikah</option><option value="Sudah Menikah">Sudah Menikah</option><option value="Bercerai" data-select2-id="11">Bercerai</option><option value="Bercerai Meninggal">Bercerai Meninggal</option>
                              </select>
                            </div>   
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Foto*</label>
                          <div class="col-sm-8">
                            <div class="custom-file">
                              <input required type="file" class="custom-file-input" id="customFile" name="foto1">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                          </div>
                        </div>
<<<<<<< Updated upstream
=======
                      </div>  
                    </div>
                  <!-- .copy end -->
>>>>>>> Stashed changes
                  </div>
              </div>  
            </div>
            <!-- end right card -->

            <div class="col-md-12">
              <div class="card card-primary ">
                <div class="card-body">

                </div>
              </div>
            </div>
          </div>
          <!-- end card body -->
          <div class="card-footer">
            <div class="col-md-12">
              <div class="card card-primary ">
                <button type="submit" class="btn btn-info float-right">Simpan Data</button>
              </div>
            </div>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      <!-- /.card -->
    <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div>
  <?= $this->endSection(); ?>