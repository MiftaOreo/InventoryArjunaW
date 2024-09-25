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
        .form-container select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            width: 100%;
            background-color: #fff;
        }

        .out-of-stock {
            background-color: white;
            color: red; 
        }
        .form-container select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            width: 100%;
            background-color: #fff;
        }

        
    .form-container select {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
        width: 100%;
        background-color: #fff;
    }

    .out-of-stock {
        background-color: red;
        color: red; 
    }

    .no-stock {
        background-color: red;
        color: white;
    }
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
 while($row = $result->fetch_assoc()) {
    $stokClass = '';
    if ($row['stok'] < 3) {
        $stokClass = 'class="out-of-stock"';
    } 
    if ($row['stok'] <= 0) {
        $stokClass = 'class="no-stock"'; 
    }
    
    echo "<tr>";
    echo "<td>" .($row['nama_barang']) . "</td>"; 
    echo "<td>" .($row['jenis_barang']) . "</td>";
    echo "<td $stokClass>" .($row['stok']) . "</td>"; 
    echo "<td>" .($row['lokasi']) . "</td>";
    echo "<td>" .($row['harga']) . "</td>";
    echo "<td>" .($row["serial_number"]) . "</td>";
    echo "<td class='action-links'><a class='update' href='update.php?id=" . $row['id_inv'] . "'>Update</a>
        <a class='delete' href='?delete=" . $row['id_inv'] . "' onclick='return confirm(\"Beneran?\");'>Delete</a></td>";
    echo "</tr>";
}

    ?>
</table>
<center><div class="action-links"><a class="insert" href="insert.php">Insert</a></div></center>
</body>
</html>
