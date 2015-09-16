function accept_request(el)
{
    var id = el.getAttribute("name");
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
               location.reload();             
          	}
          }
	}

	var data = "accept_request.php?&id="+ id;
	xmlhttp.open("get",data,true);
    xmlhttp.send();
}