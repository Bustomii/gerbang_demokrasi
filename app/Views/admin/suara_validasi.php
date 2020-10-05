
<?= $this->extend('menu/footer'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- content message -->
      <!-- warning -->
      <?php if(session()->getFlashData('warning')){ ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?= session()->getFlashData('warning') ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div><?php }?>
      
      <!-- success -->
      <?php if(session()->getFlashData('success')){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashData('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div><?php }?>
      <!-- end message -->
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><a href='/export/<?= 1 ?>'><span><button title="EXPORT" type="button" class="btn btn-primary">EXPORT <span class="fas fa-file-export"></span></button></span> <a href='/kirim'><span><button title="KIRIM" type="button" class="btn btn-warning">KIRIM <span class="fas fa-copy"></span></button></span></a>  Terakhir Pengirim <b><?= $last_valid; ?></b>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Suara</li>
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
                   <th>NO</th>
                   <th><center>VALIDASI OLEH</th>
                   <th>TANGGAL</th>
                   <th>DETAIL TPS</th>
                   <th><center>SUARA MASUK</th>
                   <th><center>C1</th>
                   <th><center>STATUS</th>
                   <th><center>AKSI</th>
                 </tr>
                 </thead>
                 <tbody>
                 <?php $no=1;
                 foreach($data as $value){  ?>
                 <tr>
                   <td><?= $no++; ?></td>
                   <td><center><b><?php echo '<span class="badge bg-info">"'.$value['admin'].'"</span>'; ?></b></td>
                   <td><?= $value['updated_at'] ?></td>
                   <td>
                     <b>Panitia : <?= $value['username']?><p></b>
                     <p>Provinsi : <?= $value['provinsi'] ?>
                     <p>Kabupaten : <?= $value['kabupaten'] ?>
                     <p>Kecamatan : <?= $value['kecamatan'] ?>
                     <p>Kelurahan : <?= $value['kelurahan'] ?>
                     <p>No TPS : <?= $value['no_tps'] ?>
                   </td>
                   <td>
                     <b>Total Suara Masuk : <?= $value['total_suara']?><p></b>
                     <p>Suara Sah   :<?= $value['suara_sah']?>
                     <p>Suara Rusak :<?= $value['suara_tidak_sah']?>
                   </td>
                   <td><center><a href='/c1/<?= $value['c1'] ?>'><span><button title="Lihat c1" type="button" class="btn btn"><span class="fas fa-eye"></span></button></span></td>
                   <td><center><?php if ($value['status']==0) {echo '<span class="badge bg-danger">Belum Validasi</span>';}else{echo '<span class="badge bg-success">Validasi</span>';}?></td>
                   <td><center>
                       <a href='/suara_validasi/<?= $value['id_suara'] ?>'><span><button title="Lihat" type="button" class="btn btn-primary"><span class="fas fa-eye"></span></button></span>
                       </td>
                 </tr>
                 <?php }?>
                 </tbody>
                 <tfoot>
                 <tr>
                   <th>NO</th>
                   <th><center>VALIDASI OLEH</th>
                   <th>TANGGAL</th>
                   <th>DETAIL TPS</th>
                   <th><center>SUARA MASUK</th>
                   <th><center>C1</th>
                   <th><center>STATUS</th>
                   <th><center>AKSI</th>
                 </tr>
                 </tfoot>
             </table>
             </div>
             <!-- /.card-body -->
         </div>
  <?= $this->endSection(); ?>