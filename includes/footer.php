<?php if (!isset($base_url)) { $base_url = ''; } ?>
<footer class="footer-section text-light pt-5 pb-4 mt-5">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-4">
        <h4 class="fw-bold mb-3">🍞 Bitesly Bakery</h4>
        <p class="footer-text">Fresh homemade bakery buatan Semarang. Cookies, soes kering, bolu kering, dan hampers premium untuk setiap momen spesialmu.</p>
        <div class="d-flex gap-3 mt-3">
          <a href="#" class="footer-social" target="_blank"><i class="bi bi-instagram"></i></a>
          <a href="#" class="footer-social" target="_blank"><i class="bi bi-tiktok"></i></a>
          <a href="https://wa.me/<?= WA_NUMBER ?>" class="footer-social" target="_blank"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-6">
        <h6 class="fw-bold mb-3">Menu</h6>
        <ul class="list-unstyled footer-links">
          <li><a href="<?= $base_url ?>about.php">About</a></li>
          <li><a href="<?= $base_url ?>products.php">Products</a></li>
          <li><a href="<?= $base_url ?>contact.php">Contact</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-6">
        <h6 class="fw-bold mb-3">Kontak</h6>
        <ul class="list-unstyled footer-links">
          <li><i class="bi bi-geo-alt me-2"></i>Semarang, Jawa Tengah</li>
          <li><i class="bi bi-whatsapp me-2"></i>+62 812-3456-7890</li>
          <li><i class="bi bi-envelope me-2"></i>hello@biteslybakery.id</li>
        </ul>
      </div>
      <div class="col-lg-3">
        <h6 class="fw-bold mb-3">Jam Operasional</h6>
        <p class="footer-text mb-1">Senin – Sabtu: 08.00 – 20.00</p>
        <p class="footer-text">Minggu: 09.00 – 15.00</p>
      </div>
    </div>
    <hr class="border-secondary mt-4 mb-3">
    <div class="text-center footer-text small">
      &copy; <?= date('Y') ?> Bitesly Bakery. All rights reserved.
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
