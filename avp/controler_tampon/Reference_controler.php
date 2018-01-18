<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Reference_controler extends Reference_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Reference_class();
		$Tab_param=array(
			'REF_ID'=>$_POST['REF_ID'],
			'REF_NOM_ENT'=>$_POST['REF_NOM_ENT'],
			'REF_PERS_CONT'=>$_POST['REF_PERS_CONT'],
			'REF_POST_OCC'=>$_POST['REF_POST_OCC'],
			'REF_TEL'=>$_POST['REF_TEL'],
			'REF_EMAIL'=>$_POST['REF_EMAIL'],
			'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_reference($Tab_param,$Cnn))
		{
	
			$message="reference enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_reference').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="reference non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_reference').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Reference_class();
			$Tab_param=array(
				'REF_ID'=>$_POST['REF_ID'],
				'REF_NOM_ENT'=>$_POST['REF_NOM_ENT'],
				'REF_PERS_CONT'=>$_POST['REF_PERS_CONT'],
				'REF_POST_OCC'=>$_POST['REF_POST_OCC'],
				'REF_TEL'=>$_POST['REF_TEL'],
				'REF_EMAIL'=>$_POST['REF_EMAIL'],
				'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_reference($Tab_param,$Cnn))
			{
	
				$message="reference modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_reference').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="reference non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_reference').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Reference_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_reference($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_reference').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!reference non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_reference').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Reference_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>