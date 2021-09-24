<?php 
include 'koneksi.php';


session_start();
if($_SESSION['status']!="login"){
	header("location:login.php");
}
$username = $_SESSION['username'];
$level = $_SESSION['level'];
$nik =  $_SESSION['nik'];

if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);
   
       // menampilkan data dari database yang mempunyai id=$id
       $query = "SELECT * FROM pengaduan WHERE id_pengaduan='$id'";
       $result = mysqli_query($koneksi, $query);
       // jika data gagal diambil maka akan tampil error berikut
       if(!$result){
         die ("Query Error: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
      }
       // mengambil data dari database
       $data = mysqli_fetch_assoc($result);
         // apabila data tidak ada pada database maka akan dijalankan perintah ini
          if (!count($data)) {
             echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
          }
        }else {
       // apabila tidak ada data GET id pada akan di redirect ke index.php
       echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
     }  
     $pengaduan = $data['id_pengaduan'];
  
                

include 'head.php';
include 'sidebar.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Tanggapan Pengaduan</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
      
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
            
              <div class="card-body table-responsive p-0">
       
              <form action="proses_edit_pengaduan.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <?php
                $query1 = "SELECT * FROM tanggapan WHERE id_pengaduan='$pengaduan'";
                 $result1 = mysqli_query($koneksi, $query1);
                 // jika data gagal diambil maka akan tampil error berikut
                 if(!$result1){
                   die ("Query Error: ".mysqli_errno($koneksi).
                      " - ".mysqli_error($koneksi));
                }
                 // mengambil data dari database
                 $data1 = mysqli_fetch_assoc($result1);
                   // apabila data tidak ada pada database maka akan dijalankan perintah ini
                    if (!count($data1)) {
                       echo "<script>alert('Data tidak ditemukan');window.location='index.php';</script>";
                    } 

                    $user = $data1['id_user'];
                    $query2 = "SELECT * FROM user WHERE id_user='$user'";
                    $result2 = mysqli_query($koneksi, $query2);
                    // jika data gagal diambil maka akan tampil error berikut
                    if(!$result2){
                      die ("Query Error: ".mysqli_errno($koneksi).
                         " - ".mysqli_error($koneksi));
                   }
                    // mengambil data dari database
                    $data2 = mysqli_fetch_assoc($result2);
                      // apabila data tidak ada pada database maka akan dijalankan perintah ini
                       if (!count($data2)) {
                          echo "<script>alert('Data tidak ditemukan');window.location='index.php';</script>";
                       } 
                   
                    ?>
                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input id="id" name="id" value="<?php echo $data['id_pengaduan']; ?>"  hidden />
                    <input type="text" class="form-control" id="tanggal" name="tanggal" value =<?php echo $data1['tgl_tanggapan']; ?> readonly>
                  </div>

                  <div class="form-group">
                  <label for="tanggapan">Tanggapan</label>
                    <textarea type="text" class="form-control" id="tanggapan" name="tanggapan" readonly><?php echo $data1['tanggapan']; ?></textarea>
                  </div>

                  <div class="form-group">
                  <label for="nama">Petugas</label>
                    <input type="text" class="form-control" id="nama" name="nama" value =<?php echo $data2['nama'];?> readonly >
                  </div>
                 
              </div>
              </form>
              </div>
            <?php 
            include 'footer.php';
            ?>