<?= $this->extend('templates/index') ?>


<?= $this->section('page-content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Pengelolaan Anggota</h1>

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
      <h6 class="m-0 font-weight-bold text-primary">Tabel Data Anggota</h6>
      <div class="d-flex">
        <?= in_groups('admin') ? '<a href="'. base_url('babinsa/add') .'" class="btn btn-primary mr-3">+ Tambah</a>' : '' ?>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="tableData table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <!-- id	username	email	name	birthdate	rank	picture	created_at	updated_at -->
            <tr>
              <th>No</th>
              <th>Gambar</th>        
              <th>NRP</th>
              <th>Nama</th>
              <th>Pangkat</th>
              <th>Tanggal lahir</th>
              <th>Terakhir diubah</th>
              <?= in_groups('admin') ? '<th>Aksi</th>' : '' ?>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($babinsas as $babinsa) : ?>

              <?php
                if ($babinsa['id'] == 3) {
                  continue;
                }  
              ?>
              <tr>
                <td><?= $i++ ?></td>
                <td>
                  <img src="<?= base_url('image/babinsa/'. $babinsa['picture']) ?>" alt="<?= $babinsa['picture'] ?>" class="image-admin img-fluid"><br>
                  <?= $babinsa['picture'] ?>
                </td> 
                <td><?= $babinsa['username'] ?></td>     
                <td><?= $babinsa['name'] ?></td>     
                <td><?= $babinsa['rank'] ?></td>     
                <td><?= $babinsa['birthdate'] ?></td>     
                <td><?= $babinsa['updated_at'] ?></td>
                <?php 
                  if(in_groups('admin')) {
                    echo '<td>';
                    echo '<a href="'.base_url('babinsa/edit/'. $babinsa['id']) .'" class="btn btn-info">Edit</a>';
                    echo '<a href="'.base_url('babinsa/delete/'. $babinsa['id']) .'" class="btn btn-danger">Hapus</a>';
                    echo '</td>';
                  }
                ?>
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