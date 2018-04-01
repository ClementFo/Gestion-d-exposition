<?php
session_start();
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

	<nav>
		<ul>
	    	<li><a href="accueil">Accueil</a></li>
	    	<li><a href="exposition">Exposition</a></li>
			<li><a href="invite">Invite</a></li>
			<li><a href="contact">Contact</a></li>
	    </ul>
	</nav>
	
	<article>
<!-------------------Exposition--------------------->
		<section>
			<h2>Exposition</h2>
			<form method="post" action="traitementDelete">
<?php
$Exposition=$bdd->query("Select * from exposition;");
while($donnees = $Exposition->fetch()){	
?>
					<input type="radio" name="Exposition" value="<?php echo $donnees['idExposition'];?>"/>
					<label class="radio"><?php echo $donnees['nom'].', '.$donnees['theme'];?></label>
					<br/>
<?php
}
?>
				<div>
					<center><input type="submit" value="Valider"/></center>
				</div>
			</form>
		</section>

<!-------------------Organisateur------------------->
		<section>
			<h2>Organisateur</h2>
			<form method="post" action="traitementDelete">		
<?php
$Organisateur=$bdd->query("Select * from Organisateur;");
while($donnees2 = $Organisateur->fetch()){ 
?>
					<input type="radio" name="Organisateur" value="<?php echo $donnees2['idOrganisateur'];?>"/>
					<label class="radio"><?php echo $donnees2['nom'].', '.$donnees2['prenom'];?></label>
					<br/>
<?php
}
?>
				<div>
					<center><input type="submit" value="Valider"/></center>
				</div>
			</form>
		</section>
		
<!-------------------Evenement--------------------->
		<section>
			<h2>Evenement</h2>
			<form method="post" action="traitementDelete">
				<input type="radio" name="Evenement" value="all"/>
				<label class="radio">Tout</label>
				<br/>
<?php
$evenement=$bdd->query("Select * from evenement;");
while($donnees = $evenement->fetch()){	
?>
				<input type="radio" name="Evenement" value="<?php echo $donnees['idEvenement'];?>"/>
				<label class="radio"><?php echo $donnees['nom'].', '.$donnees['type'];?></label>
				<br/>
<?php
}
?>
				<div>
					<center><input type="submit" value="Valider"/></center>
				</div>
			</form>
		</section>

<!-----------------------Lieu----------------------->
		<section>
			<h2>Lieu</h2>
			<form method="post" action="traitementDelete">	
				<input type="radio" name="Lieu" value="all"/>
				<label class="radio">Tout</label>
				<br/>	
<?php
$lieu=$bdd->query("Select * from lieu;");
while($donnees2 = $lieu->fetch()){ 
?>
					<input type="radio" name="Lieu" value="<?php echo $donnees2['idLieu'];?>"/>
					<label class="radio"><?php echo $donnees2['nomBatiment'].', '.$donnees2['ville'];?></label>
					<br/>
<?php
}
?>
				<div>
					<center><input type="submit" value="Valider"/></center>
				</div>
			</form>
		
		</section>

<!---------------------Exposant--------------------->
		<section>
			<h2>Exposant</h2>
			<form method="post" action="traitementDelete">
				<input type="radio" name="exposant" value="all"/>
				<label class="radio">Tout</label>
				<br/>
<?php
$exposant=$bdd->query("Select idProfessionnel from Exposant;");
while($donnees3 = $exposant->fetch()){ 
?>
				<input type="radio" name="exposant" value="<?php echo $donnees3['idProfessionnel'];?>"/>
<?php
	$pro=$bdd->query("Select * from Professionnel where idProfessionnel =".$donnees3['idProfessionnel'].";");
	
	while($donneesPro = $pro->fetch()){ 
?>
					<label class="radio"><?php echo $donneesPro['nom'].', '.$donneesPro['prenom'].', '.$donneesPro['profession'];?></label>
					<br/>
<?php
	}
}
?>

				<div>
					<center><input type="submit" value="Valider"/></center>
				</div>
			</form>
		
		</section>

<!----------------------Invite---------------------->
		<section>
			<h2>Invite</h2>
			<form method="post" action="traitementDelete">
				<input type="radio" name="invite" value="all"/>
				<label class="radio">Tout</label>
				<br/>		

<?php

$invite=$bdd->query("Select idProfessionnel from Invite;");
while($donnees4 = $invite->fetch()){ 
	$profe=$bdd->query("Select * from Professionnel where idProfessionnel =".$donnees4['idProfessionnel'].";");
	while($donneesProfe = $profe->fetch()){ 
?>
					<input type="radio" name="invite" value="<?php echo $donneesProfe['idProfessionnel'];?>"/>
					<label class="radio"><?php echo $donneesProfe['nom'].', '.$donneesProfe['prenom'].', '.$donneesProfe['profession'];?></label>
					<br/>
<?php
	}
}
?>
				<div>
					<center><input type="submit" value="Valider"/></center>
				</div>
			</form>
		
		</section>

<!---------------------Visiteur--------------------->
		<section>
			<h2>Visiteur</h2>
			<form method="post" action="traitementDelete">
				<input type="radio" name="visiteur" value="all"/>
				<label class="radio">Tout</label>
				<br/>

<?php
$invite=$bdd->query("Select * from Visiteur;");
while($donnees4 = $invite->fetch()){ 
?>
				<input type="radio" name="visiteur" value="<?php echo $donnees4['idVisiteur'];?>"/>
				<label class="radio"><?php echo $donnees4['nom'].', '.$donnees4['prenom'];?></label>
				<br/>
<?php
}
?>
				<div>
					<center><input type="submit" value="Valider"/></center>
				</div>
			</form>
		
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
		<p>Outils de base de données</br> Claire Brunel, Clément Fornes et Ilyas Bensaber</p>
	</footer>
	
	</body>
</html>
	
	
	