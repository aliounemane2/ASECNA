<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Experience_professionnelle_controler extends Experience_professionnelle_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Experience_professionnelle_class();
		$Tab_param=array(
			'EXP_ID'=>$_POST['EXP_ID'],
			'EXP_ENT_NOM'=>$_POST['EXP_ENT_NOM'],
			'EXP_SEC_ACT'=>$_POST['EXP_SEC_ACT'],
			'EXP_POSTE'=>$_POST['EXP_POSTE'],
			'EXP_DEBUT_TRAVAIL'=>$_POST['EXP_DEBUT_TRAVAIL'],
			'EXP_FIN_TRAVAIL'=>$_POST['EXP_FIN_TRAVAIL'],
			'EXP_SALAIRE'=>$_POST['EXP_SALAIRE'],
			'EXP_NBRE_PERS_SORD'=>$_POST['EXP_NBRE_PERS_SORD'],
			'EXP_TACHE'=>$_POST['EXP_TACHE'],
			'EXP_MOTIF_DEP'=>$_POST['EXP_MOTIF_DEP'],
			'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_experience_professionnelle($Tab_param,$Cnn))
		{
	
			$message="experience_professionnelle enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_experience_professionnelle').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="experience_professionnelle non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_experience_professionnelle').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Experience_professionnelle_class();
			$Tab_param=array(
				'EXP_ID'=>$_POST['EXP_ID'],
				'EXP_ENT_NOM'=>$_POST['EXP_ENT_NOM'],
				'EXP_SEC_ACT'=>$_POST['EXP_SEC_ACT'],
				'EXP_POSTE'=>$_POST['EXP_POSTE'],
				'EXP_DEBUT_TRAVAIL'=>$_POST['EXP_DEBUT_TRAVAIL'],
				'EXP_FIN_TRAVAIL'=>$_POST['EXP_FIN_TRAVAIL'],
				'EXP_SALAIRE'=>$_POST['EXP_SALAIRE'],
				'EXP_NBRE_PERS_SORD'=>$_POST['EXP_NBRE_PERS_SORD'],
				'EXP_TACHE'=>$_POST['EXP_TACHE'],
				'EXP_MOTIF_DEP'=>$_POST['EXP_MOTIF_DEP'],
				'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_experience_professionnelle($Tab_param,$Cnn))
			{
	
				$message="experience_professionnelle modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_experience_professionnelle').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="experience_professionnelle non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_experience_professionnelle').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Experience_professionnelle_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_experience_professionnelle($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_experience_professionnelle').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!experience_professionnelle non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_experience_professionnelle').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Experience_professionnelle_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>