<?php
  session_start();
  include_once("config.php");
?>
<html>
  <head>  
    <title>Dahsboard | BMKG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
  </head>

  <body class="login">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    
    <div id="content">
      <img src="img/logo-bmkg-white.svg">
      <div class="login-form">
        <h1></span>Dashboard Gempabumi</h1>
        <form action="masuk.php" method="post" name="formlogin">
          <div class="row">
            <div class="input-field col s12">
              <input name="username" type="text">
              <label for="username" class="">Username</label>
            </div>
            <div class="input-field col s12">
              <input name="password" type="password" class="validate">
              <label for="password" class="">Password</label>
            </div>
            <input class="waves-effect waves-light btn" type="submit" name="login" value="Masuk">
          </div>
        </form>
        <?php
          if(isset($_POST['login'])) {
            $username = mysqli_real_escape_string($mysqli, $_POST['username']);
            $password = mysqli_real_escape_string($mysqli, md5('gempaBMKG@' . $_POST['password']));

            if ($username != "" && $password != "") {
              $query = mysqli_query($mysqli, "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "'");
              $count = mysqli_num_rows($query);

              if($count > 0) {
                $_SESSION['username'] = $_POST['username'];
                echo "<script>window.open('dashboard','_self')</script>";
              } else {
                echo "<div class='alert alert-danger' role='alert'>Username atau password tidak sesuai!</div>";
              }
            }
          }
        ?>
      </div>
    </div>
  </body>
</html>
