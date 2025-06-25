# Aplikasi Manajemen Buku - Technical Test Fullstack Developer

Aplikasi ini dikembangkan menggunakan Laravel dan Blade sebagai bagian dari **technical test Fullstack Developer**.  
Pengguna yang sudah login dapat menambahkan, mengedit, dan menghapus koleksi buku mereka sendiri.  
Pengunjung (guest) dapat melihat buku yang dipublikasikan oleh pengguna lain.

---

## Fitur Utama

### Autentikasi
- Registrasi, Login, Logout
- Verifikasi Email
- Lupa Password & Reset Password
- Ganti Password (melalui halaman Profil)

### Manajemen Pengguna
- Menampilkan daftar pengguna
- Filter berdasarkan status verifikasi email
- Pencarian berdasarkan nama atau email

### Manajemen Buku
- Tambah, Lihat, Ubah, dan Hapus Buku
- Atribut buku: Judul, Penulis, Deskripsi, Rating (1-5), dan Thumbnail (gambar)
- Hanya pemilik buku yang dapat mengedit/menghapus
- Filter buku berdasarkan:
  - Judul
  - Penulis
  - Rating
  - Tanggal Upload
- Pagination (dengan query tetap saat filter)

### Halaman Landing (Guest)
- Menampilkan buku yang diunggah oleh pengguna
- Fitur filter: Penulis, Rating, Tanggal Upload
- Terdapat pagination

### Pengujian
- Unit Test untuk autentikasi dan logika buku
- Feature Test untuk:
  - Login & Register
  - Verifikasi Email
  - CRUD Buku
  - Edit Profil
  - Reset Password

---

## Tech Stack

- **Laravel 12** – PHP Framework
- **Blade** – Templating engine
- **Tailwind CSS** – Utility-first CSS
- **PostgreSQL** – Database
- **Bcrypt** – Password hashing
- **Laravel Breeze** – Authentication scaffolding
- **PHPUnit** – Testing

---

## Library Pihak Ketiga

### 1. Laravel Breeze
Digunakan untuk proses autentikasi (register, login, lupa password, dan verifikasi email).  
Dipilih karena ringan dan mengikuti struktur Laravel terbaru.

### 2. Tailwind CSS
Digunakan untuk styling halaman dengan cepat dan responsif tanpa perlu banyak CSS kustom.

---

## Fitur Tambahan (di luar permintaan)

- Preview thumbnail saat upload & pada daftar buku
- Konfirmasi sebelum hapus buku
- Penghapusan file otomatis saat buku dihapus
- Layout responsif untuk mobile
- Format tanggal yang rapi (mis. `23 Jun 2025`)
- Query filter tetap saat pagination (`appends()`)

---

## Langkah Instalasi

```bash
# Clone repository
git clone https://github.com/nayasyaula/naya_fdtest.git
cd naya_fdtest

# Install dependency backend
composer install

# Install dependency frontend
npm install && npm run build

# Salin file .env dan buat APP_KEY
cp .env.example .env
php artisan key:generate

# Atur konfigurasi database PostgreSQL di .env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=naya_fdtest
DB_USERNAME=postgres
DB_PASSWORD=isi_password_anda

# Jalankan migrasi dan link storage
php artisan migrate
php artisan storage:link

# Jalankan server lokal
php artisan serve
