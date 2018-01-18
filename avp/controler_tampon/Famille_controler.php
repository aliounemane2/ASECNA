<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Famille_controler extends Famille_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Famille_class();
		$Tab_param=array(
			'FAMILLE_ID'=>$_POST['FAMILLE_ID'],
			'FAMILLE_NOM'=>$_POST['FAMILLE_NOM'],
			'FAMILLE_PRENOM'=>$_POST['FAMILLE_PRENOM'],
			'FAMILLE_STRUCTURE'=>$_POST['FAMILLE_STRUCTURE'],
			'FAMILLE_DEGRE'=>$_POST['FAMILLE_DEGRE'],
			'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_famille($Tab_param,$Cnn))
		{
	
			$message="famille enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_famille').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="famille non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_famille').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Famille_class();
			$Tab_param=array(
				'FAMILLE_ID'=>$_POST['FAMILLE_ID'],
				'FAMILLE_NOM'=>$_POST['FAMILLE_NOM'],
				'FAMILLE_PRENOM'=>$_POST['FAMILLE_PRENOM'],
				'FAMILLE_STRUCTURE'=>$_POST['FAMILLE_STRUCTURE'],
				'FAMILLE_DEGRE'=>$_POST['FAMILLE_DEGRE'],
				'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_famille($Tab_param,$Cnn))
			{
	
				$message="famille modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_famille').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="famille non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_famille').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Famille_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_famille($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_famille').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!famille non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_famille').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Famille_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>