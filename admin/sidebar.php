<?php if (!isset($current)) { $current = ''; } ?>
<div class="col-lg-2 admin-sidebar p-3 d-flex flex-column">
  <a href="dashboard.php" class="text-decoration-none text-white fw-bold fs-5 mb-4 d-block px-2">🍞 Bitesly Admin</a>
  <ul class="nav nav-pills flex-column gap-1">
    <li class="nav-item">
      <a class="nav-link <?= $current==='dashboard' ? 'active' : '' ?>" href="dashboard.php"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= $current==='produk' ? 'active' : '' ?>" href="produk.php"><i class="bi bi-box-seam me-2"></i>Produk</a>
    </li>
  </ul>
  <div class="mt-auto">
    <a href="../index.php" class="nav-link" target="_blank"><i class="bi bi-globe me-2"></i>Lihat Website</a>
    <a href="logout.php" class="nav-link text-danger"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
  </div>
</div>
