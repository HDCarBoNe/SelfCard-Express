<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Page Test</title>
        <script type="text/javascript">
		function date_heure(id)
		{
			date = new Date;
			annee = date.getFullYear();
			moi = date.getMonth();
			mois = new Array('Janvier','F&eacute;vrier','Mars','Avril','Mai','Juin','Juillet','Ao&ucirc;t','Septembre','Octobre','Novembre','D&eacute;cembre');
			j = date.getDate();
			jour = date.getDay();
			jours = new Array('Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi');
			h = date.getHours();
			if(h<10)
			{
				h = "0"+h;
			}
			m = date.getMinutes();
			if(m<10)
			{
				m = "0"+m;
			}
			s = date.getSeconds();
			if(s<10)
			{
				s = "0"+s;
			}
			resultat = ''+jours[jour]+' '+j+' '+mois[moi]+' '+annee+' / '+h+':'+m+':'+s;
			document.getElementById(id).innerHTML = resultat;
			setTimeout('date_heure("'+id+'");','1000');
			return true;
		}
        </script>
   </head>
	<body>
   <form method="post" action="">
   <p>
   <label for="id_eleves">ID:</label>
   <input type="text" name="id_eleves" id="id_eleves" size="30" maxlength="10" />

   </p>
   </form>
   <?php
function connect_bd()
{
    $nomserveur='localhost'; //nom du seveur
    $nombd='Self'; //nom de la base de données
    $login='root'; //login de l'utilisateur
    $pass='raspberry'; // mot de pass
    $bd=mysql_connect($nomserveur, $login, $pass)or die("Connexion échouée");
    mysql_select_db($nombd,$bd)or die("La base ne peut pas être selectionnée");
    return $bd;
}
function deconnect_bd($bd)
{
    mysql_close($bd);
    $db=0;
}
?> 
	<span id="date_heure"></span>
        <script type="text/javascript">window.onload = date_heure('date_heure');</script>
        <?php include("PROJET BAC/css/body.css"); ?>
   <?php
   if (isset($_GET['id']))
       {
$reponse = $bdd->query("SELECT nom,prenom FROM 'eleves' WHERE id='$id_eleves'");

while ($donnees = $reponse->fetch())
?>
    <p>
    <strong>Nom:</strong>    : <?php echo $donnees['nom'];    ?><br/>
	 <strong>Prénom:</strong> : <?php echo $donnees['prenom']; ?><br/>.
	 </p>

    <?php

$reponse->closeCursor(); // Termine le traitement de la requête

?>
    </body>
</html>












 <?php
   if (isset($_GET['id']))
       {
$reponse = $bdd->query("SELECT nom,prenom FROM 'eleves' WHERE id='$id_eleves'");

while ($donnees = $reponse->fetch())
?>
    <p>
    <strong>Nom:</strong>    : <?php echo $donnees['nom'];    ?><br/>
	 <strong>Prénom:</strong> : <?php echo $donnees['prenom']; ?><br/>.
	 <?php echo Validé !!!?>
	 </p>

    <?php

$reponse->closeCursor(); // Termine le traitement de la requête

?>

