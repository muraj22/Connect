<?php

include_once 'include/connection.php';
session_start("login");	

$db = new Database();
$db->connect();

//$user_id = $_SESSION['user_id'];

$query = "select user_nicename , user_email , dob , work FROM users WHERE user_id = ".$_SESSION['user_id'];
$result = $db->run_query($query);

while($row = mysqli_fetch_array($result))
{
	echo '<table class="table table-striped">
          <tbody>
	      <tr><td style="padding-left:25px;">'.ucfirst(strtolower($row[0])).'</td></tr>
	      <tr><td style="padding-left:25px;">'.$row[1].'</td></tr>
	      <tr><td style="padding-left:25px;">'.date('d-M-Y' , strtotime($row[2])).'</td></tr>
	      <tr><td style="padding-left:25px;">'.ucfirst(strtolower($row[3])).'</td></tr>
	      </tbody>
          </table>';
}

?>