Nama        : Farrel Faiziaulhaq Azmi
NIM         : 240605110176
MatkulL     : Web Programming D
Dosen       : A'la Syauqi M.Kom.
LInk Youtube: https://youtu.be/NHRlPKED7kU

# Aplikasi Blog (CMS & Public Front-End)

## Identitas Mahasiswa
* **Nama Lengkap:** Sri Mustika Indah Permata Putri
* **NIM:** [Isi NIM Kamu di Sini]
* **Mata Kuliah:** Pemrograman Web
* **Dosen Pengampu:** A'la Syauqi M.Kom.
* **Tautan Video Demonstrasi (YouTube):** [Isi Link Video YouTube Kamu di Sini]

---

## Deskripsi Aplikasi

**Aplikasi Blog (CMS & Public Front-End)** adalah platform manajemen konten berbasis web yang dibangun menggunakan framework **Laravel** dan database **MariaDB/MySQL**. Aplikasi ini dirancang untuk memenuhi tugas praktikum Modul 10 sekaligus proyek Ujian Akhir Semester (UAS) pada mata kuliah Pemrograman Web.

Platform ini terbagi menjadi dua bagian arsitektur utama:
1. **Halaman Administrator (CMS/Back-End):** Area privat yang dilindungi oleh middleware autentikasi bawaan (`auth`). Di dalam halaman ini, penulis yang telah login dapat melakukan manajemen data (CRUD) secara lengkap untuk entitas Penulis, Kategori Artikel, dan Artikel itu sendiri. Aplikasi juga dilengkapi fitur upload file gambar menggunakan Laravel Storage untuk menangani foto profil penulis dan gambar sampul artikel.
2. **Halaman Pengunjung (Public Front-End):** Area publik yang dapat diakses oleh semua pengunjung umum tanpa perlu melakukan proses login. Halaman ini menampilkan 5 artikel terbaru, fitur penyaringan (filtering) artikel berdasarkan kategori via widget samping, serta halaman detail untuk membaca isi lengkap artikel beserta rekomendasi artikel terkait dari kategori yang serupa.

Seluruh komponen visual aplikasi dibangun menggunakan framework CSS **Bootstrap 5** untuk memastikan antarmuka yang bersih, sederhana, konsisten, dan elegan sesuai dengan instruksi lembar soal ujian.

---

## Langkah-Langkah Menjalankan Aplikasi Secara Lokal

Ikuti panduan berikut untuk memasang dan menjalankan proyek `aplikasi-blog` di komputer lokal Anda:

### 1. Kloning Repositori
Buka terminal (atau MATE Terminal jika Anda menggunakan Parrot OS), lalu klon repositori ini ke komputer Anda:
bash
git clone [https://github.com/farrelfaiziaulhaq/aplikasi-blog.git](https://github.com/farrelfaiziaulhaq/aplikasi-blog.git)
cd aplikasi-blog

Instalasi Dependency PHP (Composer)
Unduh dan pasang seluruh package pihak ketiga yang dibutuhkan oleh Laravel dengan menjalankan perintah:

Bash
composer install

Salin dan Atur File Lingkungan (.env)
Salin file konfigurasi bawaan .env.example menjadi file .env aktif:

Bash
cp .env.example .env

Setelah itu, buka file .env menggunakan kode editor (seperti VS Code) dan sesuaikan pengaturan kredensial database Anda:

Code snippet
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_blog
DB_USERNAME=root
DB_PASSWORD=Isi_Password_Database_Anda

4. Generate Application Key
Buat kunci enkripsi unik untuk keamanan sesi aplikasi Laravel Anda:

Bash
php artisan key:generate

5. Migrasi Database
Jika Anda menggunakan database baru yang masih kosong, jalankan perintah migrasi berikut untuk membentuk struktur tabel secara otomatis:

Bash
php artisan migrate
(Catatan: Jika Anda melanjutkan dari Modul 10, pastikan database db_blog beserta tabel penulis, kategori_artikel, dan artikel sudah tersedia di MariaDB Anda).

6. Buat Tautan Simbolik Storage (Wajib untuk Gambar)
Agar berkas gambar yang diunggah oleh penulis (foto profil & gambar artikel) di dalam folder storage/app/public dapat diakses dan ditampilkan di browser oleh tag HTML, buat jembatan penghubungnya:

Bash
php artisan storage:link
Catatan: Jika muncul pesan error "link already exists", hapus tautan lama terlebih dahulu di terminal menggunakan perintah rm -rf public/storage lalu ulangi perintah artisan di atas.

7. Jalankan Server Lokal
Nyalakan server development bawaan Laravel dengan perintah:

Bash
php artisan serve
8. Akses Aplikasi di Browser
Setelah server aktif, buka browser Anda dan akses tautan berikut:

Halaman Publik Pengunjung: http://127.0.0.1:8000 (Menampilkan beranda blog, daftar 5 artikel terbaru, filter kategori, dan halaman detail baca).

Halaman Login Penulis/CMS: http://127.0.0.1:8000/login (Gunakan kredensial akun yang terdaftar untuk masuk ke dashboard CMS manajemen konten).
