
function check_friend()
{
	var friend = document.check_friend.friend_request.value;
    var xmlhttp;

    if(window.XMLHttpRequest)
    {
    	xmlhttp = new XMLHttpRequest;

    	xmlhttp.onreadystatechange = function(){
    		if(xmlhttp.readyState==4 && xmlhttp.status==200)
    		{
    			//alert(xmlhttp.responseText);
    			if(xmlhttp.responseText==0)
    			{
                    $("#found").replaceWith('<p id="found"></br>No such user exists or user already in your friend-list. Check name and re-enter.</br></p>');
                    $("#request").removeClass("btn btn-primary active").addClass("btn btn-primary disabled");
    			}
    			else if(xmlhttp.responseText==1)
    			{
                    $("#found").replaceWith('<p id="found"></br>Cannot send a requst to oneself. Please send it to a friend</br></p>');
                    $("#request").removeClass("btn btn-primary active").addClass("btn btn-primary disabled");
    			}
    			else if(xmlhttp.responseText==2)
    			{
    				$("#found").replaceWith('<p id="found"></br>Please provide the name to search for. Field left blank.</br></p>');
                    $("#request").removeClass("btn btn-primary active").addClass("btn btn-primary disabled");
    			}
                else if(xmlhttp.responseText==3)
                {
                    $("#found").replaceWith('<p id="found"></br>You are already a friend with this person.</br></p>');
                    $("#request").removeClass("btn btn-primary active").addClass("btn btn-primary disabled");
                }
    			else
    			{	
    			    $("#found").replaceWith("<p id='found'></br>User Exists as " + xmlhttp.responseText +  ". You can add him as your friend</br>");
    			    $("#request").removeClass("btn btn-primary disabled").addClass("btn btn-primary active");
    		    }
    		}
    	}
        
            document.getElementById('friend_request').value='';
    }

    var data = "check_friend.php?&name=" + friend;
    xmlhttp.open("get" , data , true);
    xmlhttp.send();

}