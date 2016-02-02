<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Installation</title>
</head>
<body>
	<h1>Bienvenue sur la page d'installation de l'interface pour le système de carte sans contact</h1>
	<img src="img/install.png" class="img_technicien"/>
		<h2>Base de données MySQL: Identifiants de connection</h2>
	    <!-- formulaire pour collecter les informations pour la connexion à la base de données --> 
	      <form method="post" action="">
	    	<div class="add_bdd">
	    		<label>Adresse de la base de donnée</label>
	    		<input type="text" name="hote" class="form-control" placeholder="ex: sql.monheberger.fr" autofocus/>
	    	</div>
	    	<div class="add_bdd">
	    		<label>Utilisateur</label>
	    		<input type="text" name="utilisateur" class="form-control" placeholder="ex: monutilisateur864"/>
	    	</div>
	    	<div class="add_bdd">
	    		<label>Mot de passe</label>
	    		<input type="password" name="mdp" class="form-control" placeholder="xxxxxx"/>
	    	</div>
	    	<div class="add_bdd">
	    		<label>Nom de la base</label>
	    		<input type="text" name="nomBase" class="form-control" placeholder="ex: self_bdd"/>
	    	</div>
	    	<div class="add_bdd">
	    		<input type="submit" values="Validé"/>
	    	</div>
	      </form>
	      <?php  // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!! Changer le nom du fichier config il est en config_test le mettre en config.php pour le faire correspondre avec l'index. Faire de meme avec le fichier BDD
                 $config = fopen('../config/config_test.php', 'w'); // création du fichier config.php si n'existe pas et si il existe et supprimée afin de ne pas ré-écrire des informations par dessus d'ancienne.  
                 
                 $utilisateur = $_POST['utilisateur']; //stock les données dans les variables
                 $nomBase = $_POST['nomBase'];
                 $hote = $_POST['hote'];
                 $mdp = $_POST['mdp'];
                  
                 fseek($config, 0); // place le curseur au début du fichier
                 fwrite($config, '<?php $hote = ' . $hote .'; $utilisateur = ' . $utilisateur . '; $nomBase = ' . $nomBase . '; $mdp = ' . $mdp . '; ?>');
                 fclose($config); // Ferme le fichier
                  
				 define("PDO_HOST", $hote); // definition des variables pour la connexion pdo 
				 define("PDO_DBBASE", $nomBase); 
				 define("PDO_USER", $utilisateur); 
				 define("PDO_PW", $mdp); 
				 
                 try{                         //Si la connexion a la bdd est réussi
				 $connection = new PDO(  
				 "mysql:host=" . PDO_HOST . ";". 
				 "dbname=" . PDO_DBBASE, PDO_USER, PDO_PW, 
				 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") ); 
				 include('bdd.php');
				 } 
				
				 catch (PDOException $e){     //Si la connexion a la bdd échoue
				 echo 'Pas possible d atteindre la bdd ';
				 print " <p>Erreur !: " . $e->getMessage() . "</p>"; 
				 die(); 
                 }
            ?>                
</body>
</html>