<?php
include("../koneksi.php");


session_start(); 

$username = $_POST['nama']; 

$password = $_POST['password']; 

$sql = "SELECT * FROM tb_user WHERE nama ='$username' AND password ='$password'"; 

$result = $conn->query($sql); 

if ($result->num_rows > 0) { 

 $_SESSION['nama'] = $username; 

 header("Location: ../inventory/index.php"); 

} else { 

 
} 

$conn->close(); 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="post">
            <input type="text" name="nama" id="nama" placeholder="Username" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <button type="submit" onclick="Login Berhasil">login</button>
        </form>
    </div>
</body>
</html>
