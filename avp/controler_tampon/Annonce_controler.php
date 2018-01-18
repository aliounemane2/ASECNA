<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Annonce_controler extends Annonce_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Annonce_class();
		$Tab_param=array(
			'ANNONCE_ID'=>$_POST['ANNONCE_ID'],
			'ANNONCE_NUM'=>$_POST['ANNONCE_NUM'],
			'ANNONCE_TITRE'=>$_POST['ANNONCE_TITRE'],
			'ANNONCE_DESCRIPTION'=>$_POST['ANNONCE_DESCRIPTION'],
			'ANNONCE_LIEN'=>$_POST['ANNONCE_LIEN'],
			'ANNONCE_DATE_DEB'=>$_POST['ANNONCE_DATE_DEB'],
			'ANNONCE_DATE_FIN'=>$_POST['ANNONCE_DATE_FIN'],
			'ANNONCE_DATE_CREATION'=>$_POST['ANNONCE_DATE_CREATION'],
			'ANNONCE_AGE'=>$_POST['ANNONCE_AGE'],
			'ANNONCE_DELAI_AGE'=>$_POST['ANNONCE_DELAI_AGE'],
			'SECTEUR'=>$_POST['SECTEUR'],
			'ETAT'=>$_POST['ETAT']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_annonce($Tab_param,$Cnn))
		{
	
			$message="annonce enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_annonce').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="annonce non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_annonce').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Annonce_class();
			$Tab_param=array(
				'ANNONCE_ID'=>$_POST['ANNONCE_ID'],
				'ANNONCE_NUM'=>$_POST['ANNONCE_NUM'],
				'ANNONCE_TITRE'=>$_POST['ANNONCE_TITRE'],
				'ANNONCE_DESCRIPTION'=>$_POST['ANNONCE_DESCRIPTION'],
				'ANNONCE_LIEN'=>$_POST['ANNONCE_LIEN'],
				'ANNONCE_DATE_DEB'=>$_POST['ANNONCE_DATE_DEB'],
				'ANNONCE_DATE_FIN'=>$_POST['ANNONCE_DATE_FIN'],
				'ANNONCE_DATE_CREATION'=>$_POST['ANNONCE_DATE_CREATION'],
				'ANNONCE_AGE'=>$_POST['ANNONCE_AGE'],
				'ANNONCE_DELAI_AGE'=>$_POST['ANNONCE_DELAI_AGE'],
				'SECTEUR'=>$_POST['SECTEUR'],
				'ETAT'=>$_POST['ETAT']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_annonce($Tab_param,$Cnn))
			{
	
				$message="annonce modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_annonce').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="annonce non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_annonce').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Annonce_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_annonce($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_annonce').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!annonce non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_annonce').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Annonce_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>