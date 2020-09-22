<!-- Header -->
<?php
	$title = "Pengguna"; // Judulnya
	require("../template/header.php"); // include headernya

  if ($_SESSION['hak'] != 'admin') {
    echo "<script>window.location.href = '../../view/home/index.php';</script>";
  }
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
              <i class="fas fa-plus"></i> Tambah Data Pengguna 
            </a>
          </div>
          <div class="card-body">

            <!-- tabelnya -->
            <div class="table-responsive" >
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center"> # </th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Hak</th>
                    <th>Status</th>
                    <th>Tanggal Ubah</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  	include('../../config/connection.php');

                    $no = 1;
                    $data = mysqli_query($conn, "SELECT * FROM user") or die(mysqli_error($conn));
                    foreach ($data as $row) { 
                  ?>
                  <tr>
                  	<td><?= $no++; ?></td>
                  	<td><?= $row['nama']; ?></td>
                  	<td><?= $row['username']; ?></td>
                  	<td><?= $row['hak']; ?></td>
                  	<td><?= $row['status']; ?></td>
                  	<td><?= $row['tgl_ubah']; ?></td>              	
                    <td class="text-center" width="120px">
                      <!-- <a href="#" class="btn btn-success my-2" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-eye"></i></a> -->
                      <a href="ubahData.php?id=<?= $row['id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                      <a href="../../controller/admin/user.php?hapusData=<?= $row['id']; ?>" class="btn btn-danger my-2" onclick="return confirm('Anda Yakin');"><i class="fas fa-trash"></i></a>
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

<!-- Modalnya -->
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="needs-validation" novalidate="">
        <div class="modal-body">
          <div class="form-group">
            <label>Your Name</label>
            <input type="text" class="form-control" required="" minlength="8">
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Minimal 8 kata</div>
            <!-- End Validation -->
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" required="" minlength="6">
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Minimal 6 kata</div>
            <!-- End Validation -->
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" required="" minlength="6">
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Minimal 6 kata </div>
            <!-- End Validation -->
          </div>
          <div class="form-group mb-0">
            <label>Hak</label>
            <select class="form-control" required="">
              <option value=""> ~~~ PILIH HAK AKSESNYA DONG ~~~ </option>
              <option value="admin">Admin</option>
              <option value="owner">Owner</option>
              <option value="karyawan">Karyawan</option>
            </select>
            <!-- Validation -->
            <div class="valid-feedback"> Good job! </div>
            <div class="invalid-feedback"> Wajib Diisi! </div>
            <!-- End Validation -->
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- penutup ModalNya -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#table-1').DataTable();
	});
</script>

<!-- Penutup Isinya -->



<!-- Footer -->
<?php require("../template/footer.php");?>