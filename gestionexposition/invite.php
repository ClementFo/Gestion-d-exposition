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
if($_POST['Evenement']!="all"){
	$idEvenement=$_POST['Evenement'];
}
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
			<form method="post" action="invite">
				<select name="Evenement">
				<option value="<?php echo "all";?>"><?php echo "Tout";?></option>
<?php
$choix=$bdd->query("Select idEvenement, nom from Evenement where idEvenement in(Select idEvenement from Se_Passer where idExposition=".$idExposition.");");
while($donneesChoix = $choix->fetch()){
?>
					<option value="<?php echo $donneesChoix['idEvenement'];?>"><?php echo $donneesChoix['nom'];?></option>
<?php
}
?>
				</select>
				<input type="submit" value="Valider"/>
			</form>
		</section>
		
<?php
$requete=$bdd->query("Select * from Invite;");
$requete2=$bdd->query("Select * from Professionnel where idProfessionnel in (Select idProfessionnel from Invite);");
	
if(isset($idEvenement)){
	$requete=$bdd->query("Select * from Invite where idProfessionnel in (Select idProfessionnel from Etre_inviter where idEvenement=".$idEvenement.");");
	$requete2=$bdd->query("Select * from Professionnel where idProfessionnel in (Select idProfessionnel from Etre_inviter where idEvenement=".$idEvenement.");");
}


while($donnees = $requete2->fetch()){

	$donneesSpe = $requete->fetch();
	
	$evenement=$bdd->query("Select * from Evenement where idEvenement in (Select idEvenement from Etre_Inviter where idProfessionnel=".$donnees['idProfessionnel'].");");
	
	echo '<section><p><h2>Invité : </h2><h3>'.$donnees['prenom'].' '.$donnees['nom'].', </h3>'.$donnees['profession'].', '.$donnees['entreprise'].', '.$donneesSpe['specification'].'</p>';
	
	while($donneesEvenement = $evenement->fetch()){
		echo '<p><h4>Evenement : </h4>'.$donneesEvenement['nom'].' '.$donneesEvenement['type'].' du '.$donneesEvenement['dateDeb'].' à '.$donneesEvenement['dateFin'].'</p>';
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
			<input type="hidden" name="page" value="invite"/>
			<center><input type="submit" value="XML"/></center>
		</form>
		
		<p>Outils de base de données</br> Claire Brunel, Clément Fornes et Ilyas Bensaber</p>
	</footer>
	
	</body>
</html>