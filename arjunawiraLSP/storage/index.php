<?php
include("../koneksi.php");
include '../hs.php';

$t = "SELECT * FROM tb_storage";
$result = $conn->query($t);

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM tb_storage WHERE id_storage = $id");
}


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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/tabel.css">
</head>
<body>
<h1>Storage</h1>
<table border="1" class="gup">
    <tr>
        <th>Nama Gudang</th> 
        <th>Lokasi</th>
        <th>Update & Delete</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nama_gudang'] . "</td>"; 
            echo "<td>" . $row['lokasi'] . "</td>";
            echo "<td class='action-links'><a class='update' href='update.php?id=" . $row['id_storage'] . "'>Update</a>
            <a class='delete' href='?delete=" . $row['id_storage'] . "' onclick='return confirm(\"Beneran?\");'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
    }
    ?>
</table>

<center><div class="action-links"><a class="insert" href="insert.php">Insert</a></div></center>

</body>
</html>

