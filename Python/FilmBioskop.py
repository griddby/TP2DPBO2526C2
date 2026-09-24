from Film import Film

# Derived class
class FilmBioskop(Film):
    def __init__(self, IdMedia: str, Judul: str, TahunRilis: int, Genre: str, Durasi: int, RatingUsia: str, FormatFilm: str, BahasaAudio: str, KualitasGambar: str):
        super().__init__(IdMedia, Judul, TahunRilis, Genre, Durasi, RatingUsia)
        self.__FormatFilm = str(FormatFilm)
        self.__BahasaAudio = str(BahasaAudio)
        self.__KualitasGambar = str(KualitasGambar)

    # Setter
    def setFormatFilm(self, FormatFilm: str) -> None:
        self.__FormatFilm = str(FormatFilm)

    def setBahasaAudio(self, BahasaAudio: str) -> None:
        self.__BahasaAudio = str(BahasaAudio)

    def setKualitasGambar(self, KualitasGambar: str) -> None:
        self.__KualitasGambar = str(KualitasGambar)

    # Getter
    def getFormatFilm(self) -> str:
        return self.__FormatFilm

    def getBahasaAudio(self) -> str:
        return self.__BahasaAudio

    def getKualitasGambar(self) -> str:
        return self.__KualitasGambar