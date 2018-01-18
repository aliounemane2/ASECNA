<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Candidat_saisi_note_controler extends Candidat_saisi_note_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Candidat_saisi_note_class();
		$Tab_param=array(
			'id'=>$_POST['id'],
			'adequate_form'=>$_POST['adequate_form'],
			'pert_experience'=>$_POST['pert_experience'],
			'compt_specific'=>$_POST['compt_specific'],
			'expe_con_asecna'=>$_POST['expe_con_asecna'],
			'con_infor'=>$_POST['con_infor'],
			'motiv_comp_redact'=>$_POST['motiv_comp_redact'],
			'sens_initiative'=>$_POST['sens_initiative'],
			'autre_critere'=>$_POST['autre_critere'],
			'apt_manag_esprit'=>$_POST['apt_manag_esprit'],
			'observation'=>$_POST['observation'],
			'FK_UTIL_ID'=>$_POST['FK_UTIL_ID'],
			'FK_annonce_id'=>$_POST['FK_annonce_id']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_candidat_saisi_note($Tab_param,$Cnn))
		{
	
			//$message="candidat_saisi_note enregistré avec succès!";
	
			//$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_candidat_saisi_note').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="candidat_saisi_note non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_candidat_saisi_note').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Candidat_saisi_note_class();
			$Tab_param=array(
				'id'=>$_POST['id'],
				'adequate_form'=>$_POST['adequate_form'],
				'pert_experience'=>$_POST['pert_experience'],
				'compt_specific'=>$_POST['compt_specific'],
				'expe_con_asecna'=>$_POST['expe_con_asecna'],
				'con_infor'=>$_POST['con_infor'],
				'motiv_comp_redact'=>$_POST['motiv_comp_redact'],
				'sens_initiative'=>$_POST['sens_initiative'],
				'autre_critere'=>$_POST['autre_critere'],
				'apt_manag_esprit'=>$_POST['apt_manag_esprit'],
				'observation'=>$_POST['observation'],
				'FK_UTIL_ID'=>$_POST['FK_UTIL_ID'],
				'FK_annonce_id'=>$_POST['FK_annonce_id']);
				

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_candidat_saisi_note($Tab_param,$Cnn))
			{
	
				//$message="candidat_saisi_note modifié avec succès!";
	
				//$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_candidat_saisi_note').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="candidat_saisi_note non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_candidat_saisi_note').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Candidat_saisi_note_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_candidat_saisi_note($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_candidat_saisi_note').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!candidat_saisi_note non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_candidat_saisi_note').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Candidat_saisi_note_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>