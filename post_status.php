<?php

function post_status()
{
include_once 'include/connection.php';	

$db = new Database();
$db->connect();
$user_id = $_SESSION['user_id'];

$query1 = "select * from status NATURAL JOIN friends NATURAL JOIN users WHERE ((user_id = $user_id OR friend_id=$user_id )AND request_pending=1) ORDER BY status_id DESC";

$result = $db->run_query($query1);

@$num = mysqli_num_rows($result);

if($num==0)
{
     $query2 = "select * from status NATURAL JOIN users WHERE user_id = $user_id ORDER BY status_id DESC";
     $result1 = $db->run_query($query2);

     while($row = mysqli_fetch_array($result1))
         {
	             echo '<div class="panel panel-primary">
	             <div class="panel-body"><strong>'.
	             $row["user_nicename"].'</strong> posted on <strong>'.$row["time"] .'</strong></br> <hr width="100%"></hr>'.
	             $row["content"].' </br> '.'
	             </div>

	             <div class="panel-footer">
	             <a href="#" onclick="like_status(this)" name="+'.$row["status_id"].'"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp</a><font face="verdana" color="green">'.$row["likes"].' likes </font>&nbsp&nbsp&nbsp
                 <a href="#" onclick="like_status(this)" name="-'.$row["status_id"].'"><span class="glyphicon glyphicon-thumbs-down"></span>&nbsp</a><font face="verdana" color="green">'.$row["dislikes"].' dislikes </font>
  	             </div>
	             </div>';
//OR s.user_id = $user_id

         }
}

else
{
while($row = mysqli_fetch_array($result))
{
	echo '<div class="panel panel-primary">
	             <div class="panel-body"><strong>'.
	             $row["user_nicename"].'</strong> posted on <strong>'.$row["time"] .'</strong></br> <hr width="100%"></hr>'.
	             $row["content"].' </br> '.'
	             </div>

	             <div class="panel-footer">
	             <a href="#" onclick="like_status(this)" name="+'.$row["status_id"].'"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp</a><font face="verdana" color="green">'.$row["likes"].' likes </font>&nbsp&nbsp&nbsp
                 <a href="#" onclick="like_status(this)" name="-'.$row["status_id"].'"><span class="glyphicon glyphicon-thumbs-down"></span>&nbsp</a><font face="verdana" color="green">'.$row["dislikes"].' dislikes </font>
  	             </div>
	             </div>';
//OR s.user_id = $user_id
}
}
}

//select * from status s JOIN friends f ON (s.user_id = f.friend_id OR s.user_id = $user_id) JOIN users u ON (u.user_id = s.user_id) WHERE f.user_id = $user_id"

// final one
// "select * from (users NATURAL JOIN friends) NATURAL JOIN status WHERE (user_id = $user_id OR friend_id=$user_id)";
?>
