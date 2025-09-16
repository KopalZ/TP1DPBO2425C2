#include <iostream>
#include <string>
using namespace std;

class Gadget {
private:
    string id;
    string nama;
    int harga;
    int stok;
    string gambar;

public:
    // Constructor
    Gadget(string id, string nama, int harga, int stok, string gambar) {
        this->id = id;
        this->nama = nama;
        this->harga = harga;
        this->stok = stok;
        this->gambar = gambar;
    }

    // Getter & Setter ID
    string getId() { return id; }
    void setId(string id) { this->id = id; }

    // Getter & Setter Nama
    string getNama() { return nama; }
    void setNama(string nama) { this->nama = nama; }

    // Getter & Setter Harga
    int getHarga() { return harga; }
    void setHarga(int harga) { this->harga = harga; }

    // Getter & Setter Stok
    int getStok() { return stok; }
    void setStok(int stok) { this->stok = stok; }

    // Getter & Setter Gambar
    string getGambar() { return gambar; }
    void setGambar(string gambar) { this->gambar = gambar; }

    // Method tampilkan
    void tampilkan() {
        cout << "ID     : " << id << endl;
        cout << "Nama   : " << nama << endl;
        cout << "Harga  : " << harga << endl;
        cout << "Stok   : " << stok << endl;
        cout << "Gambar : " << gambar << endl;
    }
};
