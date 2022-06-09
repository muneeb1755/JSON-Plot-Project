<!DOCTYPE html>
<html>
<head>
  <title>Wellcome</title>
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
<?php
if(file_exists('file1.json'))
{	
	$filename = 'file1.json';
	$data = file_get_contents($filename); //data read from json file
	$abc = json_decode($data);  //decode a data 
	 $message = "<h3 class='text-success'>JSON file data</h3>";
}else{
	 $message = "<h3 class='text-danger'> JSON file Not found </h3>";
}
?>
<!DOCTYPE html>  
 <html>
<head>         
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
  <title>Read a JSON File</title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<style>
#tbstyle {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

#tbstyle td, #tbstyle th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tbstyle tr:nth-child(even){background-color: #f2f2f2;}

#tbstyle tr:hover {background-color: #ddd;}

#tbstyle th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #859161;
  color: White;
}
<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
    </div>
</style>
      </head>
	  <body>  
	   <div class="container" style="width:500px;">  
	   <div class="table-container">
	   <?php  
			 if(isset($message))  
			 {  
				  echo $message;  
			  
			 ?>
		<table id="tbstyle">
			<tbody>
				<tr>
					<th >id</th>
					<th>Unique ID</th>
					<th>Price</th>
					<th>Row</th>
					<th>Plot</th>
					<th>Lot</th>
					<th>Latitude</th>
					<th>Longitude</th>
					<th>CentroidNorthing</th>
					<th>CentroidEasting</th>
					<th>NECornerLatitude</th>
					<th>NECornerLongitude</th>
					<th>NWCornerLatitude</th>
					<th>NWCornerLongitude</th>
					<th>SECornerLatitude</th>
					<th>SECornerLongitude</th>
					<th>SWCornerLatitudee</th>
					<th>SWCornerLongitude</th>
					<th>Boundary plot</th>
					<th>Cornerplot</th>
					<th>Price_with_tax</th>
					<th> Action </th>
					</tr>
				<?php foreach ($abc as $a) { ?>
				<tr>
					<td> <?= $a->id; ?> </td>
					<td> <?= $a->szPlotIdUniqueKey; ?> </td>
					<td> <?= $a->fPrice; ?> </td>
					<td> <?= $a->szRow; ?> </td>
					<td> <?= $a->szPlot; ?> </td>
					<td> <?= $a->szLot; ?> </td>
					<td> <?= $a->szCentroidLatitude; ?> </td>
					<td> <?= $a->szCentroidLongtitude; ?> </td>
					<td> <?= $a->szCentroidNorthing; ?> </td>
					<td> <?= $a->szCentroidEasting; ?> </td>
					<td> <?= $a->szNECornerLatitude; ?> </td>
					<td> <?= $a->szNECornerLongitude; ?> </td>
					<td> <?= $a->szNWCornerLatitude; ?> </td>
					<td> <?= $a->szNWCornerLongitude; ?> </td>
					<td> <?= $a->szSECornerLatitude; ?> </td>
					<td> <?= $a->szSECornerLongitude; ?> </td>
					<td> <?= $a->szSWCornerLatitude; ?> </td>
					<td> <?= $a->szSWCornerLongitude; ?> </td>
					<td> <?= $a->boundaryPlot; ?> </td>
					<td> <?= $a->cornerPlot; ?> </td>
					<td> <?= $a->PriceWithTax; ?> </td>
					<td> <a href="update.php?id=<?php echo $a->id;?>">Update</a>
					
				</tr>
				<?php } 
			 }
			 else
				echo $message; 
			 ?>
    </tbody>
</table>
</div>
</div>
</body>
</html>

