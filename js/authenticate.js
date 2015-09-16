function authenticate()
{
	var email = document.login.email.value;
	var password = document.login.password.value;

	var xmlhttp;

	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
             if(xmlhttp.readyState==4 && xmlhttp.status==200)
             {
                if(xmlhttp.responseText == 1)
                {
                	window.location = "demo_post.php";
                }
                else
                {		
             	    $('#message_box').replaceWith('<div class="alert alert-danger"><p>User Id and Password do not match or no such user exists.</p></div>');
                }
             }
		}
	}

	var data = "authenticate.php?&email="+ email + "&password=" + password;
	xmlhttp.open("get" , data , true);
	xmlhttp.send();
}