<?php

session_id("login");
session_start();

include_once 'include/connection.php';

$email = $_GET['email'];
$password = $_GET['password'];

$db = new Database();
$db->connect();

$query = "select * from users";

$result = $db->run_query($query);

$check = 0;
while($row=mysqli_fetch_array($result))
{
	if($email == $row['user_email'] && $password == $row['user_pass'])
	{
		  $_SESSION['user_id'] = $row['user_id'] ;
		  $_SESSION['name'] = $row['user_nicename'];
          $check =1;
	}
}
echo "$check";
?>