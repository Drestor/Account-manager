            <?php
			if( !isset($_SESSION['log']) || ($_SESSION['log'] != 'in') ){
	        echo "Kérem jelentkezzen be hogy hozzáférhessen az oldalhoz. <a href=index.php>Vissza a bejelentkezéshez.</a>";
        
	        exit();
		    }
			?>
			
			<?php
			
             
			//Lapozás az oldalak között
            if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
            $startrow = 0;
            } else {
            $startrow = (int)$_GET['startrow'];
			} 
			
			//Felhasználó törlése
			if(isset($_GET['user_delete'])){
			$user = $_GET['user_delete'];
			db_query("DELETE FROM mailbox WHERE username='".$user."'");
			header("Location: logged.php?p=accounts&message=Sikeresen kitörölte a $user felhasználót!");
			};
			
	        ?>
			
			
		    
            <?php
            //Üzenet kiíratása
			if(isset($_GET['message'])){ 
			?>

            <div id="content-table-inner">	
            <div id="message-green">
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>

	        <td class="green-left">
			<?php
			$msg=$_GET['message'];
			echo $msg; ?></td>
	        <td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
            </tr>
            </table>
            </div>
            </div>

            <?php };  ?>
			
			<div align="center"><b>Felhasználó hozzáadása</b> <a href="logged.php?p=add_user">[+]</a></div><br>
			
			<form id="mainform" action="">
			
		    <?php
			  
			  if(!isset($_POST['keres'])){
			
              $sql = db_query ("SELECT * FROM mailbox ORDER BY username ASC LIMIT $startrow, 10");
              
			  if($result = ($sql)){

        if(mysqli_num_rows($result) > 0){

            echo "<table border='0' width='100%' cellpadding='0' cellspacing='0' id='product-table'>";

                    echo "<tr>";
                    echo "<th class='table-header-check'><a id='toggle-all' ></a> </th>";
                    echo "<th class='table-header-repeat line-left minwidth-1'><a href=''>Felhasználó</a>	</th>";
                    echo "<th class='table-header-repeat line-left minwidth-1'><a href=''>Domain</a></th>";
                    echo "<th class='table-header-repeat line-left'><a href=''>Készítve</a></th>";
					echo "<th class='table-header-repeat line-left'><a href=''>Módosítva</a></th>";
					echo "<th class='table-header-repeat line-left'><a href=''>Státusz</a></th>";
					echo "<th class='table-header-options line-left'><a href=''>Feladatok</a></th>";

                echo "</tr>";

            while($row = mysqli_fetch_array($result)){
				
			// Státusz átalakítása
            switch($row["active"]){

	        case "1":
	        $row["active"] = '<font color="green">Aktív</font>';
	        break;

	        case "0":
	        $row["active"] = '<font color="red">Nem aktív</font>';
	        break;

	        default:
	        $row["active"] = '<font color="green">Aktív</font>';
	        break;

            }

                echo "<tr>";
					echo "<td><input name='checkbox[]' type='checkbox' id='checkbox[]' value=" . $row['username'] . " /></td>";

                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['domain'] . "</td>";
					echo "<td>" . $row['created'] . "</td>";
					echo "<td>" . $row['modified'] . "</td>";
					echo "<td>" . $row['active'] . "</td>";
					
					echo "<td class='options-width'>";
					echo "<a href='logged.php?p=accounts_edit&username=" . $row['username'] . "' title='Szerkeszt' class='icon-1 info-tooltip'></a>";
					echo "<a href='logged.php?p=accounts&user_delete=" . $row['username'] . "' title='Töröl' class='icon-2 info-tooltip'></a>";
					echo "</td>";

                echo "</tr>";

            }

            echo "</table>";
			

            mysqli_free_result($result);

        } else{

            echo "Nincs több felhasználó!!";

        }

    } else{

        echo "Nem sikerült a lekérdezés!";

    }
			  } else {
			
			  $sql = db_query ("SELECT * FROM mailbox WHERE (username LIKE '%".$_POST["txtKeyword"]."%')");
			  if($result = ($sql)){

        if(mysqli_num_rows($result) > 0){

            echo "<table border='0' width='100%' cellpadding='0' cellspacing='0' id='product-table'>";

                    echo "<tr>";
                    echo "<th class='table-header-check'><a id='toggle-all' ></a> </th>";
                    echo "<th class='table-header-repeat line-left minwidth-1'><a href=''>Felhasználó</a>	</th>";
                    echo "<th class='table-header-repeat line-left minwidth-1'><a href=''>Domain</a></th>";
                    echo "<th class='table-header-repeat line-left'><a href=''>Készítve</a></th>";
					echo "<th class='table-header-repeat line-left'><a href=''>Módosítva</a></th>";
					echo "<th class='table-header-repeat line-left'><a href=''>Státusz</a></th>";
					echo "<th class='table-header-options line-left'><a href=''>Feladatok</a></th>";

                echo "</tr>";

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
					echo "<td><input name='checkbox[]' type='checkbox' id='checkbox[]' value=" . $row['username'] . " /></td>";

                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['domain'] . "</td>";
					echo "<td>" . $row['created'] . "</td>";
					echo "<td>" . $row['modified'] . "</td>";
					echo "<td>" . $row['active'] . "</td>";
					
					echo "<td class='options-width'>";
					echo "<a href='logged.php?p=accounts_edit&username=" . $row['username'] . "' title='Szerkeszt' class='icon-1 info-tooltip'></a>";
					echo "<a href='logged.php?p=accounts&user_delete=" . $row['username'] . "' title='Töröl' class='icon-2 info-tooltip'></a>";
					echo "</td>";

                echo "</tr>";

            }

            echo "</table>";
			

            mysqli_free_result($result);

        } else{

            echo "Nincs ilyen felhasználó!!";

        }

    } else{

        echo "Nem sikerült a lekérdezés!";

    }
			  }  

    ?>
				</form>
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Szerkeszt</a>
					<a href="" class="action-delete">Törlés</a>
				</div>
				<div class="clear"></div>
			</div>
			
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
			    <?php
				
				if(!isset($_POST['keres'])){
			
                if ($startrow > 0)
                echo '<a class="page-left" href="logged.php?p=accounts&startrow='.($startrow - 10).'"></a>';
                ?>
				
				<div id="page-info"><strong><?php echo ($startrow / 10) + 1 ?>. oldal</strong></div>
				
				<?php echo '<a class="page-right" href="logged.php?p=accounts&startrow='.($startrow+10).'"></a>';  } ?>
			</td>
			<td>
			<form name="frmSearch" method="post" action="">
            <input name="txtKeyword" type="text" id="txtKeyword" value="">
            <input type="submit" name="keres" value="Keresés">
            </form>
			</td>
			</tr>
			</table>