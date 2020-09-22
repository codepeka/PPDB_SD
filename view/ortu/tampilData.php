<!-- Header -->
<?php
	$title = "Data Orang Tua"; // Judulnya
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
              <i class="fas fa-plus"></i> Tambah Data Orang Tua 
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
                    <th>Nama Peserta</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Nama Wali</th>
                    <th>Tanggal Buat</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  	include('../../config/connection.php');

                    $no = 1;
                    $data = mysqli_query($conn, "SELECT NISN, Id_Orang_Tua_Wali, Nama_Peserta_Didik, Nama_Ayah, Nama_Ibu, Nama_Wali, a.tgl_ubah FROM orang_tua_wali a LEFT JOIN identitas_siswa b ON a.Id_Identitas_Siswa = b.Id_Identitas_Siswa") or die(mysqli_error($conn));
                    foreach ($data as $row) { 
                  ?>
                  <tr>
                  	<td><?= $no++; ?></td>
                  	<td><?= $row['NISN']; ?></td>
                    <td><?= $row['Nama_Peserta_Didik']; ?></td>
                  	<td><?= $row['Nama_Ayah']; ?></td>
                  	<td><?= $row['Nama_Ibu']; ?></td>
                    <td><?= $row['Nama_Wali']; ?></td>
                  	<td><?= $row['tgl_ubah']; ?></td>              	
                    <td class="text-center" width="120px">
                      <a href="ubahData.php?id=<?= $row['Id_Orang_Tua_Wali']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                      <a href="../../controller/admin/ortu.php?hapusData=<?= $row['Id_Orang_Tua_Wali']; ?>" class="btn btn-danger my-2" onclick="return confirm('Anda Yakin');"><i class="fas fa-trash"></i></a>
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