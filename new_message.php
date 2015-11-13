<?php

session_start("login");
include 'include/connection.php';

$db = new Database();
$db->connect();

//$_SESSION['user_id'] = $_SESSION['user_id'];

$query = "select u.user_nicename, m.message from users u JOIN messages m ON u.user_id = m.from_user WHERE (m.to_user=".$_SESSION['user_id'].") ORDER BY id DESC";

$result = $db->run_query($query);


@$num = mysqli_num_rows($result);

if($num==null)
{
	echo '<ul class="dropdown-menu scrollable-menu" role="menu" style="width:300px; padding:5px;"><li><a href="#" class="list-group-item" name="" >Your message box is empty....</a></li></ul>';
}
else
{
echo '<ul class="dropdown-menu scrollable-menu" role="menu" style="width:450px ; padding:5px;">';	
while($row = mysqli_fetch_array($result))
{
	echo '<li style="color:black; background-color:#BFBFFF;" class="dropdown-header"><strong>'.$row[0].' sent :</strong></li>
	      <li style="background-color:#ECECFF;"> <a href="#" style="color:#3C1E1E;">'.$row[1].'</a></li>
	      <li class="divider"></li>';
}
echo '</ul>';
}

//<li class="dropdown-header">Dropdown header 1</li>
      //<li><a href="#">HTML</a></li>
      //<li class="divider"></li>
?>