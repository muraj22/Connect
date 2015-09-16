function profile()
{
  //alert("js called");
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
              //alert(xmlhttp.responseText);
          		$("#user_profile_table").replaceWith(xmlhttp.responseText);
          	}
          }
	}

	var data = "profile.php";
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}