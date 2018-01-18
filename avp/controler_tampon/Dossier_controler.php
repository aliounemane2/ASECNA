<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Dossier_controler extends Dossier_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Dossier_class();
		$Tab_param=array(
			'DOSSIER_ID'=>$_POST['DOSSIER_ID'],
			'DOSSIER_NOM'=>$_POST['DOSSIER_NOM'],
			'DOSSIER_LIEN'=>$_POST['DOSSIER_LIEN'],
			'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_dossier($Tab_param,$Cnn))
		{
	
			$message="dossier enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_dossier').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="dossier non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_dossier').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Dossier_class();
			$Tab_param=array(
				'DOSSIER_ID'=>$_POST['DOSSIER_ID'],
				'DOSSIER_NOM'=>$_POST['DOSSIER_NOM'],
				'DOSSIER_LIEN'=>$_POST['DOSSIER_LIEN'],
				'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_dossier($Tab_param,$Cnn))
			{
	
				$message="dossier modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_dossier').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="dossier non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_dossier').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Dossier_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_dossier($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_dossier').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!dossier non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_dossier').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Dossier_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>