<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/self.css">
	<title>SelfCard Express</title>
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

	<header>
	<?php include("self.css"); ?>
	<div id="header">
		<div class="element">
			<img src="Image/stjo.jpg">
		</div class="element">	
		<div>
			<p> SelfCard Express: </p>
		</div>
		<div class="element">
			<p><span id="date_heure"></span></p>
			<script type="text/javascript">window.onload = date_heure('date_heure');</script>
		</div>
	</div>
	</header>

</body>
</html>