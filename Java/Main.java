import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    static ArrayList<Gadget> daftarGadget = new ArrayList<>();
    static Scanner sc = new Scanner(System.in);

    public static void tambahGadget() {
        System.out.print("Masukkan ID    : ");
        String id = sc.nextLine();
        System.out.print("Masukkan Nama  : ");
        String nama = sc.nextLine();
        System.out.print("Masukkan Harga : ");
        int harga = Integer.parseInt(sc.nextLine());
        System.out.print("Masukkan Stok  : ");
        int stok = Integer.parseInt(sc.nextLine());
        System.out.print("Masukkan Path Gambar : ");
        String gambar = sc.nextLine();

        Gadget g = new Gadget(id, nama, harga, stok, gambar);
        daftarGadget.add(g);
        System.out.println("Gadget berhasil ditambahkan!");
    }

    // --- FUNGSI BARU UNTUK MENAMPILKAN DALAM BENTUK TABEL ---
    public static void tampilkanGadget() {
        if (daftarGadget.isEmpty()) {
            System.out.println("Belum ada data gadget.");
            return;
        }

        // Header tabel
        System.out.println("\n==========================================================================================");
        System.out.printf("%-5s%-10s%-30s%-15s%-10s%-20s\n", "No.", "ID", "Nama", "Harga", "Stok", "Gambar");
        System.out.println("==========================================================================================");

        // Isi tabel
        for (int i = 0; i < daftarGadget.size(); i++) {
            Gadget g = daftarGadget.get(i);
            System.out.printf("%-5s%-10s%-30s%-15s%-10s%-20s\n",
                (i + 1), g.getId(), g.getNama(), g.getHarga(), g.getStok(), g.getGambar());
        }
        System.out.println("==========================================================================================");
    }
    // --- AKHIR FUNGSI BARU ---

    public static void updateGadget() {
        System.out.print("Masukkan ID gadget yang ingin diupdate: ");
        String id = sc.nextLine();

        for (Gadget g : daftarGadget) {
            if (g.getId().equals(id)) {
                System.out.print("Masukkan Nama baru   : ");
                g.setNama(sc.nextLine());
                System.out.print("Masukkan Harga baru  : ");
                g.setHarga(Integer.parseInt(sc.nextLine()));
                System.out.print("Masukkan Stok baru   : ");
                g.setStok(Integer.parseInt(sc.nextLine()));
                System.out.print("Masukkan Path Gambar baru : ");
                g.setGambar(sc.nextLine());

                System.out.println("Data gadget berhasil diupdate!");
                return;
            }
        }
        System.out.println("Gadget dengan ID " + id + " tidak ditemukan.");
    }

    public static void hapusGadget() {
        System.out.print("Masukkan ID gadget yang ingin dihapus: ");
        String id = sc.nextLine();

        for (int i = 0; i < daftarGadget.size(); i++) {
            if (daftarGadget.get(i).getId().equals(id)) {
                daftarGadget.remove(i);
                System.out.println("Gadget berhasil dihapus!");
                return;
            }
        }
        System.out.println("Gadget dengan ID " + id + " tidak ditemukan.");
    }

    public static void cariGadget() {
        System.out.print("Masukkan nama atau ID gadget yang dicari: ");
        String key = sc.nextLine();

        boolean ketemu = false;
        for (Gadget g : daftarGadget) {
            if (g.getId().equals(key) || g.getNama().equals(key)) {
                System.out.println("\nGadget ditemukan:");
                g.tampilkan(); // Menggunakan metode tampilkan() dari kelas Gadget
                ketemu = true;
            }
        }
        if (!ketemu) System.out.println("Gadget tidak ditemukan.");
    }

    public static void main(String[] args) {
        // Data awal
        daftarGadget.add(new Gadget("G001", "Laptop ASUS ROG", 15000000, 10, "images/laptop.jpg"));
        daftarGadget.add(new Gadget("G002", "PlayStation 5", 8000000, 5, "images/ps5.jpg"));
        daftarGadget.add(new Gadget("G003", "Speaker Bluetooth JBL", 1000000, 25, "images/speaker.jpg"));
        daftarGadget.add(new Gadget("G004", "Smartwatch Xiaomi", 750000, 30, "images/watch.jpg"));
        daftarGadget.add(new Gadget("G005", "Wireless Earbuds", 500000, 40, "images/earbuds.jpg"));

        int pilihan;
        do {
            System.out.println("\n===== MENU TOKO GADGET =====");
            System.out.println("1. Tambah Gadget");
            System.out.println("2. Tampilkan Semua Gadget");
            System.out.println("3. Update Gadget");
            System.out.println("4. Hapus Gadget");
            System.out.println("5. Cari Gadget");
            System.out.println("0. Keluar");
            System.out.print("Pilih menu: ");
            pilihan = Integer.parseInt(sc.nextLine());

            switch (pilihan) {
                case 1 -> tambahGadget();
                case 2 -> tampilkanGadget();
                case 3 -> updateGadget();
                case 4 -> hapusGadget();
                case 5 -> cariGadget();
                case 0 -> System.out.println("Keluar...");
                default -> System.out.println("Pilihan tidak valid!");
            }
        } while (pilihan != 0);
    }
}