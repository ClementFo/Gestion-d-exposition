<?php
session_start();

$idExposition;
$idOrganisateur;
$idEvenement;
$idLieu;
$idExposant;
$idInvite;
$idVisiteur;

if(isset($_POST['Exposition'])){
	$idExposition = $_POST['Exposition'];
	
}else if(isset($_POST['Organisateur'])){
	$idOrganisateur = $_POST['Organisateur'];
	
}else if(isset($_POST['Evenement'])){
	$idEvenement = $_POST['Evenement'];
	
}else if(isset($_POST['Lieu'])){
	$idLieu = $_POST['Lieu'];
	
}else if(isset($_POST['exposant'])){
	$idExposant = $_POST['exposant'];
	
}else if(isset($_POST['invite'])){
	$idInvite = $_POST['invite'];
	
}else if(isset($_POST['visiteur'])){
	$idVisiteur = $_POST['visiteur'];
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
	
	<body onload="data_hidden();">
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
<?php 
if(isset($idExposition)){
	$Expo=$bdd->query("Select * from Exposition where idExposition = ".$idExposition.";");
	$donneesExpo = $Expo->fetch();
?>
			<section>	
				<h2>Exposition</h2>			
				<form method="post" action="traitementModifier">
					<div class="add">
						<label><?php echo "Id Exposant : ".$idExposition; ?></label>
					</div>
					<div class="add">
						<label>Nom</label>
						<input type="text" name="nom" id="nom" value="<?php echo $donneesExpo['nom']; ?>"/>
					</div>
					<div class="add">
						<label>Thème</label>
						<input type="text" name="theme" id="theme" value="<?php echo $donneesExpo['theme']; ?>"/>
					</div>
					<div class="add">
						<label>Description</label>
						<input type="text" name="description" id="description" value="<?php echo $donneesExpo['description']; ?>"/>
					</div>
					<div class="add">
						<label>Date debut</label>
						<input type="date" name="dateDeb" id="dateDeb" value="<?php echo $donneesExpo['dateDebut']; ?>"/>
					</div>
					<div class="add">
						<label>Date fin</label>
						<input type="date" name="dateFin" id="dateFin" value="<?php echo $donneesExpo['dateFin']; ?>"/>
					</div>
					<div class="add">
						<label>Image</label>
						<input type="text" name="image" id="image" value="<?php echo $donneesExpo['image']; ?>"/>
					</div>
					<div class="add">
						<label>Organisateur</label>
						<select name="idOrganisateur"  id="selectOrg">
<?php
$choix=$bdd->query("Select* from Organisateur;");
while($donneesChoix = $choix->fetch()){
	if($donneesChoix['idOrganisateur']==$donneesExpo['idOrganisateur']){
?>
							<option value="<?php echo $donneesChoix['idOrganisateur'];?>" selected><?php echo $donneesChoix['nom']."   ".$donneesChoix['prenom'];?></option>
<?php
	}else{
?>

							<option value="<?php echo $donneesChoix['idOrganisateur'];?>"><?php echo $donneesChoix['nom']."   ".$donneesChoix['prenom'];?></option>
<?php
	}
}
?>
						</select>
					</div>
					<div>
						<center><input type="submit" name="Exposition" value="Valider"/></center>
					</div>
				</form>
			</section>
<?php
}
?>

<!-------------------Organisateur------------------->
<?php 
if(isset($idOrganisateur)){
	$Org=$bdd->query("Select * from Organisateur where idOrganisateur = ".$idOrganisateur.";");
	$donneesOrg = $Org->fetch();
?>
			<section>	
				<h2>Organisateur</h2>
				<form method="post" action="traitementModifier">
					<div class="add">
						<label><?php echo "Id Organisateur : ".$idOrganisateur; ?></label>
					</div>
					<div class="add">
						<label>Nom</label>
						<input type="text" name="nom" value="<?php echo $donneesOrg['nom']; ?>"/>
					</div>
					<div class="add">
						<label>Prenom</label>
						<input type="text" name="prenom" value="<?php echo $donneesOrg['prenom']; ?>"/>
					</div>
					<div class="add">
						<label>Adresse Mail</label>
						<input type="text" name="adresseMail" value="<?php echo $donneesOrg['adresseMail']; ?>"/>
					</div>
					<div>
						<center><input type="submit" name="Organisateur" value="Valider"/></center>
					</div>
				</form>
			</section>
<?php
}
?>

<!--------------------Evenement--------------------->
<?php 
if(isset($idEvenement)){
	$Event=$bdd->query("Select * from Evenement where idEvenement = ".$idEvenement.";");
	$donneesEvent = $Event->fetch();
?>
			<section>
				<h2>Evenement</h2>
				<form method="post" action="traitementModifier">
					<div class="add">
						<label><?php echo "Id Evenement : ".$idEvenement; ?></label>
					</div>
					<div class="add">
						<label>Nom</label>
						<input type="text" name="nom" value="<?php echo $donneesEvent['nom']; ?>"/>
					</div>
					<div class="add">
						<label>type</label>
						<input type="text" name="type" value="<?php echo $donneesEvent['type']; ?>"/>
					</div>
					<div class="add">
						<label>Date debut</label>
						<input type="datetime" name="dateDeb" value="<?php echo $donneesEvent['dateDeb']; ?>"/>
					</div>
					<div class="add">
						<label>Date fin</label>
						<input type="datetime" name="dateFin" value="<?php echo $donneesEvent['dateFin']; ?>"/>
					</div>
<?php
$EventExpo=$bdd->query("Select * from Se_Passer where idEvenement = ".$idEvenement.";");
$donneesEventExpo = $EventExpo->fetch();
?>
					<div class="add">
						<label>Exposition</label>
						<select name="idExposition">
<?php
$choix=$bdd->query("Select * from exposition;");
while($donneesChoix = $choix->fetch()){
	if($donneesChoix['idExposition'] == $donneesEventExpo['idExposition']){
?>
						<option value="<?php echo $donneesChoix['idExposition'];?>" selected><?php echo $donneesChoix['nom'];?></option>
<?php
	}else{
?>
						<option value="<?php echo $donneesChoix['idExposition'];?>"><?php echo $donneesChoix['nom'];?></option>
<?php
	}
}
?>
						</select>
					</div>
					<div class="add">
						<label>Lieu</label>
							<select name="idLieu">
<?php
$choix=$bdd->query("Select * from lieu;");
while($donneesChoix = $choix->fetch()){
	if($donneesChoix['idLieu'] == $donneesEventExpo['idLieu']){
?>
						<option value="<?php echo $donneesChoix['idLieu'];?>" selected><?php echo $donneesChoix['nomBatiment'];?></option>
<?php
	}else{
?>
						<option value="<?php echo $donneesChoix['idLieu'];?>"><?php echo $donneesChoix['nomBatiment'];?></option>
<?php
	}
}
?>
					</select>
					</div>
					<div>
						<center><input type="submit" name="Evenement" value="Valider"/></center>
					</div>
				</form>
			</section>
<?php
}
?>

<!-----------------------Lieu----------------------->
<?php 
if(isset($idLieu)){
	$Lieu=$bdd->query("Select * from Lieu where idLieu = ".$idLieu.";");
	$donneesLieu = $Lieu->fetch();
?>
			<section>
				<h2>Lieu</h2>
				<form method="post" action="traitementModifier">
					<div class="add">
						<label><?php echo "Id Lieu : ".$idLieu; ?></label>
					</div>
					<div class="add">
						<label>Nom Batiment</label>
						<input type="text" name="nom" value="<?php echo $donneesLieu['nomBatiment']; ?>"/>
					</div>
					<div class="add">
						<label>ville</label>
						<input type="text" name="ville" value="<?php echo $donneesLieu['ville']; ?>"/>
					</div>
					<div class="add">
						<label>Code Postal</label>
						<input type="text" name="cp" value="<?php echo $donneesLieu['cp']; ?>"/>
					</div>
					<div class="add">
						<label>Adresse</label>
						<input type="text" name="adresse" value="<?php echo $donneesLieu['adresse']; ?>"/>
					</div>
					<div class="add">
						<label>Dimension</label>
						<input type="text" name="dimension" value="<?php echo $donneesLieu['dimension']; ?>"/>
					</div>
<?php
$LieuExpo=$bdd->query("Select * from Se_Passer where idLieu = ".$idLieu.";");
$donneesLieuExpo = $LieuExpo->fetch();
?>
					<div class="add">
						<label>Exposition</label>
						<select name="idExposition">
<?php
$choix=$bdd->query("Select * from exposition;");
while($donneesChoix = $choix->fetch()){
	if($donneesChoix['idExposition'] == $donneesLieuExpo['idExposition']){
?>
						<option value="<?php echo $donneesChoix['idExposition'];?>" selected><?php echo $donneesChoix['nom'];?></option>
<?php
	}else{
?>
						<option value="<?php echo $donneesChoix['idExposition'];?>"><?php echo $donneesChoix['nom'];?></option>
<?php
	}
}
?>
						</select>
					</div>
					<div class="add">
						<label>Evenement</label>
							<select name="idEvenement">
<?php
$choix=$bdd->query("Select * from evenement;");
while($donneesChoix = $choix->fetch()){
	if($donneesChoix['idEvenement'] == $donneesEventExpo['idEvenement']){
?>
						<option value="<?php echo $donneesChoix['idEvenement'];?>" selected><?php echo $donneesChoix['nom'];?></option>
<?php
	}else{
?>
						<option value="<?php echo $donneesChoix['idEvenement'];?>"><?php echo $donneesChoix['nom'];?></option>
<?php
	}
}
?>
						</select>
					</div>
					<div>
						<center><input type="submit" name="Lieu" value="Valider"/></center>
					</div>
				</form>
			</section>
<?php
}
?>

<!---------------------Exposant--------------------->
<?php 
if(isset($idExposant)){
	$Professionnel=$bdd->query("Select * from Professionnel where idProfessionnel = ".$idExposant.";");
	$donneesProfessionnel = $Professionnel->fetch();
	$Exposant=$bdd->query("Select * from Exposant where idProfessionnel = ".$idExposant.";");
	$donneesExposant = $Exposant->fetch();
?>
			<section>
				<h2>Exposant</h2>
				<form method="post" action="traitementModifier">
					<div class="add">
						<label><?php echo "Id Exposant : ".$idExposant; ?></label>
					</div>
					<div class="add">
						<label>Nom</label>
						<input type="text" name="nom" value="<?php echo $donneesProfessionnel['nom']; ?>"/>
					</div>
					<div class="add">
						<label>Prenom</label>
						<input type="text" name="prenom" value="<?php echo $donneesProfessionnel['prenom']; ?>"/>
					</div>
					<div class="add">
						<label>Profession</label>
						<input type="text" name="profession" value="<?php echo $donneesProfessionnel['profession']; ?>"/>
					</div>
					<div class="add">
						<label>Entreprise</label>
						<input type="text" name="entreprise" value="<?php echo $donneesProfessionnel['entreprise']; ?>"/>
					</div>
					<div class="add">
					<label>Numero de Stand</label>
					<select name="idStand">
<?php
$choix=$bdd->query("Select idStand from exposant group by idStand;");
while($donneesChoix = $choix->fetch()){
	if($donneesChoix['idStand'] == $donneesExposant['idStand']){
?>
						<option value="<?php echo $donneesChoix['idStand'];?>" selected><?php echo "Stand : ".$donneesChoix['idStand'];?></option>
<?php
	}else{
?>
						<option value="<?php echo $donneesChoix['idStand'];?>"><?php echo "Stand : ".$donneesChoix['idStand'];?></option>
<?php
	}
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
	if($donneesChoix['idLieu'] == $donneesExposant['idStand']){
	?>
						<option value="<?php echo $donneesChoix['idLieu'];?>" selected><?php echo $donneesChoix['nomBatiment'];?></option>
<?php
	}else{
?>
						<option value="<?php echo $donneesChoix['idLieu'];?>"><?php echo $donneesChoix['nomBatiment'];?></option>
<?php
	}
}
?>
						</select>
					</div>
					<div>
						<center><input type="submit" name="Exposant" value="Valider"/></center>
					</div>
				</form>
			</section>
<?php
}
?>

<!----------------------Invite---------------------->
<?php 
if(isset($idInvite)){
	$Professionnel=$bdd->query("Select * from Professionnel where idProfessionnel = ".$idInvite.";");
	$donneesProfessionnel = $Professionnel->fetch();
	$Invite=$bdd->query("Select * from Invite where idProfessionnel = ".$idInvite.";");
	$donneesInvite = $Invite->fetch();
?>
			<section>
				<h2>Invite</h2>
				<form method="post" action="traitementModifier">
					<div class="add">
						<label><?php echo "Id Invite : ".$idInvite; ?></label>
					</div>
					<div class="add">
						<label>Nom</label>
						<input type="text" name="nom" value="<?php echo $donneesProfessionnel['nom']; ?>"/>
					</div>
					<div class="add">
						<label>Prenom</label>
						<input type="text" name="prenom" value="<?php echo $donneesProfessionnel['prenom']; ?>"/>
					</div>
					<div class="add">
						<label>Profession</label>
						<input type="text" name="profession" value="<?php echo $donneesProfessionnel['profession']; ?>"/>
					</div>
					<div class="add">
						<label>Entreprise</label>
						<input type="text" name="entreprise" value="<?php echo $donneesProfessionnel['entreprise']; ?>"/>
					</div>
					<div class="add">
						<label>Specification</label>
						<input type="text" name="specification" value="<?php echo $donneesInvite['specification']; ?>"/>
					</div>
<?php					
$choixInvit=$bdd->query("Select idEvenement from Etre_Inviter where idProfessionnel = ".$idInvite.";");
$donneesChoixInvit = $choixInvit->fetch();
?>
					<div class="add">
						<label>Evenement</label>
							<select name="idEvenement">
<?php
$choix=$bdd->query("Select * from evenement;");
while($donneesChoix = $choix->fetch()){
	if($donneesChoix['idEvenement'] == $donneesChoixInvit['idEvenement']){
?>
						<option value="<?php echo $donneesChoix['idEvenement'];?>" selected><?php echo $donneesChoix['nom'];?></option>
<?php
	}else{
?>
						<option value="<?php echo $donneesChoix['idEvenement'];?>"><?php echo $donneesChoix['nom'];?></option>
<?php
	}
}
?>
						</select>
					</div>
					<div>
						<center><input type="submit" name="Invite" value="Valider"/></center>
					</div>
				</form>
			</section>
<?php
}
?>

<!---------------------Visiteur--------------------->
<?php 
if(isset($idVisiteur)){
	$Visiteur=$bdd->query("Select * from Visiteur where idVisiteur = ".$idVisiteur.";");
	$donneesVisiteur = $Visiteur->fetch();
?>
			<section>
				<h2>Visiteur</h2>
				<form method="post" action="traitementModifier">
					<div class="add">
						<label><?php echo "Id Visiteur : ".$idVisiteur; ?></label>
					</div>
					<div class="add">
						<label>Nom</label>
						<input type="text" name="nom" value="<?php echo $donneesVisiteur['nom']; ?>"/>
					</div>
					<div class="add">
						<label>Prenom</label>
						<input type="text" name="prenom" value="<?php echo $donneesVisiteur['prenom']; ?>"/>
					</div>
					<div class="add">
						<label>Ticket VIP</label>
						<select name="ticket">
<?php
if($donneesVisiteur['ticket_vip'] == "Oui"){
?>
							<option value="oui" selected>Oui</option>
							<option value="non">Non</option>
<?php
}else{
?>
							<option value="oui">Oui</option>
							<option value="non" selected>Non</option>
<?php
}
?>
						</select>
					</div>
<?php					
$choixVisit=$bdd->query("Select idExposition from Visiter where idVisiteur = ".$idVisiteur.";");
$donneesChoixVisit = $choixVisit->fetch();
?>
					<div class="add">
						<label>Exposition</label>
						<select name="idExposition">
<?php
$choix=$bdd->query("Select * from exposition;");
while($donneesChoix = $choix->fetch()){
	if($donneesChoix['idExposition'] == $donneesChoixVisit['idExposition']){
?>
						<option value="<?php echo $donneesChoix['idExposition'];?>" selected><?php echo $donneesChoix['nom'];?></option>
<?php
	}else{
?>
						<option value="<?php echo $donneesChoix['idExposition'];?>"><?php echo $donneesChoix['nom'];?></option>
<?php
	}
}
?>
						</select>
					</div>
					<div>
						<center><input type="submit" name="Visiteur" value="Valider"/></center>
					</div>
				</form>
			</section>
<?php
}
?>
		</article>
	
		<aside id="a1">
			<nav id="navg">
				<a href="index">Choix Exposition</a>
			</nav>
		</aside>

		<aside id="a2">
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
	
	
	