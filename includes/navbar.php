<?php
if (!isset($base_url)) { $base_url = ''; }
if (!isset($current_page)) { $current_page = ''; }
function navActive($page, $current) { return $page === $current ? 'active' : ''; }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top py-3">
  <div class="container">
    <a class="navbar-brand fw-bold fs-3" href="<?= $base_url ?>index.php">
      🍞 <span class="brand-text">Bitesly</span> <span class="brand-accent">Bakery</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navMenu">
      <ul class="navbar-nav align-items-lg-center gap-lg-2">
        <li class="nav-item"><a class="nav-link <?= navActive('home',$current_page) ?>" href="<?= $base_url ?>index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link <?= navActive('products',$current_page) ?>" href="<?= $base_url ?>products.php">Products</a></li>
        <li class="nav-item"><a class="nav-link <?= navActive('about',$current_page) ?>" href="<?= $base_url ?>about.php">About</a></li>
        <li class="nav-item"><a class="nav-link <?= navActive('contact',$current_page) ?>" href="<?= $base_url ?>contact.php">Contact</a></li>
        <li class="nav-item ms-lg-2">
          <a class="btn btn-brand rounded-pill px-4" href="https://wa.me/<?= WA_NUMBER ?>?text=Halo%20Bitesly%20Bakery%2C%20saya%20ingin%20bertanya%20tentang%20produk." target="_blank">
            <i class="bi bi-whatsapp"></i> Order
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
