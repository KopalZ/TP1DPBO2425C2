<?php
class Gadget {
    private $id;
    private $nama;
    private $harga;
    private $stok;
    private $gambar;

    public function __construct($id, $nama, $harga, $stok, $gambar) {
        $this->id = $id;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
        $this->gambar = $gambar;
    }

    // Getter & Setter
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getNama() { return $this->nama; }
    public function setNama($nama) { $this->nama = $nama; }

    public function getHarga() { return $this->harga; }
    public function setHarga($harga) { $this->harga = $harga; }

    public function getStok() { return $this->stok; }
    public function setStok($stok) { $this->stok = $stok; }

    public function getGambar() { return $this->gambar; }
    public function setGambar($gambar) { $this->gambar = $gambar; }

    // Tampilkan dalam tabel HTML
    public function tampilkan() {
        echo "<tr>
                <td>{$this->id}</td>
                <td>{$this->nama}</td>
                <td>{$this->harga}</td>
                <td>{$this->stok}</td>
                <td><img src='{$this->gambar}' width='80'></td>
                <td>
                    <a href='?aksi=update&id={$this->id}'>Update</a> | 
                    <a href='?aksi=hapus&id={$this->id}'>Hapus</a>
                </td>
              </tr>";
    }
}
?>
