<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Realisation_controler extends Realisation_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		 $Objcl=new Realisation_class();
		 $obj_candidat=new Candidat_class();
		 
		 //------ recuperation de  id du candidat -----------------//
		 
		 $fk_util_id=$_POST['id_user'];
		 $fk_annonce_id=$_POST['FK_ANNONCE_ID'];
		 
		 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		 
		//----------------------------------------------------------------//
		
			$Tab_param=array(
								'REAL_LIB'=>$_POST['REAL_LIB'],
								'FK_CANDIDAT_ID'=>$candidat_id
							 );
			$Cnn=$Objcl->ma_connexion();
			
			
			 //-------------------------------- enregistrement validation ------------------------------//
		
			 $obj_validation=new Validation_cadidature_class();
			 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
			 
			 $date_enreg=$Tab_date["date_enreg"];
			 ($Objcl->La_date_est_fr($date_enreg)==true) ? $date_enreg=$Objcl->datefr2en($date_enreg): $date_enreg;
			 
			 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
			 
			 $param_validation= array(
										 "etape"=>"3",
										 "date"=>$date_enreg,
										 "id_annonce"=>$fk_annonce_id,
										 "id_candidat"=>$candidat_id,
										 "libelle"=>"Travail fin etude"
									 );
			
		 //-----------------------------  fin validation ------------------------------------// 
		 
		    //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=3;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_travail_fin_etude&annonce_id='.$fk_annonce_id); 
			 }
	       //************************************************************//	
		   
		   
		
		    $Cnn->beginTransaction();
			
			$recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
			
			try
			{
				if($Objcl->ajouter_enreg_realisation($Tab_param,$Cnn)==true && $recu==true )
				{
					$Cnn->commit();
					//$message="realisation enregistré avec succès!";
					//$Objcl->message_box($message);
					$Objcl->redirige($current_path);
				}
				else
				{
					$Cnn->rollback();
					$message="realisation non enregistré!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('form_travail_fin_etude')."&annonce_id=".$fk_annonce_id);
				}
			}
			catch(Exception $e)
			{
				$Cnn->rollback();
				$message="realisation non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_travail_fin_etude')."&annonce_id=".$fk_annonce_id);
				
			}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Realisation_class();
			$obj_candidat=new Candidat_class();
			
			 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
			 $fk_util_id=$_POST['id_user'];
		    
		 
		 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
			
			$Tab_param=array(
				'REAL_ID'=>$_POST['REAL_ID'],
				'REAL_LIB'=>$_POST['REAL_LIB'],
				'FK_CANDIDAT_ID'=>$candidat_id);

			$Cnn=$Objcl->ma_connexion();
			
			  //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=3;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_travail_fin_etude&annonce_id='.$fk_annonce_id); 
			 }
	       //************************************************************//	
		
		    $Cnn->beginTransaction();
			
			try
			{
			
				if($Objcl->modifier_enreg_realisation($Tab_param,$Cnn))
				{
					$Cnn->commit();
					//$message="realisation modifié avec succès!";
					//$Objcl->message_box($message);
					$Objcl->redirige($current_path);
				}
				else
				{
					 $Cnn->roolback();
					 $message="realisation non modifié!";
					 $Objcl->message_box($message);
					 $Objcl->redirige(HOME.$Objcl->param_encode('form_travail_fin_etude')."&annonce_id=".$fk_annonce_id);
				}
			}
			catch(Exception $e)
			{
				$Cnn->rollback();
				$message="realisation non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_travail_fin_etude')."&annonce_id=".$fk_annonce_id);
				
			}	

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Realisation_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		
		if($Objcl->supprimer_realisation($id))
		{
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_realisation').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!realisation non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_realisation').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Realisation_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>