<?php
include_once 'include/connection.php';
session_start("login");

$db = new Database();
$db->connect();

$email = $_GET['email'];

$check = 0;

if(empty($email))
{
	$check = 2;
}
else
{
$query = "select * from users";
$result = $db->run_query($query);

// 0 means = friend not found
// 1 means = request to oneself
// 2 means = no email entered
// name means = user found

while($row = mysqli_fetch_array($result))
{
	if($email == $row['user_email'])
	{
       $check=$row['user_nicename'];
       $_SESSION['friend_id'] = $row['user_id'];
	}
}

if(isset($_SESSION['friend_id']))
{
if($_SESSION['user_id']==$_SESSION['friend_id'])
{
	$check = 1;
}
}

}

echo $check;
?>