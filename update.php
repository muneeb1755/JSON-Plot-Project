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
//echo $json_arr[$key]['id'];

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
$json_arr[$key]['szCentroidLatitude']=$_POST['szCentroidLatitude'];
$json_arr[$key]['szCentroidLongtitude']=$_POST['szCentroidLongtitude'];
$json_arr[$key]['szCentroidNorthing']=$_POST['szCentroidNorthing'];  
$json_arr[$key]['szCentroidEasting']=$_POST['szCentroidEasting'];
$json_arr[$key]['szNECornerLatitude']=$_POST['szNECornerLatitude'];
$json_arr[$key]['szNECornerLongitude']=$_POST['szNECornerLongitude'];
$json_arr[$key]['szNWCornerLatitude']=$_POST['szNWCornerLatitude'];
$json_arr[$key]['szNWCornerLongitude']=$_POST['szNWCornerLongitude'];
$json_arr[$key]['szSECornerLatitude']=$_POST['szSECornerLatitude'];
$json_arr[$key]['szSECornerLongitude']=$_POST['szSECornerLongitude'];
$json_arr[$key]['szSWCornerLatitude']=$_POST['szSWCornerLatitude'];
$json_arr[$key]['szSWCornerLongitude']=$_POST['szSWCornerLongitude'];
$json_arr[$key]['boundaryPlot']=$_POST['boundaryPlot'];
$json_arr[$key]['cornerPlot']=$_POST['cornerPlot'];
$json_arr[$key]['PriceWithTax']=$_POST['PriceWithTax'];
$final_data=json_encode($json_arr);
if(file_put_contents('file1.json', $final_data))
  {
       $message = "<label class='text-success'>Data added Success fully</p>";
       header("location:JsonTable.php");
      }
}
?>
<!DOCTYPE html>
<html>
<body>
<div class="container">
     <h4 align="">Update Data in Jason File</h4><br />
     
     <form method="post">
     <input type="submit" name="submit" value="Update" class="btn btn-info" />       
         <input type="hidden" name="id" class="form-control"  value ="<?php echo $json_arr[$key]['id']; ?>" /><br />
         <div class="container">
  <div class="row">
    <div class="col">
    <label>Price</label>
         <input type="text" name="fPrice" class="form-control" value ="<?php echo $json_arr[$key]['fPrice']; ?>"/>   
		 <label>Row</label>
         <input type="text" name="szRow" class="form-control" value ="<?php echo $json_arr[$key]['szRow']; ?>"/>
		 <label>Plot</label>
         <input type="text" name="szPlot" class="form-control" value ="<?php echo $json_arr[$key]['szPlot']; ?>"/>
		 <label>Lot</label>
         <input type="text" name="szLot" class="form-control" value ="<?php echo $json_arr[$key]['szLot']; ?>"/>
		 <label>Latitude</label>
         <input type="text" name="szCentroidLatitude" class="form-control" value ="<?php echo $json_arr[$key]['szCentroidLatitude']; ?>"/>
		 <label>Longitude</label>
         <input type="text" name="szCentroidLongtitude" class="form-control" value ="<?php echo $json_arr[$key]['szCentroidLongtitude']; ?>"/>
		 <label>Price with Tax</label>
		 <input type="text" name="PriceWithTax" class="form-control" value ="<?php echo $json_arr[$key]['PriceWithTax']; ?>"/>
    </div>
	<div class="col">
    <label>Centroid Northing</label>
         <input type="text" name="szCentroidNorthing" class="form-control" value ="<?php echo $json_arr[$key]['szCentroidNorthing']; ?>"/>
		 <label>Centroid Easting</label>
         <input type="text" name="szCentroidEasting" class="form-control" value ="<?php echo $json_arr[$key]['szCentroidEasting']; ?>"/>
		 <label>NE Corner Latitude</label>
         <input type="text" name="szNECornerLatitude" class="form-control" value ="<?php echo $json_arr[$key]['szNECornerLatitude']; ?>"/>
		 <label>NE Corner Longitude</label>
         <input type="text" name="szNECornerLongitude" class="form-control" value ="<?php echo $json_arr[$key]['szNECornerLongitude']; ?>"/> 
		 <label>NW Corner Latitude</label>
         <input type="text" name="szNWCornerLatitude" class="form-control" value ="<?php echo $json_arr[$key]['szNWCornerLatitude']; ?>"/>
		 <label>NW Corner Logitude</label>
         <input type="text" name="szNWCornerLongitude" class="form-control" value ="<?php echo $json_arr[$key]['szNWCornerLongitude']; ?>"/>
    </div>
	
    <div class="col">
    <label>SE Corner Latitude</label>
         <input type="text" name="szSECornerLatitude" class="form-control" value ="<?php echo $json_arr[$key]['szSECornerLatitude']; ?>"/>
		 <label>SE Corner Logitude</label>
         <input type="text" name="szSECornerLongitude" class="form-control" value ="<?php echo $json_arr[$key]['szSECornerLongitude']; ?>"/>
		 <label>SW Corner Latitude</label>
         <input type="text" name="szSWCornerLatitude" class="form-control" value ="<?php echo $json_arr[$key]['szSWCornerLatitude']; ?>"/>
		 <label>SW Corner Logitude</label>
         <input type="text" name="szSWCornerLongitude" class="form-control" value ="<?php echo $json_arr[$key]['szSWCornerLongitude']; ?>"/>
		 <label>Boundary wall</label>
         <input type="text" name="boundaryPlot" class="form-control" value ="<?php echo $json_arr[$key]['boundaryPlot']; ?>"/>
         <label>Corner Plot</label>
		 <input type="text" name="cornerPlot" class="form-control" value ="<?php echo $json_arr[$key]['cornerPlot']; ?>"/>
		</div>
	</div>		
  </form>
        <?php }?>
        </div>

</body>
</html>