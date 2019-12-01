<?php
  session_start();
  include_once("../config.php");
  $result = mysqli_query($mysqli, "SELECT * FROM gempa ORDER BY id DESC");
  
  // Cek user sedang login atau tidak
  if (isset( $_SESSION['username'])) {
    // sudah masuk
  } else {
    header("Location: ..");
  }
?>
<html>
  <head>  
    <title>Dahsboard | BMKG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../style.css">
  </head>

  <body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

    <div id="container">
      <div id="menu">
        <ul id="slide-out" class="side-nav fixed">
          <li class="head-menu"><span class="logo little"></span>Dashboard Gempabumi</li>
          <li class="welcome">Selamat datang, <?php echo $_SESSION['username']; ?></li>
          <li><a href=".." target="_blank"><i class="material-icons">home</i>Halaman Utama</a></li>
          <li><a href="."><i class="material-icons">dashboard</i>Data Gempabumi Dirasakan</a></li>
          <li><a href="pengguna.php"><i class="material-icons">person_outline</i>Pengguna</a></li>
          <li><a href="../api.php" target="_blank"><i class="material-icons">rss_feed</i>XML Data API</a></li>
          <li><a href="../keluar.php"><i class="material-icons">exit_to_app</i>Keluar</a></li>
        </ul>
      </div>

      <div id="content">
        <div class="head">
          <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
          <h1><span class="logo"></span>Dashboard Gempabumi</h1>
        </div>

        <div class="row">
          <div class="col s12 admin">
            <h1>Data Gempabumi Dirasakan</h1>
            
            <br><a class="waves-effect waves-light btn modal-trigger" href="#modal">Tambah Data</a>
            <?php include_once("tambah.php");?>

            <table class="striped responsive-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Waktu</th>
                  <th>Magnitude</th>
                  <th>Kedalaman</th>
                  <th>Lokasi</th>
                  <th>Koordinat</th>
                  <th>Wilayah Dirasakan (MMI)</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  while($restable = mysqli_fetch_array($result)) {
                    echo "<tr><td>". $no ."</td>";
                    echo "<td>" . date('d-m-Y H:i:s', strtotime($restable['waktu'])) . " WIB</td>";
                    echo "<td><span class='";
                    kekuatan($restable['magnitude']);
                    echo "'>" . $restable['magnitude'] . "</span></td>";
                    echo "<td><span class='ked'>" . $restable['kedalaman'] . " km</span></td>";
                    echo "<td>" . $restable['lokasi'] . "</td><td>";
                    lintang($restable['latitude']); bujur($restable['longitude']);
                    echo "</td><td>" . $restable['dirasakan'] . "</td>";
                    echo "<td><a class='orange waves-effect waves-light btn id-$restable[id]' href='#modal1'>Ubah</a><br><a class='red waves-effect waves-light btn' href=\"hapus.php?id=$restable[id]\" onClick=\"return confirm('Apakah Anda yakin data ini dihapus?')\">Hapus</a>
                      <script>
                        $('.id-$restable[id]').click(function(){
                          $.ajax({
                            url: \"ubah.php?id=$restable[id]\",
                            success: function(result){
                              $('.ubah').html(result);
                            }
                          });
                        });
                      </script></td></tr>";
                    $no++;
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div> 

      <!-- Modal Structure -->
      <div id="modal" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h5>Tambah Data Gempabumi Dirasakan</h5>
          <form action="index.php" method="post" name="formtambah">
            <div class="row">
              <div class="input-field col s12">
                <input name="waktu" type="text" required>
                <label for="waktu" class="">Waktu *</label>
                <span class="helper-text" data-error="salah" data-success="benar">YYYY-MM-DD HH:mm:ss</span>
              </div>
              <div class="input-field col s12">
                <input name="magnitude" type="number" step="0.1" class="validate" required>
                <label for="magnitude" class="">Magnitude *</label>
              </div>
              <div class="input-field col s12">
                <input name="kedalaman" type="number" class="validate" required>
                <label for="kedalaman" class="">Kedalaman *</label>
              </div>
              <div class="input-field col s12">
                <input name="lokasi" type="text" required>
                <label for="lokasi" class="">Lokasi *</label>
              </div>
              <div class="input-field col s12">
                <input name="latitude" type="number" step="0.01" class="validate" required>
                <label for="latitude" class="">Latitude *</label>
              </div>
              <div class="input-field col s12">
                <input name="longitude" type="number" step="0.01" class="validate" required>
                <label for="longitude" class="">Longitude *</label>
              </div>
              <div class="input-field col s12">
                <textarea name="dirasakan" type="textarea" class="materialize-textarea" required></textarea>
                <label for="dirasakan" class="">Wilayah Dirasakan (MMI) *</label>
              </div>
              <input class="waves-effect waves-light btn" type="submit" name="submit" value="Tambah Data">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Batal</a>
        </div>
      </div>

      <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content ubah">
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Batal</a>
        </div>
      </div>
    </div>

    <script>
      $('.button-collapse').sideNav({
          menuWidth: 300, // Default is 300
          edge: 'left', // Choose the horizontal origin
          closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
          draggable: true // Choose whether you can drag to open on touch screens,
        }
      ); 
      $('.modal').modal();
    </script>
  </body>
</html>