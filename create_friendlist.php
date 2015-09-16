<?php

session_start("login");
include 'include/connection.php';

$db = new Database();
$db->connect();

$user_id = $_SESSION['user_id'];

$query = "select u.user_nicename , u.user_id from users u JOIN friends f WHERE (f.user_id = $user_id) AND (f.friend_id=u.user_id) AND (f.request_pending=1)";

$result = $db->run_query($query);

@$num = mysqli_num_rows($result);

if($num==0)
{
	echo '<a href="#" class="list-group-item" name="" >Find some friends .....</br></br>
	           search for your friends and send hem  request.....</br></br></a>';
}

else
{
while($row = mysqli_fetch_array($result))
{
	echo '<a href="#" class="list-group-item" name="' . $row["user_id"] . '">'.strtoupper($row["user_nicename"]).'</a>';
}	
}

//'<a href="#" class="list-group-item">'.strtoupper($row["user_nicename"]).'</a>'    class="list-group-item"
?>