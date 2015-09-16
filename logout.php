<?php

session_start("login");	

if (isset($_SESSION)) {
    session_unset('login');
    echo 1;

}

?>