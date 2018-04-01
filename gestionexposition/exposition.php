<?php
session_start();

if(!isset($_SESSION['id'])){
	header("Location: index");
}
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Exposition</title>
		<link rel="stylesheet" type="text/css" href="CSS\reset.css"/>
		<link rel="stylesheet" type="text/css" href="CSS\style.css"/>
		<link rel="stylesheet" media="screen and (max-width: 800px)" type="text/css" href="CSS\versionmediocre.css"/>
	</head>
	
	<body>
<?php
include('ConnectBdd.php');
ini_set('display_errors','off');
?>

	<header>	
<?php
$idExposition=$_SESSION['id'];
$titre=$bdd->query("Select nom from Exposition where idExposition=".$idExposition.";");

while($donnees = $titre->fetch()){
	echo '<h1>'.$donnees['nom'].'</h1>';
}
	
?>
	  </header>

	<nav>
		<ul>
	    	<li><a href="accueil">Accueil</a></li>
	    	<li><a href="exposant">Exposition</a></li>
			<li><a href="invite">Invite</a></li>
			<li><a href="contact">Contact</a></li>
	    </ul>
	</nav>
	
	<article>
		<img src="Image/Plan.jpg" id="planExpo"/>
<?php
$resultat=$bdd->query("Select idStand from Exposant where idLieu in (Select idLieu from Se_Passer where idExposition = ".$idExposition.") group by idStand;");

while($donnees = $resultat->fetch()){
	$professionnel=$bdd->query("Select * from Professionnel where idProfessionnel in(Select idProfessionnel from Exposant where idStand = ".$donnees['idStand'].");");
	$donneesProfessionnel1 = $professionnel->fetch();
	
	echo '<section><p>Stand '.$donnees['idStand'].' - Entreprise : '.$donneesProfessionnel1['entreprise'].'<p>';
	echo '<p>Professionnel(s) : <br> '.$donneesProfessionnel1['prenom'].' '.$donneesProfessionnel1['nom'].', '.$donneesProfessionnel1['profession'].'</p>';
	
	while($donneesProfessionnel = $professionnel->fetch()){
		echo '<p>'.$donneesProfessionnel['prenom'].' '.$donneesProfessionnel['nom'].', '.$donneesProfessionnel['profession'].'</p>';
	}
	
	echo '</section>';
}
	
?>
	</article>
	
	<aside id="a1">
		<nav id="navg">
			<a href="index">Choix Exposition</a>
		</nav>
	</aside>

	<aside id="a2" >
		<nav >
			<ul>
				<li><a href="Ajout">Ajout</a></li>
				<li><a href="ChoixModification">Modifier</a></li>
				<li><a href="Delete">Suppression</a></li>											
			</ul>
		</nav>
	</aside>
	
	<footer>
		<form method="post" action="traitementXML">
			<input type="hidden" name="page" value="exposition"/>
			<center><input type="submit" value="XML"/></center>
		</form>
		
		<p>Outils de base de données</br> Claire Brunel, Clément Fornes et Ilyas Bensaber</p>
	</footer>
	
	</body>
</html>