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

  if(isset($_POST['updateuser'])) {   
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $password = mysqli_real_escape_string($mysqli, md5('gempaBMKG@' . $_POST['password']));
    
    // cek jika field kosong
    if(empty($nama) || empty($password)) {

      if(empty($nama)) {
          echo "<div class='alert alert-danger' role='alert'>Nama Lengkap kosong!</div>";
      }
      
      if(empty($password)) {
          echo "<div class='alert alert-danger' role='alert'>Password kosong!</div>";
      }
    } else {
      //update/edit table database
      $result = mysqli_query($mysqli, "UPDATE users SET nama='$nama',password='$password' WHERE id=$id");
      
      //redirect ke halaman awal
      header("Location: pengguna.php");
    }
  }

  // mendapatkan id dari URL
  $id = $_GET['id'];

  // menampilkan isi database berdasarkan id
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
  while($res = mysqli_fetch_array($result))
  {
      $username = $res['username'];
      $nama = $res['nama'];
  }
?>

<h5>Ubah Pengguna Dashboard</h5>

<form action="ubah-pengguna.php" method="post" name="formubahuser">
  <div class="row">
    <div class="input-field col s12">
      <input name="username" type="text" value="<?php echo $username;?>" disabled>
      <label for="username" class="active">Username</label>
    </div>
    <div class="input-field col s12">
      <input name="nama" type="text" value="<?php echo $nama;?>">
      <label for="nama" class="active">Nama Lengkap *</label>
    </div>
    <div class="input-field col s12">
      <input name="password" type="password" class="validate" minlength="8" required>
      <label for="password" class="">Password Baru *</label>
      <span class="helper-text" data-error="salah" data-success="benar">Password minimal 8 karakter</span>
    </div>
    <input type="hidden" name="status" value="2">
    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
    <input class="orange waves-effect waves-light btn" type="submit" name="updateuser" value="Ubah Pengguna">
  </div>
</form>