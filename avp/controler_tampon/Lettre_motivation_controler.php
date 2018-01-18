<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Lettre_motivation_controler extends Lettre_motivation_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Lettre_motivation_class();
		$Tab_param=array(
			'LETTRE_MOTIVATION_ID'=>$_POST['LETTRE_MOTIVATION_ID'],
			'LETTRE_MOTIVATION'=>$_POST['LETTRE_MOTIVATION'],
			'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID'],
			'FK_ANNONCE_ID'=>$_POST['FK_ANNONCE_ID']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_lettre_motivation($Tab_param,$Cnn))
		{
	
			$message="lettre_motivation enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_lettre_motivation').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="lettre_motivation non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_lettre_motivation').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Lettre_motivation_class();
			$Tab_param=array(
				'LETTRE_MOTIVATION_ID'=>$_POST['LETTRE_MOTIVATION_ID'],
				'LETTRE_MOTIVATION'=>$_POST['LETTRE_MOTIVATION'],
				'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID'],
				'FK_ANNONCE_ID'=>$_POST['FK_ANNONCE_ID']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_lettre_motivation($Tab_param,$Cnn))
			{
	
				$message="lettre_motivation modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_lettre_motivation').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="lettre_motivation non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_lettre_motivation').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Lettre_motivation_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_lettre_motivation($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_lettre_motivation').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!lettre_motivation non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_lettre_motivation').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Lettre_motivation_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>