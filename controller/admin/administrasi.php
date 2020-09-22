<?php 
	
	session_start();
	include("../../config/connection.php");

	// Tambah Data
	if (isset($_POST['tambahData'])) {
		$peserta 	= mysqli_real_escape_string($conn, $_POST['peserta']); 
		$harga 		= mysqli_real_escape_string($conn, $_POST['harga']); 
		$status 	= mysqli_real_escape_string($conn, $_POST['status']);
		$tgl_buat 	= date('Y-m-d H:i:s');

		$query = mysqli_query($conn, "INSERT INTO administrasi SET  id_identitas_siswa = '$peserta',
																	harga = '$harga',
																	status = '$status',
																	tgl_buat = '$tgl_buat' ") or die(mysqli_error($conn));

		if($query) {
			$_SESSION['alert'] = '<div class="alert alert-success alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Berhasil</div>
			                          Data berhasil ditambahkan.
			                        </div>
			                      </div>';
			header('Location: ../../view/administrasi/tampilData.php');
		} else {
			$_SESSION['alert'] = '<div class="alert alert-danger alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Gagal</div>
			                          Data gagal ditambahkan.
			                        </div>
			                      </div>';
			header('Location: ../../view/administrasi/tampilData.php');
		}
	}

	// Ubah Data
	if (isset($_POST['ubahData'])) {
		$id = $_POST['id'];
		$peserta 	= mysqli_real_escape_string($conn, $_POST['peserta']); 
		$harga 		= mysqli_real_escape_string($conn, $_POST['harga']); 
		$status 	= mysqli_real_escape_string($conn, $_POST['status']);
		$tgl_buat 	= date('Y-m-d H:i:s');

		$query = mysqli_query($conn, "UPDATE administrasi SET id_identitas_siswa = '$peserta',
															  harga = $harga,
															  status = '$status' 
									  					WHERE id_administrasi = '$id' ") or die(mysqli_error($conn));

		if($query) {
			$_SESSION['alert'] = '<div class="alert alert-success alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Berhasil</div>
			                          Data berhasil diubah.
			                        </div>
			                      </div>';
			header('Location: ../../view/administrasi/tampilData.php');
		} else {
			$_SESSION['alert'] = '<div class="alert alert-danger alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Gagal</div>
			                          Data gagal diubah.
			                        </div>
			                      </div>';
			header('Location: ../../view/administrasi/tampilData.php');
		}
	}

	// Hapus Data
	if (isset($_GET['hapusData'])) {
		$id = $_GET['hapusData'];

		$query = mysqli_query($conn, "DELETE FROM administrasi WHERE id_administrasi = '$id'");

		if($query) {
			$_SESSION['alert'] = '<div class="alert alert-success alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Berhasil</div>
			                          Data berhasil dihapus.
			                        </div>
			                      </div>';
			header('Location: ../../view/user/tampilData.php');
		} else {
			$_SESSION['alert'] = '<div class="alert alert-danger alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Gagal</div>
			                          Data gagal dihapus.
			                        </div>
			                      </div>';
			header('Location: ../../view/administrasi/tampilData.php');
		}
	}

?>