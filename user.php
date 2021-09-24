<?php 
include 'koneksi.php';


session_start();
if($_SESSION['status']!="login"){
	header("location:login.php");
}
$username = $_SESSION['username'];
$level = $_SESSION['level'];
$nik = $_SESSION['nik'];

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
            <h1 class="m-0">Data User</h1>
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
        <div class="col-2">
          
        <a href="tambah_user.php"><button type="button" class="btn btn-block btn-primary ">Tambah User</button></a>
        
</div>
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Telepon</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $no = 1;
                   
                    $data = mysqli_query($koneksi,"select * from user ");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
				              <td><?php echo $d['nik']; ?></td>
                      <td><?php echo $d['nama']; ?></td>
                      <td><?php echo $d['username']; ?></td>
                      <td><?php echo $d['password']; ?></td>
                      <td><?php echo $d['telp']; ?></td>
                      <td><?php echo $d['level']; ?></td>
                      <td>
                      
                      <a href="edit_user.php?id=<?php echo $d['id_user']; ?>"><button type="button" class="btn btn-block btn-warning "><i class="fa fa-pencil-alt"></i></button></a>
                      <a href="proses_hapus_user.php?id=<?php echo $d['id_user']; ?>">  <button type="button" class="btn btn-block btn-danger "><i class="fa fa-trash-alt"></i></button></a>
                        
                      
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
<?php
include 'footer.php';
?>