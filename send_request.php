<?php
session_start("login");
include 'include/connection.php';

$db = new Database();
$db->connect();

//$_SESSION['user_id'] = $_SESSION['user_id'];
//$friend_id = $_SESSION['friend_id'];
$request_pending = 0;

$query = "insert into friends (user_id , friend_id , request_pending) values ('".$_SESSION['user_id']."' , '".$_SESSION['friend_id']."' , '$request_pending')";

$result = $db->run_query($query);

session_unset($_SESSION['friend_id']);

if($result)
{
	echo "1";
}
else
{
	echo "2";
}
?>