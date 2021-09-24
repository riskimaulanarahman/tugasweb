<?php 
include 'koneksi.php';


session_start();
if($_SESSION['status']!="login"){
	header("location:login.php");
}


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
            <h1 class="m-0">Tambah User</h1>
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
       
              <form action="proses_tambah_user.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                  <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" required>
                  </div>

                  <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                  </div>

                  <div class="form-group">                  
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"  required >
                  </div>
                  
                  <div class="form-group">                  
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required >
                  </div>

                  <div class="form-group">                  
                    <label for="telp">Telepon</label>
                    <input type="text" class="form-control" id="telp" name="telp" required >
                  </div>

                  <div class="form-group">
                  <label for="status">Level</label>
                  <select class="form-control select2" name="level" required>
                    <option disabled selected>-- Pilih Level --</option>
                    <?php
            
                        echo "<option value='masyarakat'>Masyarakat</option>";  // displaying data in option menu
                        echo "<option value='petugas'>Petugas</option>";  // displaying data in option menu
                        echo "<option value='admin'>Admin</option>";  // displaying data in option menu
                    ?>  
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