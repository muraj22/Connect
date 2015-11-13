function sound1()
{
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
                  // do nothing
                  //alert(xmlhttp.responseText);
          	}
          }
	}

	var data = "sound.php";
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}