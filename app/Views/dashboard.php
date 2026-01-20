<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="section-header">
  <h1>Dashboard</h1>
</div>

<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-box"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Produk</h4>
        </div>
        <div class="card-body">
          <?= $total_produk ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-exchange-alt"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Transaksi</h4>
        </div>
        <div class="card-body">
          <?= $total_transaksi ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="fas fa-exclamation-triangle"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Stok Menipis</h4>
        </div>
        <div class="card-body">
          <?= $stok_menipis ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
