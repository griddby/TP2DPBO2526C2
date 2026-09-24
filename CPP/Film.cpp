#include <iostream>
#include "Media.cpp"

using namespace std;

class Film: public Media{
    private:
        string Genre;
        int Durasi;
        string RatingUsia;

    public:
        Film(){
        }

        Film(string IdMedia, string Judul, int TahunRilis, string Genre, int Durasi, string RatingUsia): Media(IdMedia, Judul, TahunRilis){
            this->Genre = Genre;
            this->Durasi = Durasi;
            this->RatingUsia = RatingUsia;
        }

        // Setter
        void setGenre(string Genre){
            this->Genre = Genre;
        }

        void setDurasi(int Durasi){
            this->Durasi = Durasi;
        }

        void setRatingUsia(string RatingUsia){
            this->RatingUsia = RatingUsia;
        }

        // Getter
        string getGenre(){
            return this->Genre;
        }

        int getDurasi(){
            return this->Durasi;
        }

        string getRatingUsia(){
            return this->RatingUsia;
        }
};