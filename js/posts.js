function update_post()
{
  //alert("js called");
	var post = document.post.post_area.value;
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
              //alert(xmlhttp.responseText);
          		$("#posts").replaceWith(xmlhttp.responseText);
              location.reload();
          	}
          }
	}

	var data = "post_update.php?&content=" + post;
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}