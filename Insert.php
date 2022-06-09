<?php
$id; $szPlotIdUniqueKey; $fPrice; $szRow; $szPlot; $szLot; $szCentroidLatitude; $szCentroidLongtitude; $szCentroidNorthing; 
$szCentroidEasting; $szNECornerLatitude; $szNECornerLongitude; $szNWCornerLatitude; $szNWCornerLongitude; $szSECornerLatitude; 
$szSECornerLongitude; $szSWCornerLatitude; $szSWCornerLongitude; $boundaryPlot; $cornerPlot; 
$PriceWithTax;
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
    <title>insert Data in Jason</title>
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
     <h4 align="">insert Data in Jason File</h4><br />
     <form method="post">
         <label>ID</label>
         <input type="text" name="id" class="form-control" /><br />
         <label>Unique ID</label>
		 <input type="text" name="szPlotIdUniqueKey" class="form-control" /><br />
		 <label>Price</label>
         <input type="text" name="fPrice" class="form-control" /><br />    
		 <label>Row</label>
         <input type="text" name="szRow" class="form-control" /><br />
		 <label>Plot</label>
         <input type="text" name="szPlot" class="form-control" /><br />
		 <label>Lot</label>
         <input type="text" name="szLot" class="form-control" /><br />
		 <label>Latitude</label>
         <input type="text" name="szCentroidLatitude" class="form-control" /><br />
		 <label>Longitude</label>
         <input type="text" name="szCentroidLongtitude" class="form-control" /><br />
		 <label>Centroid Northing</label>
         <input type="text" name="szCentroidNorthing" class="form-control" /><br />
		 <label>Centroid Easting</label>
         <input type="text" name="szCentroidEasting" class="form-control" /><br />
		 <label>NE Corner Latitude</label>
         <input type="text" name="szNECornerLatitude" class="form-control" /><br />
		 <label>NE Corner Longitude</label>
         <input type="text" name="szNECornerLongitude" class="form-control" /><br /> 
		 <label>NW Corner Latitude</label>
         <input type="text" name="szNWCornerLatitude" class="form-control" /><br />
		 <label>NW Corner Logitude</label>
         <input type="text" name="szNWCornerLongitude" class="form-control" /><br />
		 <label>SE Corner Latitude</label>
         <input type="text" name="szSECornerLatitude" class="form-control" /><br />
		 <label>SE Corner Logitude</label>
         <input type="text" name="szSECornerLongitude" class="form-control" /><br />
		 <label>SW Corner Latitude</label>
         <input type="text" name="szSWCornerLatitude" class="form-control" /><br />
		 <label>SW Corner Logitude</label>
         <input type="text" name="szSWCornerLongitude" class="form-control" /><br />
		 <label>Boundary wall</label>
         <input type="text" name="boundaryPlot" class="form-control" /><br />
         <label>Corner Plot</label>
		 <input type="text" name="cornerPlot" class="form-control" /><br />
		 <label>Price with Tax</label>
         <input type="text" name="PriceWithTax" class="form-control" /><br />    
		 <input type="submit" name="submit" value="submit" class="btn btn-info" /><br />		
		</form>
</div>
<?php
if(file_exists('file1.json'))
{
     $final_data=fileWriteAppend();
     if(file_put_contents('file1.json', $final_data))
     {
          $message = "<label class='text-success'>Data added Success fully</p>";
     }
}
else
{
     $final_data=fileCreateWrite();
     if(file_put_contents('file1.json', $final_data))
     {
          $message = "<label class='text-success'>File createed and  data added Success fully</p>";
     }

}
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