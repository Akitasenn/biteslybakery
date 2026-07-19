<?php
session_start();
require_once '../includes/db.php';
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit; }

$totalProduk = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM produk"))['total'];
$totalKategori = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(DISTINCT kategori) as total FROM produk"))['total'];
$hargaTertinggi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(harga) as harga FROM produk"))['harga'];
$produkTerbaru = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id DESC LIMIT 5");

$current = 'dashboard';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin Bitesly Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <?php include 'sidebar.php'; ?>
    <div class="col-lg-10 py-4 px-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h3 class="fw-bold mb-0">Dashboard</h3>
          <p class="text-secondary">Selamat datang, <?= htmlspecialchars($_SESSION['admin_username']) ?> 👋</p>
        </div>
        <a href="tambah_produk.php" class="btn btn-brand rounded-pill px-4"><i class="bi bi-plus-lg"></i> Tambah Produk</a>
      </div>

      <div class="row g-4 mb-4">
        <div class="col-md-4">
          <div class="card stat-card p-4" style="background:linear-gradient(135deg,#C9752B,#8A4A16);">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <div class="small opacity-75">Jumlah Produk</div>
                <div class="fs-2 fw-bold"><?= $totalProduk ?></div>
              </div>
              <i class="bi bi-box-seam fs-1 opacity-50"></i>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card stat-card p-4" style="background:linear-gradient(135deg,#2E2018,#54402f);">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <div class="small opacity-75">Kategori Produk</div>
                <div class="fs-2 fw-bold"><?= $totalKategori ?></div>
              </div>
              <i class="bi bi-tags fs-1 opacity-50"></i>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card stat-card p-4" style="background:linear-gradient(135deg,#f5b301,#c98a01);">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <div class="small opacity-75">Harga Tertinggi</div>
                <div class="fs-4 fw-bold">Rp<?= number_format($hargaTertinggi,0,',','.') ?></div>
              </div>
              <i class="bi bi-cash-stack fs-1 opacity-50"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
          <h5 class="fw-semibold mb-3">Produk Terbaru</h5>
          <div class="table-responsive">
            <table class="table align-middle">
              <thead>
                <tr class="text-secondary small">
                  <th>Nama</th><th>Kategori</th><th>Harga</th><th>Rating</th><th></th>
                </tr>
              </thead>
              <tbody>
                <?php while ($p = mysqli_fetch_assoc($produkTerbaru)): ?>
                <tr>
                  <td class="fw-semibold"><?= htmlspecialchars($p['nama']) ?></td>
                  <td><?= htmlspecialchars($p['kategori']) ?></td>
                  <td>Rp<?= number_format($p['harga'],0,',','.') ?></td>
                  <td><?= $p['rating'] ?> ★</td>
                  <td class="text-end"><a href="produk.php" class="btn btn-sm btn-outline-brand">Kelola</a></td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</body>
</html>
