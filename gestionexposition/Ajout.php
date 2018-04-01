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
			<form method="post" action="traitementAjout">
				<h2>Exposition</h2>
				<div class="add">
					<label>Nom</label>
					<input type="text" name="nom"/>
				</div>
				<div class="add">
					<label>Thème</label>
					<input type="text" name="theme"/>
				</div>
				<div class="add">
					<label>Description</label>
					<input type="text" name="description"/>
				</div>
				<div class="add">
					<label>Date debut</label>
					<input type="date" name="dateDeb"/>
				</div>
				<div class="add">
					<label>Date fin</label>
					<input type="date" name="dateFin"/>
				</div>
				<div class="add">
					<label>Image</label>
					<input type="text" name="image"/>
				</div>
				<div class="add">
					<label>Organisateur</label>
					<select name="idOrganisateur">
<?php
$choix=$bdd->query("Select * from Organisateur;");
while($donneesChoix = $choix->fetch()){
?>
						<option value="<?php echo $donneesChoix['idOrganisateur'];?>"><?php echo $donneesChoix['nom']."   ".$donneesChoix['prenom'];?></option>
<?php
}
?>
					</select>
				</div>
				<div>
					<center><input type="submit" name="Exposition" value="Valider"/></center>
				</div>
			</form>
		</section>
			
<!-------------------Organisateur------------------->
		<section>
			<form method="post" action="traitementAjout">

				<h2>Organisateur</h2>
				<div class="add">
					<label>Nom</label>
					<input type="text" name="nom"/>
				</div>
				<div class="add">
					<label>Prenom</label>
					<input type="text" name="prenom"/>
				</div>
				<div class="add">
					<label>Adresse Mail</label>
					<input type="text" name="adresseMail"/>
				</div>
				<div>
					<center><input type="submit" name="Organisateur" value="Valider"/></center>
				</div>
			</form>
		</section>

<!--------------------Evenement--------------------->
		<section>
			<form method="post" action="traitementAjout">

				<h2>Evenement</h2>
				<div class="add">
					<label>Nom</label>
					<input type="text" name="nom"/>
				</div>
				<div class="add">
					<label>type</label>
					<input type="text" name="type"/>
				</div>
				<div class="add">
					<label>Date debut</label>
					<input type="date" name="dateDeb"/>
				</div>
				<div class="add">
					<label>Date fin</label>
					<input type="date" name="dateFin"/>
				</div>
				<div class="add">
					<label>Exposition</label>
					<select name="idExposition">
<?php
$choix=$bdd->query("Select * from Exposition;");
while($donneesChoix = $choix->fetch()){
?>
						<option value="<?php echo $donneesChoix['idExposition'];?>"><?php echo $donneesChoix['nom'];?></option>
<?php
}
?>
					</select>
				</div>
				<div class="add">
					<label>Lieu</label>
					<select name="idLieu">
<?php
$choix=$bdd->query("Select * from Lieu;");
while($donneesChoix = $choix->fetch()){
?>
						<option value="<?php echo $donneesChoix['idLieu'];?>"><?php echo $donneesChoix['nomBatiment'];?></option>
<?php
}
?>
					</select>
				</div>
				<div>
					<center><input type="submit" name="Evenement" value="Valider"/></center>
				</div>
			</form>
		</section>

<!-----------------------Lieu----------------------->
		<section>
			<form method="post" action="traitementAjout">

				<h2>Lieu</h2>
				<div class="add">
					<label>Nom Batiment</label>
					<input type="text" name="nom"/>
				</div>
				<div class="add">
					<label>ville</label>
					<input type="text" name="ville"/>
				</div>
				<div class="add">
					<label>Code Postal</label>
					<input type="text" name="cp"/>
				</div>
				<div class="add">
					<label>Adresse</label>
					<input type="text" name="adresse"/>
				</div>
				<div class="add">
					<label>Dimension</label>
					<input type="text" name="dimension"/>
				</div>
				<div class="add">
					<label>Exposition</label>
					<select name="idExposition">
<?php
$choix=$bdd->query("Select * from Exposition;");
while($donneesChoix = $choix->fetch()){
?>
						<option value="<?php echo $donneesChoix['idExposition'];?>"><?php echo $donneesChoix['nom'];?></option>
<?php
}
?>
					</select>
				</div>
				<div class="add">
					<label>Evenement</label>
					<select name="idEvenement">
<?php
$choix=$bdd->query("Select * from Evenement;");
while($donneesChoix = $choix->fetch()){
?>
						<option value="<?php echo $donneesChoix['idEvenement'];?>"><?php echo $donneesChoix['nom'];?></option>
<?php
}
?>
					</select>
				</div>
				<div>
					<center><input type="submit" name="Lieu" value="Valider"/></center>
				</div>
			</form>
		
		</section>

<!---------------------Exposant--------------------->
		<section>
			<form method="post" action="traitementAjout">
				<h2>Exposant</h2>
				<div class="add">
					<label>Nom</label>
					<input type="text" name="nom"/>
				</div>
				<div class="add">
					<label>Prenom</label>
					<input type="text" name="prenom"/>
				</div>
				<div class="add">
					<label>Profession</label>
					<input type="text" name="profession"/>
				</div>
				<div class="add">
					<label>Entreprise</label>
					<input type="text" name="entreprise"/>
				</div>
				<div class="add">
					<label>Numero de Stand</label>
					<select name="idStand">
<?php
$choix=$bdd->query("Select idStand from Exposant group by idStand;");
while($donneesChoix = $choix->fetch()){
?>
						<option value="<?php echo $donneesChoix['idStand'];?>"><?php echo "Stand : ".$donneesChoix['idStand'];?></option>
<?php
}
?>
						<option value="new"><?php echo "Nouveau stand";?></option>
					</select>
				</div>
				<div class="add">
					<label>Lieu</label>
					<select name="idLieu">
<?php
$choix=$bdd->query("Select * from lieu;");
while($donneesChoix = $choix->fetch())
{ ?>
						<option value="<?php echo $donneesChoix['idLieu'];?>"><?php echo $donneesChoix['nomBatiment'];?></option>
<?php
}
?>
					</select>
				</div>
				<div>
					<center><input type="submit" name="Exposant" value="Valider"/></center>
				</div>
			</form>
		</section>

<!----------------------Invite---------------------->
		<section>
			<form method="post" action="traitementAjout">

				<h2>Invite</h2>
				<div class="add">
					<label>Nom</label>
					<input type="text" name="nom"/>
				</div>
				<div class="add">
					<label>Prenom</label>
					<input type="text" name="prenom"/>
				</div>
				<div class="add">
					<label>Profession</label>
					<input type="text" name="profession"/>
				</div>
				<div class="add">
					<label>Entreprise</label>
					<input type="text" name="entreprise"/>
				</div>
				<div class="add">
					<label>Specification</label>
					<input type="text" name="specification"/>
				</div>
				<div class="add">
					<label>Evenement</label>
					<select name="idEvenement">
<?php
$choix=$bdd->query("Select * from Evenement;");
while($donneesChoix = $choix->fetch()){
?>
						<option value="<?php echo $donneesChoix['idEvenement'];?>"><?php echo $donneesChoix['nom'];?></option>
<?php
}
?>
					</select>
				</div>
				<div>
					<center><input type="submit" name="Invite" value="Valider"/></center>
				</div>
			</form>
		</section>

<!---------------------Visiteur--------------------->
		<section>
			<form method="post" action="traitementAjout">

				<h2>Visiteur</h2>
				<div class="add">
					<label>Nom</label>
					<input type="text" name="nom"/>
				</div>
				<div class="add">
					<label>Prenom</label>
					<input type="text" name="prenom"/>
				</div>
				<div class="add">
					<label>Ticket VIP</label>
					<select name="ticket">
						<option value="oui">Oui</option>
						<option value="non">Non</option>
					</select>
				</div>
				<div class="add">
					<label>Exposition</label>
					<select name="idExposition">
<?php
$choix=$bdd->query("Select * from Exposition;");
while($donneesChoix = $choix->fetch()){
?>
						<option value="<?php echo $donneesChoix['idExposition'];?>"><?php echo $donneesChoix['nom'];?></option>
<?php
}
?>
					</select>
				</div>
				<div>
					<center><input type="submit" name="Visiteur" value="Valider"/></center>
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
	
	
	