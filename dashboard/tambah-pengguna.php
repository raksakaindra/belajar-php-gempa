<?php
  // file tambah-pengguna.php
  if(isset($_POST['submituser'])) {
    $username = mysqli_real_escape_string($mysqli, strtolower($_POST['username']));
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $password = mysqli_real_escape_string($mysqli, md5('gempaBMKG@' . $_POST['password']));
    $status = mysqli_real_escape_string($mysqli, $_POST['status']);
        
    // cek jika field kosong
    if(empty($username) || empty($nama) || empty($password)) {
                
      if(empty($username)) {
          echo "<div class='alert alert-danger' role='alert'>username kosong!</div>";
      }

      if(empty($nama)) {
          echo "<div class='alert alert-danger' role='alert'>Nama Lengkap kosong!</div>";
      }
      
      if(empty($password)) {
          echo "<div class='alert alert-danger' role='alert'>Password kosong!</div>";
      }
    } else {
      // jika field tidak kosong maka insert database   
      $result = mysqli_query($mysqli, "INSERT INTO users(username,nama,password,status) VALUES('$username','$nama','$password','$status')");
      
      // tampilan sukses
      echo "<script>window.open('pengguna.php','_self')</script>";
    }
  }
?>