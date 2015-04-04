    	
	<?php
	if( !isset($_SESSION['log']) || ($_SESSION['log'] != 'in') ){
	echo "Kérem jelentkezzen be hogy hozzáférhessen az oldalhoz. <a href=index.php>Vissza a bejelentkezéshez.</a>";
        
	exit();
    }
	?>
	
	<pre>
    &nbsp;&nbsp;&nbsp;&nbsp;<b>Üzemidő:</b>
    <?php system("uptime"); ?>
    <b>Rendszer információ:</b>
    <?php system("uname -a"); ?>
    <b>Memória használat (MB):</b>
    <?php system("free -m"); ?>
    <b>Merevlemez használat:</b>
    <?php system("df -h"); ?>
    <b>Processzor információ:</b>
    <?php system("cat /proc/cpuinfo | grep \"model name\\|processor\""); ?>
    </pre>
	
	