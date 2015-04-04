<?php

// Fontos fájlok beillesztése
require_once("include/config.php");
require_once("include/functions.php");
require_once("include/header.php");


if(isset($_POST['login'])){ 
	
	$usr = htmlentities($_POST['username']);
	$psw = md5 ($_POST['password']);	
	
	//Felhasználó kikeresése
	$result = db_query("SELECT * FROM admin WHERE username='".$usr."' AND password = '".$psw."'");
	$rows = mysqli_fetch_array($result);

	if($rows > 0) {
         
		session_start();
		$_SESSION['log'] = 'in';
		header('location:logged.php');
		
	} else { 
		$error = 'Rossz felhasználónév vagy jelszó!';	
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin Panel</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
 
<div id="login-holder">
		<div id="logo-login">
		<a href="index.html"><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>
		</div>
	<div class="clear"></div>
	
	<?php if(isset($error)){ ?>

    <div id="content-table-inner">	
    <div id="message-red">
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr>
	<td class="red-left"><?php echo $error; ?></td>
	<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
    </tr>
    </table>
    </div>
    </div>
    
	<?php };  ?>
	
	<div id="loginbox">
	
	<div id="login-inner">
	
<form action="#" method="POST">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Felhasználó:</th>
			<td><input type="text" name="username" maxlength="32" class="login-inp" /></td>
		</tr>
		<tr>
			<th>Jelszó:</th>
			<td><input type="password" name="password" maxlength="32" value="************"  onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="login" class="submit-login"  /></td>
		</tr>
		</table>
</form>
	</div>
	<div class="clear"></div>
 </div>
</div>
</body>
</html>