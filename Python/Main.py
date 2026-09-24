from FilmBioskop import FilmBioskop

daftarFilmBioskop = []

def TambahData():
    print("------------------------------- Add Data -------------------------------")
    print("Masukkan data dengan format:")
    print("ID | Judul | Tahun | Genre | Durasi | Rating | Format | Audio | Kualitas")
    print()

    # Meminta seluruh data dalam satu input
    Data = input("Masukkan Data: ")
    # Memisahkan data berdasarkan tanda |
    Data = Data.split("|")
    # Menghapus spasi yang tidak diperlukan
    Data = [data.strip() for data in Data]
    # Memastikan jumlah data benar
    if len(Data) != 9:
        print("Data harus terdiri dari 9 bagian.")
        return

    # Memasukkan data ke masing-masing atribut
    IdMedia = Data[0]
    Judul = Data[1]
    TahunRilis = int(Data[2])
    Genre = Data[3]
    Durasi = int(Data[4])
    RatingUsia = Data[5]
    FormatFilm = Data[6]
    BahasaAudio = Data[7]
    KualitasGambar = Data[8]

    # Mengecek ID yang sama
    for film in daftarFilmBioskop:
        if IdMedia == film.getIdMedia():
            print("ID sudah ada, masukkan ID lainnya.")
            return

    # Membuat object film baru
    FilmBaru = FilmBioskop(
        IdMedia,
        Judul,
        TahunRilis,
        Genre,
        Durasi,
        RatingUsia,
        FormatFilm,
        BahasaAudio,
        KualitasGambar
    )
    # Menambahkan object ke dalam list
    daftarFilmBioskop.append(FilmBaru)
    print("Film berhasil ditambahkan!")

def TampilkanTabel():
    if not daftarFilmBioskop:
        print("Belum ada data film yang tersimpan.")
        return
    
    # Header tabel
    headers = [
        "ID",
        "Judul",
        "Tahun",
        "Genre",
        "Durasi(Menit)",
        "Rating",
        "Format",
        "Audio",
        "Kualitas"
    ]

    # Ambil data menggunakan getter
    data_tabel = []

    for film in daftarFilmBioskop:
        data_tabel.append([
            str(film.getIdMedia()),
            str(film.getJudul()),
            str(film.getTahunRilis()),
            str(film.getGenre()),
            str(film.getDurasi()),
            str(film.getRatingUsia()),
            str(film.getFormatFilm()),
            str(film.getBahasaAudio()),
            str(film.getKualitasGambar())
        ])

    # Hitung lebar maksimum setiap kolom secara dinamis
    lebar_kolom = [len(header) for header in headers]

    for baris in data_tabel:
        for idx, cell in enumerate(baris):
            lebar_kolom[idx] = max(
                lebar_kolom[idx],
                len(cell)
            )

    # Membuat garis pemisah tabel
    garis_pemisah = (
        "+"
        + "+".join(
            "-" * (lebar + 2)
            for lebar in lebar_kolom
        )
        + "+"
    )

    # Lebar bagian dalam tabel
    total_lebar_dalam = len(garis_pemisah) - 2

    # Fungsi untuk mencetak setiap baris
    def cetak_baris(baris_data):
        isi = []
        for idx, cell in enumerate(baris_data):
            isi.append(
                " " + cell.ljust(lebar_kolom[idx]) + " "
            )
        print("|" + "|".join(isi) + "|")

    # Judul tabel
    judul_teks = "DAFTAR FILM BIOSKOP"
    print()
    print("+" + "-" * total_lebar_dalam + "+")
    print("|" + judul_teks.center(total_lebar_dalam) + "|")
    print(garis_pemisah)
    # Header
    cetak_baris(headers)
    print(garis_pemisah)
    # Data
    for baris in data_tabel:
        cetak_baris(baris)
    # Garis bawah tabel
    print(garis_pemisah)
    print()

# Data awal FilmBioskop
daftarFilmBioskop.append(
    FilmBioskop(
        "FB001", "The Conjuring 2", 2016,
        "Horror", 134, "17+",
        "2D", "Inggris", "4K Digital",
    )
)

daftarFilmBioskop.append(
    FilmBioskop(
        "FB002", "Project Hail Mary", 2026, 
        "Sci-Fi", 156, "13+", 
        "IMAX 2D", "Inggris", "4K Laser",
    )
)

daftarFilmBioskop.append(
    FilmBioskop(
        "FB003", "The Greatest Showman", 2017,
        "Drama/Musical", 105, "SU",
        "2D", "Inggris", "4K Digital",
    )
)

daftarFilmBioskop.append(
    FilmBioskop(
        "FB004", "Portrait of a Lady on Fire", 2019,
        "Drama/Romance", 122, "17+",
        "2D", "Prancis", "2K Digital",
    )
)

daftarFilmBioskop.append(
    FilmBioskop(
        "FB005", "Lady Bird", 2017,
        "Comedy/Drama", 94, "17+",
        "2D", "Inggris", "2K Digital",
    )
)

# Nilai awal pilihan menu
pilihan = -1
# Menu akan terus berjalan selama pilihan bukan 0
while pilihan != 0:
    # Menampilkan menu utama
    print("\n========================================")
    print("               MENU FILM")
    print("========================================")
    print("1. Tambah Data Film")
    print("2. Menampilkan Data Film")
    print("0. Keluar")
    print("========================================")

    pilihan = int(input("Masukkan pilihan: "))
    if pilihan == 1:
        TambahData()
    elif pilihan == 2:
        TampilkanTabel()
    elif pilihan == 0:
        print("Keluar dari Menu.")
    else:
        print("Pilihan tidak tersedia.")