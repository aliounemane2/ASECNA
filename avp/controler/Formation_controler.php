<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Formation_controler extends Formation_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Formation_class();
		$obj_candidat=new Candidat_class();
		
		$Cnn=$Objcl->ma_connexion();
		
		//*******************************************************************//
		
		$fk_util_id=$_POST['FK_UTIL_ID'];
		$fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		
		$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		$candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		 /******  traitement fichier uploder**********/
			
			$tmp_name=$_FILES['FORMATION_DIPLOME_FICHIER']['tmp_name']; 
            $name=$_FILES['FORMATION_DIPLOME_FICHIER']['name']; 
            
            $ext_st=pathinfo($name);
            $extension=$ext_st['extension'];
            
            $size=$_FILES['FORMATION_DIPLOME_FICHIER']['size']; 
            $type=$_FILES['FORMATION_DIPLOME_FICHIER']['type']; 
            $erreur=$_FILES['FORMATION_DIPLOME_FICHIER']['error'];
			
			//* creation chemin avec variable globales ****/
			
				$uploadpath=DIPLOME_DIR; 
				$path_filename=$uploadpath.$name;
				$path_source=$tmp_name;
			
		    //****  tableau des extensions exclus  ******//
			
			$extensions_exclus= array('doc','docx','xsl','xslx','xml','sbn','sbx');
			
			 $nom_sans_ext=substr($name,0,-4);
			 
			 $diplome="avatar.png";
			
			 if(!in_array($extension,$extensions_exclus))
			 {
				if(move_uploaded_file($path_source,$path_filename)==true)
				{
				   $diplome=$name;
				}
			 }
		
		$Tab_param=array(
			
			'FORMATION_AN_DEB'=>$_POST['FORMATION_AN_DEB'],
			'FORMATION_AN_FIN'=>$_POST['FORMATION_AN_FIN'],
			'ETABLISSEMENT_NOM'=>$_POST['ETABLISSEMENT_NOM'],
			'FORMATION_LIEU'=>$_POST['FORMATION_LIEU'],
			'FORMATION_DIPLOME'=>$_POST['FORMATION_DIPLOME'],
			'FORMATION_DOM_PRINC_ETUD'=>$_POST['FORMATION_DOM_PRINC_ETUD'],
			'FK_CANDIDAT_ID'=>$candidat_id,
			'FORMATION_CYCLE'=>$_POST['FORMATION_CYCLE'],
			'FORMATION_DIPLOME_FICHIER'=>$diplome);
			
		
             $obj_validation=new Validation_cadidature_class();
			 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
			 
			 $date_enreg=$Tab_date['date_enreg'];
			 
			($Objcl->La_date_est_fr($date_enreg)==true) ? $date_enreg=$Objcl->datefr2en($date_enreg): $date_enreg;
			
			$param_validation= array(
										 "etape"=>"2",
										 "date"=>$date_enreg,
										 "id_annonce"=>$fk_annonce_id,
										 "id_candidat"=>$candidat_id,
										 "libelle"=>"Formation"
									 );
									 
								
								 
		$recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
		
		
			 //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=2;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_formation&annonce_id='.$fk_annonce_id); 
			 }
	       //************************************************************//
      
		
		
		$Cnn->beginTransaction();
		
		try
		{
			if($Objcl->ajouter_enreg_formation($Tab_param,$Cnn) && $recu==true)
			{
				$Cnn->commit();
				//$message="formation enregistré avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige($current_path);
			}
			else
			{
				$Cnn->rollback();
				$message="formation non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_formation')."&annonce_id=".$fk_annonce_id);
			}
			
		}
		catch(Exception $e)
		{
			$Cnn->rollback();
			$message="formation non enregistré!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_formation')."&annonce_id=".$fk_annonce_id);
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
	        /******  traitement fichier uploder**********/
			
		  $fk_util_id=$_POST['FK_UTIL_ID'];
		  $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		
		
		$obj_candidat=new Candidat_class();
		$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		$candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		$Cnn=$obj_candidat->ma_connexion();
			
			 $old_fichier=$_POST["old_fichier"];
			 $name=$_FILES['FORMATION_DIPLOME_FICHIER']['name']; 
			 
			  $diplome="";
			 
			 if($old_fichier!=$name && $name!="")
			 {
			
					$tmp_name=$_FILES['FORMATION_DIPLOME_FICHIER']['tmp_name']; 
					$name=$_FILES['FORMATION_DIPLOME_FICHIER']['name']; 
					
					$ext_st=pathinfo($name);
					$extension=$ext_st['extension'];
					
					$size=$_FILES['FORMATION_DIPLOME_FICHIER']['size']; 
					$type=$_FILES['FORMATION_DIPLOME_FICHIER']['type']; 
					$erreur=$_FILES['FORMATION_DIPLOME_FICHIER']['error'];
					
					//* creation chemin avec variable globales ****/
					
						$uploadpath=DIPLOME_DIR; 
						$path_filename=$uploadpath.$name;
						$path_source=$tmp_name;
					
					//****  tableau des extensions exclus  ******//
					
					$extensions_exclus= array('doc','docx','xsl','xslx','xml','sbn','sbx');
					
					 $nom_sans_ext=substr($name,0,-4);
					 
					
					
					 if(!in_array($extension,$extensions_exclus))
					 {
						if(move_uploaded_file($path_source,$path_filename)==true)
						{
						   $diplome=$name;
						}
					 }
			    }
				else
				{
					$diplome=$old_fichier;
				}
	
			$Objcl=new Formation_class();
			$id_formation=$_POST['FORMATION_ID'];
			
			
			$Tab_param=array(
								'FORMATION_ID'=>$id_formation,
								'FORMATION_AN_DEB'=>$_POST['FORMATION_AN_DEB'],
								'FORMATION_AN_FIN'=>$_POST['FORMATION_AN_FIN'],
								'ETABLISSEMENT_NOM'=>$_POST['ETABLISSEMENT_NOM'],
								'FORMATION_LIEU'=>$_POST['FORMATION_LIEU'],
								'FORMATION_DIPLOME'=>$_POST['FORMATION_DIPLOME'],
								'FORMATION_DOM_PRINC_ETUD'=>$_POST['FORMATION_DOM_PRINC_ETUD'],
								'FK_CANDIDAT_ID'=>$candidat_id,
								'FORMATION_CYCLE'=>$_POST['FORMATION_CYCLE'],
								'FORMATION_DIPLOME_FICHIER'=>$diplome
							);
				
				
			 //********************** enregistrer et suivant ***************************//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=2;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_formation&annonce_id='.$fk_annonce_id); 
			 }
	       //************************************************************//
				
		$Cnn->beginTransaction();
		
		try
		{
			if($Objcl->modifier_enreg_formation($Tab_param,$Cnn))
			{
	            $Cnn->commit();
				//$message="formation modifié avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige($current_path);
	
			}
			else
			{
	            $Cnn->rollback();
				$message="formation non modifié!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_formation')."&annonce_id=".$fk_annonce_id."&id_formation=".$id_formation);
	
			}
		}
		catch(Exception $e )
		{
			 $Cnn->rollback();
			 $message="formation non modifié!";
			 $Objcl->message_box($message);
			 $Objcl->redirige(HOME.$Objcl->param_encode('form_formation')."&annonce_id=".$fk_annonce_id."&id_formation=".$id_formation);
		}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
		$Objcl=new Formation_class();

		$id=$Objcl->param_decode(trim($_GET["id_formation"]));
		$fk_annonce_id=@$_GET["annonce_id"];
		
		if($Objcl->supprimer_formation($id))
		{
			$Objcl->redirige(HOME.$Objcl->param_encode('form_formation')."&annonce_id=".$fk_annonce_id);
		}
		else
		{
			$message="ATTENTION!formation non supprimée!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_formation')."&annonce_id=".$fk_annonce_id);
		}
		break;
	}
	
	
	
	function controler_ajout_formation_apres_postul()
	{
		$Objcl=new Formation_class();
		$obj_candidat=new Candidat_class();
		
		$Cnn=$Objcl->ma_connexion();
		
		//*******************************************************************//
		
		$fk_util_id=$_POST['FK_UTIL_ID'];
		//$fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		
		$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		$candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		 /******  traitement fichier uploder**********/
			
			$tmp_name=$_FILES['FORMATION_DIPLOME_FICHIER']['tmp_name']; 
            $name=$_FILES['FORMATION_DIPLOME_FICHIER']['name']; 
            
            $ext_st=pathinfo($name);
            $extension=$ext_st['extension'];
            
            $size=$_FILES['FORMATION_DIPLOME_FICHIER']['size']; 
            $type=$_FILES['FORMATION_DIPLOME_FICHIER']['type']; 
            $erreur=$_FILES['FORMATION_DIPLOME_FICHIER']['error'];
			
			//* creation chemin avec variable globales ****/
			
				$uploadpath=DIPLOME_DIR; 
				$path_filename=$uploadpath.$name;
				$path_source=$tmp_name;
			
		    //****  tableau des extensions exclus  ******//
			
			$extensions_exclus= array('doc','docx','xsl','xslx','xml','sbn','sbx');
			
			 $nom_sans_ext=substr($name,0,-4);
			 
			 $diplome="avatar.png";
			
			 if(!in_array($extension,$extensions_exclus))
			 {
				if(move_uploaded_file($path_source,$path_filename)==true)
				{
				   $diplome=$name;
				}
			 }
		
		   $Tab_param=array(
			
			'FORMATION_AN_DEB'=>$_POST['FORMATION_AN_DEB'],
			'FORMATION_AN_FIN'=>$_POST['FORMATION_AN_FIN'],
			'ETABLISSEMENT_NOM'=>$_POST['ETABLISSEMENT_NOM'],
			'FORMATION_LIEU'=>$_POST['FORMATION_LIEU'],
			'FORMATION_DIPLOME'=>$_POST['FORMATION_DIPLOME'],
			'FORMATION_DOM_PRINC_ETUD'=>$_POST['FORMATION_DOM_PRINC_ETUD'],
			'FK_CANDIDAT_ID'=>$candidat_id,
			'FORMATION_CYCLE'=>$_POST['FORMATION_CYCLE'],
			'FORMATION_DIPLOME_FICHIER'=>$diplome);
			
		    $current_path=HOME.$Objcl->param_encode('form_formation'); 
			
	       //************************************************************//
      
		   $Cnn->beginTransaction();
		
			try
			{
				if($Objcl->ajouter_enreg_formation($Tab_param,$Cnn))
				{
					$Cnn->commit();
					$Objcl->redirige($current_path);
				}
				else
				{
					$Cnn->rollback();
					$message="formation non enregistré!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('form_formation')."&annonce_id=".$fk_annonce_id);
				}
				
			}
			catch(Exception $e)
			{
				$Cnn->rollback();
				$message="formation non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_formation')."&annonce_id=".$fk_annonce_id);
			}
	   }
	   
	   function controler_modif_formation_apres_postul()
	   {
		   
		 
			
		  $fk_util_id=$_POST['FK_UTIL_ID'];
		  //$fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		
		
		$obj_candidat=new Candidat_class();
		$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		$candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		$Cnn=$obj_candidat->ma_connexion();
			
			 $old_fichier=$_POST["old_fichier"];
			 $name=$_FILES['FORMATION_DIPLOME_FICHIER']['name']; 
			 
			  $diplome="";
			 
			 if($old_fichier!=$name && $name!="")
			 {
			
					$tmp_name=$_FILES['FORMATION_DIPLOME_FICHIER']['tmp_name']; 
					$name=$_FILES['FORMATION_DIPLOME_FICHIER']['name']; 
					
					$ext_st=pathinfo($name);
					$extension=$ext_st['extension'];
					
					$size=$_FILES['FORMATION_DIPLOME_FICHIER']['size']; 
					$type=$_FILES['FORMATION_DIPLOME_FICHIER']['type']; 
					$erreur=$_FILES['FORMATION_DIPLOME_FICHIER']['error'];
					
					//* creation chemin avec variable globales ****/
					
						$uploadpath=DIPLOME_DIR; 
						$path_filename=$uploadpath.$name;
						$path_source=$tmp_name;
					
					//****  tableau des extensions exclus  ******//
					
					$extensions_exclus= array('doc','docx','xsl','xslx','xml','sbn','sbx');
					
					 $nom_sans_ext=substr($name,0,-4);
					 
					
					
					 if(!in_array($extension,$extensions_exclus))
					 {
						if(move_uploaded_file($path_source,$path_filename)==true)
						{
						   $diplome=$name;
						}
					 }
			    }
				else
				{
					$diplome=$old_fichier;
				}
	
			$Objcl=new Formation_class();
			$id_formation=$_POST['FORMATION_ID'];
			
			
			$Tab_param=array(
								'FORMATION_ID'=>$id_formation,
								'FORMATION_AN_DEB'=>$_POST['FORMATION_AN_DEB'],
								'FORMATION_AN_FIN'=>$_POST['FORMATION_AN_FIN'],
								'ETABLISSEMENT_NOM'=>$_POST['ETABLISSEMENT_NOM'],
								'FORMATION_LIEU'=>$_POST['FORMATION_LIEU'],
								'FORMATION_DIPLOME'=>$_POST['FORMATION_DIPLOME'],
								'FORMATION_DOM_PRINC_ETUD'=>$_POST['FORMATION_DOM_PRINC_ETUD'],
								'FK_CANDIDAT_ID'=>$candidat_id,
								'FORMATION_CYCLE'=>$_POST['FORMATION_CYCLE'],
								'FORMATION_DIPLOME_FICHIER'=>$diplome
							);
				
		//********************** enregistrer et suivant ***************************//
			
				$current_path=HOME.$Objcl->param_encode('form_formation'); 
			 
	    //************************************************************//
				
		$Cnn->beginTransaction();
		
		try
		{
			if($Objcl->modifier_enreg_formation($Tab_param,$Cnn))
			{
	            $Cnn->commit();
				$Objcl->redirige($current_path);
			}
			else
			{
	            $Cnn->rollback();
				$message="formation non modifié!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_formation')."&annonce_id=".$fk_annonce_id."&id_formation=".$id_formation);
			}
		}
		catch(Exception $e )
		{
			 $Cnn->rollback();
			 $message="formation non modifié!";
			 $Objcl->message_box($message);
			 $Objcl->redirige(HOME.$Objcl->param_encode('form_formation')."&annonce_id=".$fk_annonce_id."&id_formation=".$id_formation);
		}
		   
		   
		   
		   
	   }

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Formation_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	case 4:{$Obj->controler_ajout_formation_apres_postul();break;}
	case 5:{$Obj->controler_modif_formation_apres_postul();break;}
	
	}

?>