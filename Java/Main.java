import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    // Menyimpan daftar film
    static ArrayList<FilmBioskop> daftarFilmBioskop = new ArrayList<>();
    static Scanner input = new Scanner(System.in);

    // Fungsi untuk menambahkan data film
    public static void TambahData(){
        System.out.println("------------------------------- Add Data -------------------------------");
        System.out.println("Masukkan data dengan format:");
        System.out.println("ID | Judul | Tahun | Genre | Durasi | Rating | Format | Audio | Kualitas");
        System.out.println();

        // Meminta seluruh data dalam satu input
        String Data;
        System.out.print("Masukkan Data: ");
        Data = input.nextLine();

        // Array untuk menyimpan setiap bagian data
        String[] DataFilm = new String[9];

        // Memisahkan data berdasarkan tanda |
        String[] hasilSplit = Data.split("\\|");
        
        int jumlahData = hasilSplit.length;
        // Memastikan jumlah data benar
        if(jumlahData != 9){
            System.out.println("Data harus terdiri dari 9 bagian.");
            return;
        }

        // Menyimpan setiap bagian data ke array
        for(int i = 0; i < 9; i++){
            DataFilm[i] = hasilSplit[i];
        }

        // Menghapus spasi di awal dan akhir setiap data
        for(int i = 0; i < 9; i++){
            DataFilm[i] = DataFilm[i].trim();
        }

        // Memasukkan data ke masing-masing atribut
        String IdMedia = DataFilm[0];
        String Judul = DataFilm[1];
        int TahunRilis = Integer.parseInt(DataFilm[2]);
        String Genre = DataFilm[3];
        int Durasi = Integer.parseInt(DataFilm[4]);
        String RatingUsia = DataFilm[5];
        String FormatFilm = DataFilm[6];
        String BahasaAudio = DataFilm[7];
        String KualitasGambar = DataFilm[8];

        // Mengecek ID yang sama
        for(int i = 0; i < daftarFilmBioskop.size(); i++){
            if(IdMedia.equals(daftarFilmBioskop.get(i).getIdMedia())){
                System.out.println("ID sudah ada, masukkan ID lainnya.");
                return;
            }
        }

        // Membuat object film baru
        FilmBioskop FilmBaru = new FilmBioskop(
            IdMedia,
            Judul,
            TahunRilis,
            Genre,
            Durasi,
            RatingUsia,
            FormatFilm,
            BahasaAudio,
            KualitasGambar
        );
        // Menambahkan object ke dalam ArrayList
        daftarFilmBioskop.add(FilmBaru);
        System.out.println("Film berhasil ditambahkan!");
    }


    // Fungsi untuk menampilkan seluruh data film
    public static void TampilkanTabel(){
        if(daftarFilmBioskop.size() == 0){
            System.out.println("Belum ada data film yang tersimpan.");
            return;
        }

        // Header tabel
        String[] headers = {
            "ID",
            "Judul",
            "Tahun",
            "Genre",
            "Durasi(Menit)",
            "Rating",
            "Format",
            "Audio",
            "Kualitas"
        };

        // Menyimpan data film dalam bentuk tabel
        String[][] dataTabel = new String[daftarFilmBioskop.size()][9];
        // Mengambil data menggunakan getter
        for(int i = 0; i < daftarFilmBioskop.size(); i++){
            dataTabel[i][0] = daftarFilmBioskop.get(i).getIdMedia();
            dataTabel[i][1] = daftarFilmBioskop.get(i).getJudul();
            dataTabel[i][2] = String.valueOf(daftarFilmBioskop.get(i).getTahunRilis());
            dataTabel[i][3] = daftarFilmBioskop.get(i).getGenre();
            dataTabel[i][4] = String.valueOf(daftarFilmBioskop.get(i).getDurasi());
            dataTabel[i][5] = daftarFilmBioskop.get(i).getRatingUsia();
            dataTabel[i][6] = daftarFilmBioskop.get(i).getFormatFilm();
            dataTabel[i][7] = daftarFilmBioskop.get(i).getBahasaAudio();
            dataTabel[i][8] = daftarFilmBioskop.get(i).getKualitasGambar();
        }

        // Menghitung lebar maksimum setiap kolom
        int[] lebarKolom = new int[9];
        for(int i = 0; i < 9; i++){
            lebarKolom[i] = headers[i].length();
        }

        // Membandingkan panjang header dengan isi data
        for(int i = 0; i < daftarFilmBioskop.size(); i++){
            for(int j = 0; j < 9; j++){
                if(dataTabel[i][j].length() > lebarKolom[j]){
                    lebarKolom[j] = dataTabel[i][j].length();
                }
            }
        }

        // Membuat garis pemisah tabel
        String garisPemisah = "+";
        for(int i = 0; i < 9; i++){
            garisPemisah += "-".repeat(lebarKolom[i] + 2);
            garisPemisah += "+";
        }

        // Menghitung lebar bagian dalam tabel
        int totalLebarDalam = garisPemisah.length() - 2;
        // Judul tabel
        String judul = "DAFTAR FILM BIOSKOP";
        System.out.println();
        // Garis atas judul
        System.out.println("+" + "-".repeat(totalLebarDalam) + "+");

        // Menghitung posisi judul agar berada di tengah
        int jumlahSpasi = totalLebarDalam - judul.length();
        int spasiKiri = jumlahSpasi / 2;
        int spasiKanan = jumlahSpasi - spasiKiri;
        // Menampilkan judul tabel
        System.out.println("|" + " ".repeat(spasiKiri) + judul + " ".repeat(spasiKanan) + "|");
        System.out.println(garisPemisah);
        
        // Menampilkan header tabel
        System.out.print("|");
        for(int i = 0; i < 9; i++){
            System.out.print(" " + headers[i]);
            // Menambahkan spasi agar kolom lurus
            System.out.print(" ".repeat(lebarKolom[i] - headers[i].length()));
            System.out.print(" |");
        }

        System.out.println();
        System.out.println(garisPemisah);
        // Menampilkan seluruh data film
        for(int i = 0; i < daftarFilmBioskop.size(); i++){
            System.out.print("|");
            for(int j = 0; j < 9; j++){
                System.out.print(" " + dataTabel[i][j]);
                // Menambahkan spasi agar kolom lurus
                System.out.print(" ".repeat(lebarKolom[j] - dataTabel[i][j].length()));
                System.out.print(" |");
            }
            System.out.println();
        }
        // Garis bawah tabel
        System.out.println(garisPemisah);
        System.out.println();
    }

    public static void main(String[] args){
        // Data awal FilmBioskop
        daftarFilmBioskop.add(
            new FilmBioskop(
                "FB001", "The Conjuring 2", 2016,
                "Horror", 134, "17+",
                "2D", "Inggris", "4K Digital"
            )
        );
        daftarFilmBioskop.add(
            new FilmBioskop(
                "FB002", "Project Hail Mary", 2026,
                "Sci-Fi", 156, "13+",
                "IMAX 2D", "Inggris", "4K Laser"
            )
        );
        daftarFilmBioskop.add(
            new FilmBioskop(
                "FB003", "The Greatest Showman", 2017,
                "Drama/Musical", 105, "SU",
                "2D", "Inggris", "4K Digital"
            )
        );
        daftarFilmBioskop.add(
            new FilmBioskop(
                "FB004", "Portrait of a Lady on Fire", 2019,
                "Drama/Romance", 122, "17+",
                "2D", "Prancis", "2K Digital"
            )
        );
        daftarFilmBioskop.add(
            new FilmBioskop(
                "FB005", "Lady Bird", 2017,
                "Comedy/Drama", 94, "17+",
                "2D", "Inggris", "2K Digital"
            )
        );


        // Nilai awal pilihan menu
        int pilihan = -1;
        // Menu akan terus berjalan selama pilihan bukan 0
        while(pilihan != 0){
            // Menampilkan menu utama
            System.out.println();
            System.out.println("========================================");
            System.out.println("               MENU FILM");
            System.out.println("========================================");
            System.out.println("1. Tambah Data Film");
            System.out.println("2. Menampilkan Data Film");
            System.out.println("0. Keluar");
            System.out.println("========================================");

            System.out.print("Masukkan pilihan: ");
            pilihan = Integer.parseInt(input.nextLine());
            // Menjalankan menu sesuai pilihan user
            if(pilihan == 1){
                TambahData();
            }
            else if(pilihan == 2){
                TampilkanTabel();
            }
            else if(pilihan == 0){
                System.out.println("Keluar dari Menu.");
            }
            else{
                System.out.println("Pilihan tidak tersedia.");
            }
        }
    }
}