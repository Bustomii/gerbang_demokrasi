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
              <li class="breadcrumb-item"><a href="#">Calon Walikota</a></li>
              <li class="breadcrumb-item active">Input</li>
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
          <h3 class="card-title col-sm-6">Data Walikota</h3>
          <h3 class="card-title col-sm-6 float-right">Data Wakil Walikota</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form  id="form-validasi"  action="<?php echo base_url('AdminControllers/save') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
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
                        <input type="text" class="form-control <?= ($validation->hasError('nama_lengkap[]')) ? 'is-invalid' : ''; ?>" name="nama_lengkap[]" placeholder="Nama Lengkap" value="<?= old('nama_lengkap[]'); ?>">
                        <div class="invalid-feedback">
                          <?= $validation->getError('nama_lengkap[]'); ?>
                        </div>
                      </div>
                    </div>
                    <!-- input nik -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">NIK*</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('nik[]')) ? 'is-invalid' : '' ;?>" id="nik" name="nik[]" placeholder="NIK KTP">
                        <div class="invalid-feedback">
                          <?= $validation->getError('nik[]'); ?>
                        </div>
                      </div>
                    </div>
                    <!-- input tempat/tanggal lahir -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Tempat /Tgl Lahir*</label>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-md-6">
                            <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir[]')) ? 'is-invalid' : '' ;?>" id="tempat_lahir" name="tempat_lahir[]" placeholder="Tempat Lahir" value="">
                            <div class="invalid-feedback">
                              <?= $validation->getError('tempat_lahir[]'); ?>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="far fa-calendar-alt"></i>
                                </span>
                              </div>
                              <input type="text" class="form-control float-right <?= ($validation->hasError('tgl_lahir[]')) ? 'is-invalid' : '' ;?>" id="tgl_lahir1" name="tgl_lahir[]" placeholder="Tgl Lahir" value="">
                              <div class="invalid-feedback">
                                <?= $validation->getError('tgl_lahir[]'); ?>
                            </div></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- input jenis kelamin -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Jenis Kelamin*</label>
                      <div class="col-sm-8">
                          <div class="custom-control custom-radio">
                          <input type="radio" id="customRadioInline1" name="jenis_kelamin[]" class="custom-control-input <?= ($validation->hasError('jenis_kelamin[]')) ? 'is-invalid' : '' ;?>">
                          <label class="custom-control-label" for="customRadioInline1">Laki-Laki</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadioInline2" name="jenis_kelamin[]" class="custom-control-input <?= ($validation->hasError('jenis_kelamin[]')) ? 'is-invalid' : '' ;?>">
                          <label class="custom-control-label" for="customRadioInline2">Perempuan</label><div ></div>
                          <div class="invalid-feedback">
                            <?= $validation->getError('jenis_kelamin[]'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- input agama -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Agama*</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('nik[]')) ? 'is-invalid' : '' ;?>" id="agama" name="agama[]" placeholder="Agama" value="">
                        <div class="invalid-feedback">
                          <?= $validation->getError('agama[]'); ?>
                        </div>
                      </div>
                    </div>
                    <!-- input alamat rumah -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Alamat Rumah*</label>
                      <div class="col-sm-8">
                        <textarea class="form-control <?= ($validation->hasError('alamat_rumah[]')) ? 'is-invalid' : '' ;?>" name="alamat_rumah[]" id="alamat_rumah" rows="4" style="width:100%"></textarea>
                          <!-- <input type="text" class="form-control" id="kecamatan1" name="kecamatan1" placeholder="Kecamatan" value=""><br>
                          <input type="text" class="form-control" id="kelurahan1" name="kelurahan1" placeholder="Kelurahan" value=""> -->
                        <div class="invalid-feedback">
                          <?= $validation->getError('alamat_rumah[]'); ?>
                        </div>
                      </div>
                    </div>
                    <!-- input no.telepon/email -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">No. Telepon/Email</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control <?= ($validation->hasError('nik[]')) ? 'is-invalid' : '' ;?>" id="no_hp" name="no_hp[]" placeholder="HP *)" value="">
                          <div class="invalid-feedback">
                            <?= $validation->getError('no_hp[]'); ?>
                          </div>
                        <br>
                            <input type="text" class="form-control" id="email" name="email[]" placeholder="E-mail" value="">
                      </div>
                    </div>
                    <!-- input pekerjaan -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Pekerjaan*</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('nik[]')) ? 'is-invalid' : '' ;?>" id="pekerjaan" name="pekerjaan[]" placeholder="Pekerjaan" value="">
                        <div class="invalid-feedback">
                          <?= $validation->getError('pekerjaan[]'); ?>
                        </div>
                      </div>
                    </div>
                    <!-- input status perkawinan -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Status Perkawinan*</label>
                      <div class="col-sm-8">
                        <div class="form-group"><select name="status-kawin[]" class="custom-select select2-hidden-accessible <?= ($validation->hasError('status-kawin[]')) ? 'is-invalid' : '' ;?>" id="pendidikan_terakhir" data-select2-id="pendidikan_terakhir" tabindex="-1" aria-hidden="true">
                          <option data-select2-id="2">Pilih Status</option><option value="Belum Kawin">Belum Menikah</option><option value="Sudah Kawin">Sudah Menikah</option><option value="Bercerai" data-select2-id="11">Bercerai</option><option value="Bercerai Meninggal">Bercerai Meninggal</option>
                          </select>
                          <div class="invalid-feedback">
                            <?= $validation->getError('status-kawin[]'); ?>
                          </div>
                      </div>
                    </div>
                    </div>
                    <!-- input foto -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Foto*</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input <?= ($validation->hasError('foto[]')) ? 'is-invalid' : '' ;?>" id="customFile" name="foto[]">
                          <label class="custom-file-label" for="customFile">Pilih Foto</label>
                          <div class="invalid-feedback">
                            <?= $validation->getError('foto[]'); ?>
                          </div>
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
                    <!-- input nama -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Nama Lengkap*</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_lengkap[]')) ? 'is-invalid' : ''; ?>" name="nama_lengkap[]" placeholder="Nama Lengkap" value="<?= old('nama_lengkap[]'); ?>">
                        <div class="invalid-feedback">
                          <?= $validation->getError('nama_lengkap[]'); ?>
                        </div>
                      </div>
                    </div>
                    <!-- input nik -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">NIK*</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('nik[]')) ? 'is-invalid' : '' ;?>" id="nik" name="nik[]" placeholder="NIK KTP">
                        <div class="invalid-feedback">
                          <?= $validation->getError('nik[]'); ?>
                        </div>
                      </div>
                    </div>
                    <!-- input tempat/tanggal lahir -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Tempat /Tgl Lahir*</label>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-md-6">
                            <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir[]')) ? 'is-invalid' : '' ;?>" id="tempat_lahir" name="tempat_lahir[]" placeholder="Tempat Lahir" value="">
                            <div class="invalid-feedback">
                              <?= $validation->getError('tempat_lahir[]'); ?>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="far fa-calendar-alt"></i>
                                </span>
                              </div>
                              <input type="text" class="form-control float-right <?= ($validation->hasError('tgl_lahir[]')) ? 'is-invalid' : '' ;?>" id="tgl_lahir2" name="tgl_lahir[]" placeholder="Tgl Lahir" value="">
                              <div class="invalid-feedback">
                                <?= $validation->getError('tgl_lahir[]'); ?>
                            </div></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- input jenis kelamin -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Jenis Kelamin*</label>
                      <div class="col-sm-8">
                          <div class="custom-control custom-radio">
                          <input type="radio" id="customRadioInline3" name="jenis_kelamin[1]" class="custom-control-input <?= ($validation->hasError('jenis_kelamin[1]')) ? 'is-invalid' : '' ;?>">
                          <label class="custom-control-label" for="customRadioInline3">Laki-Laki</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadioInline4" name="jenis_kelamin[1]" class="custom-control-input <?= ($validation->hasError('nik[1]')) ? 'is-invalid' : '' ;?>">
                          <label class="custom-control-label" for="customRadioInline4">Perempuan</label><div ></div>
                          <div class="invalid-feedback">
                            <?= $validation->getError('jenis_kelamin[1]'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- input agama -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Agama*</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('nik[]')) ? 'is-invalid' : '' ;?>" id="agama" name="agama[]" placeholder="Agama" value="">
                        <div class="invalid-feedback">
                          <?= $validation->getError('agama[]'); ?>
                        </div>
                      </div>
                    </div>
                    <!-- input alamat rumah -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Alamat Rumah*</label>
                      <div class="col-sm-8">
                        <textarea class="form-control <?= ($validation->hasError('alamat_rumah[]')) ? 'is-invalid' : '' ;?>" name="alamat_rumah[]" id="alamat_rumah" rows="4" style="width:100%"></textarea>
                          <!-- <input type="text" class="form-control" id="kecamatan1" name="kecamatan1" placeholder="Kecamatan" value=""><br>
                          <input type="text" class="form-control" id="kelurahan1" name="kelurahan1" placeholder="Kelurahan" value=""> -->
                        <div class="invalid-feedback">
                          <?= $validation->getError('alamat_rumah[]'); ?>
                        </div>
                      </div>
                    </div>
                    <!-- input no.telepon/email -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">No. Telepon/Email</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control <?= ($validation->hasError('nik[]')) ? 'is-invalid' : '' ;?>" id="no_hp" name="no_hp[]" placeholder="HP *)" value="">
                          <div class="invalid-feedback">
                            <?= $validation->getError('no_hp[]'); ?>
                          </div>
                        <br>
                            <input type="text" class="form-control" id="email" name="email[]" placeholder="E-mail" value="">
                      </div>
                    </div>
                    <!-- input pekerjaan -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Pekerjaan*</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('nik[]')) ? 'is-invalid' : '' ;?>" id="pekerjaan" name="pekerjaan[]" placeholder="Pekerjaan" value="">
                        <div class="invalid-feedback">
                          <?= $validation->getError('pekerjaan[]'); ?>
                        </div>
                      </div>
                    </div>
                    <!-- input status perkawinan -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Status Perkawinan*</label>
                      <div class="col-sm-8">
                        <div class="form-group"><select name="status-kawin[]" class="custom-select select2-hidden-accessible <?= ($validation->hasError('nik[]')) ? 'is-invalid' : '' ;?>" id="pendidikan_terakhir" data-select2-id="pendidikan_terakhir" tabindex="-1" aria-hidden="true">
                          <option data-select2-id="2">Pilih Status</option><option value="Belum Kawin">Belum Menikah</option><option value="Sudah Kawin">Sudah Menikah</option><option value="Bercerai" data-select2-id="11">Bercerai</option><option value="Bercerai Meninggal">Bercerai Meninggal</option>
                          </select>
                          <div class="invalid-feedback">
                            <?= $validation->getError('status-kawin[]'); ?>
                          </div>
                      </div>
                    </div>
                    </div>
                    <!-- input foto -->
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Foto*</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input <?= ($validation->hasError('foto[]')) ? 'is-invalid' : '' ;?>" id="customFile" name="foto[]">
                          <label class="custom-file-label" for="customFile">Pilih Foto</label>
                          <div class="invalid-feedback">
                            <?= $validation->getError('foto[]'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
              </div>
            <!-- end right card -->
            <div class="col-md-12">
              <div class="card card-primary ">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No Urut Paslon*</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('no_urut[]')) ? 'is-invalid' : '' ;?>" id="no_urut" name="no_urut" placeholder="1/2/3/n" value="">
                        <div class="invalid-feedback">
                          <?= $validation->getError('no_urut[]'); ?>
                        </div>
                      </div>
                    </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Periode Pemilu*</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control <?= ($validation->hasError('periode[]')) ? 'is-invalid' : '' ;?>" id="periode" name="periode" placeholder="Periode Pemilu" value="">
                      <div class="invalid-feedback">
                        <?= $validation->getError('periode[]'); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card card-primary ">
                <button type="submit" class="btn btn-info btn-validasi float-right">Simpan Data</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    $(document).on('submit', '#form-validasi', function (e) {

        e.preventDefault();
        //const href = $(this).attr('action');

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Validasi!'
        // }).then((result) => {
        //           if (result.isConfirmed) {
      //  function () { //apabila sweet alert d confirm maka akan mengirim data ke simpan.php melalui proses ajax
      //   $.ajax({
            // url: "AdminController/save'",
            // type: "POST",
            // data: $('#formInput').serialize(), //serialize() untuk mengambil semua data di dalam form
            // dataType: "html",
            // success: function(){                
            //     setTimeout(function(){
            //       swal({
            //         title:"Data Berhasil Disimpan",
            //         text: "Terimakasih",
            //         type: "success"
            //       }, function(){
            //         window.location="tampil.php";
            //       });
            //     }, 2000);
            //},
      })
    });
  </script>
  <?= $this->endSection(); ?>