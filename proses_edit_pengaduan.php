<?php
session_start();
include 'koneksi.php';

// membuat variabel untuk menampung data dari form
$id   = $_POST['id'];
$tanggal   = $_POST['tanggal'];
$nik     = $_POST['nik'];
$isi_laporan    = $_POST['isi_laporan'];
$status    = $_POST['status'];
$foto = $_FILES['foto']['name'];


if($foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg', 'jpeg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];   
    $rand = rand();
    $newfilename = $rand.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
          if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                  move_uploaded_file($file_tmp, 'gambar/'.$newfilename); //memindah file gambar ke folder gambar
                    // jalankan query UPDATE untuk merubah data ke database pastikan sesuai urutan 
                    $query  = "UPDATE pengaduan SET isi_laporan = '$isi_laporan', foto = '$newfilename' where id_pengaduan = '$id'";
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
  
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg atau png.');history.go(-1);</script>";
              }
  } else {
    $query  = "UPDATE pengaduan SET isi_laporan = '$isi_laporan' where id_pengaduan ='$id' ";
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
  }
  
?>