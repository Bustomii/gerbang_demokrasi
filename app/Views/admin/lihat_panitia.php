
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
                                <th>FOTO</th>
                                <th>NAMA LENGKAP</th>
                                <th>WILAYAH</th>
                                <th>NO TPS</th>
                                <th>AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <td>Other browsers</td>
                                <td>All others</td>
                                <td>-</td>
                                <td>-</td>
                                <td>U</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                <th>FOTO</th>
                                <th>NAMA LENGKAP</th>
                                <th>WILAYAH</th>
                                <th>NO TPS</th>
                                <th>AKSI</th>
                                </tr>
                                </tfoot>
                            </table>
                            </div>
                            <!-- /.card-body -->
                        </div>


                        <!-- End Section -->
                        <?= $this->endSection(); ?>