<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Lettre_motivation_controler extends Lettre_motivation_class{

	//Controleur ajout
	function controler_ajout()
	{
		 $Objcl=new Lettre_motivation_class();
		 $obj_candidat=new Candidat_class();
		 $obj_qualite=new Qualites_class();
           
		
		 //------ recuperation de  id du candidat -----------------//
		 
		 $fk_util_id=$_POST['id_user'];
		 $fk_annonce_id=$_POST['FK_ANNONCE_ID'];
		 
		 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		
		 $Tab_param=array(
							'LETTRE_MOTIVATION'=>$_POST['LETTRE_MOTIVATION'],
							'FK_CANDIDAT_ID'=>$candidat_id,
							'FK_ANNONCE_ID'=>$fk_annonce_id
			              );
         
		$Tab_param_qualite=array(
							'QUAL_LIB'=>$_POST['QUAL_LIB'],
							'FK_CANDIDAT_ID'=>$candidat_id
							
			              );
         
		$Cnn=$Objcl->ma_connexion();
		
		//-------------------------------- enregistrement validation ------------------------------//
		
		 $obj_validation=new Validation_cadidature_class();
		 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
		 
		 $date_enreg=$Tab_date["date_enreg"];
		 
		 ($Objcl->La_date_est_fr($date_enreg)==true) ? $date_enreg=$Objcl->datefr2en($date_enreg): $date_enreg;
		 
		 
		 
		 $param_validation= array(
									 "etape"=>"9",
									 "date"=>$date_enreg,
									 "id_annonce"=>$fk_annonce_id,
									 "id_candidat"=>$candidat_id,
									 "libelle"=>"Lettre_motivation"
		                         );
								 
		 $recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
		 $recu1=$recu1=$recu1=$obj_qualite->ajouter_enreg_qualites($Tab_param_qualite,$Cnn);
		 
		//-----------------------  fin validation --------------------------------------------------// 
		
		
			 //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=9;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
			 $current_etape_page=$tab_redire[$current_etape];
			 
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
			if($Objcl->ajouter_enreg_lettre_motivation($Tab_param,$Cnn)==true && $recu==true && $recu1==true)
			{
		        $Cnn->commit();
				//$message="lettre_motivation enregistré avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige($current_path);
			}
			else
			{
				$Cnn->rollback();
			    $message="lettre_motivation non enregistré!";
			    $Objcl->message_box($message);
			    $Objcl->redirige(HOME.$Objcl->param_encode('form_lettre_motivation')."&annonce_id=".$fk_annonce_id);
			}
		}
		catch(Exception $e)
		{
			$Cnn->rollback();
			$message="lettre_motivation non enregistré!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_lettre_motivation')."&annonce_id=".$fk_annonce_id);
		}

	}
	
	
	
	function controler_ajout_after_post()
	{
		 $Objcl=new Lettre_motivation_class();
		 $obj_candidat=new Candidat_class();
		 
		 //------ recuperation de  id du candidat -----------------//
		 
		 $fk_util_id=$_POST['id_user'];
		 $fk_annonce_id=$_POST['FK_ANNONCE_ID'];
		 
		 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		
		 $Tab_param=array(
							'LETTRE_MOTIVATION'=>$_POST['LETTRE_MOTIVATION'],
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
									 "etape"=>"9",
									 "date"=>$date_enreg,
									 "id_annonce"=>$fk_annonce_id,
									 "id_candidat"=>$candidat_id,
									 "libelle"=>"Lettre_motivation"
		                         );
								 
		 $recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
		 
		//-----------------------  fin validation --------------------------------------------------// 
		
		
			 //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     
			 $current_etape_page="form_lettre_motivation1";
			 
			 $after_postul=@$_POST["after_postul"];
			 
			 if($after_postul=="OUI")
			 {
				$next_etape="form_lettre_motivation1";
				$current_etape_page="form_lettre_motivation1"; 
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
			if($Objcl->ajouter_enreg_lettre_motivation($Tab_param,$Cnn) && $recu==true)
			{
		        $Cnn->commit();
				//$message="lettre_motivation enregistré avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige($current_path);
			}
			else
			{
				$Cnn->rollback();
			    $message="lettre_motivation non enregistré!";
			    $Objcl->message_box($message);
			    $Objcl->redirige(HOME.$Objcl->param_encode('form_lettre_motivation1')."&annonce_id=".$fk_annonce_id);
			}
		}
		catch(Exception $e)
		{
			$Cnn->rollback();
			$message="lettre_motivation non enregistré!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_lettre_motivation1')."&annonce_id=".$fk_annonce_id);
		}

	}

	//Controleur modifier
	
	function controler_modifier()
	{
			$Objcl=new Lettre_motivation_class();
			$obj_qualite=new Qualites_class();
			
			
			$Tab_param=array(
				'LETTRE_MOTIVATION_ID'=>$_POST['LETTRE_MOTIVATION_ID'],
				'LETTRE_MOTIVATION'=>$_POST['LETTRE_MOTIVATION']
				);
				
		    $Tab_param_qualite=array(
						'QUAL_LIB'=>$_POST['QUAL_LIB'],
						'QUAL_ID'=>$_POST['QUAL_ID']
					  );	

			$Cnn=$Objcl->ma_connexion();
			
			 //********************** enregistrer et suivant ***************************//
			 
			$fk_annonce_id=$_POST['FK_ANNONCE_ID'];
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=9;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		     $current_etape_page="form_lettre_motivation";
			 
			 $after_postul=@$_POST["after_postul"];
			 
			 if($after_postul=="OUI")
			 {
				$next_etape="form_lettre_motivation1";
				$current_etape_page="form_lettre_motivation1"; 
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
			if($Objcl->modifier_enreg_lettre_motivation($Tab_param,$Cnn) && $obj_qualite->modifier_enreg_qualites($Tab_param_qualite,$Cnn))
			{
				$Cnn->commit();
				//$message="lettre_motivation modifié avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige($current_path);
			}
			else
			{   
			    $Cnn->rollback();
				$message="lettre_motivation non modifié!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_lettre_motivation')."&annonce_id=".$fk_annonce_id);
			}
       }
		catch(Exception $e)
		{
			$Cnn->rollback();
			$message="lettre_motivation non enregistré!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_lettre_motivation')."&annonce_id=".$fk_annonce_id);
		}
	   
	   
	   
	}
	
	//Controleur modifier
	
	function controler_modifier_after_post()
	{
			$Objcl=new Lettre_motivation_class();
			$obj_qualite=new Qualites_class();
			
			$Tab_param=array(
				'LETTRE_MOTIVATION_ID'=>$_POST['LETTRE_MOTIVATION_ID'],
				'LETTRE_MOTIVATION'=>$_POST['LETTRE_MOTIVATION']
				);
				
		   	$fk_annonce_id=$_POST['FK_ANNONCE_ID'];

			$Cnn=$Objcl->ma_connexion();
			
			 //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape_page="form_lettre_motivation";
			 
			 $after_postul=@$_POST["after_postul"];
			 
			 if($after_postul=="OUI")
			 {
				$next_etape="form_lettre_motivation1";
				$current_etape_page="form_lettre_motivation1"; 
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
			if($Objcl->modifier_enreg_lettre_motivation($Tab_param,$Cnn))
			{
				$Cnn->commit();
				$Objcl->redirige($current_path);
			}
			else
			{
				$Cnn->rollback();
				$message="lettre_motivation non modifié!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_lettre_motivation1')."&annonce_id=".$fk_annonce_id);
			}
       }
		catch(Exception $e)
		{
			$Cnn->rollback();
			$message="lettre_motivation non enregistré!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_lettre_motivation1')."&annonce_id=".$fk_annonce_id);
		}
	   
	   
	   
	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Lettre_motivation_class();
		
		$id=$Objcl->param_decode(trim($_GET[""]));
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
		//break;
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
	case 4:{$Obj->controler_ajout_after_post();break;}
	case 5:{$Obj->controler_modifier_after_post();break;}
	
	}

?>