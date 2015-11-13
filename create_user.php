<?php
include_once 'include/connection.php';

// Gather user information
$email = $_GET['email'];
$password = $_GET['password'];
$name = $_GET['name'];
$dob = $_GET['dob'];
$dob = date('Y/m/d' , strtotime($dob));
$work = $_GET['work'];
//echo $dob1;

if(empty($email) || empty($password) || empty($name) || empty($dob) || empty($work))
{
	$show = '<div class="alert alert-danger"><p>Please fill all the fields...</p></div>';
}
else
{
$db = new Database();
$db->connect();

//checking for duplicate user
$query = "Select user_email from users where user_email='$email'";
$result = $db->run_query($query);

@$num = mysqli_num_rows($result);
//echo $num;

if($num==0)
{
$query = "insert into users (user_email , user_pass , user_nicename , dob , work) values ( '$email' , '$password' , '$name' , '$dob' , '$work')";
$result = $db->run_query($query);

if($result)
{
    $show = '<div class="alert alert-success"><p>Account has been created</p></div>';
}
}
else
{
	$show = '<div class="alert alert-danger"><p>Duplicate user or some problem with Database</p></div>';
}
}

echo $show;

$show = "";
//echo $num;
?>