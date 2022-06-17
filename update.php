<?php
require ('db.php');
?>
<?php
//Searching Data for Update

if(isset($_POST['updateid']))
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
