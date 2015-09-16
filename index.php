<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src = "js/welcome_page.js"></script>
	<script type="text/javascript" src = "js/authenticate.js"></script>
</head>
<body>

<?php
if(isset($_SESSION['login']))
{
	session_unset("login");
}
?>

<nav class="navbar navbar-default">
    <div class="container-fluid" style="margin-top:20px">
         <div class="navbar-header">
              <a class="navbar-brand" href="#" ><span style="font-size : 30px;">CONNECT</span></a>
         </div>
         <div>
              <div class="nav navbar-nav navbar-right" style="margin-right:150px">
              <form class="form-inline right" role="form" name="login">
                  <div class="form-group">
                         <label for="email">Email address:</label>
                         <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                         <label for="pwd">Password:</label>
                         <input type="password" class="form-control" id="pwd" name="password">
                  </div>
              </form>
              <button style="float:right ; margin-right:-100px ; margin-top : -33px;" type="submit" class="btn btn-primary" onclick="authenticate()">Submit</button>
          </div>           
    </div>
</nav>  


<div class="container-fluid">
     <div class="row">

         <div class="col-md-7">
              <img src="images/connection.jpg" class="img-responsive" alt="CONNECT LOGO" width="700" height="1400" style="margin-top:30px ; margin-left:30px">
         </div>

         <div class="col-md-1">
         </div>

         <div class = "col-md-3">
              <h3>Create an Account</h3>
              <form role="form" name="create_account">
                    <div class="form-group">
                          <label for="email">Email address:</label>
                          <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="pwd" name="password">
                    </div>
                    <div class="form-group">
                          <label for="name">Nick Name:</label>
                          <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                          <label for="name">Date of birth: (yyyy/mm/dd)</label>
                          <input type="text" class="form-control" id="dob" name="dob">
                    </div>
                    <div class="form-group">
                          <label for="name">Currently working at:</label>
                          <input type="text" class="form-control" id="work" name="work">
                    </div>
                    <div class="checkbox">
                          <label><input type="checkbox"> Remember me</label>
                    </div>
               </form>
               <button type="submit" onclick="message()" class="btn btn-primary">Submit</button>

               </br></br>
               <div id="message_box">
                     
               </div>
         </div>

         <div class = "col-md-1">
         </div>
    </div>
</div>    


</body>
</html>