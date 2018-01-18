<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Realisation_controler extends Realisation_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Realisation_class();
		$Tab_param=array(
			'REAL_ID'=>$_POST['REAL_ID'],
			'REAL_LIB'=>$_POST['REAL_LIB'],
			'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_realisation($Tab_param,$Cnn))
		{
	
			$message="realisation enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_realisation').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="realisation non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_realisation').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Realisation_class();
			$Tab_param=array(
				'REAL_ID'=>$_POST['REAL_ID'],
				'REAL_LIB'=>$_POST['REAL_LIB'],
				'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_realisation($Tab_param,$Cnn))
			{
	
				$message="realisation modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_realisation').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="realisation non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_realisation').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Realisation_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_realisation($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_realisation').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!realisation non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_realisation').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Realisation_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>