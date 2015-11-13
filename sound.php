<?php
session_start();

if(isset($_SESSION['sound']))
{
	if($_SESSION['sound']==1)
	{
		$_SESSION['sound']=0;
		echo 0;
	}
	else
	{
		$_SESSION['sound']=1;
		echo 1;
	}
}
?>