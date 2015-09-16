function message()
{
  //alert("js called");
  var name = document.send_message.name.value;
  var message = document.send_message.message.value;
  var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
          		//location.reload();
              //alert(xmlhttp.responseText);
          		$("#message_sent_status").replaceWith(xmlhttp.responseText);
              
          	}
          }
	}

  var data = "send_message.php?&name=" + name + "&message=" + message;
  xmlhttp.open("get",data,true);
  xmlhttp.send();
}