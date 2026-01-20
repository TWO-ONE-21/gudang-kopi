<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="section-header">
  <h1>Transaksi</h1>
</div>

<div class="section-body">
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        <?= session()->getFlashdata('success') ?>
      </div>
    </div>
  <?php endif; ?>

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
