<?php
require_once 'includes/db.php';
$base_url = '';
$current_page = 'about';
$page_title = 'About';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="page-banner">
  <div class="container">
    <h1 class="section-title mb-2">About Bitesly Bakery</h1>
    <p class="section-subtitle mx-auto">Startup bakery digital asal Semarang yang menghadirkan camilan homemade premium.</p>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row align-items-center gy-4 mb-5">
      <div class="col-lg-6">
        <h2 class="section-title mb-3">Cerita Kami</h2>
        <p class="text-secondary">
          Bitesly Bakery didirikan pada tahun 2026 oleh Daffa Setya Ramadhan di Semarang, Jawa Tengah, sebagai jawaban atas kebutuhan masyarakat akan produk bakery berkualitas yang mudah diakses secara digital.
        </p>
        <p class="text-secondary">
          Berbeda dari bakery tradisional yang masih mengandalkan pemasaran offline, kami memanfaatkan website, marketplace, Instagram, TikTok, dan WhatsApp Business sebagai kanal utama pemasaran dan penjualan — sehingga proses pemesanan menjadi lebih cepat, mudah, dan terintegrasi.
        </p>
        <p class="text-secondary">
          Setiap produk kami, mulai dari Cookies Premium, Soes Kering, Bolu Kering, hingga Hampers Bakery, dibuat dari bahan pilihan dan dikemas secara modern lengkap dengan QR Code untuk akses katalog digital.
        </p>
      </div>
      <div class="col-lg-6 text-center">
        <div class="hero-emoji-float" style="font-size:6rem;">🥐🍪🧁🍰</div>
      </div>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="testi-card h-100">
          <div class="why-icon"><i class="bi bi-eye"></i></div>
          <h5 class="fw-semibold text-center">Vision</h5>
          <p class="text-secondary text-center">Menjadi startup bakery digital pilihan masyarakat Indonesia dengan produk berkualitas premium, pelayanan terbaik, dan pengalaman belanja mudah melalui teknologi digital.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card h-100">
          <div class="why-icon"><i class="bi bi-flag"></i></div>
          <h5 class="fw-semibold text-center">Mission</h5>
          <ul class="text-secondary small mb-0">
            <li>Menghasilkan produk bakery berkualitas tinggi</li>
            <li>Mengembangkan pemasaran berbasis digital</li>
            <li>Pelayanan pelanggan cepat &amp; profesional</li>
            <li>Inovasi produk sesuai tren pasar</li>
            <li>Bisnis yang berkelanjutan &amp; menguntungkan</li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card h-100">
          <div class="why-icon"><i class="bi bi-gem"></i></div>
          <h5 class="fw-semibold text-center">Nilai Perusahaan</h5>
          <ul class="text-secondary small mb-0">
            <li>Kualitas &amp; konsistensi produk</li>
            <li>Kejujuran &amp; transparansi</li>
            <li>Inovasi berkelanjutan</li>
            <li>Kepuasan pelanggan sebagai prioritas</li>
            <li>Digital-first mindset</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<a href="https://wa.me/<?= WA_NUMBER ?>" target="_blank" class="wa-float"><i class="bi bi-whatsapp"></i></a>

<?php include 'includes/footer.php'; ?>
