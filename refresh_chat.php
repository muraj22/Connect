<?php

session_start("login");
include 'include/connection.php';

$db = new Database();
$db->connect();

if(isset($_SESSION['friend_id_lv']))
{
$query = "Select * from messages m JOIN users u ON (m.from_user = u.user_id) WHERE ((m.from_user=".$_SESSION['user_id']." AND m.to_user=".$_SESSION['friend_id_lv'].") OR (m.from_user = ".$_SESSION['friend_id_lv']." AND m.to_user= ".$_SESSION['user_id']."))";

$result = $db->run_query($query);

@$num = mysqli_num_rows($result);
if(!isset($_SESSION['scroll']))
{
  $_SESSION['scroll'] = $num;
}
else
{
	if($num!=$_SESSION['scroll'])
	{
		$_SESSION['scroll'] = $num;
		echo $_SESSION['sound'];
		if($_SESSION['sound'] == 1)
		    echo "<script> play_sound();</script>";
	}
}

/*if($num==0)
{
	echo '<a href="#" class="list-group-item" name="" >Find some friends .....</br></br>
	           search for your friends and send hem  request.....</br></br></a>';
}

else
{*/
	
echo "<table width=100% cellpadding='10'>";	
while($row = mysqli_fetch_array($result))
{
	if(strcmp(strtolower($row['user_nicename']) , strtolower($_SESSION['name'])) == 0)
	{
        echo "<tr><td><div class='panel panel-default' style='border-radius:10px;padding:5px; word-wrap:break-word;max-width:400px;float:right;background-color:#1E88E5;position :relative;><div class='panel-body'>
              <span style='color:white;'>" . $row['message'] . "</span></div></div></td></tr>";

        /*echo "<tr><td><div class='panel panel-default' style='border-radius:10px;padding:5px; word-wrap:break-word; display:inline; border:0px solid white ;max-width:400px;float:right;background-color:#1E88E5;position :relative;><div class='panel-body'><span style='color:white; font-weight:700; font-family:cursive'>" .ucfirst(strtolower($row['user_nicename'])) . "</span> : </br>
              <span style='color:white;'>" . $row['message'] . "</span></br></br></div></div></td></tr>";*/      
	}
	else
	{
		echo "<tr><td><div class='panel panel-default' style='border-radius:10px;padding:5px; word-wrap:break-word; max-width:400px; float:left; background-color:#D1C4E9; position:relative;><div class='panel-body'>
              <span style='color:black';>" . $row['message'] . "</span></div></div></td></tr>";

		/*echo "<tr><td><div class='panel panel-default' style='border-radius:10px;padding:5px; word-wrap:break-word; display:inline; border:0px solid white; max-width:400px; float:left; background-color:#D1C4E9; position:relative;><div class='panel-body'><span style='color:black ; font-weight:700; font-family:cursive'>" .ucfirst(strtolower($row['user_nicename'])) . "</span> : </br>
		      <span style='color:black';>" . $row['message'] . "</span></br></br></div></div></td></tr>";*/
		
    }
}	
echo "</table>";
//}
}
else
{
	echo "Welcome to the messenger</br> Please choose a friend to start conversation ....";
}

$db->disconnect();

//'<a href="#" class="list-group-item">'.strtoupper($row["user_nicename"]).'</a>'    class="list-group-item"
?>