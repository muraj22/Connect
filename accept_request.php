<?php

session_start("login");
include 'include/connection.php';

$db = new Database();
$db->connect();

$user_id = $_SESSION['user_id'];
$id = $_GET['id'];    // friend id

$query1 = "update friends set request_pending = 1 WHERE (user_id = $id) AND (friend_id = $user_id)";

$result1 = $db->run_query($query1);

$query2 = "insert into friends (user_id , friend_id , request_pending) values ($user_id , $id , 1)";

$result2 = $db->run_query($query2);

?>