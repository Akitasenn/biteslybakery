<?php
session_start();
require_once '../includes/db.php';
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit; }

$current = 'produk';
$produkList = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk | Admin Bitesly Bakery</title>
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
        <h3 class="fw-bold mb-0">Kelola Produk</h3>
        <a href="tambah_produk.php" class="btn btn-brand rounded-pill px-4"><i class="bi bi-plus-lg"></i> Tambah Produk</a>
      </div>

      <?php if (isset($_GET['status']) && $_GET['status'] === 'deleted'): ?>
        <div class="alert alert-success">Produk berhasil dihapus.</div>
      <?php elseif (isset($_GET['status']) && $_GET['status'] === 'added'): ?>
        <div class="alert alert-success">Produk berhasil ditambahkan.</div>
      <?php elseif (isset($_GET['status']) && $_GET['status'] === 'updated'): ?>
        <div class="alert alert-success">Produk berhasil diperbarui.</div>
      <?php endif; ?>

      <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-middle">
              <thead>
                <tr class="text-secondary small">
                  <th>#</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Berat</th><th>Rating</th><th class="text-end">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; while ($p = mysqli_fetch_assoc($produkList)): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td class="fw-semibold"><?= htmlspecialchars($p['nama']) ?></td>
                  <td><?= htmlspecialchars($p['kategori']) ?></td>
                  <td>Rp<?= number_format($p['harga'],0,',','.') ?></td>
                  <td><?= htmlspecialchars($p['berat']) ?></td>
                  <td><?= $p['rating'] ?> ★</td>
                  <td class="text-end">
                    <a href="edit_produk.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-brand"><i class="bi bi-pencil"></i></a>
                    <a href="hapus_produk.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus produk ini?');"><i class="bi bi-trash"></i></a>
                  </td>
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
