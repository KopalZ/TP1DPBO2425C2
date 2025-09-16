<?php
include "Gadget.php";
session_start();


// ========== DATA AWAL ==========
if (!isset($_SESSION['daftarGadget'])) {
    $_SESSION['daftarGadget'] = [
        new Gadget("G001", "Laptop ASUS ROG", 15000000, 10, "images/rog.jpeg"),
        new Gadget("G002", "PlayStation 5", 8000000, 5, "images/ps5.jpeg"),
        new Gadget("G003", "Speaker Bluetooth JBL", 1000000, 25, "images/jbl.jpeg"),
        new Gadget("G004", "Smartwatch Xiaomi", 750000, 30, "images/smartwatch.jpeg"),
        new Gadget("G005", "Wireless Earbuds", 500000, 40, "images/tws.jpeg")
    ];
}

// ========== TAMBAH GADGET ==========
if (isset($_POST['tambah'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $gambar = $_POST['gambar'];

    $_SESSION['daftarGadget'][] = new Gadget($id, $nama, $harga, $stok, $gambar);
    header("Location: index.php");
    exit;
}

// ========== HAPUS GADGET ==========
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    foreach ($_SESSION['daftarGadget'] as $i => $g) {
        if ($g->getId() == $id) {
            unset($_SESSION['daftarGadget'][$i]);
            $_SESSION['daftarGadget'] = array_values($_SESSION['daftarGadget']);
            break;
        }
    }
    header("Location: index.php");
    exit;
}

// ========== UPDATE GADGET ==========
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    foreach ($_SESSION['daftarGadget'] as $g) {
        if ($g->getId() == $id) {
            $g->setNama($_POST['nama']);
            $g->setHarga($_POST['harga']);
            $g->setStok($_POST['stok']);
            $g->setGambar($_POST['gambar']);
            break;
        }
    }
    header("Location: index.php");
    exit;
}

// ========== CARI GADGET ==========
$hasilCari = [];
if (isset($_POST['cari'])) {
    $key = strtolower($_POST['keyword']);
    foreach ($_SESSION['daftarGadget'] as $g) {
        if (strtolower($g->getId()) == $key || strtolower($g->getNama()) == $key) {
            $hasilCari[] = $g;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Toko Gadget</title>
</head>
<body>
    <h2>Tambah Gadget</h2>
    <form method="post">
        <input type="text" name="id" placeholder="ID" required><br>
        <input type="text" name="nama" placeholder="Nama" required><br>
        <input type="number" name="harga" placeholder="Harga" required><br>
        <input type="number" name="stok" placeholder="Stok" required><br>
        <input type="text" name="gambar" placeholder="Path Gambar (misal: images/hp.jpg)" required><br>
        <button type="submit" name="tambah">Tambah</button>
    </form>

    <h2>Cari Gadget</h2>
    <form method="post">
        <input type="text" name="keyword" placeholder="Cari berdasarkan ID atau Nama" required>
        <button type="submit" name="cari">Cari</button>
    </form>

    <?php if (isset($_POST['cari'])): ?>
        <h3>Hasil Pencarian</h3>
        <?php if (empty($hasilCari)): ?>
            <p>Tidak ditemukan.</p>
        <?php else: ?>
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($hasilCari as $g) $g->tampilkan(); ?>
            </table>
        <?php endif; ?>
    <?php endif; ?>

    <h2>Daftar Gadget</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($_SESSION['daftarGadget'] as $g) $g->tampilkan(); ?>
    </table>

    <?php
    // FORM UPDATE
    if (isset($_GET['aksi']) && $_GET['aksi'] == 'update') {
        $id = $_GET['id'];
        foreach ($_SESSION['daftarGadget'] as $g) {
            if ($g->getId() == $id) {
                ?>
                <h2>Update Gadget</h2>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $g->getId(); ?>">
                    <input type="text" name="nama" value="<?= $g->getNama(); ?>" required><br>
                    <input type="number" name="harga" value="<?= $g->getHarga(); ?>" required><br>
                    <input type="number" name="stok" value="<?= $g->getStok(); ?>" required><br>
                    <input type="text" name="gambar" value="<?= $g->getGambar(); ?>" required><br>
                    <button type="submit" name="update">Update</button>
                </form>
                <?php
            }
        }
    }
    ?>
</body>
</html>
