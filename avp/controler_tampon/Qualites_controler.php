<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Qualites_controler extends Qualites_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Qualites_class();
		$Tab_param=array(
			'QUAL_ID'=>$_POST['QUAL_ID'],
			'QUAL_LIB'=>$_POST['QUAL_LIB'],
			'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_qualites($Tab_param,$Cnn))
		{
	
			$message="qualites enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_qualites').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="qualites non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_qualites').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Qualites_class();
			$Tab_param=array(
				'QUAL_ID'=>$_POST['QUAL_ID'],
				'QUAL_LIB'=>$_POST['QUAL_LIB'],
				'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_qualites($Tab_param,$Cnn))
			{
	
				$message="qualites modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_qualites').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="qualites non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_qualites').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Qualites_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_qualites($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_qualites').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!qualites non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_qualites').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Qualites_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>