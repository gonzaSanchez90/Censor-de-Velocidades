<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');// seteo de zona horaria	
 function ConectarDB(){
	$db_host = "localhost";
	$db_username = "admin";
	$db_password = "";
	$db_database = "sensores";
	
	$mysqli = new mysqli($db_host, $db_username, $db_password, $db_database);
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
	return $mysqli;
}


?>