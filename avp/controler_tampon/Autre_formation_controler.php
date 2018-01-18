<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Autre_formation_controler extends Autre_formation_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Autre_formation_class();
		$Tab_param=array(
			'FORM_ID'=>$_POST['FORM_ID'],
			'FORMATION_AN_DEB'=>$_POST['FORMATION_AN_DEB'],
			'FORM_LIB'=>$_POST['FORM_LIB'],
			'FORM_NOM'=>$_POST['FORM_NOM'],
			'FORM_INTITULE'=>$_POST['FORM_INTITULE'],
			'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID'],
			'AUTRE_FORMATION_DIPLOME_FICHIER'=>$_POST['AUTRE_FORMATION_DIPLOME_FICHIER']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_autre_formation($Tab_param,$Cnn))
		{
	
			$message="autre_formation enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_autre_formation').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="autre_formation non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_autre_formation').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Autre_formation_class();
			$Tab_param=array(
				'FORM_ID'=>$_POST['FORM_ID'],
				'FORMATION_AN_DEB'=>$_POST['FORMATION_AN_DEB'],
				'FORM_LIB'=>$_POST['FORM_LIB'],
				'FORM_NOM'=>$_POST['FORM_NOM'],
				'FORM_INTITULE'=>$_POST['FORM_INTITULE'],
				'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID'],
				'AUTRE_FORMATION_DIPLOME_FICHIER'=>$_POST['AUTRE_FORMATION_DIPLOME_FICHIER']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_autre_formation($Tab_param,$Cnn))
			{
	
				$message="autre_formation modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_autre_formation').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="autre_formation non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_autre_formation').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Autre_formation_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_autre_formation($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_autre_formation').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!autre_formation non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_autre_formation').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Autre_formation_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>