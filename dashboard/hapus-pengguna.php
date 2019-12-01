<?php
	session_start();
	// include file koneksi database
	include_once("../config.php");

	// Cek user sedang login atau tidak
  if (isset( $_SESSION['username'])) {
    // sudah masuk
  } else {
    header("Location: ..");
  }

	// mendapatkan id dari baris yang akan dihapus
	$id = $_GET["id"];

	// hapus baris dari table database
	$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");

	//redirect ke halaman awal
	header("Location: pengguna.php");
?>