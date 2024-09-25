<?php
include '../hs.php';
include '../koneksi.php';


if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM tb_vendor WHERE id_vendor = $id");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insert'])) {
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $nama_barang = $_POST['nama_barang'];
    $conn->query("INSERT INTO tb_vendor (nama, kontak, nama_barang) VALUES ('$nama', '$kontak', '$nama_barang')");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $nama_barang = $_POST['nama_barang'];
    $conn->query("UPDATE tb_vendor SET nama = '$nama', kontak = '$kontak', nama_barang = '$nama_barang' WHERE id_vendor = $id");


    header("Location: index.php");
    exit();
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
    <title>Vendor</title>
    <link rel="stylesheet" href="../css/tabel.css">
   
</head>
<body>
    <h1>Vendor</h1>
    <table border="1">
        <tr>
            <th>Nama Vendor</th> 
            <th>Kontak</th>
            <th>Nama Barang</th>
            <th>Update & Delete</th>
            
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>"; 
                echo "<td>" . htmlspecialchars($row['kontak']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama_barang']) . "</td>";
                echo "<td class='action-links'><a class='update' href='update.php?id=" . $row['id_vendor'] . "'>Update</a>
                <a class='delete' href='?delete=" . $row['id_vendor'] . "' onclick='return confirm(\"Beneran?\");'>Delete</a></td>";
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
