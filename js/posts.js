function update_post()
{
	var post = document.post.post_area.value;
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
          		$("#posts").replaceWith(xmlhttp.responseText);
              location.reload();
          	}
          }
	}

	var data = "post_update.php?&content=" + post;
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}