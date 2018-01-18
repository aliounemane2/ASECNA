<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Reference_controler extends Reference_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		 $Objcl=new Reference_class();
		 $obj_candidat=new Candidat_class();
		 $Cnn=$Objcl->ma_connexion();
		
		 $fk_util_id=$_POST['id_user'];
		 $fk_annonce_id=$_POST['FK_ANNONCE_ID'];
		 
		 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		$Tab_param=array(
						'REF_ID'=>$_POST['REF_ID'],
						'REF_NOM_ENT'=>$_POST['REF_NOM_ENT'],
						'REF_PERS_CONT'=>$_POST['REF_PERS_CONT'],
						'REF_POST_OCC'=>$_POST['REF_POST_OCC'],
						'REF_TEL'=>$_POST['REF_TEL'],
						'REF_EMAIL'=>$_POST['REF_EMAIL'],
						'FK_CANDIDAT_ID'=>$candidat_id
						);
			
			
			
			//-------------------------------- enregistrement validation ------------------------------//
		
		 $obj_validation=new Validation_cadidature_class();
		 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
		 
		 $date_enreg=$Tab_date["date_enreg"];
		 ($Objcl->La_date_est_fr($date_enreg)==true) ? $date_enreg=$Objcl->datefr2en($date_enreg): $date_enreg;
		 
		 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		 
		 $param_validation= array(
									 "etape"=>"10",
									 "date"=>$date_enreg,
									 "id_annonce"=>$fk_annonce_id,
									 "id_candidat"=>$candidat_id,
									 "libelle"=>"References"
		                         );
								 
		$recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
		
		
		 //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=10;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_reference&annonce_id='.$fk_annonce_id); 
			 }
	       //************************************************************//
		
		$Cnn->beginTransaction();
		
		try
		{	
		
			if($Objcl->ajouter_enreg_reference($Tab_param,$Cnn))
			{
				$Cnn->commit();
				//$message="reference enregistré avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige($current_path);
			}
			else
			{
				$Cnn->rollback();
				//$message="reference non enregistré!";
				//$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_reference')."&annonce_id=".$fk_annonce_id);
			}
		}
		catch(Exception $e)
		{
			    $Cnn->rollback();
				$message="reference non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_reference')."&annonce_id=".$fk_annonce_id);
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			 $Objcl=new Reference_class();
			 $fk_annonce_id=$_POST['FK_ANNONCE_ID'];
			 
			 $obj_candidat=new Candidat_class();
		
			 $fk_util_id=$_POST['id_user'];
			 $fk_annonce_id=$_POST['FK_ANNONCE_ID'];
			 
			 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
			 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
			
			$Tab_param=array(
								'REF_ID'=>$_POST['REF_ID'],
								'REF_NOM_ENT'=>$_POST['REF_NOM_ENT'],
								'REF_PERS_CONT'=>$_POST['REF_PERS_CONT'],
								'REF_POST_OCC'=>$_POST['REF_POST_OCC'],
								'REF_TEL'=>$_POST['REF_TEL'],
								'REF_EMAIL'=>$_POST['REF_EMAIL']
							);
				
				print_r($Tab_param);

			$Cnn=$Objcl->ma_connexion();
			
			
		 //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=10;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_reference&annonce_id='.$fk_annonce_id); 
			 }
	       //************************************************************//
		   
		$Cnn->beginTransaction();
		
		try
		{	
			if($Objcl->modifier_enreg_reference($Tab_param,$Cnn))
			{
				$Cnn->commit();
				$message="reference modifié avec succès!";
				$Objcl->message_box($message);
				$Objcl->redirige($current_path);
			}
			else
			{
				$Cnn->rollback();
				//$message="reference non modifié!";
				//$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_reference')."&annonce_id=".$fk_annonce_id);
			}
        }
		catch(Exception $e)
		{
			    $Cnn->rollback();
				$message="reference non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_reference')."&annonce_id=".$fk_annonce_id);
		}
		
	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Reference_class();
		$id=$Objcl->param_decode(trim($_GET["id_ref"]));
		
		$fk_annonce_id=$_GET["annonce_id"];
		
		if($Objcl->supprimer_reference($id))
		{
			$Objcl->redirige(HOME.$Objcl->param_encode('form_reference').'&annonce_id='.$fk_annonce_id);
		}
		else
		{
			$message="ATTENTION!reference non supprimée!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_reference').'&annonce_id='.$fk_annonce_id);
		}
		break;
	}
	
	function controler_ajout_apre_postule()
	{
		
		 $Objcl=new Reference_class();
		 $obj_candidat=new Candidat_class();
		 $Cnn=$Objcl->ma_connexion();
		
		 $fk_util_id=$_POST['id_user'];
		
		 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		$Tab_param=array(
						'REF_ID'=>$_POST['REF_ID'],
						'REF_NOM_ENT'=>$_POST['REF_NOM_ENT'],
						'REF_PERS_CONT'=>$_POST['REF_PERS_CONT'],
						'REF_POST_OCC'=>$_POST['REF_POST_OCC'],
						'REF_TEL'=>$_POST['REF_TEL'],
						'REF_EMAIL'=>$_POST['REF_EMAIL'],
						'FK_CANDIDAT_ID'=>$candidat_id
						);
			
		//-------------------------------- enregistrement validation ------------------------------//
	
			$current_path=HOME.$Objcl->param_encode('form_reference'); 
			 
	    //************************************************************//
		
		$Cnn->beginTransaction();
		
		try
		{	
		
			if($Objcl->ajouter_enreg_reference($Tab_param,$Cnn))
			{
				$Cnn->commit();
				$Objcl->redirige($current_path);
			}
			else
			{
				$Cnn->rollback();
				$Objcl->redirige(HOME.$Objcl->param_encode('form_reference'));
			}
		}
		catch(Exception $e)
		{
			    $Cnn->rollback();
				$message="reference non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_reference'));
		}

		
		
	}
	function controler_modif_apre_postule()
	{
		
		     $Objcl=new Reference_class();
			 $obj_candidat=new Candidat_class();
			 $fk_util_id=$_POST['id_user'];
			 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
			 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
			
			$Tab_param=array(
								'REF_ID'=>$_POST['REF_ID'],
								'REF_NOM_ENT'=>$_POST['REF_NOM_ENT'],
								'REF_PERS_CONT'=>$_POST['REF_PERS_CONT'],
								'REF_POST_OCC'=>$_POST['REF_POST_OCC'],
								'REF_TEL'=>$_POST['REF_TEL'],
								'REF_EMAIL'=>$_POST['REF_EMAIL']
							);
			
			$Cnn=$Objcl->ma_connexion();
			$current_path=HOME.$Objcl->param_encode('form_reference'); 
			
	       //************************************************************//
		   
		    $Cnn->beginTransaction();
		
		try
		{	
			if($Objcl->modifier_enreg_reference($Tab_param,$Cnn))
			{
				$Cnn->commit();
				$message="reference modifié avec succès!";
				$Objcl->message_box($message);
				$Objcl->redirige($current_path);
			}
			else
			{
				$Cnn->rollback();
				
				$Objcl->redirige(HOME.$Objcl->param_encode('form_reference'));
			}
        }
		catch(Exception $e)
		{
			    $Cnn->rollback();
				$message="reference non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_reference'));
		}
		
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
	
	case 4:{$Obj->controler_ajout_apre_postule();break;}
	case 5:{$Obj->controler_modif_apre_postule();break;}
	
	}

?>