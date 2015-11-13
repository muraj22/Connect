<?php

$data = $_GET['value'];
$con = mysqli_connect('mysql.hostinger.in' , 'u635568779_root' , 'DUKENUKEM' , 'u635568779_data');

$query = "Select * from users WHERE user_nicename LIKE '" . $data . "%' ";

$result = mysqli_query($con , $query);

echo "<div onclick = '$(this).parent().hide();' class='panel panel-default' id='search_results' style='width : 10px><ul class='dropdown-menu follow'>";
while($row = mysqli_fetch_array($result))
{
	echo "<a href='#'><li style='font-size:12px;' onMouseover='call(this.innerText)' class='list-group-item'>" .$row['user_nicename'] . " </li></a>";
}
echo "</ul></div>";

?>