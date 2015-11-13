<?php

session_start("login");
include 'include/connection.php';

$db = new Database();
$db->connect();

$_SESSION['friend_id_lv'] = $_GET['id'];

$query1 = "Select user_nicename from users WHERE user_id = ". $_SESSION['friend_id_lv'];
$result = $db->run_query($query1);

$row = mysqli_fetch_array($result);
$_SESSION['friend_name_lv'] = $row['user_nicename'];

/*$query = "Select * from messages m JOIN users u ON (m.from_user = u.user_id) WHERE ((m.from_user=".$_SESSION['user_id']." AND m.to_user=".$_SESSION['friend_id_lv'].") OR (m.from_user = ".$_SESSION['friend_id_lv']." AND m.to_user= ".$_SESSION['user_id']."))";

$result = $db->run_query($query);

@$num = mysqli_num_rows($result);

if($num==0)
{
	echo '<a href="#" class="list-group-item" name="" >Find some friends .....</br></br>
	           search for your friends and send hem  request.....</br></br></a>';
}

/*else
{
while($row = mysqli_fetch_array($result))
{
	/*echo "<span style='color:#D8D8D8 ; font-weight:700; font-family:cursive'>" .ucfirst(strtolower($row['user_nicename'])) . "</span> sent :</br>";
	echo "<span>" . $row['message'] . "</span></br></br>";*/
/*}	
}*/

//'<a href="#" class="list-group-item">'.strtoupper($row["user_nicename"]).'</a>'    class="list-group-item"
?>