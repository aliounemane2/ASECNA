<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Profils_controler extends Profils_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Profils_class();
		$Tab_param=array(
			'PROFIL_ID'=>$_POST['PROFIL_ID'],
			'PROFIL_NOM'=>$_POST['PROFIL_NOM']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_profils($Tab_param,$Cnn))
		{
	
			$message="profils enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_profils').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="profils non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_profils').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Profils_class();
			$Tab_param=array(
				'PROFIL_ID'=>$_POST['PROFIL_ID'],
				'PROFIL_NOM'=>$_POST['PROFIL_NOM']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_profils($Tab_param,$Cnn))
			{
	
				$message="profils modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_profils').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="profils non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_profils').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Profils_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_profils($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_profils').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!profils non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_profils').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Profils_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>