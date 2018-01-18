<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Autre_formation_controler extends Autre_formation_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		    $Objcl=new Autre_formation_class();
		
			$libelle=$_POST['FORM_LIB'];
		    $an_deb=$_POST['FORMATION_AN_DEB'];
		   
		    $nom=$_POST['FORM_NOM'];
		    $intitule=$_POST['FORM_INTITULE'];
			$fk_util_id=$_POST['FK_UTIL_ID'];
	   
			$tmp_name=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['tmp_name']; 
			$name=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['name']; 
			
			$ext_st=pathinfo($name);
			$extension=$ext_st['extension'];
			
			$size=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['size']; 
			$type=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['type']; 
			$erreur=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['error'];
		
			// creation chemin avec variable globales /
			
				$uploadpath=DIPLOME_DIR; 
				$path_filename=$uploadpath.$name;
				$path_source=$tmp_name;
			
		    //  tableau des extensions exclus  //
			
			 $extensions_exclus= array('xsl','xslx','xml','sbn','sbx');
			
			 $nom_sans_ext=substr($name,0,-4);
			 
			 $candidat_diplome="";
			 
			 if(!in_array($extension,$extensions_exclus))
			 {
				if(move_uploaded_file($path_source,$path_filename)==true)
				{
				   $candidat_diplome=$name;
				}
				
			 }
		//----------------------------------------------------------------//
		
         $Objcl=new Autre_formation_class();
		 $obj_candidat=new Candidat_class();
	
		 //------------------ recuperation de  id du candidat ----------------------//
		 
		 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		 //-------------------------------------------------------------//
		 
		 $Cnn=$Objcl->ma_connexion();
		 
		 
		 $obj_validation=new Validation_cadidature_class();
		 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
		 
		 $date_enreg=$Tab_date["date_enreg"];
		 
		 ($Objcl->La_date_est_fr($date_enreg)==true) ? $date_enreg=$Objcl->datefr2en($date_enreg): $date_enreg;
		 
		 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		 
		 $param_validation= array(
									 "etape"=>"4",
									 "date"=>$date_enreg,
									 "id_annonce"=>$fk_annonce_id,
									 "id_candidat"=>$candidat_id,
									 "libelle"=>"Autre Formation"
		                         );
								 
		 $recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
		 
		$Tab_param=array(
							'FORMATION_AN_DEB'=>$_POST['FORMATION_AN_DEB'],
							'FORM_LIB'=>$_POST['FORM_LIB'],
							'FORM_NOM'=>$_POST['FORM_NOM'],
							'FORM_INTITULE'=>$_POST['FORM_INTITULE'],
							'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID'],
							'AUTRE_FORMATION_DIPLOME_FICHIER'=>$candidat_diplome
				       );


         $cmd_suivant=$_POST["enregistrer_continue"];
		 $current_etape=4;
		   
		 $tab_redire=$Objcl->current_etape();
		 $next_etape=$tab_redire[$current_etape+1];
		 
		 if($cmd_suivant=="Enregistrer et Continuer")
		 {
		    $current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
		 }
		 else
		 {
			$current_path=HOME.$Objcl->param_encode('form_autres_form&annonce_id='.$fk_annonce_id); 
		 }
		  
          
		  $Cnn->beginTransaction();
		  
		  try
		  {
				if($Objcl->ajouter_enreg_autre_formation($Tab_param,$Cnn))
				{
			        $Cnn->commit();
					//$message="autre_formation enregistré avec succès!";
					//$Objcl->message_box($message);
					$Objcl->redirige($current_path);
				}
				else
				{   
				    $Cnn->rollback();
					$message="autre_formation non enregistré!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('form_autres_form').'&annonce_id='.$fk_annonce_id);
				}
		  }
		  catch(Exception $e)
		  {
				$Cnn->rollback();
				$message="Autre formation non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_autres_form').'&annonce_id='.$fk_annonce_id);
		  }

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Autre_formation_class();
			
			$old_fichier=$_POST["old_fichier"];
			$name=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['name'];
			$fk_annonce_id=$_POST["FK_ANNONCE_ID"]; 
			
			
			if($old_fichier!=$name && $name!="")
			{
			
				$tmp_name=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['tmp_name']; 
				$name=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['name']; 
				
				$ext_st=pathinfo($name);
				$extension=$ext_st['extension'];
				
				$size=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['size']; 
				$type=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['type']; 
				$erreur=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['error'];
			
				// creation chemin avec variable globales /
				
					$uploadpath=DIPLOME_DIR; 
					$path_filename=$uploadpath.$name;
					$path_source=$tmp_name;
				
				//  tableau des extensions exclus  //
				
				 $extensions_exclus= array('xsl','xslx','xml','sbn','sbx');
				
				 $nom_sans_ext=substr($name,0,-4);
				 
				 $fichier="";
				 
				 if(!in_array($extension,$extensions_exclus))
				 {
					if(move_uploaded_file($path_source,$path_filename)==true)
					{
					   $fichier=$name;
					}
					
				 }
			}
			else
			{
				$fichier=$old_fichier;
			}
			
			$Tab_param=array(
				'FORM_ID'=>$_POST['FORM_ID'],
				'FORMATION_AN_DEB'=>$_POST['FORMATION_AN_DEB'],
				'FORM_LIB'=>$_POST['FORM_LIB'],
				'FORM_NOM'=>$_POST['FORM_NOM'],
				'FORM_INTITULE'=>$_POST['FORM_INTITULE'],
				'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID'],
				'AUTRE_FORMATION_DIPLOME_FICHIER'=>$fichier);

			$Cnn=$Objcl->ma_connexion();
			
			
			//********************** enregistrer et suivant ***************************//
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=4;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_autres_form&annonce_id='.$fk_annonce_id); 
			 }
			 //*******************************************//
		
		  $Cnn->beginTransaction();
		  
		  try
		  {	
			if($Objcl->modifier_enreg_autre_formation($Tab_param,$Cnn))
			{
	            $Cnn->commit();
				//$message="autre_formation modifié avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige($current_path);
	
			}
			else
			{   
			    $Cnn->rollback();
				$message="autre_formation non modifié!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_autres_form').'&annonce_id='.$fk_annonce_id);
			}
		}
		catch(Exeption $e)
		{
			$Cnn->rollback();
			$message="autre_formation non modifié!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_autres_form').'&annonce_id='.$fk_annonce_id);
		}
         
	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Autre_formation_class();
	

		$id=$Objcl->param_decode(trim($_GET["id_formation"]));
		
		$fk_annonce_id=$_GET["annonce_id"];
		
		if($Objcl->supprimer_autre_formation($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('form_autres_form').'&annonce_id='.$fk_annonce_id);
	
		}
		else
		{
	
			$message="ATTENTION!autre_formation non supprimée!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_autres_form').'&annonce_id='.$fk_annonce_id);
		}
		//break;
	}
	
	function controler_ajout_aure_form()
	{
		
		   $Objcl=new Autre_formation_class();
		
			$libelle=$_POST['FORM_LIB'];
		    $an_deb=$_POST['FORMATION_AN_DEB'];
		   
		    $nom=$_POST['FORM_NOM'];
		    $intitule=$_POST['FORM_INTITULE'];
			$fk_util_id=$_POST['FK_UTIL_ID'];
	   
			$tmp_name=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['tmp_name']; 
			$name=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['name']; 
			
			$ext_st=pathinfo($name);
			$extension=$ext_st['extension'];
			
			$size=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['size']; 
			$type=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['type']; 
			$erreur=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['error'];
		
			// creation chemin avec variable globales /
			
				$uploadpath=DIPLOME_DIR; 
				$path_filename=$uploadpath.$name;
				$path_source=$tmp_name;
			
		    //  tableau des extensions exclus  //
			
			 $extensions_exclus= array('xsl','xslx','xml','sbn','sbx');
			
			 $nom_sans_ext=substr($name,0,-4);
			 
			 $candidat_diplome="";
			 
			 if(!in_array($extension,$extensions_exclus))
			 {
				if(move_uploaded_file($path_source,$path_filename)==true)
				{
				   $candidat_diplome=$name;
				}
				
			 }
		//----------------------------------------------------------------//
		
         $Objcl=new Autre_formation_class();
		 $obj_candidat=new Candidat_class();
	
		 //------------------ recuperation de  id du candidat ----------------------//
		 
		 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		 //-------------------------------------------------------------//
		 
		 $Cnn=$Objcl->ma_connexion();
		 $Tab_param=array(
							'FORMATION_AN_DEB'=>$_POST['FORMATION_AN_DEB'],
							'FORM_LIB'=>$_POST['FORM_LIB'],
							'FORM_NOM'=>$_POST['FORM_NOM'],
							'FORM_INTITULE'=>$_POST['FORM_INTITULE'],
							'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID'],
							'AUTRE_FORMATION_DIPLOME_FICHIER'=>$candidat_diplome
				       );
					   
		  $current_path=HOME.$Objcl->param_encode('form_autres_form'); 
		
		  $Cnn->beginTransaction();
		  try
		  {
				if($Objcl->ajouter_enreg_autre_formation($Tab_param,$Cnn))
				{
			        $Cnn->commit();
					$Objcl->redirige($current_path);
				}
				else
				{   
				    $Cnn->rollback();
					$message="autre_formation non enregistré!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('form_autres_form').'&annonce_id='.$fk_annonce_id);
				}
		  }
		  catch(Exception $e)
		  {
				$Cnn->rollback();
				$message="Autre formation non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_autres_form').'&annonce_id='.$fk_annonce_id);
		  }

		
	}
	
	function controler_modif_autre_form()
	{
		 
		 
		 
			$Objcl=new Autre_formation_class();
			
			$old_fichier=$_POST["old_fichier"];
			$name=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['name'];
			$fk_annonce_id=$_POST["FK_ANNONCE_ID"]; 
			
			
			if($old_fichier!=$name && $name!="")
			{
			
				$tmp_name=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['tmp_name']; 
				$name=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['name']; 
				
				$ext_st=pathinfo($name);
				$extension=$ext_st['extension'];
				
				$size=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['size']; 
				$type=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['type']; 
				$erreur=$_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['error'];
			
				// creation chemin avec variable globales /
				
					$uploadpath=DIPLOME_DIR; 
					$path_filename=$uploadpath.$name;
					$path_source=$tmp_name;
				
				//  tableau des extensions exclus  //
				
				 $extensions_exclus= array('xsl','xslx','xml','sbn','sbx');
				
				 $nom_sans_ext=substr($name,0,-4);
				 
				 $fichier="";
				 
				 if(!in_array($extension,$extensions_exclus))
				 {
					if(move_uploaded_file($path_source,$path_filename)==true)
					{
					   $fichier=$name;
					}
					
				 }
			}
			else
			{
				$fichier=$old_fichier;
			}
			
			$Tab_param=array(
				'FORM_ID'=>$_POST['FORM_ID'],
				'FORMATION_AN_DEB'=>$_POST['FORMATION_AN_DEB'],
				'FORM_LIB'=>$_POST['FORM_LIB'],
				'FORM_NOM'=>$_POST['FORM_NOM'],
				'FORM_INTITULE'=>$_POST['FORM_INTITULE'],
				'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID'],
				'AUTRE_FORMATION_DIPLOME_FICHIER'=>$fichier);

			 $Cnn=$Objcl->ma_connexion();
			 $current_path=HOME.$Objcl->param_encode('form_autres_form&annonce_id='.$fk_annonce_id); 
			 
			 //*******************************************//
		
		  $Cnn->beginTransaction();
		  
		  try
		  {	
			if($Objcl->modifier_enreg_autre_formation($Tab_param,$Cnn))
			{
	            $Cnn->commit();
				$Objcl->redirige($current_path);
			}
			else
			{   
			    $Cnn->rollback();
				$message="autre_formation non modifié!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_autres_form').'&annonce_id='.$fk_annonce_id);
			}
		}
		catch(Exeption $e)
		{
			$Cnn->rollback();
			$message="autre_formation non modifié!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_autres_form').'&annonce_id='.$fk_annonce_id);
		}
         
		 
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Autre_formation_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	case 4:{$Obj->controler_ajout_aure_form();break;}
	case 5:{$Obj->controler_modif_autre_form();break;}
	
	}

?>