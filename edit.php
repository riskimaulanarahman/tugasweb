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

session_start();
if($_SESSION['status']!="login"){
	header("location:login.php");
}
$username = $_SESSION['username'];
$level = $_SESSION['level'];
$nik =  $_SESSION['nik'];


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
            <h1 class="m-0">Edit Pengaduan</h1>
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
                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input id="id" name="id" value="<?php echo $data['id_pengaduan']; ?>"  hidden />
                    <input type="text" class="form-control" id="tanggal" name="tanggal" value =<?php echo $data['tgl_pengaduan']; ?> readonly>
                  </div>

                  <div class="form-group">
                  <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value =<?php echo $data['nik']; ?> readonly>
                  </div>

                  <div class="form-group">
                  <label for="isi_laporan">Isi Laporan</label>
                    <input type="text" class="form-control" id="isi_laporan" name="isi_laporan" value =<?php echo $data['isi_laporan'];?> required >
                  </div>
                  <div class="input-group mb-3">
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                    <img src="gambar/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="foto" name="foto" >
                      <label class="custom-file-label" for="customFile">Choose file</label>
                      <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah foto</i>
                    </div>
                  </div>
                
                   
                  <input type="hidden" class="form-control" id="status" name="status" value = "0">
                  <div class="col-12">
            <button type="submit" name="simpan" class="btn btn-primary btn-block">Simpan</button>
          </div>
              </div>
              </form>
              </div>
            <?php 
            include 'footer.php';
            ?>