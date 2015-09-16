
function check_friend()
{
	var friend = document.check_friend.email.value;
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
                    $("#found").replaceWith('<p id="found"></br>No such user exists. Check the id or re-enter.</br></p>');
                    $("#request").removeClass("btn btn-primary active").addClass("btn btn-primary disabled");
    			}
    			else if(xmlhttp.responseText==1)
    			{
                    $("#found").replaceWith('<p id="found"></br>Cannot send a requst to oneself. Please send it to a friend</br></p>');
                    $("#request").removeClass("btn btn-primary active").addClass("btn btn-primary disabled");
    			}
    			else if(xmlhttp.responseText==2)
    			{
    				$("#found").replaceWith('<p id="found"></br>Please provide an email adrees to search for. Field left blank.</br></p>');
                    $("#request").removeClass("btn btn-primary active").addClass("btn btn-primary disabled");
    			}
    			else
    			{	
    			    $("#found").replaceWith("<p id='found'></br>User Exists as " + xmlhttp.responseText +  ". You can add him as your friend</br>");
    			    $("#request").removeClass("btn btn-primary disabled").addClass("btn btn-primary active");
    		    }
    		}
    	}
    }

    var data = "check_friend.php?&email=" + friend;
    xmlhttp.open("get" , data , true);
    xmlhttp.send();

}