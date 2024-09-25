<?php
include("../koneksi.php");
include '../hs.php';

$t = "SELECT * FROM tb_inv";
$result = $conn->query($t);

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM tb_inv WHERE id_inv = $id");
}
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/tabel.css">
    <style>
   
</style>

    
   
</head>
<body>
<h1>Inventory</h1>
<table border="1" class="gup">
    <tr>
        <th>Nama Barang</th> 
        <th>Jenis Barang</th>
        <th>Stok</th>
        <th>Lokasi</th>
        <th>Harga</th>
        <th>Serial Number</th>
        <th>Update & Delete</th>
    </tr>
    <?php
   
    ?>
</table>
<center><div class="action-links"><a class="insert" href="insert.php">Insert</a></div></center>
</body>
</html>
