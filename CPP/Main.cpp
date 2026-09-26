#include <iostream>
#include <string>
#include "FilmBioskop.cpp"

using namespace std;

// Menyimpan daftar film
FilmBioskop daftarFilmBioskop[100];
int jumlahFilm = 0;

// Fungsi untuk menambahkan data film
void TambahData(){
    cout << "------------------------------- Add Data -------------------------------" << endl;
    cout << "Masukkan data dengan format:" << endl;
    cout << "ID | Judul | Tahun | Genre | Durasi | Rating | Format | Audio | Kualitas" << endl;
    cout << endl;

    // Meminta seluruh data dalam satu input
    string Data;
    cout << "Masukkan Data: ";
    getline(cin >> ws, Data);

    // Array untuk menyimpan setiap bagian data
    string DataFilm[9];

    // Memisahkan data berdasarkan tanda |
    int posisiAwal = 0;
    int posisiAkhir;
    int jumlahData = 0;
    while((posisiAkhir = Data.find('|', posisiAwal)) != string::npos){
        if(jumlahData >= 8){
            cout << "Data harus terdiri dari 9 bagian." << endl;
            return;
        }

        DataFilm[jumlahData] = Data.substr(
            posisiAwal,
            posisiAkhir - posisiAwal
        );

        jumlahData++;
        posisiAwal = posisiAkhir + 1;
    }
    // Menyimpan data terakhir
    DataFilm[jumlahData] = Data.substr(posisiAwal);
    jumlahData++;

    // Memastikan jumlah data benar
    if(jumlahData != 9){
        cout << "Data harus terdiri dari 9 bagian." << endl;
        return;
    }

    // Menghapus spasi di awal dan akhir setiap data
    for(int i = 0; i < 9; i++){
        // Menghapus spasi di awal
        while(!DataFilm[i].empty() && DataFilm[i][0] == ' '){
            DataFilm[i].erase(0, 1);
        }
        // Menghapus spasi di akhir
        while(!DataFilm[i].empty() && DataFilm[i][DataFilm[i].length() - 1] == ' '){
            DataFilm[i].erase(DataFilm[i].length() - 1, 1);
        }
    }

    // Memasukkan data ke masing-masing atribut
    string IdMedia = DataFilm[0];
    string Judul = DataFilm[1];
    int TahunRilis = stoi(DataFilm[2]);
    string Genre = DataFilm[3];
    int Durasi = stoi(DataFilm[4]);
    string RatingUsia = DataFilm[5];
    string FormatFilm = DataFilm[6];
    string BahasaAudio = DataFilm[7];
    string KualitasGambar = DataFilm[8];

    // Mengecek ID yang sama
    for(int i = 0; i < jumlahFilm; i++){
        if(IdMedia == daftarFilmBioskop[i].getIdMedia()){
            cout << "ID sudah ada, masukkan ID lainnya." << endl;
            return;
        }
    }

    // Membuat object film baru
    FilmBioskop FilmBaru(
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
    // Menambahkan object ke dalam array
    daftarFilmBioskop[jumlahFilm] = FilmBaru;
    jumlahFilm++;
    cout << "Film berhasil ditambahkan!" << endl;
}


// Fungsi untuk menampilkan seluruh data film
void TampilkanTabel(){
    if(jumlahFilm == 0){
        cout << "Belum ada data film yang tersimpan." << endl;
        return;
    }

    // Header tabel
    string headers[9] = {
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
    string dataTabel[100][9];
    // Mengambil data menggunakan getter
    for(int i = 0; i < jumlahFilm; i++){
        dataTabel[i][0] = daftarFilmBioskop[i].getIdMedia();
        dataTabel[i][1] = daftarFilmBioskop[i].getJudul();
        dataTabel[i][2] = to_string(daftarFilmBioskop[i].getTahunRilis());
        dataTabel[i][3] = daftarFilmBioskop[i].getGenre();
        dataTabel[i][4] = to_string(daftarFilmBioskop[i].getDurasi());
        dataTabel[i][5] = daftarFilmBioskop[i].getRatingUsia();
        dataTabel[i][6] = daftarFilmBioskop[i].getFormatFilm();
        dataTabel[i][7] = daftarFilmBioskop[i].getBahasaAudio();
        dataTabel[i][8] = daftarFilmBioskop[i].getKualitasGambar();
    }

    // Menghitung lebar maksimum setiap kolom
    int lebarKolom[9];
    for(int i = 0; i < 9; i++){
        lebarKolom[i] = headers[i].length();
    }
    // Membandingkan panjang header dengan isi data
    for(int i = 0; i < jumlahFilm; i++){
        for(int j = 0; j < 9; j++){
            if(dataTabel[i][j].length() > lebarKolom[j]){
                lebarKolom[j] = dataTabel[i][j].length();
            }
        }
    }

    // Membuat garis pemisah tabel
    string garisPemisah = "+";
    for(int i = 0; i < 9; i++){
        garisPemisah += string(
            lebarKolom[i] + 2, '-');
        garisPemisah += "+";
    }

    // Menghitung lebar bagian dalam tabel
    int totalLebarDalam = garisPemisah.length() - 2;
    // Judul tabel
    string judul = "DAFTAR FILM BIOSKOP";
    cout << endl;

    // Garis atas judul
    cout << "+" << string(totalLebarDalam, '-') << "+" << endl;
    // Menghitung posisi judul agar berada di tengah
    int jumlahSpasi = totalLebarDalam - judul.length();
    int spasiKiri = jumlahSpasi / 2;
    int spasiKanan = jumlahSpasi - spasiKiri;
    
    // Menampilkan judul tabel
    cout << "|" << string(spasiKiri, ' ') << judul << string(spasiKanan, ' ') << "|" << endl;
    cout << garisPemisah << endl;
    
    // Menampilkan header tabel
    cout << "|";
    for(int i = 0; i < 9; i++){
        cout << " " << headers[i];
        // Menambahkan spasi agar kolom lurus
        cout << string(lebarKolom[i] - headers[i].length(), ' ' );
        cout << " |";
    }
    cout << endl;
    cout << garisPemisah << endl;
    
    // Menampilkan seluruh data film
    for(int i = 0; i < jumlahFilm; i++){
        cout << "|";
        for(int j = 0; j < 9; j++){
            cout << " " << dataTabel[i][j];
            // Menambahkan spasi agar kolom lurus
            cout << string(lebarKolom[j] - dataTabel[i][j].length(), ' ');
            cout << " |";
        }
        cout << endl;
    }

    // Garis bawah tabel
    cout << garisPemisah << endl;
    cout << endl;
}


int main(){
    // Data awal FilmBioskop
    daftarFilmBioskop[jumlahFilm++] = FilmBioskop(
        "FB001", "The Conjuring 2", 2016,
        "Horror", 134, "17+",
        "2D", "Inggris", "4K Digital"
    );
    daftarFilmBioskop[jumlahFilm++] = FilmBioskop(
        "FB002", "Project Hail Mary", 2026,
        "Sci-Fi", 156, "13+",
        "IMAX 2D", "Inggris", "4K Laser"
    );

    daftarFilmBioskop[jumlahFilm++] = FilmBioskop(
        "FB003", "The Greatest Showman", 2017,
        "Drama/Musical", 105, "SU",
        "2D", "Inggris", "4K Digital"
    );

    daftarFilmBioskop[jumlahFilm++] = FilmBioskop(
        "FB004", "Portrait of a Lady on Fire", 2019,
        "Drama/Romance", 122, "17+",
        "2D", "Prancis", "2K Digital"
    );
    daftarFilmBioskop[jumlahFilm++] = FilmBioskop(
        "FB005", "Lady Bird", 2017,
        "Comedy/Drama", 94, "17+",
        "2D", "Inggris", "2K Digital"
    );


    // Nilai awal pilihan menu
    int pilihan = -1;
    // Menu akan terus berjalan selama pilihan bukan 0
    while(pilihan != 0){
        // Menampilkan menu utama
        cout << endl;
        cout << "========================================" << endl;
        cout << "               MENU FILM" << endl;
        cout << "========================================" << endl;
        cout << "1. Tambah Data Film" << endl;
        cout << "2. Menampilkan Data Film" << endl;
        cout << "0. Keluar" << endl;
        cout << "========================================" << endl;

        cout << "Masukkan pilihan: ";
        cin >> pilihan;
        // Menjalankan menu sesuai pilihan user
        if(pilihan == 1){
            TambahData();
        }
        else if(pilihan == 2){
            TampilkanTabel();
        }
        else if(pilihan == 0){
            cout << "Keluar dari Menu." << endl;
        }
        else{
            cout << "Pilihan tidak tersedia." << endl;
        }
    }
    return 0;
}