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
            <h1 class="m-0">Data Pengaduan Masyarakat</h1>
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
      <?php  if ($_SESSION['level']=="masyarakat"){?>
        <a href="tambah.php"><button type="button" class="btn btn-block btn-primary ">Tambah Data</button></a>
        <?php } ?>
        
</div>
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Tanggal Pengaduan</th>
                      <th>Isi Laporan</th>
                      <th>Foto</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    if ($_SESSION['level']=="masyarakat"){
                    $data = mysqli_query($koneksi,"select * from pengaduan where nik='$nik'");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
				              <td><?php echo $d['tgl_pengaduan']; ?></td>
                      <td><?php echo $d['isi_laporan']; ?></td>
                      <td style="text-align: center;"><img src="gambar/<?php echo $d['foto']; ?>" style="width: 120px;">
                      <br><?php echo $d['foto']; ?></br></td>
                      <td><?php echo $d['status']; ?></td>
                      <td>
                      <?php  if ($d['status']=="0"){?>
                      <a href="edit.php?id=<?php echo $d['id_pengaduan']; ?>"><button type="button" class="btn btn-block btn-warning "><i class="fa fa-pencil-alt"></i></button></a>
                      <a href="proses_hapus_pengaduan.php?id=<?php echo $d['id_pengaduan']; ?>" onclick="return confirm('Hapus data ini ?')"> <button type="button" class="btn btn-block btn-danger "><i class="fa fa-trash-alt"></i></button></a>
                      <?php } ?>
                      
                        <a href="detail_pengaduan.php?id=<?php echo $d['id_pengaduan']; ?>">  <button type="button" class="btn btn-block btn-info "><i class="fa fa-file-alt"></i></button></a>
                      
                      </td>
                    </tr>
                    <?php 
		                    }}else{
                          $data = mysqli_query($koneksi,"select * from pengaduan ");
                          while($d = mysqli_fetch_array($data)){
                          ?>
                           <tr>
                      <td><?php echo $no++; ?></td>
				              <td><?php echo $d['tgl_pengaduan']; ?></td>
                      <td><?php echo $d['isi_laporan']; ?></td>
                      <td style="text-align: center;"><img src="gambar/<?php echo $d['foto']; ?>" style="width: 120px;">
                      <br><?php echo $d['foto']; ?></br></td>
                      <td><?php echo $d['status']; ?></td>
                      <td>
                        
                      <?php 
                      if ($_SESSION['level']=="masyarakat"){
                      if ($d['status']=="0"){?>
                      <a href="edit.php?id=<?php echo $d['id_pengaduan']; ?>"><button type="button" class="btn btn-block btn-warning "><i class="fa fa-pencil-alt"></i></button></a>
                      <a href="proses_hapus_pengaduan.php?id=<?php echo $d['id_pengaduan']; ?>" onclick="return confirm('Hapus data ini ?')"> <button type="button" class="btn btn-block btn-danger "><i class="fa fa-trash-alt"></i></button></a>
                      <?php } ?>
                      
                        <a href="detail_pengaduan.php?id=<?php echo $d['id_pengaduan']; ?>">  <button type="button" class="btn btn-block btn-info "><i class="fa fa-file-alt"></i></button></a>
                      
                      </td>
                    </tr>
                          <?php
                        }else{ ?>
                          <a href="edit_status.php?id=<?php echo $d['id_pengaduan']; ?>"><button type="button" class="btn btn-block btn-warning "><i class="fa fa-pencil-alt"></i></button></a>
                      <a href="proses_hapus_pengaduan.php?id=<?php echo $d['id_pengaduan']; ?>" onclick="return confirm('Hapus data ini ?')"> <button type="button" class="btn btn-block btn-danger "><i class="fa fa-trash-alt"></i></button></a>
                      <a href="detail_pengaduan.php?id=<?php echo $d['id_pengaduan']; ?>">  <button type="button" class="btn btn-block btn-info "><i class="fa fa-file-alt"></i></button></a>
                        <?php } } }
		                  ?>
                  </tbody>
                </table>
              </div>
<?php
include 'footer.php';
?>