<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Utilisateurs_controler extends Utilisateurs_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Utilisateurs_class();
		$Tab_param=array(
			'UTIL_ID'=>$_POST['UTIL_ID'],
			'UTIL_LOGIN'=>$_POST['UTIL_LOGIN'],
			'UTIL_MDP'=>$_POST['UTIL_MDP'],
			'UTIL_EMAIL'=>$_POST['UTIL_EMAIL'],
			'UTIL_ROLE'=>$_POST['UTIL_ROLE'],
			'active'=>$_POST['active'],
			'token'=>$_POST['token']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_utilisateurs($Tab_param,$Cnn))
		{
	
			$message="utilisateurs enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_utilisateurs').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="utilisateurs non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_utilisateurs').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Utilisateurs_class();
			$Tab_param=array(
				'UTIL_ID'=>$_POST['UTIL_ID'],
				'UTIL_LOGIN'=>$_POST['UTIL_LOGIN'],
				'UTIL_MDP'=>$_POST['UTIL_MDP'],
				'UTIL_EMAIL'=>$_POST['UTIL_EMAIL'],
				'UTIL_ROLE'=>$_POST['UTIL_ROLE'],
				'active'=>$_POST['active'],
				'token'=>$_POST['token']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_utilisateurs($Tab_param,$Cnn))
			{
	
				$message="utilisateurs modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_utilisateurs').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="utilisateurs non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_utilisateurs').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Utilisateurs_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_utilisateurs($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_utilisateurs').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!utilisateurs non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_utilisateurs').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Utilisateurs_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>