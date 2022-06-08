<h2>Prueba Mapa</h2>
<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<form action="" method="post">
  <div class="row">
    <div class="col-sm-4">
      <div class="form-group">
        <input type='text' name='searchAddress' class="form-control" placeholder='Enter address here' />
      </div>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary mb-3 m-1" name="buscaMapa">Busca Mapa</button>
    </div>
  </div>
</form>
-->

<?php
/*
if ($_POST) {
  // get geocode address details
  $geocodeData = getGeocodeData($_POST['searchAddress']);
  if ($geocodeData) {
    $latitude = $geocodeData[0];
    $longitude = $geocodeData[1];
    $address = $geocodeData[2];
?>
    <div id="gmap">Loading map...</div>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script type="text/javascript">
      function init_map() {
        var options = {
          zoom: 14,
          center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map($("#gmap")[0], options);
        marker = new google.maps.Marker({
          map: map,
          position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
        });
        infowindow = new google.maps.InfoWindow({
          content: "<?php echo $address; ?>"
        });
        google.maps.event.addListener(marker, "click", function() {
          infowindow.open(map, marker);
        });
        infowindow.open(map, marker);
      }
      google.maps.event.addDomListener(window, 'load', init_map);
    </script>
<?php
  } else {
    echo "Incorrect details to show map!";
  }
}*/
?>

<!-- 2ª FORMA -->
<div id="map"></div>

<!-- Script para el Mapa -->
<script src="./webroot/js/mapa.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script>