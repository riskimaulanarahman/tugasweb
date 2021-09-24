<?php
session_start();
include 'koneksi.php';

// membuat variabel untuk menampung data dari form
$id   = $_POST['id'];
$tanggal   = $_POST['tanggal'];
$tanggapan     = $_POST['tanggapan'];
$user    = $_POST['id_user'];
$status    = $_POST['status'];

$query = "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_user) VALUES ('$id', '$tanggal', '$tanggapan', '$user')";
$result = mysqli_query($koneksi, $query);
    
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                    }
  
    $query1  = "UPDATE pengaduan SET status = '$status' where id_pengaduan ='$id' ";
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