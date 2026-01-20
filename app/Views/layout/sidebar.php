<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= base_url('dashboard') ?>">Coffee Warehouse</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?= base_url('dashboard') ?>">CW</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="<?= uri_string() == 'dashboard' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('dashboard') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
      
      <li class="menu-header">Master Data</li>
      <li class="dropdown <?= in_array(uri_string(), ['jenis-kopi', 'suppliers', 'products']) ? 'active' : '' ?>">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master Data</span></a>
        <ul class="dropdown-menu">
          <li class="<?= uri_string() == 'jenis-kopi' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('jenis-kopi') ?>">Jenis Kopi</a></li>
          <li class="<?= uri_string() == 'suppliers' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('suppliers') ?>">Supplier</a></li>
          <li class="<?= uri_string() == 'products' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('products') ?>">Product</a></li>
        </ul>
      </li>

      <li class="menu-header">Transaksi</li>
      <li class="dropdown <?= in_array(uri_string(), ['transaksi/masuk', 'transaksi/keluar']) ? 'active' : '' ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Transaksi</span></a>
        <ul class="dropdown-menu">
          <li class="<?= uri_string() == 'transaksi/masuk' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('transaksi/masuk') ?>">Barang Masuk</a></li>
          <li class="<?= uri_string() == 'transaksi/keluar' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('transaksi/keluar') ?>">Barang Keluar</a></li>
        </ul>
      </li>

      <li class="menu-header">Laporan</li>
      <li class="<?= uri_string() == 'laporan' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('laporan') ?>"><i class="far fa-file-alt"></i> <span>Laporan</span></a></li>
    </ul>
  </aside>
</div>
