<?php

if(isset($_POST['keres'])){

$search_file = $_POST['edit_file'];
$search = $_POST['search'];
$lines = file("files/".$search_file);

$found = false;
echo "<form action=''  method='post'>";
echo "<input type='hidden'	name='sr_file' value='" . $search_file . "'>";
echo "<div align='center'>";
echo "<textarea name='file_text' rows='40' cols='140' id='elm1'>";

foreach($lines as $line)
{
  if(strpos($line, $search) !== false)
  {
    $found = true;
	echo $line;
  }
}
echo "</textarea><br>";
echo "<br>";
echo "<input class=button type=submit name=keres_szerk value=Szerkeszt><br></form>";
echo "</form>";
echo "</div>";

if(!$found)
{
  echo 'Nincs találat';
}
};


?>

<?php

if (isset($_POST['keres_szerk']))
{
	
$sf = $_POST['sr_file'];
$text = $_POST['file_text'];
	
$open = fopen("files/".$sf,"w+");  
fwrite($open, $text); 
fclose($open); 

header("Location: logged.php?p=file_manager");
}


?>


