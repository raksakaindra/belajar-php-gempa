<?php
  // menggunakan mysqli_connect untuk koneksi database

  $databaseHost = 'localhost';
  $databaseName = 'gempabumi';
  $databaseUsername = 'root';
  $databasePassword = 'root';

  $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

  if ($mysqli->ping()) {
      //printf ("Our connection is ok!\n");
  } else {
      //printf ("Error: %s\n", $mysqli->error);
  }

  function kekuatan($mag) {
    if ($mag <= 4.5) {
      echo "gempa_green";
    } else if ($mag > 4.5 && $mag <= 5.5) {
      echo "gempa_orange";
    } else {
      echo "gempa_red";
    }
  }

  function lintang($lt) {
    if ($lt < 0) {
      echo str_replace('-', '', $lt) . " LS ";
    } else {
      echo $lt . " LU ";
    }
  }

  function bujur($bj) {
    if ($bj > 0) {
      echo $bj . " BT";
    } else {
      echo str_replace('-', '', $bj) . " BB ";
    }
  }

  function pengguna($usr) {
    if ($usr == 1) {
      echo "Super Admin";
    } else {
      echo "Admin";
    }
  }
?>