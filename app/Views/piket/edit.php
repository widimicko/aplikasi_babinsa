<?= $this->extend('templates/index') ?>


<?= $this->section('page-content') ?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800" id="titlee">Halaman Ubah Jadwdal Piket</h1>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <form action="<?= base_url('piket/update/'.$piket['id']) ?>" method="POST">
          <?= csrf_field() ?>
          <div class="form-horizontal">
            <?php if(session()->getFlashData('tx_error_message')) : ?>
              <div class="col-sm-10 alert alert-danger" role="alert">
                <?= session()->getFlashData('tx_error_message'); ?>
              </div>
            <?php endif ?>
            
          <div class="form-group">
            <label class="col-sm-2 control-label">Babinsa</label>
            <div class="col-sm-10">
              <select class="select2 form-control <?= session('errors.id_babinsa') ? 'is-invalid' : '' ?>" name="id_babinsa" required>
              <?php foreach ($babinsas as $babinsa) : ?>
                  <?php
                    if ($babinsa['id'] == 3) {
                      continue;
                    }  
                  ?>
                  <option value="<?= $babinsa['id'] ?>"
                  <?= $piket['id_babinsa'] == $babinsa['id'] ? 'selected' : '' ?>
                  ><?= $babinsa['name'] ?> (<?= $babinsa['username'] ?>)</option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-feedback">
                <?= session('errors.id_babinsa') ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Tanggal Piket</label>
            <div class="col-sm-10">
              <input type="date" class="form-control <?= session('errors.tanggal') ? 'is-invalid' : '' ?>" name="tanggal" value="<?= $piket['tanggal']  ?>" required>
              <div class="invalid-feedback">
                <?= session('errors.tanggal') ?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <a href="<?= base_url('/piket') ?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span>Back</a>
              <button type="submit" class="btn btn-primary btn-flat"><span class="fa fa-save"></span>Simpan</button>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
    
<!-- /.container-fluid -->
<?= $this->endSection() ?>