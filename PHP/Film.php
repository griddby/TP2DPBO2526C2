<?php

// Memanggil class Media
require_once __DIR__ . "/Media.php";

// Class Film mewarisi class Media
class Film extends Media {
    private $Genre;
    private $Durasi;
    private $RatingUsia;

    // Konstruktor
    public function __construct($IdMedia, $Judul, $TahunRilis, $Genre, $Durasi, $RatingUsia) {
        parent::__construct($IdMedia, $Judul, $TahunRilis);
        $this->Genre = $Genre;
        $this->Durasi = $Durasi;
        $this->RatingUsia = $RatingUsia;
    }

    // Getter dan Setter
    public function getGenre() {
        return $this->Genre;
    }

    public function setGenre($Genre) {
        $this->Genre = $Genre;
    }

    public function getDurasi() {
        return $this->Durasi;
    }

    public function setDurasi($Durasi) {
        $this->Durasi = $Durasi;
    }

    public function getRatingUsia() {
        return $this->RatingUsia;
    }

    public function setRatingUsia($RatingUsia) {
        $this->RatingUsia = $RatingUsia;
    }
}

?>