# Naya FD Test - Aplikasi Manajemen Buku

Sistem manajemen buku berbasis Laravel yang dikembangkan sebagai **Uji Teknis Pengembang Fullstack**.

Pengguna yang diautentikasi dapat mengelola koleksi buku pribadi mereka dan tamu dapat menelusuri buku publik.

Mencakup alur autentikasi lengkap, verifikasi email, pemfilteran, dan operasi CRUD yang aman.

---

## Fitur

### Autentikasi
- Daftar, Masuk, Keluar
- Verifikasi Email
- Lupa Kata Sandi / Atur Ulang
- Ubah Kata Sandi (melalui Profil)

### Manajemen Pengguna
- Lihat daftar pengguna
- Filter berdasarkan status verifikasi email
- Cari berdasarkan nama atau email

### Manajemen Buku
- Data buku CRUD (judul, penulis, deskripsi, peringkat, gambar mini)
- Hanya pemilik buku yang dapat mengedit/menghapus
- Pembersihan file saat dihapus
- Pemfilteran berdasarkan:
- Judul
- Penulis
- Peringkat
- Tanggal unggah
- Paginasi dengan kueri persisten

### Landing Page (Guest)
- Lihat buku yang diunggah
- Filter buku berdasarkan:
- Penulis
- Tanggal Unggah
- Peringkat
- Paginasi disertakan

### Pengujian
- Unit Tests for authentication and book logic
- Feature/Integration Tests for:
  - Auth (login, register, password reset, etc.)
  - Book creation/update
  - Profile editing
  - Email verification

---

## 🛠 Tech Stack

- **Laravel 12** – PHP Framework
- **Blade** – Templating engine
- **Tailwind CSS** – Utility-first CSS
- **PostgreSQL** – Database
- **Bcrypt** – Password hashing
- **Laravel Breeze** – Authentication scaffolding
- **PHPUnit** – Testing

---

## Pustaka Pihak Ketiga yang Digunakan

### 1. Laravel Breeze
Lightweight auth scaffolding (register, login, forgot password, email verify).  
Dipilih karena simpel dan cocok untuk Laravel 12.

### 2. Tailwind CSS
Untuk styling cepat, responsive, dan tanpa ribet.  
Meningkatkan UI development tanpa custom CSS berlebihan.

---

## Peningkatan Tambahan
- Thumbnail preview saat upload dan list
- Filter + search dengan query tetap saat pagination
- Konfirmasi hapus buku
- Responsive mobile layout
- Formatting tanggal (e.g., `23 Jun 2025`)
- Auto delete file dari storage saat buku dihapus

---

## 🚀 Petunjuk Setup

```bash
# Clone
git clone https://github.com/nayasyaula/naya_fdtest.git
cd naya_fdtest

# Instal dependensi
composer install
npm instal && npm run dev

# Setup environment
cp .env.example .env
php artisan key:generate

# Edit .env untuk PostgreSQL
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=naya_fdtest
DB_USERNAME=postgres
DB_PASSWORD=kata_sandi_Anda

# Migrasikan & tautkan penyimpanan
php artisan migrate
php artisan storage:link

# Jalankan server lokal
php artisan serve
