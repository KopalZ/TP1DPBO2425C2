class Gadget:
    def __init__(self, id, nama, harga, stok, gambar):
        self.__id = id
        self.__nama = nama
        self.__harga = harga
        self.__stok = stok
        self.__gambar = gambar

    # Getter & Setter
    def get_id(self): return self.__id
    def set_id(self, id): self.__id = id

    def get_nama(self): return self.__nama
    def set_nama(self, nama): self.__nama = nama

    def get_harga(self): return self.__harga
    def set_harga(self, harga): self.__harga = harga

    def get_stok(self): return self.__stok
    def set_stok(self, stok): self.__stok = stok

    def get_gambar(self): return self.__gambar
    def set_gambar(self, gambar): self.__gambar = gambar

    def tampilkan(self):
        print(f"ID     : {self.__id}")
        print(f"Nama   : {self.__nama}")
        print(f"Harga  : {self.__harga}")
        print(f"Stok   : {self.__stok}")
        print(f"Gambar : {self.__gambar}")
