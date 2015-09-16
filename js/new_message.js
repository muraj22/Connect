function new_message()
{
  //alert("hello");
  var xmlhttp;

  if(window.XMLHttpRequest)
  {
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                  //alert(xmlhttp.responseText);
                  $("#message_dropdown").replaceWith(xmlhttp.responseText);
              
            }
          }
  }

  var data = "new_message.php";
  xmlhttp.open("get",data,true);
  xmlhttp.send();
}