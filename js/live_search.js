function live_search(value)
{
	//alert("helooo");
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {
            	//alert(xmlhttp.responseText);
            	if(value!="")
            	{
            	    $('#show').html(xmlhttp.responseText);
                }
                else
                {
                    $('#show').html("");
                }
            }
		}
	}

	var data = "live_search.php?&value=" + value;
    xmlhttp.open("get" , data , true);
    xmlhttp.send();
}