<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Connaissances_linguistiques_controler extends Connaissances_linguistiques_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		 $Objcl=new Connaissances_linguistiques_class();
			 
	     $obj_candidat=new Candidat_class();
		 $fk_util_id=$_POST['id_user'];
		 
		 //------ recuperation de  id du candidat -----------------//
		 
		$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		$candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];

        $obj_conn_ling=new Connaissances_linguistiques_class();
		
		$Tab_param=array(
						'LANGUE_NOM'=>$_POST['LANGUE_NOM'],
						'LANGUE_ORALE'=>$_POST['LANGUE_ORALE'],
						'LANGUE_ECRITE'=>$_POST['LANGUE_ECRITE'],
						'LANGUE_LECTURE'=>$_POST['LANGUE_LECTURE'],
						'FK_CANDIDAT_ID'=>$candidat_id,
						'Type'=>"NORMAL"
						);

		$Cnn=$obj_conn_ling->ma_connexion();
		
		//-------------------------------- enregistrement validation ------------------------------//
		
		 $obj_validation=new Validation_cadidature_class();
		 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
		 
		 $date_enreg=$Tab_date["date_enreg"];
		 
		 ($Objcl->La_date_est_fr($date_enreg)==true) ? $date_enreg=$Objcl->datefr2en($date_enreg): $date_enreg;
			
		 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		 
		 $param_validation= array(
									 "etape"=>"7",
									 "date"=>$date_enreg,
									 "id_annonce"=>$fk_annonce_id,
									 "id_candidat"=>$candidat_id,
									 "libelle"=>"Linguistique"
		                         );
								 
		 $recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
		 
		 
		  //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=7;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_linguistique&annonce_id='.$fk_annonce_id); 
			 }
	       //************************************************************//

		$Cnn->beginTransaction();
		
		try
		{
	
			if($Objcl->ajouter_enreg_connaissances_linguistiques($Tab_param,$Cnn) && $recu==true)
			{
				$Cnn->commit();
				//$message="connaissances_linguistiques enregistré avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige($current_path);
			}
			else
			{
				$Cnn->rollback();
				$message="connaissances_linguistiques non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_linguistique').'&annonce_id='.$fk_annonce_id);
		
			}
		}
		catch(Exception $e )
		{
		        $Cnn->rollback();
				$message="connaissances linguistiques non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_linguistique').'&annonce_id='.$fk_annonce_id);	
		}

	}
	
	function controler_autre_conn_ling()
	{
		
		 $Objcl=new Connaissances_linguistiques_class();
		 
	     $obj_candidat=new Candidat_class();
		 $fk_util_id=$_POST['id_user'];
		 
		 //------ recuperation de  id du candidat -----------------//
		 
		$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		$candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];

         $obj_conn_ling=new Connaissances_linguistiques_class();
		
		$Tab_param=array(
						'LANGUE_NOM'=>$_POST['AUTRE_LANGUE_NOM'],
						'LANGUE_ORALE'=>$_POST['AUTRE_LANGUE_ORALE'],
						'LANGUE_ECRITE'=>$_POST['AUTRE_LANGUE_ECRITE'],
						'LANGUE_LECTURE'=>$_POST['AUTRE_LANGUE_LECTURE'],
						'FK_CANDIDAT_ID'=>$candidat_id,
						'Type'=>"AUTRE"
						);

		$Cnn=$obj_conn_ling->ma_connexion();
		
		//-------------------------------- enregistrement validation ------------------------------//
		
		 $obj_validation=new Validation_cadidature_class();
		 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
		 
		 $date_enreg=$Tab_date["date_enreg"];
		 
		 ($Objcl->La_date_est_fr($date_enreg)==true) ? $date_enreg=$Objcl->datefr2en($date_enreg): $date_enreg;
			
		 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		 
		 
		  //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=7;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_linguistique&annonce_id='.$fk_annonce_id); 
			 }
	       //************************************************************//

		 $Cnn->beginTransaction();
		
		try
		{
	
			if($Objcl->ajouter_enreg_connaissances_linguistiques($Tab_param,$Cnn))
			{
				$Cnn->commit();
				//$message="connaissances_linguistiques enregistré avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige($current_path);
			}
			else
			{
				$Cnn->rollback();
				$message="connaissances_linguistiques non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_linguistique').'&annonce_id='.$fk_annonce_id);
		
			}
		}
		catch(Exception $e )
		{
		        $Cnn->rollback();
				$message="connaissances linguistiques non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_linguistique').'&annonce_id='.$fk_annonce_id);
		}
	}

	//Controleur modifier
	function controler_modifier()
	{
	
		 $Objcl=new Connaissances_linguistiques_class();
			
		
		 $Tab_param=array(
						'LANGUE_NOM'=>$_POST['LANGUE_NOM'],
						'LANGUE_ORALE'=>$_POST['LANGUE_ORALE'],
						'LANGUE_ECRITE'=>$_POST['LANGUE_ECRITE'],
						'LANGUE_LECTURE'=>$_POST['LANGUE_LECTURE'],
					    'LANGUE_ID'=>$_POST['LANGUE_ID']
						
						);	
				
			$fk_annonce_id=$_POST["FK_ANNONCE_ID"];	

			$Cnn=$Objcl->ma_connexion();
			
			
			 //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=7;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_linguistique&annonce_id='.$fk_annonce_id); 
			 }
	       //************************************************************//
			
			$Cnn->beginTransaction();
			
			try
			{
					if($Objcl->modifier_enreg_connaissances_linguistiques($Tab_param,$Cnn))
					{
			            $Cnn->commit();
						//$message="connaissances_linguistiques modifié avec succès!";
						//$Objcl->message_box($message);
						$Objcl->redirige($current_path);
					}
					else
					{
			            $Cnn->rollback();
						$message="connaissances_linguistiques non modifié!";
						$Objcl->message_box($message);
						$Objcl->redirige(HOME.$Objcl->param_encode('form_linguistique').'&annonce_id='.$fk_annonce_id);
					}
			}
			catch(Exception $e)
			{
					$Cnn->rollback();
					$message="connaissances_linguistiques non modifié!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('form_linguistique').'&annonce_id='.$fk_annonce_id);
			}

	}
	function controler_modifer_autre_lingu()
	{
		
	 $Objcl=new Connaissances_linguistiques_class();
			
		
		 $Tab_param=array(
						'LANGUE_NOM'=>$_POST['AUTRE_LANGUE_NOM'],
						'LANGUE_ORALE'=>$_POST['AUTRE_LANGUE_ORALE'],
						'LANGUE_ECRITE'=>$_POST['AUTRE_LANGUE_ECRITE'],
						'LANGUE_LECTURE'=>$_POST['AUTRE_LANGUE_LECTURE'],
					    'LANGUE_ID'=>$_POST['AUTRE_LANGUE_ID'],
						
						);	
				
			$fk_annonce_id=$_POST["FK_ANNONCE_ID"];	
	

			$Cnn=$Objcl->ma_connexion();
			
			 //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=7;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_linguistique&annonce_id='.$fk_annonce_id); 
			 }
	       //************************************************************//
			
			$Cnn->beginTransaction();
			
			try
			{
					if($Objcl->modifier_enreg_connaissances_linguistiques($Tab_param,$Cnn))
					{
			            $Cnn->commit();
						//$message="connaissances_linguistiques modifié avec succès!";
						//$Objcl->message_box($message);
						$Objcl->redirige($current_path);
					}
					else
					{
			            $Cnn->rollback();
						$message="connaissances_linguistiques non modifié!";
						$Objcl->message_box($message);
						$Objcl->redirige(HOME.$Objcl->param_encode('form_linguistique').'&annonce_id='.$fk_annonce_id);
					}
			}
			catch(Exception $e)
			{
					$Cnn->rollback();
					$message="connaissances_linguistiques non modifié!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('form_linguistique').'&annonce_id='.$fk_annonce_id);
			}	
		
	
	}
	
	

	//Controleur supprimer
	function controler_supprimer()
	{
	
			$Objcl=new Connaissances_linguistiques_class();
			$id=$Objcl->param_decode(trim($_GET["id_con_ling"]));
			
			$fk_annonce_id=$_GET["annonce_id"];
			
			if($Objcl->supprimer_connaissances_linguistiques($id))
			{
				$Objcl->redirige(HOME.$Objcl->param_encode('form_linguistique').'&annonce_id='.$fk_annonce_id);
			}
			else
			{
				$message="ATTENTION!connaissances_linguistiques non supprimée!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_linguistique').'&annonce_id='.$fk_annonce_id);
			}
			//break;
	}
	function controler_next()
	{
		     $Objcl=new Connaissances_informatiques_class();
			 $fk_annonce_id=$_GET["annonce_id"];
		     $current_etape=7;
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
			 $current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 $Objcl->redirige($current_path);
			// break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Connaissances_linguistiques_controler();
@$joker=$Obj->param_decode($joker);

    switch(trim($joker))
	{
		case 1:{$Obj->controler_ajout();break;}
		case 2:{$Obj->controler_modifier();break;}
		case 3:{$Obj->controler_supprimer();break;}
		case 4:{$Obj->controler_autre_conn_ling();break;}
		case 5:{$Obj->controler_modifer_autre_lingu();break;}
		case 6:{$Obj->controler_next();break;}
	}

?>