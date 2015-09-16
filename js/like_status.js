function like_status(e)
{
  //alert("js called");
	var name = e.getAttribute("name");

  var button = name.charAt(0);
  var id = name.substring(1, name.length);

  var btn;

  if(button=='+')
  {
    btn = "like";
  }
  else
  {
    btn ="dislike";
  }

	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
              location.reload();
              //alert(xmlhttp.responseText);
          		//$("#posts").replaceWith(xmlhttp.responseText);
          	}
          }
	}

	var data = "like_status.php?&status_id=" + id + "&button=" + btn;
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}