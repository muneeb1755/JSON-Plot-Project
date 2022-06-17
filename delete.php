<?php
require ('db.php');
echo "ABC";
?>
<!DOCTYPE html>
<html>
<body>
<?php
if(isset($_POST['deleteid']))
{
$id = $_POST['id'];
// read json file
$data = file_get_contents('file1.json');
// decode json to associative array
$json_arr = json_decode($data, true);
// get array index to delete
$arr_index = array();
$key = array_search($id, array_column($json_arr, 'id'));
unset($json_arr[$key]);
// rebase array
$json_arr = array_values($json_arr);
// encode array to json and save to file
file_put_contents('file1.json', json_encode($json_arr));
header("location:JsonTable.php");
}
?>

</body>
</html>