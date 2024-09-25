<?php
include '../hs.php';
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insert'])) {
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $nama_barang = $_POST['nama_barang'];
    $conn->query("INSERT INTO tb_vendor (nama, kontak, nama_barang) VALUES ('$nama', '$kontak', '$nama_barang')");
}
$t = "SELECT id_vendor, nama, kontak, nama_barang FROM tb_vendor";
$result = $conn->query($t);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/tabel.css">
    
</head>
<body>
<div class="form-container">
        <h2>Tambahkan Data</h2>
        <form method="post" action="index.php">
            <label for="nama">Nama Vendor:</label>
            <input type="text" id="nama" name="nama" required><br>
            <label for="kontak">Kontak:</label>
            <input type="text" id="kontak" name="kontak" required><br>
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" required><br>
            <input type="submit" name="insert" value="Insert">
        </form>
    </div>

</body>
</html>
