<?php

// MySQL lek�r�s
function db_query( $sql ){

	global $mysql_connect;

	return mysqli_query($mysql_connect, $sql);

}

// MySQL adatb�zis csatlakoz�s
function db_select( $db ){

	global $mysql_connect;

	mysqli_select_db($mysql_connect, $db) or die("Nem siker�lt kijel�lni az adatb�zist! (".$db.")");

}


?>