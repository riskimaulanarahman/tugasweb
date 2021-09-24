<?php
session_start();
include 'koneksi.php';

// membuat variabel untuk menampung data dari form
$id   = $_POST['id'];
$password   = $_POST['nik'];
$nama     = $_POST['nama'];
$username    = $_POST['id_username'];
$password    = $_POST['password'];
$status    = $_POST['status'];


  
    $query1  = "UPDATE user SET nik = '$nik', nama = '$nama', username = '$username', nik = '$password', status = '$status' where id_user ='$id' ";
    $result1 = mysqli_query($koneksi, $query1);
                    // periska query apakah ada error
                    if(!$result1){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                    }
  
?>