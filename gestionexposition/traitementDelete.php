<?php
include('ConnectBdd.php');

if(isset($_POST['Exposition'])){
	$resultat=$bdd->query("delete from Exposition where idExposition=".$_POST['Exposition'].";");
	$resultat2=$bdd->query("delete from Se_Passer where idExposition=".$_POST['Exposition'].";");
	$resultat3=$bdd->query("delete from Visiter where idExposition=".$_POST['Exposition'].";");
	mysql_free_result($resultat);
	mysql_free_result($resultat2);
	mysql_free_result($resultat3);
	mysql_close($bdd);
	header("Location: index");
	
}else if(isset($_POST['Organisateur'])){
	$resultat=$bdd->query("delete from Organisateur where idOrganisateur=".$_POST['Organisateur'].";");
	
}else if(isset($_POST['Evenement'])){
	if($_POST['Evenement']=="all"){
		$resultat=$bdd->query("delete from Evenement;");
		$resultat2=$bdd->query("delete from Se_Passer;");
		$resultat2=$bdd->query("delete from Etre_Inviter;");
	}else{
		$resultat=$bdd->query("delete from Evenement where idEvenement=".$_POST['Evenement'].";");
		$resultat2=$bdd->query("delete from Se_Passer where idEvenement=".$_POST['Evenement'].";");
		$resultat2=$bdd->query("delete from Etre_Inviter where idEvenement=".$_POST['Evenement'].";");
	}
	
}else if(isset($_POST['Lieu'])){
	
	$select=$bdd->query("Select idProfessionnel from Exposant where idLieu=".$_POST['idLieu'].";");
	$donnees = $select->fetch();
	$resultat3=$bdd->query("update Exposant set idLieu=".$_POST['idLieu']." where idLieu= null;");
	
	if($_POST['Lieu']=="all"){
		$resultat=$bdd->query("delete from Lieu;");
		$resultat2=$bdd->query("delete from Se_Passer;");
	}else{
		$resultat=$bdd->query("delete from Lieu where idLieu=".$_POST['Lieu'].";");
		$resultat2=$bdd->query("delete from Se_Passer where idLieu=".$_POST['Lieu'].";");
	}
	
}else if(isset($_POST['exposant'])){
	if($_POST['exposant']=="all"){
		$select=$bdd->query("Select idProfessionnel from Exposant;");
		$donnees = $select->fetch();
		
		$resultat=$bdd->query("delete from Exposant;");
		$resultat2=$bdd->query("delete from Professionnel where idProfessionnel in".$donnees.";");
	}else{
		$resultat=$bdd->query("delete from Exposant where idProfessionnel=".$_POST['exposant'].";");
		$resultat2=$bdd->query("delete from Professionnel where idProfessionnel=".$_POST['exposant'].";");
	}
	
}else if(isset($_POST['invite'])){
	if($_POST['invite']=="all"){
		$select=$bdd->query("Select idProfessionnel from Invite;");
		$donnees = $select->fetch();
		
		$resultat=$bdd->query("delete from Invite;");
		$resultat2=$bdd->query("delete from Professionnel where idProfessionnel in".$donnees.";");
		$resultat3=$bdd->query("delete from Etre_Invite;");
		
	}else{
		$resultat=$bdd->query("delete from Invite where idProfessionnel=".$_POST['invite'].";");
		$resultat2=$bdd->query("delete from Professionnel where idProfessionnel=".$_POST['invite'].";");
		$resultat3=$bdd->query("delete from Etre_Invite where idProfessionnel=".$_POST['invite'].";");
	}
	
}else if(isset($_POST['visiteur'])){
	if($_POST['visiteur']=="all"){
		$resultat=$bdd->query("delete from Visiteur;");
		$resultat2=$bdd->query("delete from Visiter;");
	}else{
		$resultat=$bdd->query("delete from Visiteur where idVisiteur=".$_POST['visiteur'].";");
		$resultat2=$bdd->query("delete from Visiter where idVisiteur=".$_POST['visiteur'].";");
	}

}

mysql_free_result($resultat);

if(isset($resultat2)){
	mysql_free_result($resultat2);	
}

if(isset($resultat3)){
	mysql_free_result($resultat2);	
}

mysql_close($bdd);

header("Location: Delete");
?>