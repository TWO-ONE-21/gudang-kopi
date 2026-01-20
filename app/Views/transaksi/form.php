<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="section-header">
  <h1><?= $title ?></h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="<?= base_url('transaksi') ?>">Transaksi</a></div>
    <div class="breadcrumb-item"><?= $type == 'in' ? 'Masuk' : 'Keluar' ?></div>
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

      <form action="<?= base_url('transaksi/save') ?>" method="POST">
        <input type="hidden" name="type" value="<?= $type ?>">
        
        <div class="form-group">
          <label>Product</label>
          <select class="form-control" name="product_id" required>
            <option value="">Pilih Product</option>
            <?php foreach ($products as $p) : ?>
            <option value="<?= $p['id'] ?>"><?= $p['nama_jenis'] ?> (Stok: <?= $p['stok'] ?>)</option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="row">
          <div class="col-md-6">
             <div class="form-group">
              <label>Quantity</label>
              <input type="number" name="quantity" class="form-control" required min="1">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Tanggal</label>
              <input type="datetime-local" name="date" class="form-control" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Notes</label>
          <textarea name="notes" class="form-control" style="height: 100px"></textarea>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('transaksi') ?>" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
