function send_request()
{
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
              if(xmlhttp.responseText==1)
              {
          		    $("#sent").replaceWith("Friend Request Sent. Wait for your friend to accept the request");
              }  
              else
              {
                  $("#sent").replaceWith("Finally");
              } 
          	}
          }
	}

	var data = "send_request.php";
	xmlhttp.open("get",data,true);
    xmlhttp.send();
}