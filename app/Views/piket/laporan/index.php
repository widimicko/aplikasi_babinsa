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
        if (array_key_exists(0, $laporan)) {
          echo '<p class="text-muted">Laporan terakhir diubah : '.$laporan[0]['updated_at'].'</p><br>';
          echo $laporan[0]['keterangan'];
        } else {
          echo 'Belum ada laporan';
        }
      ?>

      <?php if (!empty($lampirans)) : ?>
        <h4>Lampiran</h4>
        <p>Klik untuk mengunduh gambar</p>
        <div class="row">
          <?php foreach ($lampirans as $lampiran) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
              <a href="<?= base_url('piket/laporan/lampiran/download/'. $lampiran['id']) ?>">
                <img
                  src="<?= base_url('image/lampiran/'. $lampiran['lampiran']) ?>"
                  class="w-100 shadow-1-strong rounded mb-4"
                  alt="<?= $lampiran['lampiran'] ?>"
                />
              </a>
            </div>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </div>
  </div>




</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>