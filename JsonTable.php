<?php
require ('db.php');
?>
<!DOCTYPE html>
<html>
<body>
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
<!DOCTYPE html>  
 <html>
<head>         
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
  <title>Read a JSON File</title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<div id="search1">
<label class="bold">ID</label>
	<input type="text" name="id" />
    <input type="button" value="Search"/>
</div>
		<table class="table table-striped">

		<tbody>
				<tr>
					<th >id</th>
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
				<?php foreach ($abc as $a) { ?>
				<tr>
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
					<td> <a href="update.php?id=<?php echo $a->id;?>" class="btn btn-warning">Update</a></td>
					<td> <a href="view.php?id=<?php echo $a->id;?>" class="btn btn-success">View</a></td>
					<td><button type="button" class="delete btn btn-danger" data-id="<?php echo $a->id;?>" data-bs-toggle="modal" data-bs-target="#myModal">Delete</button></td>
			</tr>
		<?php } 
		?>
    </tbody>
</table>
</div>
</div>


<div class="modal" id="myModal">
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
					<button type="submit" class="btn btn-danger"  name="deleteid">delete</button>

					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						</div>
					</div>
					</form>
				</div>
				</div>
				<script>
       butdel = document.getElementsByClassName('delete');
for(let i=0; i < butdel.length; i++) {
butdel[i].addEventListener('click', function (e) { 
let   viewid = butdel[i].getAttribute('data-id');
console.log("button id",viewid);
//fetch json
fetch('file1.json').then(response => {
  return response.json();
}).then(data => {
  // Work with JSON data here
  let plots=data;
  let index= plots.findIndex(plots => plots.id==viewid);
 //compare plots id with viewid
 console.log(index);
  document.getElementById('delid').value = plots[index]['id'];




}).catch(err => {
  // Do something for an error here
});
//fetch json
//compare viewid with id in json file 

})}
</script>

</body>
</html>



