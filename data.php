<?php

declare(strict_types=1);

// Data seluruh menu Hahu Jebredd.
// Setiap menu punya: id, nama, kategori, harga, pedas, tersedia, level.
$hargaTahuIsi = 5000;
$hargaMi = 10000;
$levelTertinggi = 10;
$isianTahu = [
    ['nama' => 'Ayam Suwir', 'tersedia' => true],
    ['nama' => 'Ati', 'tersedia' => true],
    ['nama' => 'Usus', 'tersedia' => false],
];
$daftarMenu = [];

// Setiap isian tahu punya versi tidak pedas (level 0) dan pedas (level 1).
foreach ($isianTahu as $dataIsian) {
    $isian = $dataIsian['nama'];

    foreach (['Tidak Pedas', 'Pedas'] as $tingkatPedas) {
        $daftarMenu[] = [
            'id' => count($daftarMenu) + 1,
            'nama' => 'Tahu Isi ' . $isian,
            'kategori' => 'Tahu Isi',
            'harga' => $hargaTahuIsi,
            'pedas' => $tingkatPedas,
            'tersedia' => $dataIsian['tersedia'],
            'level' => $tingkatPedas === 'Pedas' ? 1 : 0,
        ];
    }
}

// Mi tersedia dari level 1 sampai level tertinggi.
// Level tertinggi sengaja diberi status habis sebagai contoh percabangan.
foreach (range(1, $levelTertinggi) as $levelMi) {
    $daftarMenu[] = [
        'id' => count($daftarMenu) + 1,
        'nama' => 'Mi Level ' . $levelMi,
        'kategori' => 'Mi Level',
        'harga' => $hargaMi,
        'pedas' => 'Level ' . $levelMi,
        'tersedia' => $levelMi < $levelTertinggi,
        'level' => $levelMi,
    ];
}

return $daftarMenu;
