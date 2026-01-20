<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="section-header">
  <h1>Edit Supplier</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="<?= base_url('suppliers') ?>">Supplier</a></div>
    <div class="breadcrumb-item">Edit</div>
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

      <form action="<?= base_url('suppliers/' . $supplier['id']) ?>" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
          <label>Nama Supplier</label>
          <input type="text" name="nama_supplier" class="form-control" value="<?= old('nama_supplier', $supplier['nama_supplier']) ?>" required>
        </div>
        <div class="form-group">
          <label>Telp</label>
          <input type="text" name="telp" class="form-control" value="<?= old('telp', $supplier['telp']) ?>">
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" style="height: 100px"><?= old('alamat', $supplier['alamat']) ?></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="<?= base_url('suppliers') ?>" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
