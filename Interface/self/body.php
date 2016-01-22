<!DOCTYPE >
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/body.css">
	<title>SelfCard Express</title>
</head>
<body>
	<?php include("self.css"); ?>
	
<div id="body">
	<nav>
            <p>Liste Des Personnes Passées:</p>
            <td><?php echo '<p>'. $nom. '</p>' . '<p>' . $prenom . '</p>' ?></td>
	</nav>
	<section>
		<table>
      <caption>Information de l'elève:</caption>

      <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Classe</th>
        <th>Regime</th>
        <th>Credit</th>
        <th>Statut</th>
      </tr>
      <tr>
        <td><?php echo '<p>'. $nom. '</p>'; ?></td>
        <td><?php echo '<p>'. $prenom. '</p>'; ?></td>
        <td><?php echo '<p>'. $classe. '</p>'; ?></td>
        <td><?php echo '<p>'. $regime. '</p>'; ?></td>
        <td><?php echo '<p>'. $credit. '</p>'; ?></td>
        <td><?php echo '<p>'. $statut. '</p>'; ?></td>
      </tr>
    </table>
	</section>
</div>
</body>
</html>