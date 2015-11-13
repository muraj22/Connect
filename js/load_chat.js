function load_chat(e)
{
	//setInterval(function(){ load_chat(e)}, 3000);
	var id = e.getAttribute("name");
	//alert(name);
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
                  //alert(xmlhttp.responseText);
          		  $("#display").html(xmlhttp.responseText);
          		  scroll();
          	}
          }
	}

	var data = "load_chat.php?&id=" + id;
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}