<?php
session_start();

if(isset($_SESSION['sound']))
{
   echo $_SESSION['sound'];
}
?>