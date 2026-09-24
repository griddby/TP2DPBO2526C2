public class FilmBioskop extends Film {
    private String FormatFilm;
    private String BahasaAudio;
    private String KualitasGambar;

    public FilmBioskop() {
    }

    public FilmBioskop(String IdMedia, String Judul, int TahunRilis, String Genre, int Durasi, String RatingUsia, String FormatFilm, String BahasaAudio, String KualitasGambar) {
        super(IdMedia, Judul, TahunRilis, Genre, Durasi, RatingUsia);
        this.FormatFilm = FormatFilm;
        this.BahasaAudio = BahasaAudio;
        this.KualitasGambar = KualitasGambar;
    }

    // Setter
    public void setFormatFilm(String FormatFilm) {
        this.FormatFilm = FormatFilm;
    }

    public void setBahasaAudio(String BahasaAudio) {
        this.BahasaAudio = BahasaAudio;
    }

    public void setKualitasGambar(String KualitasGambar) {
        this.KualitasGambar = KualitasGambar;
    }

    // Getter
    public String getFormatFilm() {
        return this.FormatFilm;
    }

    public String getBahasaAudio() {
        return this.BahasaAudio;
    }

    public String getKualitasGambar() {
        return this.KualitasGambar;
    }
}