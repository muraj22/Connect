function refresh_chat()
{
  //alert("refreshing....");
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
          		  $("#display").html(xmlhttp.responseText);
          	}
          }
	}

	var data = "refresh_chat.php";
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}

/// shivam bhai  08056296392
