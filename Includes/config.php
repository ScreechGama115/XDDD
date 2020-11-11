<?php
$host = "localhost";
$dbuser = "root";
$dbpwd = "";
$db = "tapatiojobs";

$connect = mysql_connect ($host, $dbuser, $dbpwd);
	if(!$connect)
		echo ("No se ha conectado a la base de datos");
	else
		$select = mysql_select_db ($db);
?>
