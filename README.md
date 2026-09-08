# FindHub 🔍

FindHub adalah platform berbasis web untuk mempertemukan pemilik barang yang kehilangan barangnya dengan pihak penemu barang. Platform ini dibangun menggunakan arsitektur Laravel monolith, dengan Vite sebagai *build tool* utama yang mengelola aset frontend (React/Vanilla) secara modern, minimalis, dan responsif.

---

## 🚀 Fitur Utama

- **Laporan Penemuan (Found Items):** Penemu barang dapat membuat laporan penemuan lengkap dengan foto, kategori, deskripsi, lokasi penemuan, dan tanggal.
- **Laporan Kehilangan (Lost Items):** Pengguna yang kehilangan barang dapat mendaftarkan rincian barang yang dicari beserta estimasi lokasi terakhir.
- **Pencarian & Filter Cepat:** Pencarian barang berdasarkan kata kunci, kategori, status barang, tanggal, serta lokasi.
- **Proses Klaim & Verifikasi:** Sistem verifikasi kepemilikan barang sebelum kontak penemu atau titik temu dibagikan.
- **Dashboard Pengguna:** Manajemen status laporan barang (Masih Hilang, Ditemukan, Selesai Diklaim).

---

## 🛠️ Tech Stack

- **Backend:** Laravel (PHP)
- **Frontend:** React.js / Vanilla JS (Dikelola melalui Vite), Tailwind CSS
- **Database:** MySQL / PostgreSQL
- **Asset Bundler:** Vite
- **Storage:** Local / Amazon S3 (untuk manajemen foto barang)

---

## ⚙️ Persyaratan Sistem

- PHP >= 8.2
- Composer >= 2.x
- Node.js (LTS version) & npm/pnpm
- Database Server (MySQL / MariaDB / PostgreSQL)

---

## 📦 Instalasi & Setup

1. **Clone Repositori**
   ```bash
   git clone https://github.com/username/findhub.git
   cd findhub
   ```

2. **Install Dependensi Backend (PHP)**
   ```bash
   composer install
   ```

3. **Install Dependensi Frontend (Node.js)**
   ```bash
   npm install
   ```

4. **Konfigurasi Environment**
   Salin file konfigurasi bawaan dan sesuaikan kredensial database:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Migrasi Database & Seeding**
   Siapkan struktur tabel dan data awal:
   ```bash
   php artisan migrate --seed
   ```

6. **Buat Symlink Storage**
   Agar gambar barang yang diunggah dapat diakses di frontend:
   ```bash
   php artisan storage:link
   ```

7. **Jalankan Server Pengembangan**
   Jalankan server backend Laravel dan *Vite dev server* secara bersamaan di terminal yang terpisah:

   **Terminal 1 (Backend):**
   ```bash
   php artisan serve
   ```

   **Terminal 2 (Frontend/Vite):**
   ```bash
   npm run dev
   ```

   Buka peramban dan akses `http://127.0.0.1:8000`.

---

## 🗄️ Skema Database Singkat

- **users:** Menyimpan kredensial dan kontak pengguna.
- **categories:** Kategori barang (Elektronik, Dompet, Dokumen, Aksesoris, dsb).
- **items:** Data laporan barang dengan penanda tipe (`lost` atau `found`), koordinat/nama lokasi, status (`open`, `claimed`, `resolved`), dan deskripsi.
- **item_images:** Gambar pendukung laporan barang.
- **claims:** Riwayat pengajuan klaim kepemilikan dari pemilik ke penemu barang.

---
