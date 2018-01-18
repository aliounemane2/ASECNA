

<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);


Class Candidat_controler extends Candidat_class{

   
	//Controleur ajout
	function controler_ajout()
	{
		     $Objcl=new Candidat_class();
			 $Cnn=$Objcl->ma_connexion();
		     $obj_validation=new Validation_cadidature_class();
	         $obj_famille=new Famille_class();
		
		  //------------------------------  traitement photo uploder--------------------------------------------------//
			
			$tmp_name=$_FILES['CANDIDAT_PHOTO']['tmp_name']; 
            $name=$_FILES['CANDIDAT_PHOTO']['name']; 
            
            $ext_st=pathinfo($name);
            $extension=$ext_st['extension'];
            
            $size=$_FILES['CANDIDAT_PHOTO']['size']; 
            $type=$_FILES['CANDIDAT_PHOTO']['type']; 
            $erreur=$_FILES['CANDIDAT_PHOTO']['error'];
			
			//----- creation chemin avec variable globales --------------------/
			
				$uploadpath=PHOTO_DIR; 
				$path_filename=$uploadpath.$name;
				$path_source=$tmp_name;
			
		    //--------------------  tableau des extensions exclus  ------------------------------//
			
			 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
			 
			 $photo="avatar.png";
			
			 if(in_array($extension,$extensions_permis))
			 {
				if(move_uploaded_file($path_source,$path_filename)==true)
				{
				   $photo=$name;
				}
				
			 }
			 $Tab_famille="";
			
			 if($_POST['CANDIDAT_IS_FAMILLE']=="Oui")
			 {
				 
				 
			 }
			 if(isset($_POST['CANDIDAT_TYPE']) && $_POST['CANDIDAT_TYPE']!="Interne")
			 {
				$matricule=@$_POST['CANDIDAT_MATRICULE']; 
			 }
			 else
			 {
				 $matricule="";
			 }
			 
			
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
		   $fk_util_id=$_POST['FK_UTIL_ID'];
		   $date_naiss=$_POST['CANDIDAT_DATE_NAISSANCE'];
		   
		   ($Objcl->La_date_est_fr($date_naiss)==true) ? $date_naiss=$Objcl->datefr2en($date_naiss): $date_naiss;
		   
		   $candidat_is_famille=$_POST['CANDIDAT_IS_FAMILLE'];
		
		   $Tab_param=array(
			
			'CANDIDAT_TYPE'=>$_POST['CANDIDAT_TYPE'],
			'CANDIDAT_CIVILITE'=>$_POST['CANDIDAT_CIVILITE'],
			'CANDIDAT_NOM'=>$_POST['CANDIDAT_NOM'],
			'CANDIDAT_PRENOM'=>$_POST['CANDIDAT_PRENOM'],
			'CANDIDAT_MATRICULE'=>$matricule,
			'CANDIDAT_DATE_NAISSANCE'=>$date_naiss,
			'CANDIDAT_LIEU_NAISSANCE'=>$_POST['CANDIDAT_LIEU_NAISSANCE'],
			'CANDIDAT_NATIONALITE'=>$_POST['CANDIDAT_NATIONALITE'],
			'CANDIDAT_SIT_MAT'=>$_POST['CANDIDAT_SIT_MAT'],
			'CANDIDAT_NBRE_ENF'=>$_POST['CANDIDAT_NBRE_ENF'],
			'CANDIDAT_ADR_PERM'=>$_POST['CANDIDAT_ADR_PERM'],
			'CANDIDAT_ADR_ACT'=>$_POST['CANDIDAT_ADR_ACT'],
			'CANDIDAT_INDICATIF'=>$_POST['CANDIDAT_INDICATIF'],
			'CANDIDAT_NUM_TEL'=>$_POST['CANDIDAT_NUM_TEL'],
			'CANDIDAT_NUM_GSM'=>$_POST['CANDIDAT_NUM_GSM'],
			'CANDIDAT_PERMIS'=>$_POST['CANDIDAT_PERMIS'],
			'CANDIDAT_DEMANDE_EMPLOI'=>"null_value",
			'CANDIDAT_CV'=>"null_value",
			'CANDIDAT_CERTIFICAT_TRAVAIL'=>"null_value",
			'CANDIDAT_PHOTO'=>$photo,
			'CANDIDAT_ACTE_NAISS'=>"null_value",
			'CANDIDAT_FICHE_FAMILLE'=>"null_value",
			'CANDIDAT_CERTIF_NAT'=>"null_value",
			'CANDIDAT_CERTIF_DOMICILE'=>"null_value",
			'CANDIDAT_CERTIF_MEDICAL'=>"null_value",
			'CANDIDAT_CASIER_JUDICIAIRE'=>"null_value",
			'CANDIDAT_IS_FAMILLE'=>$candidat_is_famille,
			'CANDIDAT_MOTIV_POSTE'=>"null_value",
			'FK_UTIL_ID'=>$fk_util_id);
			
		
			
			 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
			 
			 $date_enreg=$Tab_date['date_enreg'];
			 
			($Objcl->La_date_est_fr($date_enreg)==true) ? $date_enreg=$Objcl->datefr2en($date_enreg): $date_enreg;
			 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
			 
		
		 $cmd_suivant=$_POST["enregistrer_continue"];
		 $current_etape=1;
		   
		 $tab_redire=$Objcl->current_etape();
		 $next_etape=$tab_redire[$current_etape+1];
		 
		 if($cmd_suivant=="Enregistrer et Continuer")
		 {
		    $current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
		 }
		 else
		 {
			$current_path=HOME.$Objcl->param_encode('form_coord_personnelles&annonce_id='.$fk_annonce_id); 
		 }
		
		
		$Cnn->beginTransaction();
		 
		try
		{
		 
				if($Objcl->ajouter_enreg_candidat($Tab_param,$Cnn)==true)
				{
						$last_id=$Objcl->getLastCandId();
						$param_validation= array(
											 "etape"=>"1",
											 "date"=>$date_enreg,
											 "id_annonce"=>$fk_annonce_id,
											 "id_candidat"=>$last_id,
											 "libelle"=>"Coordonnee Personnelle"
										 );
							$mess=0;
						
			//------------  ajout des information famille --------------------------//
			
						
					   if(@$candidat_is_famille=="Oui")
					   {
										for($i=0; $i<sizeof(@$_POST["FAMILLE_NOM[]"]); $i++)
										{
											$param_famille=array();
											if(@$_POST["FAMILLE_NOM"][$i]!='')
											{
												$param_famille=array(
											
																	"FAMILLE_NOM"=>$_POST["FAMILLE_NOM"][$i],
																	"FAMILLE_PRENOM"=>$_POST["FAMILLE_PRENOM"][$i],
																	"FAMILLE_STRUCTURE"=>$_POST["FAMILLE_STRUCTURE"][$i],
																	"FAMILLE_DEGRE"=>$_POST["FAMILLE_DEGRE"][$i],
																	"FK_CANDIDAT_ID"=>$last_id
																	 );
											
											$rc=@$obj_famille->ajouter_enreg_famille($param_famille,$Cnn);
											
												if($rc==false)
												{ 
												  $mess++;
												}
											   
											}
										}	
												
					   }
					   
		         //-------------------- fin ajout info famille ----------------------------//
		   
		   
		         //-------------------------------- enregistrement validation ------------------------//
			
					$recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
					//----- fin ajout ---//
					
					$Cnn->commit();
					//---- commit si tout ce passe bien ---//
					
					//$message="candidat enregistré avec succès!";
					//$Objcl->message_box($message);
					$Objcl->redirige($current_path);
				}
				else
				{
			        $Cnn->rollback();
					$message="candidat non enregistré!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('form_coord_personnelles&annonce_id='.$fk_annonce_id));
			
				}
		}
		catch(Exeption $e)
		{
			$Cnn->rollback();
			$message="candidat non enregistré!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_coord_personnelles&annonce_id='.$fk_annonce_id));
		}

	}

	//Controleur modifier
	
	function controler_modifier()
	{
	
			 $Objcl=new Candidat_class();
			 $obj_famille=new Famille_class();
			
			//-----------------------------------------------------------------//
			 $old_photo=$_POST["OLD_PHOTO"];
			 $name=$_FILES['CANDIDAT_PHOTO']['name']; 
			 $photo="";
			  
			if($old_photo!=$name && $name!="")
			{
					$tmp_name=$_FILES['CANDIDAT_PHOTO']['tmp_name']; 
					$name=$_FILES['CANDIDAT_PHOTO']['name']; 
				
					$ext_st=pathinfo($name);
					$extension=$ext_st['extension'];
				
					$size=$_FILES['CANDIDAT_PHOTO']['size']; 
					$type=$_FILES['CANDIDAT_PHOTO']['type']; 
					$erreur=$_FILES['CANDIDAT_PHOTO']['error'];
				
				//----- creation chemin avec variable globales --------------------/
				
					$uploadpath=PHOTO_DIR; 
					$path_filename=$uploadpath.$name;
					$path_source=$tmp_name;
				
				  //--------------------  tableau des extensions exclus  ------------------------------//
				
					 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
					
					 $nom_sans_ext=substr($name,0,-4);
					 
					 $photo="avatar.png";
					
					 if(in_array($extension,$extensions_permis))
					 {
						if(move_uploaded_file($path_source,$path_filename)==true)
						{
						   $photo=$name;
						}
					 }
			 
			}
			else
			{
				$photo=$old_photo;
			}
		
		 
		 	
			 $Tab_famille="";
			
			 
			 if(isset($_POST['CANDIDAT_TYPE']) && $_POST['CANDIDAT_TYPE']=="Interne")
			 {
				 $matricule=@$_POST['CANDIDAT_MATRICULE']; 
			 }
			 else
			 {
				 $matricule="";
			 }
			 
			//-----------------------------------------------------------------//
			
			$candidat_is_famille=$_POST['CANDIDAT_IS_FAMILLE'];
			$fk_candidat_id=$_POST['CANDIDAT_ID'];
			$fk_annonce_id=$_POST['FK_ANNONCE_ID'];
			
			$date_naiss=$_POST['CANDIDAT_DATE_NAISSANCE'];
		   
		   ($Objcl->La_date_est_fr($date_naiss)==true) ? $date_naiss=$Objcl->datefr2en($date_naiss): $date_naiss;
			
			$Tab_param=array(
				'CANDIDAT_ID'=>$fk_candidat_id,
				'CANDIDAT_TYPE'=>$_POST['CANDIDAT_TYPE'],
				'CANDIDAT_CIVILITE'=>$_POST['CANDIDAT_CIVILITE'],
				'CANDIDAT_NOM'=>$_POST['CANDIDAT_NOM'],
				'CANDIDAT_PRENOM'=>$_POST['CANDIDAT_PRENOM'],
				'CANDIDAT_MATRICULE'=>$matricule,
				'CANDIDAT_DATE_NAISSANCE'=>$date_naiss,
				'CANDIDAT_LIEU_NAISSANCE'=>$_POST['CANDIDAT_LIEU_NAISSANCE'],
				'CANDIDAT_NATIONALITE'=>$_POST['CANDIDAT_NATIONALITE'],
				'CANDIDAT_SIT_MAT'=>$_POST['CANDIDAT_SIT_MAT'],
				'CANDIDAT_NBRE_ENF'=>$_POST['CANDIDAT_NBRE_ENF'],
				'CANDIDAT_ADR_PERM'=>$_POST['CANDIDAT_ADR_PERM'],
				'CANDIDAT_ADR_ACT'=>$_POST['CANDIDAT_ADR_ACT'],
				'CANDIDAT_INDICATIF'=>$_POST['CANDIDAT_INDICATIF'],
				'CANDIDAT_NUM_TEL'=>$_POST['CANDIDAT_NUM_TEL'],
				'CANDIDAT_NUM_GSM'=>$_POST['CANDIDAT_NUM_GSM'],
				'CANDIDAT_PERMIS'=>$_POST['CANDIDAT_PERMIS'],
				'CANDIDAT_PHOTO'=>$photo,
				'CANDIDAT_IS_FAMILLE'=>$candidat_is_famille,
				'FK_UTIL_ID'=>$_POST['FK_UTIL_ID']);

				$Cnn=$Objcl->ma_connexion();
				$mess=0;
				
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=1;
		   
			 $tab_redire=$Objcl->current_etape();
			 $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_coord_personnelles&annonce_id='.$fk_annonce_id); 
			 }
		  
			$famille_id=0;	
				
				
			if(isset($_POST["FAMILLE_ID"]) && $_POST["FAMILLE_ID"]!=0 && $_POST["FAMILLE_ID"]!=""){ $famille_id=@$_POST["FAMILLE_ID"];}
			else{ $famille_id=0;}
			
			$Cnn->beginTransaction();
			
			
			
			
			 if(@$candidat_is_famille=="Oui")
			 {
					
						if($famille_id==0 && sizeof(@$_POST["FAMILLE_NOM"])> 0 && isset($_POST["FAMILLE_NOM"]) )
						{	
						    $nbval=sizeof($_POST["FAMILLE_NOM"]);
						    $statement=$obj_famille->prepared_insert_query($Cnn);
							
							for($i=0; $i<sizeof($_POST["FAMILLE_NOM"]); $i++)
							{
								if($_POST["FAMILLE_NOM"][$i]!="" && $_POST["FAMILLE_PRENOM"][$i]!="" && $_POST["FAMILLE_STRUCTURE"][$i]!="" && $_POST["FAMILLE_DEGRE"][$i]!=""){	
									
									$param_famille=array(
															"FAMILLE_NOM"=>$_POST["FAMILLE_NOM"][$i],
															"FAMILLE_PRENOM"=>$_POST["FAMILLE_PRENOM"][$i],
															"FAMILLE_STRUCTURE"=>$_POST["FAMILLE_STRUCTURE"][$i],
															"FAMILLE_DEGRE"=>$_POST["FAMILLE_DEGRE"][$i],
															"FK_CANDIDAT_ID"=>$fk_candidat_id
														 );
									$obj_famille->execute_insert_query($statement,$param_famille);
								}else{
									
									$nbval--;
									continue;
								}
								
								 if($nbval>0){
								 $statement->execute();
								}			
							}    
							
							
						}
						else if($famille_id!=0 && isset($_POST["FAMILLE_NOM"]) && $_POST["FAMILLE_NOM"]!="")
						{
							$param_famille=array(
													"FAMILLE_NOM"=>$_POST["FAMILLE_NOM"],
													"FAMILLE_PRENOM"=>$_POST["FAMILLE_PRENOM"],
													"FAMILLE_STRUCTURE"=>$_POST["FAMILLE_STRUCTURE"],
													"FAMILLE_DEGRE"=>$_POST["FAMILLE_DEGRE"],
													"FAMILLE_ID"=>$famille_id
												);
												
							$rec2=$obj_famille->modifier_enreg_famille($param_famille,$Cnn);
							if($rec2==false){$mess++;}
						}
							
				   }
					
		
		try
		{
			
			if($Objcl->modifier_enreg_candidat($Tab_param,$Cnn)==true)
			{
					$Cnn->commit();
					//$message="candidat modifié avec succès!";
					//$Objcl->message_box($message);
					$Objcl->redirige($current_path);
				}
				else
				{
					$Cnn->rollback();
					$message="candidat non modifié!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('form_coord_personnelles&annonce_id='.$fk_annonce_id));
				}
			}
			catch(Exception $e )
			{
				    $Cnn->rollback();
					$message="candidat non modifié!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('form_coord_personnelles&annonce_id='.$fk_annonce_id));
				
			}
	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Candidat_class();
		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_candidat($id))
		{
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_candidat').'&module='.$Objcl->param_encode('xxx'));
		}
		else
		{
	
			$message="ATTENTION!candidat non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_candidat').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}
	
	//----------------------------//
	function controler_upload_doc()
	{
	
	    //----  traitement demande uploder-------//
		 $Objcl=new Candidat_class();
		 
		 
		 $type=@$_POST["type_candidat"];
		  
			 
		 if($type=="Externe")
		 {
			
			$tmp_name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['tmp_name']; 
            $name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['name']; 
            
            $ext_st1=pathinfo($name1);
            $extension1=$ext_st1['extension'];
            
            $size1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['size']; 
            $type1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['type']; 
            $erreur1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['error'];
			
			//---- creation chemin avec variable globales -------/
			
			 $uploadpath1=DEMANDE_EMPL_DIR; 
			 $path_filename1=$uploadpath1.$name1;
			 $path_source1=$tmp_name1;
			
		    //----  tableau des extensions exclus  -------//
			
			$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
			$candidat_demande="";
			
			 if(in_array($extension1,$extensions_permis))
			 {
				if(move_uploaded_file($path_source1,$path_filename1)==true)
				{
				   $candidat_demande=$name1;
				}
				
			 }
			 
			  //------ traitement cv uploder---------------//
			
			$tmp_name2=$_FILES['CANDIDAT_CV']['tmp_name']; 
            $name2=$_FILES['CANDIDAT_CV']['name']; 
            
            $ext_st2=pathinfo($name2);
            $extension2=$ext_st2['extension'];
            
            $size2=$_FILES['CANDIDAT_CV']['size']; 
            $type2=$_FILES['CANDIDAT_CV']['type']; 
            $erreur2=$_FILES['CANDIDAT_CV']['error'];
			
			//----- creation chemin avec variable globales --------------------/
			
				$uploadpath1=CV_DIR; 
				$path_filename2=$uploadpath1.$name2;
				$path_source2=$tmp_name2;
			
		    //--------------------  tableau des extensions exclus  ------------------------------//
			
			$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
			
			
			 
			 $candidat_cv="";
			
			 if(in_array($extension2,$extensions_permis))
			 {
				if(move_uploaded_file($path_source2,$path_filename2)==true)
				{
				   $candidat_cv=$name2;
				}
				
			 }
			 
			  
			//--------- traitement CANDIDAT_ACTE_NAISS  iploder----//
			
			$tmp_name4=$_FILES['CANDIDAT_ACTE_NAISS']['tmp_name']; 
            $name4=$_FILES['CANDIDAT_ACTE_NAISS']['name']; 
            
            $ext_st4=pathinfo($name4);
            $extension4=$ext_st4['extension'];
            
            $size4=$_FILES['CANDIDAT_ACTE_NAISS']['size']; 
            $type4=$_FILES['CANDIDAT_ACTE_NAISS']['type']; 
            $erreur4=$_FILES['CANDIDAT_ACTE_NAISS']['error'];
			
			//----- creation chemin avec variable globales --------------------/
			
				$uploadpath4=ACT_NAISS_DIR; 
				$path_filename4=$uploadpath4.$name4;
				$path_source4=$tmp_name4;
			
		    //---  tableau des extensions exclus  ----//
			
			$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
			$acte_de_naissance="";
			
			 if(in_array($extension4,$extensions_permis))
			 {
				if(move_uploaded_file($path_source4,$path_filename4)==true)
				{
				   $acte_de_naissance=$name4;
				}
				
			 }
			 
			//------------------------------  traitement CANDIDAT_CERTIFICAT_TRAVAIL  iploder------//
					
					$tmp_name3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['tmp_name']; 
					$name3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['name']; 
					
					$ext_st3=pathinfo($name3);
					$extension3=$ext_st3['extension'];
					
					$size3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['size']; 
					$type3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['type']; 
					$erreur3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['error'];
					
					//----- creation chemin avec variable globales --------------------/
					
						$uploadpath3=CERTIF_TRAV_DIR; 
						$path_filename3=$uploadpath3.$name3;
						$path_source3=$tmp_name3;
					
					//--------------------  tableau des extensions exclus  ------------------------------//
					
						//$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
						
						 //$nom_sans_ext3=substr($name3,0,-4);
						 
						 $certificat_de_travail="";
						
						 if(in_array($extension3,$extensions_permis))
						 {
							if(move_uploaded_file($path_source3,$path_filename3)==true)
							{
							   $certificat_de_travail=$name3;
							}
							
						 }
					
					 
				//------------------------------  traitement CANDIDAT_CERTIF_NAT  iploder-----//
					
						$tmp_name5=$_FILES['CANDIDAT_CERTIF_NAT']['tmp_name']; 
						$name5=$_FILES['CANDIDAT_CERTIF_NAT']['name']; 
						
						$ext_st5=pathinfo($name5);
						$extension5=$ext_st5['extension'];
						
						$size5=$_FILES['CANDIDAT_CERTIF_NAT']['size']; 
						$type5=$_FILES['CANDIDAT_CERTIF_NAT']['type']; 
						$erreur5=$_FILES['CANDIDAT_CERTIF_NAT']['error'];
					
					//----- creation chemin avec variable globales --------------------/
					
						$uploadpath5=CERTIF_NATIONAL_DIR; 
						$path_filename5=$uploadpath5.$name5;
						$path_source5=$tmp_name5;
					
					     //--------------------  tableau des extensions exclus  ------------------------------//
					
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
					    $certificat_nationalite="";
						
						 if(in_array($extension5,$extensions_permis))
						 {
							if(move_uploaded_file($path_source5,$path_filename5)==true)
							{
							   $certificat_nationalite=$name5;
							}
							
						 }
					 
					//  traitement CANDIDAT_CERTIF_DOMICILE  iploder--//
					
						$tmp_name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['tmp_name']; 
						$name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['name']; 
						
						$ext_st6=pathinfo($name6);
						$extension6=$ext_st6['extension'];
						
						$size6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['size']; 
						$type6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['type']; 
						$erreur6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['error'];
						
					//----- creation chemin avec variable globales --------------------/
					
						$uploadpath6=CERTIF_DOM_DIR; 
						$path_filename6=$uploadpath6.$name6;
						$path_source6=$tmp_name6;
					
					//--------------------  tableau des extensions exclus  ------------------------------//
					
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
						 $certificat_domicile="";
						
						 if(in_array($extension6,$extensions_permis))
						 {
							if(move_uploaded_file($path_source6,$path_filename6)==true)
							{
							   $certificat_domicile=$name6;
							}
							
						 } 
					 
					//------------------------------  traitement CANDIDAT_CERTIF_MEDICAL  iploder--//
					
						$tmp_name7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['tmp_name']; 
						$name7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['name']; 
						
						$ext_st7=pathinfo($name7);
						$extension7=$ext_st7['extension'];
						
						$size7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['size']; 
						$type7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['type']; 
						$erreur7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['error'];
					
					//----- creation chemin avec variable globales --------------------/
					
						$uploadpath7=CERTIF_MEDIC_DIR; 
						$path_filename7=$uploadpath7.$name7;
						$path_source7=$tmp_name7;
					
					//--------------------  tableau des extensions exclus  ------------------------------//
					
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
						
						
						 
						 $certificat_medical="";
						
						 if(in_array($extension7,$extensions_permis))
						 {
							if(move_uploaded_file($path_source7,$path_filename7)==true)
							{
							   $certificat_medical=$name7;
							}
							
						 }  
					 
				//------------------------------  traitement CANDIDAT_CASIER_JUDICIAIRE  uploder----//
					
						$tmp_name8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['tmp_name']; 
						$name8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['name']; 
						
						$ext_st8=pathinfo($name8);
						$extension8=$ext_st8['extension'];
						
						$size8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['size']; 
						$type8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['type']; 
						$erreur8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['error'];
						
						//----- creation chemin avec variable globales --------------------/
						
							$uploadpath8=CASIER_JUD_DIR; 
							$path_filename8=$uploadpath8.$name8;
							$path_source8=$tmp_name8;
						
						//--------------------  tableau des extensions exclus  ------------------------------//
						
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
						
						 $casier_judiciaire="";
						
						 if(in_array($extension8,$extensions_permis))
						 {
							if(move_uploaded_file($path_source8,$path_filename8)==true)
							{
							   $casier_judiciaire=$name8;
							}
							
						 }
					 
				 //  traitement CANDIDAT_FICHE_FAMILLE  uploder----//
					
						$tmp_name9=$_FILES['CANDIDAT_FICHE_FAMILLE']['tmp_name']; 
						$name9=$_FILES['CANDIDAT_FICHE_FAMILLE']['name']; 
						
						$ext_st9=pathinfo($name9);
						$extension9=$ext_st9['extension'];
						
						$size9=$_FILES['CANDIDAT_FICHE_FAMILLE']['size']; 
						$type9=$_FILES['CANDIDAT_FICHE_FAMILLE']['type']; 
						$erreur9=$_FILES['CANDIDAT_FICHE_FAMILLE']['error'];
						
						//----- creation chemin avec variable globales --------------------/
						
							$uploadpath9=FICHE_FAMIL_DIR; 
							$path_filename9=$uploadpath9.$name9;
							$path_source9=$tmp_name9;
						
						//--------------------  tableau des extensions exclus  ------------------------------//
						
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
						
					
						 
						 $fiche_famille="";
						
						 if(in_array($extension9,$extensions_permis))
						 {
							if(move_uploaded_file($path_source9,$path_filename9)==true)
							{
							   $fiche_famille=$name9;
							}
							
						 }
						 
						 
						//------ recuperation de  id du candidat -----------------//
						 
						 $obj_candidat=new Candidat_class();
						 $fk_util_id=$_POST['id_user'];
						 
						 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
						 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
							 
						 $Tab_param=array(
											  'CANDIDAT_DEMANDE_EMPLOI'=>$candidat_demande,
											  'CANDIDAT_CV'=>$candidat_cv,
											  'CANDIDAT_CERTIFICAT_TRAVAIL'=>$certificat_de_travail,
											  'CANDIDAT_ACTE_NAISS'=>$acte_de_naissance,
											  'CANDIDAT_FICHE_FAMILLE'=>$fiche_famille,
											  'CANDIDAT_CERTIF_NAT'=>$certificat_nationalite,
											  'CANDIDAT_CERTIF_DOMICILE'=>$certificat_domicile,
											  'CANDIDAT_CERTIF_MEDICAL'=>$certificat_medical,
											  'CANDIDAT_CASIER_JUDICIAIRE'=>$casier_judiciaire,
											  'CANDIDAT_ID'=>$candidat_id,
											  'FK_UTIL_ID'=>$fk_util_id
										 );
											   
					
			   }
			   else
			   {
				   
				    $tmp_name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['tmp_name']; 
					$name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['name']; 
					
					$ext_st1=pathinfo($name1);
					$extension1=$ext_st1['extension'];
					
					$size1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['size']; 
					$type1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['type']; 
					$erreur1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['error'];
					
					//----- creation chemin avec variable globales --------------------/
					
					 $uploadpath1=DEMANDE_EMPL_DIR; 
					 $path_filename1=$uploadpath1.$name1;
					 $path_source1=$tmp_name1;
					
					//--------------------  tableau des extensions exclus  ------------------------------//
					
					$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
					
					 
					 
					 $candidat_demande="";
					
					 if(in_array($extension1,$extensions_permis))
					 {
						if(move_uploaded_file($path_source1,$path_filename1)==true)
						{
						   $candidat_demande=$name1;
						}
						
					 }
					 
					  //------------------------------  traitement cv uploder------//
					
					$tmp_name2=$_FILES['CANDIDAT_CV']['tmp_name']; 
					$name2=$_FILES['CANDIDAT_CV']['name']; 
					
					$ext_st2=pathinfo($name2);
					$extension2=$ext_st2['extension'];
					
					$size2=$_FILES['CANDIDAT_CV']['size']; 
					$type2=$_FILES['CANDIDAT_CV']['type']; 
					$erreur2=$_FILES['CANDIDAT_CV']['error'];
					
					//----- creation chemin avec variable globales --------------------/
					
						$uploadpath1=CV_DIR; 
						$path_filename2=$uploadpath1.$name2;
						$path_source2=$tmp_name2;
					
					//--------------------  tableau des extensions exclus  ------------------------------//
					
					$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
					 $candidat_cv="";
					
					 if(in_array($extension2,$extensions_permis))
					 {
						if(move_uploaded_file($path_source2,$path_filename2)==true)
						{
						   $candidat_cv=$name2;
						}
						
					 }
					 
					  
					//------------------------------  traitement CANDIDAT_ACTE_NAISS  iploder---//
					
					$tmp_name4=$_FILES['CANDIDAT_ACTE_NAISS']['tmp_name']; 
					$name4=$_FILES['CANDIDAT_ACTE_NAISS']['name']; 
					
					$ext_st4=pathinfo($name4);
					$extension4=$ext_st4['extension'];
					
					$size4=$_FILES['CANDIDAT_ACTE_NAISS']['size']; 
					$type4=$_FILES['CANDIDAT_ACTE_NAISS']['type']; 
					$erreur4=$_FILES['CANDIDAT_ACTE_NAISS']['error'];
					
					//----- creation chemin avec variable globales --------------------/
					
						$uploadpath4=ACT_NAISS_DIR; 
						$path_filename4=$uploadpath4.$name4;
						$path_source4=$tmp_name4;
					
					//--------------------  tableau des extensions exclus  ------------------------------//
					
					$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
					
					 
					 
					 $acte_de_naissance="";
					
					 if(in_array($extension4,$extensions_permis))
					 {
						if(move_uploaded_file($path_source4,$path_filename4)==true)
						{
						   $acte_de_naissance=$name4;
						}
						
					 }
					 
					
					
					//------ recuperation de  id du candidat -----------------//
						 
						 $obj_candidat=new Candidat_class();
						 $fk_util_id=$_POST['id_user'];
						 
						 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
						 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
							 
						 $Tab_param=array(
											  'CANDIDAT_DEMANDE_EMPLOI'=>$candidat_demande,
											  'CANDIDAT_CV'=>$candidat_cv,
											  'CANDIDAT_CERTIFICAT_TRAVAIL'=>"null_value",
											  'CANDIDAT_ACTE_NAISS'=>$acte_de_naissance,
											  'CANDIDAT_FICHE_FAMILLE'=>"null_value",
											  'CANDIDAT_CERTIF_NAT'=>"null_value",
											  'CANDIDAT_CERTIF_DOMICILE'=>"null_value",
											  'CANDIDAT_CERTIF_MEDICAL'=>"null_value",
											  'CANDIDAT_CASIER_JUDICIAIRE'=>"null_value",
											  'CANDIDAT_ID'=>$candidat_id,
											  'FK_UTIL_ID'=>$fk_util_id
										 );	   
				   
				   
				   
			   }
					
					$obj_candidat=new Candidat_class();
					
					$Cnn=$obj_candidat->ma_connexion();
					
				 //-------------------------------- enregistrement validation ------------------------------//
				
					 $obj_validation=new Validation_cadidature_class();
					 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
					 
					 $date_enreg=$Tab_date["date_enreg"];
					 
					 ($obj_validation->La_date_est_fr($date_enreg)==true) ? $date_enreg=$obj_validation->datefr2en($date_enreg): $date_enreg;
					 
					 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
					 
					 $param_validation= array(
												 "etape"=>"11",
												 "date"=>$date_enreg,
												 "id_annonce"=>$fk_annonce_id,
												 "id_candidat"=>$candidat_id,
												 "libelle"=>"Piece jointe"
											 );
										 
					$recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
				 
			
			
				 //-----------------------  fin validation --------------------------------------------------//
				 
		 //-------------------------------------------------------------------------------------------------------------- enregistrer et suivant ---------------------------------------------------------------------------------------------------------------------------------------//
			
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=11;
		   
		     $tab_redire=$Objcl->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$Objcl->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$Objcl->param_encode('form_piece_joint&annonce_id='.$fk_annonce_id); 
			 }
	       //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//		 
				 
				 
	    $Cnn->beginTransaction();	 
		
		try
		{		 		
			if($obj_candidat->update_candidat($Tab_param,$Cnn)==true)
			{
				$Cnn->commit();
				//$message="pieces jointes enregistré avec succès!";
				//$obj_candidat->message_box($message);
				$obj_candidat->redirige($current_path);
				
			}
			else
			{
				$Cnn->rollback();
				$message="pieces jointes non enregistré !";
				$obj_candidat->message_box($message);
				$obj_candidat->redirige(HOME.$obj_candidat->param_encode('form_piece_joint')."&annonce_id=".$fk_annonce_id);
			}
		}
		catch(Exxeption $e)
		{
			 $Cnn->rollback();
			 $message="pieces jointes non enregistré !";
			 $obj_candidat->message_box($message);
			 $obj_candidat->redirige(HOME.$obj_candidat->param_encode('form_piece_joint')."&annonce_id=".$fk_annonce_id);
		}
		
	}
	
	function controler_modif_upload_doc()
	{
		
		 //------------------------------  traitement demande uploder-------//
		 $Objcl=new Candidat_class();
		 
		 $type=@$_POST["type_candidat"];
		 
		 if($type=="Externe")
		 {
               $name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['name'];
		       $old_name1=$_POST['OLD_CANDIDAT_DEMANDE_EMPLOI'];
			 
			   if($old_name1!=$name1 && $name1!="")
			   {
					$tmp_name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['tmp_name']; 
					$name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['name']; 
					
					$ext_st1=pathinfo($name1);
					$extension1=$ext_st1['extension'];
					
					$size1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['size']; 
					$type1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['type']; 
					$erreur1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['error'];
				
					//----- creation chemin avec variable globales --------------------/
					
					 $uploadpath1=DEMANDE_EMPL_DIR; 
					 $path_filename1=$uploadpath1.$name1;
					 $path_source1=$tmp_name1;
				
				   //--------------------  tableau des extensions exclus  ------------------------------//
				
						$extensions_permis= array('png','jpeg','PNG','JPEG','JPG','jpg');
						
						$candidat_demande="";
						
						 if(in_array($extension1,$extensions_permis))
						 {
							if(move_uploaded_file($path_source1,$path_filename1)==true)
							{
							   $candidat_demande=$name1;
							}
						 }
			   }
			   else
			   {
				   $candidat_demande=$old_name1;
			   }
			   
			  //------------------------------  traitement cv uploder-----//
			
			   $name2=$_FILES['CANDIDAT_CV']['name'];
		       $old_name2=$_POST['OLD_CANDIDAT_CV'];
			   
			   if($old_name2!=$name2 && $name2!="")
			   {
					$tmp_name2=$_FILES['CANDIDAT_CV']['tmp_name']; 
					$name2=$_FILES['CANDIDAT_CV']['name']; 
					
					$ext_st2=pathinfo($name2);
					$extension2=$ext_st2['extension'];
					
					$size2=$_FILES['CANDIDAT_CV']['size']; 
					$type2=$_FILES['CANDIDAT_CV']['type']; 
					$erreur2=$_FILES['CANDIDAT_CV']['error'];
			
				    //----- creation chemin avec variable globales --------------------/
				
					$uploadpath1=CV_DIR; 
					$path_filename2=$uploadpath1.$name2;
					$path_source2=$tmp_name2;
				
		            //--------------------  tableau des extensions exclus  ------------------------------//
			
					  $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
					  $candidat_cv="";
				
					 if(!in_array($nom_sans_ext2,$extensions_exclus))
					 {
						if(move_uploaded_file($path_source2,$path_filename2)==true)
						{
						   $candidat_cv=$name2;
						}
						
					 }
			   }
			   else
			   {
				 $candidat_cv=$old_name2;   
			   }
			 
			  
			//------------------------------  traitement CANDIDAT_ACTE_NAISS  iploder-------//
			
			   $name4=$_FILES['CANDIDAT_ACTE_NAISS']['name'];
		       $old_name4=$_POST['OLD_CANDIDAT_ACTE_NAISS'];
			   
			   if($old_name4!=$name4 && $name4!="")
		       {
					$tmp_name4=$_FILES['CANDIDAT_ACTE_NAISS']['tmp_name']; 
					$name4=$_FILES['CANDIDAT_ACTE_NAISS']['name']; 
					
					$ext_st4=pathinfo($name4);
					$extension4=$ext_st4['extension'];
					
					$size4=$_FILES['CANDIDAT_ACTE_NAISS']['size']; 
					$type4=$_FILES['CANDIDAT_ACTE_NAISS']['type']; 
					$erreur4=$_FILES['CANDIDAT_ACTE_NAISS']['error'];
					
					//----- creation chemin avec variable globales --------------------/
					
						$uploadpath4=ACT_NAISS_DIR; 
						$path_filename4=$uploadpath4.$name4;
						$path_source4=$tmp_name4;
					
					//--------------------  tableau des extensions exclus  ------------------------------//
					
					 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
					 $acte_de_naissance="";
					
					 if(in_array($extension4,$extensions_permis))
					 {
						if(move_uploaded_file($path_source4,$path_filename4)==true)
						{
						   $acte_de_naissance=$name4;
						}
						
					 }
			   }
			   else
			   {
				  $acte_de_naissance=$old_name4; 
			   }
			
			 
			//------------------------------  traitement CANDIDAT_CERTIFICAT_TRAVAIL  iploder------//
				
				 $name3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['name'];
		         $old_name3=$_POST['OLD_CANDIDAT_CERTIFICAT_TRAVAIL'];
			   
			    if($old_name3!=$name3 && $name3!="")	
				{	
					$tmp_name3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['tmp_name']; 
					$name3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['name']; 
					
					$ext_st3=pathinfo($name3);
					$extension3=$ext_st3['extension'];
					
					$size3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['size']; 
					$type3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['type']; 
					$erreur3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['error'];
					
					//----- creation chemin avec variable globales --------------------/
					
						$uploadpath3=CERTIF_TRAV_DIR; 
						$path_filename3=$uploadpath3.$name3;
						$path_source3=$tmp_name3;
					
					//--------------------  tableau des extensions exclus  ------------------------------//
					
						 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
						 $certificat_de_travail="";
						
						 if(in_array($extension3,$extensions_permis))
						 {
							if(move_uploaded_file($path_source3,$path_filename3)==true)
							{
							   $certificat_de_travail=$name3;
							}
							
						 }
				}
				else
				{
				   $certificat_de_travail=$old_name3;	
				}
					 
				//------------------------------  traitement CANDIDAT_CERTIF_NAT  iploder------//
					
				 $name5=$_FILES['CANDIDAT_CERTIF_NAT']['name'];
		         $old_name5=$_POST['OLD_CANDIDAT_CERTIF_NAT'];
			   
			    if($old_name5!=$name5 && $name5!="")	
				{	
						$tmp_name5=$_FILES['CANDIDAT_CERTIF_NAT']['tmp_name']; 
						$name5=$_FILES['CANDIDAT_CERTIF_NAT']['name']; 
						
						$ext_st5=pathinfo($name5);
						$extension5=$ext_st5['extension'];
						
						$size5=$_FILES['CANDIDAT_CERTIF_NAT']['size']; 
						$type5=$_FILES['CANDIDAT_CERTIF_NAT']['type']; 
						$erreur5=$_FILES['CANDIDAT_CERTIF_NAT']['error'];
					
					//----- creation chemin avec variable globales --------------------/
					
						$uploadpath5=CERTIF_NATIONAL_DIR; 
						$path_filename5=$uploadpath5.$name5;
						$path_source5=$tmp_name5;
					
					//--------------------  tableau des extensions exclus  ------------------------------//
					
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
						$certificat_nationalite="";
						
						 if(in_array($extension5,$extensions_permis))
						 {
							if(move_uploaded_file($path_source5,$path_filename5)==true)
							{
							   $certificat_nationalite=$name5;
							}
							
						 }
				}
				else
				{
					 $certificat_nationalite=$old_name5;
				}
				
				
					//------------------------------  traitement CANDIDAT_CERTIF_DOMICILE  iploder----//
					
					$name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['name'];
		            $old_name6=$_POST['OLD_CANDIDAT_CERTIF_DOMICILE'];
			   
					if($old_name6!=$name6&& $name6!="")
					{	
					
						$tmp_name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['tmp_name']; 
						$name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['name']; 
						
						$ext_st6=pathinfo($name6);
						$extension6=$ext_st6['extension'];
						
						$size6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['size']; 
						$type6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['type']; 
						$erreur6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['error'];
						
					//----- creation chemin avec variable globales --------------------/
					
						$uploadpath6=CERTIF_DOM_DIR; 
						$path_filename6=$uploadpath6.$name6;
						$path_source6=$tmp_name6;
					
					//--------------------  tableau des extensions exclus  ------------------------------//
					
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
						$certificat_domicile="";
						
						 if(in_array($extension6,$extensions_permis))
						 {
							if(move_uploaded_file($path_source6,$path_filename6)==true)
							{
							   $certificat_domicile=$name6;
							}
							
						 } 
					}
					else
					{
						 $certificat_domicile=$old_name6;
					}
					
					//------------------------------  traitement CANDIDAT_CERTIF_MEDICAL  iploder-----//
					
					$name7=$_FILES['CANDIDAT_CERTIF_DOMICILE']['name'];
		            $old_name7=$_POST['OLD_CANDIDAT_CERTIF_DOMICILE'];
			   
					if($old_name7!=$name7 && $name7!="")
					{
						$tmp_name7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['tmp_name']; 
						$name7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['name']; 
						
						$ext_st7=pathinfo($name7);
						$extension7=$ext_st7['extension'];
						
						$size7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['size']; 
						$type7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['type']; 
						$erreur7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['error'];
					
					//----- creation chemin avec variable globales --------------------/
					
						$uploadpath7=CERTIF_MEDIC_DIR; 
						$path_filename7=$uploadpath7.$name7;
						$path_source7=$tmp_name7;
					
					//--------------------  tableau des extensions exclus  ------------------------------//
					
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
						$certificat_medical="";
						
						 if(in_array($extension7,$extensions_permis))
						 {
							if(move_uploaded_file($path_source7,$path_filename7)==true)
							{
							   $certificat_medical=$name7;
							}
							
						 }  
					}
					else
					{
					  $certificat_medical=$old_name7;	
					}
				//  traitement CANDIDAT_CASIER_JUDICIAIRE  uploder---//
					
					$name8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['name'];
		            $old_name8=$_POST['OLD_CANDIDAT_CASIER_JUDICIAIRE'];
			   
					if($old_name8!=$name8 && $name8!="")
					{
						$tmp_name8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['tmp_name']; 
						$name8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['name']; 
						
						$ext_st8=pathinfo($name8);
						$extension8=$ext_st8['extension'];
						
						$size8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['size']; 
						$type8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['type']; 
						$erreur8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['error'];
						
						//----- creation chemin avec variable globales --------------------/
						
							$uploadpath8=CASIER_JUD_DIR; 
							$path_filename8=$uploadpath8.$name8;
							$path_source8=$tmp_name8;
						
						//--------------------  tableau des extensions exclus  ------------------------------//
						
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
						$casier_judiciaire="";
						
						 if(in_array($extension8,$extensions_permis))
						 {
							if(move_uploaded_file($path_source8,$path_filename8)==true)
							{
							   $casier_judiciaire=$name8;
							}
							
						 }
					}
					else
					{
						 $casier_judiciaire=$old_name8;
					}
					
				 //------------------------------  traitement CANDIDAT_FICHE_FAMILLE  uploder---------//
					
					$name9=$_FILES['CANDIDAT_FICHE_FAMILLE']['name'];
		            $old_name9=$_POST['OLD_CANDIDAT_FICHE_FAMILLE'];
			   
					if($old_name9!=$name9 && $name9!="")
					{
						$tmp_name9=$_FILES['CANDIDAT_FICHE_FAMILLE']['tmp_name']; 
						$name9=$_FILES['CANDIDAT_FICHE_FAMILLE']['name']; 
						
						$ext_st9=pathinfo($name9);
						$extension9=$ext_st9['extension'];
						
						$size9=$_FILES['CANDIDAT_FICHE_FAMILLE']['size']; 
						$type9=$_FILES['CANDIDAT_FICHE_FAMILLE']['type']; 
						$erreur9=$_FILES['CANDIDAT_FICHE_FAMILLE']['error'];
						
						//----- creation chemin avec variable globales --------------------/
						
							$uploadpath9=FICHE_FAMIL_DIR; 
							$path_filename9=$uploadpath9.$name9;
							$path_source9=$tmp_name9;
						
						//--------------------  tableau des extensions exclus  ------------------------------//
						
							$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
							$fiche_famille="";
						
						 if(in_array($extension9,$extensions_permis))
						 {
							if(move_uploaded_file($path_source9,$path_filename9)==true)
							{
							   $fiche_famille=$name9;
							}
							
						 }
					}
					else
					{
					   $fiche_famille=$old_name9;	
					}
						 
						//------ recuperation de  id du candidat -----------------//
						 
						 $obj_candidat=new Candidat_class();
						 $fk_util_id=$_POST['id_user'];
						 
						 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
						 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
							 
						 $Tab_param=array(
											  'CANDIDAT_DEMANDE_EMPLOI'=>$candidat_demande,
											  'CANDIDAT_CV'=>$candidat_cv,
											  'CANDIDAT_CERTIFICAT_TRAVAIL'=>$certificat_de_travail,
											  'CANDIDAT_ACTE_NAISS'=>$acte_de_naissance,
											  'CANDIDAT_FICHE_FAMILLE'=>$fiche_famille,
											  'CANDIDAT_CERTIF_NAT'=>$certificat_nationalite,
											  'CANDIDAT_CERTIF_DOMICILE'=>$certificat_domicile,
											  'CANDIDAT_CERTIF_MEDICAL'=>$certificat_medical,
											  'CANDIDAT_CASIER_JUDICIAIRE'=>$casier_judiciaire,
											  'CANDIDAT_ID'=>$candidat_id,
											  'FK_UTIL_ID'=>$fk_util_id
										 );
											   
					
			   }
		 else
		 {
				   
				    $name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['name'];
		            $old_name1=$_POST['OLD_CANDIDAT_DEMANDE_EMPLOI'];
					
					if($old_name1!=$name1 && $name1!="")
					{
				   
						$tmp_name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['tmp_name']; 
						$name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['name']; 
						
						$ext_st1=pathinfo($name1);
						$extension1=$ext_st1['extension'];
						
						$size1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['size']; 
						$type1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['type']; 
						$erreur1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['error'];
						
						//----- creation chemin avec variable globales --------------------/
						
						 $uploadpath1=DEMANDE_EMPL_DIR; 
						 $path_filename1=$uploadpath1.$name1;
						 $path_source1=$tmp_name1;
						
						//--------------------  tableau des extensions exclus  ------------------------------//
						
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
						$candidat_demande="";
						
						 if(in_array($extension1,$extensions_permis))
						 {
							if(move_uploaded_file($path_source1,$path_filename1)==true)
							{
							   $candidat_demande=$name1;
							}
						 }
					}
					else
					{
						$candidat_demande=$old_name1;
					}
					  
					  
				//------------------------------  traitement cv uploder-------//
					
					
					$name2=$_FILES['CANDIDAT_CV']['name'];
		            $old_name2=$_POST['OLD_CANDIDAT_CV'];
					
					if($old_name2!=$name2 && $name2!="")
					{
							$tmp_name2=$_FILES['CANDIDAT_CV']['tmp_name']; 
		
							$name2=$_FILES['CANDIDAT_CV']['name']; 
							
							$ext_st2=pathinfo($name2);
							$extension2=$ext_st2['extension'];
							
							$size2=$_FILES['CANDIDAT_CV']['size']; 
							$type2=$_FILES['CANDIDAT_CV']['type']; 
							$erreur2=$_FILES['CANDIDAT_CV']['error'];
							
							//----- creation chemin avec variable globales --------------------/
							
								$uploadpath1=CV_DIR; 
								$path_filename2=$uploadpath1.$name2;
								$path_source2=$tmp_name2;
							
							//--------------------  tableau des extensions exclus  ------------------------------//
							
							 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
							 $candidat_cv="";
							
							 if(in_array($extension2,$extensions_permis))
							 {
								if(move_uploaded_file($path_source2,$path_filename2)==true)
								{
								   $candidat_cv=$name2;
								}
								
							 }
					}
					else
					{
						$candidat_cv=$old_name2;
					}
					  
					
					//------ recuperation de  id du candidat -----------------//
						 
						 $obj_candidat=new Candidat_class();
						 $fk_util_id=$_POST['id_user'];
						 
						 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
						 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
							 
						 $Tab_param=array(
											  'CANDIDAT_DEMANDE_EMPLOI'=>$candidat_demande,
											  'CANDIDAT_CV'=>$candidat_cv,
											  'CANDIDAT_CERTIFICAT_TRAVAIL'=>"",
											  'CANDIDAT_ACTE_NAISS'=>"",
											  'CANDIDAT_FICHE_FAMILLE'=>"",
											  'CANDIDAT_CERTIF_NAT'=>"",
											  'CANDIDAT_CERTIF_DOMICILE'=>"",
											  'CANDIDAT_CERTIF_MEDICAL'=>"",
											  'CANDIDAT_CASIER_JUDICIAIRE'=>"",
											  'CANDIDAT_ID'=>$candidat_id,
											  'FK_UTIL_ID'=>$fk_util_id
										 );	   
				   
			   }
					
				$obj_candidat=new Candidat_class();
				$Cnn=$obj_candidat->ma_connexion();
				
				
		 //------ enregistrer et suivant ----//
		 
			 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
			   
			 $cmd_suivant=$_POST["enregistrer_continue"];
		     $current_etape=11;
		   
		     $tab_redire=$obj_candidat->current_etape();
		     $next_etape=$tab_redire[$current_etape+1];
		 
			 if($cmd_suivant=="Enregistrer et Continuer")
			 {
				$current_path=HOME.$obj_candidat->param_encode($next_etape.'&annonce_id='.$fk_annonce_id);
			 }
			 else
			 {
				$current_path=HOME.$obj_candidat->param_encode('form_piece_joint&annonce_id='.$fk_annonce_id); 
			 }
	       //--------------//
				 
				 
	    $Cnn->beginTransaction();	 
		
		try
		{		 		
			if($obj_candidat->update_candidat($Tab_param,$Cnn)==true)
			{
				$Cnn->commit();
				//$message="pieces jointes enregistré avec succès!";
				//$obj_candidat->message_box($message);
				$obj_candidat->redirige($current_path);
				
			}
			else
			{
				$Cnn->rollback();
				$message="pieces jointes non enregistré !";
				$obj_candidat->message_box($message);
				$obj_candidat->redirige(HOME.$obj_candidat->param_encode('form_piece_joint')."&annonce_id=".$fk_annonce_id);
			}
		}
		catch(Exxeption $e)
		{
			 $Cnn->rollback();
			 $message="pieces jointes non enregistré !";
			 $obj_candidat->message_box($message);
			 $obj_candidat->redirige(HOME.$obj_candidat->param_encode('form_piece_joint')."&annonce_id=".$fk_annonce_id);
		}
		
		
		
	}
	
	/***********************update info candidat apres postulation**************/
	
	function controler_update_info_candidat()
	{
		     $Objcl=new Candidat_class();
			 $obj_famille=new Famille_class();
			
			//-----------------------------------------------------------------//
			 $old_photo=$_POST["OLD_PHOTO"];
			 $name=$_FILES['CANDIDAT_PHOTO']['name']; 
			 $photo="";
			  
			if($old_photo!=$name && $name!="")
			{
					$tmp_name=$_FILES['CANDIDAT_PHOTO']['tmp_name']; 
					$name=$_FILES['CANDIDAT_PHOTO']['name']; 
					$ext_st=pathinfo($name);
					$extension=$ext_st['extension'];
					$size=$_FILES['CANDIDAT_PHOTO']['size']; 
					$type=$_FILES['CANDIDAT_PHOTO']['type']; 
					$erreur=$_FILES['CANDIDAT_PHOTO']['error'];
				
				//----- creation chemin avec variable globales --------------------/
					$uploadpath=PHOTO_DIR; 
					$path_filename=$uploadpath.$name;
					$path_source=$tmp_name;
			    //--------------------  tableau des extensions exclus  ------------------------------//
					 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg');
					 $nom_sans_ext=substr($name,0,-4);
					 $photo="avatar.png";
					 
					 if(in_array($extension,$extensions_permis))
					 {
						if(move_uploaded_file($path_source,$path_filename)==true)
						{
						   $photo=$name;
						}
					 }
			}
			else
			{
				$photo=$old_photo;
			}
		
		
			 $Tab_famille="";
			 if(isset($_POST['CANDIDAT_TYPE']) && $_POST['CANDIDAT_TYPE']=="Interne")
			 {
				 $matricule=@$_POST['CANDIDAT_MATRICULE']; 
			 }
			 else
			 {
				 $matricule="";
			 }
			 
			//-----------------------------------------------------------------//
			
			$candidat_is_famille=$_POST['CANDIDAT_IS_FAMILLE'];
			$fk_candidat_id=$_POST['CANDIDAT_ID'];
			$fk_annonce_id=$_POST['FK_ANNONCE_ID'];
			
			$date_naiss=$_POST['CANDIDAT_DATE_NAISSANCE'];
		   
		   ($Objcl->La_date_est_fr($date_naiss)==true) ? $date_naiss=$Objcl->datefr2en($date_naiss): $date_naiss;
			
			$Tab_param=array(
				'CANDIDAT_ID'=>$fk_candidat_id,
				'CANDIDAT_TYPE'=>$_POST['CANDIDAT_TYPE'],
				'CANDIDAT_CIVILITE'=>$_POST['CANDIDAT_CIVILITE'],
				'CANDIDAT_NOM'=>$_POST['CANDIDAT_NOM'],
				'CANDIDAT_PRENOM'=>$_POST['CANDIDAT_PRENOM'],
				'CANDIDAT_MATRICULE'=>$matricule,
				'CANDIDAT_DATE_NAISSANCE'=>$date_naiss,
				'CANDIDAT_LIEU_NAISSANCE'=>$_POST['CANDIDAT_LIEU_NAISSANCE'],
				'CANDIDAT_NATIONALITE'=>$_POST['CANDIDAT_NATIONALITE'],
				'CANDIDAT_SIT_MAT'=>$_POST['CANDIDAT_SIT_MAT'],
				'CANDIDAT_NBRE_ENF'=>$_POST['CANDIDAT_NBRE_ENF'],
				'CANDIDAT_ADR_PERM'=>$_POST['CANDIDAT_ADR_PERM'],
				'CANDIDAT_ADR_ACT'=>$_POST['CANDIDAT_ADR_ACT'],
				'CANDIDAT_INDICATIF'=>$_POST['CANDIDAT_INDICATIF'],
				'CANDIDAT_NUM_TEL'=>$_POST['CANDIDAT_NUM_TEL'],
				'CANDIDAT_NUM_GSM'=>$_POST['CANDIDAT_NUM_GSM'],
				'CANDIDAT_PERMIS'=>$_POST['CANDIDAT_PERMIS'],
				'CANDIDAT_PHOTO'=>$photo,
				'CANDIDAT_IS_FAMILLE'=>$candidat_is_famille,
				'FK_UTIL_ID'=>$_POST['FK_UTIL_ID']);

				$Cnn=$Objcl->ma_connexion();
				$mess=0;
		        $current_path=HOME.$Objcl->param_encode('form_coord_personnelles&annonce_id='.$fk_annonce_id); 
		  
			$Cnn->beginTransaction();
			
			try
			{
			
				if($Objcl->modifier_enreg_candidat($Tab_param,$Cnn)==true)
				{
					$Cnn->commit();
					$Objcl->redirige($current_path);
				}
				else
				{
					$Cnn->rollback();
					$message="candidat non modifié!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('form_coord_personnelles&annonce_id='.$fk_annonce_id));
				}
			}
			catch(Exception $e )
			{
				    $Cnn->rollback();
					$message="candidat non modifié!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('form_coord_personnelles&annonce_id='.$fk_annonce_id));
			}  
		
	}
	
	

}

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------
@$joker=trim($_REQUEST["joker"]);
$Obj=new Candidat_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	case 4:{$Obj->controler_upload_doc();break;}
	case 5:{$Obj->controler_modif_upload_doc();break;}
	
	case 6:{$Obj->controler_update_info_candidat();break;}
	
	
	}

?>