# Hahu Jebredd - Website Katalog Menu

## 1. Identitas
- Nama  : [isi nama]
- NIM   : [isi NIM]
- Kelas : [isi kelas]

## 2. Deskripsi Tema
Hahu Jebredd adalah website katalog menu untuk usaha kuliner keluarga
yang menjual tahu isi dan mi pedas. Pengunjung dapat melihat daftar menu
yang bisa difilter berdasarkan kategori. Website bersifat tampilan saja
(tanpa pemesanan). Seluruh harga adalah harga simulasi.

## 3. Cara Menjalankan di Localhost
Syarat: PHP 8.0 atau lebih baru.

1. Clone repositori ke folder `htdocs` (XAMPP) atau `www` (Laragon).
2. Jalankan Apache, lalu buka `http://localhost/uts-pemweb-NIM/`.
3. Alternatif tanpa Apache, jalankan di folder proyek:
   `php -S localhost:8000`, lalu buka `http://localhost:8000`.

## 4. Daftar Fitur
| Fitur | File | Fungsi |
|---|---|---|
| Navigasi Beranda dan Katalog | `index.php`, `katalog.php` | - |
| Kartu menu dari data (foreach) | `katalog.php`, `data.php` | - |
| Filter kategori lewat tab | `katalog.php` | `saringMenu()`, `urlKategori()` |
| Label tersedia / habis, pesan kosong | `katalog.php` | percabangan `if` |
| Label pedas / level | `katalog.php` | `labelPedas()` |
| Format harga rupiah | `katalog.php` | `formatRupiah()` |
| Ringkasan jumlah menu dan kategori | `index.php`, `katalog.php` | `ringkasanMenu()`, `hitungTersedia()` |
| Harga termurah per kategori | `katalog.php` | `hargaTermurahPerKategori()`, `labelHargaTermurah()` |
| Pengamanan output HTML | semua halaman | `e()` |

## 5. Fungsi Array Bawaan yang Dipakai
| Fungsi | Dipakai untuk |
|---|---|
| `count` | menghitung jumlah menu dan kategori |
| `array_filter` | menyaring menu per kategori dan menu tersedia |
| `array_column` | mengambil kolom kategori dan harga |
| `array_unique` | mendapat daftar kategori tanpa duplikat |
| `array_values` | merapikan indeks array |
| `in_array` | memvalidasi nilai filter dari URL |
| `min` | mencari harga termurah |
| `range` | membuat urutan level mi 1 sampai 10 |
| `implode` | menyusun teks harga termurah |

## 6. Tangkapan Layar
![Beranda](screenshots/beranda.png)
![Katalog](screenshots/katalog.png)

## 7. Sumber Referensi dan Catatan Penggunaan AI
Referensi: php.net (htmlspecialchars, array_filter, array_column, filter_input),
MDN (CSS Grid, media query). [tambah sumber lain bila ada]

Penggunaan AI (Claude, Anthropic):
- Membantu menyederhanakan versi awal (ada CRUD) menjadi website tampilan saja.
- Membantu meringkas `style.css` dan memakai satuan `fr` pada grid.
- Membantu memeriksa kode terhadap lembar perintah UTS, lalu merapikan
  `data.php` dan `functions.php`.
- Cara saya memeriksa: [isi: misalnya menjalankan semua halaman di
  localhost, mencoba tiap filter, membaca ulang tiap baris kode].
