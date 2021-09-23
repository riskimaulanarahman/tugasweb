<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$pass = ($_POST['password']);
$login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' and password='$pass'");
$cek = mysqli_num_rows($login);
 
if ($cek > 0) {
  
  $_SESSION['status'] = "login";
  $row_akun = mysqli_fetch_array($cek);
            $_SESSION["id_user"] = $row_akun["id_user"];
            $_SESSION["nik"] = $row_akun["nik"];
            $_SESSION["nama"] = $row_akun["nama"];
            $_SESSION["username"] = $row_akun["username"];
            $_SESSION["password"] = $row_akun["password"];
			$_SESSION["telp"] = $row_akun["telp"];
 
  header("location:index.php");
 
}else {
  header("location:login.php?pesan=gagal");
 
}
 ?>