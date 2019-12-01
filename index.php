<?php
  include_once("config.php");
  $result = mysqli_query($mysqli, "SELECT * FROM gempa ORDER BY id DESC LIMIT 30");
?>
<html>
  <head>  
    <title>30 Gempabumi Dirasakan | BMKG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="leaflet.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <div id="container">
      <div id="menu">
        <ul id="slide-out" class="side-nav fixed">
          <li class="head-menu"><span class="logo little"></span>30 Gempabumi Dirasakan</li>
          <?php
            $mm = 1;
            while($resmenu = mysqli_fetch_array($result)) {
              echo "<li class='marker-menu'><a id='marker_" . $mm . "' href='#!'><span class='mag ";
              kekuatan($resmenu['magnitude']);
              echo "'>M " . $resmenu['magnitude'] . "</span><p class='tgl'>" . date('d-m-Y H:i:s', strtotime($resmenu['waktu'])) . " WIB<em>" . $resmenu['kedalaman'] ." km</em></p><p class='lok'>" . $resmenu['lokasi'] . "</p></a></li>";
              $mm++;
            }
            mysqli_data_seek($result, 0);
          ?>
          <li class="footer-menu">&#169; <?php echo date('Y');?> &mdash; BMKG</li>
        </ul>
      </div>

      <div id="content">
        <div class="head">
          <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
          <h1><span class="logo"></span>30 Gempabumi Dirasakan</h1>
        </div>
        <div id="map"></div> 
      </div>  
    </div>
    
    <script src="leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script>
      $('.button-collapse').sideNav({
          menuWidth: 300, // Default is 300
          edge: 'left', // Choose the horizontal origin
          closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
          draggable: true // Choose whether you can drag to open on touch screens,
        }
      ); 

      var map = L.map('map').setView([-2.4086343,118.545564], 5);

      L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}').addTo(map);
   
      var gempa_green = L.icon({
        iconUrl: 'img/green.png',
        iconSize: [24, 24],
        iconAnchor: [12, 12]
      });

      var gempa_orange = L.icon({
        iconUrl: 'img/orange.png',
        iconSize: [30, 30],
        iconAnchor: [15, 15]
      });

      var gempa_red = L.icon({
        iconUrl: 'img/red.png',
        iconSize: [36, 36],
        iconAnchor: [18, 18]
      });

      var markers = [];
      
      <?php
        $m = 1;
        while($resmap = mysqli_fetch_array($result)) {
          echo "var marker" . $m . " = L.marker([" . $resmap['latitude'] . "," . $resmap['longitude'] . "], {title:'marker_" . $m . "', icon:";
          kekuatan($resmap['magnitude']);
          echo "}).bindPopup('" . date('d-m-Y H:i:s', strtotime($resmap['waktu'])) . " WIB<br>Magnitude: <strong>" . $resmap['magnitude'] . "</strong> | Kedalaman: <strong>" . $resmap['kedalaman'] . " km</strong><br>" . $resmap['lokasi'] . " (<strong>";
          lintang($resmap['latitude']); bujur($resmap['longitude']);
          echo "</strong>)<br>Wilayah Dirasakan (MMI):<br><strong>" . $resmap['dirasakan'] . "</strong>').addTo(map); ";
          echo "markers.push(marker" . $m . "); ";
          $m++;
        }
      ?>

      var featureGroup = L.featureGroup(markers).addTo(map);
      map.fitBounds(featureGroup.getBounds());

      function markerFunction(id){
        for (var i in markers){
          var markerID = markers[i].options.title;
          if (markerID == id){
            markers[i].openPopup();
          };
        }
      }

      $(".marker-menu a").click(function(){
        markerFunction($(this)[0].id);
      });
    </script>
  </body>
</html>