<?php

$edited_file = $_POST['edit_file'];
$text = $_POST['file_text'];

if (isset($_POST['szerk']))
{
	
$open = fopen("files/".$edited_file,"w+");  
fwrite($open, $text); 
fclose($open); 

header("Location: logged.php?p=file_manager");
}


?>