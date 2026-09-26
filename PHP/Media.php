<?php

class Media {
    private $IdMedia;
    private $Judul;
    private $TahunRilis;

    // Konstruktor
    public function __construct($IdMedia, $Judul, $TahunRilis) {
        $this->IdMedia = $IdMedia;
        $this->Judul = $Judul;
        $this->TahunRilis = $TahunRilis;
    }

    // Getter dan Setter
    public function getIdMedia() {
        return $this->IdMedia;
    }

    public function setIdMedia($IdMedia) {
        $this->IdMedia = $IdMedia;
    }

    public function getJudul() {
        return $this->Judul;
    }

    public function setJudul($Judul) {
        $this->Judul = $Judul;
    }

    public function getTahunRilis() {
        return $this->TahunRilis;
    }

    public function setTahunRilis($TahunRilis) {
        $this->TahunRilis = $TahunRilis;
    }
}

?>