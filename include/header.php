<?php

ob_start();

// MySQL kapcsol�d�s �s az adatb�zis (realmd) kijel�l�se
$mysql_connect = mysqli_connect($host, $user, $password) or die("Nem siker�lt csatlakozni az adatb�zishoz!");
db_select($db);

db_query("SET NAMES 'UTF8'");
db_query("SET CHARACTER SET UTF8");

?>