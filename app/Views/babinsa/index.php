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
        <a href="#" class="btn btn-primary mr-3" data-toggle="modal" data-target="#createModal">+ Tambah</a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="tableData table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>             
              <th>Nama</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $faker = Faker\Factory::create();
            ?>
            <?php for ($i = 0; $i <= 10; $i++ ) : ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $faker->name ?></td>         
                <td>
                  <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal">Ubah</a>
                  <a href="<?= base_url('babinsa/delete/'. $faker->randomKey) ?>" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            <?php endfor; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


<script>
  // Table onRowClick event
  const table = document.querySelector(".tableData")

  if (table) {
    for (let i = 0; i < table.rows.length; i++) {
      table.rows[i].onclick = function() {
        getDataRow(this)
      }
    }
  }

  function getDataRow(tableRow) {
    // Get row data
    const nis = tableRow.childNodes[3].innerHTML
    const nama = tableRow.childNodes[5].innerHTML
    let kelas = tableRow.childNodes[7].innerHTML

    if (kelas == '<div class="alert alert-success">Lulus</div>') {
      kelas = 7
    }

    // set to modal
    document.getElementById('editForm').setAttribute('action', `${window.location.origin}/siswa/update/${nis}`)
    document.getElementById('input-nis').setAttribute("value", nis)
    document.getElementById('input-nama').setAttribute("value", nama)
    document.getElementById('input-kelas').setAttribute("value", kelas)
  }
</script>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>