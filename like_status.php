<?php

session_start("login");
include 'include/connection.php';

$db = new Database();
$db->connect();

//$_SESSION['user_id'] = $_SESSION['user_id'];
$status_id = $_GET['status_id'];    // status id
$btn = $_GET['button'];

$query = "select likes , dislikes from status WHERE status_id = $status_id";
$result = $db->run_query($query);


while($row = mysqli_fetch_array($result))
{
    $likes = $row[0];
    $dislikes = $row[1];
}

$n_likes = $likes + 1;
$n_dislikes = $dislikes + 1;

if($btn == "like")
{
	// add one and update
    $query1 = "update status set likes = $n_likes WHERE status_id = $status_id";
    $result = $db->run_query($query1);
    $send = $n_likes;
}
else
{
     // reduce one and update
    $query1 = "update status set dislikes = $n_dislikes WHERE status_id = $status_id";
    $result = $db->run_query($query1);
    $send = $n_dislikes;
}

echo $send;

?>