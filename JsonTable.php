<?php
	require ('db.php');
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
	</head>

<body>
<form action="csv.php" method="post" enctype="multipart/form-data">
<div align="right">
<input type="file" name="file" id="file" class="btn btn-Primary"/>
<button input type="submit" name="submit" class="btn btn-secondary">Import</button>
<button type="button" name="btn_delete" id="btn_delete" class="btn btn-danger">Delete Bulk</button>
</div>
</form> 
   <?php

?>
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
	<table class="table table-striped">

		<thead>
			<tr>
				<th><input type="checkbox" id="checkAl"></th>
				<th>Id</th>
				<th>Price</th>
				<th>Row</th>
				<th>Plot</th>
				<th>Lot</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Boundary plot</th>
				<th>Cornerplot</th>
				<th>Price_with_tax</th>
				<th> Actions </th>
				<th> Actions </th>
				<th> Actions </th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($abc as $a) { ?>
				<tr>
				<td><input type="checkbox" name="id[]" class="delete" value="<?php echo $row["id"]; ?>" /></td>
					<td> <?= $a->id; ?> </td>
					<td> <?= $a->fPrice; ?> </td>
					<td> <?= $a->szRow; ?> </td>
					<td> <?= $a->szPlot; ?> </td>
					<td> <?= $a->szLot; ?> </td>
					<td> <?= $a->szCentroidLatitude; ?> </td>
					<td> <?= $a->szCentroidLongtitude; ?> </td>
					<td> <?= $a->boundaryPlot; ?> </td>
					<td> <?= $a->cornerPlot; ?> </td>
					<td> <?= $a->PriceWithTax; ?> </td>
					<td><button type="button" class="update btn btn-warning" data-id="<?php echo $a->id;?>"
							data-bs-toggle="modal" data-bs-target="#myModalupdate">Update</button></td>
					<td><button type="button" class="view btn btn-success" data-id="<?php echo $a->id;?>"
							data-bs-toggle="modal" data-bs-target="#myModalview">view</button></td>
					<td><button type="button" class="delete btn btn-danger" data-id="<?php echo $a->id;?>"
							data-bs-toggle="modal" data-bs-target="#myModaldelete">Delete</button></td>
				</tr>
			<?php } 
		?>
		</tbody>
	</table>

	<div class="modal" id="myModaldelete">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Confirmation!!!</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<h5 class="modal-body">Are you sure, you want Delete </h5>
					<form action="delete.php" method="post">
						<input type="hidden" name="id" id="delid">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger" name="deleteid">Delete</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				</div>
			</div>
			</form>
		</div>
	</div>

<?php
	$id = $_GET['id'];
	// read json file
	$data = file_get_contents('file1.json');
	// // decode json to associative array
	$json_arr = json_decode($data, true);
	//array search method for multidimensional array
	$key = array_search($id, array_column($json_arr, 'id'));
?>

	<div class="modal" id="myModalview">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">View</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="card mb-3">
							<div class="row g-0">
								<div class="col-md-8">
									<div id="googleMap" style="width:100%;height:500px;"></div>
								</div>
								<div class="col-md-4 scroll">
									<div class="card-body">
										<h5 class="card-title">Plot Details</h5>
										<ul class="list-group list-group-flush">
											<label>ID</label>
											<li class="list-group-item">
												<p id="upid1">
											</li>
											<label>Unique ID</label>
											<li class="list-group-item">
												<p id="szPlotIdUniqueKey1">
											</li>
											<label>Price</label>
											<li class="list-group-item">
												<p id="fPrice1">
											</li>
											<label>Row</label>
											<li class="list-group-item">
												<p id="szRow1">
											</li>
											<label>Plot</label>
											<li class="list-group-item">
												<p id="szPlot1">
											</li>
											<label>Lot</label>
											<li class="list-group-item">
												<p id="szLot1">
											</li>
											<label>Latitude</label>
											<li class="list-group-item">
												<p id="szCentroidLatitude1">
											</li>
											<label>Longitude</label>
											<li class="list-group-item">
												<p id="szCentroidLongtitude1">
											</li>
											<label>Centroid Northing</label>
											<li class="list-group-item">
												<p id="szCentroidNorthing1">
											</li>
											<label>Centroid Easting</label>
											<li class="list-group-item">
												<p id="szCentroidEasting1">
											</li>
											<label>NE Corner Latitude</label>
											<li class="list-group-item">
												<p id="szNECornerLatitude1">
											</li>
											<label>NE Corner Longitude</label>
											<li class="list-group-item">
												<p id="szNECornerLongitude1">
											</li>
											<label>NW Corner Latitude</label>
											<li class="list-group-item">
												<p id="szNWCornerLatitude1">
											</li>
											<label>NW Corner Logitude</label>
											<li class="list-group-item">
												<p id="szNWCornerLongitude1">
											</li>
											<label>SE Corner Latitude</label>
											<li class="list-group-item">
												<p id="szSECornerLatitude1">
											</li>
											<label>SE Corner Logitude</label>
											<li class="list-group-item">
												<p id="szSECornerLongitude1">
											</li>
											<label>SW Corner Latitude</label>
											<li class="list-group-item">
												<p id="szSWCornerLatitude1">
											</li>
											<label>SW Corner Logitude</label>
											<li class="list-group-item">
												<p id="szSWCornerLongitude1">
											</li>
											<label>Boundary wall</label>
											<li class="list-group-item">
												<p id="boundaryPlot">
											</li>
											<label>Corner Plot</label>
											<li class="list-group-item">
												<p id="cornerPlot">
											</li>
											<label>Price with Tax</label>
											<li class="list-group-item">
												<p id="PriceWithTax">
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal" id="myModalupdate">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Confirmation!!!</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<form action="update.php" method="post">
						<input type="hidden" name="id" id="upid">
						<div class="container">
							<div class="row">
								<div class="col">
									<label>Price</label>
									<input type="text" name="fPrice" id="fPrice" class="form-control" />
									<label>Row</label>
									<input type="text" name="szRow" id="szRow" class="form-control" />
									<label>Plot</label>
									<input type="text" name="szPlot" id="szPlot" class="form-control" />
									<label>Lot</label>
									<input type="text" name="szLot" id="szLot" class="form-control" />
									<label>Latitude</label>
									<input type="text" name="szCentroidLatitude" id="szCentroidLatitude"
										class="form-control" />
									<label>Longitude</label>
									<input type="text" name="szCentroidLongtitude" id="szCentroidLongtitude"
										class="form-control" />
									<label>Price with Tax</label>
									<input type="text" name="PriceWithTax" id="PriceWithTax" class="form-control" />
								</div>
								<div class="col">
									<label>Centroid Northing</label>
									<input type="text" name="szCentroidNorthing" id="szCentroidNorthing"
										class="form-control" />
									<label>Centroid Easting</label>
									<input type="text" name="szCentroidEasting" id="szCentroidEasting"
										class="form-control" />
									<label>NE Corner Latitude</label>
									<input type="text" name="szNECornerLatitude" id="szNECornerLatitude"
										class="form-control" />
									<label>NE Corner Longitude</label>
									<input type="text" name="szNECornerLongitude" id="szNECornerLongitude"
										class="form-control" />
									<label>NW Corner Latitude</label>
									<input type="text" name="szNWCornerLatitude" id="szNWCornerLatitude"
										class="form-control" />
									<label>NW Corner Logitude</label>
									<input type="text" name="szNWCornerLongitude" id="szNWCornerLongitude"
										class="form-control" />
								</div>
								<div class="col">
									<label>SE Corner Latitude</label>
									<input type="text" name="szSECornerLatitude" id="szSECornerLatitude"
										class="form-control" />
									<label>SE Corner Logitude</label>
									<input type="text" name="szSECornerLongitude" id="szSECornerLongitude"
										class="form-control" />
									<label>SW Corner Latitude</label>
									<input type="text" name="szSWCornerLatitude" id="szSWCornerLatitude"
										class="form-control" />
									<label>SW Corner Logitude</label>
									<input type="text" name="szSWCornerLongitude" id="szSWCornerLongitude"
										class="form-control" />
									<label>Boundary wall</label>
									<input type="text" name="boundaryPlot" id="boundaryPlot" class="form-control" />
									<label>Corner Plot</label>
									<input type="text" name="cornerPlot" id="cornerPlot" class="form-control" />
								</div>
							</div>
							<button type="submit" class="btn btn-danger" name="updateid">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
		</div>
	</div>

<Script>
		butdel = document.getElementsByClassName('delete');
		for (let i = 0; i < butdel.length; i++) {
			butdel[i].addEventListener('click', function (e) {
				let delid = butdel[i].getAttribute('data-id');
				console.log("button id", delid);
				//fetch json
				fetch('file1.json').then(response => {
					return response.json();
				}).then(data => {
					// Work with JSON data here
					let plots = data;
					let index = plots.findIndex(plots => plots.id == delid);
					//compare plots id with viewid
					console.log(index);
					document.getElementById('delid').value = plots[index]['id'];
				}).catch(err => {
					// Do something for an error here
				});
			})
		}	
$(document).ready(function(){
 
 $('#btn_delete').click(function(){
  
  if(confirm("Are you sure you want to delete this?"))
  {
   var id = [];
   
   $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
   });
   
   if(id.length === 0) //tell you if the array is empty
   {
    alert("Please Select atleast one checkbox");
   }
   else
   {
    $.ajax({
     location:'delete.php',
     method:'POST',
     data:{id:id},
     success:function()
     {
      for(var i=0; i<id.length; i++)
      {
       $('tr#'+id[i]+'').css('background-color', '#ccc');
       $('tr#'+id[i]+'').fadeOut('slow');
      }
     }
     
    });
   }
   
  }
  else
  {
   return false;
  }
 });
 
});
		$("#checkAl").click(function () {
			$('input:checkbox').not(this).prop('checked', this.checked);
		});

		


		butview = document.getElementsByClassName('view');
		for (let i = 0; i < butview.length; i++) {
			butview[i].addEventListener('click', function (e) {
				let viewid = butview[i].getAttribute('data-id');
				console.log("button id", viewid);
				//fetch json
				fetch('file1.json').then(response => {
					return response.json();
				}).then(data => {
					// Work with JSON data here
					let plots = data;
					let index = plots.findIndex(plots => plots.id == viewid);
					//compare plots id with viewid
					console.log(index);
					document.getElementById('upid1').innerHTML = plots[index]['id'];
					document.getElementById('szPlotIdUniqueKey1').innerHTML = plots[index][
						'szPlotIdUniqueKey'];
					document.getElementById('fPrice1').innerHTML = plots[index]['fPrice'];
					document.getElementById('szRow1').innerHTML = plots[index]['szRow'];
					document.getElementById('szPlot1').innerHTML = plots[index]['szPlot'];
					document.getElementById('szLot1').innerHTML = plots[index]['szLot'];
					document.getElementById('szCentroidLatitude1').innerHTML = plots[index][
						'szCentroidLatitude'
					];
					document.getElementById('szCentroidLongtitude1').innerHTML = plots[index][
						'szCentroidLongtitude'
					];
					document.getElementById('PriceWithTax1').innerHTML = plots[index]['PriceWithTax'];
					document.getElementById('szCentroidNorthing1').innerHTML = plots[index][
						'szCentroidNorthing'
					];
					document.getElementById('szCentroidEasting1').innerHTML = plots[index][
						'szCentroidEasting'];
					document.getElementById('szNECornerLatitude1').innerHTML = plots[index][
						'szNECornerLatitude'
					];
					document.getElementById('szNECornerLongitude1').innerHTML = plots[index][
						'szNECornerLongitude'
					];
					document.getElementById('szNWCornerLatitude1').innerHTML = plots[index][
						'szNWCornerLatitude'
					];
					document.getElementById('szNWCornerLongitude1').innerHTML = plots[index][
						'szNWCornerLongitude'
					];
					document.getElementById('szSECornerLatitude1').innerHTML = plots[index][
						'szSECornerLatitude'
					];
					document.getElementById('szSECornerLongitude1').innerHTML = plots[index][
						'szSECornerLongitude'
					];
					document.getElementById('szSWCornerLatitude1').innerHTML = plots[index][
						'szSWCornerLatitude'
					];
					document.getElementById('szSWCornerLongitude1').innerHTML = plots[index][
						'szSWCornerLongitude'
					];
					document.getElementById('boundaryPlot1').innerHTML = plots[index]['boundaryPlot'];
					document.getElementById('cornerPlot1').innerHTML = plots[index]['cornerPlot'];
				}).catch(err => {
					// Do something for an error here
				});
			})
		}





		butedit = document.getElementsByClassName('update');
		for (let i = 0; i < butedit.length; i++) {
			butedit[i].addEventListener('click', function (e) {
				let editid = butedit[i].getAttribute('data-id');
				console.log("button id", editid);
				//fetch json
				fetch('file1.json').then(response => {
					return response.json();
				}).then(data => {
					// Work with JSON data here
					let plots = data;
					let index = plots.findIndex(plots => plots.id == editid);
					//compare plots id with viewid
					console.log(index);
					document.getElementById('upid').value = plots[index]['id'];
					document.getElementById('fPrice').value = plots[index]['fPrice'];
					document.getElementById('szRow').value = plots[index]['szRow'];
					document.getElementById('szPlot').value = plots[index]['szPlot'];
					document.getElementById('szLot').value = plots[index]['szLot'];
					document.getElementById('szCentroidLatitude').value = plots[index]['szCentroidLatitude'];
					document.getElementById('szCentroidLongtitude').value = plots[index][
						'szCentroidLongtitude'
					];
					document.getElementById('PriceWithTax').value = plots[index]['PriceWithTax'];
					document.getElementById('szCentroidNorthing').value = plots[index]['szCentroidNorthing'];
					document.getElementById('szCentroidEasting').value = plots[index]['szCentroidEasting'];
					document.getElementById('szNECornerLatitude').value = plots[index]['szNECornerLatitude'];
					document.getElementById('szNECornerLongitude').value = plots[index][
					'szNECornerLongitude'];
					document.getElementById('szNWCornerLatitude').value = plots[index]['szNWCornerLatitude'];
					document.getElementById('szNWCornerLongitude').value = plots[index][
					'szNWCornerLongitude'];
					document.getElementById('szSECornerLatitude').value = plots[index]['szSECornerLatitude'];
					document.getElementById('szSECornerLongitude').value = plots[index][
					'szSECornerLongitude'];
					document.getElementById('szSWCornerLatitude').value = plots[index]['szSWCornerLatitude'];
					document.getElementById('szSWCornerLongitude').value = plots[index][
					'szSWCornerLongitude'];
					document.getElementById('boundaryPlot').value = plots[index]['boundaryPlot'];
					document.getElementById('cornerPlot').value = plots[index]['cornerPlot'];
				}).catch(err => {
					// Do something for an error here
				});
			})
		}
		function myMap() {
			$lat = <?php echo $json_arr[$key]['szCentroidLatitude']; ?>;
			$lan = <?php echo $json_arr[$key]['szCentroidLongtitude']; ?>;
			var mapProp = {
				center: new google.maps.LatLng($lat, $lan),
				zoom: 15,
			};
			var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
		}
	</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtvVsPv-HWcKmbBJ0f6xtmoW0GTZC0wY0&callback=myMap"></script>

		
</body>
</html>