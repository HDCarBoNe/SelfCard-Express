<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="css/style.css">
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
              $installation == 1;
            } 
        
            catch (PDOException $e){     //Si la connexion a la bdd échoue
             echo 'Pas possible d atteindre la bdd ';
             print " <p>Erreur !: " . $e->getMessage() . "</p>";; 
            die(); 
                     }
            if ($installation == 1) {
                 // echo '<h1>Installation de la bdd en cour... <h1>';
                  $bdd->exec("CREATE TABLE IF NOT EXISTS `eleves` (
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
                             PRIMARY KEY (ID)
                             )ENGINE=INNODB");

                 // class valide_bdd{
                 //       echo '<p>La base de donnée élèves a été créer.</p>';
                 // }
                  $bdd->exec("CREATE TABLE IF NOT EXISTS `Prof'(
                              id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
                              `nom` VARCHAR(20) NOT NULL,
                              `prenom` VARCHAR(20) NOT NULL,
                              `credit` SMALLINT(5),
                              `classe_tit` tinyint UNSIGNED,
                              `adresse` VARCHAR(40),
                              `date_naissance` DATE NOT NULL,
                              `ville` VARCHAR(20) NOT NULL,
                              `code_postal` SMALLINT(5) NOT NULL,
                              `info_supp' TEXT,
                              PRIMARY KEY (ID)
                              )ENGINE=INNODB;");

                 // class valide_bdd{
                 //       echo '<p>La base de donnée Professeurs a été créer.</p>';
                 // }

                  $bdd->exec("CREATE TABLE IF NOT EXISTS `Admin` (,
                              `nbr_rps_prevu` SMALLINT NOT NULL,
                              `nbr_rps_servi` SMALLINT NOT NULL,
                              )ENGINE=INNODB;");
                  
                 // class valide_bdd{
                 //       echo '<p>La base de donnée Administration a été créer.</p>';
                 //}


            }

      ?>    
</body>
</html>
