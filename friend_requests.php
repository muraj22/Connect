<?php

session_start("login");
include 'include/connection.php';

$db = new Database();
$db->connect();

$user_id = $_SESSION['user_id'];

$query = "select u.user_nicename  , u.user_id from users u JOIN friends f ON u.user_id = f.user_id WHERE (f.friend_id=$user_id) AND (request_pending=0)";

$result = $db->run_query($query);


@$num = mysqli_num_rows($result);

if($num==0)
{
	echo '<ul class="dropdown-menu" style="width:350px"><li><a href="#" class="list-group-item" name="" >No Requests are pending right now.....</a></li></ul>';
}
else
{
while($row = mysqli_fetch_array($result))
{
	echo '<ul class="dropdown-menu" style="width:350px"><li style="width:100px;"><a href="#"><strong> '. ucfirst($row['user_nicename']) .' sent a request to you....</strong> </br></li><li>
	      <button name = "'. $row[1] .'"class="btn btn-danger btn-sm" style="float:left ; position:absolute" type="submit" onclick="decline_request(this)">Decline Request</button> 
	      <button name = "'. $row[1] .'"class="btn btn-danger btn-sm" style="position:relative; margin-left : 200px ; " type="submit" onclick="accept_request(this)">Accept Request</button>
	      </li></a></ul>';
}
}

?>