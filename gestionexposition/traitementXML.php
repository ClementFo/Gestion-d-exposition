<?php
include('ConnectBdd.php');
	
/*--------------------------------------
			Exposition
--------------------------------------*/
	$exposition=$bdd->query("select * from Exposition");
	
	$xmlExposition = fopen('XML/Exposition.xml', 'a');
	if(file_exists('XML/Exposition.xml')){
		ftruncate($xmlExposition,0);
	}
	
	fputs($xmlExposition,"<?xml version=\"1.0\"?>");
	fputs($xmlExposition,"\r\n<Expositions>");
	while($donneesExpo = $exposition->fetch()){
		fputs($xmlExposition,"\r\n	<exposition>");
		fputs($xmlExposition,"\r\n		<idEposition>".$donneesExpo['idExposition']."</idEposition>");
		fputs($xmlExposition,"\r\n		<nom>".$donneesExpo['nom']."</nom>");
		fputs($xmlExposition,"\r\n		<theme>".$donneesExpo['theme']."</theme>");
		fputs($xmlExposition,"\r\n		<description>".$donneesExpo['description']."</description>");
		fputs($xmlExposition,"\r\n		<dateDebut>".$donneesExpo['dateDebut']."</dateDebut>");
		fputs($xmlExposition,"\r\n		<dateFin>".$donneesExpo['dateFin']."</dateFin>");
		fputs($xmlExposition,"\r\n		<image>".$donneesExpo['image']."</image>");
		
		$Orga=$bdd->query("Select * from Organisateur where idOrganisateur = ".$donneesExpo['idOrganisateur'].";");
		$donneesExpoOrga = $Orga->fetch();
		
		fputs($xmlExposition,"\r\n		<organisateur>".$donneesExpoOrga['nom']." ".$donneesExpoOrga['prenom']."</organisateur>");
		fputs($xmlExposition,"\r\n	</exposition>");
	}
	fputs($xmlExposition,"\r\n</Expositions>");
	fclose($xmlExposition);
	

/*--------------------------------------
			Organisateur
--------------------------------------*/
	$organisateur=$bdd->query("select * from Organisateur");
	
	$xmlOrganisateurs = fopen('XML/Organisateur.xml', 'a');
	if(file_exists('XML/Organisateur.xml')){
		ftruncate($xmlOrganisateurs,0);
	}
	
	fputs($xmlOrganisateurs,"<?xml version=\"1.0\"?>");
	fputs($xmlOrganisateurs,"\r\n<Organisateurs>");
	while($donneesOrg = $organisateur->fetch()){
		fputs($xmlOrganisateurs,"\r\n	<organisateur>");
		fputs($xmlOrganisateurs,"\r\n		<idOrganisateur>".$donneesOrg['idOrganisateur']."</idOrganisateur>");
		fputs($xmlOrganisateurs,"\r\n		<nom>".$donneesOrg['nom']."</nom>");
		fputs($xmlOrganisateurs,"\r\n		<prenom>".$donneesOrg['prenom']."</prenom>");
		fputs($xmlOrganisateurs,"\r\n		<adresseMail>".$donneesOrg['adresseMail']."</adresseMail>");
		fputs($xmlOrganisateurs,"\r\n	</organisateur>");
	}
	fputs($xmlOrganisateurs,"\r\n</Organisateurs>");
	fclose($xmlOrganisateurs);


/*--------------------------------------
			Evenement
--------------------------------------*/
	$evenement=$bdd->query("select * from Evenement");
	
	$xmlEvenement = fopen('XML/Evenement.xml', 'a');
	if(file_exists('XML/Evenement.xml')){
		ftruncate($xmlEvenement,0);
	}
	
	fputs($xmlEvenement,"<?xml version=\"1.0\"?>");
	fputs($xmlEvenement,"\r\n<Evenements>");
	while($donneesEvent = $evenement->fetch()){
		fputs($xmlEvenement,"\r\n	<evenement>");
		fputs($xmlEvenement,"\r\n		<idEvenement>".$donneesEvent['idEvenement']."</idEvenement>");
		fputs($xmlEvenement,"\r\n		<nom>".$donneesEvent['nom']."</nom>");
		fputs($xmlEvenement,"\r\n		<type>".$donneesEvent['type']."</type>");
		fputs($xmlEvenement,"\r\n		<dateDebut>".$donneesEvent['dateDeb']."</dateDebut>");
		fputs($xmlEvenement,"\r\n		<dateFin>".$donneesEvent['dateFin']."</dateFin>");
		fputs($xmlEvenement,"\r\n	</evenement>");
	}
	fputs($xmlEvenement,"\r\n</Evenements>");
	fclose($xmlEvenement);


/*--------------------------------------
			Lieu
--------------------------------------*/
	$lieu=$bdd->query("select * from Lieu");
	
	$xmlLieux = fopen('XML/Lieu.xml', 'a');
	if(file_exists('XML/Lieu.xml')){
		ftruncate($xmlLieux,0);
	}
	
	fputs($xmlLieux,"<?xml version=\"1.0\"?>");
	fputs($xmlLieux,"\r\n<Lieux>");
	while($donneesLieu = $lieu->fetch()){
		fputs($xmlLieux,"\r\n	<lieu>");
		fputs($xmlLieux,"\r\n		<idLieu>".$donneesLieu['idLieu']."</idLieu>");
		fputs($xmlLieux,"\r\n		<nomBatiment>".$donneesLieu['nomBatiment']."</nomBatiment>");
		fputs($xmlLieux,"\r\n		<ville>".$donneesLieu['ville']."</ville>");
		fputs($xmlLieux,"\r\n		<codePostal>".$donneesLieu['cp']."</codePostal>");
		fputs($xmlLieux,"\r\n		<adresse>".$donneesLieu['adresse']."</adresse>");
		fputs($xmlLieux,"\r\n		<dimension>".$donneesLieu['dimension']."</dimension>");
		fputs($xmlLieux,"\r\n	</lieu>");
	}
	fputs($xmlLieux,"\r\n</Lieux>");
	fclose($xmlLieux);


/*--------------------------------------
			Exposant
--------------------------------------*/
	$professionnelExp=$bdd->query("select * from Professionnel where idProfessionnel in (select idProfessionnel from Exposant);");
	
	$xmlExposant = fopen('XML/Exposant.xml', 'a');
	if(file_exists('XML/Exposant.xml')){
		ftruncate($xmlExposant,0);
	}
	
	fputs($xmlExposant,"<?xml version=\"1.0\"?>");
	fputs($xmlExposant,"\r\n<Exposants>");
	while($donneesPro = $professionnelExp->fetch()){
		fputs($xmlExposant,"\r\n	<exposant>");
		fputs($xmlExposant,"\r\n		<idProfessionnel>".$donneesPro['idProfessionnel']."</idProfessionnel>");
		fputs($xmlExposant,"\r\n		<nom>".$donneesPro['nom']."</nom>");
		fputs($xmlExposant,"\r\n		<prenom>".$donneesPro['prenom']."</prenom>");
		fputs($xmlExposant,"\r\n		<profession>".$donneesPro['profession']."</profession>");
		fputs($xmlExposant,"\r\n		<entreprise>".$donneesPro['entreprise']."</entreprise>");
		fputs($xmlExposant,"\r\n		<dataExposants>");
		
		$Exposant=$bdd->query("select * from Exposant;");
		$donneesExposant = $Exposant->fetch();
		$lieuExposant=$bdd->query("select nomBatiment from Lieu where idLieu in (select idLieu from Exposant where idProfessionnel = ".$donneesPro['idProfessionnel'].");");
		$donneesLieuExposant = $lieuExposant->fetch();
		
		fputs($xmlExposant,"\r\n			<stand>".$donneesExposant['idStand']."</stand>");
		fputs($xmlExposant,"\r\n			<batiment>".$donneesLieuExposant['nomBatiment']."</batiment>");
		fputs($xmlExposant,"\r\n		</dataExposants>");
		fputs($xmlExposant,"\r\n	</exposant>");
	}
	fputs($xmlExposant,"\r\n</Exposants>");
	fclose($xmlExposant);


/*--------------------------------------
			Invité
--------------------------------------*/
	$professionnelInv=$bdd->query("select * from Professionnel where idProfessionnel in (select idProfessionnel from Invite);");
	
	$xmlInvite = fopen('XML/Invite.xml', 'a');
	if(file_exists('XML/Invite.xml')){
		ftruncate($xmlInvite,0);
	}
	
	fputs($xmlInvite,"<?xml version=\"1.0\"?>");
	fputs($xmlInvite,"\r\n<Invites>");
	while($donneesPro = $professionnelInv->fetch()){
		fputs($xmlInvite,"\r\n	<invite>");
		fputs($xmlInvite,"\r\n		<idProfessionnel>".$donneesPro['idProfessionnel']."</idProfessionnel>");
		fputs($xmlInvite,"\r\n		<nom>".$donneesPro['nom']."</nom>");
		fputs($xmlInvite,"\r\n		<prenom>".$donneesPro['prenom']."</prenom>");
		fputs($xmlInvite,"\r\n		<profession>".$donneesPro['profession']."</profession>");
		fputs($xmlInvite,"\r\n		<entreprise>".$donneesPro['entreprise']."</entreprise>");
		fputs($xmlInvite,"\r\n		<dataInvites>");
		
		$Invite=$bdd->query("select * from Invite where idProfessionnel = ".$donneesPro['idProfessionnel'].";");
		$donneesInvite = $Invite->fetch();
		fputs($xmlInvite,"\r\n			<specification>".$donneesInvite['specification']."</specification>");
		
		$inviteEvent=$bdd->query("select * from Evenement where idEvenement in (select idEvenement from etre_inviter where idProfessionnel in (select idProfessionnel from Invite where idProfessionnel = ".$donneesPro['idProfessionnel']."));");
		
		while($donneesInviteEvent = $inviteEvent->fetch()){
			fputs($xmlInvite,"\r\n			<evenement>".$donneesInviteEvent['nom']."</evenement>");
		}
		
		fputs($xmlInvite,"\r\n		</dataInvites>");
		fputs($xmlInvite,"\r\n	</invite>");
	}
	fputs($xmlInvite,"\r\n</Invites>");
	fclose($xmlInvite);


/*--------------------------------------
			Visiteur
--------------------------------------*/
	$visiteur=$bdd->query("select * from Visiteur");
	
	$xmlVisiteur = fopen('XML/Visiteur.xml', 'a');
	if(file_exists('XML/Visiteur.xml')){
		ftruncate($xmlVisiteur,0);
	}
	
	fputs($xmlVisiteur,"<?xml version=\"1.0\"?>");
	fputs($xmlVisiteur,"\r\n<Visiteurs>");
	while($donneesVis = $visiteur->fetch()){
		fputs($xmlVisiteur,"\r\n	<visiteur>");
		fputs($xmlVisiteur,"\r\n		<idVisiteur>".$donneesVis['idVisiteur']."</idVisiteur>");
		fputs($xmlVisiteur,"\r\n		<nom>".$donneesVis['nom']."</nom>");
		fputs($xmlVisiteur,"\r\n		<prenom>".$donneesVis['prenom']."</prenom>");
		fputs($xmlVisiteur,"\r\n		<ticketVIP>".$donneesVis['ticket_vip']."</ticketVIP>");
		fputs($xmlVisiteur,"\r\n	</visiteur>");
	}
	fputs($xmlVisiteur,"\r\n</Visiteurs>");
	fclose($xmlVisiteur);


	mysqli_close($bdd);
	header("Location: ".$_POST['page']);
?>


