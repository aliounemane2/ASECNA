<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Departement_controler extends Departement_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Departement_class();
		$Tab_param=array(
			'id'=>$_POST['id'],
			'libelle'=>$_POST['libelle']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_departement($Tab_param,$Cnn))
		{
	
			$message="departement enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_departement').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="departement non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_departement').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Departement_class();
			$Tab_param=array(
				'id'=>$_POST['id'],
				'libelle'=>$_POST['libelle']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_departement($Tab_param,$Cnn))
			{
	
				$message="departement modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_departement').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="departement non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_departement').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Departement_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_departement($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_departement').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!departement non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_departement').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Departement_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>