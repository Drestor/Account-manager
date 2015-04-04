            	
		    <?php
	        if( !isset($_SESSION['log']) || ($_SESSION['log'] != 'in') ){
	        echo "Kérem jelentkezzen be hogy hozzáférhessen az oldalhoz. <a href=index.php>Vissza a bejelentkezéshez.</a>";
        
	        exit();
            }
	        ?>
			
			<?php
             
			//Lapozos az oldalak között
            if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
            $startrow = 0;
            } else {
            $startrow = (int)$_GET['startrow'];
			} 
			
			?>
			
		   
			<form id="mainform" action="">
			
		    <?php

            $sql = db_query ("SELECT * FROM log ORDER BY timestamp DESC LIMIT $startrow, 10");

            if($result = ($sql)){

        if(mysqli_num_rows($result) > 0){

            echo "<table border='0' width='100%' cellpadding='0' cellspacing='0' id='product-table'>";

                echo "<tr>";

                    echo "<th class='table-header-check'><a id='toggle-all' ></a> </th>";

                    echo "<th class='table-header-repeat line-left minwidth-1'><a href=''>Idő</a>	</th>";

                    echo "<th class='table-header-repeat line-left minwidth-1'><a href=''>Felhasználó</a></th>";

                    echo "<th class='table-header-repeat line-left'><a href=''>Domain</a></th>";
					echo "<th class='table-header-repeat line-left'><a href=''>Művelet</a></th>";
					echo "<th class='table-header-repeat line-left'><a href=''>Adat</a></th>";

                echo "</tr>";

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
					echo "<td><input name='checkbox[]' type='checkbox' id='checkbox[]' value='' /></td>";

                    echo "<td>" . $row['timestamp'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
					echo "<td>" . $row['domain'] . "</td>";
					echo "<td>" . $row['action'] . "</td>";
					echo "<td>" . $row['data'] . "</td>";

                echo "</tr>";

            }

            echo "</table>";


            mysqli_free_result($result);

        } else{

            echo "Nincs több naplózás!!";

        }

    } else{

        echo "Nem sikerült a lekérdezés!";

    }

    ?>
				</form>
			
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
			    <?php
			
                if ($startrow > 0)
                echo '<a class="page-left" href="logged.php?p=log&startrow='.($startrow - 10).'"></a>';
                ?>
				
				<div id="page-info"><strong><?php echo ($startrow / 10) + 1 ?>. oldal</strong></div>
				
				<?php echo '<a class="page-right" href="logged.php?p=log&startrow='.($startrow+10).'"></a>'; ?>
			</td>

			</tr>
			</table>