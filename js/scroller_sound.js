function scroller_sound()
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
                   //play_sound();
                }
          	}
          }
	}

	var data = "scroller_sound.php";
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}