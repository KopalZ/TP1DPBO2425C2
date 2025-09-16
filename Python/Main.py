from Gadget import Gadget

daftar_gadget = [
    Gadget("G001", "Laptop ASUS ROG", 15000000, 10, "images/laptop.jpg"),
    Gadget("G002", "PlayStation 5", 8000000, 5, "images/ps5.jpg"),
    Gadget("G003", "Speaker Bluetooth JBL", 1000000, 25, "images/speaker.jpg"),
    Gadget("G004", "Smartwatch Xiaomi", 750000, 30, "images/watch.jpg"),
    Gadget("G005", "Wireless Earbuds", 500000, 40, "images/earbuds.jpg")
]

def tambah_gadget():
    id = input("Masukkan ID     : ")
    nama = input("Masukkan Nama   : ")
    harga = int(input("Masukkan Harga  : "))
    stok = int(input("Masukkan Stok   : "))
    gambar = input("Masukkan Path Gambar : ")

    g = Gadget(id, nama, harga, stok, gambar)
    daftar_gadget.append(g)
    print("Gadget berhasil ditambahkan!")

def tampilkan_gadget():
    if not daftar_gadget:
        print("Belum ada data gadget.")
        return
    
    # Header tabel
    print("\n" + "=" * 90)
    print(f"{'No.':<5}{'ID':<10}{'Nama':<30}{'Harga':<15}{'Stok':<10}{'Gambar':<20}")
    print("=" * 90)

    # Isi tabel
    for i, g in enumerate(daftar_gadget, 1):
        print(f"{i:<5}{g.get_id():<10}{g.get_nama():<30}{g.get_harga():<15}{g.get_stok():<10}{g.get_gambar():<20}")
    print("=" * 90)

def update_gadget():
    id = input("Masukkan ID gadget yang ingin diupdate: ")
    for g in daftar_gadget:
        if g.get_id() == id:
            g.set_nama(input("Masukkan Nama baru   : "))
            g.set_harga(int(input("Masukkan Harga baru  : ")))
            g.set_stok(int(input("Masukkan Stok baru   : ")))
            g.set_gambar(input("Masukkan Path Gambar baru : "))
            print("Data gadget berhasil diupdate!")
            return
    print(f"Gadget dengan ID {id} tidak ditemukan.")

def hapus_gadget():
    id = input("Masukkan ID gadget yang ingin dihapus: ")
    for i, g in enumerate(daftar_gadget):
        if g.get_id() == id:
            daftar_gadget.pop(i)
            print("Gadget berhasil dihapus!")
            return
    print(f"Gadget dengan ID {id} tidak ditemukan.")

def cari_gadget():
    key = input("Masukkan nama atau ID gadget yang dicari: ")
    ketemu = False
    for g in daftar_gadget:
        if g.get_id() == key or g.get_nama() == key:
            print("\nGadget ditemukan:")
            g.tampilkan()
            ketemu = True
    if not ketemu:
        print("Gadget tidak ditemukan.")

def main():
    while True:
        print("\n===== MENU TOKO GADGET =====")
        print("1. Tambah Gadget")
        print("2. Tampilkan Semua Gadget")
        print("3. Update Gadget")
        print("4. Hapus Gadget")
        print("5. Cari Gadget")
        print("0. Keluar")

        pilihan = input("Pilih menu: ")
        if pilihan == "1":
            tambah_gadget()
        elif pilihan == "2":
            tampilkan_gadget()
        elif pilihan == "3":
            update_gadget()
        elif pilihan == "4":
            hapus_gadget()
        elif pilihan == "5":
            cari_gadget()
        elif pilihan == "0":
            print("Keluar...")
            break
        else:
            print("Pilihan tidak valid!")

if __name__ == "__main__":
    main()
