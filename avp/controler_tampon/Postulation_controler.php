<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Postulation_controler extends Postulation_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Postulation_class();
		$Tab_param=array(
			'postulation_id'=>$_POST['postulation_id'],
			'postulation_date'=>$_POST['postulation_date'],
			'FK_UTIL_ID'=>$_POST['FK_UTIL_ID'],
			'postulation_age_candidat'=>$_POST['postulation_age_candidat'],
			'FK_annonce_id'=>$_POST['FK_annonce_id']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_postulation($Tab_param,$Cnn))
		{
	
			$message="postulation enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_postulation').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="postulation non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_postulation').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Postulation_class();
			$Tab_param=array(
				'postulation_id'=>$_POST['postulation_id'],
				'postulation_date'=>$_POST['postulation_date'],
				'FK_UTIL_ID'=>$_POST['FK_UTIL_ID'],
				'postulation_age_candidat'=>$_POST['postulation_age_candidat'],
				'FK_annonce_id'=>$_POST['FK_annonce_id']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_postulation($Tab_param,$Cnn))
			{
	
				$message="postulation modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_postulation').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="postulation non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_postulation').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Postulation_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_postulation($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_postulation').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!postulation non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_postulation').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Postulation_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>