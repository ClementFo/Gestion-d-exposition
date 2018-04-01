<?php
include('ConnectBdd.php');

if(isset($_POST['Exposition'])){
	$nom = $bdd->quote($_POST['nom']);
	$theme = $bdd->quote($_POST['theme']);
	$description = $bdd->quote($_POST['description']);
	$image = $bdd->quote($_POST['image']);
	
	$resultat=$bdd->query("update Exposition set nom=".$nom.", theme=".$theme.", description=".$description.", dateDebut='".$_POST['dateDeb']."', dateFin='".$_POST['dateFin']."', image=".$image.", idOrganisateur=".$_POST['idOrganisateur']." 
		where idExposition=".$_POST['idExposition'].";");
	
}else if(isset($_POST['Organisateur'])){
	$nom = $bdd->quote($_POST['nom']);
	$prenom = $bdd->quote($_POST['prenom']);
	$adresseMail = $bdd->quote($_POST['adresseMail']);
	
	$resultat=$bdd->query("update Organisateur set nom=".$nom.", prenom=".$prenom.", adresseMail=".$adresseMail." where idOrganisateur=".$_POST['idOrganisateur'].";");

}else if(isset($_POST['Evenement'])){
	$nom = $bdd->quote($_POST['nom']);
	$type = $bdd->quote($_POST['type']);
	
	$resultat=$bdd->query("update Evenement set nom=".$nom.", type=".$type.", dateDeb=".$_POST['dateDeb'].", dateFin=".$_POST['dateFin']."
		where idEvenement =".$_POST['idEvenement'].";");
	$resultat2=$bdd->query("update Se_Passer set idExposition=".$_POST['idExposition'].", idLieu=".$_POST['idLieu']."
		where idEvenement =".$_POST['idEvenement'].";");
	
}else if(isset($_POST['Lieu'])){
	$nom = $bdd->quote($_POST['nom']);
	$ville = $bdd->quote($_POST['ville']);
	$adresse = $bdd->quote($_POST['adresse']);
	
	$resultat=$bdd->query("update Lieu set nomBatiment=".$nom.", ville=".$ville.", cp=".$_POST['cp'].", adresse=".$adresse.", dimension=".$_POST['dimension']."
	where idLieu =".$_POST['idLieu'].";");
	$resultat2=$bdd->query("update Se_Passer set idExposition=".$_POST['idExposition'].", idEvenement=".$_POST['idEvenement']."
		where idLieu =".$_POST['idLieu'].";");
	
	
}else if(isset($_POST['Exposant'])){
	$nom = $bdd->quote($_POST['nom']);
	$prenom = $bdd->quote($_POST['prenom']);
	$profession = $bdd->quote($_POST['profession']);
	$entreprise = $bdd->quote($_POST['entreprise']);
	
	if($_POST['entreprise']==$donneesEntrep){
		$resultat=$bdd->query("update Professionnel set nom=".$nom.", prenom=".$prenom.", profession=".$profession.", entreprise=".$entreprise." where idProfessionnel=".$_POST['idExposant'].";");
			
		$resultat2=$bdd->query("update Exposant set idStand=".$_POST['idStand'].",idLieu=".$_POST['idLieu']." where idProfessionnel=".$_POST['idExposant'].";");
	}	
	
}else if(isset($_POST['Invite'])){
	$nom = $bdd->quote($_POST['nom']);
	$prenom = $bdd->quote($_POST['prenom']);
	$profession = $bdd->quote($_POST['profession']);
	$entreprise = $bdd->quote($_POST['entreprise']);
	$specification = $bdd->quote($_POST['specification']);
	
	$resultat=$bdd->query("update Professionnel set nom=".$nom.", prenom=".$prenom.", profession=".$profession.", entreprise=".$entreprise." where idProfessionnel=".$_POST['idInvite'].";");
	$resultat2=$bdd->query("update Invite set specification=".$specification." where idProfessionnel=".$_POST['idInvite'].";");
	$resultat3=$bdd->query("update Etre_Inviter set idEvenement=".$_POST['idEvenement']." where idProfessionnel=".$_POST['idInvite'].";");
	
}else if(isset($_POST['Visiteur'])){
	$nom = $bdd->quote($_POST['nom']);
	$prenom = $bdd->quote($_POST['prenom']);
	$ticket = $bdd->quote($_POST['ticket']);
	
	$resultat=$bdd->query("update Visiteur set nom=".$nom.", prenom=".$prenom.", ticket_vip=".$ticket." where idVisiteur=".$_POST['idVisiteur'].";");
	$resultat3=$bdd->query("update Visiter set idExposition=".$_POST['idExposition']." where idVisiteur=".$_POST['idVisiteur'].";");
	
}
	
mysqli_free_result($resultat);
if(isset($resultat2)){
	mysqli_free_result($resultat2);	
}if(isset($resultat3)){
	mysqli_free_result($resultat3);	
}
mysqli_close($bdd);
header("Location: ChoixModification");

?>
