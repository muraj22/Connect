<?php

include_once "include/connection.php";
$db = new Database();
$db->connect();

$imageName = mysql_real_escape_string($_FILES["image"]["name"]);
$imageData = mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
$imageType = mysql_real_escape_string($_FILES["image"]["type"]);	

if(substr($imageType,0,5) == "image")
{
     $query = "insert into users values ('' , '' , '', '' , '' , '' , '$imageData')";
     $result = $db->run_query($query);

     if($result)
     {
     echo "image uploaded";
     }
     else
     {
     	echo "something went wrong";
     	echo mysqli_error($db->connect);
     }

}
else
{
	echo "only images are allowed";
}
?>