<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Fonction_controler extends Fonction_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Fonction_class();
		$Tab_param=array(
			'FONCTION_ID'=>$_POST['FONCTION_ID'],
			'FONCTION_LIB'=>$_POST['FONCTION_LIB'],
			'FONCTION_DESC'=>$_POST['FONCTION_DESC']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_fonction($Tab_param,$Cnn))
		{
	
			$message="fonction enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_fonction').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="fonction non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_fonction').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Fonction_class();
			$Tab_param=array(
				'FONCTION_ID'=>$_POST['FONCTION_ID'],
				'FONCTION_LIB'=>$_POST['FONCTION_LIB'],
				'FONCTION_DESC'=>$_POST['FONCTION_DESC']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_fonction($Tab_param,$Cnn))
			{
	
				$message="fonction modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_fonction').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="fonction non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_fonction').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Fonction_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_fonction($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_fonction').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!fonction non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_fonction').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Fonction_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>