<!-- Header -->
<?php
	$title = "Data Siswa"; // Judulnya
	require("../template/header.php"); // include headernya
?>



<!-- Isinya -->

<section class="section">
  <div class="section-header">
    <h1><?= $title; ?></h1>
  </div>

  <?php
  	if (isset($_SESSION['alert'])) {
  		echo $_SESSION['alert'];
  		unset($_SESSION['alert']);
  	}
  ?>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- <h4>Basic DataTables</h4> -->
            <a href="tambahData.php" type="button" class="btn btn-primary daterange-btn icon-left btn-icon">
              <i class="fas fa-plus"></i> Tambah Data Siswa 
            </a>
          </div>
          <div class="card-body">

            <!-- tabelnya -->
            <div class="table-responsive" >
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center"> # </th>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Tanggal Buat</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  	include('../../config/connection.php');

                    $no = 1;
                    $data = mysqli_query($conn, "SELECT Id_Identitas_Siswa, NISN, Nama_Peserta_Didik, Tanggal_Lahir, Alamat_Tinggal, tgl_ubah FROM identitas_siswa") or die(mysqli_error($conn));
                    foreach ($data as $row) { 
                  ?>
                  <tr>
                  	<td><?= $no++; ?></td>
                  	<td><?= $row['NISN']; ?></td>
                  	<td><?= $row['Nama_Peserta_Didik']; ?></td>
                  	<td><?= $row['Tanggal_Lahir']; ?></td>
                  	<td><?= $row['Alamat_Tinggal']; ?></td>
                  	<td><?= $row['tgl_ubah']; ?></td>              	
                    <td class="text-center" width="120px">
                      <a href="ubahData.php?id=<?= $row['Id_Identitas_Siswa']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                      <a href="../../controller/admin/siswa.php?hapusData=<?= $row['Id_Identitas_Siswa']; ?>" class="btn btn-danger my-2" onclick="return confirm('Anda Yakin');"><i class="fas fa-trash"></i></a>
                  	</td>
                  </tr>
              	  <?php } ?>
                </tbody>
              </table>
            <!-- penutup tabelnya -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
	$(document).ready(function(){
		$('#table-1').DataTable();
	});
</script>

<!-- Penutup Isinya -->



<!-- Footer -->
<?php require("../template/footer.php");?>