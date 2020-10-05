
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
            <h1>DATA PANITIA <a href='/export/<?= 1 ?>'><span><button title="EXPORT" type="button" class="btn btn-primary">EXPORT <span class="fas fa-file-export"></span></button></span></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Panitia</li>
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
                                <th>USERNAME</th>
                                <th>PASSWORD</th>
                                <th>WILAYAH</th>
                                <th><center>NO TPS</th>
                                <th><center>AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data as $value){  ?>
                                <tr>
                                <td><?= $value['username'];?></td>
                                <td><?= substr($value['password'],-6,7);?></td>
                                <td>
                                Kelurahan : <?= ucwords($value['kelurahan']);?>
                                <p>Kecamatan : <?= ucwords($value['kecamatan']);?>
                                <p>Kabupaten : <?= ucwords($value['kabupaten']);?>
                                </td>
                                <td><center><?= $value['no_tps'];?></td>
                                <td><center>
                                      <a href='/panitia/<?= $value['id'] ?>'><span><button title="Detail" type="button" class="btn btn-primary"><span class="fas fa-eye"></span></button></span>
                                      <a href='/panitia/<?= $value['id'] ?>'><span><button title="Validasi" type="button" class="btn btn-success"><span class="fas fa-check"></span></button></span>
                                      <a href='/panitia/<?= $value['id'] ?>'><span><button title="Hapus" type="button" class="btn btn-danger"><span class="fas fa-trash-alt"></span></button></span>
                                      </td>
                                </tr>
                                <?php }?>
                                </tbody>
                                <tfoot>
                                <tr>
                                <th>USERNAME</th>
                                <th>PASSWORD</th>
                                <th>WILAYAH</th>
                                <th><center>NO TPS</th>
                                <th><center>AKSI</th>
                                </tr>
                                </tfoot>
                            </table>
                            </div>
                            <!-- /.card-body -->
                        </div>


                        <!-- End Section -->
                        <?= $this->endSection(); ?>