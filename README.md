# 📚 Naya FD Test - Book Management App

A Laravel-based book management system developed as a **Fullstack Developer Technical Test**.  
Authenticated users can manage their personal book collection and guests can browse public books.  
Includes full authentication flow, email verification, filtering, and secure CRUD operations.

---

## 🧩 Features

### 🔐 Authentication
- Register, Login, Logout
- Email Verification
- Forgot Password / Reset
- Change Password (via Profile)

### 👤 User Management
- View list of users
- Filter by email verification status
- Search by name or email

### 📚 Book Management
- CRUD book data (title, author, description, rating, thumbnail)
- Only book owners can edit/delete
- File cleanup on delete
- Filtering by:
  - Title
  - Author
  - Rating
  - Upload date
- Pagination with persistent query

### 🌐 Landing Page (Guest)
- View uploaded books
- Filter books by:
  - Author
  - Upload Date
  - Rating
- Pagination included

### 🧪 Tests
- Unit Tests for authentication and book logic
- Feature/Integration Tests for:
  - Auth (login, register, password reset, etc.)
  - Book creation/update
  - Profile editing
  - Email verification

---

## 🛠 Tech Stack

- **Laravel 11** – PHP Framework
- **Blade** – Templating engine
- **Tailwind CSS** – Utility-first CSS
- **PostgreSQL** – Database
- **Bcrypt** – Password hashing
- **Laravel Breeze** – Authentication scaffolding
- **PHPUnit** – Testing

---

## 📦 Third-party Libraries Used

### 1. Laravel Breeze
Lightweight auth scaffolding (register, login, forgot password, email verify).  
Dipilih karena simpel dan cocok untuk Laravel 11.

### 2. Tailwind CSS
Untuk styling cepat, responsive, dan tanpa ribet.  
Meningkatkan UI development tanpa custom CSS berlebihan.

---

## ➕ Additional Enhancements
- Thumbnail preview saat upload dan list
- Filter + search dengan query tetap saat pagination
- Konfirmasi hapus buku
- Responsive mobile layout
- Formatting tanggal (e.g., `23 Jun 2025`)
- Auto delete file dari storage saat buku dihapus

---

## 🚀 Setup Instructions

```bash
# Clone
git clone https://github.com/nayasyaula/naya_fdtest.git
cd naya_fdtest

# Install dependencies
composer install
npm install && npm run build

# Setup environment
cp .env.example .env
php artisan key:generate

# Edit .env for PostgreSQL
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=naya_fdtest
DB_USERNAME=postgres
DB_PASSWORD=your_password

# Migrate & link storage
php artisan migrate
php artisan storage:link

# Run local server
php artisan serve
