<?php

include_once "include/connection.php";
$db = new Database();
$db->connect();

$query = "select profile_dp from users WHERE user_id=28";
$result = $db->run_query($query);

while($row = mysqli_fetch_assoc($result))
{
     header("content-type:image/jpeg");
     $imageData = $row["profile_dp"];
     echo $imageData;
}


?>