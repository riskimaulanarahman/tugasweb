<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
  // ambil nilai id dari url dan disimpan dalam variabel $id
  $id = ($_GET["id"]);
 
     // menampilkan data dari database yang mempunyai id=$id
     $query = "SELECT * FROM user WHERE id_user='$id'";
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
            <h1 class="m-0">Edit User</h1>
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
       
              <form action="proses_edit_user.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                  <label for="nik">NIK</label>
                  <input id="id" name="id" value="<?php echo $data['id_user']; ?>"  hidden />
                    <input type="text" class="form-control" id="nik" name="nik" value =<?php echo $data['nik']; ?> required>
                  </div>

                  <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                  </div>

                  <div class="form-group">                  
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value =<?php echo $data['username'];?> readonly >
                  </div>
                  
                  <div class="form-group">                  
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" value =<?php echo $data['password'];?> required >
                  </div>

                  <div class="form-group">                  
                    <label for="telp">Telepon</label>
                    <input type="text" class="form-control" id="telp" name="telp" value =<?php echo $data['telp'];?> required >
                  </div>

                  <div class="form-group">
                  <label for="level">Level</label>
                  <select class="form-control select2" name="level" required>
                    <option disabled selected>-- Pilih Status --</option>
                    <?php
                    if ($data['level']=='masyarakat'){
                        echo "<option value='masyarakat' selected>Masyarakat</option>";  // displaying data in option menu
                        echo "<option value='petugas'>Petugas</option>";  // displaying data in option menu
                        echo "<option value='admin'>Admin</option>";  // displaying data in option menu
                    }elseif ($data['level']=='petugas'){
                        echo "<option value='masyarakat' >Masyarakat</option>";  // displaying data in option menu
                        echo "<option value='petugas' selected>Petugas</option>";  // displaying data in option menu
                        echo "<option value='admin'>Admin</option>";  // displaying data in option menu
                    }else{
                        echo "<option value='masyarakat' >Masyarakat</option>";  // displaying data in option menu
                        echo "<option value='petugas' >Petugas</option>";  // displaying data in option menu
                        echo "<option value='admin' selected>Admin</option>";  // displaying data in option menu
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