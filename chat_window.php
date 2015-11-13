<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="js/create_friendlist.js"></script>
    <script type="text/javascript" src="js/load_chat.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/save_chat_to_database.js"></script>
    <script type="text/javascript" src="js/refresh_chat.js"></script>
    <script type="text/javascript" src="js/changeName.js"></script>
    <script type="text/javascript" src="js/logout.js"></script>
    <script type="text/javascript" src="js/sound.js"></script>
    <script type="text/javascript" src="js/scroller_sound.js"></script>

	<style>

	body
	{
		
    background-image:url('images/chat_back.jpg'); 
	}

	#container
	{
		overflow:scroll;
	}
	</style>
</head>
<body onload="create_friendlist();scroll();">

  <div id="current_user" style="position:absolute;margin-left:1000px;margin-top:20px;">
     <span style="color:white">Currently Logged in as : </span>
     <span style="font-size:20px;color:#d9534f"><?php session_start(); echo ucfirst(strtolower($_SESSION['name']));?></span>
  </div>
  <div style="width:700px ; height:100px; position:absolute;margin-left:130px;margin-top:20px;"><p style="color:white;font-family:cursive;font-size:40px;">messenger</p></div>
                  <div>
                    <span onclick="logout_menu()" style="float:right ; 
                          margin-right:15px ;margin-top:17px; margin-bottom:10px;"><button style="font-size:18px;border-radius:100%" class="btn btn-danger"><?php echo strtoupper(substr($_SESSION['name'], 0 , 1));?></button></span>

                    <div id="logout_panel" class="panel panel-danger" style="visibility:hidden ; width:300px ; height:110px; position:absolute; margin-left:1060px; margin-top:65px; z-index:+1">
                    <div class="panel-body">
                        <div style="float:left;"><button style="border-radius:100%" class="btn btn-danger btn-lg"><span style="font-size:37px;">&nbsp<?php echo strtoupper(substr($_SESSION['name'], 0 , 1));?>&nbsp</span></button></span></div>
                        <div style="float:left ; margin-left:15px;">
                        </br>
                        <span style="font-size:17px;color:#003300"><?php echo ucfirst(strtolower($_SESSION['name']));?></span></br>
                        <span style="font-size:15px;color:grey"><?php echo strtolower($_SESSION['email']);?></span>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <table width="100%">
                        <tr><td><button class="btn btn-default btn-md" disabled="true" onclick="logout()">Edit Profile&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></button></td>
                        <td><button class="btn btn-default btn-md" onclick="logout()">Log Out&nbsp&nbsp<span class="glyphicon glyphicon-off"></span></button></td></tr>
                        </table>
                    </div>
                    </div>
                 </div>
  <!--div id="current" style='position:absolute; margin-top:90px;margin-left:600px;'><span style='color:red;'>Currently chatting to &nbsp<span id="username" style='color:white;font-size:16px;'><?php //if(isset($_SESSION['friend_name_lv'])) echo ucfirst(strtolower($_SESSION['friend_name_lv'])); else echo '  . . . . .';?></span></span></div--> 
   <div class="row">
       <div class="col-md-1">
       
       </div>

       <div class="col-md-7" style="margin-top:120px;">
          <div class="panel panel-info" style="position:fixed;">
	          <div class="panel-body">
            <div style="height:45px ; width:732px ; background-color:#065E52; position:fixed ; z-index:+1">
            <span style="float:left">
               <div id="current" style="margin-top:5px ; margin-left:20px; "><button style="font-size:14px;border-radius:100%" class="btn btn-danger" id="first_letter"><?php if(isset($_SESSION['friend_name_lv'])) echo strtoupper(substr($_SESSION['friend_name_lv'], 0 , 1)); else echo "_" ;?></button></span>&nbsp&nbsp<span id="username" style='color:white;font-size:15px;'><?php if(isset($_SESSION['friend_name_lv'])) echo ucfirst(strtolower($_SESSION['friend_name_lv'])); else echo 'no friend selected';?></span></div>
            </span>
            <span style="float:right">
                <div id="chat_sound">
                   <!--p style="color:white">Notification sound</p-->
                   <a href="#"><span id="mute" class="glyphicon glyphicon-volume-up" style="font-size:30px;color:white;margin-top:5px;margin-right:20px;"></span></a>
               </div>              
            </span>
            </div>
	          	<div id="chat_space" style="padding-left:30px;padding-right:30px;padding-top:60px;height:400px ; width:750px ; background-image:url('images/back.jpg') ;overflow-y:scroll;">    <!--#f15d58-->
	          	    <p id="display" style="color:red;font-family:sans-serif;font-size:14px;">loading chat for you ...</p>
                       <!--display chats here-->
	          	</div>
	          </div>
	          <div class="panel-footer">
	                <div id="footer-container">
	                <div class="row">
	                    <div class="col-md-10">
			          	    <div class="form-group">
		                        <input id="message" type="text" class="form-control">
		                    </div>
	                    </div>

	                    <div class="col-md-2">
	                      	<button onclick="save_chat_to_database(); scroll(); refresh_chat();" type="button" class="btn btn-success btn-block">send</button>
	                    </div>
                    </div>
                    </div>
	          </div>
          </div>
       </div>

       <div class="col-md-1">
       </div>

       <div class="col-md-3">
            <div class="list-group" style="width:300px;position:fixed;margin-left:20px;margin-top:120px;">
                   <a href="#" class="list-group-item disabled">
                       <span class="glyphicon glyphicon-user" style="color:#065E52"></span>&nbsp&nbsp
                       <span style="color:#065E52">Friend List</span> 
                   </a>
                   <div id="friends">
                       <!--put friends here-->
                       
                   </div>
              </div>
       </div>
   </div>

   <!--div id="chat_sound" style="position:absolute;margin-left:1200px;width:200px;height:100px;">
       <!--p style="color:white">Notification sound</p-->
       <!--a href="#"><span id="mute" class="glyphicon glyphicon-volume-up" style="font-size:50px;color:red;"></span></a>
   </div-->


  <script type="text/javascript">
    
    setInterval (function() {
    	refresh_chat();
    	//scroll();
    	//alert("refreshing chat");
    } , 1000);

    function scroll()
    {
    	$("#chat_space").animate({ scrollTop: $(document).height()+10000000}, 'slow');
      scroller_sound();
    }


    var check=1;
    function logout_menu()
    {
        if(check==1)
        {
            check=0;
            document.getElementById("logout_panel").style.visibility = "hidden";
        }
        else
        {
             check=1;
             document.getElementById("logout_panel").style.visibility = "visible"; 
             setTimeout(function(){ 
                    document.getElementById("logout_panel").style.visibility = "hidden";
                    check=0;
             }, 10000); 
        }
    }

    $("#mute").click(function() {
    var myClass = $(this).attr("class");
    
    if(myClass=="glyphicon glyphicon-volume-up")
    {
      $("#mute").removeClass("glyphicon glyphicon-volume-up").addClass("glyphicon glyphicon-volume-off");
      sound1();
    }
    else
    {
      $("#mute").removeClass("glyphicon glyphicon-volume-off").addClass("glyphicon glyphicon-volume-up");
      sound1();
    }
   });

   var sound = new Audio();
   sound.src = "sounds/message.mp3";

   function play_sound()
   {
       sound.play();
   }

   function pause_sound()
   {
      sound.pause();
   }

window.addEventListener("keydown", dealWithKeyboard, false);

function dealWithKeyboard(e)
    {
      if(e.keyCode == 13)
      { 
           // check for focus in the text box
           save_chat_to_database();
           scroll();
           refresh_chat();
      }
    } 

  </script>



<?php

$_SESSION['sound'] = 1;
  
?>

</body>
</html>
