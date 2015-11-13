function save_chat_to_database()
{
  var message = document.getElementById("message").value;
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
                /*if(message!="" && xmlhttp.responseText==1)
                 play_sound();*/
          		  $("#message").val("");
          	}
          }
	}

	var data = "save_chat_to_database.php?&message=" + message;
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}