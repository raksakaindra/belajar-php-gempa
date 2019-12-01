<?php
	include_once("config.php");
	$result = mysqli_query($mysqli, "SELECT * FROM gempa ORDER BY id DESC LIMIT 30");
  
  // Wajib, untuk identitas di browser agar ditampilkan dalam format XML
  header('Content-Type: text/xml');

  // Memulai awal tag data XML
  echo "<?xml version='1.0' encoding='UTF-8' ?>";
  echo "<gempa_dirasakan>";
  echo "<name>30 Gempa Dirasakan</name>";
  echo "<copyright>&#169; ". date('Y') ." &#8212; BMKG</copyright>";
  while($resapi = mysqli_fetch_array($result)) {
  	echo "<gempa>";
  	echo "<waktu>" . date('d-m-Y H:i:s', strtotime($resapi['waktu'])) . " WIB</waktu>";
    echo "<magnitude>" . $resapi['magnitude'] . "</magnitude>";
    echo "<kedalaman>" . $resapi['kedalaman'] . " km</kedalaman>";
    echo "<lokasi>" . $resapi['lokasi'] . "</lokasi>";
    echo "<latlon>" . $resapi['latitude'] . "," . $resapi['longitude'] . "</latlon><koordinat>";
    lintang($resapi['latitude']); bujur($resapi['longitude']);
    echo "</koordinat><dirasakan>" . $resapi['dirasakan'] . "</dirasakan>";
    echo "</gempa>";
  }
  echo "</gempa_dirasakan>";
?>