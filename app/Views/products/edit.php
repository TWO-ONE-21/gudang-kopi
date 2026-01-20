<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="section-header">
  <h1>Edit Product</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="<?= base_url('products') ?>">Product</a></div>
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

      <form action="<?= base_url('products/' . $product['id']) ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="gambar_lama" value="<?= $product['gambar'] ?>">
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Jenis Kopi</label>
              <select class="form-control" name="jenis_kopi_id" required>
                <option value="">Pilih Jenis Kopi</option>
                <?php foreach ($jenis_kopi as $jk) : ?>
                <option value="<?= $jk['id'] ?>" <?= $jk['id'] == $product['jenis_kopi_id'] ? 'selected' : '' ?>><?= $jk['nama_jenis'] ?></option>
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
                 <option value="<?= $s['id'] ?>" <?= $s['id'] == $product['supplier_id'] ? 'selected' : '' ?>><?= $s['nama_supplier'] ?></option>
                 <?php endforeach; ?>
               </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
             <div class="form-group">
              <label>Stok</label>
              <input type="number" name="stok" class="form-control" value="<?= old('stok', $product['stok']) ?>" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Harga Beli</label>
              <input type="number" name="harga_beli" class="form-control" value="<?= old('harga_beli', $product['harga_beli']) ?>" required>
            </div>
          </div>
           <div class="col-md-4">
            <div class="form-group">
              <label>Harga Jual</label>
              <input type="number" name="harga_jual" class="form-control" value="<?= old('harga_jual', $product['harga_jual']) ?>" required>
            </div>
          </div>
        </div>

         <div class="form-group">
            <label>Gambar</label>
            <div class="mb-2">
                <?php if ($product['gambar']) : ?>
                <img src="<?= base_url('uploads/produk/' . $product['gambar']) ?>" alt="<?= $product['gambar'] ?>" width="100">
                <?php endif; ?>
            </div>
            <input type="file" name="gambar" class="form-control">
         </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="<?= base_url('products') ?>" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
