<?php
if ( isset($_POST["submit"]) ) {
if ( isset($_FILES["file"])) {
//if there was an error uploading the file
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
     }
     else {
        //Store file in directory "upload" with the name of "uploaded_file.txt"
        $storagename = "uploaded_file.csv";
        move_uploaded_file($_FILES["file"]["tmp_name"], "json" . $storagename);
        echo "Stored in: " . "json" . $_FILES["file"]["name"] . "<br />";
        }
        //Setup a PHP array to hold our CSV rows.
if (($handle = fopen('jsonuploaded_file.csv', 'r')) === false) {
die('Error opening file');
    }
    $current_data = file_get_contents('file1.json');
    $array_data = json_decode($current_data, true);
    $headers = fgetcsv($handle, 1024, ',');
    $complete = array();
    while ($row = fgetcsv($handle, 1024, ',')) {
    $complete = array_combine($headers, $row);

    $abc=array_search($complete['id'], array_column($array_data, 'id'));
    if(!empty($abc)||$abc===0){
        unset($complete);
    }else {
        $array_data[] = $complete;
    }
    //echo $complete['id']
    }

    fclose($handle);
    //$array_data = array_values( array_unique($array_data, SORT_REGULAR ) );
    $final_data=json_encode($array_data);
if(file_put_contents('file1.json', $final_data))
{
   $message = "<label class='text-success'>Data added Success fully</p>";
   header("location:JsonTable.php");
}
}
}	
?>