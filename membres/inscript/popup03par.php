<script language="JavaScript">
<!--

function testform(nom,prenom,jnaiss,mnaiss,anaiss,mail,pass) {
    
    if(nom.value=="") {
        alert("Veuillez saisir votre nom"); 
        nom.focus();
        return false
    }
    if(prenom.value=="") {
        alert("Veuillez saisir votre pr�nom"); 
        prenom.focus();
        return false
    }
    if(jnaiss.value=="") {
        alert("Veuillez saisir votre jour de naissance"); 
        jnaiss.focus();
        return false
    }
    if(mnaiss.value=="") {
        alert("Veuillez saisir votre mois de naissance"); 
        mnaiss.focus();
        return false
    }
    if(anaiss.value=="") {
        alert("Veuillez saisir votre ann�e de naissance"); 
        anaiss.focus();
        return false
    }

    if(pass.value=="") {
        alert("Veuillez saisir un mot de passe"); 
        pass.focus();
        return false
    }
    return true
}
//-->
</script>

<?php
$Id = $HTTP_COOKIE_VARS['Id'];

if ($Id=='OKDAK') {

include ("../../conex.inc");
include ("fonctions.inc");

$id_key_refinscript = getHTTPVars('id_key_refinscript', $HTTP_POST_VARS, $HTTP_GET_VARS);
$sexe = getHTTPVars('sexe', $HTTP_POST_VARS, $HTTP_GET_VARS);

?>	
	<body bgcolor="#C0C0C0">
<b><font color=red>Inscription --- �tape 3/4</font></b></a><br><br>

<form method="post" action="popup05par.php" onSubmit="return testform(this.nom,this.prenom,this.jnaiss,this.mnaiss,this.anaiss,this.mail,this.pass)" enctype="multipart/form-data"> 

<?php
if ($sexe=="M") {
	$id_key_conjoint = getHTTPVars('conjoint', $HTTP_POST_VARS, $HTTP_GET_VARS);
	$txt="le p�re";
} else {
	$id_key_conjoint = getHTTPVars('conjoint', $HTTP_POST_VARS, $HTTP_GET_VARS);
	$txt="la m�re";
}

					mysql_select_db($login,$conexion);
					$Sqllist="SELECT * FROM coordonnees where id_key=$id_key_refinscript";
					$Resultlist = mysql_query($Sqllist,$conexion);
					mysql_query($Resultlist);
					while($Vallist=mysql_fetch_array($Resultlist)){
						echo "Vous �tes ".$txt." de ".$Vallist["prenom"]." ".$Vallist["nom"]."<br>";
					}

					
include ("../../aqua_haut.htm");



FormulaireInscript($login,$conexion);
?>

<input type=hidden name="max_file_size" value="1024000">
	<br>
	Photo <input type=file name="userfile"><br><br>

	
<font color=purple size=2><b><i>PS : le nom de l'image ne doit pas comporter d'espaces<br>ni de caract�res sp�ciaux et doit peser moins d'1Mo</i></font>

		<input type="hidden" name="id_key_conjoint" value="<?php echo $id_key_conjoint; ?>">

		<input type="hidden" name="id_key_refinscript" value="<?php echo $id_key_refinscript; ?>">
		<input type="hidden" name="sexe" value="<?php echo $sexe; ?>">
		<a href="javascript:history.back()" border="0"><img src="../images/etapeprec.gif" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;					
		<input type="image" src="../images/etapesuiv.gif" border="0" alt="incription" value="Enregistrer" name="creanew">
	</form>

	
<?php
include ("../../aqua_bas.htm"); 
}
?>