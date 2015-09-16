function decline_request(el)
{
  //alert("huraaya");
  var id = el.getAttribute("name");
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
               //alert(xmlhttp.responseText);
               location.reload();             
          	}
          }
	}

	var data = "decline_request.php?&id="+ id;
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}