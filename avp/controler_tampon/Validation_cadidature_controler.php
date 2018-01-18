<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Validation_cadidature_controler extends Validation_cadidature_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Validation_cadidature_class();
		$Tab_param=array(
			'id'=>$_POST['id'],
			'etape'=>$_POST['etape'],
			'date_enreg'=>$_POST['date_enreg'],
			'id_annonce'=>$_POST['id_annonce'],
			'id_candidat'=>$_POST['id_candidat'],
			'libelle'=>$_POST['libelle']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_validation_cadidature($Tab_param,$Cnn))
		{
	
			$message="validation_cadidature enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_validation_cadidature').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="validation_cadidature non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_validation_cadidature').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Validation_cadidature_class();
			$Tab_param=array(
				'id'=>$_POST['id'],
				'etape'=>$_POST['etape'],
				'date_enreg'=>$_POST['date_enreg'],
				'id_annonce'=>$_POST['id_annonce'],
				'id_candidat'=>$_POST['id_candidat'],
				'libelle'=>$_POST['libelle']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_validation_cadidature($Tab_param,$Cnn))
			{
	
				$message="validation_cadidature modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_validation_cadidature').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="validation_cadidature non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_validation_cadidature').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Validation_cadidature_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_validation_cadidature($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_validation_cadidature').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!validation_cadidature non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_validation_cadidature').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Validation_cadidature_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>