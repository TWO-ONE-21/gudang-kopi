<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="section-header">
  <h1>Tambah Product</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="<?= base_url('products') ?>">Product</a></div>
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

      <form action="<?= base_url('products') ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Jenis Kopi</label>
              <select class="form-control" name="jenis_kopi_id" required>
                <option value="">Pilih Jenis Kopi</option>
                <?php foreach ($jenis_kopi as $jk) : ?>
                <option value="<?= $jk['id'] ?>"><?= $jk['nama_jenis'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
               <label>Supplier</label>
               <select class="form-control" name="supplier_id" required>
                 <option value="">Pilih Supplier</option>
                 <?php foreach ($suppliers as $s) : ?>
                 <option value="<?= $s['id'] ?>"><?= $s['nama_supplier'] ?></option>
                 <?php endforeach; ?>
               </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
             <div class="form-group">
              <label>Stok</label>
              <input type="number" name="stok" class="form-control" value="<?= old('stok') ?>" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Harga Beli</label>
              <input type="number" name="harga_beli" class="form-control" value="<?= old('harga_beli') ?>" required>
            </div>
          </div>
           <div class="col-md-4">
            <div class="form-group">
              <label>Harga Jual</label>
              <input type="number" name="harga_jual" class="form-control" value="<?= old('harga_jual') ?>" required>
            </div>
          </div>
        </div>

         <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
         </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('products') ?>" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
