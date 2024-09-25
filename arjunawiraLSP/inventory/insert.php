<?php
include("../koneksi.php");
include '../hs.php';

$t = "SELECT * FROM tb_inv";
$result = $conn->query($t);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insert'])) {
    $nama = $_POST['nama_barang'];
    $jenis = $_POST['jenis_barang'];
    $stok = $_POST['stok'];
    $lokasi = $_POST['lokasi'];
    $harga = $_POST['harga'];
    $serial = $_POST['serial_number'];
    $conn->query("INSERT INTO tb_inv (nama_barang, jenis_barang, stok, lokasi, harga, serial_number) VALUES ('$nama', '$jenis', '$stok', '$lokasi', '$harga', '$serial')");
}


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
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" required><br>  
        
        <label for="jenis_barang">Jenis Barang:</label>
        <input type="text" id="jenis_barang" name="jenis_barang" required><br>
        
        <label for="stok">Stok:</label>
        <input type="text" id="stok" name="stok" required><br>
        
        <label for="lokasi">Lokasi:</label>
        <input type="text" id="lokasi" name="lokasi" required><br>
        
        <label for="harga">Harga:</label>
        <input type="text" id="harga" name="harga" required><br>
        
        <label for="serial_number">Serial Number:</label>
        <input type="text" id="serial_number" name="serial_number" required><br>
        
        <input type="submit" name="insert" value="Insert">
    </form>
</div>
</body>
</html>