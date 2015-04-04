<?php

// MySQL lekérés
function db_query( $sql ){

	global $mysql_connect;

	return mysqli_query($mysql_connect, $sql);

}

// MySQL adatbázis csatlakozás
function db_select( $db ){

	global $mysql_connect;

	mysqli_select_db($mysql_connect, $db) or die("Nem sikerült kijelölni az adatbázist! (".$db.")");

}


?>