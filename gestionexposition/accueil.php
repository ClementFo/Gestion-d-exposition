<?php
session_start();
	
if(!isset($_SESSION['id']) && isset($_POST['Exposition'])){
	$_SESSION['id'] = $_POST['Exposition'];		
}else if(!isset($_SESSION['id']) && !isset($_POST['Exposition'])){
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
		<img src="Image\Affiche.jpg">
		
<?php
$resultat=$bdd->query("Select * from Exposition where idExposition=".$idExposition.";");
while($donnees1 = $resultat->fetch()){ 
	echo '<p><h2> Sur le thème : '.$donnees1['theme'].'.</h2> '.$donnees1['description'].'.</p>';
}
	
?>
		
		</section>
		<section>
		
<?php
$evenement=$bdd->query("Select * from Evenement where idEvenement in(Select idEvenement from Se_Passer where idExposition=".$idExposition.")  order by dateDeb;");
while($donnees = $evenement->fetch()){ 
	echo '<h3>'.$donnees['nom'].':</h3><p> '.$donnees['type'].' de '.$donnees['dateDeb'].' a '.$donnees['dateFin'].'</p>';
}
	
?>
		
		</section>		
		<section>		
<?php
$lieu=$bdd->query("Select * from Lieu where idLieu in(Select idLieu from Se_Passer where idExposition=".$idExposition.");");
while($donnees2 = $lieu->fetch()){ 
	echo '<p><h3>'.$donnees2['nomBatiment'].' :</h3> '.$donnees2['adresse'].', '.$donnees2['cp'].' , '.$donnees2['ville'].', limité à '.$donnees2['dimension'].' places</p>';
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
		<nav>
			<ul>
				<li><a href="Ajout">Ajout</a></li>
				<li><a href="ChoixModification">Modifier</a></li>
				<li><a href="Delete">Suppression</a></li>											
			</ul>
		</nav>		
	</aside>
	
	<footer>
		<form method="post" action="traitementXML">
			<input type="hidden" name="page" value="accueil"/>
			<center><input type="submit" value="XML"/></center>
		</form>
		
		<p>Outils de base de données</br> Claire Brunel, Clément Fornes et Ilyas Bensaber</p>
	</footer>
	
	</body>
</html>
	
	
	