<?php

// marked for problem

include_once 'include/connection.php';
include_once 'post_status.php';

fetch_status();

function fetch_status()
{
session_start("login");	
$db = new Database();
$db->connect();

//$user_id = $_SESSION['user_id'];
$content = $_GET['content'];
$time = date("Y/m/d");

$query = "insert into status(user_id , content , time) values('".$_SESSION['user_id']."','$content','$time')";

$result = $db->run_query($query);

post_status();

}

?>