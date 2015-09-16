<?php

session_start("login");
include 'include/connection.php';

$db = new Database();
$db->connect();

$user_id = $_SESSION['user_id'];
$id = $_GET['id'];    // friend id

echo "in php";
$query = "DELETE * FROM friends WHERE (friend_id=$user_id) && (user_id=$id) && (request_pending=0)";

$result = $db->run_query($query);

if($result)
    echo "fine";
else
	echo "not fine";
?>