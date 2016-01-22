<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8"/>
      <link rel="stylesheet" type="text/css" href="css/bdd.css">
      <title>Installation</title>
</head>
<body>
  <?php  
            include('../config/config_test.php');
             define("PDO_HOST", $hote); // definition des variables pour la connexion pdo, creation de c'est varibale pour differencier le test de connexion de la parti ajout des informations
             define("PDO_DBBASE", $nomBase); 
             define("PDO_USER", $utilisateur); 
             define("PDO_PW", $mdp);
                  
            try{                         //Si la connexion a la bdd est réussi
             $bdd = new PDO(  
             "mysql:host=" . PDO_HOST . ";". 
             "dbname=" . PDO_DBBASE, PDO_USER, PDO_PW, 
             array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
                echo '<h2>Installation de la bdd en cours... </h2>';
                  $bdd->exec("CREATE TABLE IF NOT EXISTS eleves (
                             `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
                             `nom` VARCHAR(20) NOT NULL,
                             `prenom` VARCHAR(20) NOT NULL,
                             `credit` SMALLINT(5), #Si le regime est externe. Partant du principe que les autres élèves paie un forfait
                             `classe` char(5),
                             `regime` tinyint UNSIGNED,
                             `adresse` VARCHAR(40),
                             `date_naissance` DATE NOT NULL,
                             `Ville` VARCHAR(20) NOT NULL,
                             `code_postal` SMALLINT(5) UNSIGNED NOT NULL,
                             `info_supp` TEXT,
                             PRIMARY KEY (id),
                             UNIQUE INDEX ind_uni_nom_pren_id (nom, prenom, id)
                             )ENGINE=INNODB;");

                      echo '<p>La base de donn&eacutee &eacutel&egraveves &agrave &eacutet&eacute cr&eacuteer.</p>';

                  $bdd->exec("CREATE TABLE IF NOT EXISTS prof(
                              `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
                              `nom` VARCHAR(20) NOT NULL,
                              `prenom` VARCHAR(20) NOT NULL,
                              `credit` SMALLINT(5),
                              `classe_tit` tinyint UNSIGNED,
                              `adresse` VARCHAR(40),
                              `date_naissance` DATE NOT NULL,
                              `ville` VARCHAR(20) NOT NULL,
                              `code_postal` SMALLINT(5) NOT NULL,
                              `info_supp` TEXT,
                              PRIMARY KEY (id),
                              UNIQUE INDEX ind_uni_nom_pren_id (nom, prenom, id)
                              )ENGINE=INNODB;");

                        echo '<p>La base de donn&eacutee professeurs &agrave &eacutet&eacute cr&eacuteer.</p>';

                  $bdd->exec("CREATE TABLE IF NOT EXISTS admin(
                              `nbr_rps_prevu` SMALLINT NOT NULL,
                              `nbr_rps_servi` SMALLINT NOT NULL
                              )ENGINE=INNODB;");
                  
                        echo '<p>La base de donn&eacutee administration &agrave &eacutet&eacute cr&eacuteer.</p>';
                      }
        
            catch (PDOException $e){     //Si la connexion a la bdd échoue
             echo 'Pas possible d atteindre la bdd ';
             print " <p>Erreur !: " . $e->getMessage() . "</p>";; 
            die(); 
                     }
            echo '<h3> Installation termin&eacutee !</h3>';         
            echo '<h3>Pensez &agrave supprimer le dossier "installation" !</h3>';
      ?>    
</body>
</html>
