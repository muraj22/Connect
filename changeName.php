<?php

session_start();
if(isset($_SESSION['friend_name_lv']))
{
	echo ucfirst(strtolower($_SESSION['friend_name_lv']));
}
else
{
	echo "no friend selected";
}

?>