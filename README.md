# CeritaKita

Aplikasi pendamping kesehatan mental mahasiswa. Proyek mata kuliah Perancangan dan Pengembangan Perangkat Lunak (PPPL) kelas B, Institut Teknologi Sepuluh Nopember, Kelompok 5.

Isi dokumen ini diambil dari Bab 1 *Software Critical Design Review Document for CeritaKita* versi 1.0 (3 November 2026).

## Deskripsi produk

Mahasiswa menghadapi tekanan akademik, sosial, dan finansial yang dapat memengaruhi kesehatan mental mereka. Banyak mahasiswa belum terbiasa mengenali dan mencatat kondisi emosinya sehari-hari. Di sisi lain, akses ke layanan psikolog masih terkendala biaya, proses pemesanan yang tidak praktis, serta kekhawatiran terhadap stigma dan privasi. **CeritaKita** membantu pengguna memantau suasana hati harian, melakukan latihan pernapasan, menulis jurnal dengan refleksi berbantuan AI, bercerita kepada chatbot, menimbang keputusan, serta memesan sesi konsultasi dengan psikolog. Mahasiswa diharapkan dapat lebih mengenali pola emosinya, memiliki ruang bercerita yang menjaga privasi melalui Mode Anonim, dan lebih mudah berkonsultasi dengan psikolog. Psikolog juga dapat terbantu dalam mengelola jadwal praktik, mengonfirmasi permintaan sesi, dan mencatat hasil sesi.

## Aktor

| Aktor | Jenis | Peran |
| --- | --- | --- |
| Pengguna (mahasiswa) | Utama | Memakai seluruh fitur pendamping dan memesan sesi konsultasi |
| Psikolog | Utama | Mengelola jadwal, sesi, catatan hasil sesi, dan profil praktik |
| Layanan AI | Sistem eksternal | Memproses Chat AI dan menyusun Refleksi Harian |
| Payment Gateway | Sistem eksternal | Memproses pembayaran sesi konsultasi |

## Fitur dan use case

| Kelompok | Fitur | Use case |
| --- | --- | --- |
| UC-1 | Login, Mood Check-in, Tren Emosi | UC-1.1 sampai UC-1.3 |
| UC-2 | Breathing Space, Musik Relaksasi | UC-2.1, UC-2.2 |
| UC-3 | Chat AI (Mode Curhat dan Mode Solusi) | UC-3.1, UC-3.2 |
| UC-4 | Jurnal, Refleksi Harian | UC-4.1, UC-4.2 |
| UC-5 | Decision & Crisis Support | UC-5.1, UC-5.2 |
| UC-6 | Cari Psikolog, Booking Sesi Konsultasi | UC-6.1 sampai UC-6.5 |
| UC-7 | Sesi Saya, Rating & Ulasan | UC-7.1 sampai UC-7.5 |
| UC-8 | Profil, Mode Anonim, Ekspor Data | UC-8.1 sampai UC-8.3 |
| UC-9 | Fitur Psikolog | UC-9.1 sampai UC-9.6 |

## Anggota kelompok

| NRP | Nama | Username GitHub | Foto |
| --- | --- | --- | --- |
| 5026231191 | Dzakiyyah Nur A. H. | @dzakiyyaahh | _belum ditambahkan_ |
| 5026211155 | I Gede Mahawiyarta Priyadarsa | @mahawiyarta | _belum ditambahkan_ |
| 5026221062 | Putri Salsabilla Insani | @putrisalsabillainsani | _belum ditambahkan_ |
| 5026221064 | Ghiar Ghoniyyu Atha  Akbar | @Ghiar7 | _belum ditambahkan_ |
| 5026231072 | Arrivo Arsa Mevano | @ipoyyyiii | _belum ditambahkan_ |
| 5026231153 | Fachry Fariska Ilham | @fachry2005 | _belum ditambahkan_ |

## Pembagian tugas

Pembagian per modul, dua orang per pasangan. Nama anggota tiap pasangan diisi setelah disepakati.

| Pasangan | Modul | Jumlah use case | Anggota |
| --- | --- | --- | --- |
| 1 | UC-1, UC-2, UC-3 | 7 | _belum diisi_ |
| 2 | UC-4, UC-5, UC-6 | 9 | _belum diisi_ |
| 3 | UC-7, UC-8, UC-9 | 14 | _belum diisi_ |

## Teknologi

- Backend: PHP 8.2+, Laravel 12, dan arsitektur MVC
- Frontend: Laravel Blade, HTML5, CSS3, JavaScript, dan Tailwind CSS
- Build Tools: Vite, Node.js, dan npm
- Dependency Management: Composer
- AI Integration: Google Gemini API untuk chatbot Anima AI
- Progressive Web App (PWA): Web App Manifest dan Service Worker
- Testing & Public Access: Cloudflare Quick Tunnel (HTTPS)
- Version Control: Git dan GitHub

## Cara setup

### 1. Clone Repository

Pastikan PHP 8.2+, Composer, Node.js, npm, dan Git sudah terinstal.

```bash
git clone https://github.com/mahawiyarta/cerita_kita.git cerita_kita-blade
cd cerita_kita-blade
```

### 2. Install Dependencies

Install dependency Laravel dan frontend:

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`.

Untuk Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Kemudian generate application key Laravel:

```bash
php artisan key:generate
```

Sesuaikan konfigurasi dasar pada file `.env`:

```dotenv
APP_NAME=CeritaKita
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

Pengaturan `APP_DEBUG=true` hanya untuk pengembangan lokal. Gunakan `APP_DEBUG=false` ketika aplikasi dibagikan melalui internet.

### 4. Konfigurasi Gemini AI

CeritaKita menggunakan Google Gemini API untuk fitur chatbot Anima AI.

Tambahkan konfigurasi berikut pada `.env`:

```dotenv
GEMINI_API_KEY=masukkan_api_key_anda
GEMINI_MODEL=nama_model_gemini_yang_tersedia
```

API key diperoleh melalui Google AI Studio. Gunakan model yang tersedia untuk akun dan API yang digunakan.

**Penting:** Jangan membagikan API key atau mengunggah file `.env` ke GitHub.

### 5. Menjalankan Aplikasi Secara Lokal

Jalankan Laravel pada terminal pertama:

```bash
php artisan serve
```

Jalankan Vite pada terminal kedua:

```bash
npm run dev
```

Buka aplikasi melalui browser:

```text
http://127.0.0.1:8000/login
```

### 6. Akses Melalui Cloudflare Quick Tunnel (Opsional)

Cloudflare Quick Tunnel digunakan untuk menguji CeritaKita melalui perangkat lain menggunakan URL HTTPS sementara.

Pastikan `cloudflared` sudah terinstal.

Hentikan `npm run dev`, kemudian build aset frontend:

```bash
npm run build
```

Pastikan file `public/hot` tidak ada agar Laravel menggunakan aset hasil build.

Atur `.env`:

```dotenv
APP_DEBUG=false
```

Kemudian jalankan:

```bash
php artisan optimize:clear
php artisan serve --host=127.0.0.1 --port=8000
```

Pada terminal terpisah:

```bash
cloudflared tunnel --url http://127.0.0.1:8000
```

Cloudflare akan menghasilkan URL HTTPS dengan domain `trycloudflare.com` yang dapat diakses melalui HP atau perangkat lain.

**Catatan:** Laptop, server Laravel, dan Cloudflare Tunnel harus tetap aktif. URL bersifat sementara dan dapat berubah saat tunnel dijalankan ulang. Gunakan data dummy karena aplikasi masih dalam tahap prototype.

---

## Database

CeritaKita dirancang menggunakan PostgreSQL dengan Eloquent ORM sebagai bagian dari pengembangan backend.

Dokumentasi rancangan database versi 1 tersedia pada folder `database/sql/`, jika sudah disertakan dalam repository:

- `ceritakita_v1_schema.sql`: skrip pembuatan struktur database.
- `ceritakita_v1.sql`: hasil ekspor struktur database.

Rancangan database mencakup 41 tabel berdasarkan class `«entity»` pada class diagram.

**Status implementasi:** Integrasi database perlu disesuaikan dengan perkembangan backend. Beberapa fitur prototype, seperti Login, Journal Summary, dan daftar Psikolog, masih menggunakan data simulasi.

Oleh karena itu, impor PostgreSQL tidak diwajibkan untuk menjalankan tampilan prototype saat ini, kecuali fitur backend yang digunakan sudah memerlukannya.

Setiap perubahan struktur database harus didokumentasikan dan disesuaikan dengan rancangan sistem.

---

## Aturan Kolaborasi

- Branch `main` digunakan untuk kode stabil, sedangkan `develop` digunakan sebagai tempat integrasi.
- Setiap tugas dikembangkan pada branch terpisah yang dibuat dari `develop`.
- Perubahan pada `main` dan `develop` dilakukan melalui Pull Request dengan minimal satu reviewer.
- Jangan melakukan merge terhadap fitur yang belum berhasil dijalankan atau diuji.
- Penambahan atau perubahan route pada `routes/web.php` harus dikoordinasikan agar tidak terjadi konflik antaranggota.
- Gunakan format pesan commit:
  - `feat:` penambahan fitur
  - `fix:` perbaikan bug
  - `style:` perubahan tampilan
  - `refactor:` perbaikan struktur kode
  - `docs:` perubahan dokumentasi
  - `chore:` konfigurasi atau pekerjaan pendukung
