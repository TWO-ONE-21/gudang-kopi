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

      <li class="menu-header">Transactions</li>
      <li class="dropdown <?= in_array(uri_string(), ['transactions/in', 'transactions/out']) ? 'active' : '' ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Transactions</span></a>
        <ul class="dropdown-menu">
          <li class="<?= uri_string() == 'transactions/in' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('transactions/in') ?>">Stock In</a></li>
          <li class="<?= uri_string() == 'transactions/out' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('transactions/out') ?>">Stock Out</a></li>
        </ul>
      </li>

      <li class="menu-header">Reports</li>
      <li class="<?= uri_string() == 'reports' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('reports') ?>"><i class="far fa-file-alt"></i> <span>Reports</span></a></li>
    </ul>
  </aside>
</div>
