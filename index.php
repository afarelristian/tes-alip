<?php

declare(strict_types=1);

require_once __DIR__ . '/functions.php';

$menu = require __DIR__ . '/data.php';
$ringkasan = ringkasanMenu($menu);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hahu Jebredd | Kuliner Pedas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
    <a class="brand" href="index.php">Hahu <span>Jebredd.</span></a>

    <nav aria-label="Navigasi utama">
        <a class="active" href="index.php">Beranda</a>
        <a href="katalog.php">Katalog Menu</a>
    </nav>
</header>

<main>
    <section class="hero container">
        <div class="hero-content">
            <p class="eyebrow">UMKM KULINER KELUARGA</p>
            <h1>Teman Lapar,<br><span>Teman Pedas.</span></h1>
            <p>
                Nikmati tahu isi dengan beragam isian dan mi pedas
                dengan pilihan level sesuai selera.
            </p>
            <a class="btn" href="katalog.php">Lihat Menu</a>
        </div>

        <div class="hero-visual">
            <img
                src="assets/tahu-isi.png"
                alt="Tahu isi goreng dengan isian gurih"
                onerror="this.style.display='none'"
            >
        </div>
    </section>

    <section class="container about">
        <img class="about-photo" src="assets/foto-usaha.png" alt="Foto usaha Hahu Jebredd">
        <div class="about-copy">
            <h2>Tentang Kami</h2>
            <p>
                Hahu Jebredd adalah usaha kuliner keluarga yang berfokus pada olahan tahu spesial dengan cita rasa khas yang meledak di mulut. Dibuat dari bahan-bahan pilihan berkualitas, tahu goreng renyah kami dipadu dengan isian rempah melimpah.
                Kami berkomitmen memberikan kepuasan rasa bagi para pecinta kuliner pedas dan gurih. Setiap porsi dibuat secara presisi untuk memastikan kerapian rasa yang konsisten.


            </p>
        </div>
    </section>

    <section class="container stats" aria-label="Ringkasan menu">
        <?php foreach ($ringkasan as $label => $angka): ?>
            <div>
                <strong><?= e($angka) ?></strong>
                <span><?= e($label) ?></span>
            </div>
        <?php endforeach; ?>
    </section>

    <section class="container cta">
        <h2>Sudah Siap Memilih Menu?</h2>
        <p>Lihat pilihan tahu isi dan mi pedas di katalog kami.</p>
        <a class="btn" href="katalog.php">Jelajahi Katalog</a>
    </section>
</main>

<footer class="site-footer">
    <p>&copy; <?= e(date('Y')) ?> Hahu Jebredd. Proyek UTS Pemrograman Web.</p>
    <p class="muted">Harga pada katalog merupakan harga simulasi.</p>
</footer>
</body>
</html>
