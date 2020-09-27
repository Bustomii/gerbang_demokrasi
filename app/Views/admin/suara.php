
<?= $this->extend('menu/footer'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DATA SUARA MASUK</h1>
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
                                <th>TANGGAL</th>
                                <th>DETAIL TPS</th>
                                <th><center>SUARA MASUK</th>
                                <th><center>STATUS</th>
                                <th><center>AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data as $value){  ?>
                                <tr>
                                <td><?= $value['updated_at'] ?></td>
                                <td>Provinsi : <?= $value['provinsi'] ?>
                                <p>Kabupaten : <?= $value['kabupaten'] ?>
                                <p>Kecamatan : <?= $value['kecamatan'] ?>
                                <p>Kelurahan : <?= $value['kelurahan'] ?>
                                <p>No TPS : <?= $value['no_tps'] ?></td>
                                <td><center><?= $value['total_suara'] ?></td>
                                <td><center><?php if ($value['status']==0) {echo '<span class="badge bg-danger">Belum Validasi</span>';}else{echo '<span class="badge bg-success">Validasi</span>';}?></td>
                                <td><center><a href='/suara/<?= $value['id_suara'] ?>'><span><button type="button" class="btn btn-success">Detail</button></span>
                                <a href='/suara/<?= $value['id_suara'] ?>'><span><button type="button" class="btn btn-danger"><span class="fas fa-trash-alt"></span></button></span></td>
                                </tr>
                                <?php }?>
                                </tbody>
                                <tfoot>
                                <tr>
                                <th>TANGGAL</th>
                                <th>DETAIL TPS</th>
                                <th><center>SUARA MASUK</th>
                                <th><center>STATUS</th>
                                <th><center>AKSI</th>
                                </tr>
                                </tfoot>
                            </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
  <?= $this->endSection(); ?>