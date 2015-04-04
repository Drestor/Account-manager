	
	<?php
	if( !isset($_SESSION['log']) || ($_SESSION['log'] != 'in') ){
	echo "Kérem jelentkezzen be hogy hozzáférhessen az oldalhoz. <a href=index.php>Vissza a bejelentkezéshez.</a>";
        
	exit();
    }
	?>
	
	<?php
	
	if(isset($_POST['indit'])){
    
	$mod_user = $_POST['username'];
	$mod_password = md5($_POST['password']);
	$mod_name = $_POST['name'];
	$mod_maildir = $_POST['maildir'];
	$mod_quota = $_POST['quota'];
	$mod_localpart = $_POST['local_part'];
	$mod_domain = $_POST['domain'];
	$mod_active = $_POST['status'];
	
	$date = date("Y-m-d H:i:s", strtotime('+2 hours'));
	
    $modosit = db_query("INSERT INTO mailbox (username, password, name, maildir, quota, local_part, domain, created, modified, active) VALUES ('$mod_user', '$mod_password', '$mod_name', '$mod_maildir', '$mod_quota', '$mod_localpart','$mod_domain', '$date', '', '$mod_active')");
	
	header("Location: logged.php?p=accounts&message=A $mod_user felhasználó elkészült!");
	
	};
	?>	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="">Hozzáad</a></div>
			<div class="step-dark-right">&nbsp;</div>
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
		<form method="POST" action="?p=add_user">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Felhasználónév:</th>
			<td><input type="text" class="inp-form" name="username"/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Jelszó:</th>
			<td><input type="text" name="password" class="inp-form-error" /></td>
			<td>
			<div class="error-left"></div>
			<div class="error-inner">Az itt megadott jelszót átgenerálja MD5-be.</div>
			</td>
		</tr>
		<tr>
			<th valign="top">Név:</th>
			<td><input type="text" class="inp-form" name="name" /></td>
			<td></td>
		</tr>
		<tr>
		<tr>
			<th valign="top">Könyvtár:</th>
			<td><input type="text" class="inp-form" name="maildir" /></td>
			<td></td>
		</tr>
		<tr>
		<tr>
			<th valign="top">Quota:</th>
			<td><input type="text" class="inp-form" name="quota" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Local part:</th>
			<td><input type="text" class="inp-form" name="local_part"/></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Domain:</th>
			<td><input type="text" class="inp-form" name="domain"/></td>
			<td></td>
		</tr>
			<tr>
			<th valign="top">Státusz:</th>
			<td><input type="text" class="inp-form" name="status" /></td>
			<td>			
			<div class="error-left"></div>
			<div class="error-inner">1=Aktív, 0=Nem aktív</div></td>
		</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" name="indit" value="" class="form-submit" />
		</td>
		<td></td>
	</tr>
	</table>
	</form>
	<!-- end id-form  -->

	</td>
	<td>


</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>