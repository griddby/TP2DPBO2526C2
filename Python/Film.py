from Media import Media

# Intermediary class
class Film(Media):
    def __init__(self, IdMedia: str, Judul: str, TahunRilis: int, Genre: str, Durasi: int, RatingUsia: str):
        super().__init__(IdMedia, Judul, TahunRilis)
        self.__Genre = str(Genre)
        self.__Durasi = int(Durasi)
        self.__RatingUsia = str(RatingUsia)

    # Setter
    def setGenre(self, Genre: str) -> None:
        self.__Genre = str(Genre)

    def setDurasi(self, Durasi: int) -> None:
        self.__Durasi = int(Durasi)

    def setRatingUsia(self, RatingUsia: str) -> None:
        self.__RatingUsia = str(RatingUsia)

    # Getter
    def getGenre(self) -> str:
        return self.__Genre

    def getDurasi(self) -> int:
        return self.__Durasi

    def getRatingUsia(self) -> str:
        return self.__RatingUsia