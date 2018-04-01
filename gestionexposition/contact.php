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
	    	<li><a href="exposition">Exposition</a></li>
			<li><a href="invite">Invite</a></li>
			<li><a href="contact">Contact</a></li>
	    </ul>
	</nav>
	
	<article>
		<section>
		<h2>Contact:</h2>
			<?php $resultat=$bdd->query("Select * from Organisateur where (Select idOrganisateur from Exposition where idExposition=".$idExposition.");");
				while($donnees1 = $resultat->fetch()){ 
					echo '<h3>'.$donnees1['nom'].' '.$donnees1['prenom'].'</h3><p>Adresse e-mail: '.$donnees1['adresseMail'].'</p>';
				}
			?>
		</section>
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
			<input type="hidden" name="page" value="contact"/>
			<center><input type="submit" value="XML"/></center>
		</form>
		
		<p>Outils de base de données</br> Claire Brunel, Clément Fornes et Ilyas Bensaber</p>
	</footer>
	
	</body>
</html>