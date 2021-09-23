<?php

// mengaktifkan session php
session_start();
//menyertakan file program koneksi.php pada register
include 'koneksi.php';


$username = $_POST['username'];
$password = $_POST['password'];


  	$sql_u = "SELECT * FROM user WHERE username='$username' and password='$password'";
  	$res_u = mysqli_query($koneksi, $sql_u);


  	if (mysqli_num_rows($res_u) > 0) {
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "login";
		header("location:index.php");
  	}else{
           //echo "<script>alert('Username / Password Salah!');window.location='login.php';</script>";
           exit();
  	}
//echo "<script>alert('Username / Password Salah!');window.location='login.php';</script>";
?>
