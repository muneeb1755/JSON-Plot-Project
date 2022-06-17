<?php
require ('db.php');
  
if(isset($_POST['submit'])){
	
if(file_exists('file1.json'))
{
	$current_data = file_get_contents('file1.json');
		$array_data = json_decode($current_data, true);
		$last_item    = end($array_data);
		$last_id = $last_item['id'];
		$uniq= getRandomHex(10);
		//$last_uniqueid = $last_item['szPlotIdUniqueKey'];
		$extra = array(
			 'id' => ++$last_id,
			 'szPlotIdUniqueKey' => $uniq,
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
		
     if(file_put_contents('file1.json', $final_data))
     { header("location:JsonTable.php");
          $message = "<label class='text-success'>Data added Success fully</p>";
		 
		}
}

}

?>
<!DOCTYPE html>
<html>
<body>
<div class="container" >
     <h4 align="">insert Data in Jason File</h4><br />
     <form method="post">
	 <input type="submit" name="submit" value="submit" class="btn btn-info" /><br />
	 <div class="container">
  <div class="row">
    <div class="col">
    <label>Price</label>
         <input type="text" name="fPrice" class="form-control" />   
		 <label>Row</label>
         <input type="text" name="szRow" class="form-control" />
		 <label>Plot</label>
         <input type="text" name="szPlot" class="form-control" />
		 <label>Lot</label>
         <input type="text" name="szLot" class="form-control" />
		 <label>Latitude</label>
         <input type="text" name="szCentroidLatitude" class="form-control" />
		 <label>Longitude</label>
         <input type="text" name="szCentroidLongtitude" class="form-control" />
		 <label>Price with Tax</label>
		 <input type="text" name="PriceWithTax" class="form-control" />
    </div>
	<div class="col">
    <label>Centroid Northing</label>
         <input type="text" name="szCentroidNorthing" class="form-control" />
		 <label>Centroid Easting</label>
         <input type="text" name="szCentroidEasting" class="form-control" />
		 <label>NE Corner Latitude</label>
         <input type="text" name="szNECornerLatitude" class="form-control" />
		 <label>NE Corner Longitude</label>
         <input type="text" name="szNECornerLongitude" class="form-control" /> 
		 <label>NW Corner Latitude</label>
         <input type="text" name="szNWCornerLatitude" class="form-control" />
		 <label>NW Corner Logitude</label>
         <input type="text" name="szNWCornerLongitude" class="form-control" />
    </div>
	
    <div class="col">
    <label>SE Corner Latitude</label>
         <input type="text" name="szSECornerLatitude" class="form-control" />
		 <label>SE Corner Logitude</label>
         <input type="text" name="szSECornerLongitude" class="form-control" />
		 <label>SW Corner Latitude</label>
         <input type="text" name="szSWCornerLatitude" class="form-control" />
		 <label>SW Corner Logitude</label>
         <input type="text" name="szSWCornerLongitude" class="form-control" />
		 <label>Boundary wall</label>
         <input type="text" name="boundaryPlot" class="form-control" />
         <label>Corner Plot</label>
		 <input type="text" name="cornerPlot" class="form-control" />
		</div>
	</div>		
		</form>
</div>
</body>
</html>