<?php

// Memanggil class Film
require_once __DIR__ . "/Film.php";

// Class FilmBioskop mewarisi class Film
class FilmBioskop extends Film {
    private $FormatFilm;
    private $BahasaAudio;
    private $KualitasGambar;
    private $foto_poster;

    // Konstruktor
    public function __construct($IdMedia, $Judul, $TahunRilis, $Genre, $Durasi, $RatingUsia, $FormatFilm, $BahasaAudio, $KualitasGambar, $foto_poster) {
        parent::__construct($IdMedia, $Judul, $TahunRilis, $Genre, $Durasi, $RatingUsia);
        $this->FormatFilm = $FormatFilm;
        $this->BahasaAudio = $BahasaAudio;
        $this->KualitasGambar = $KualitasGambar;
        $this->foto_poster = $foto_poster;
    }

    // Getter dan Setter
    public function getFormatFilm() {
        return $this->FormatFilm;
    }

    public function setFormatFilm($FormatFilm) {
        $this->FormatFilm = $FormatFilm;
    }

    public function getBahasaAudio() {
        return $this->BahasaAudio;
    }

    public function setBahasaAudio($BahasaAudio) {
        $this->BahasaAudio = $BahasaAudio;
    }

    public function getKualitasGambar() {
        return $this->KualitasGambar;
    }

    public function setKualitasGambar($KualitasGambar) {
        $this->KualitasGambar = $KualitasGambar;
    }

    public function getFotoPoster() {
        return $this->foto_poster;
    }

    public function setFotoPoster($foto_poster) {
        $this->foto_poster = $foto_poster;
    }
}

?>