<?php
  session_start();
  include_once("../config.php");
  $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id ASC");
  
  // Cek user sedang login atau tidak
  if (isset( $_SESSION['username'])) {
    // sudah masuk
  } else {
    header("Location: ..");
  }
?>
<html>
  <head>  
    <title>Pengguna Dashboard | BMKG</title>
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
          <h1><span class="logo"></span>Pengguna Dashboard Gempabumi</h1>
        </div>

        <div class="row">
          <div class="col s12 admin">
            <h1>Pengguna Dashboard Gempabumi</h1>
            
            <br><a class="waves-effect waves-light btn modal-trigger" href="#modal">Tambah Pengguna</a>
            <?php include_once("tambah-pengguna.php");?>

            <table class="striped responsive-table user">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama Lengkap</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  while($resuser = mysqli_fetch_array($result)) {
                    echo "<tr><td>". $no ."</td>";
                    echo "<td>" . $resuser['username'] . "</td>";
                    echo "<td>" . $resuser['nama'] . "</td><td>";
                    pengguna($resuser['status']);
                    if ($resuser['status'] == 1) {
                      echo "</td><td><a class='orange waves-effect waves-light btn userid-$resuser[id]' href='#modal1'>Ubah</a>
                      <script>
                        $('.userid-$resuser[id]').click(function(){
                          $.ajax({
                            url: \"ubah-pengguna.php?id=$resuser[id]\",
                            success: function(result){
                              $('.ubah-pengguna').html(result);
                            }
                          });
                        });
                      </script></td></tr>";
                    } else {
                      echo "</td><td><a class='orange waves-effect waves-light btn userid-$resuser[id]' href='#modal1'>Ubah</a><br><a class='red waves-effect waves-light btn userid-$resuser[id]' href=\"hapus-pengguna.php?id=$resuser[id]\" onClick=\"return confirm('Apakah Anda yakin pengguna ini dihapus?')\">Hapus</a>
                      <script>
                        $('.userid-$resuser[id]').click(function(){
                          $.ajax({
                            url: \"ubah-pengguna.php?id=$resuser[id]\",
                            success: function(result){
                              $('.ubah-pengguna').html(result);
                            }
                          });
                        });
                      </script></td></tr>";
                    }
                    
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
          <h5>Tambah Pengguna Dashboard</h5>
          <form action="pengguna.php" method="post" name="formtambahuser">
            <div class="row">
              <div class="input-field col s12">
                <input name="username" type="text" required>
                <label for="username" class="">Username *</label>
              </div>
              <div class="input-field col s12">
                <input name="nama" type="text" required>
                <label for="nama" class="">Nama Lengkap *</label>
              </div>
              <div class="input-field col s12">
                <input name="password" type="password" class="validate" minlength="8" required>
                <label for="password" class="">Password *</label>
                <span class="helper-text" data-error="salah" data-success="benar">Password minimal 8 karakter</span>
              </div>
              <input type="hidden" name="status" value="2">
              <input class="waves-effect waves-light btn" type="submit" name="submituser" value="Tambah Pengguna">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Batal</a>
        </div>
      </div>

      <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content ubah-pengguna">
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