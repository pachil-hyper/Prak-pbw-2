# LaraPress - Aplikasi Blog Sederhana

LaraPress adalah aplikasi blog sederhana yang dibangun menggunakan Laravel 12 untuk tujuan pembelajaran dan pengembangan keterampilan web development.

![Screenshot Halaman Utama LaraPress](URL_UNTUK_SCREENSHOT_HALAMAN_UTAMA_ANDA)
*(Catatan: Ganti URL di atas dengan URL screenshot aplikasi Anda)*

---

## 📝 Tentang Proyek

Proyek ini dibuat sebagai bagian dari pembelajaran Laravel framework. LaraPress mendemonstrasikan konsep-konsep dasar Laravel seperti routing, views, dan struktur MVC.

## ✨ Fitur yang Sudah Diimplementasikan

1.  **Halaman Utama (Welcome Page)**
    * Mengubah tampilan default Laravel menjadi halaman sederhana.
    * Menampilkan judul "Selamat Datang di Blog LaraPress".
    * Struktur HTML yang bersih dan minimal.

2.  **Halaman Tentang Kami (About Page)**
    * Route: `/tentang-kami`
    * Menampilkan informasi tentang LaraPress.
    * Menjelaskan tujuan proyek sebagai pembelajaran Laravel 12.

## 💻 Teknologi yang Digunakan

* **Framework:** Laravel 12
* **PHP Version:** 8.x
* **Database:** SQLite (default)
* **Frontend:** Blade Template Engine, HTML, CSS
* **Build Tool:** Vite

## 🌐 Endpoint yang Tersedia

| Route          | Method | Deskripsi                |
| -------------- | ------ | ------------------------ |
| `/`            | `GET`  | Halaman utama LaraPress  |
| `/tentang-kami`| `GET`  | Halaman tentang LaraPress|

## 🚀 Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal:

1.  **Clone repository ini:**
    ```bash
    git clone [https://github.com/NAMA_USER_ANDA/NAMA_REPO_ANDA.git](https://github.com/NAMA_USER_ANDA/NAMA_REPO_ANDA.git)
    cd NAMA_REPO_ANDA
    ```

2.  **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

3.  **Buat file `.env`:**
    ```bash
    cp .env.example .env
    ```

4.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Jalankan development server:**
    ```bash
    php artisan serve
    ```

6.  **Akses aplikasi** di browser Anda: `http://localhost:8000`

---

## 🔧 Detail Implementasi

Berikut adalah detail perubahan kode yang dilakukan dalam proyek ini.

### Struktur File yang Dimodifikasi

1.  **`resources/views/welcome.blade.php`**
    * Mengubah tampilan default Laravel yang kompleks menjadi struktur HTML sederhana.
    * Menampilkan pesan sambutan untuk pengunjung blog.

2.  **`resources/views/about.blade.php`** (BARU)
    * File view baru untuk halaman "Tentang Kami".
    * Berisi informasi tentang LaraPress sebagai proyek pembelajaran.

3.  **`routes/web.php`**
    * Menambahkan route baru `/tentang-kami` yang mengarah ke view `about.blade.php`.

### Langkah-langkah Kode

**Step 1: Modifikasi Halaman Welcome**
Mengubah file `resources/views/welcome.blade.php`:

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di LaraPress</title>
</head>
<body>
    <h1>Selamat Datang di Blog LaraPress</h1>
    <p>Ini adalah halaman utama dari aplikasi blog kita.</p>
</body>
</html>
