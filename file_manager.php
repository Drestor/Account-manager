<STYLE type="text/css">

.dropdown {
  display: inline-block;
  position: relative;
  overflow: hidden;
  height: 28px;
  width: 150px;
  background: #f2f2f2;
  border: 1px solid;
  border-color: white #f7f7f7 whitesmoke;
  border-radius: 3px;
  background-image: -webkit-linear-gradient(top, transparent, rgba(0, 0, 0, 0.06));
  background-image: -moz-linear-gradient(top, transparent, rgba(0, 0, 0, 0.06));
  background-image: -o-linear-gradient(top, transparent, rgba(0, 0, 0, 0.06));
  background-image: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.06));
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
}

.dropdown:before, .dropdown:after {
  content: '';
  position: absolute;
  z-index: 2;
  top: 9px;
  right: 10px;
  width: 0;
  height: 0;
  border: 4px dashed;
  border-color: #888888 transparent;
  pointer-events: none;
}

.dropdown:before {
  border-bottom-style: solid;
  border-top: none;
}

.dropdown:after {
  margin-top: 7px;
  border-top-style: solid;
  border-bottom: none;
}

.dropdown-select {
  position: relative;
  width: 130%;
  margin: 0;
  padding: 6px 8px 6px 10px;
  height: 28px;
  line-height: 14px;
  font-size: 12px;
  color: #62717a;
  text-shadow: 0 1px white;
  background: #f2f2f2; /* Fallback for IE 8 */
  background: rgba(0, 0, 0, 0) !important; /* "transparent" doesn't work with Opera */
  border: 0;
  border-radius: 0;
  -webkit-appearance: none;
}

.dropdown-select:focus {
  z-index: 3;
  width: 100%;
  color: #394349;
  outline: 2px solid #49aff2;
  outline: 2px solid -webkit-focus-ring-color;
  outline-offset: -2px;
}

.dropdown-select > option {
  margin: 3px;
  padding: 6px 8px;
  text-shadow: none;
  background: #f2f2f2;
  border-radius: 3px;
  cursor: pointer;
  
}

/* Fix for IE 8 putting the arrows behind the select element. */

.lt-ie9 .dropdown {
  z-index: 1;
}

.lt-ie9 .dropdown-select {
  z-index: -1;
}

.lt-ie9 .dropdown-select:focus {
  z-index: 3;
}

/* Dirty fix for Firefox adding padding where it shouldn't. */

@-moz-document url-prefix() {
  .dropdown-select {
    padding-left: 6px;
  }
}

.dropdown-dark {
  background: #444;
  border-color: #111111 #0a0a0a black;
  background-image: -webkit-linear-gradient(top, transparent, rgba(0, 0, 0, 0.4));
  background-image: -moz-linear-gradient(top, transparent, rgba(0, 0, 0, 0.4));
  background-image: -o-linear-gradient(top, transparent, rgba(0, 0, 0, 0.4));
  background-image: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.4));
  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.1), 0 1px 1px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.1), 0 1px 1px rgba(0, 0, 0, 0.2);
}

.dropdown-dark:before {
  border-bottom-color: #aaa;
}

.dropdown-dark:after {
  border-top-color: #aaa;
}

.dropdown-dark .dropdown-select {
  color: #aaa;
  text-shadow: 0 1px black;
  background: #444;  /* Fallback for IE 8 */
}

.dropdown-dark .dropdown-select:focus {
  color: #ccc;
}

.dropdown-dark .dropdown-select > option {
  background: #444;
  text-shadow: 0 1px rgba(0, 0, 0, 0.4);
}

</style>

<?php
	
if(isset($_POST['nyit'])){
		
	$open=$_POST["files2"];
    $file="files/".$open;
    $handle = fopen($file, 'r');
    $data = fread($handle,filesize($file)); 
    echo "<form action='?p=edit_file'  method='post'>";
	echo "<input type='hidden'	name='edit_file' value='" . $open . "'>";
	echo "<div align='center'>";
    echo "<textarea name='file_text' rows='40' cols='140' id='elm1'>".$data."</textarea><br>";
    echo "<br>";
    echo "<input class=button type=submit name=szerk value=Szerkeszt><br></form>";
    echo "</form>";
	echo "</div>";
	
	echo "<div align='right'>";
	echo "<form action='?p=search_infile' method='POST'>";
	echo "<input type='hidden'	name='edit_file' value='" . $open . "'>";
	echo "<input name='search' type='text' id='search' value=''>";
	echo "<input type='submit' name='keres' value='Keresés'>";
	echo "</form>";
	echo "</div>";
	
    } else {
	
?>	
	
<div align="center">
<form method="POST" action="?p=file_manager">
<?php

echo "<div class='dropdown dropdown-dark'>";
echo "<select name='files2' class='dropdown-select'>";
$files = array_map("htmlspecialchars", scandir("files"));
foreach ($files as $file)
    echo "<option value='$file'>$file</option>";
echo "</select>";
echo "<br>";
echo "</div>";

?>
<br>
<input type="submit" name="nyit" value="Szerkeszt!" />
</form>
<?php

};

?>
</div>