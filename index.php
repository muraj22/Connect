<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>

	<script type="text/javascript" src = "js/welcome_page.js"></script>
	<script type="text/javascript" src = "js/authenticate.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">


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
         <div class="navbar-header" style="margin-left:50px;">
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
                         <input type="password" class="form-control" id="pwd_login" name="password">
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

         <!-- AppId :- 1657708141180706 -->

         <div class = "col-md-3">
              <h3>Create an Account</h3>
              <form role="form" name="create_account"> 

                    <div class="form-group">
                          <label for="name">Nick Name:</label>
                          <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                          <label for="name">Date of birth: (yyyy/mm/dd)</label>
                          <input type="date" class="form-control" class="datepicker" data-date-format="yyyy/mm/dd" id="dob" name="dob">
                    </div>
                    <div class="form-group">
                          <label for="email">Email address:</label>
                          <input type="email" class="form-control" id="email2" name="email">
                    </div>
                    <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="pwd" name="password">
                    </div>
                    <div class="form-group">
                          <label for="name">Currently working at:</label>
                          <input type="text" class="form-control" id="work" name="work">
                    </div>
                    <div class="checkbox">
                          <label><input type="checkbox"> Remember me</label>
                    </div>

                    </form>

                    <a href="#" id="login"  class="btn btn-primary" onclick="facebook();" style="background-color: #3b5998; color: #fff; font-size : 14px;"><image src = "images/logo.png" height="24px" width="24px"></image>&nbsp&nbspFill form using Facebook</a></br></br>

                    <button type="submit" onclick="message();" class="btn btn-success">Create Account</button>
               
               
                
                <!--li id="logout-li"><a href="#" id="logout" class="btn btn-primary">Logout</a></li-->
                
               </br></br>
               <div id="message_box">
                     <!--show alerts here-->
               </div>
         </div>

         <div class = "col-md-1">
         </div>
    </div>
</div>      
  
  <script>
  // Load the SDK asynchronously

    //function facebook(){

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <script type="text/javascript">
  // Load the SDK asynchronously
  
  
       //alert("vdgs");
      /* $("#message_box").html("");
        document.create_account.email.value = "";
        document.create_account.password.value = "";
        document.create_account.name.value="";
        document.create_account.dob.value="";
        document.create_account.work.value="";

        $('#name').css({ "border": ''});
        $('#email2').css({ "border": ''});
        $('#dob').css({ "border": ''});
        $('#pwd').css({ "border": ''});
        $('#work').css({ "border": ''});*/
        //alert("jammed");

    /*(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk')); */
      
      //alert("fsf");

     // $(function() {    

  var app_id = '1657708141180706';
  var scopes = 'email, user_friends,user_birthday,user_work_history';

  var btn_login = '<li id="login-li"><a href="#" id="login" style="background-color: #3b5998; padding: 7px auto; color: #fff; font-size: 10px;" >Login</a></li>';

  var btn_logout = '<li id="logout-li"><a href="#" id="logout" class="btn">Logout</a></li>';
  
  window.fbAsyncInit = function() {

      FB.init({
        appId      : app_id,
        status     : true,
        cookie     : true, 
        xfbml      : true, 
        version    : 'v2.2'
      });

      FB.getLoginStatus(function(response) {
        statusChangeCallback(response, function() {});
      });
    };

    function facebook()
    {
      checkLoginState(function(data){
        if(data.status == 'connected')
        {
          //document.create_account.dob.value="";
          getFacebookData();

        }
      });
    }

    var statusChangeCallback = function(response, callback) {
      console.log(response);
      
      if (response.status === 'connected') {
          //getFacebookData();
         
          
      } else {
        callback(false);
      }
    }

    var checkLoginState = function(callback) {
      FB.getLoginStatus(function(response) {
          callback(response);
      });
    }
    
    var getFacebookData =  function() {
      FB.api('/me', function(response) {
    
        console.log("Name : "+response.name);
        $("#name").val(response.name);
        $('#name').css({ "border": '#66afe9 1px solid'});
        console.log("Picture : http://graph.facebook.com/"+response.id+"/picture?width=100&height=100");
        
      });

      FB.api('/me?fields=email', function(response){
        console.log("Email :- "+response.email);
        $("#email2").val(response.email);
        $('#email2').css({ "border": '#66afe9 1px solid'});
        //facebookLogout();
      });

      FB.api('/me?fields=birthday',function(response){
        if(response["birthday"]!=null){
        console.log("Birthday :- "+response.birthday);
        var d = new Date(response.birthday);
        $("#dob").val(convertFormat(d));
        $('#dob').css({ "border": '#66afe9 1px solid'});
      }
        //facebookLogout();

      });

      FB.api('/me?fields=work',function(response){
        if(response["work"]!=null)
        {
          console.log("Work :- "+response["work"][0]["employer"]["name"]);
          $("#work").val(response["work"][0]["employer"]["name"]);
          $("#work").css({ "border": '#66afe9 1px solid'});
          $("#create_account").submit();
          $('#pwd').css({ "border": '#D00000 1px solid'});
        }
        //facebookLogout();
 
      });
      
    }

    var facebookLogin = function() {
      checkLoginState(function(data) {
        if (data.status !== 'connected') {
          FB.login(function(response) {
            if (response.status === 'connected'){
              getFacebookData();

              
              }
          }, {scope: scopes});
        }
      })
    }

    var facebookLogout = function() {
      checkLoginState(function(data) {
        if (data.status === 'connected') {
        FB.logout(function(response) {
          
          console.log("Logout Done!");
          
        })
      }
      })

    }

    $(document).on('click', '#login', function(e) {
      e.preventDefault();
      facebookLogin();
    })

    $(document).on('click', '#logout', function(e) {
      e.preventDefault();

      if (confirm("Are you sure?"))
        facebookLogout();
      else 
        return false;
    })

//})

//} // end of function facebook

    //Converting the date format into yyyy-mm-dd
      function convertFormat(d)
      {
         var yyyy = d.getFullYear().toString();
        var mm = (d.getMonth()+1).toString(); // getMonth() is zero-based
        var dd  = d.getDate().toString();
        return yyyy +"-"+ (mm[1]?mm:"0"+mm[0]) +"-"+ (dd[1]?dd:"0"+dd[0]); 
      }

   </script>


</body>
</html>