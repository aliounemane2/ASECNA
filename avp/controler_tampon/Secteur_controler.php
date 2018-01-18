<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Secteur_controler extends Secteur_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Secteur_class();
		$Tab_param=array(
			'id'=>$_POST['id'],
			'domaine'=>$_POST['domaine']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_secteur($Tab_param,$Cnn))
		{
	
			$message="secteur enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_secteur').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="secteur non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_secteur').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Secteur_class();
			$Tab_param=array(
				'id'=>$_POST['id'],
				'domaine'=>$_POST['domaine']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_secteur($Tab_param,$Cnn))
			{
	
				$message="secteur modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_secteur').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="secteur non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_secteur').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Secteur_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_secteur($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_secteur').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!secteur non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_secteur').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Secteur_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>