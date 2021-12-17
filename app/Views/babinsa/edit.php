<?= $this->extend('templates/index') ?>


<?= $this->section('page-content') ?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800" id="titlee">Halaman Edit Anggota (NRP: <?= $babinsa['username'] ?>)</h1>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <form action="<?= base_url('babinsa/update/'. $babinsa['id']) ?>" method="POST" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="form-horizontal">
            <?php if(session()->getFlashData('tx_error_message')) : ?>
              <div class="col-sm-10 alert alert-danger" role="alert">
                <?= session()->getFlashData('tx_error_message'); ?>
              </div>
            <?php endif ?>
          <div class="form-group">
            <label class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
              <input id="input-name" type="text" class="form-control <?= session('errors.name') ? 'is-invalid' : '' ?>" name="name" value="<?= $babinsa['name']  ?>" required>
              <div class="invalid-feedback">
                <?= session('errors.name') ?>
              </div>
            </div>
          </div>
          <div class="form-group row g-2">
            <div class="col-lg-2">
              <img src="<?= base_url('image/babinsa/' . $babinsa['picture']) ?>" id="image-preview" alt="Preview" class="img-fluid">
            </div>
            <div class="col-lg-8">
              <input  class="custom-file-input <?= session('errors.picture') ? 'is-invalid' : '' ?>" type="file" name="picture" id="attachment" accept="image/*" onchange="previewImage()">
              <div class="invalid-feedback">
                <?= session('errors.picture') ?>
              </div>
              <label class="custom-file-label" for="poster"><?= $babinsa['picture'] ?></label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Tanggal Lahir</label>
            <div class="col-sm-10">
              <input id="input-date" type="date" class="form-control <?= session('errors.birthdate') ? 'is-invalid' : '' ?>" name="birthdate" value="<?= $babinsa['birthdate'] ?>" required>
              <div class="invalid-feedback">
                <?= session('errors.birthdate') ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Pangkat</label>
            <div class="col-sm-10">
              <select class="form-control <?= session('errors.rank') ? 'is-invalid' : '' ?>" name="rank" required>
                <option selected disabled>- Pangkat -</option>
                <option value="Pelda"
                <?= $babinsa['rank'] == 'Pelda' ? 'selected' : '' ?>
                >Pelda</option>
                <option value="Serma"
                <?= $babinsa['rank'] == 'Serma' ? 'selected' : '' ?>
                >Serma</option>
                <option value="Sertu"
                <?= $babinsa['rank'] == 'Sertu' ? 'selected' : '' ?>
                >Sertu</option>
                <option value="Serda"
                <?= $babinsa['rank'] == 'Serda' ? 'selected' : '' ?>
                >Serda</option>
                <option value="Serka"
                <?= $babinsa['rank'] == 'Serka' ? 'selected' : '' ?>
                >Serka</option>
                <option value="Koptu"
                <?= $babinsa['rank'] == 'Koptu' ? 'selected' : '' ?>
                >Koptu</option>
                <option value="Kopda"
                <?= $babinsa['rank'] == 'Kopda' ? 'selected' : '' ?>
                >Kopda</option>
              </select>
              <div class="invalid-feedback">
                <?= session('errors.rank') ?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <a href="<?= base_url('/babinsa') ?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span>Back</a>
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