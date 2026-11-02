<?php

declare(strict_types=1);

// Fungsi bantuan yang dipakai halaman PHP lainnya.

// Mengamankan teks atau angka sebelum ditampilkan sebagai HTML.
function e(string|int $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// Mengubah angka harga menjadi format rupiah.
function formatRupiah(int $harga): string
{
    return 'Rp' . number_format($harga, 0, ',', '.');
}

// Menghasilkan label kepedasan berdasarkan data menu.
function labelPedas(array $menu): string
{
    if ($menu['kategori'] === 'Mi Level') {
        return 'Level ' . (int) $menu['level'];
    }

    return $menu['pedas'] === 'Pedas' ? 'Pedas' : 'Tidak Pedas';
}

// Mengambil daftar kategori unik dari data menu.
function daftarKategori(array $menu): array
{
    return array_values(array_unique(array_column($menu, 'kategori')));
}

// Menyaring menu berdasarkan kategori. Kategori kosong = semua menu.
function saringMenu(array $menu, string $kategori): array
{
    if ($kategori === '') {
        return $menu;
    }

    return array_filter(
        $menu,
        static fn(array $item): bool => $item['kategori'] === $kategori
    );
}

// Menghitung jumlah menu yang berstatus tersedia.
function hitungTersedia(array $menu): int
{
    return count(
        array_filter($menu, static fn(array $item): bool => $item['tersedia'])
    );
}

// Ringkasan angka untuk kartu statistik (label => nilai).
function ringkasanMenu(array $menu): array
{
    return [
        'Total Menu' => count($menu),
        'Menu Tersedia' => hitungTersedia($menu),
        'Kategori' => count(daftarKategori($menu)),
    ];
}

// Mencari harga termurah dari menu tersedia pada tiap kategori.
function hargaTermurahPerKategori(array $menu): array
{
    $hasil = [];

    foreach (daftarKategori($menu) as $kategori) {
        $harga = array_column(
            array_filter(
                $menu,
                static fn(array $item): bool => $item['kategori'] === $kategori
                    && $item['tersedia']
            ),
            'harga'
        );

        if ($harga !== []) {
            $hasil[$kategori] = min($harga);
        }
    }

    return $hasil;
}

// Menyusun teks harga termurah, contoh: "Tahu Isi Rp5.000 · Mi Level Rp10.000".
function labelHargaTermurah(array $menu): string
{
    $label = [];

    foreach (hargaTermurahPerKategori($menu) as $kategori => $harga) {
        $label[] = $kategori . ' ' . formatRupiah($harga);
    }

    return implode(' · ', $label);
}

// Membuat alamat halaman katalog untuk satu kategori.
function urlKategori(string $kategori): string
{
    if ($kategori === '') {
        return 'katalog.php';
    }

    return 'katalog.php?kategori=' . urlencode($kategori);
}
