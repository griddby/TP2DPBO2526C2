public class Media {
    private String IdMedia;
    private String Judul;
    private int TahunRilis;

    public Media() {
    }

    public Media(String IdMedia, String Judul, int TahunRilis) {
        this.IdMedia = IdMedia;
        this.Judul = Judul;
        this.TahunRilis = TahunRilis;
    }

    // Setter
    public void setIdMedia(String IdMedia) {
        this.IdMedia = IdMedia;
    }

    public void setJudul(String Judul) {
        this.Judul = Judul;
    }

    public void setTahunRilis(int TahunRilis) {
        this.TahunRilis = TahunRilis;
    }

    // Getter
    public String getIdMedia() {
        return this.IdMedia;
    }

    public String getJudul() {
        return this.Judul;
    }

    public int getTahunRilis() {
        return this.TahunRilis;
    }
}