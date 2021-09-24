<?php 

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


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Pengaduan</h1>
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
              <form action="proses_tambah_pengaduan.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                    <input type="text" class="form-control" id="tanggal" name="tanggal" value =<?php echo date('Y-m-d'); ?> readonly>
                  </div>

                  <div class="form-group">
                  <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value =<?php echo $nik; ?> readonly>
                  </div>

                  <div class="form-group">
                  <label for="isi_laporan">Isi Laporan</label>
                    <textarea type="text" class="form-control" id="isi_laporan" name="isi_laporan"required > </textarea>
                  </div>
                  <div class="input-group mb-3">
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->

                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="foto" name="foto" required>
                      <label class="custom-file-label" for="customFile">Choose file</label>
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