<?php

	include ("../aqua_haut.htm");
	$id_key_refinscript = getHTTPVars("id_key_refinscript", $HTTP_POST_VARS, $HTTP_GET_VARS);
	$login = getHTTPVars("login", $HTTP_POST_VARS, $HTTP_GET_VARS);

?>


		
		
	
				<b>Liste des inscrits</b><br><br>
				<table width=100%><tr><td valign=top width=5%>
				<?php
				if ($conexion == "mauvaise") {
						echo "<font color=red>Paramètres de connexion mauvaise</font>";
				} else {
					mysql_select_db($login,$conexion);

					$Sqllist="SELECT * FROM coordonnees ORDER BY nom";

					$Resultlist = mysql_query($Sqllist,$conexion);
					mysql_query($Resultlist);
					echo "<form method=post> <select size=1 name=\"id_key_refinscript\"" ?> onchange="if (this.selectedIndex != 0) {this.form.submit();}" <?php echo "><option value=\"\">------</option>";

					while($Vallist=mysql_fetch_array($Resultlist)){
						if ($Vallist["nom"]<>"virtuel") {
							echo "<option value=".$Vallist["id_key"].">".$Vallist["nom"]." ".$Vallist["prenom"]."</option>";
						}
					}
					echo "</select></form></td><td>";
				}
				
				
		if ($id_key_refinscript<>'') {
			include "modifmf.php";
		} 
				?>

				
	</td></tr></table>	  
    
<?php 

	

include ("../aqua_bas.htm");

?>