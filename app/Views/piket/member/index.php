<?= $this->extend('templates/index') ?>


<?= $this->section('page-content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <?php if (session()->getFlashData('tx_success_message')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashData('tx_success_message'); ?>
    </div>
  <?php elseif (session()->getFlashData('tx_error_message')) : ?>
    <div class="alert alert-danger" role="alert">
      <?= session()->getFlashData('tx_error_message'); ?>
    </div>
  <?php endif ?>
  <!-- Page Heading -->
  <div class="card shadow">
    <div class="card-header p-3">
      <h1 class="h3 mb-4 text-gray-800">Laporan Piket</h1>
    </div>
    <div class="card-body">
      <table>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><?= $piket['name'] ?></td>
        </tr>
        <tr>
          <td>NRP</td>
          <td>:</td>
          <td><?= $piket['username'] ?></td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td>:</td>
          <?php $date = date_create($piket['tanggal']); ?>
          <td><?= date_format($date, "D\, d F Y") ?></td>
        </tr>
      </table>
      <hr>

      <?php
        if(empty($laporan)) {
          echo '<a href="'.base_url('member/piket/laporan/add/'. $piket['id']).'" class="mb-3 btn btn-primary">+ Tambah</a><br>';
        } else {
          echo '<a href="'.base_url('member/piket/laporan/edit/'. $piket['id']).'" class="mb-3 btn btn-info">Ubah</a><br>';
        }
      
      ?>
      <?php 
        if (array_key_exists(0, $laporan)) {
          echo '<p class="text-muted">Laporan terakhir diubah : '.$laporan[0]['updated_at'].'</p><br>';
          echo $laporan[0]['keterangan'];
        } else {
          echo 'Belum ada laporan';
        }
      ?>>
      <br>
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tabel Data Lampiran</h6>
          <div class="d-flex">
           <a href="<?= base_url('member/piket/lampiran/add/'. $piket['id']) ?>" class="btn btn-primary mr-3">+ Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="tableData table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Lampiran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                <?php foreach ($lampirans as $lampiran) : ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td>
                      <img src="<?= base_url('image/lampiran/'. $lampiran['lampiran']) ?>" alt="<?= $lampiran['lampiran'] ?>" class="image-admin img-fluid"><br>
                      <?= $lampiran['lampiran'] ?>
                    </td>
                    <td>
                      <a href="<?= base_url('member/piket/lampiran/edit/'. $piket['id'].'/'.$lampiran['id']) ?>" class="btn btn-info">Edit</a>
                      <a href="<?= base_url('member/piket/lampiran/delete/'. $piket['id'].'/'.$lampiran['id']) ?>" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>




</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>