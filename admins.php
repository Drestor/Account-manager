			
			<?php
	        if( !isset($_SESSION['log']) || ($_SESSION['log'] != 'in') ){
	        echo "Kérem jelentkezzen be hogy hozzáférhessen az oldalhoz. <a href=index.php>Vissza a bejelentkezéshez.</a>";
        
	        exit();
            }
	        ?>
	
			<?php			
						
			//Admin törlése
			if(isset($_GET['admin_delete'])){
			$user = $_GET['admin_delete'];
			db_query("DELETE FROM admin WHERE username='".$user."'");
			};
			
			?>
			<form id="mainform" action="">
			
		    <?php

            $sql = db_query ("SELECT * FROM admin");

            if($result = ($sql)){

        if(mysqli_num_rows($result) > 0){

            echo "<table border='0' width='100%' cellpadding='0' cellspacing='0' id='product-table'>";

                echo "<tr>";

                    echo "<th class='table-header-check'><a id='toggle-all' ></a> </th>";

                    echo "<th class='table-header-repeat line-left minwidth-1'><a href=''>Felhasználónév</a>	</th>";

                    echo "<th class='table-header-repeat line-left minwidth-1'><a href=''>Készült</a></th>";

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
					echo "<td><input name='checkbox[]' type='checkbox' id='checkbox[]' value='' /></td>";

                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['created'] . "</td>";
					echo "<td>" . $row['modified'] . "</td>";
					echo "<td>" . $row['active'] . "</td>";
					echo "<td class='options-width'>";
					echo "<a href='logged.php?p=admin_edit&username=" . $row['username'] . "' title='Szerkeszt' class='icon-1 info-tooltip'></a>";
					echo "<a href='logged.php?p=admins&admin_delete=" . $row['username'] . "' title='Töröl' class='icon-2 info-tooltip'></a>";
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

    ?>
				</form>
			
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>

			</td>

			</tr>
			</table>