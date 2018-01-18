<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Candidat_controler extends Candidat_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Candidat_class();
		$Tab_param=array(
			'CANDIDAT_ID'=>$_POST['CANDIDAT_ID'],
			'CANDIDAT_TYPE'=>$_POST['CANDIDAT_TYPE'],
			'CANDIDAT_CIVILITE'=>$_POST['CANDIDAT_CIVILITE'],
			'CANDIDAT_NOM'=>$_POST['CANDIDAT_NOM'],
			'CANDIDAT_PRENOM'=>$_POST['CANDIDAT_PRENOM'],
			'CANDIDAT_MATRICULE'=>$_POST['CANDIDAT_MATRICULE'],
			'CANDIDAT_DATE_NAISSANCE'=>$_POST['CANDIDAT_DATE_NAISSANCE'],
			'CANDIDAT_LIEU_NAISSANCE'=>$_POST['CANDIDAT_LIEU_NAISSANCE'],
			'CANDIDAT_NATIONALITE'=>$_POST['CANDIDAT_NATIONALITE'],
			'CANDIDAT_SIT_MAT'=>$_POST['CANDIDAT_SIT_MAT'],
			'CANDIDAT_NBRE_ENF'=>$_POST['CANDIDAT_NBRE_ENF'],
			'CANDIDAT_ADR_PERM'=>$_POST['CANDIDAT_ADR_PERM'],
			'CANDIDAT_ADR_ACT'=>$_POST['CANDIDAT_ADR_ACT'],
			'CANDIDAT_INDICATIF'=>$_POST['CANDIDAT_INDICATIF'],
			'CANDIDAT_NUM_TEL'=>$_POST['CANDIDAT_NUM_TEL'],
			'CANDIDAT_NUM_GSM'=>$_POST['CANDIDAT_NUM_GSM'],
			'CANDIDAT_PERMIS'=>$_POST['CANDIDAT_PERMIS'],
			'CANDIDAT_DEMANDE_EMPLOI'=>$_POST['CANDIDAT_DEMANDE_EMPLOI'],
			'CANDIDAT_CV'=>$_POST['CANDIDAT_CV'],
			'CANDIDAT_CERTIFICAT_TRAVAIL'=>$_POST['CANDIDAT_CERTIFICAT_TRAVAIL'],
			'CANDIDAT_PHOTO'=>$_POST['CANDIDAT_PHOTO'],
			'CANDIDAT_ACTE_NAISS'=>$_POST['CANDIDAT_ACTE_NAISS'],
			'CANDIDAT_FICHE_FAMILLE'=>$_POST['CANDIDAT_FICHE_FAMILLE'],
			'CANDIDAT_CERTIF_NAT'=>$_POST['CANDIDAT_CERTIF_NAT'],
			'CANDIDAT_CERTIF_DOMICILE'=>$_POST['CANDIDAT_CERTIF_DOMICILE'],
			'CANDIDAT_CERTIF_MEDICAL'=>$_POST['CANDIDAT_CERTIF_MEDICAL'],
			'CANDIDAT_CASIER_JUDICIAIRE'=>$_POST['CANDIDAT_CASIER_JUDICIAIRE'],
			'CANDIDAT_IS_FAMILLE'=>$_POST['CANDIDAT_IS_FAMILLE'],
			'CANDIDAT_MOTIV_POSTE'=>$_POST['CANDIDAT_MOTIV_POSTE'],
			'FK_UTIL_ID'=>$_POST['FK_UTIL_ID']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_candidat($Tab_param,$Cnn))
		{
	
			$message="candidat enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_candidat').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="candidat non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_candidat').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Candidat_class();
			$Tab_param=array(
				'CANDIDAT_ID'=>$_POST['CANDIDAT_ID'],
				'CANDIDAT_TYPE'=>$_POST['CANDIDAT_TYPE'],
				'CANDIDAT_CIVILITE'=>$_POST['CANDIDAT_CIVILITE'],
				'CANDIDAT_NOM'=>$_POST['CANDIDAT_NOM'],
				'CANDIDAT_PRENOM'=>$_POST['CANDIDAT_PRENOM'],
				'CANDIDAT_MATRICULE'=>$_POST['CANDIDAT_MATRICULE'],
				'CANDIDAT_DATE_NAISSANCE'=>$_POST['CANDIDAT_DATE_NAISSANCE'],
				'CANDIDAT_LIEU_NAISSANCE'=>$_POST['CANDIDAT_LIEU_NAISSANCE'],
				'CANDIDAT_NATIONALITE'=>$_POST['CANDIDAT_NATIONALITE'],
				'CANDIDAT_SIT_MAT'=>$_POST['CANDIDAT_SIT_MAT'],
				'CANDIDAT_NBRE_ENF'=>$_POST['CANDIDAT_NBRE_ENF'],
				'CANDIDAT_ADR_PERM'=>$_POST['CANDIDAT_ADR_PERM'],
				'CANDIDAT_ADR_ACT'=>$_POST['CANDIDAT_ADR_ACT'],
				'CANDIDAT_INDICATIF'=>$_POST['CANDIDAT_INDICATIF'],
				'CANDIDAT_NUM_TEL'=>$_POST['CANDIDAT_NUM_TEL'],
				'CANDIDAT_NUM_GSM'=>$_POST['CANDIDAT_NUM_GSM'],
				'CANDIDAT_PERMIS'=>$_POST['CANDIDAT_PERMIS'],
				'CANDIDAT_DEMANDE_EMPLOI'=>$_POST['CANDIDAT_DEMANDE_EMPLOI'],
				'CANDIDAT_CV'=>$_POST['CANDIDAT_CV'],
				'CANDIDAT_CERTIFICAT_TRAVAIL'=>$_POST['CANDIDAT_CERTIFICAT_TRAVAIL'],
				'CANDIDAT_PHOTO'=>$_POST['CANDIDAT_PHOTO'],
				'CANDIDAT_ACTE_NAISS'=>$_POST['CANDIDAT_ACTE_NAISS'],
				'CANDIDAT_FICHE_FAMILLE'=>$_POST['CANDIDAT_FICHE_FAMILLE'],
				'CANDIDAT_CERTIF_NAT'=>$_POST['CANDIDAT_CERTIF_NAT'],
				'CANDIDAT_CERTIF_DOMICILE'=>$_POST['CANDIDAT_CERTIF_DOMICILE'],
				'CANDIDAT_CERTIF_MEDICAL'=>$_POST['CANDIDAT_CERTIF_MEDICAL'],
				'CANDIDAT_CASIER_JUDICIAIRE'=>$_POST['CANDIDAT_CASIER_JUDICIAIRE'],
				'CANDIDAT_IS_FAMILLE'=>$_POST['CANDIDAT_IS_FAMILLE'],
				'CANDIDAT_MOTIV_POSTE'=>$_POST['CANDIDAT_MOTIV_POSTE'],
				'FK_UTIL_ID'=>$_POST['FK_UTIL_ID']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_candidat($Tab_param,$Cnn))
			{
	
				$message="candidat modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_candidat').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="candidat non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_candidat').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Candidat_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_candidat($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_candidat').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!candidat non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_candidat').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Candidat_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>