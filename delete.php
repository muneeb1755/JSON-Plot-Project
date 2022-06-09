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
<div class="container" style="width:500px;">
     <h4 align="">Delete Data in Jason File</h4><br />
     <form method="POST">
         <label>ID</label>
         <input type="text" name="id" class="form-control" /><br />		
         <input type="submit" name="submit" value="Delete" class="btn btn-info" /><br />
        </form>
</div>
<?php
if(isset($_POST['id']))
{
$id = $_POST['id'];
// read json file
$data = file_get_contents('file1.json');
// decode json to associative array
$json_arr = json_decode($data, true);
// get array index to delete
$arr_index = array();
foreach ($json_arr as $i => $v){
foreach ($json_arr[$i] as $key => $value)
{    
    if ($value == $id)
    { echo $i;
        $arr_index[] = $i;
     }
}
}
foreach ($arr_index as $i)
{
  unset($json_arr[$i]);  
}
// rebase array
$json_arr = array_values($json_arr);
// encode array to json and save to file
file_put_contents('file1.json', json_encode($json_arr));
}
?>