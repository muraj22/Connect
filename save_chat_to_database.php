<?php

include_once 'include/connection.php';

session_start("login");

$db = new Database();
$db->connect();

$message = $_GET['message'];

if(isset($_SESSION['friend_id_lv']))
{
	if(!empty($message))
	{
	    $query1 = "insert into messages (from_user , to_user , message , status) values ('".$_SESSION['user_id']."','".$_SESSION['friend_id_lv']."','$message' , 0)";
	    $result = $db->run_query($query1);
	}
	else
	{
		echo "some pb";
	}
}
else
{
    echo "select a friend to chat with...";
}

$db->disconnect();

$name="";
$message="";

if(isset($_SESSION['sound']))
{
	echo $_SESSION['sound'];
}

?>