<?= $this->extend('templates/index') ?>


<?= $this->section('page-content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800">Halaman Ubah lampiran</h1>
    <?php if(session()->getFlashData('tx_error_message')) : ?>
      <div class="col-sm-12 alert alert-danger" role="alert">
          <?= session()->getFlashData('tx_error_message'); ?>
      </div>
    <?php endif ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <form action="<?= base_url('member/piket/lampiran/update/'. $piket['id'].'/'. $lampiran['id']) ?>" method="POST" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="form-horizontal">
            <div class="form-group row g-2">
              <div class="col-lg-2">
                <img src="<?= base_url('image/lampiran/'. $lampiran['lampiran']) ?>" id="image-preview" alt="Preview" class="img-fluid">
              </div>
              <div class="col-lg-8">
                <input class="custom-file-input <?= session('errors.lampiran') ? 'is-invalid' : '' ?>" type="file" name="lampiran" id="attachment" accept="image/*" onchange="previewImage()" required>
                <div class="invalid-feedback">
                  <?= session('errors.lampiran') ?>
                </div>
                <label class="custom-file-label" for="poster"><?= $lampiran['lampiran'] ?></label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10">
                <a href="<?= base_url('member/piket/laporan/'. $piket['id']) ?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Kembali</a>
                <button type="submit" class="btn btn-primary btn-flat" title="Edit Audio"><span class="fa fa-save"></span> Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>

<!-- /.container-fluid -->
<?= $this->endSection() ?>