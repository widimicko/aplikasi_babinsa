<?= $this->extend('templates/index') ?>


<?= $this->section('page-content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Pengelolaan Piket</h1>

  <?php if(session()->getFlashData('tx_success_message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashData('tx_success_message'); ?>
    </div>
  <?php elseif(session()->getFlashData('tx_error_message')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashData('tx_error_message'); ?>
    </div>
  <?php endif ?>
  <?= view('Myth\Auth\Views\_message_block') ?>

  <!-- DataTales -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Data Piket</h6>
      <div class="d-flex">
        <?= in_groups('admin') ? '<a href="'. base_url('piket/add') .'" class="btn btn-primary mr-3">+ Tambah</a>' : '' ?>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="tableData table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <!-- nrp, nama, tanggal, laporan-->
            <tr>
              <th>No</th>
              <th>NRP</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Dibuat pada</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($pikets as $piket) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $piket['username'] ?></td>     
                <td><?= $piket['name'] ?></td>
                <?php $date = date_create($piket['tanggal']); ?>
                <td><?= date_format($date,"D\, d F Y") ?></td>         
                <td><?= $piket['created_at'] ?></td>
                <td>
                <?php
                  if (!in_groups('member')) {
                    echo '<a href="'.base_url('piket/laporan/'. $piket['id']) .'" class="btn btn-info">Laporan</a>';
                  } else {
                    echo '<a href="'.base_url('member/piket/laporan/'. $piket['id']) .'" class="btn btn-info">Laporan</a>';
                  }
                  
                  if (in_groups('admin')) {
                    echo '<a href="'.base_url('piket/edit/'. $piket['id']) .'" class="btn btn-warning">Edit</a>';
                    echo '<a href="'.base_url('piket/delete/'. $piket['id']) .'" class="btn btn-danger">Hapus</a>';
                  }
                ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>