#include <iostream>
#include <vector>
#include <iomanip>
#include "Gadget.h"
using namespace std;

vector<Gadget> daftarGadget;

void tambahGadget() {
    string id, nama, gambar;
    int harga, stok;
    cout << "Masukkan ID     : "; cin >> id;
    cout << "Masukkan Nama   : "; cin.ignore(); getline(cin, nama);
    cout << "Masukkan Harga  : "; cin >> harga;
    cout << "Masukkan Stok   : "; cin >> stok;
    cout << "Masukkan Path Gambar : "; cin >> gambar;

    Gadget g(id, nama, harga, stok, gambar);
    daftarGadget.push_back(g);
    cout << "Gadget berhasil ditambahkan!\n";
}

void tampilkanGadget() {
    if (daftarGadget.empty()) {
        cout << "Belum ada data gadget.\n";
        return;
    }

    // Header tabel
    cout << "\n========================================================================================\n";
    cout << left << setw(5) << "No."
         << left << setw(10) << "ID"
         << left << setw(30) << "Nama"
         << left << setw(15) << "Harga"
         << left << setw(10) << "Stok"
         << left << setw(20) << "Gambar" << endl;
    cout << "========================================================================================\n";

    // Isi tabel
    for (int i = 0; i < daftarGadget.size(); i++) {
        cout << left << setw(5) << i + 1
             << left << setw(10) << daftarGadget[i].getId()
             << left << setw(30) << daftarGadget[i].getNama()
             << left << setw(15) << daftarGadget[i].getHarga()
             << left << setw(10) << daftarGadget[i].getStok()
             << left << setw(20) << daftarGadget[i].getGambar() << endl;
    }
    cout << "========================================================================================\n";
}

void updateGadget() {
    string id;
    cout << "Masukkan ID gadget yang ingin diupdate: ";
    cin >> id;

    for (auto &g : daftarGadget) {
        if (g.getId() == id) {
            string nama, gambar;
            int harga, stok;
            cout << "Masukkan Nama baru   : "; cin.ignore(); getline(cin, nama);
            cout << "Masukkan Harga baru  : "; cin >> harga;
            cout << "Masukkan Stok baru   : "; cin >> stok;
            cout << "Masukkan Path Gambar baru : "; cin >> gambar;

            g.setNama(nama);
            g.setHarga(harga);
            g.setStok(stok);
            g.setGambar(gambar);

            cout << "Data gadget berhasil diupdate!\n";
            return;
        }
    }
    cout << "Gadget dengan ID " << id << " tidak ditemukan.\n";
}

void hapusGadget() {
    string id;
    cout << "Masukkan ID gadget yang ingin dihapus: ";
    cin >> id;

    for (int i = 0; i < daftarGadget.size(); i++) {
        if (daftarGadget[i].getId() == id) {
            daftarGadget.erase(daftarGadget.begin() + i);
            cout << "Gadget berhasil dihapus!\n";
            return;
        }
    }
    cout << "Gadget dengan ID " << id << " tidak ditemukan.\n";
}

void cariGadget() {
    string key;
    cout << "Masukkan nama atau ID gadget yang dicari: ";
    cin.ignore(); getline(cin, key);

    bool ketemu = false;
    for (auto &g : daftarGadget) {
        if (g.getId() == key || g.getNama() == key) {
            cout << "\nGadget ditemukan:\n";
            g.tampilkan();
            ketemu = true;
        }
    }
    if (!ketemu) cout << "Gadget tidak ditemukan.\n";
}

int main() {
    // Data awal
    daftarGadget.push_back(Gadget("G001", "Laptop ASUS ROG", 15000000, 10, "images/laptop.jpg"));
    daftarGadget.push_back(Gadget("G002", "PlayStation 5", 8000000, 5, "images/ps5.jpg"));
    daftarGadget.push_back(Gadget("G003", "Speaker Bluetooth JBL", 1000000, 25, "images/speaker.jpg"));
    daftarGadget.push_back(Gadget("G004", "Smartwatch Xiaomi", 750000, 30, "images/watch.jpg"));
    daftarGadget.push_back(Gadget("G005", "Wireless Earbuds", 500000, 40, "images/earbuds.jpg"));
    
    int pilihan;
    do {
        cout << "\n===== MENU TOKO GADGET =====\n";
        cout << "1. Tambah Gadget\n";
        cout << "2. Tampilkan Semua Gadget\n";
        cout << "3. Update Gadget\n";
        cout << "4. Hapus Gadget\n";
        cout << "5. Cari Gadget\n";
        cout << "0. Keluar\n";
        cout << "Pilih menu: ";
        cin >> pilihan;

        switch (pilihan) {
            case 1: tambahGadget(); break;
            case 2: tampilkanGadget(); break;
            case 3: updateGadget(); break;
            case 4: hapusGadget(); break;
            case 5: cariGadget(); break;
            case 0: cout << "Keluar...\n"; break;
            default: cout << "Pilihan tidak valid!\n";
        }
    } while (pilihan != 0);

    return 0;
}
