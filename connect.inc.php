<?php
$mysql_host="localhost";
$mysql_user="root";
$mysql_pass="";

$mysqldb="adatabase";
$db=mysqli_connect($mysql_host,$mysql_user,$mysql_pass, $mysqldb);
//$conn= new msqli($mysql_host,$mysql_user,$mysql_pass, $mysqldb);

if($db) {

	      //echo "Connection success";

} 
else{
	 die('ERROR OCCURED WHILE CONNECTING TO THE SERVER');
		}


?>