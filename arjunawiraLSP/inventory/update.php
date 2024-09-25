<?php
include '../hs.php';
include '../koneksi.php';


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM tb_inv WHERE id_inv = $id");
    $inv = $result->fetch_assoc();
} else {
    die("Invalid ID");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $nama = $_POST['nama_barang'];
    $jenis = $_POST['jenis_barang'];
    $stok = $_POST['stok'];
    $lokasi = $_POST['lokasi'];
    $harga = $_POST['harga'];
    $serial = $_POST['serial_number'];
    $conn->query("UPDATE tb_inv SET nama_barang = '$nama', jenis_barang = '$jenis', stok = '$stok', lokasi = '$lokasi', harga = '$harga', serial_number = '$serial' WHERE id_inv = $id");


    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Inventory</title>
    <link rel="stylesheet" href="../css/tabel.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(29, 29, 29);
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 78%;
            margin: 20px auto;
            padding: 20px;
            background-color: rgb(54, 53, 53);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #fff;
    
        }
        h1 {
            color: white;
            text-align: center;
            margin-top: 0;
            margin-right: 25px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin: 5px 0;
        }
        .form-group input[type="text"] {
            width: calc(100% - 24px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Vendor</h1>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($inv['id_inv']); ?>">
            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" id="nama_barang" name="nama_barang" value="<?php echo htmlspecialchars($inv['nama_barang']); ?>" required>
            </div>
            <div class="form-group">
                <label for="jenis_barang">Jenis Barang:</label>
                <input type="text" id="jenis_barang" name="jenis_barang" value="<?php echo htmlspecialchars($inv['jenis_barang']); ?>" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="text" id="stok" name="stok" value="<?php echo htmlspecialchars($inv['stok']); ?>" required>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" value="<?php echo htmlspecialchars($inv['lokasi']); ?>" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" id="harga" name="harga" value="<?php echo htmlspecialchars($inv['harga']); ?>" required>
            </div>
            <div class="form-group">
                <label for="serial_number">Serial Number:</label>
                <input type="text" id="serial_number" name="serial_number" value="<?php echo htmlspecialchars($inv['serial_number']); ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" name="update" value="Update">
            </div>
        </form>
    </div>
</body>
</html> 