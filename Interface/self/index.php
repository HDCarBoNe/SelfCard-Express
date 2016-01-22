<!-- Pense a commenter ton code-->
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
    <title>SelfCard Express</title>
    </head>

    <body>
      <?php include ('header.php'); ?>
 
      <?php
      include ('config/config.php');
         define("PDO_HOST", $hote); // definition des variables pour la connexion pdo, creation de c'est varibale pour differencier le test de connexion de la parti ajout des informations
         define("PDO_DBBASE", $nomBase); 
         define("PDO_USER", $utilisateur); 
         define("PDO_PW", $mdp);

         try{                         //Si la connexion a la bdd est réussi
         $bdd = new PDO(  
         "mysql:host=" . PDO_HOST . ";". 
         "dbname=" . PDO_DBBASE, PDO_USER, PDO_PW, 
         array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") ); 
         } 
        
         catch (PDOException $e){     //Si la connexion a la bdd échoue
         echo 'Pas possible d atteindre la bdd ';
         print " <p>Erreur !: " . $e->getMessage() . "</p>"; 
         die(); 
                 }?>


  
<div id="body">

<section>
      <form method="get" action="index.php">
        <p>
    <label for="id_eleves">ID:</label>
    <input type="number" min="1" name="Id" size="30" maxlenght="10" autofocus/>
    <input type="submit" value="Envoyer">
      </form>
      <p>
        <?php
        echo 'ID:' . $_GET['Id'];
        $reponse = $bdd->query('SELECT * FROM eleves WHERE id='.$_GET['Id']);

         while ($donnees = $reponse->fetch())
        {
          $nom = $donnees['nom'];
          $prenom = $donnees['prenom'];
          $credit = $donnees['credit'];
          $regime = $donnees['regime'];
          $classe = $donnees['classe'];
          $statut = $donnees['statut'];
          $info_supp = $donnees['info_supp'];
          }
        
        $reponse->closeCursor();
        
        ?>
          <?php include("self.css"); ?>

        <div class="elem"><?php echo '<p>'. $nom. '</p>'; ?></div>
        <div class="elem"><?php echo '<p>'. $prenom. '</p>'; ?></div>

        <div class="elem"><?php echo '<p>'. $classe. '</p>'; ?></div>
        <div class="elem"><?php echo '<p>'. $regime. '</p>'; ?></div>

        <div class="elem"><?php echo '<p>'. $credit. '</p>'; ?></div>
        <div class="elem"><?php echo '<p>'. $statut. '</p>'; ?></div>

      </section>

    <nav>
            <p>Liste Des Personnes Passées:</p>
            <?php echo '<p>'. $nom. ' ' . $prenom . '</p>' ?>
  </nav>

</div>
     </body>
</html>
