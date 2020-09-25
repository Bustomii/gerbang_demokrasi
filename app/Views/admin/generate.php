
<?= $this->extend('menu/footer'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>GENERATE AKUN PANITIA</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Generate</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Akun Panitia</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <form action ="/create_panitia" method="POST" enctype="multipart/form-data">
                    <label>Username</label>
                      <select class="form-control select2" style="width: 100%;">
                        <?php foreach($data as $value){  ?>
                          <option name="username[]" value="<?= $value['id_provinsi'].$value['id_kab_kota'].$value['id_kec'].$value['id_desa']; ?>"><?= $value['id_provinsi'].$value['id_kab_kota'].$value['id_kec'].$value['id_desa'].$value['no_tps']; ?></option>
                        <?php }?>
                      </select>
                      <?php foreach($data as $value){  ?>
                        <input type="hidden" name="password[]" value="<?= $value['id_desa']; ?>">
                    <?php }?>
                 </div>  
              </div>
                <div class="col-md-6">
                  <label>Aksi</label>
                   <input type='submit' name='submit' class="form-control btn btn-danger" value='Generate'>      
               </form>
            </div>
          </div>           
  <?= $this->endSection(); ?>