# Product Requirements Document (PRD)
## Sistem Informasi Bantuan Sosial Kebencanaan

| | |
|--|--|
| **Nama Sistem** | Sistem Informasi Bantuan Sosial Kebencanaan (SIMBANSOS) |
| **Tanggal** | [Tanggal Hari Ini] |
| **Penyusun** | [Nama Penyusun] |
| **Instansi** | Dinas Sosial Provinsi Jawa Tengah |

---

## Ringkasan Sistem

> *Jelaskan dalam 2–4 kalimat: apa sistemnya, untuk siapa, dan manfaat utamanya.*

Dinas Sosial Provinsi Jawa Tengah membutuhkan sistem digital terpadu untuk mengelola layanan **bantuan sosial kebencanaan**. Sistem ini memudahkan pemantauan stok barang bantuan beserta variannya, memproses distribusi barang ke lokasi bencana, dan memberikan transparansi informasi penyaluran bantuan kepada publik. Target: meningkatkan akurasi data stok dan mempercepat proses distribusi bantuan secara tepat sasaran serta transparan.

---

## 1. Pengguna Sistem

| Peran | Siapa | Yang Mereka Lakukan |
|-------|-------|---------------------|
| **Administrator** | Staf Dinas Sosial | Mengelola (input dan edit) master data stok barang bantuan, varian barang, dan manajemen pengguna. |
| **Petugas Lapangan** | Relawan/Petugas Bencana | Mengeluarkan barang bantuan dari stok, mendokumentasikan foto bukti penyaluran bantuan, dan mencatat lokasi bencana. |
| **Publik / Masyarakat** | Masyarakat Umum | Mengakses portal publik (tanpa login) untuk melihat informasi bantuan apa saja yang telah disalurkan ke berbagai lokasi bencana. |

---

## 2. Layanan yang Dikelola Sistem

> *Untuk setiap layanan: jelaskan alurnya dan data apa yang perlu dicatat.*
> *Aturan bisnis penting wajib dituliskan — ini yang akan menjadi validasi di sistem.*

---

### Layanan 1 — Manajemen Stok Barang Bantuan

**Deskripsi:** Pengelolaan ketersediaan barang-barang bantuan sosial (makanan, pakaian, tenda, obat-obatan, dll) beserta varian spesifiknya (ukuran, jenis, tanggal kedaluwarsa).

**Alur:**
1. Administrator menerima barang bantuan baru.
2. Administrator menginput data barang beserta kategori dan variannya ke dalam sistem.
3. Sistem secara otomatis memperbarui jumlah stok yang tersedia.
4. Jika stok menipis, sistem memberikan notifikasi/indikator peringatan.

**Data yang dicatat:** nama barang · kategori barang · varian (ukuran/jenis) · jumlah/qty · tanggal masuk · tanggal kedaluwarsa (jika ada) · lokasi gudang penyimpanan.

**Aturan bisnis:**
- Stok barang **tidak boleh bernilai negatif** (kurang dari nol).
- Barang dengan tanggal kedaluwarsa terdekat harus dikeluarkan lebih dulu (metode FEFO/FIFO).
- Edit stok barang hanya dapat dilakukan oleh Administrator dengan mencatat log perubahan (riwayat stok).

---

### Layanan 2 — Distribusi Bantuan & Lokasi Bencana

**Deskripsi:** Proses pencatatan dan penyaluran barang bantuan dari gudang stok menuju ke lokasi terjadinya bencana, dilaporkan langsung oleh Petugas Lapangan.

**Alur:**
1. Terjadi bencana di suatu lokasi.
2. Petugas Lapangan di lokasi mendata kebutuhan dan mengajukan pengeluaran barang.
3. Administrator atau sistem mengizinkan pengeluaran barang (stok berkurang).
4. Petugas Lapangan mengunggah foto bukti penyaluran bantuan di lokasi bencana beserta titik kordinat/alamat lokasi.
5. Status penyaluran diperbarui menjadi "Selesai/Tersalurkan".

**Data yang dicatat:** nama lokasi bencana · titik koordinat/alamat · tanggal distribusi · daftar barang dan jumlah yang dikeluarkan · foto bukti penyaluran · nama petugas lapangan yang bertugas · status distribusi.

**Aturan bisnis:**
- Pengeluaran barang harus sesuai dengan ketersediaan stok yang ada di gudang.
- **Wajib** melampirkan foto bukti penyaluran (foto dokumentasi lapangan) agar status distribusi bisa dinyatakan "Selesai".
- Lokasi bencana harus dicatat secara jelas dan akurat (kecamatan/desa/koordinat).

---

### Layanan 3 — Portal Transparansi Publik

**Deskripsi:** Halaman antarmuka publik yang dapat diakses oleh masyarakat umum untuk melihat laporan penyaluran bantuan sosial.

**Alur:**
1. Masyarakat mengunjungi halaman portal publik.
2. Masyarakat dapat mencari atau memfilter distribusi bantuan berdasarkan lokasi bencana atau tanggal.
3. Sistem menampilkan daftar bantuan yang telah disalurkan beserta foto dokumentasi.

**Data yang ditampilkan:** lokasi bencana · tanggal distribusi · jenis dan jumlah bantuan yang disalurkan · foto dokumentasi penyaluran.

**Aturan bisnis:**
- Halaman ini **hanya bersifat read-only** (hanya baca).
- Publik tidak memerlukan akun/login untuk mengakses halaman ini.

---

## 3. Laporan & Dashboard yang Dibutuhkan

### Dashboard Utama (tampil saat login)

| Informasi | Keterangan |
|-----------|------------|
| Total Stok Barang Kritis | Jumlah barang yang stoknya menipis atau akan kedaluwarsa |
| Total Penyaluran Bulan Ini | Jumlah distribusi bantuan yang telah diselesaikan bulan berjalan |
| Peta Lokasi Bencana | Titik-titik distribusi bantuan terakhir pada peta |
| Riwayat Transaksi Terakhir | Log singkat barang masuk / keluar hari ini |

### Laporan Berkala

| Laporan | Frekuensi | Isi | Format |
|---------|-----------|-----|--------|
| Rekap Stok Barang Gudang | Bulanan / Mingguan | Sisa stok barang per kategori beserta variannya | Excel & PDF |
| Laporan Distribusi Bantuan | Bulanan | Detail barang keluar, tujuan lokasi bencana, dan petugas pelaksana | Excel & PDF |

---

> **Catatan untuk AI Coding Assistant:**
> - Setiap **layanan** di Bagian 2 → 1 modul Filament v5.7.1 Resource + set tabel database (Stock, Distribution, Disaster Location).
> - Setiap **alur** → urutan status pada kolom `status` di tabel transaksi distribusi (Pending, On-Progress, Delivered).
> - Setiap **data yang dicatat** → kolom-kolom pada tabel yang bersangkutan.
> - Setiap **aturan bisnis** → validasi dan business logic di Model/Controller/Filament Resource.
> - Portal Publik menggunakan view standar Laravel (Blade) atau Livewire tanpa perlu login Filament.
> - Bagian 3 → widget dashboard Filament v5.7.1 + fitur ekspor PDF/Excel.

---
