
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
echo $json_arr[$key]['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Update Data in Jason File</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">Wellcome</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="JsonTable.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Insert.php">Create</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="update.php">Update</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="delete.php">Delete</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="width:500px;">
     <h4 align="">Update Data in Jason File</h4><br />
     
     <form method="post">
         <label>ID</label>
         <input type="text" name="id" class="form-control"  value ="<?php echo $json_arr[$key]['id']; ?>" /><br />
         <label>Unique ID</label>
		 <input type="text" name="szPlotIdUniqueKey" class="form-control" value ="<?php echo $json_arr[$key]['szPlotIdUniqueKey']; ?>" /><br />
		 <label>Price</label>
         <input type="text" name="fPrice" class="form-control" value ="<?php echo $json_arr[$key]['fPrice']; ?>" /><br />    
		 <label>Row</label>
         <input type="text" name="szRow" class="form-control" value ="<?php echo $json_arr[$key]['szRow']; ?>" /><br />
		 <label>Plot</label>
         <input type="text" name="szPlot" class="form-control" value ="<?php echo $json_arr[$key]['szPlot']; ?>" /><br />
		 <label>Lot</label>
         <input type="text" name="szLot" class="form-control" value ="<?php echo $json_arr[$key]['szLot']; ?>" /><br />
		 <label>Latitude</label>
         <input type="text" name="szCentroidLatitude" class="form-control" value ="<?php echo $json_arr[$key]['szCentroidLatitude']; ?>" /><br />
		 <label>Longitude</label>
         <input type="text" name="szCentroidLongtitude" class="form-control" value ="<?php echo $json_arr[$key]['szCentroidLongtitude']; ?>" /><br />
		 <label>Centroid Northing</label>
         <input type="text" name="szCentroidNorthing" class="form-control" value ="<?php echo $json_arr[$key]['szCentroidNorthing']; ?>" /><br />
		 <label>Centroid Easting</label>
         <input type="text" name="szCentroidEasting" class="form-control" value ="<?php echo $json_arr[$key]['szCentroidEasting']; ?>" /><br />
		 <label>NE Corner Latitude</label>
         <input type="text" name="szNECornerLatitude" class="form-control" value ="<?php echo $json_arr[$key]['szNECornerLatitude']; ?>" /><br />
		 <label>NE Corner Longitude</label>
         <input type="text" name="szNECornerLongitude" class="form-control" value ="<?php echo $json_arr[$key]['szNECornerLongitude']; ?>" /><br /> 
		 <label>NW Corner Latitude</label>
         <input type="text" name="szNWCornerLatitude" class="form-control" value ="<?php echo $json_arr[$key]['szNWCornerLatitude']; ?>" /><br />
		 <label>NW Corner Logitude</label>
         <input type="text" name="szNWCornerLongitude" class="form-control" value ="<?php echo $json_arr[$key]['szNWCornerLongitude']; ?>" /><br />
		 <label>SE Corner Latitude</label>
         <input type="text" name="szSECornerLatitude" class="form-control" value ="<?php echo $json_arr[$key]['szSECornerLatitude']; ?>" /><br />
		 <label>SE Corner Logitude</label>
         <input type="text" name="szSECornerLongitude" class="form-control" value ="<?php echo $json_arr[$key]['szSECornerLongitude']; ?>" /><br />
		 <label>SW Corner Latitude</label>
         <input type="text" name="szSWCornerLatitude" class="form-control" value ="<?php echo $json_arr[$key]['szSWCornerLatitude']; ?>" /><br />
		 <label>SW Corner Logitude</label>
         <input type="text" name="szSWCornerLongitude" class="form-control" value ="<?php echo $json_arr[$key]['szSWCornerLongitude']; ?>" /><br />
		 <label>Boundary wall</label>
         <input type="text" name="boundaryPlot" class="form-control" value ="<?php echo $json_arr[$key]['boundaryPlot']; ?>" /><br />
         <label>Corner Plot</label>
		 <input type="text" name="cornerPlot" class="form-control" value ="<?php echo $json_arr[$key]['cornerPlot']; ?>" /><br />
		 <label>Price with Tax</label>
         <input type="text" name="PriceWithTax" class="form-control" value ="<?php echo $json_arr[$key]['PriceWithTax']; ?>" /><br />    
		 <input type="submit" name="submit" value="Update" class="btn btn-info" /><br />		
		</form>
        <?php }?>
        </div>
<?php
if(isset($_POST['submit']))
{
  $id = $_POST['id'];
// read json file
$data = file_get_contents('file1.json');
// // decode json to associative array
$json_arr = json_decode($data, true);
//array search method for multidimensional array
$key = array_search($id, array_column($json_arr, 'id'));
$json_arr[$key]['id']=$_POST['id'];
$json_arr[$key]['szPlotIdUniqueKey']=$_POST['szPlotIdUniqueKey'];
$json_arr[$key]['fPrice']=$_POST['fPrice'];
$json_arr[$key]['szRow']=$_POST['szRow'];
$json_arr[$key]['szPlot']=$_POST['szPlot'];
$json_arr[$key]['szLot']=$_POST['szLot'];  
$final_data=json_encode($json_arr);
if(file_put_contents('file1.json', $final_data))
  {
       $message = "<label class='text-success'>Data added Success fully</p>";
  }
}

?>
<?php

function fileWriteAppend(){
$current_data = file_get_contents('file1.json');
$array_data = json_decode($current_data, true);
$extra = array(
  'id' => $_POST['id'],
  'szPlotIdUniqueKey' => $_POST["szPlotIdUniqueKey"],
  'fPrice' => $_POST["fPrice"],
  'szRow' => $_POST["szRow"],
  'szPlot' => $_POST["szPlot"],
  'szLot' => $_POST["szLot"],
  'szCentroidLatitude' => $_POST['szCentroidLatitude'],
  'szCentroidLongtitude' => $_POST["szCentroidLongtitude"],
  'szCentroidNorthing' => $_POST["szCentroidNorthing"],
  'szCentroidEasting' => $_POST["szCentroidEasting"],
  'szNECornerLatitude' => $_POST["szNECornerLatitude"],
  'szNECornerLongitude' => $_POST["szNECornerLongitude"],
  'szNWCornerLatitude' => $_POST['szNWCornerLatitude'],
  'szNWCornerLongitude' => $_POST["szNWCornerLongitude"],
  'szSECornerLatitude' => $_POST["szSECornerLatitude"],
  'szSECornerLongitude' => $_POST["szSECornerLongitude"],
  'szSWCornerLatitude' => $_POST["szSWCornerLatitude"],
  'szSWCornerLongitude' => $_POST["szSWCornerLongitude"],
  'boundaryPlot' => $_POST['boundaryPlot'],
  'szPlotIdUniqueKey' => $_POST["szPlotIdUniqueKey"],
  'cornerPlot' => $_POST["cornerPlot"],
  'PriceWithTax' => $_POST["PriceWithTax"]
);
$array_data[] = $extra;
$final_data = json_encode($array_data);
return $final_data;
}
function fileCreateWrite(){
$file=fopen("file1.json","w");
$array_data=array();
$extra = array(
 'id' => $_POST['id'],
 'szPlotIdUniqueKey' => $_POST["szPlotIdUniqueKey"],
 'fPrice' => $_POST["fPrice"],
 'szRow' => $_POST["szRow"],
 'szPlot' => $_POST["szPlot"],
 'szLot' => $_POST["szLot"],
 'szCentroidLatitude' => $_POST['szCentroidLatitude'],
 'szCentroidLongtitude' => $_POST["szCentroidLongtitude"],
 'szCentroidNorthing' => $_POST["szCentroidNorthing"],
 'szCentroidEasting' => $_POST["szCentroidEasting"],
 'szNECornerLatitude' => $_POST["szNECornerLatitude"],
 'szNECornerLongitude' => $_POST["szNECornerLongitude"],
 'szNWCornerLatitude' => $_POST['szNWCornerLatitude'],
 'szNWCornerLongitude' => $_POST["szNWCornerLongitude"],
 'szSECornerLatitude' => $_POST["szSECornerLatitude"],
 'szSECornerLongitude' => $_POST["szSECornerLongitude"],
 'szSWCornerLatitude' => $_POST["szSWCornerLatitude"],
 'szSWCornerLongitude' => $_POST["szSWCornerLongitude"],
 'boundaryPlot' => $_POST['boundaryPlot'],
 'cornerPlot' => $_POST["cornerPlot"],
 'PriceWithTax' => $_POST["PriceWithTax"]
);
$array_data[] = $extra;
$final_data = json_encode($array_data);
fclose($file);
return $final_data;
}
?>
</body>
</html>