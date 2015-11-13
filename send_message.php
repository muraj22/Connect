<?php

include_once 'include/connection.php';

session_start("login");	
$db = new Database();
$db->connect();

$name = strtolower($_GET['name']);
$message = $_GET['message'];
//$_SESSION['user_id'] = $_SESSION['user_id'];

if(empty($name) || empty($message))
{
	$show = "Some fields are empty . Please fill it.";
}
else
{
$query1 = "select user_id from users WHERE LOWER(user_nicename) = '$name'";

$result = $db->run_query($query1);

$friend_id = 0;

while($row = mysqli_fetch_array($result))
{
	$friend_id =  $row['user_id'];
}

if($friend_id==0)
{
	$show = "No such user Exists.";
}
else if($friend_id==$_SESSION['user_id'])
{
	$show = "You are trying to send the message to yourself. Please try sending it to a friend";
}
else
{
    $query2 = "insert into messages (from_user , to_user , message , status) values ('".$_SESSION['user_id']."','$friend_id','$message' , 0)";
    $result = $db->run_query($query2);
    $show = "Message has been sent";
}
}
echo $show;

$name="";
$message="";
$show="";


?>