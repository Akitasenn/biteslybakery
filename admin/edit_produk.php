<?php
session_start();
require_once '../includes/db.php';
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit; }

$current = 'produk';
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$error = '';

$stmt = mysqli_prepare($koneksi, "SELECT * FROM produk WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$produk = mysqli_stmt_get_result($stmt)->fetch_assoc();

if (!$produk) { header("Location: produk.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $kategori = trim($_POST['kategori']);
    $harga = (int) $_POST['harga'];
    $deskripsi = trim($_POST['deskripsi']);
    $komposisi = trim($_POST['komposisi']);
    $berat = trim($_POST['berat']);
    $rating = (float) $_POST['rating'];
    $gambar = $produk['gambar'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $allowed = ['jpg','jpeg','png','webp'];
        $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $gambar = 'produk_' . time() . '.' . $ext;
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/images/' . $gambar);
        }
    }

    if ($nama && $kategori && $harga > 0) {
        $up = mysqli_prepare($koneksi, "UPDATE produk SET nama=?, kategori=?, harga=?, deskripsi=?, komposisi=?, berat=?, gambar=?, rating=? WHERE id=?");
        mysqli_stmt_bind_param($up, "ssissssdi", $nama, $kategori, $harga, $deskripsi, $komposisi, $berat, $gambar, $rating, $id);
        if (mysqli_stmt_execute($up)) {
            header("Location: produk.php?status=updated");
            exit;
        } else {
            $error = "Gagal memperbarui produk: " . mysqli_error($koneksi);
        }
    } else {
        $error = "Nama, kategori, dan harga wajib diisi dengan benar.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk | Admin Bitesly Bakery</title>
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
      <h3 class="fw-bold mb-4">Edit Produk</h3>

      <?php if ($error): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>

      <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
          <form method="POST" enctype="multipart/form-data">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($produk['nama']) ?>" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?= htmlspecialchars($produk['kategori']) ?>" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Harga (Rp)</label>
                <input type="number" name="harga" class="form-control" value="<?= $produk['harga'] ?>" required min="0">
              </div>
              <div class="col-md-6">
                <label class="form-label">Berat / Isi</label>
                <input type="text" name="berat" class="form-control" value="<?= htmlspecialchars($produk['berat']) ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label">Rating (0 - 5)</label>
                <input type="number" step="0.1" min="0" max="5" name="rating" class="form-control" value="<?= $produk['rating'] ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label">Ganti Foto Produk (opsional)</label>
                <input type="file" name="gambar" class="form-control" accept=".jpg,.jpeg,.png,.webp">
              </div>
              <div class="col-12">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"><?= htmlspecialchars($produk['deskripsi']) ?></textarea>
              </div>
              <div class="col-12">
                <label class="form-label">Komposisi</label>
                <textarea name="komposisi" class="form-control" rows="2"><?= htmlspecialchars($produk['komposisi']) ?></textarea>
              </div>
            </div>
            <div class="mt-4 d-flex gap-2">
              <button type="submit" class="btn btn-brand rounded-pill px-4">Simpan Perubahan</button>
              <a href="produk.php" class="btn btn-outline-brand rounded-pill px-4">Batal</a>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
</body>
</html>
