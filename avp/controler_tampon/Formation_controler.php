<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Formation_controler extends Formation_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Formation_class();
		$Tab_param=array(
			'FORMATION_ID'=>$_POST['FORMATION_ID'],
			'FORMATION_AN_DEB'=>$_POST['FORMATION_AN_DEB'],
			'FORMATION_AN_FIN'=>$_POST['FORMATION_AN_FIN'],
			'ETABLISSEMENT_NOM'=>$_POST['ETABLISSEMENT_NOM'],
			'FORMATION_LIEU'=>$_POST['FORMATION_LIEU'],
			'FORMATION_DIPLOME'=>$_POST['FORMATION_DIPLOME'],
			'FORMATION_DOM_PRINC_ETUD'=>$_POST['FORMATION_DOM_PRINC_ETUD'],
			'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID'],
			'FORMATION_CYCLE'=>$_POST['FORMATION_CYCLE'],
			'FORMATION_DIPLOME_FICHIER'=>$_POST['FORMATION_DIPLOME_FICHIER']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_formation($Tab_param,$Cnn))
		{
	
			$message="formation enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_formation').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="formation non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_formation').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Formation_class();
			$Tab_param=array(
				'FORMATION_ID'=>$_POST['FORMATION_ID'],
				'FORMATION_AN_DEB'=>$_POST['FORMATION_AN_DEB'],
				'FORMATION_AN_FIN'=>$_POST['FORMATION_AN_FIN'],
				'ETABLISSEMENT_NOM'=>$_POST['ETABLISSEMENT_NOM'],
				'FORMATION_LIEU'=>$_POST['FORMATION_LIEU'],
				'FORMATION_DIPLOME'=>$_POST['FORMATION_DIPLOME'],
				'FORMATION_DOM_PRINC_ETUD'=>$_POST['FORMATION_DOM_PRINC_ETUD'],
				'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID'],
				'FORMATION_CYCLE'=>$_POST['FORMATION_CYCLE'],
				'FORMATION_DIPLOME_FICHIER'=>$_POST['FORMATION_DIPLOME_FICHIER']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_formation($Tab_param,$Cnn))
			{
	
				$message="formation modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_formation').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="formation non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_formation').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Formation_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_formation($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_formation').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!formation non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_formation').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Formation_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>