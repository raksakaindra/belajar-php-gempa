<?php
  // file tambah.php
  if(isset($_POST['submit'])) {   
    $waktu = mysqli_real_escape_string($mysqli, $_POST['waktu']);
    $magnitude = mysqli_real_escape_string($mysqli, $_POST['magnitude']);
    $kedalaman = mysqli_real_escape_string($mysqli, $_POST['kedalaman']);
    $lokasi = mysqli_real_escape_string($mysqli, $_POST['lokasi']);
    $latitude = mysqli_real_escape_string($mysqli, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($mysqli, $_POST['longitude']);
    $dirasakan = mysqli_real_escape_string($mysqli, $_POST['dirasakan']);
        
    // cek jika field kosong
    if(empty($waktu) || empty($magnitude) || empty($kedalaman) || empty($lokasi) || empty($latitude) || empty($longitude) || empty($dirasakan)) {
                
      if(empty($waktu)) {
          echo "<div class='alert alert-danger' role='alert'>Waktu kosong!</div>";
      }

      if(empty($magnitude)) {
          echo "<div class='alert alert-danger' role='alert'>Magnitude kosong!</div>";
      }
      
      if(empty($kedalaman)) {
          echo "<div class='alert alert-danger' role='alert'>Kedalaman kosong!</div>";
      }

      if(empty($lokasi)) {
          echo "<div class='alert alert-danger' role='alert'>Lokasi kosong!</div>";
      }

      if(empty($latitude)) {
          echo "<div class='alert alert-danger' role='alert'>Latitude kosong!</div>";
      }

      if(empty($longitude)) {
          echo "<div class='alert alert-danger' role='alert'>Longitude kosong!</div>";
      }

      if(empty($dirasakan)) {
          echo "<div class='alert alert-danger' role='alert'>Wilayah Dirasakan (MMI) kosong!</div>";
      }
    } else {
      // jika field tidak kosong maka insert database   
      $result = mysqli_query($mysqli, "INSERT INTO gempa(waktu,magnitude,kedalaman,lokasi,latitude,longitude,dirasakan) VALUES('$waktu','$magnitude','$kedalaman','$lokasi','$latitude','$longitude','$dirasakan')");
      
      // tampilan sukses
      echo "<script>window.open('.','_self')</script>";
    }
  }
?>