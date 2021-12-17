<?= $this->extend('templates/index') ?>


<?= $this->section('page-content') ?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800" id="titlee">Halaman Tambah Laporan</h1>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <form action="<?= base_url('member/piket/laporan/create/'. $piket['id']) ?>" method="POST">
          <?= csrf_field() ?>
          <div class="form-horizontal">
            <?php if(session()->getFlashData('tx_error_message')) : ?>
              <div class="col-sm-10 alert alert-danger" role="alert">
                <?= session()->getFlashData('tx_error_message'); ?>
              </div>
            <?php endif ?>
            
          <div class="form-group">
            <label class="col-sm-2 control-label">Laporan</label>
            <div class="col-sm-10">
              <textarea name="keterangan" id="ckeditor" style="width: 100%; height: 500px"><?= old('keterangan') ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10">
              <a href="<?= base_url('member/piket/laporan/'. $piket['id']) ?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span>Back</a>
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