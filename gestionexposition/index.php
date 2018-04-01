<?php
session_start();
if(isset($_SESSION['id'])){
	session_unset();
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
			<h1>Exposition</h1>
		</header>
		
		<article>		
<?php
$resultat=$bdd->query("Select * from Exposition;");
?>
			<section>
				<form method="post" action="accueil">
<?php
while($donnees = $resultat->fetch()){
?>
					<div>
						<input type="radio" name="Exposition" value="<?php echo $donnees['idExposition'];?>"/>
						<label class="radio"><?php echo $donnees['nom'].'; '.$donnees['theme'];?></label>
					</div>

<?php
}
?>
					<div>
						<center><input type="submit" value="Valider"/></center>
					</div>
				</form>
		</section>

		</article>
	
	
	<aside>
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
		<p>Outils de base de données</br> Claire Brunel, Clément Fornes et Ilyas Bensaber</p>
	</footer>
	
	</body>
</html>