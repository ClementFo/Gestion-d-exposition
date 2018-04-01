<?php
include('ConnectBdd.php');

if(isset($_POST['Exposition'])){
	$nom = $bdd->quote($_POST['nom']);
	$theme = $bdd->quote($_POST['theme']);
	$description = $bdd->quote($_POST['description']);
	$image = $bdd->quote($_POST['image']);
	
	$max=$bdd->query("select max(idExposition) from Exposition");
	while($donneesMax = $max->fetch()){ 
		$donMax = $donneesMax['max(idExposition)']+1;
	}
	
	$resultat=$bdd->query("insert into Exposition(idExposition, nom, theme, description, dateDebut, dateFin, image, idOrganisateur) values(".$donMax.",".$nom.",".$theme.",".$description.",'".$_POST['dateDeb']."','".$_POST['dateFin']."',".$image.",".$_POST['idOrganisateur'].");");
	
}else if(isset($_POST['Organisateur'])){
	$nom = $bdd->quote($_POST['nom']);
	$prenom = $bdd->quote($_POST['prenom']);
	$adresseMail = $bdd->quote($_POST['adresseMail']);
	
	$max=$bdd->query("select max(idOrganisateur) from Organisateur");
	while($donneesMax = $max->fetch()){ 
		$donMax = $donneesMax['max(idOrganisateur)']+1;
	}
	
	$resultat=$bdd->query("insert into Organisateur(idOrganisateur, nom, prenom, adresseMail) values(".$donMax.",".$nom.",".$prenom.",".$adresseMail.");");

}else if(isset($_POST['Evenement'])){
	$nom = $bdd->quote($_POST['nom']);
	$type = $bdd->quote($_POST['type']);
	
	$max=$bdd->query("select max(idEvenement) from Evenement");
	while($donneesMax = $max->fetch()){ 
		$donMax = $donneesMax['max(idEvenement)']+1;
	}
	
	$resultat=$bdd->query("insert into Evenement(idEvenement, nom, type, dateDeb, dateFin) values(".$donMax.",".$nom.",".$type.",'".$_POST['dateDeb']."','".$_POST['dateFin']."');");
	
	$resultat2=$bdd->query("insert into Se_Passer(idLieu, idExposition, idEvenement) values(".$_POST['idLieu'].",".$_POST['idExposition'].",".$donMax.");");
	
}else if(isset($_POST['Lieu'])){
	$nom = $bdd->quote($_POST['nom']);
	$ville = $bdd->quote($_POST['ville']);
	$adresse = $bdd->quote($_POST['adresse']);
	
	$max=$bdd->query("select max(idLieu) from Lieu");
	while($donneesMax = $max->fetch()){ 
		$donMax = $donneesMax['max(idLieu)']+1;
	}
	
	$resultat=$bdd->query("insert into Lieu(idLieu, nomBatiment, ville, cp, adresse, dimension) values(".$donMax.",".$nom.",".$ville.",".$_POST['cp'].",'".$adresse."',".$_POST['dimension'].");");

	$resultat2=$bdd->query("insert into Se_Passer(idLieu, idExposition, idEvenement) values(".$donMax.",".$_POST['idExposition'].",".$_POST['idEvenement'].");");
	
	
}else if(isset($_POST['Exposant'])){
	$nom = $bdd->quote($_POST['nom']);
	$prenom = $bdd->quote($_POST['prenom']);
	$profession = $bdd->quote($_POST['profession']);
	$entreprise = $bdd->quote($_POST['entreprise']);
	
	$max=$bdd->query("select max(idProfessionnel) from Professionnel");
	while($donneesMax = $max->fetch()){ 
		$donMax = $donneesMax['max(idProfessionnel)']+1;
	}
	
	$entrep=$bdd->query("select entreprise from Professionnel where idProfessionnel in(select idProfessionnel from Exposant where idStand=".$_POST['idStand'].") group by entreprise;");
	
	$donneesEntrep = $entrep->fetch();
	if($_POST['idStand']=="Nouveau stand"){
		$maxid=$bdd->query("select max(idStand) from Exposant");	
		while($donneesMaxId = $maxid->fetch()){ 
			$donMax = $donneesMaxId['max(idStand)']+1;
		}
		
		$resultat=$bdd->query("insert into Professionnel (idProfessionnel, nom, prenom, profession, entreprise) values(".$donMax.",".$nom.",".$prenom.",".$profession.",".$entreprise.");");
			
		$resultat2=$bdd->query("insert into Exposant(idStand, idProfessionnel, idLieu) values(".$_POST['idStand'].",".$donMax.",".$_POST['idLieu'].");");
			
	}else if($_POST['entreprise']==$donneesEntrep){
		$resultat=$bdd->query("insert into Professionnel (idProfessionnel, nom, prenom, profession, entreprise) values(".$donMax.",".$nom.",".$prenom.",".$profession.",".$entreprise.");");
			
		$resultat2=$bdd->query("insert into Exposant(idStand, idProfessionnel, idLieu) values(".$_POST['idStand'].",".$donMax.",".$_POST['idLieu'].");");
	}
	
	
}else if(isset($_POST['Invite'])){
	$nom = $bdd->quote($_POST['nom']);
	$prenom = $bdd->quote($_POST['prenom']);
	$profession = $bdd->quote($_POST['profession']);
	$entreprise = $bdd->quote($_POST['entreprise']);
	$specification = $bdd->quote($_POST['specification']);
	
	$max=$bdd->query("select max(idProfessionnel) from Professionnel");
	
	while($donneesMax = $max->fetch()){ 
		$donMax = $donneesMax['max(idProfessionnel)']+1;
	}
	
	$resultat=$bdd->query("insert into Professionnel (idProfessionnel, nom, prenom, profession, entreprise) values(".$donMax.",".$nom.",".$prenom.",".$profession.",".$entreprise.");");
	
	$resultat2=$bdd->query("insert into Invite(idProfessionnel, specification) values(".$donMax.",".$specification.");");
	
	$resultat3=$bdd->query("insert into Etre_Inviter(idProfessionnel, idEvenement) values(".$donMax.", ".$_POST['idEvenement'].");");
	
}else if(isset($_POST['Visiteur'])){
	$nom = $bdd->quote($_POST['nom']);
	$prenom = $bdd->quote($_POST['prenom']);
	$ticket = $bdd->quote($_POST['ticket']);
	
	$max=$bdd->query("select max(idVisiteur) from Visiteur");
	
	while($donneesMax = $max->fetch()){ 
		$donMax = $donneesMax['max(idVisiteur)']+1;
	}
	
	$resultat=$bdd->query("insert into Visiteur(idVisiteur, nom, prenom, ticket_vip) values(".$donMax.",".$nom.",".$prenom.",".$ticket.");");
		
	$resultat2=$bdd->query("insert into visiter(idVisiteur, idExposition) values(".$donMax.",".$_POST['idExposition'].");");
	
}
	
mysqli_free_result($resultat);

if(isset($resultat2)){
	mysqli_free_result($resultat2);	
}

if(isset($resultat3)){
	mysqli_free_result($resultat3);	
}

mysqli_close($bdd);

header("Location: Ajout");

?>