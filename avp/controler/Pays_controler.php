<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Pays_controler extends Pays_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Pays_class();
		$Tab_param=array(
			'id'=>$_POST['id'],
			'code'=>$_POST['code'],
			'nom_pays'=>$_POST['nom_pays']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_pays($Tab_param,$Cnn))
		{
	
			$message="pays enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_pays').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="pays non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_pays').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Pays_class();
			$Tab_param=array(
				'id'=>$_POST['id'],
				'code'=>$_POST['code'],
				'nom_pays'=>$_POST['nom_pays']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_pays($Tab_param,$Cnn))
			{
	
				$message="pays modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_pays').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="pays non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_pays').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Pays_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_pays($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_pays').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!pays non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_pays').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Pays_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>