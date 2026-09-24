#include <iostream>

using namespace std;

class Media{
    private:
        string IdMedia;
        string Judul;
        int TahunRilis;

    public:
        Media(){
        }

        Media(string IdMedia, string Judul, int TahunRilis){
            this->IdMedia = IdMedia;
            this->Judul = Judul;
            this->TahunRilis = TahunRilis;
        }

        // Setter
        void setIdMedia(string IdMedia){
            this->IdMedia = IdMedia;
        }

        void setJudul(string Judul){
            this->Judul = Judul;
        }

        void setTahunRilis(int TahunRilis){
            this->TahunRilis = TahunRilis;
        }

        // Getter
        string getIdMedia(){
            return this->IdMedia;
        }

        string getJudul(){
            return this->Judul;
        }

        int getTahunRilis(){
            return this->TahunRilis;
        }
};