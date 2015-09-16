<!DOCTYPE html>
<html>

<head>
	<title></title>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/check_friend.js"></script>
	<script type="text/javascript" src="js/send_request.js"></script>
    <script type="text/javascript" src="js/posts.js"></script>
    <script type="text/javascript" src="js/create_friendlist.js"></script>
    <script type="text/javascript" src="js/friend_requests.js"></script>
    <script type="text/javascript" src="js/accept_request.js"></script>
    <script type="text/javascript" src="js/send_message.js"></script>
    <script type="text/javascript" src="js/new_message.js"></script>
    <script type="text/javascript" src="js/profile.js"></script>
    <script type="text/javascript" src="js/like_status.js"></script>
    <script type="text/javascript" src="js/logout.js"></script>
    <script type="text/javascript" src="js/decline_request.js"></script>

    <style>

    .scrollable-menu {
    height: auto;
    max-height: 300px;
    overflow-x: hidden;}


</style>
</head>

<body onload="create_friendlist() , profile()">

<?php
session_start("login");
?>

<script type="text/javascript">

$(document).ready(function(){	
$('#call_javascript').click(function(){
	check_friend();
});
});

$(document).ready(function(){	
$('#request').click(function(){
	send_request();
});
});

</script>

<nav class="navbar navbar-default"> 
    <div class="container-fluid">
         <div class="navbar-header">
              <a class="navbar-brand" href="#" ><span style="font-size : 30px">CONNECT</span></a>
         </div>
                  
 <!-------------------------------------------------------------------------------------------------------------------------------------------------------------->                 
                  
                  
                  <div style="position:absolute;right:555px;top:21px">
                       <h5 style="color:#6868 ;" >Welcome <?php echo strtoupper($_SESSION['name']);?> <a href="#" ><strong>&nbsp|&nbsp</strong></a></h5>

                  </div>

                  <div class="dropdown" style="position:absolute;right:415px;top:21px;">
                       <button onclick="friend_requests()" class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown" style="border-radius:100%"><span class="glyphicon glyphicon-tasks"></span> 
                       </button>
                       
                            <div id="request_dropdown">
                                <!--show all friend requests here-->
                            </div>
                  </div>


                  <div class="dropdown clearfix"style="position:absolute;right:455px;top:21px">
                       <button onclick="new_message()" class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown" style="border-radius:100%"><span class="glyphicon glyphicon-comment"></span> 
                       </button>
                       
                            <div id="message_dropdown">
                                <!--show all messages here-->    
                            </div>
                    
                  </div>

                  <div class="dropdown" style="position:absolute;right:495px;top:21px">
                       <button onclick="" class="btn btn-primary dropdown-toggle btn-sm" type="button" style="border-radius:100%" data-toggle="modal" data-target="#send_message"><span class="glyphicon glyphicon-envelope"></span> 
                       </button>
                       <ul class="dropdown-menu">
                            <div id="send_message_dropdown">
                                <!--send messages from here-->    
                            </div>
                       </ul>
                  </div>


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------>


      <!-- MODAL FOR SENDING MESSAGE-->
<div class="modal fade" id="send_message" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
        <form name="send_message">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Recipient: (name as in friend list)</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" name="message"></textarea>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="message()" data-toggle="modal" data-target="#message_sent_modal">Send message</button>

         <div id="message_sent_modal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="message_sent_status"></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>   
                </div>
           </div>
        </div>
      </div>
    </div>
  </div> 
</div>





<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
              <div class="nav navbar-nav navbar-right" style="width:270px;top:20px;position:relative;right:100px">

                 <!--MODAL HAS BEEN CREATED-->

                  <form role="form" class="form-inline" name="check_friend">
                       <div class="form-group" style="position:absolute;">
                             <input type="text" class="form-control" id="friend_request" placeholder="send request" name="email">
                       </div>
                  </form>

                  <button type="submit" data-toggle="modal" data-target="#myModal" class="btn btn-primary" style="position:absolute;right:0px;" id="call_javascript">Check</button>
                  <!-- Modal -->
                  <div id="myModal" class="modal fade" role="dialog">
                       <div class="modal-dialog modal-sm">
                           <!-- Modal content-->
                           <div class="modal-content">
                               <div class="modal-header">
                                        <h4 class="modal-title">Searching for your friend .... </h4>
                                </div>
                                <div class="modal-body">
                                    <p id="found">
                                         <!-- add content here through ajax -->
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary active" id="request" data-toggle="modal" data-target="#myModal1">Send Request</button>

                                    <div id="myModal1" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                             <!-- Modal content-->
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                        <h4 class="modal-title" id="sent"></h4>
                                                   </div>
                                                   <div class="modal-footer">
                                                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                   </div>   
                                              </div>
                                        </div>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>


                 <div >
                    <span class="glyphicon glyphicon-user" style="font-size:50px; float:right ; 
                                        margin-right:10px ;margin-top:10px; margin-bottom:10px;"> </span>
                 </div>                              
    </div>
</nav>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->


<div class="container-fluid">
    <div class="row">
         
         <div class="col-md-3">
         </div>
       


         <div class="col-md-5" >
               <form role="form" name="post">
                    <div class="form-group">
                         <textarea class="form-control" rows="5" name="content" placeholder="What's on your mind" id="post_area"></textarea>
                    </div>
               </form>         
               <button class="btn btn-primary" onclick="update_post()" style="margin-left:420px;">Post Status</button>  
         </div> 


          <div class="col-md-1">

          </div>



          <div class = "col-md-2">
              <div class="list-group" style="width:300px;position:fixed;margin-left:-60px;">
                   <a href="#" class="list-group-item active">
                       <span class="glyphicon glyphicon-user"></span>&nbsp&nbsp
                       Friend List 
                   </a>
                   <div id="friends">
                       <!--put friends here-->
                       
                   </div>
              </div>
          </div> 

          <div class="col-md-1">
          </div>


     </div>
</div>

<!---------------------------------------------------------------------------------------------------------------------------------------------------------------->
          
<div class = "container-fluid">
    <div class="row">

        <div class="col-md-3">
        	
        </div>

        <div class="col-md-3" style="margin-top : -160px ;margin-left:95px; position : fixed" >
        	               <!--put user profile here-->
             <div class="panel panel-default" style="position:fixed">
                  <div class="panel-heading"><center>User Profile</center></div>
                  <div id="image"><center><img width=170px height=120px src="images/web-user.jpg" class="img-rounded" alt="Cinque Terre" width="320" height="236"></center></div>
                  <div class="panel-body">
                  	  <div>
                         <div id="user_profile_table">
                                <!-- user deatils here-->
                         </div>
                         <center><button class="btn btn-primary" onclick="logout()">Log Out&nbsp&nbsp<span class="glyphicon glyphicon-off"></span></button></center>
                  	  </div>
                  </div>
             </div>
        </div>

         <!--div class="col-md-5"></div-->

        <div class="col-md-5"> 
          <div class="container-fluid" id="posts">
                 </br>
                 <?php include_once 'post_status.php';
                        post_status();
                 ?>
          </div>
        </div>
        
        <div class="col-md-3">
            <!--intensionalyy left blank-->
        </div>  

</body>
</html>

<!--<?php //include_once 'post_status.php';
                        post_status();
            //          ?-->