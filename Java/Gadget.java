public class Gadget {
    private String id;
    private String nama;
    private int harga;
    private int stok;
    private String gambar;

    // Constructor
    public Gadget(String id, String nama, int harga, int stok, String gambar) {
        this.id = id;
        this.nama = nama;
        this.harga = harga;
        this.stok = stok;
        this.gambar = gambar;
    }

    // Getter & Setter
    public String getId() { return id; }
    public void setId(String id) { this.id = id; }

    public String getNama() { return nama; }
    public void setNama(String nama) { this.nama = nama; }

    public int getHarga() { return harga; }
    public void setHarga(int harga) { this.harga = harga; }

    public int getStok() { return stok; }
    public void setStok(int stok) { this.stok = stok; }

    public String getGambar() { return gambar; }
    public void setGambar(String gambar) { this.gambar = gambar; }

    // Method tampilkan
    public void tampilkan() {
        System.out.println("ID     : " + id);
        System.out.println("Nama   : " + nama);
        System.out.println("Harga  : " + harga);
        System.out.println("Stok   : " + stok);
        System.out.println("Gambar : " + gambar);
    }
}
