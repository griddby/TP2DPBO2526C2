public class Film extends Media {
    private String Genre;
    private int Durasi;
    private String RatingUsia;

    public Film() {
    }

    public Film(String IdMedia, String Judul, int TahunRilis, String Genre, int Durasi, String RatingUsia) {
        super(IdMedia, Judul, TahunRilis);
        this.Genre = Genre;
        this.Durasi = Durasi;
        this.RatingUsia = RatingUsia;
    }

    // Setter
    public void setGenre(String Genre) {
        this.Genre = Genre;
    }

    public void setDurasi(int Durasi) {
        this.Durasi = Durasi;
    }

    public void setRatingUsia(String RatingUsia) {
        this.RatingUsia = RatingUsia;
    }

    // Getter
    public String getGenre() {
        return this.Genre;
    }

    public int getDurasi() {
        return this.Durasi;
    }

    public String getRatingUsia() {
        return this.RatingUsia;
    }
}