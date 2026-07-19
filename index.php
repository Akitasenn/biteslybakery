<?php
require_once 'includes/db.php';
$base_url = '';
$current_page = 'home';
$page_title = 'Home';
include 'includes/header.php';
include 'includes/navbar.php';

// Ambil 4 produk unggulan
$query = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id DESC LIMIT 4");

// Emoji per kategori (karena belum ada foto asli)
function emojiKategori($kategori) {
    $map = [
        'Cookies' => '🍪',
        'Soes' => '🧁',
        'Bolu' => '🍰',
        'Hampers' => '🎁',
    ];
    return $map[$kategori] ?? '🥐';
}
?>

<!-- HERO -->
<section class="hero-section">
  <div class="container">
    <div class="row align-items-center gy-5">
      <div class="col-lg-6">
        <span class="hero-badge">🥖 Homemade &amp; Premium</span>
        <h1 class="hero-title mt-3 mb-3">Fresh Homemade Bakery <span class="brand-accent">Every Day</span></h1>
        <p class="lead text-secondary mb-4">Cookies, soes kering, bolu kering, dan hampers premium buatan Bitesly Bakery, dibuat dari bahan pilihan dan dikemas modern langsung dari Semarang.</p>
        <div class="d-flex flex-wrap gap-3">
          <a href="products.php" class="btn btn-brand btn-lg rounded-pill px-4">Shop Now</a>
          <a href="contact.php" class="btn btn-outline-brand btn-lg rounded-pill px-4">Contact Us</a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="hero-emoji-float">🍪🧁🍰</div>
      </div>
    </div>
  </div>
</section>

<!-- PRODUK UNGGULAN -->
<section class="py-5 my-4">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title">Produk Unggulan</h2>
      <p class="section-subtitle">Pilihan terbaik dari Bitesly Bakery yang paling disukai pelanggan kami.</p>
    </div>
    <div class="row g-4">
      <?php while ($produk = mysqli_fetch_assoc($query)): ?>
      <div class="col-lg-3 col-md-6">
        <div class="product-card">
          <div class="product-emoji"><?= emojiKategori($produk['kategori']) ?></div>
          <div class="product-body">
            <h5 class="fw-semibold mb-1"><?= htmlspecialchars($produk['nama']) ?></h5>
            <div class="rating-stars mb-2">
              <?php
              $r = round($produk['rating']);
              for ($i=0;$i<5;$i++) echo $i < $r ? '★' : '☆';
              ?>
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
    <div class="text-center mt-5">
      <a href="products.php" class="btn btn-outline-brand rounded-pill px-4">Lihat Semua Produk</a>
    </div>
  </div>
</section>

<!-- TENTANG SINGKAT -->
<section class="py-5" style="background:#fff;">
  <div class="container">
    <div class="row align-items-center gy-4">
      <div class="col-lg-6">
        <div class="hero-emoji-float" style="font-size:5.5rem;">👩‍🍳🥐</div>
      </div>
      <div class="col-lg-6">
        <h2 class="section-title mb-3">Tentang Bitesly Bakery</h2>
        <p class="text-secondary">Bitesly Bakery adalah startup bakery digital asal Semarang yang menggabungkan produk homemade premium dengan ekosistem penjualan online. Kami hadir untuk memberikan pengalaman belanja bakery berkualitas yang praktis, cepat, dan menyenangkan.</p>
        <a href="about.php" class="btn btn-brand rounded-pill px-4 mt-2">Selengkapnya</a>
      </div>
    </div>
  </div>
</section>

<!-- MENGAPA MEMILIH KAMI -->
<section class="py-5 my-4">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title">Mengapa Memilih Kami</h2>
      <p class="section-subtitle">Alasan pelanggan mempercayakan camilan spesialnya pada Bitesly Bakery.</p>
    </div>
    <div class="row g-4 text-center">
      <div class="col-md-3 col-6">
        <div class="why-icon"><i class="bi bi-award"></i></div>
        <h6 class="fw-semibold">Kualitas Premium</h6>
        <p class="text-secondary small">Bahan pilihan &amp; resep homemade</p>
      </div>
      <div class="col-md-3 col-6">
        <div class="why-icon"><i class="bi bi-box-seam"></i></div>
        <h6 class="fw-semibold">Kemasan Modern</h6>
        <p class="text-secondary small">Rapi, higienis, dan estetik</p>
      </div>
      <div class="col-md-3 col-6">
        <div class="why-icon"><i class="bi bi-whatsapp"></i></div>
        <h6 class="fw-semibold">Pesan Mudah</h6>
        <p class="text-secondary small">Order cepat langsung via WhatsApp</p>
      </div>
      <div class="col-md-3 col-6">
        <div class="why-icon"><i class="bi bi-truck"></i></div>
        <h6 class="fw-semibold">Pengiriman Tepat Waktu</h6>
        <p class="text-secondary small">Selalu fresh saat sampai tujuan</p>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONI -->
<section class="py-5" style="background:#fff;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title">Testimoni Pelanggan</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="testi-card">
          <div class="rating-stars mb-2">★★★★★</div>
          <p class="text-secondary">"Cookiesnya enak banget, renyah dan nggak terlalu manis. Packaging-nya juga rapi!"</p>
          <div class="fw-semibold mt-3">— Andi, Mahasiswa</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card">
          <div class="rating-stars mb-2">★★★★★</div>
          <p class="text-secondary">"Order hampers untuk acara kantor, hasilnya elegan dan rasanya premium. Recommended!"</p>
          <div class="fw-semibold mt-3">— Sarah, Marketing Executive</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card">
          <div class="rating-stars mb-2">★★★★☆</div>
          <p class="text-secondary">"Bolu keringnya jadi camilan favorit keluarga di rumah. Pemesanan via WA juga cepat direspon."</p>
          <div class="fw-semibold mt-3">— Rina, Ibu Rumah Tangga</div>
        </div>
      </div>
    </div>
  </div>
</section>

<a href="https://wa.me/<?= WA_NUMBER ?>" target="_blank" class="wa-float"><i class="bi bi-whatsapp"></i></a>

<?php include 'includes/footer.php'; ?>
