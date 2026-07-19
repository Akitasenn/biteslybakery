<?php
require_once 'includes/db.php';
$base_url = '';
$current_page = 'products';
$page_title = 'Products';
include 'includes/header.php';
include 'includes/navbar.php';

function emojiKategori($kategori) {
    $map = ['Cookies' => '🍪', 'Soes' => '🧁', 'Bolu' => '🍰', 'Hampers' => '🎁'];
    return $map[$kategori] ?? '🥐';
}

// Filter kategori (opsional)
$kategori_filter = isset($_GET['kategori']) ? trim($_GET['kategori']) : '';

if ($kategori_filter !== '') {
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM produk WHERE kategori = ? ORDER BY id DESC");
    mysqli_stmt_bind_param($stmt, "s", $kategori_filter);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $result = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id DESC");
}

$kategoriList = mysqli_query($koneksi, "SELECT DISTINCT kategori FROM produk");
?>

<section class="page-banner">
  <div class="container">
    <h1 class="section-title mb-2">Our Products</h1>
    <p class="section-subtitle mx-auto">Semua produk bakery homemade Bitesly Bakery, siap dipesan langsung via WhatsApp.</p>
  </div>
</section>

<section class="py-5">
  <div class="container">

    <div class="d-flex flex-wrap gap-2 justify-content-center mb-5">
      <a href="products.php" class="btn btn-sm rounded-pill <?= $kategori_filter==='' ? 'btn-brand' : 'btn-outline-brand' ?>">Semua</a>
      <?php while ($k = mysqli_fetch_assoc($kategoriList)): ?>
        <a href="products.php?kategori=<?= urlencode($k['kategori']) ?>" class="btn btn-sm rounded-pill <?= $kategori_filter===$k['kategori'] ? 'btn-brand' : 'btn-outline-brand' ?>">
          <?= htmlspecialchars($k['kategori']) ?>
        </a>
      <?php endwhile; ?>
    </div>

    <div class="row g-4">
      <?php if (mysqli_num_rows($result) === 0): ?>
        <div class="col-12 text-center text-secondary py-5">Belum ada produk pada kategori ini.</div>
      <?php endif; ?>
      <?php while ($produk = mysqli_fetch_assoc($result)): ?>
      <div class="col-lg-3 col-md-6">
        <div class="product-card">
          <div class="product-emoji"><?= emojiKategori($produk['kategori']) ?></div>
          <div class="product-body">
            <span class="badge rounded-pill mb-2" style="background:var(--brand-light); color:var(--brand);"><?= htmlspecialchars($produk['kategori']) ?></span>
            <h5 class="fw-semibold mb-1"><?= htmlspecialchars($produk['nama']) ?></h5>
            <div class="rating-stars mb-2">
              <?php $r = round($produk['rating']); for ($i=0;$i<5;$i++) echo $i < $r ? '★' : '☆'; ?>
            </div>
            <div class="product-price mb-3">Rp<?= number_format($produk['harga'],0,',','.') ?></div>
            <div class="d-flex gap-2">
              <a href="product-detail.php?id=<?= $produk['id'] ?>" class="btn btn-outline-brand btn-sm flex-fill">Detail</a>
              <a href="https://wa.me/<?= WA_NUMBER ?>?text=Halo%2C%20saya%20ingin%20pesan%20<?= urlencode($produk['nama']) ?>" target="_blank" class="btn btn-brand btn-sm flex-fill"><i class="bi bi-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<a href="https://wa.me/<?= WA_NUMBER ?>" target="_blank" class="wa-float"><i class="bi bi-whatsapp"></i></a>

<?php include 'includes/footer.php'; ?>
