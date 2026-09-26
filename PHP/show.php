<?php

// Memanggil seluruh class
require_once __DIR__ . "/Media.php";
require_once __DIR__ . "/Film.php";
require_once __DIR__ . "/FilmBioskop.php";

session_start();

// Mengambil daftar film dari session
$daftarFilmBioskop = $_SESSION['daftarFilmBioskop'] ?? [];

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Film Bioskop</title>

    <!-- Menghubungkan file CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Header halaman -->
    <header>
        <h1>DAFTAR FILM BIOSKOP</h1>
        <p>Informasi film yang tersedia di bioskop</p>
    </header>

    <!-- Bagian utama -->
    <main>
        <!-- Tombol navigasi -->
        <div class="menu-atas">
            <a href="index.php" class="tombol-show">+ Tambah Film</a>
        </div>

        <!-- Bagian tabel -->
        <section class="tabel-section">

            <div class="judul-section">
                <h2>Data Film</h2>
                <span><?= count($daftarFilmBioskop); ?> Film</span>
            </div>

            <!-- Container tabel -->
            <div class="table-container">
                <table>
                    <!-- Header tabel -->
                    <thead>
                        <tr>
                            <th>Poster</th>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Tahun</th>
                            <th>Genre</th>
                            <th>Durasi</th>
                            <th>Rating</th>
                            <th>Format</th>
                            <th>Audio</th>
                            <th>Kualitas</th>
                        </tr>
                    </thead>

                    <!-- Data film -->
                    <tbody>
                        <?php foreach ($daftarFilmBioskop as $film) { ?>
                            <tr>
                                <!-- Poster -->
                                <td>
                                    <img class="poster-film" src="<?= $film->getFotoPoster(); ?>" alt="<?= $film->getJudul(); ?>">
                                </td>
                                <!-- ID -->
                                <td class="id-film"><?= $film->getIdMedia(); ?></td>
                                <!-- Judul -->
                                <td class="judul-film"><?= $film->getJudul(); ?></td>
                                <!-- Tahun -->
                                <td><?= $film->getTahunRilis(); ?></td>
                                <!-- Genre -->
                                <td><?= $film->getGenre(); ?></td>
                                <!-- Durasi -->
                                <td><?= $film->getDurasi(); ?> menit</td>
                                <!-- Rating -->
                                <td><?= $film->getRatingUsia(); ?></td>
                                <!-- Format -->
                                <td><?= $film->getFormatFilm(); ?></td>
                                <!-- Audio -->
                                <td><?= $film->getBahasaAudio(); ?></td>
                                <!-- Kualitas -->
                                <td><?= $film->getKualitasGambar(); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>