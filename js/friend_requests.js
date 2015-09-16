function friend_requests()
{
  //alert("hello");
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
                  //alert(xmlhttp.responseText);
          		    $("#request_dropdown").replaceWith(xmlhttp.responseText);
              
          	}
          }
	}

	var data = "friend_requests.php";
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}