	
	<?php
	if( !isset($_SESSION['log']) || ($_SESSION['log'] != 'in') ){
	echo "Kérem jelentkezzen be hogy hozzáférhessen az oldalhoz. <a href=index.php>Vissza a bejelentkezéshez.</a>";
        
	exit();
    }
	?>
	
	<?php
	
	if(isset($_POST['indit'])){
    
	$mod_user = $_POST['username'];
	$old_password = $_POST['old_password'];
	$mod_name = $_POST['name'];
	$mod_maildir = $_POST['maildir'];
	$mod_quota = $_POST['quota'];
	$mod_localpart = $_POST['local_part'];
	$mod_domain = $_POST['domain'];
	$mod_active = $_POST['status'];
	
	$date = date("Y-m-d H:i:s", strtotime('+2 hours'));
	
	if(!empty($_POST["password"])) {
	$mod_password = md5($_POST['password']);	
    $modosit = db_query("UPDATE mailbox SET username='".$mod_user."', password='".$mod_password."', modified='".$date."', name='".$mod_name."', maildir='".$mod_maildir."', quota='".$mod_quota."', local_part='".$mod_localpart."', domain='".$mod_domain."', active='".$mod_active."' WHERE username='".$mod_user."'");
	} else {
	$modosit = db_query("UPDATE mailbox SET username='".$mod_user."', password='".$old_password."', modified='".$date."', name='".$mod_name."', maildir='".$mod_maildir."', quota='".$mod_quota."', local_part='".$mod_localpart."', domain='".$mod_domain."', active='".$mod_active."' WHERE username='".$mod_user."'");
	};
	
	header("Location: logged.php?p=accounts&message=A $mod_user felhasználót sikeresen szerkesztette!");
	
	};
	?>
	
	<?php
	
	$user = $_GET['username'];
	$sql = db_query("SELECT * FROM mailbox WHERE username='".$user."'");
	$results = mysqli_fetch_array($sql);
	
	?>
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="">Szerkesztés</a></div>
			<div class="step-dark-right">&nbsp;</div>
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
		<form method="POST" action="?p=accounts_edit">
		<input type="hidden" name="old_password" value="<?php echo $results['password']; ?>">
		<input type="hidden" name="username" value="<?php echo $results['username']; ?>">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Új jelszó:</th>
			<td><input type="text" name="password" class="inp-form-error" /></td>
			<td>
			<div class="error-left"></div>
			<div class="error-inner">Az itt megadott jelszót átgenerálja MD5-be.</div>
			</td>
		</tr>
		<tr>
			<th valign="top">Név:</th>
			<td><input type="text" class="inp-form" name="name" value="<?php echo $results['name']; ?>" /></td>
			<td></td>
		</tr>
		<tr>
		<tr>
			<th valign="top">Könyvtár:</th>
			<td><input type="text" class="inp-form" name="maildir" value="<?php echo $results['maildir']; ?>" /></td>
			<td></td>
		</tr>
		<tr>
		<tr>
			<th valign="top">Quota:</th>
			<td><input type="text" class="inp-form" name="quota" value="<?php echo $results['quota']; ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Local part:</th>
			<td><input type="text" class="inp-form" name="local_part" value="<?php echo $results['local_part']; ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Domain:</th>
			<td><input type="text" class="inp-form" name="domain" value="<?php echo $results['domain']; ?>" /></td>
			<td></td>
		</tr>
			<tr>
			<th valign="top">Státusz:</th>
			<td><input type="text" class="inp-form" name="status" value="<?php echo $results['active']; ?>" /></td>
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