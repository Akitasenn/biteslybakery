# Bitesly Bakery — Website E-Commerce (MVP)

Website resmi Bitesly Bakery: katalog produk digital dengan pemesanan
langsung via WhatsApp, dilengkapi Admin Panel untuk kelola produk.

**Tech Stack:** HTML5, CSS3, Bootstrap 5, PHP Native, MySQL, XAMPP

---

## 1. Cara Menjalankan (XAMPP)

1. Install [XAMPP](https://www.apachefriends.org/) jika belum ada.
2. Copy folder `bitesly-bakery` ke dalam `htdocs`:
   - Windows: `C:\xampp\htdocs\bitesly-bakery`
   - macOS: `/Applications/XAMPP/htdocs/bitesly-bakery`
3. Jalankan **Apache** dan **MySQL** dari XAMPP Control Panel.
4. Buka `http://localhost/phpmyadmin`, klik **Import**, lalu pilih file
   `database.sql` dari folder project ini. Ini akan membuat database
   `bitesly_bakery` beserta tabel `produk`, `admin`, dan data awal.
5. Buka website di browser: `http://localhost/bitesly-bakery/index.php`

## 2. Login Admin Panel

URL: `http://localhost/bitesly-bakery/admin/login.php`

```
Username: admin
Password: admin123
```

> Setelah login pertama kali, disarankan mengganti password langsung
> di tabel `admin` melalui phpMyAdmin (gunakan `password_hash()` PHP
> untuk membuat hash baru).

## 3. Konfigurasi

Buka `includes/db.php` untuk mengubah:
- Kredensial database (`$db_host`, `$db_user`, `$db_pass`, `$db_name`)
- Nomor WhatsApp bisnis (`WA_NUMBER`) — saat ini masih placeholder
  `6281234567890`, ganti dengan nomor asli Bitesly Bakery.

## 4. Struktur Folder

```
bitesly-bakery/
├── assets/
│   ├── css/style.css        # Semua styling custom (brand bakery)
│   ├── js/                  # (reserved untuk pengembangan lanjutan)
│   └── images/               # Foto produk hasil upload admin
├── includes/
│   ├── header.php            # <head> + link CSS
│   ├── navbar.php             # Navigasi utama
│   ├── footer.php             # Footer + tutup </html>
│   └── db.php                 # Koneksi database & konfigurasi
├── admin/
│   ├── login.php               # Login admin
│   ├── dashboard.php            # Ringkasan statistik produk
│   ├── produk.php                # List & hapus produk
│   ├── tambah_produk.php          # Form tambah produk (upload gambar)
│   ├── edit_produk.php             # Form edit produk
│   ├── hapus_produk.php             # Proses hapus (redirect)
│   ├── logout.php                    # Hapus sesi admin
│   └── sidebar.php                    # Partial sidebar admin
├── index.php        # Home
├── about.php         # About
├── products.php       # Semua produk (dengan filter kategori)
├── product-detail.php  # Detail 1 produk
├── contact.php           # Kontak, maps, jam operasional
└── database.sql            # Skema + data awal
```

## 5. Fitur MVP yang Sudah Tersedia

- ✅ Responsive (Bootstrap 5, mobile-first)
- ✅ CRUD Produk lengkap dari Admin Panel
- ✅ Upload gambar produk (fallback emoji jika belum ada foto)
- ✅ Halaman detail produk
- ✅ Tombol "Pesan via WhatsApp" otomatis mengisi pesan berisi nama produk
- ✅ Dashboard admin (jumlah produk, kategori, harga tertinggi)
- ✅ Filter produk per kategori di halaman Products

## 6. Fitur yang Direncanakan Selanjutnya

Sesuai roadmap di dokumen bisnis: Login Pelanggan, Shopping Cart,
Checkout Online, Payment Gateway (Midtrans), Riwayat Pesanan, Tracking
Order, Voucher, dan Review Produk.

## 7. Catatan Keamanan (untuk pengembangan lanjut sebelum go-live publik)

- Ganti password admin default sebelum online.
- Tambahkan validasi upload gambar lebih ketat (cek MIME type asli,
  bukan hanya ekstensi) bila fitur upload dibuka ke publik.
- Aktifkan HTTPS saat deploy ke hosting produksi.
- Pertimbangkan rate-limiting pada `login.php` untuk mencegah brute force.
