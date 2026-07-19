<?php
require_once 'includes/db.php';
$base_url = '';
$current_page = 'products';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$stmt = mysqli_prepare($koneksi, "SELECT * FROM produk WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$produk = mysqli_fetch_assoc($result);

if (!$produk) {
    header("Location: products.php");
    exit;
}

function emojiKategori($kategori) {
    $map = ['Cookies' => '🍪', 'Soes' => '🧁', 'Bolu' => '🍰', 'Hampers' => '🎁'];
    return $map[$kategori] ?? '🥐';
}

$page_title = $produk['nama'];
include 'includes/header.php';
include 'includes/navbar.php';

$pesan_wa = "Halo, saya ingin pesan " . $produk['nama'] . " (Rp" . number_format($produk['harga'],0,',','.') . ")";
?>

<section class="py-5">
  <div class="container">
    <nav aria-label="breadcrumb" class="mb-4">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item"><a href="products.php" class="text-decoration-none">Products</a></li>
        <li class="breadcrumb-item active"><?= htmlspecialchars($produk['nama']) ?></li>
      </ol>
    </nav>

    <div class="row g-5 align-items-start">
      <div class="col-lg-6">
        <div class="product-emoji rounded-4" style="height:380px; font-size:8rem;">
          <?= emojiKategori($produk['kategori']) ?>
        </div>
      </div>
      <div class="col-lg-6">
        <span class="badge rounded-pill mb-2" style="background:var(--brand-light); color:var(--brand);"><?= htmlspecialchars($produk['kategori']) ?></span>
        <h1 class="fw-bold mb-2"><?= htmlspecialchars($produk['nama']) ?></h1>
        <div class="rating-stars mb-3 fs-5">
          <?php $r = round($produk['rating']); for ($i=0;$i<5;$i++) echo $i < $r ? '★' : '☆'; ?>
          <span class="text-secondary fs-6 ms-1">(<?= $produk['rating'] ?>/5)</span>
        </div>
        <div class="product-price fs-2 mb-4">Rp<?= number_format($produk['harga'],0,',','.') ?></div>

        <p class="text-secondary"><?= nl2br(htmlspecialchars($produk['deskripsi'])) ?></p>

        <table class="table table-borderless w-auto mt-3">
          <tr>
            <td class="fw-semibold pe-4">Komposisi</td>
            <td><?= htmlspecialchars($produk['komposisi']) ?></td>
          </tr>
          <tr>
            <td class="fw-semibold pe-4">Berat</td>
            <td><?= htmlspecialchars($produk['berat']) ?></td>
          </tr>
        </table>

        <a href="https://wa.me/<?= WA_NUMBER ?>?text=<?= urlencode($pesan_wa) ?>" target="_blank" class="btn btn-brand btn-lg rounded-pill px-4 mt-3">
          <i class="bi bi-whatsapp"></i> Pesan via WhatsApp
        </a>
        <a href="products.php" class="btn btn-outline-brand btn-lg rounded-pill px-4 mt-3">Kembali</a>
      </div>
    </div>
  </div>
</section>

<a href="https://wa.me/<?= WA_NUMBER ?>" target="_blank" class="wa-float"><i class="bi bi-whatsapp"></i></a>

<?php include 'includes/footer.php'; ?>
