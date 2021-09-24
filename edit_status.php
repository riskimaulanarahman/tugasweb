<?php 
include 'koneksi.php';
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

session_start();
if($_SESSION['status']!="login"){
	header("location:login.php");
}
$username = $_SESSION['username'];
$level = $_SESSION['level'];
$nik =  $_SESSION['nik'];
$iduser = $_SESSION['id_user'];
$namauser = $_SESSION['nama'];


include 'head.php';
include 'sidebar.php';
?>
<?php  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Tanggapan & Status Pengaduan</h1>
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
       
              <form action="proses_edit_status.php" method="post" enctype="multipart/form-data">
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
                    ?>
                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input id="id" name="id" value="<?php echo $data['id_pengaduan']; ?>"  hidden />
                    <input type="text" class="form-control" id="tanggal" name="tanggal" value =<?php echo date('Y-m-d'); ?> readonly>
                  </div>

                  <div class="form-group">
                  <label for="tanggapan">Tanggapan</label>
                    <input type="text" class="form-control" id="tanggapan" name="tanggapan" value="<?php echo $data1['tanggapan']; ?>" required>
                  </div>

                  <div class="form-group">
                  
                    <input type="text" class="form-control" id="id_user" name="id_user" value =<?php echo $iduser;?> hidden >
                    <label for="nama">Petugas</label>
                    <input type="text" class="form-control" id="nama" name="nama" value =<?php echo $namauser;?> readonly >
                  </div>
                  
                
                  <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control select2" name="status" required>
                    <option disabled selected>-- Pilih Status --</option>
                    <?php
                    if ($data['status']=='0'){
                        echo "<option value='0' selected>Belum Diproses</option>";  // displaying data in option menu
                        echo "<option value='proses'>Proses</option>";  // displaying data in option menu
                        echo "<option value='selesai'>Selesai</option>";  // displaying data in option menu
                    }elseif ($data['status']=='proses'){
                        echo "<option value='0' >Belum Diproses</option>";  // displaying data in option menu
                        echo "<option value='proses' selected>Proses</option>";  // displaying data in option menu
                        echo "<option value='selesai'>Selesai</option>";  // displaying data in option menu
                    }else{
                        echo "<option value='0' >Belum Diproses</option>";  // displaying data in option menu
                        echo "<option value='proses' >Proses</option>";  // displaying data in option menu
                        echo "<option value='selesai' selected>Selesai</option>";  // displaying data in option menu
                    }?>  
                  </select>
</div>
                  <div class="col-12">
            <button type="submit" name="simpan" class="btn btn-primary btn-block">Simpan</button>
          </div>
              </div>
              </form>
              </div>
            <?php 
            include 'footer.php';
            ?>