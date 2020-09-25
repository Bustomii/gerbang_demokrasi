
<!-- Extend  -->
<?= $this->extend('menu/footer'); ?>
<!-- Start Section -->
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DATA PANITIA</h1>
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
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                            <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                <th><center>FOTO</th>
                                <th>USERNAME</th>
                                <th>NAMA LENGKAP</th>
                                <th>WILAYAH</th>
                                <th><center>NO TPS</th>
                                <th>AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data as $value){  ?>
                                <tr>
                                <td><center><?php if($value['foto']==NULL){
                                   echo '<img src="images/user.png" width="120px" height="120px" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                                   style="opacity: .8">';
                                   }else{ echo '<img src="'.$value['foto'].'" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                                    style="opacity: .8">';};?></td>
                                <td><?= $value['username'];?></td>
                                <td><?= $value['nama_lengkap'];?></td>
                                <td>
                                Kelurahan : <?= ucwords($value['kelurahan']);?>
                                <p>Kecamatan : <?= ucwords($value['kecamatan']);?>
                                <p>Kabupaten : <?= ucwords($value['kabupaten']);?>
                                </td>
                                <td><center><?= $value['no_tps'];?></td>
                                <td><?= $value['id_panitia'];?></td>
                                </tr>
                                <?php }?>
                                </tbody>
                                <tfoot>
                                <tr>
                                <th><center>FOTO</th>
                                <th>USERNAME</th>
                                <th>NAMA LENGKAP</th>
                                <th>WILAYAH</th>
                                <th><center>NO TPS</th>
                                <th>AKSI</th>
                                </tr>
                                </tfoot>
                            </table>
                            </div>
                            <!-- /.card-body -->
                        </div>


                        <!-- End Section -->
                        <?= $this->endSection(); ?>