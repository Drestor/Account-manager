<?php

ob_start();

// MySQL kapcsolódás és az adatbázis (realmd) kijelölése
$mysql_connect = mysqli_connect($host, $user, $password) or die("Nem sikerült csatlakozni az adatbázishoz!");
db_select($db);

db_query("SET NAMES 'UTF8'");
db_query("SET CHARACTER SET UTF8");

?>