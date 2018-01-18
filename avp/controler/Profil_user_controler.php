<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Profil_user_controler extends Profil_user_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Profil_user_class();
		$Tab_param=array(
			'profil_param'=>$_POST['profil_param'],
			'profil_emploi_temp'=>$_POST['profil_emploi_temp'],
			'profil_etudiant'=>$_POST['profil_etudiant'],
			'profil_formation'=>$_POST['profil_formation'],
			'profil_inscription'=>$_POST['profil_inscription'],
			'num_ordre'=>$_POST['num_ordre'],
			'id_profil'=>$_POST['id_profil'],
			'id_utilisateur'=>$_POST['id_utilisateur']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_profil_user($Tab_param,$Cnn))
		{
	
			$message="profil_user enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_profil_user').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="profil_user non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_profil_user').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Profil_user_class();
			$Tab_param=array(
				'profil_param'=>$_POST['profil_param'],
				'profil_emploi_temp'=>$_POST['profil_emploi_temp'],
				'profil_etudiant'=>$_POST['profil_etudiant'],
				'profil_formation'=>$_POST['profil_formation'],
				'profil_inscription'=>$_POST['profil_inscription'],
				'num_ordre'=>$_POST['num_ordre'],
				'id_profil'=>$_POST['id_profil'],
				'id_utilisateur'=>$_POST['id_utilisateur']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_profil_user($Tab_param,$Cnn))
			{
	
				$message="profil_user modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_profil_user').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="profil_user non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_profil_user').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Profil_user_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_profil_user($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_profil_user').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!profil_user non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_profil_user').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Profil_user_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>