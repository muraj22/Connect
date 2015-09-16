<?php
include_once 'include/connection.php';
include_once 'post_status.php';

fetch_status();

function fetch_status()
{
$db = new Database();
$db->connect();

$user_id = 1;
$content = $_GET['content'];
$time = date("Y/m/d");

$query = "insert into status(user_id , content , time) values('$user_id','$content','$time')";
$result = $db->run_query($query);
post_status();

}

?>