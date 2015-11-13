<?php

session_start("login");
include 'include/connection.php';

$db = new Database();
$db->connect();

//$_SESSION['user_id'] = $_SESSION['user_id'];
$id = $_GET['id'];    // friend id

$query = " delete from friends WHERE (friend_id=".$_SESSION['user_id'].") && (user_id=$id) && (request_pending=0)";

$result = $db->run_query($query);
?>