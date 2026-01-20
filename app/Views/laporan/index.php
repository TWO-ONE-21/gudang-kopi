<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="section-header">
  <h1>Laporan Transaksi</h1>
  <div class="section-header-button">
    <a href="<?= base_url('laporan/cetak') ?>" target="_blank" class="btn btn-primary">Cetak PDF</a>
  </div>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-md">
          <thead>
            <tr>
              <th>#</th>
              <th>Tanggal</th>
              <th>Type</th>
              <th>Product</th>
              <th>Qty</th>
              <th>User</th>
              <th>Notes</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($transactions as $key => $value) : ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $value['date'] ?></td>
              <td>
                <?php if ($value['type'] == 'in') : ?>
                    <span class="badge badge-success">Masuk</span>
                <?php else : ?>
                    <span class="badge badge-danger">Keluar</span>
                <?php endif; ?>
              </td>
              <td><?= $value['product_name'] ?></td>
              <td><?= $value['quantity'] ?></td>
              <td><?= $value['username'] ?></td>
              <td><?= $value['notes'] ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
