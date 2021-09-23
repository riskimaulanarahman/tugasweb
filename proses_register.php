<?php
//menyertakan file program koneksi.php pada register
include 'koneksi.php';

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$telp = $_POST['telp'];
if( cek_nama($username,$koneksi) == 0 ){
    echo "<script>alert('Username sudah ada!');history.go(-1);</script>";}
    else{
    $tambah = mysqli_query($koneksi,"INSERT INTO masyarakat SET nik='$nik', nama='$nama', username='$username', password='$password', telp='$telp' ");

    if($tambah){
    echo "<script>alert('Data berhasil di tambahkan!');window.location='login.php';</script>";
    }
    else{
     echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
    }
}
        


function cek_nama($username,$koneksi){
    $username = mysqli_real_escape_string($koneksi, $username);
    $query = "SELECT * FROM masyarakat WHERE username = '$username'";
    if( $result = mysqli_query($koneksi, $query) ) return mysqli_num_rows($result);
}
?>