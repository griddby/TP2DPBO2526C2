<?php

// Memanggil seluruh class yang digunakan
require_once __DIR__ . "/Media.php";
require_once __DIR__ . "/Film.php";
require_once __DIR__ . "/FilmBioskop.php";

session_start();

// Menyimpan daftar film
if (!isset($_SESSION['daftarFilmBioskop'])) {
    $_SESSION['daftarFilmBioskop'] = [];
    // Data awal FilmBioskop
    $_SESSION['daftarFilmBioskop'][] = new FilmBioskop("FB001", "The Conjuring 2", 2016, "Horror", 134, "17+", "2D", "Inggris", "4K Digital", "images/conjuring_2.jpg");
    $_SESSION['daftarFilmBioskop'][] = new FilmBioskop("FB002", "Project Hail Mary", 2026, "Sci-Fi", 156, "13+", "IMAX 2D", "Inggris", "4K Laser", "images/project_hail_mary.jpg");
    $_SESSION['daftarFilmBioskop'][] = new FilmBioskop("FB003", "The Greatest Showman", 2017, "Drama/Musical", 105, "SU", "2D", "Inggris", "4K Digital", "images/greatest_showman.jpg");
    $_SESSION['daftarFilmBioskop'][] = new FilmBioskop("FB004", "Portrait of a Lady on Fire", 2019, "Drama/Romance", 122, "17+", "2D", "Prancis", "2K Digital", "images/portrait_of_lady_on_fire.jpg");
    $_SESSION['daftarFilmBioskop'][] = new FilmBioskop("FB005", "Lady Bird", 2017, "Comedy/Drama", 94, "17+", "2D", "Inggris", "2K Digital", "images/lady_bird.jpg");
}

// Mengambil daftar film dari session
$daftarFilmBioskop = &$_SESSION['daftarFilmBioskop'];
$pesan = "";

// Memeriksa apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $IdMedia = $_POST['IdMedia'];
    $Judul = $_POST['Judul'];
    $TahunRilis = $_POST['TahunRilis'];
    $Genre = $_POST['Genre'];
    $Durasi = $_POST['Durasi'];
    $RatingUsia = $_POST['RatingUsia'];
    $FormatFilm = $_POST['FormatFilm'];
    $BahasaAudio = $_POST['BahasaAudio'];
    $KualitasGambar = $_POST['KualitasGambar'];

    // Menggunakan gambar default
    $foto_poster = "images/default.jpg";
    // Memeriksa apakah user mengupload foto
    if (isset($_FILES['foto_poster']) && $_FILES['foto_poster']['error'] == 0) {
        // Mengambil nama file foto
        $namaFoto = basename($_FILES['foto_poster']['name']);
        // Menentukan lokasi penyimpanan foto
        $lokasiFoto = __DIR__ . "/images/" . $namaFoto;
        // Memindahkan foto ke folder images
        if (move_uploaded_file($_FILES['foto_poster']['tmp_name'], $lokasiFoto)) {
            $foto_poster = "images/" . $namaFoto;
        }
    }

    // Mengecek ID yang sama
    $idSudahAda = false;
    foreach ($daftarFilmBioskop as $film) {
        if ($IdMedia == $film->getIdMedia()) {
            $idSudahAda = true;
            break;
        }
    }

    // Jika ID sudah digunakan
    if ($idSudahAda) {
        $pesan = "ID sudah ada, masukkan ID lainnya.";
    } else {
        // Membuat object FilmBioskop baru
        $FilmBaru = new FilmBioskop(
            $IdMedia,
            $Judul,
            $TahunRilis,
            $Genre,
            $Durasi,
            $RatingUsia,
            $FormatFilm,
            $BahasaAudio,
            $KualitasGambar,
            $foto_poster
        );
        // Menambahkan object ke dalam daftar film
        $daftarFilmBioskop[] = $FilmBaru;
        $pesan = "Film berhasil ditambahkan!";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Bioskop</title>
    <!-- Menghubungkan file CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Header halaman -->
    <header>
        <h1>TAMBAH DATA FILM BIOSKOP</h1>
    </header>

    <!-- Bagian utama -->
    <main>
        <!-- Tombol menuju halaman daftar film -->
        <div class="menu-atas">
            <a href="show.php" class="tombol-show">Lihat Daftar Film</a>
        </div>

        <!-- Menampilkan pesan -->
        <?php if ($pesan != "") { ?>
            <div class="pesan">
                <?= $pesan; ?>
            </div>
        <?php } ?>

        <!-- Form tambah data film -->
        <section class="form-section">
            <h2>Tambah Film</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-grid">
                    <!-- Input ID Media -->
                    <div class="form-group">
                        <label>ID Media</label>
                        <input type="text" name="IdMedia" placeholder="Contoh: FB006" required>
                    </div>

                    <!-- Input judul film -->
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="Judul" placeholder="Masukkan judul film" required>
                    </div>

                    <!-- Input tahun rilis -->
                    <div class="form-group">
                        <label>Tahun Rilis</label>
                        <input type="number" name="TahunRilis" placeholder="Contoh: 2025" required>
                    </div>

                    <!-- Input genre -->
                    <div class="form-group">
                        <label>Genre</label>
                        <input type="text" name="Genre" placeholder="Contoh: Drama/Romance" required>
                    </div>

                    <!-- Input durasi -->
                    <div class="form-group">
                        <label>Durasi</label>
                        <input type="number" name="Durasi" placeholder="Dalam menit" required>
                    </div>

                    <!-- Input rating usia -->
                    <div class="form-group">
                        <label>Rating Usia</label>
                        <input type="text" name="RatingUsia" placeholder="Contoh: 13+" required>
                    </div>

                    <!-- Input format film -->
                    <div class="form-group">
                        <label>Format Film</label>
                        <input type="text" name="FormatFilm" placeholder="Contoh: 2D" required>
                    </div>

                    <!-- Input bahasa audio -->
                    <div class="form-group">
                        <label>Bahasa Audio</label>
                        <input type="text" name="BahasaAudio" placeholder="Contoh: Indonesia" required>
                    </div>

                    <!-- Input kualitas gambar -->
                    <div class="form-group">
                        <label>Kualitas Gambar</label>
                        <input type="text" name="KualitasGambar" placeholder="Contoh: 4K Digital" required>
                    </div>

                    <!-- Input foto poster -->
                    <div class="form-group">
                        <label>Foto Poster</label>
                        <input type="file" name="foto_poster" accept="image/*">
                    </div>

                </div>
                <!-- Tombol menyimpan data -->
                <button type="submit" class="tombol-simpan">Simpan Film</button>
            </form>
        </section>
    </main>
</body>
</html>