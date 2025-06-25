# Technical Test Fullstack Developer

Dikembangkan menggunakan Laravel dan Blade sebagai bagian dari **technical test Fullstack Developer**.  
User yang sudah login dapat menambahkan, mengedit, dan menghapus koleksi buku mereka sendiri.  
Pengunjung (guest) dapat melihat buku yang dipublikasikan oleh user lain.

---

## Fitur Utama

### Autentikasi
- Registrasi, Login, Logout
- Verifikasi Email
- Lupa Password & Reset Password
- Ganti Password (melalui halaman Profil)

### Manajemen User
- Menampilkan daftar user
- Filter berdasarkan status verifikasi email
- Pencarian berdasarkan nama atau email

### Manajemen Buku
- Tambah, Lihat, Ubah, dan Hapus Buku
- Atribut buku: Judul, Author, Deskripsi, Rating (1-5), dan Thumbnail (gambar)
- Hanya user pemilik buku yang dapat mengedit/menghapus
- Filter buku berdasarkan:
  - Judul
  - Author
  - Rating
  - Tanggal Upload Buku
- Pagination

### Halaman Landing (Guest)
- Menampilkan buku yang diunggah oleh user
- Fitur filter: Author, Rating, Tanggal Upload
- Pagination

### Pengujian
- Unit Test untuk autentikasi dan logika buku
- Feature Test untuk:
  - Login & Register
  - Verifikasi Email
  - CRUD Buku
  - Edit Profile
  - Reset Password

---

## Tech Stack

- **Laravel 12** – PHP Framework
- **Blade** – Templating engine
- **PostgreSQL** – Database
- **Bcrypt** – Password hashing
- **PHPUnit** – Testing
- **Tailwind CSS** – Utility-first CSS
- **Laravel Breeze** – Authentication scaffolding

---

## Library

### 1. Laravel Breeze
Digunakan untuk proses autentikasi (register, login, lupa password, dan verifikasi email).  
Dipilih karena ringan dan setup cepat untuk mengejar waktu deadline.

### 2. Tailwind CSS
Digunakan untuk styling halaman dengan cepat tanpa perlu banyak CSS kustom.

---

## Fitur Tambahan (di luar permintaan)

- Preview thumbnail upload & pada daftar buku
- Konfirmasi sebelum hapus buku
- Penghapusan file saat buku dihapus
- Layout responsif untuk mobile
- Format tanggal (mis. `23 Jun 2025`)
- Pagination

---

## Langkah Instalasi

1. **Clone repository**
```bash
git clone https://github.com/nayasyaula/naya_fdtest.git
cd naya_fdtest
```
2. **Install dependency**
```bash
composer install
npm install && npm run dev
```
4. **Copy file .env dan buat APP_KEY**
```bash
cp .env.example .env
php artisan key:generate
```
5. **Konfigurasi database PostgreSQL di .env**
```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=naya_fdtest
DB_USERNAME=postgres
DB_PASSWORD=isi_password_anda
```
6. **Jalankan migrasi dan link storage**
```bash
php artisan migrate
php artisan storage:link
```
7. **Jalankan server lokal**
```bash
php artisan serve
```
