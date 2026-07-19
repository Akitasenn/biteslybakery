<?php
require_once 'includes/db.php';
$base_url = '';
$current_page = 'contact';
$page_title = 'Contact';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="page-banner">
  <div class="container">
    <h1 class="section-title mb-2">Contact Us</h1>
    <p class="section-subtitle mx-auto">Ada pertanyaan atau ingin pesan? Hubungi kami melalui kanal berikut.</p>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row g-4 mb-5">
      <div class="col-md-4">
        <div class="testi-card text-center h-100">
          <div class="why-icon"><i class="bi bi-whatsapp"></i></div>
          <h5 class="fw-semibold">WhatsApp</h5>
          <p class="text-secondary">+62 812-3456-7890</p>
          <a href="https://wa.me/<?= WA_NUMBER ?>" target="_blank" class="btn btn-brand btn-sm rounded-pill px-3">Chat Sekarang</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card text-center h-100">
          <div class="why-icon"><i class="bi bi-envelope"></i></div>
          <h5 class="fw-semibold">Email</h5>
          <p class="text-secondary">hello@biteslybakery.id</p>
          <a href="mailto:hello@biteslybakery.id" class="btn btn-outline-brand btn-sm rounded-pill px-3">Kirim Email</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testi-card text-center h-100">
          <div class="why-icon"><i class="bi bi-instagram"></i></div>
          <h5 class="fw-semibold">Instagram</h5>
          <p class="text-secondary">@bitesly.bakery</p>
          <a href="#" target="_blank" class="btn btn-outline-brand btn-sm rounded-pill px-3">Kunjungi</a>
        </div>
      </div>
    </div>

    <div class="row g-4 align-items-stretch">
      <div class="col-lg-6">
        <div class="testi-card h-100">
          <h5 class="fw-semibold mb-3"><i class="bi bi-geo-alt brand-accent"></i> Lokasi Kami</h5>
          <p class="text-secondary">Semarang, Jawa Tengah, Indonesia</p>
          <div class="ratio ratio-4x3 rounded-4 overflow-hidden">
            <iframe
              src="https://www.google.com/maps?q=Semarang,Jawa+Tengah&output=embed"
              style="border:0;" allowfullscreen loading="lazy">
            </iframe>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="testi-card h-100">
          <h5 class="fw-semibold mb-3"><i class="bi bi-clock brand-accent"></i> Jam Operasional</h5>
          <table class="table table-borderless">
            <tr><td>Senin – Jumat</td><td class="text-end fw-semibold">08.00 – 20.00</td></tr>
            <tr><td>Sabtu</td><td class="text-end fw-semibold">08.00 – 20.00</td></tr>
            <tr><td>Minggu</td><td class="text-end fw-semibold">09.00 – 15.00</td></tr>
          </table>
          <p class="text-secondary mb-0">Untuk pemesanan tercepat, silakan hubungi kami langsung melalui WhatsApp. Tim kami akan merespon dalam waktu singkat.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<a href="https://wa.me/<?= WA_NUMBER ?>" target="_blank" class="wa-float"><i class="bi bi-whatsapp"></i></a>

<?php include 'includes/footer.php'; ?>
