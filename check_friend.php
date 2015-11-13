<?php
include_once 'include/connection.php';
session_start("login");

$db = new Database();
$db->connect();

$name = $_GET['name'];

$check = 0;

if(empty($name))
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
// 3 means = already a friend
// name means = user found

while($row = mysqli_fetch_array($result))
{
	if($name == $row['user_nicename'])
	{
	   $friend_id = $row['user_id'];
	   $query = "Select * from friends f Join users u on (u.user_id=f.user_id OR u.user_id=f.friend_id) WHERE ((f.user_id=".$_SESSION['user_id']." AND f.friend_id=$friend_id) OR (f.user_id=$friend_id AND f.friend_id=".$_SESSION['user_id']."))";
       //$query = "Select * from friends f Join users u on (u.user_id=f.user_id OR u.user_id=f.friend_id) WHERE ((f.user_id=1 AND f.friend_id=2) OR (f.user_id=2 AND f.friend_id=1))";
       $result = $db->run_query($query);

       @$num = mysqli_num_rows($result); 
       if($num>0)
       {
       		$check = 3;

       }
       else
       {
       	    $check=$row['user_nicename'];
	        $_SESSION['friend_id'] = $row['user_id'];    
       }
       break;
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
$check="";
?>