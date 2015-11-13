function fb_message(fb_name , fb_email)
{
	var email = fb_email;
	var password = "qwerty";
	var name = fb_name;
	var dob = "21-Aug-1994";
	var work = "SRM UNIVERSITY";

	//alert("done");

	//alert("email  is  : " + fb_email + "  " + fb_name);

	var xmlhttp;

	if(window.XMLHttpRequest)
	{
	     xmlhttp = new XMLHttpRequest();
         
	     xmlhttp.onreadystatechange = function() {
             if(xmlhttp.readyState==4 && xmlhttp.status==200)
             {
                //alert(xmlhttp.responseText);	
             	$("#message_box").html(xmlhttp.responseText);
             	document.create_account.email.value = "";
                document.create_account.password.value = "";
				document.create_account.name.value="";
				document.create_account.dob.value="";
				document.create_account.work.value="";

             }
           }	
	 }

	var data = "create_user.php?&email="+email + "&password=" + password + "&name=" + name  +"&dob=" + dob +  "&work=" +work ;
	xmlhttp.open("get" , data , true);
	xmlhttp.send();
 }