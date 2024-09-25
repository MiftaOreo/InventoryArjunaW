<?php
include("../koneksi.php");
include("../hs.php");

$t = "SELECT * FROM tb_storage";
$result = $conn->query($t);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insert'])) {
    $nama = $_POST['nama_gudang'];
    $lokasi = $_POST['lokasi'];
    $conn->query("INSERT INTO tb_storage (nama_gudang, lokasi) VALUES ('$nama', '$lokasi')");
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
            <label for="nama_gudang">Nama Gudang:</label>
            <input type="text" id="nama_gudang" name="nama_gudang" required><br>
            <label for="lokasi">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" required><br>
            <input type="submit" name="insert" value="Insert">
        </form>

</body>
</html>