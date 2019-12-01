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

  if(isset($_POST['update'])) {   
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
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
      //update/edit table database
      $result = mysqli_query($mysqli, "UPDATE gempa SET waktu='$waktu',magnitude='$magnitude',kedalaman='$kedalaman',lokasi='$lokasi',latitude='$latitude',longitude='$longitude',dirasakan='$dirasakan' WHERE id=$id");
      
      //redirect ke halaman awal
      header("Location: .");
    }
  }

  // mendapatkan id dari URL
  $id = $_GET['id'];

  // menampilkan isi database berdasarkan id
  $result = mysqli_query($mysqli, "SELECT * FROM gempa WHERE id=$id");
  while($res = mysqli_fetch_array($result))
  {
      $waktu = $res['waktu'];
      $magnitude = $res['magnitude'];
      $kedalaman = $res['kedalaman'];
      $lokasi = $res['lokasi'];
      $latitude = $res['latitude'];
      $longitude = $res['longitude'];
      $dirasakan = $res['dirasakan'];
  }
?>

<h5>Edit Data Gempabumi Dirasakan</h5>

<form action="ubah.php" method="post" name="formedit">
  <div class="row">
    <div class="input-field col s12">
      <input name="waktu" type="text" value="<?php echo $waktu;?>" required>
      <label for="waktu" class="active">Waktu *</label>
      <span class="helper-text" data-error="salah" data-success="benar">YYYY-MM-DD HH:mm:ss</span>
    </div>
    <div class="input-field col s12">
      <input name="magnitude" type="number" step="0.1" class="validate" value="<?php echo $magnitude;?>" required>
      <label for="magnitude" class="active">Magnitude *</label>
    </div>
    <div class="input-field col s12">
      <input name="kedalaman" type="number" class="validate" value="<?php echo $kedalaman;?>" required>
      <label for="kedalaman" class="active">Kedalaman *</label>
    </div>
    <div class="input-field col s12">
      <input name="lokasi" type="text" value="<?php echo $lokasi;?>" required>
      <label for="lokasi" class="active">Lokasi *</label>
    </div>
    <div class="input-field col s12">
      <input name="latitude" type="number" step="0.01" class="validate" value="<?php echo $latitude;?>" required>
      <label for="latitude" class="active">Latitude *</label>
    </div>
    <div class="input-field col s12">
      <input name="longitude" type="number" step="0.01" class="validate" value="<?php echo $longitude;?>" required>
      <label for="longitude" class="active">Longitude *</label>
    </div>
    <div class="input-field col s12">
      <input name="dirasakan" type="text" value="<?php echo $dirasakan;?>" required></input>
      <label for="dirasakan" class="active">Wilayah Dirasakan (MMI) *</label>
    </div>
    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
    <input class="waves-effect waves-light btn orange" type="submit" name="update" value="Ubah Data">
  </div>
</form>