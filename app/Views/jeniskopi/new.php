<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="section-header">
  <h1>Tambah Jenis Kopi</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="<?= base_url('jenis-kopi') ?>">Jenis Kopi</a></div>
    <div class="breadcrumb-item">Tambah</div>
  </div>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <?php if (session()->getFlashdata('error')) : ?>
          <div class="alert alert-danger" role="alert">
              <?= session()->getFlashdata('error'); ?>
          </div>
      <?php endif; ?>

      <form action="<?= base_url('jenis-kopi') ?>" method="POST">
        <div class="form-group">
          <label>Nama Jenis</label>
          <input type="text" name="nama_jenis" class="form-control" value="<?= old('nama_jenis') ?>" required>
        </div>
        <div class="form-group">
          <label>Deskripsi</label>
          <textarea name="deskripsi" class="form-control" style="height: 100px"><?= old('deskripsi') ?></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('jenis-kopi') ?>" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>