<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Experience_professionnelle_controler extends Experience_professionnelle_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		 $Objcl=new Experience_professionnelle_class();
		 $Cnn=$Objcl->ma_connexion();
		
		$fk_annonce_id=$_POST['FK_ANNONCE_ID'];
		
		 $obj_candidat=new Candidat_class();
		 $fk_util_id=$_POST['id_user'];
		 
		 //------ recuperation de  id du candidat -----------------//
		 
		$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		$candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		$ann_deb=$_POST["EXP_DEBUT_ANN"];  $mois_deb=$_POST["EXP_DEBUT_MOIS"];
		$ann_fin=$_POST["EXP_FIN_ANN"];    $mois_fin=$_POST["EXP_FIN_MOIS"];
		
		$deb_trav=$ann_deb."##".$mois_deb;
		$fin_trav=$ann_fin."##".$mois_fin;
		
		$Tab_param=array(
			
			'EXP_ENT_NOM'=>$_POST['EXP_ENT_NOM'],
			'EXP_SEC_ACT'=>$_POST['EXP_SEC_ACT'],
			'EXP_POSTE'=>$_POST['EXP_POSTE'],
			'EXP_DEBUT_TRAVAIL'=>$deb_trav,
			'EXP_FIN_TRAVAIL'=>$fin_trav,
			'EXP_SALAIRE'=>$_POST['EXP_SALAIRE'],
			'EXP_NBRE_PERS_SORD'=>$_POST['EXP_NBRE_PERS_SORD'],
			'EXP_TACHE'=>$_POST['EXP_TACHE'],
			'EXP_MOTIF_DEP'=>$_POST['EXP_MOTIF_DEP'],
			'FK_CANDIDAT_ID'=>$candidat_id);
			
		
			
		//---------------------------------------------------------//
		
			
			 $obj_validation=new Validation_cadidature_class();
			 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
			 
			 $date_enreg=$Tab_date['date_enreg'];
			 
			($Objcl->La_date_est_fr($date_enreg)==true) ? $date_enreg=$Objcl->datefr2en($date_enreg): $date_enreg;
			 //$fk_annonce_id=$_POST["FK_ANNONCE_ID"];
			
		//-----------------------------------------------------------------//
		
			$param_validation= array(
										 "etape"=>"5",
										 "date"=>$date_enreg,
										 "id_annonce"=>$fk_annonce_id,
										 "id_candidat"=>$candidat_id,
										 "libelle"=>"Experience professionnelle"
									 );
			$recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);	
			
			 //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=5;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_experiences&annonce_id='.$fk_annonce_id); 
			 }
	       //************************************************************//
			
		$Cnn->beginTransaction();
		
		try
		{
		
			if($Objcl->ajouter_enreg_experience_professionnelle($Tab_param,$Cnn))
			{
		        $Cnn->commit();
				//$message="experience_professionnelle enregistré avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige($current_path);
		
			}
			else
			{
		        $Cnn->rollback();
				$message="experience_professionnelle non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_experiences').'&annonce_id='.$fk_annonce_id);
		
			}
		}catch(Exception $e)
		{
			    $Cnn->rollback();
				$message="experience_professionnelle non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_experiences').'&annonce_id='.$fk_annonce_id);
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Experience_professionnelle_class();
			
			 $obj_candidat=new Candidat_class();
		     $fk_util_id=$_POST['id_user'];
		 
		 //------ recuperation de  id du candidat -----------------//
		 
		$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		$candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		$fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		
		
		$ann_deb=$_POST["EXP_DEBUT_ANN"];  $mois_deb=$_POST["EXP_DEBUT_MOIS"];
		$ann_fin=$_POST["EXP_FIN_ANN"];    $mois_fin=$_POST["EXP_FIN_MOIS"];
		
		$deb_trav=$ann_deb."##".$mois_deb;
		$fin_trav=$ann_fin."##".$mois_fin;
		
		
			$Tab_param=array(
				'EXP_ID'=>$_POST['EXP_ID'],
				'EXP_ENT_NOM'=>$_POST['EXP_ENT_NOM'],
				'EXP_SEC_ACT'=>$_POST['EXP_SEC_ACT'],
				'EXP_POSTE'=>$_POST['EXP_POSTE'],
				'EXP_DEBUT_TRAVAIL'=>$deb_trav,
				'EXP_FIN_TRAVAIL'=>$fin_trav,
				'EXP_SALAIRE'=>$_POST['EXP_SALAIRE'],
				'EXP_NBRE_PERS_SORD'=>$_POST['EXP_NBRE_PERS_SORD'],
				'EXP_TACHE'=>$_POST['EXP_TACHE'],
				'EXP_MOTIF_DEP'=>$_POST['EXP_MOTIF_DEP'],
				'FK_CANDIDAT_ID'=>$candidat_id);

			$Cnn=$Objcl->ma_connexion();
			
			 //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=5;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_experiences&annonce_id='.$fk_annonce_id); 
			 }
	       //************************************************************//
			
			$Cnn->beginTransaction();
			
			try
			{
					if($Objcl->modifier_enreg_experience_professionnelle($Tab_param,$Cnn))
					{
						$Cnn->commit();
						//$message="experience_professionnelle modifié avec succès!";
						//$Objcl->message_box($message);
						$Objcl->redirige($current_path);
					}
					else
					{
						$Cnn->rollback();
						$message="experience_professionnelle non modifié!";
						$Objcl->message_box($message);
						$Objcl->redirige(HOME.$Objcl->param_encode('form_experiences').'&annonce_id='.$fk_annonce_id);
					}
			}
			catch(Exception $e)
			{
				        $Cnn->rollback();
						$message="experience_professionnelle non modifié!";
						$Objcl->message_box($message);
						$Objcl->redirige(HOME.$Objcl->param_encode('form_experiences').'&annonce_id='.$fk_annonce_id);
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Experience_professionnelle_class();
	

		$id=$Objcl->param_decode(trim($_GET["id_exp"]));
		$fk_annonce_id=@$_GET["annonce_id"];
		
		if($Objcl->supprimer_experience_professionnelle($id))
		{
			$Objcl->redirige(HOME.$Objcl->param_encode('form_experiences').'&annonce_id='.$fk_annonce_id);
		}
		else
		{
			$message="ATTENTION!experience_professionnelle non supprimée!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_experiences').'&annonce_id='.$fk_annonce_id);
		}
		break;
	}
	
	function controler_ajout_apre_postul()
	{
	    $Objcl=new Experience_professionnelle_class();
		 $Cnn=$Objcl->ma_connexion();
		
		//$fk_annonce_id=$_POST['FK_ANNONCE_ID'];
		
		 $obj_candidat=new Candidat_class();
		 $fk_util_id=$_POST['id_user'];
		 
		 //------ recuperation de  id du candidat -----------------//
		 
		$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		$candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		$ann_deb=$_POST["EXP_DEBUT_ANN"];  $mois_deb=$_POST["EXP_DEBUT_MOIS"];
		$ann_fin=$_POST["EXP_FIN_ANN"];    $mois_fin=$_POST["EXP_FIN_MOIS"];
		
		$deb_trav=$ann_deb."##".$mois_deb;
		$fin_trav=$ann_fin."##".$mois_fin;
		
		$Tab_param=array(
			
			'EXP_ENT_NOM'=>$_POST['EXP_ENT_NOM'],
			'EXP_SEC_ACT'=>$_POST['EXP_SEC_ACT'],
			'EXP_POSTE'=>$_POST['EXP_POSTE'],
			'EXP_DEBUT_TRAVAIL'=>$deb_trav,
			'EXP_FIN_TRAVAIL'=>$fin_trav,
			'EXP_SALAIRE'=>$_POST['EXP_SALAIRE'],
			'EXP_NBRE_PERS_SORD'=>$_POST['EXP_NBRE_PERS_SORD'],
			'EXP_TACHE'=>$_POST['EXP_TACHE'],
			'EXP_MOTIF_DEP'=>$_POST['EXP_MOTIF_DEP'],
			'FK_CANDIDAT_ID'=>$candidat_id);
			
		//---------------------------------------------------------//
		   $current_path=HOME.$Objcl->param_encode('form_experiences'); 
			
	    //************************************************************//
			
		$Cnn->beginTransaction();
		
		try
		{
			if($Objcl->ajouter_enreg_experience_professionnelle($Tab_param,$Cnn))
			{
		        $Cnn->commit();
				$Objcl->redirige($current_path);
			}
			else
			{
		        $Cnn->rollback();
				$message="experience_professionnelle non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_experiences'));
		
			}
		}catch(Exception $e)
		{
			    $Cnn->rollback();
				$message="experience_professionnelle non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_experiences'));
		}
	
	}
	function controler_modif_apre_postul()
	{
	     $Objcl=new Experience_professionnelle_class();
			
		 $obj_candidat=new Candidat_class();
		 $fk_util_id=$_POST['id_user'];
		 
		 //------ recuperation de  id du candidat -----------------//
		 
		$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		$candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		$ann_deb=$_POST["EXP_DEBUT_ANN"];  $mois_deb=$_POST["EXP_DEBUT_MOIS"];
		$ann_fin=$_POST["EXP_FIN_ANN"];    $mois_fin=$_POST["EXP_FIN_MOIS"];
		
		$deb_trav=$ann_deb."##".$mois_deb;
		$fin_trav=$ann_fin."##".$mois_fin;
		
			$Tab_param=array(
				'EXP_ID'=>$_POST['EXP_ID'],
				'EXP_ENT_NOM'=>$_POST['EXP_ENT_NOM'],
				'EXP_SEC_ACT'=>$_POST['EXP_SEC_ACT'],
				'EXP_POSTE'=>$_POST['EXP_POSTE'],
				'EXP_DEBUT_TRAVAIL'=>$deb_trav,
				'EXP_FIN_TRAVAIL'=>$fin_trav,
				'EXP_SALAIRE'=>$_POST['EXP_SALAIRE'],
				'EXP_NBRE_PERS_SORD'=>$_POST['EXP_NBRE_PERS_SORD'],
				'EXP_TACHE'=>$_POST['EXP_TACHE'],
				'EXP_MOTIF_DEP'=>$_POST['EXP_MOTIF_DEP'],
				'FK_CANDIDAT_ID'=>$candidat_id);

			   $Cnn=$Objcl->ma_connexion();
			   $current_path=HOME.$Objcl->param_encode('form_experiences'); 
	       //************************************************************//
			$Cnn->beginTransaction();
			
			try
			{
					if($Objcl->modifier_enreg_experience_professionnelle($Tab_param,$Cnn))
					{
						$Cnn->commit();
						$Objcl->redirige($current_path);
					}
					else
					{
						$Cnn->rollback();
						$message="experience_professionnelle non modifié!";
						$Objcl->message_box($message);
						$Objcl->redirige(HOME.$Objcl->param_encode('form_experiences'));
					}
			}
			catch(Exception $e)
			{
				        $Cnn->rollback();
						$message="experience_professionnelle non modifié!";
						$Objcl->message_box($message);
						$Objcl->redirige(HOME.$Objcl->param_encode('form_experiences'));
			}	
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
	
	case 4:{$Obj->controler_ajout_apre_postul();break;}
	case 5:{$Obj->controler_modif_apre_postul();break;}
	
	}

?>