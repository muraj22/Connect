
function changeName()
{
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
          		    $("#username").html(xmlhttp.responseText);
                  $("#first_letter").html((xmlhttp.responseText.substring(0,1)).toUpperCase());
          	}
          }
	}

	var data = "changeName.php";
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}