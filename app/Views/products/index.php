<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="section-header">
  <h1>Products</h1>
  <div class="section-header-button">
    <a href="<?= base_url('products/new') ?>" class="btn btn-primary">Tambah Data</a>
  </div>
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
              <th>Gambar</th>
              <th>Nama Jenis</th>
              <th>Nama Supplier</th>
              <th>Stok</th>
              <th>Harga Beli</th>
              <th>Harga Jual</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $key => $value) : ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td>
                <?php if ($value['gambar']) : ?>
                <img src="<?= base_url('uploads/produk/' . $value['gambar']) ?>" alt="<?= $value['gambar'] ?>" width="50">
                <?php else : ?>
                -
                <?php endif; ?>
              </td>
              <td><?= $value['nama_jenis'] ?></td>
              <td><?= $value['nama_supplier'] ?></td>
              <td><?= $value['stok'] ?></td>
              <td><?= number_format($value['harga_beli'], 0, ',', '.') ?></td>
              <td><?= number_format($value['harga_jual'], 0, ',', '.') ?></td>
              <td>
                <a href="<?= base_url('products/' . $value['id'] . '/edit') ?>" class="btn btn-warning btn-sm">Edit</a>
                <form action="<?= base_url('products/' . $value['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
