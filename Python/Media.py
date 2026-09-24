# Base class
class Media:
    def __init__(self, IdMedia: str, Judul: str, TahunRilis: int):
        self.__IdMedia = str(IdMedia)
        self.__Judul = str(Judul)
        self.__TahunRilis = int(TahunRilis)

    # Setter
    def setIdMedia(self, IdMedia: str) -> None:
        self.__IdMedia = str(IdMedia)

    def setJudul(self, Judul: str) -> None:
        self.__Judul = str(Judul)

    def setTahunRilis(self, TahunRilis: int) -> None:
        self.__TahunRilis = int(TahunRilis)

    # Getter
    def getIdMedia(self) -> str:
        return self.__IdMedia

    def getJudul(self) -> str:
        return self.__Judul

    def getTahunRilis(self) -> int:
        return self.__TahunRilis