<?php

function post_status()
{
include_once 'include/connection.php';	

$db = new Database();
$db->connect();
//$_SESSION['user_id'] = $_SESSION['user_id'];

//$query1 = "select * from status NATURAL JOIN friends NATURAL JOIN users WHERE ((user_id =".$_SESSION['user_id']." OR friend_id=".$_SESSION['user_id']." )AND request_pending=1) ORDER BY status_id DESC";
$query1 = "select * from status NATURAL JOIN users WHERE (user_id = ".$_SESSION['user_id']."  OR user_id IN (Select friend_id from friends where user_id=".$_SESSION['user_id']." )) ORDER BY status_id DESC";
$result = $db->run_query($query1);

@$num = mysqli_num_rows($result);

if($num==0)
{
    /* $query2 = "select * from status NATURAL JOIN users WHERE user_id = ".$_SESSION['user_id']." ORDER BY status_id DESC";
     $result1 = $db->run_query($query2);

     while($row = mysqli_fetch_array($result1))
         {
	             echo '<div class="panel panel-primary">
	             <div class="panel-body"><strong>'.
	             ucfirst(strtolower($row["user_nicename"])).'</strong> posted on <strong>'.$row["time"] .'</strong></br> <hr width="100%"></hr>'.
	             $row["content"].' </br> '.'
	             </div>

	             <div class="panel-footer">
	             <a href="#" onclick="like_status(this); return false;" name="+'.$row["status_id"].'"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp</a><font face="verdana" color="green"><span id="up_'.$row['status_id'].'">'.$row["likes"].'</span> likes</font>&nbsp&nbsp&nbsp
                 <a href="#" onclick="like_status(this); return false;" name="-'.$row["status_id"].'"><span class="glyphicon glyphicon-thumbs-down"></span>&nbsp</a><font face="verdana" color="red"><span id="down_'.$row['status_id'].'">'.$row["dislikes"].'</span> dislikes </font>
  	             </div>
	             </div>';
//OR s.user_id = $_SESSION['user_id']

         }*/

         echo "<div style='margin-top:40px;' class='panel panel-primary'>
                    <div class='panel-body' style='background-color:white; border:1px double white; border-radius:8px;'>
                    <span style=' color:#286090; font-family:monospace; font-size:18px; font-weight:500;'><p>Welcome..Know all that is there!!</p></span>
                    <p style='color:#787878; text-align:justify;'>Welcome to Connect. It allows you to find old friends to connect with and to discover new ones and 

it's finally here to make your social scene hip and happening.Share your thoughts and read those 

of others, post statuses and send friend requests to your friends and interests. Use the 

interactive search bar to see if the people you know have discovered this plethora of activity 

too. Apart from this, you have the option of whether to accept a friend request or not, and to 

like or dislike any post.</p>
                    <p><span style='float:right; font-family:cursive; font-size:15px' ; >start exploring.....</span></p>
                    </div>
               </div>";     
}

else
{
while($row = mysqli_fetch_array($result))
{
	echo '<div class="panel panel-primary">
	             <div class="panel-body"><span style="color:#606060"><strong>'.
	             ucfirst(strtolower($row["user_nicename"])).'</strong></span> posted on <strong style="color:#606060">'.date('d-M-y' , strtotime($row["time"])) .'</strong></br> <hr width="100%"></hr><span style="word-wrap:break-word">'.
	             $row["content"].'</span> </br> '.'
	             </div>

	             <div class="panel-footer">
	             <a href="#" onclick="like_status(this); return false;" name="+'.$row["status_id"].'"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp</a><font face="verdana" color="#006600"><span id="up_'.$row['status_id'].'">'.$row["likes"].'</span> likes </font>&nbsp&nbsp&nbsp
                 <a href="#" onclick="like_status(this); return false;" name="-'.$row["status_id"].'"><span class="glyphicon glyphicon-thumbs-down"></span>&nbsp</a><font face="verdana" color="#A00000 "><span id="down_'.$row['status_id'].'">'.$row["dislikes"].'</span> dislikes </font>
  	             </div>
	             </div>';
//OR s.user_id = $_SESSION['user_id']
}
}
}

//select * from status s JOIN friends f ON (s.user_id = f.friend_id OR s.user_id = $_SESSION['user_id']) JOIN users u ON (u.user_id = s.user_id) WHERE f.user_id = $_SESSION['user_id']"

// final one
// "select * from (users NATURAL JOIN friends) NATURAL JOIN status WHERE (user_id = $_SESSION['user_id'] OR friend_id=$_SESSION['user_id'])";
?>
