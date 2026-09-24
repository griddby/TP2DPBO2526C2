#include <iostream>
#include "Film.cpp"

using namespace std;

class FilmBioskop: public Film{
    private:
        string FormatFilm;
        string BahasaAudio;
        string KualitasGambar;

    public:
        FilmBioskop(){
        }

        FilmBioskop(string IdMedia, string Judul, int TahunRilis, string Genre, int Durasi, string RatingUsia, string FormatFilm, string BahasaAudio, string KualitasGambar): Film(IdMedia, Judul, TahunRilis, Genre, Durasi, RatingUsia){
            this->FormatFilm = FormatFilm;
            this->BahasaAudio = BahasaAudio;
            this->KualitasGambar = KualitasGambar;
        }

        // Setter
        void setFormatFilm(string FormatFilm){
            this->FormatFilm = FormatFilm;
        }

        void setBahasaAudio(string BahasaAudio){
            this->BahasaAudio = BahasaAudio;
        }

        void setKualitasGambar(string KualitasGambar){
            this->KualitasGambar = KualitasGambar;
        }

        // Getter
        string getFormatFilm(){
            return this->FormatFilm;
        }

        string getBahasaAudio(){
            return this->BahasaAudio;
        }

        string getKualitasGambar(){
            return this->KualitasGambar;
        }
};