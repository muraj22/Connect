function like_status(e)
{
	var name = e.getAttribute("name");
  //alert(name);

  var button = name.charAt(0);
  var id = name.substring(1, name.length);

  var btn;
  var id_of_number;

  if(button=='+')
  {
    btn = "like";
    id_of_number = "up_"+id;
  }
  else
  {
    btn ="dislike";
    id_of_number = "down_"+id;
  }

  //alert("something");
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
              //alert(xmlhttp.responseText)
              if(btn=="like")
              {
                   $('#' + id_of_number).html(xmlhttp.responseText);
              }
              else if(btn=="dislike")
              {
                   $('#' + id_of_number).html(xmlhttp.responseText);
              }
          	}
          }
	}

	var data = "like_status.php?&status_id=" + id + "&button=" + btn;
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}