<?php 
	
	session_start();
	include("../../config/connection.php");

	// Tambah Data
	if (isset($_POST['tambahData'])) {
		$nama = mysqli_real_escape_string($conn, $_POST['nama']); 
		$username = mysqli_real_escape_string($conn, $_POST['username']); 
		$password = mysqli_real_escape_string($conn, $_POST['password']); 
		$hak = mysqli_real_escape_string($conn, $_POST['hak']); 
		$status = "aktif"; 
		$tgl_buat = date('Y-m-d H:i:s');

		$query = mysqli_query($conn, "INSERT INTO user SET  nama = '$nama',
															username = '$username',
															password = '$password',
															hak = '$hak',
															status = '$status',
															tgl_buat = '$tgl_buat' ");

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
			header('Location: ../../view/user/tampilData.php');
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
			header('Location: ../../view/user/tampilData.php');
		}
	}

	// Ubah Data
	if (isset($_POST['ubahData'])) {
		$id = $_POST['id'];
		$nama = mysqli_real_escape_string($conn, $_POST['nama']); 
		$username = mysqli_real_escape_string($conn, $_POST['username']); 
		$password = mysqli_real_escape_string($conn, $_POST['password']); 
		$hak = mysqli_real_escape_string($conn, $_POST['hak']); 

		$query = mysqli_query($conn, "UPDATE user SET  nama = '$nama',
															username = '$username',
															password = '$password',
															hak = '$hak' 
									  WHERE id = '$id' ");

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
			header('Location: ../../view/user/tampilData.php');
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
			header('Location: ../../view/user/tampilData.php');
		}
	}

	// Hapus Data
	if (isset($_GET['hapusData'])) {
		$id = $_GET['hapusData'];

		$query = mysqli_query($conn, "DELETE FROM user WHERE id = $id");

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
			header('Location: ../../view/user/tampilData.php');
		}
	}

?>