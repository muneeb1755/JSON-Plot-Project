<?php 
require ('db.php');
?>
<?php
//Searching Data for Update
if(isset($_GET['id']))
{
$id = $_GET['id'];

// read json file
$data = file_get_contents('file1.json');
// // decode json to associative array
$json_arr = json_decode($data, true);
//array search method for multidimensional array
$key = array_search($id, array_column($json_arr, 'id'));
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">

    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script src="view.php"></script> 
</head>
<div class="container">
<div class="card mb-3" >
  <div class="row g-0">
    <div class="col-md-8">
    <div id="googleMap" style="width:100%;height:500px;"></div>
    </div>    
    <div class="col-md-4 scroll">
      <div class="card-body">
        <h5 class="card-title">Plot Details</h5>
            
        <ul class="list-group list-group-flush">
        
<label>ID</label>    
<li class="list-group-item" ><?php echo $json_arr[$key]['id']; ?></li>
<label>Unique ID</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['szPlotIdUniqueKey']; ?></li>
  <label>Price</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['fPrice']; ?></li>
  <label>Row</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['szRow']; ?></li>
  <label>Plot</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['szPlot']; ?></li>
  <label>Lot</label>
  <li class="list-group-item" ><?php echo $json_arr[$key]['szLot']; ?></li>
  <label>Latitude</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['szCentroidLatitude']; ?></li>
  <label>Longitude</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['szCentroidLongtitude']; ?></li>
  <label>Centroid Northing</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['szCentroidNorthing']; ?></li>
  <label>Centroid Easting</label>	
  <li class="list-group-item"><?php echo $json_arr[$key]['szCentroidEasting']; ?></li>
  <label>NE Corner Latitude</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['szNECornerLatitude']; ?></li>
  <label>NE Corner Longitude</label>  
  <li class="list-group-item"><?php echo $json_arr[$key]['szNECornerLongitude']; ?></li>
  <label>NW Corner Latitude</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['szNWCornerLatitude']; ?></li>
  <label>NW Corner Logitude</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['szNWCornerLongitude']; ?></li>
  <label>SE Corner Latitude</label>
  <li class="list-group-item" ><?php echo $json_arr[$key]['szSECornerLatitude']; ?></li>
  <label>SE Corner Logitude</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['szSECornerLongitude']; ?></li>
  <label>SW Corner Latitude</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['szSWCornerLatitude']; ?></li>
  <label>SW Corner Logitude</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['szSWCornerLongitude']; ?></li>
  <label>Boundary wall</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['boundaryPlot']; ?></li>
  <label>Corner Plot</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['cornerPlot']; ?></li>
  <label>Price with Tax</label>
  <li class="list-group-item"><?php echo $json_arr[$key]['PriceWithTax']; ?></li>
</ul>
      </div>
      </div>
    </div>
  </div>
<div class="ist-group list-group-flush" style="width: 18rem;" allign="right">
</div>
</div>
<script>
function myMap() {
    $lat=<?php echo $json_arr[$key]['szCentroidLatitude']; ?>;
    
$lan=<?php echo $json_arr[$key]['szCentroidLongtitude']; ?>;
var mapProp= {
  center:new google.maps.LatLng($lat,$lan),
  zoom:15,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtvVsPv-HWcKmbBJ0f6xtmoW0GTZC0wY0&callback=myMap"></script>
  

</body>
</html> 
