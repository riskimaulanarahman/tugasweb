<?php
//menyertakan file program koneksi.php pada register
include 'koneksi.php';

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$telp = $_POST['telp'];
$level = "masyarakat";

  	$sql_u = "SELECT * FROM user WHERE username='$username'";
  	$sql_n = "SELECT * FROM user WHERE nik='$nik'";
  	$res_u = mysqli_query($koneksi, $sql_u);
  	$res_n = mysqli_query($koneksi, $sql_n);

  	if (mysqli_num_rows($res_u) > 0) {
      echo "<script>alert('Username sudah ada!');history.go(-1);</script>";
  	}else if(mysqli_num_rows($res_n) > 0){
      echo "<script>alert('nik sudah ada!');history.go(-1);</script>";
  	}else{
           $query = "INSERT INTO user (nik, nama, username, password, telp, level) 
      	    	  VALUES ('$nik', '$nama', '$username', '$password', '$telp', '$level')";
           $results = mysqli_query($koneksi, $query);
           echo "<script>alert('Data berhasil di tambahkan!');window.location='index.php';</script>";
           exit();
  	}

?>
