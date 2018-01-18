<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Competences_controler extends Competences_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Competences_class();
		$obj_candidat=new Candidat_class();
		//------ recuperation de  id du candidat -----------------//
		 
		 $fk_util_id=$_POST['id_user'];
		 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		 
		 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		
		 $Tab_param=array(
						   'COMP_LIB'=>$_POST['COMP_LIB'],
						   'FK_CANDIDAT_ID'=>$candidat_id,
						   'FK_ANNONCE_ID'=>$fk_annonce_id
			              );

		 $Cnn=$Objcl->ma_connexion();
		
		
		//-------------------------------- enregistrement validation ------------------------------//
		
		 $obj_validation=new Validation_cadidature_class();
		 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
		 
		 $date_enreg=$Tab_date["date_enreg"];
		 ($Objcl->La_date_est_fr($date_enreg)==true) ? $date_enreg=$Objcl->datefr2en($date_enreg): $date_enreg;
		 
		 
		 
		 $param_validation= array(
									 "etape"=>"8",
									 "date"=>$date_enreg,
									 "id_annonce"=>$fk_annonce_id,
									 "id_candidat"=>$candidat_id,
									 "libelle"=>"Competence"
		                         );
								 
		
		 
		//-----------------------  fin validation --------------------------------------------------// 
		
		 
		 //********************** enregistrer et suivant ***************************//
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=8;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
			 $current_etape_page="form_competence";
			 
			 $after_postul=@$_POST["after_postul"];
			 
			 if($after_postul=="OUI")
			 {
				$next_etape="form_lettre_motivation1";
				$current_etape_page="form_competence1"; 
			 }
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode($current_etape_page.'&annonce_id='.$fk_annonce_id); 
			 }
	    //************************************************************//
		 
		 $Cnn->beginTransaction();
		
		 $recu1=$Objcl->ajouter_enreg_competences($Tab_param,$Cnn);
		 $recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
		 
		 
		try
		{	 
			
			if($recu1==true && $recu==true)
			{
				$Cnn->commit();
				//$message="competences enregistré avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige($current_path);
			}
			else
			{
				$Cnn->rollback();
				$message="competences non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_competence')."&annonce_id=".$fk_annonce_id);
			}
		}
		catch(Exception $e)
		{
			    $Cnn->rollback();
				$message="competences non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_competence')."&annonce_id=".$fk_annonce_id);
		}

	}
	
	
	function controler_ajout_after_post()
	{
	
		$Objcl=new Competences_class();
		$obj_candidat=new Candidat_class();
		//------ recuperation de  id du candidat -----------------//
		 
		 $fk_util_id=$_POST['id_user'];
		 
		 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		 $Cnn=$Objcl->ma_connexion();
		
		//-------------------------------- enregistrement validation ------------------------------//
		
		 $obj_validation=new Validation_cadidature_class();
		 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
		 
		 $date_enreg=$Tab_date["date_enreg"];
		 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		 
		 $param_validation= array(
									 "etape"=>"8",
									 "date"=>$date_enreg,
									 "id_annonce"=>$fk_annonce_id,
									 "id_candidat"=>$candidat_id,
									 "libelle"=>"Competence"
		                         );
								 
		 $recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
		 
		//-----------------------  fin validation --------------------------------------------------// 
		
		 $Tab_param=array(
						   'COMP_LIB'=>$_POST['COMP_LIB'],
						   'FK_CANDIDAT_ID'=>$candidat_id,
						   'FK_ANNONCE_ID'=>$fk_annonce_id
			              );
		
		 $recu1=$Objcl->ajouter_enreg_competences($Tab_param,$Cnn);
		 
		 
		 //********************** enregistrer et suivant ***************************//
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $after_postul=@$_POST["after_postul"];
			 
			 if($after_postul=="OUI")
			 {
				$next_etape="form_lettre_motivation1";
				$current_etape_page="form_competence1"; 
			 }
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode($current_etape_page.'&annonce_id='.$fk_annonce_id); 
			 }
	    //************************************************************//
		 
		$Cnn->beginTransaction();
		 
		try
		{	 
			
			if($recu1==true && $recu==true)
			{
				$Cnn->commit();
				//$message="competences enregistré avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige($current_path);
			}
			else
			{
				$Cnn->rollback();
				$message="competences non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_competence1')."&annonce_id=".$fk_annonce_id);
			}
		}
		catch(Exception $e)
		{
			    $Cnn->rollback();
				$message="competences non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_competence1')."&annonce_id=".$fk_annonce_id);
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Competences_class();
			
			$obj_candidat=new Candidat_class();
		//------ recuperation de  id du candidat -----------------//
		 
		 $fk_util_id=$_POST['id_user'];
		 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		 
		 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		 
			$Tab_param=array(
				'COMP_ID'=>$_POST['COMP_ID'],
				'COMP_LIB'=>$_POST['COMP_LIB']);

			$Cnn=$Objcl->ma_connexion();
			
	     //********************** enregistrer et suivant ***************************//
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=8;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		     $current_etape_page="form_competence";
			 
			 $after_postul=@$_POST["after_postul"];
			 
			 if($after_postul=="OUI")
			 {
				$next_etape="form_lettre_motivation1";
				$current_etape_page="form_competence1"; 
			 }
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode($current_etape_page.'&annonce_id='.$fk_annonce_id); 
			 }
	    //************************************************************//
			
			$Cnn->beginTransaction();
			
			try
			{
			
				if($Objcl->modifier_enreg_competences($Tab_param,$Cnn)==true)
				{
					$Cnn->commit();
					//$message="competences modifié avec succès!";
					//$Objcl->message_box($message);
					$Objcl->redirige($current_path);
				}
				else
				{
					$Cnn->rollback();
					$message="competences non modifié!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('form_competence')."&annonce_id=".$fk_annonce_id);
				}
			}
			catch(Exception $e)
			{
				$Cnn->rollback();
				$message="competences non modifié!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_competence')."&annonce_id=".$fk_annonce_id);
			}

	}
	
	function controler_modifier_after_post()
	{
	
			$Objcl=new Competences_class();
			
			$obj_candidat=new Candidat_class();
		//------ recuperation de  id du candidat -----------------//
		 
		 $fk_util_id=$_POST['id_user'];
		 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		 
		 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		 
			$Tab_param=array(
				'COMP_ID'=>$_POST['COMP_ID'],
				'COMP_LIB'=>$_POST['COMP_LIB']);

			$Cnn=$Objcl->ma_connexion();
			
	     //********************** enregistrer et suivant ***************************//
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     
		     $current_etape_page="form_competence1";
			 
			 $after_postul=@$_POST["after_postul"];
			 
			 if($after_postul=="OUI")
			 {
				$next_etape="form_lettre_motivation1";
				$current_etape_page="form_competence1"; 
			 }
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode($current_etape_page.'&annonce_id='.$fk_annonce_id); 
			 }
	    //************************************************************//
			
			$Cnn->beginTransaction();
			
			try
			{
			
				if($Objcl->modifier_enreg_competences($Tab_param,$Cnn)==true)
				{
					$Cnn->commit();
					//$message="competences modifié avec succès!";
					//$Objcl->message_box($message);
					$Objcl->redirige($current_path);
				}
				else
				{
					$Cnn->rollback();
					$message="competences non modifié!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('form_competence1')."&annonce_id=".$fk_annonce_id);
				}
			}
			catch(Exception $e)
			{
				$Cnn->rollback();
				$message="competences non modifié!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_competence1')."&annonce_id=".$fk_annonce_id);
			}

	}


	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Competences_class();
	

		$id=$Objcl->param_decode(trim($_GET["id_comp"]));
		$fk_annonce_id=$_GET["annonce_id"];
		
		if($Objcl->supprimer_competences($id))
		{
			$Objcl->redirige(HOME.$Objcl->param_encode('form_competence')."&annonce_id=".$fk_annonce_id);
		}
		else
		{
			$message="ATTENTION!competences non supprimée!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_competence')."&annonce_id=".$fk_annonce_id);
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Competences_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	case 4:{$Obj->controler_ajout_after_post();break;}
	case 5:{$Obj->controler_modifier_after_post();break;}
	
	
	}

?>