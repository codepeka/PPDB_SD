<!-- Header -->
<?php
	$title = "Cetak Kartu"; // Judulnya
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
          <!-- <div class="card-header">
            <a href="cetakData.php" type="button" class="btn btn-primary daterange-btn icon-left btn-icon">
              <i class="fas fa-print"></i> Cetak Data Formulir 
            </a>
          </div> -->
          <div class="card-body">

            <!-- tabelnya -->
            <div class="table-responsive" >
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center"> # </th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Status Pembayaran</th>
                    <th>Tanggal</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  	include('../../config/connection.php');

                    $no = 1;
                    $data = mysqli_query($conn, "SELECT a.*, b.NISN, b.Nama_Peserta_Didik, b.Id_Identitas_Siswa FROM administrasi a 
                                                      RIGHT JOIN identitas_siswa b 
                                                      ON a.id_identitas_siswa = b.Id_Identitas_Siswa") or die(mysqli_error($conn));
                    foreach ($data as $row) { 
                  ?>
                  <tr>
                  	<td><?= $no++; ?></td>
                  	<td><?= $row['NISN']; ?></td>
                  	<td><?= $row['Nama_Peserta_Didik']; ?></td>
                  	<td><?php if ($row['harga'] == NULL) { echo '-'; } echo $row['harga']; ?></td>
                  	<td><?php if ($row['status'] == NULL) { echo 'Belum Lunas'; } echo $row['status']; ?></td>
                  	<td><?php if ($row['tgl_ubah'] == NULL) { echo '-'; } echo $row['tgl_ubah']; ?></td>              	
                    <td class="text-center" width="120px">
                      <!-- <a href="#" class="btn btn-success my-2" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-eye"></i></a> -->
                      <a href="#" class="btn btn-primary" onclick="cetak(<?= $row['NISN']; ?>)"><i class="fas fa-print"></i></a>
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

  function cetak(id) {
    window.open("index.php?id=" + id, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=100,width=900,height=460");
  }
</script>

<!-- Penutup Isinya -->



<!-- Footer -->
<?php require("../template/footer.php");?>