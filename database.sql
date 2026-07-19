-- =========================================================
-- Database Bitesly Bakery
-- Import file ini melalui phpMyAdmin (XAMPP) sebelum
-- menjalankan website.
-- =========================================================

CREATE DATABASE IF NOT EXISTS bitesly_bakery
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_unicode_ci;

USE bitesly_bakery;

-- ---------------------------------------------------------
-- Tabel produk
-- ---------------------------------------------------------
CREATE TABLE IF NOT EXISTS produk (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  kategori VARCHAR(50) NOT NULL,
  harga INT NOT NULL,
  deskripsi TEXT,
  komposisi TEXT,
  berat VARCHAR(50) DEFAULT NULL,
  gambar VARCHAR(255) DEFAULT 'default.jpg',
  rating DECIMAL(2,1) DEFAULT 5.0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ---------------------------------------------------------
-- Tabel admin
-- ---------------------------------------------------------
CREATE TABLE IF NOT EXISTS admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Akun admin default -> username: admin | password: admin123
-- (password sudah di-hash dengan password_hash PHP - bcrypt)
INSERT INTO admin (username, password) VALUES
('admin', '$2y$10$VD.jS.E9cznmjt1pGSBdR.qnVzQ0/ZiddUG5.HCxGyvzvFcwxZVpy');

-- ---------------------------------------------------------
-- Data awal produk (sesuai dokumen bisnis Bitesly Bakery)
-- ---------------------------------------------------------
INSERT INTO produk (nama, kategori, harga, deskripsi, komposisi, berat, gambar, rating) VALUES
('Cookies Premium', 'Cookies', 45000, 'Cookies homemade dengan tekstur renyah dan rasa butter yang gurih, dibuat dari bahan-bahan pilihan.', 'Tepung terigu, butter, gula, telur, coklat chips', '250 gram', 'cookies.jpg', 5.0),
('Soes Kering', 'Soes', 40000, 'Soes kering renyah dengan isian vla lembut, cocok untuk camilan maupun oleh-oleh.', 'Tepung terigu, telur, butter, vla custard', '200 gram', 'soes.jpg', 4.5),
('Bolu Kering', 'Bolu', 50000, 'Bolu kering dengan aroma harum dan rasa manis pas, tahan lama dan cocok untuk hampers.', 'Tepung terigu, telur, gula, susu, margarin', '300 gram', 'bolu.jpg', 4.5),
('Hampers Bakery', 'Hampers', 150000, 'Paket hampers berisi kombinasi produk bakery terbaik Bitesly, dikemas premium untuk hadiah maupun acara spesial.', 'Cookies, soes kering, bolu kering dalam satu paket', '1 paket (isi 3 produk)', 'hampers.jpg', 5.0);
