<head>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>

<?php
include_once 'include/connection.php';

// Gather user information
$email = $_GET['email'];
$password = $_GET['password'];
$name = $_GET['name'];
$dob = $_GET['dob'];
$work = $_GET['work'];

if(empty($email) || empty($password) || empty($name) || empty($dob) || empty($work))
{
	$show = '<div class="alert alert-danger"><p>Please fill all the fields...</p></div>';
}
else
{
$db = new Database();
$db->connect();


$query = "insert into users (user_email , user_pass , user_nicename , dob , work) values ( '$email' , '$password' , '$name' , '$dob' , '$work')";
$result = $db->run_query($query);

if($result)
{
    $show = '<div class="alert alert-success"><p>Account has been created</p></div>';
}
else
{
	$show = '<div class="alert alert-danger"><p>Duplicate user or some problem with Database</p></div>';
}
}

echo $show;
?>