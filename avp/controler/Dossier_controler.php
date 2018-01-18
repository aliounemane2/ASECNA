<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Dossier_controler extends Dossier_class{

	//Controleur ajout
	function controler_ajout()
	{
	   
	    /******  traitement demande uploder**********/
		 $Objcl=new Candidat_class();
		 $Objcl_dossier=new Dossier_class();
		 $Cnn=$Objcl->ma_connexion();
		 
		 $fk_util_id=$_POST['id_user'];
		 
		 $lister_candidat=$Objcl->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$Objcl->GetCh_CANDIDAT_ID()];
		 
		 $type=@$_POST["type_candidat"];
		 
		 $recu1=false;
		 $recu2=false;
		 $recu3=true;
		 $recu4=true;
		 $recu5=true;
		 $recu6=true;
		 $recu7=true;
		 $recu8=true;
		 $recu9=false;
		 
		  
		 if($type=="Externe")
		 {
			
					$tmp_name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['tmp_name']; 
					$name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['name']; 
					
					$ext_st1=pathinfo($name1);
					$extension1=$ext_st1['extension'];
					
					$size1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['size']; 
					$type1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['type']; 
					$erreur1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['error'];
					
					//* creation chemin avec variable globales ****/
					
					 $uploadpath1=DEMANDE_EMPL_DIR; 
					 $path_filename1=$uploadpath1.$name1;
					 $path_source1=$tmp_name1;
					
					//****  tableau des extensions exclus  ******//
					
					$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
					$candidat_demande="";
					
					 if(in_array($extension1,$extensions_permis))
					 {
						if(move_uploaded_file($path_source1,$path_filename1)==true)
						{
							//$candidat_demande=$path_filename1;
						}
						
					 }
					 
					 $type_doss="Demande_emploi";
					 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
					 $nom_doss=$type_doss;
					 $nom_link=$type_doss.$increment_doss.".".$extension1;
					 
					 @rename($path_filename1,$uploadpath1.$nom_link);
					
					 
					
					 $nom_candidat_demande=substr($name1,0,-4);
					 
					 $Tab_demande_empl=array(
												'DOSSIER_NOM'=>$nom_doss,
												'DOSSIER_LIEN'=>$nom_link,
												'FK_CANDIDAT_ID'=>$candidat_id,
												'Type_doss'=>"Demande_emploi"
										   );
										   
					 $recu1=$Objcl_dossier->ajouter_enreg_dossier($Tab_demande_empl,$Cnn);
					 
					 
					  /******  traitement cv uploder**********/
					
					$tmp_name2=$_FILES['CANDIDAT_CV']['tmp_name']; 
					$name2=$_FILES['CANDIDAT_CV']['name']; 
					
					$ext_st2=pathinfo($name2);
					$extension2=$ext_st2['extension'];
					
					$size2=$_FILES['CANDIDAT_CV']['size']; 
					$type2=$_FILES['CANDIDAT_CV']['type']; 
					$erreur2=$_FILES['CANDIDAT_CV']['error'];
					
					//*** creation chemin avec variable globales ****//
					
						$uploadpath2=CV_DIR; 
						$path_filename2=$uploadpath2.$name2;
						$path_source2=$tmp_name2;
					
					//****  tableau des extensions exclus  ******//
					
					$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
					$candidat_cv="";
					
					 if(in_array($extension2,$extensions_permis))
					 {
						if(move_uploaded_file($path_source2,$path_filename2)==true)
						{
						   //$candidat_cv=$path_filename2;
						}
						
					 }
					 
					//*********************************************************// 
					
						 $type_doss="Cv";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension2;
						 
						 @rename($path_filename2,$uploadpath2.$nom_link);
					 
					//***********************************************************// 
					 
					 
					 $nom_candidat_cv=substr($name2,0,-4);
					 
					 $Tab_cv=array(
										'DOSSIER_NOM'=>$nom_doss,
										'DOSSIER_LIEN'=>$nom_link,
										'FK_CANDIDAT_ID'=>$candidat_id,
										'Type_doss'=>"Cv"
									);
									
					 $recu2=$Objcl_dossier->ajouter_enreg_dossier($Tab_cv,$Cnn);
					 
					 
					/******  traitement CANDIDAT_ACTE_NAISS  iploder**********/
					
				
				if(isset($_FILES['CANDIDAT_ACTE_NAISS']))
				{
					$tmp_name4=$_FILES['CANDIDAT_ACTE_NAISS']['tmp_name']; 
					$name4=$_FILES['CANDIDAT_ACTE_NAISS']['name']; 
					
					$ext_st4=pathinfo($name4);
					$extension4=$ext_st4['extension'];
					
					$size4=$_FILES['CANDIDAT_ACTE_NAISS']['size']; 
					$type4=$_FILES['CANDIDAT_ACTE_NAISS']['type']; 
					$erreur4=$_FILES['CANDIDAT_ACTE_NAISS']['error'];
					
					//* creation chemin avec variable globales ****/
					   
						$uploadpath4=ACT_NAISS_DIR; 
						$path_filename4=$uploadpath4.$name4;
						$path_source4=$tmp_name4;
					
					//****  tableau des extensions exclus  ******//
					
					$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
					$acte_de_naissance="";
					
					 if(in_array($extension4,$extensions_permis))
					 {
						if(move_uploaded_file($path_source4,$path_filename4)==true)
						{
							//$acte_de_naissance=$name4;
						}
						
					 }
					 
					 //*********************************************************// 
					
						 $type_doss="Act_naiss";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension4;
						 
						 @rename($path_filename4,$uploadpath4.$nom_link);
						  
					//***********************************************************//
					
					 $nom_candidat_cv=substr($name4,0,-4);
					 
					 $Tab_Act_naiss=array(
										'DOSSIER_NOM'=>$nom_doss,
										'DOSSIER_LIEN'=>$nom_link,
										'FK_CANDIDAT_ID'=>$candidat_id,
										'Type_doss'=>"Act_naiss"
									);
					 $recu3=$Objcl_dossier->ajouter_enreg_dossier($Tab_Act_naiss,$Cnn);
				}
				
					 
				/******  traitement CANDIDAT_CERTIFICAT_TRAVAIL  iploder**********/
							
				if(isset($_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']))
				{
							$tmp_name3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['tmp_name']; 
							$name3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['name']; 
							
							$ext_st3=pathinfo($name3);
							$extension3=$ext_st3['extension'];
							
							$size3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['size']; 
							$type3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['type']; 
							$erreur3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['error'];
							
							//* creation chemin avec variable globales ****/
							   
								
								$uploadpath3=CERTIF_TRAV_DIR; 
								$path_filename3=$uploadpath3.$name3;
								$path_source3=$tmp_name3;
							
							//****  tableau des extensions exclus  ******//
							
								$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
								$certificat_de_travail="";
		
								
								 if(in_array($extension3,$extensions_permis))
								 {
									if(move_uploaded_file($path_source3,$path_filename3)==true)
									{
									   //$certificat_de_travail=$name3;
									}
									
								 }
							//*********************************************************// 
						
							 $type_doss="Cert_trav";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension3;
							 
							 @rename($path_filename3,$uploadpath3.$nom_link);
						 
						  //***********************************************************//
							
							 $nom_certificat_de_travail=substr($name3,0,-4);
					 
							 $Tab_Cert_trav=array(
												'DOSSIER_NOM'=>$nom_doss,
												'DOSSIER_LIEN'=>$nom_link,
												'FK_CANDIDAT_ID'=>$candidat_id,
												'Type_doss'=>"Cert_trav"
											);
											
							 $recu4=$Objcl_dossier->ajouter_enreg_dossier($Tab_Cert_trav,$Cnn);
							 
				}
				
							 
				/******  traitement CANDIDAT_CERTIF_NAT  iploder**********/
				
				if(isset($_FILES['CANDIDAT_CERTIF_NAT']))
				{			
								@$tmp_name5=$_FILES['CANDIDAT_CERTIF_NAT']['tmp_name']; 
								@$name5=$_FILES['CANDIDAT_CERTIF_NAT']['name']; 
								
								@$ext_st5=pathinfo($name5);
								@$extension5=$ext_st5['extension'];
								
								@$size5=$_FILES['CANDIDAT_CERTIF_NAT']['size']; 
								@$type5=$_FILES['CANDIDAT_CERTIF_NAT']['type']; 
								@$erreur5=$_FILES['CANDIDAT_CERTIF_NAT']['error'];
							
							//* creation chemin avec variable globales ****/
							   
								
								$uploadpath5=CERTIF_NATIONAL_DIR; 
								$path_filename5=$uploadpath5.$name5;
								$path_source5=$tmp_name5;
							
								 //****  tableau des extensions exclus  ******//
							
								$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
								$certificat_nationalite="";
								
								 if(in_array($extension5,$extensions_permis))
								 {
									if(move_uploaded_file($path_source5,$path_filename5)==true)
									{
									   //$certificat_nationalite=$name5;
									}
									
								 }
								
							//*********************************************************// 
						
							 $type_doss="Cert_nat";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension5;
							 
							 @rename($path_filename5,$uploadpath5.$nom_link);
						 
						  //***********************************************************// 
						  
							 $nom_certificat_nationalite=substr($name5,0,-4);
					 
							 $Tab_certificat_nationalite=array(
																'DOSSIER_NOM'=>$nom_doss,
																'DOSSIER_LIEN'=>$nom_link,
																'FK_CANDIDAT_ID'=>$candidat_id,
																'Type_doss'=>"Cert_nat"
															 );
							 $recu4=$Objcl_dossier->ajouter_enreg_dossier($Tab_certificat_nationalite,$Cnn); 
							 
							/******  traitement CANDIDAT_CERTIF_DOMICILE  iploder**********/
							
								@$tmp_name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['tmp_name']; 
								@$name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['name']; 
								
								@$ext_st6=pathinfo($name6);
								@$extension6=$ext_st6['extension'];
								
								@$size6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['size']; 
								@$type6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['type']; 
								@$erreur6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['error'];
								
							//* creation chemin avec variable globales ****/
								
								 
								$uploadpath6=CERTIF_DOM_DIR; 
								$path_filename6=$uploadpath6.$name6;
								$path_source6=$tmp_name6;
							
							//****  tableau des extensions exclus  ******//
							
								 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
								 $certificat_domicile="";
								
								 if(in_array($extension6,$extensions_permis))
								 {
									if(move_uploaded_file($path_source6,$path_filename6)==true)
									{
									  //$certificat_domicile=$name6;
									}
									
								 } 
							 
							 //*********************************************************// 
						
								 $type_doss="Cert_dom";
								 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
								 $nom_doss=$type_doss;
								 $nom_link=$type_doss.$increment_doss.".".$extension6;
								 
								 @rename($path_filename6,$uploadpath6.$nom_link);
						 
							 //***********************************************************// 
							 
								$nom_certificat_domicile=substr($name6,0,-4);
					 
								$Tab_certificat_domicile=array(
																'DOSSIER_NOM'=>$nom_doss,
																'DOSSIER_LIEN'=>$nom_link,
																'FK_CANDIDAT_ID'=>$candidat_id,
																'Type_doss'=>"Cert_dom"
															  );
															  
								$recu5=$Objcl_dossier->ajouter_enreg_dossier($Tab_certificat_domicile,$Cnn); 
				}
				
				/******  traitement CANDIDAT_CERTIF_MEDICAL  iploder**********/
				if(isset($_FILES['CANDIDAT_CERTIF_MEDICAL']))
				{			 
							
							
								@$tmp_name7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['tmp_name']; 
								@$name7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['name']; 
								
								@$ext_st7=pathinfo($name7);
								@$extension7=$ext_st7['extension'];
								
								@$size7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['size']; 
								@$type7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['type']; 
								@$erreur7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['error'];
							
							//* creation chemin avec variable globales ****/
							   
								
								$uploadpath7=CERTIF_MEDIC_DIR; 
								$path_filename7=$uploadpath7.$name7;
								$path_source7=$tmp_name7;
							
							//****  tableau des extensions exclus  ******//
							
								 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
								
				
								 $certificat_medical="";
								
								 if(in_array($extension7,$extensions_permis))
								 {
									if(move_uploaded_file($path_source7,$path_filename7)==true)
									{
									   //$certificat_medical=$name7;
									}
									
								 }  
							 
							 //*********************************************************// 
						
									 $type_doss="Cert_med";
									 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
									 $nom_doss=$type_doss;
									 $nom_link=$type_doss.$increment_doss.".".$extension7;
									 
									 @rename($path_filename7,$uploadpath7.$nom_link);
						 
							 //***********************************************************// 
							 
								  $nom_certificat_medical=substr($name7,0,-4);
					 
								  $Tab_certificat_medical=array(
																'DOSSIER_NOM'=>$nom_doss,
																'DOSSIER_LIEN'=>$nom_link,
																'FK_CANDIDAT_ID'=>$candidat_id,
																'Type_doss'=>"Cert_med"
																);
																
								  $recu6=$Objcl_dossier->ajouter_enreg_dossier($Tab_certificat_medical,$Cnn);
				 }
				  
								  
				/******  traitement CANDIDAT_CASIER_JUDICIAIRE  uploder********************************/
							
				 if(isset($_FILES['CANDIDAT_CASIER_JUDICIAIRE']))
				 {
					 	
								@$tmp_name8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['tmp_name']; 
								@$name8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['name']; 
								
								@$ext_st8=pathinfo($name8);
								@$extension8=$ext_st8['extension'];
								
								@$size8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['size']; 
								@$type8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['type']; 
								@$erreur8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['error'];
								
								//* creation chemin avec variable globales ****/
								
									
									$uploadpath8=CASIER_JUD_DIR; 
									$path_filename8=$uploadpath8.$name8;
									$path_source8=$tmp_name8;
								
								//****  tableau des extensions exclus  ******//
								
								$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
								
								 $casier_judiciaire="";
								
								 if(in_array($extension8,$extensions_permis))
								 {
									if(move_uploaded_file($path_source8,$path_filename8)==true)
									{
									   //$casier_judiciaire=$name8;
									}
									
								 }
								 
							   //*********************************************************// 
						
									 $type_doss="Casier_jud";
									 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
									 $nom_doss=$type_doss;
									 $nom_link=$type_doss.$increment_doss.".".$extension8;
									 
									 @rename($path_filename8,$uploadpath8.$nom_link);
						 
							 //***********************************************************// 
								  $nom_casier_judiciaire=substr($name8,0,-4);
					 
								  $Tab_casier_judiciaire=array(
																'DOSSIER_NOM'=>$nom_doss,
																'DOSSIER_LIEN'=>$nom_link,
																'FK_CANDIDAT_ID'=>$candidat_id,
																'Type_doss'=>"Casier_jud"
															  );
											
								  $recu7=$Objcl_dossier->ajouter_enreg_dossier($Tab_casier_judiciaire,$Cnn);
				 }
				 
				/******  traitement CANDIDAT_FICHE_FAMILLE  uploder**********/
				
				if(isset($_FILES['CANDIDAT_FICHE_FAMILLE']))
				{			
								$tmp_name9=$_FILES['CANDIDAT_FICHE_FAMILLE']['tmp_name']; 
								$name9=$_FILES['CANDIDAT_FICHE_FAMILLE']['name']; 
								
								$ext_st9=pathinfo($name9);
								$extension9=$ext_st9['extension'];
								
								$size9=$_FILES['CANDIDAT_FICHE_FAMILLE']['size']; 
								$type9=$_FILES['CANDIDAT_FICHE_FAMILLE']['type']; 
								$erreur9=$_FILES['CANDIDAT_FICHE_FAMILLE']['error'];
								
								//* creation chemin avec variable globales ****/
								
									$uploadpath9=FICHE_FAMIL_DIR; 
									$path_filename9=$uploadpath9.$name9;
									$path_source9=$tmp_name9;
								
								//****  tableau des extensions exclus  ******//
								
								$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
								$fiche_famille="";
								
								 if(in_array($extension9,$extensions_permis))
								 {
									if(move_uploaded_file($path_source9,$path_filename9)==true)
									{
									   //$fiche_famille=$name9;
									}
								 }
								 
							   //*********************************************************// 
						
									 $type_doss="Fiche_fam";
									 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
									 $nom_doss=$type_doss;
									 $nom_link=$type_doss.$increment_doss.".".$extension9;
									 
									 @rename($path_filename9,$uploadpath9.$nom_link);
						 
							 //***********************************************************// 
								
								  $nom_fiche_famille=substr($name9,0,-4);
					 
								  $Tab_fiche_famille=array(
												'DOSSIER_NOM'=>$nom_doss,
												'DOSSIER_LIEN'=>$nom_link,
												'FK_CANDIDAT_ID'=>$candidat_id,
												'Type_doss'=>"Fiche_fam"
											);
								  $recu8=$Objcl_dossier->ajouter_enreg_dossier($Tab_fiche_famille,$Cnn); 
				}
				
				//********************** enregistrement validation *****************************//
				
				
						
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
												 
							 $recu9=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
						 
					
						 
				 //********************** enregistrer et suivant ***************************//
					
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
				   //************************************************************//		 
						
								$Cnn->beginTransaction();	 
							
								try
								{		 		
									if($recu1==true && $recu2==true && $recu3==true && $recu4==true && $recu5==true && $recu6==true && $recu7==true && $recu8==true && $recu9=true)
									{
										$Cnn->commit();
										$Objcl->redirige($current_path);
									}
									else
									{
										$Cnn->rollback();
										$message="pieces jointes non enregistré !";
										$Objcl->message_box($message);
										$Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint')."&annonce_id=".$fk_annonce_id);
									}
								}
								catch(Exception $e)
								{
									 $Cnn->rollback();
									 $message="pieces jointes non enregistré !";
									 $Objcl->message_box($message);
									 $Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint')."&annonce_id=".$fk_annonce_id);
								}
						
						//----------------------------------------//					   
						
							
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
					
					//* creation chemin avec variable globales ****/
					
					 $uploadpath1=DEMANDE_EMPL_DIR; 
					 $path_filename1=$uploadpath1.$name1;
					 $path_source1=$tmp_name1;
					
					//****  tableau des extensions exclus  ******//
					
					$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
					$candidat_demande="";
					
					 if(in_array($extension1,$extensions_permis))
					 {
						if(move_uploaded_file($path_source1,$path_filename1)==true)
						{
						   //$candidat_demande=$name1;
						}
						
					 }
					 
				 //*********************************************************// 
						 $type_doss="Demande_emploi";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension1;
						 @rename($path_filename1,$uploadpath1.$nom_link);
			 
				 //***********************************************************// 

				  $nom_candidat_demande=substr($name1,0,-4);
				  $Tab_candidat_demande=array(
								'DOSSIER_NOM'=>$nom_doss,
								'DOSSIER_LIEN'=>$nom_link,
								'FK_CANDIDAT_ID'=>$candidat_id,
								'Type_doss'=>"Demande_emploi"
							);
				  $recu1=$Objcl_dossier->ajouter_enreg_dossier($Tab_candidat_demande,$Cnn); 
				  
			   /****** traitement cv uploder**********/
					
					$tmp_name2=$_FILES['CANDIDAT_CV']['tmp_name']; 
					$name2=$_FILES['CANDIDAT_CV']['name']; 
					
					$ext_st2=pathinfo($name2);
					$extension2=$ext_st2['extension'];
					
					$size2=$_FILES['CANDIDAT_CV']['size']; 
					$type2=$_FILES['CANDIDAT_CV']['type']; 
					$erreur2=$_FILES['CANDIDAT_CV']['error'];
					
					//* creation chemin avec variable globales ****/
					
						$uploadpath2=CV_DIR; 
						$path_filename2=$uploadpath2.$name2;
						$path_source2=$tmp_name2;
					
					//****  tableau des extensions exclus  ******//
					
					 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
					 $candidat_cv="";
					
					 if(in_array($extension2,$extensions_permis))
					 {
						if(move_uploaded_file($path_source2,$path_filename2)==true)
						{
						   //$candidat_cv=$name2;
						}
						
					 }
					  //*********************************************************// 
				
							 $type_doss="Cv";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension2;
							 
							 @rename($path_filename2,$uploadpath2.$nom_link);
				 
				     //***********************************************************// 
					
					  $nom_candidat_cv=substr($name2,0,-4);
			 
					  $Tab_candidat_cv=array(
									'DOSSIER_NOM'=>$nom_doss,
									'DOSSIER_LIEN'=>$nom_link,
									'FK_CANDIDAT_ID'=>$candidat_id,
								    'Type_doss'=>"Cv"
								);
					  $recu2=$Objcl_dossier->ajouter_enreg_dossier($Tab_candidat_cv,$Cnn); 
					  
				
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
										 
		             $recu10=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
				 
					//*****************************************************************************//	 
					
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
	       //************************************************************//		 
				
					$Cnn->beginTransaction();	 
				
					try
					{		 		
						if($recu1==true && $recu2==true && $recu10=true)
						{
							$Cnn->commit();
							$Objcl->redirige($current_path);
						}
						else
						{
							$Cnn->rollback();
							$message="pieces jointes non enregistré !";
							$Objcl->message_box($message);
							$Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint')."&annonce_id=".$fk_annonce_id);
						}
					}
					catch(Exception $e)
					{
						 $Cnn->rollback();
						 $message="pieces jointes non enregistré !";
						 $obj_candidat->message_box($message);
						 $obj_candidat->redirige(HOME.$obj_candidat->param_encode('form_piece_joint')."&annonce_id=".$fk_annonce_id);
					}	
			   }
	}

	//Controleur modifier
	function controler_modifier()
	{
	
		 /******  traitement demande uploder**********/
		 $Objcl=new Candidat_class();
		
		 $Objcl_dossier=new Dossier_class();
		 $Cnn=$Objcl->ma_connexion();
		 
		 $fk_util_id=$_POST['id_user'];
		 
		 $lister_candidat=$Objcl->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$Objcl->GetCh_CANDIDAT_ID()];
		 
		 
		 
		 $type=@$_POST["type_candidat"];
		 $dossier_id=$_POST["DOSSIER_ID"];
		 
		 $recu1=false;
		 $recu2=false;
		 $recu3=true;
		 $recu4=true;
		 $recu5=true;
		 $recu6=true;
		 $recu7=true;
		 $recu8=true;
		 $recu9=false;
		 
		 
		 
		 
		 if($type=="Externe")
		 {
               $name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['name'];
		       $old_name1=$_POST['OLD_CANDIDAT_DEMANDE_EMPLOI'];
			   $id1=$_POST['ID_CANDIDAT_DEMANDE_EMPLOI'];
			 
			   if($old_name1!=$name1 && $name1!="")
			   {
					$tmp_name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['tmp_name']; 
					$name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['name']; 
					
					$ext_st1=pathinfo($name1);
					$extension1=$ext_st1['extension'];
					
					$size1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['size']; 
					$type1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['type']; 
					$erreur1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['error'];
				
					//* creation chemin avec variable globales ****/
					
					
					 $uploadpath1=DEMANDE_EMPL_DIR; 
					 $path_filename1=$uploadpath1.$name1;
					 $path_source1=$tmp_name1;
				
				   //****  tableau des extensions exclus  ******//
				
						$extensions_permis= array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						
						$candidat_demande="";
						
						 if(in_array($extension1,$extensions_permis))
						 {
							if(move_uploaded_file($path_source1,$path_filename1)==true)
							{
							   //$candidat_demande=$name1;
							}
						 }
						 
						//*********************************************************// 
			
						 $type_doss="Demande_emploi";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension1;
						 
						 @rename($path_filename1,$uploadpath1.$nom_link);
						 
			 
				       //***********************************************************//  
					  
						 
			   }
			   else
			   {
				    $type_doss="Demande_emploi";
				    $nom_doss=$type_doss;
					$nom_link=$old_name1;
			   }
			   
			   
			    
						 
				 $nom_candidat_demande=substr($name1,0,-4);
	 
				 $Tab_candidat_demande=array(
												'DOSSIER_NOM'=>$nom_doss,
												'DOSSIER_LIEN'=>$nom_link,
												'DOSSIER_ID'=>$id1,
								                'Type_doss'=>"Demande_emploi"
											);
				
											
				 $recu1=$Objcl_dossier->modifier_enreg_dossier($Tab_candidat_demande,$Cnn);
			   
			  /******  traitement cv uploder**********/
			
			   $name2=$_FILES['CANDIDAT_CV']['name'];
		       $old_name2=$_POST['OLD_CANDIDAT_CV'];
			   $id2=$_POST['ID_CANDIDAT_CV'];
			   
			   if($old_name2!=$name2 && $name2!="")
			   {
					$tmp_name2=$_FILES['CANDIDAT_CV']['tmp_name']; 
					$name2=$_FILES['CANDIDAT_CV']['name']; 
					
					$ext_st2=pathinfo($name2);
					$extension2=$ext_st2['extension'];
					
					$size2=$_FILES['CANDIDAT_CV']['size']; 
					$type2=$_FILES['CANDIDAT_CV']['type']; 
					$erreur2=$_FILES['CANDIDAT_CV']['error'];
			
				    //* creation chemin avec variable globales ****//
				    
			          
					$uploadpath2=CV_DIR; 
					$path_filename2=$uploadpath2.$name2;
					$path_source2=$tmp_name2;
				
		            //****  tableau des extensions exclus  ******//
			
					  $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
					  $candidat_cv="";
				
					 if(in_array($extension2,$extensions_permis))
					 {
						if(move_uploaded_file($path_source2,$path_filename2)==true)
						{
						   //$candidat_cv=$name2;
						}
						
					 }
					 
			         //*********************************************************// 
			
						 $type_doss="Cv";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension2;
						 
						 @rename($path_filename2,$uploadpath2.$nom_link);
						 
			 
				       //***********************************************************//  
					  
						 
			   }
			   else
			   {
				    //$candidat_demande=$old_name1;
				    $type_doss="Cv";
				    $nom_doss=$type_doss;
					$nom_link=$old_name2;
			   }
			   
			 
			  
			     $nom_candidat_cv=substr($name2,0,-4);
	 
				 $Tab_candidat_cv=array(
											'DOSSIER_NOM'=>$nom_doss,
											'DOSSIER_LIEN'=>$nom_link,
											'DOSSIER_ID'=>$id2,
											'Type_doss'=>"Cv"
										);
				 $recu2=$Objcl_dossier->modifier_enreg_dossier($Tab_candidat_cv,$Cnn);
				 
			/******  traitement CANDIDAT_ACTE_NAISS  iploder**********/
			
			if(isset($_POST['OLD_CANDIDAT_ACTE_NAISS']))
			{
				   $name4=$_FILES['CANDIDAT_ACTE_NAISS']['name'];
				   $old_name4=$_POST['OLD_CANDIDAT_ACTE_NAISS'];
				   $id4=$_POST['ID_CANDIDAT_ACTE_NAISS'];
				   
				   if($old_name4!=$name4 && $name4!="")
				   {
						$tmp_name4=$_FILES['CANDIDAT_ACTE_NAISS']['tmp_name']; 
						$name4=$_FILES['CANDIDAT_ACTE_NAISS']['name']; 
						
						$ext_st4=pathinfo($name4);
						$extension4=$ext_st4['extension'];
						
						$size4=$_FILES['CANDIDAT_ACTE_NAISS']['size']; 
						$type4=$_FILES['CANDIDAT_ACTE_NAISS']['type']; 
						$erreur4=$_FILES['CANDIDAT_ACTE_NAISS']['error'];
						
						//* creation chemin avec variable globales ****/
						  
							$uploadpath4=ACT_NAISS_DIR; 
							$path_filename4=$uploadpath4.$name4;
							$path_source4=$tmp_name4;
						
						//****  tableau des extensions exclus  ******//
							
							 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
							 $acte_de_naissance="";
						
							 if(in_array($extension4,$extensions_permis))
							 {
								if(move_uploaded_file($path_source4,$path_filename4)==true)
								{
								   //$acte_de_naissance=$name4;
								}
								
							 }
							 
						  //*********************************************************// 
				
							 $type_doss="Act_naiss";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension4;
							 
							 @rename($path_filename4,$uploadpath4.$nom_link);
							 
						   //***********************************************************//  
							 
				   }
				   else
				   {
							$type_doss="Act_naiss";
							$nom_doss=$type_doss;
							$nom_link=$old_name4;
							
				   }
				   
				
					 $nom_acte_de_naissance=substr($name4,0,-4);
		 
					 $Tab_acte_de_naissance=array(
													'DOSSIER_NOM'=>$nom_doss,
													'DOSSIER_LIEN'=>$nom_link,
													'DOSSIER_ID'=>$id4,
													'Type_doss'=>"Act_naiss"
												 );
												
					 $recu3=$Objcl_dossier->modifier_enreg_dossier($Tab_acte_de_naissance,$Cnn);
					 
			}
			
			/******  traitement CANDIDAT_CERTIFICAT_TRAVAIL  iploder**********/
			if(isset($_POST['OLD_CANDIDAT_CERTIFICAT_TRAVAIL']))
			{
				
				 $name3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['name'];
		         $old_name3=$_POST['OLD_CANDIDAT_CERTIFICAT_TRAVAIL'];
				 $id3=$_POST['OLD_CANDIDAT_CERTIFICAT_TRAVAIL'];
			   
			    if($old_name3!=$name3 && $name3!="")	
				{	
					$tmp_name3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['tmp_name']; 
					$name3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['name']; 
					
					$ext_st3=pathinfo($name3);
					$extension3=$ext_st3['extension'];
					
					$size3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['size']; 
					$type3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['type']; 
					$erreur3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['error'];
					
					//* creation chemin avec variable globales ****/
					   
						$uploadpath3=CERTIF_TRAV_DIR; 
						$path_filename3=$uploadpath3.$name3;
						$path_source3=$tmp_name3;
					
					//****  tableau des extensions exclus  ******//
					
						 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						 $certificat_de_travail="";
						
						 if(in_array($extension3,$extensions_permis))
						 {
							if(move_uploaded_file($path_source3,$path_filename3)==true)
							{
							   //$certificat_de_travail=$name3;
							}
							
						 }
						 
			           //*********************************************************// 
			
						 $type_doss="Cert_trav";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension3;
						 
						 @rename($path_filename3,$uploadpath3.$nom_link);
						 
				       //***********************************************************//  
					  	 
			   }
			   else
			   {
						$type_doss="Cert_trav";
						$nom_doss=$type_doss;
						$nom_link=$old_name3;
			   }
					 
					 
					  $nom_certificat_de_travail=substr($name3,0,-4);
	 
				      $Tab_certificat_de_travail=array(
														'DOSSIER_NOM'=>$nom_doss,
														'DOSSIER_LIEN'=>$nom_link,
														'DOSSIER_ID'=>$id3,
														'Type_doss'=>"Cert_trav"
											          );
				      $recu4=$Objcl_dossier->modifier_enreg_dossier($Tab_certificat_de_travail,$Cnn);
					  
			}
			
			
		  /******  traitement CANDIDAT_CERTIF_NAT  iploder**********/
			
			if(isset($_POST['OLD_CANDIDAT_CERTIF_NAT']))
			{		
				 $name5=$_FILES['CANDIDAT_CERTIF_NAT']['name'];
		         $old_name5=$_POST['OLD_CANDIDAT_CERTIF_NAT'];
				 $id5=$_POST['OLD_CANDIDAT_CERTIF_NAT'];
			   
			    if($old_name5!=$name5 && $name5!="")	
				{	
						$tmp_name5=$_FILES['CANDIDAT_CERTIF_NAT']['tmp_name']; 
						$name5=$_FILES['CANDIDAT_CERTIF_NAT']['name']; 
						
						$ext_st5=pathinfo($name5);
						$extension5=$ext_st5['extension'];
						
						$size5=$_FILES['CANDIDAT_CERTIF_NAT']['size']; 
						$type5=$_FILES['CANDIDAT_CERTIF_NAT']['type']; 
						$erreur5=$_FILES['CANDIDAT_CERTIF_NAT']['error'];
					
					//****** creation chemin avec variable globales ****//
					   
						$uploadpath5=CERTIF_NATIONAL_DIR; 
						$path_filename5=$uploadpath5.$name5;
						$path_source5=$tmp_name5;
					
					//****  tableau des extensions exclus  ******//
					
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						$certificat_nationalite="";
						
						 if(in_array($extension5,$extensions_permis))
						 {
							if(move_uploaded_file($path_source5,$path_filename5)==true)
							{
							   //$certificat_nationalite=$name5;
							}
							
						 }
						 
				      //*********************************************************// 
			
						 $type_doss="Cert_nat";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension5;
						 
						 @rename($path_filename5,$uploadpath5.$nom_link);
						 
				       //***********************************************************//  
					  	 
			   }
			   else
			   {
						$type_doss="Cert_nat";
						$nom_doss=$type_doss;
						$nom_link=$old_name5;
			   }
			   
				      $nom_certificat_nationalite=substr($name5,0,-4);
	 
				      $Tab_certificat_nationalite=array(
														'DOSSIER_NOM'=>$nom_doss,
														'DOSSIER_LIEN'=>$nom_link,
														'DOSSIER_ID'=>$id5,
														'Type_doss'=>"Cert_nat"
											           );
											
				      $recu5=$Objcl_dossier->modifier_enreg_dossier($Tab_certificat_nationalite,$Cnn);
			}
			
			/******  traitement CANDIDAT_CERTIF_DOMICILE  iploder**********/
			if(isset($_POST['OLD_CANDIDAT_CERTIF_DOMICILE']))
			{		
					$name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['name'];
		            $old_name6=$_POST['OLD_CANDIDAT_CERTIF_DOMICILE'];
					$id6=$_POST['OLD_CANDIDAT_CERTIF_DOMICILE'];
			   
					if($old_name6!=$name6 && $name6!="")
					{	
					
						$tmp_name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['tmp_name']; 
						$name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['name']; 
						
						$ext_st6=pathinfo($name6);
						$extension6=$ext_st6['extension'];
						
						$size6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['size']; 
						$type6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['type']; 
						$erreur6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['error'];
						
					//* creation chemin avec variable globales ****/
					  
						$uploadpath6=CERTIF_DOM_DIR; 
						$path_filename6=$uploadpath6.$name6;
						$path_source6=$tmp_name6;

					
					//****  tableau des extensions exclus  ******//
					
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						$certificat_domicile="";
						
						 if(in_array($extension6,$extensions_permis))
						 {
							if(move_uploaded_file($path_source6,$path_filename6)==true)
							{
							   //$certificat_domicile=$name6;
							}
							
						 } 
						 
					  //*********************************************************// 
			
						 $type_doss="Cert_dom";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension6;
						 
						 @rename($path_filename6,$uploadpath6.$nom_link);
						 
				       //***********************************************************//  
					  	 
			   }
			   else
			   {
						$type_doss="Cert_dom";
						$nom_doss=$type_doss;
						$nom_link=$old_name6;
			   }
					
					  $nom_certificat_domicile=substr($name6,0,-4);
	 
				      $Tab_certificat_domicile=array(
														'DOSSIER_NOM'=>$nom_doss,
														'DOSSIER_LIEN'=>$nom_link,
														'DOSSIER_ID'=>$id6,
														'Type_doss'=>"Cert_dom"
													);
				      $recu6=$Objcl_dossier->modifier_enreg_dossier($Tab_certificat_domicile,$Cnn);
			}
			
			
					/******  traitement CANDIDAT_CERTIF_MEDICAL  iploder**********/
			
			if(isset($_POST['OLD_CANDIDAT_CERTIF_DOMICILE']))
			{
					
					$name7=$_FILES['CANDIDAT_CERTIF_DOMICILE']['name'];
		            $old_name7=$_POST['OLD_CANDIDAT_CERTIF_DOMICILE'];
					$id7=$_POST['OLD_CANDIDAT_CERTIF_DOMICILE'];
			   
					if($old_name7!=$name7 && $name7!="")
					{
						$tmp_name7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['tmp_name']; 
						$name7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['name']; 
						
						$ext_st7=pathinfo($name7);
						$extension7=$ext_st7['extension'];
						
						$size7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['size']; 
						$type7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['type']; 
						$erreur7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['error'];
					
					//* creation chemin avec variable globales ****/
					  
						$uploadpath7=CERTIF_MEDIC_DIR; 
						$path_filename7=$uploadpath7.$name7;
						$path_source7=$tmp_name7;
					
					//****  tableau des extensions exclus  ******//
					
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						$certificat_medical="";
						
						 if(in_array($extension7,$extensions_permis))
						 {
							if(move_uploaded_file($path_source7,$path_filename7)==true)
							{
							   //$certificat_medical=$name7;
							}
						 } 
						 
					  //*********************************************************// 
			
						 $type_doss="Cert_med";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension7;
						 
						 @rename($path_filename7,$uploadpath7.$nom_link);
						 
				       //***********************************************************//  
					  	 
			   }
			   else
			   {
						$type_doss="Cert_med";
						$nom_doss=$type_doss;
						$nom_link=$old_name7;
			   }
					
					   $nom_certificat_medical=substr($name7,0,-4);
	 
				       $Tab_certificat_medical=array(
														'DOSSIER_NOM'=>$nom_doss,
														'DOSSIER_LIEN'=>$nom_link,
														'DOSSIER_ID'=>$id7,
														'Type_doss'=>"Cert_med"
											        );
											
				      $recu7=$Objcl_dossier->modifier_enreg_dossier($Tab_certificat_medical,$Cnn);
				
			}
			
				/******  traitement CANDIDAT_CASIER_JUDICIAIRE  uploder**********/
			
			if(isset($_POST['OLD_CANDIDAT_CASIER_JUDICIAIRE']))
			{
						
					$name8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['name'];
		            $old_name8=$_POST['OLD_CANDIDAT_CASIER_JUDICIAIRE'];
					$id8=$_POST['OLD_CANDIDAT_CASIER_JUDICIAIRE'];
			   
					if($old_name8!=$name8 && $name8!="")
					{
						$tmp_name8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['tmp_name']; 
						$name8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['name']; 
						
						$ext_st8=pathinfo($name8);
						$extension8=$ext_st8['extension'];
						
						$size8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['size']; 
						$type8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['type']; 
						$erreur8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['error'];
						
						//* creation chemin avec variable globales ****/
						
					 
							$uploadpath8=CASIER_JUD_DIR; 
							$path_filename8=$uploadpath8.$name8;
							$path_source8=$tmp_name8;
						
						//****  tableau des extensions exclus  ******//
						
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						$casier_judiciaire="";
						
						 if(in_array($extension8,$extensions_permis))
						 {
							if(move_uploaded_file($path_source8,$path_filename8)==true)
							{
							   //$casier_judiciaire=$name8;
							}
							
						 }
						 
					  //*********************************************************// 
			
						 $type_doss="Casier_jud";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension8;
						 
						 @rename($path_filename8,$uploadpath8.$nom_link);
						 
				       //***********************************************************//  
					  	 
			   }
			   else
			   {
						$type_doss="Casier_jud";
						$nom_doss=$type_doss;
						$nom_link=$old_name8;
			   }
					
					
					   $nom_casier_judiciaire=substr($name8,0,-4);
	 
				       $Tab_casier_judiciaire=array(
														'DOSSIER_NOM'=>$nom_doss,
														'DOSSIER_LIEN'=>$nom_link,
														'DOSSIER_ID'=>$id8,
														'Type_doss'=>"Casier_jud"
											       );
				       $recu8=$Objcl_dossier->modifier_enreg_dossier($Tab_casier_judiciaire,$Cnn);
			}
			
			
				 /******  traitement CANDIDAT_FICHE_FAMILLE  uploder**********/
			
			if(isset($_POST['OLD_CANDIDAT_FICHE_FAMILLE']))
			{		
					
					$name9=$_FILES['CANDIDAT_FICHE_FAMILLE']['name'];
		            $old_name9=$_POST['OLD_CANDIDAT_FICHE_FAMILLE'];
					$id9=$_POST['OLD_CANDIDAT_FICHE_FAMILLE'];
			   
					if($old_name9!=$name9 && $name9!="")
					{
						$tmp_name9=$_FILES['CANDIDAT_FICHE_FAMILLE']['tmp_name']; 
						$name9=$_FILES['CANDIDAT_FICHE_FAMILLE']['name']; 
						
						$ext_st9=pathinfo($name9);
						$extension9=$ext_st9['extension'];
						
						$size9=$_FILES['CANDIDAT_FICHE_FAMILLE']['size']; 
						$type9=$_FILES['CANDIDAT_FICHE_FAMILLE']['type']; 
						$erreur9=$_FILES['CANDIDAT_FICHE_FAMILLE']['error'];
						
						//* creation chemin avec variable globales ****/
						 
			                
							$uploadpath9=FICHE_FAMIL_DIR; 
							$path_filename9=$uploadpath9.$name9;
							$path_source9=$tmp_name9;
						
						//****  tableau des extensions exclus  ******//
						
							$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
							$fiche_famille="";
						
						 if(in_array($extension9,$extensions_permis))
						 {
							if(move_uploaded_file($path_source9,$path_filename9)==true)
							{
							   //$fiche_famille=$name9;
							}
							
						 }
						 //*********************************************************// 
				
							 $type_doss="Fiche_fam";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension9;
							 
							 @rename($path_filename9,$uploadpath9.$nom_link);
							 
						   //***********************************************************//  
			 
			   }
			   else
			   {
						$type_doss="Fiche_fam";
						$nom_doss=$type_doss;
						$nom_link=$old_name9;
			   }
						
					   $nom_fiche_famille=substr($name9,0,-4);
	 
				       $Tab_fiche_famille=array(
												'DOSSIER_NOM'=>$nom_doss,
												'DOSSIER_LIEN'=>$nom_link,
												'DOSSIER_ID'=>$id9,
								                'Type_doss'=>"Fiche_fam"
											   );
				     $recu9=$Objcl_dossier->modifier_enreg_dossier($Tab_fiche_famille,$Cnn);
			}
			
			
						//------ recuperation de  id du candidat -----------------//
					
					$fk_annonce_id=$_POST["FK_ANNONCE_ID"]; 
					  
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
	       //************************************************************//		 
				
					$Cnn->beginTransaction();	 
				
					try
					{		 		
						if($recu1==true && $recu2==true && $recu3==true && $recu4=true && $recu5=true && $recu6=true && $recu7=true && $recu8=true && $recu9=true)
						{
							$Cnn->commit();
							//$message="pieces jointes enregistré avec succès!";
							//$Objcl->message_box($message);
							$Objcl->redirige($current_path);
						}
						else
						{
							$Cnn->rollback();
							$message="pieces jointes non enregistré !";
							$Objcl->message_box($message);
							$Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint')."&annonce_id=".$fk_annonce_id);
						}
					}
					catch(Exception $e)
					{
						 $Cnn->rollback();
						 $message="pieces jointes non enregistré !";
						 $Objcl->message_box($message);
						 $Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint')."&annonce_id=".$fk_annonce_id);
					}
						 
	     }
		 else
		 {
				    $fk_annonce_id=$_POST["FK_ANNONCE_ID"]; 
				    $name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['name'];
		            $old_name1=$_POST['OLD_CANDIDAT_DEMANDE_EMPLOI'];
					$id1=$_POST['ID_CANDIDAT_DEMANDE_EMPLOI'];
					
					if($old_name1!=$name1 && $name1!="")
					{
						$tmp_name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['tmp_name']; 
						$name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['name']; 
						
						$ext_st1=pathinfo($name1);
						$extension1=$ext_st1['extension'];
						
						$size1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['size']; 
						$type1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['type']; 
						$erreur1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['error'];
						
						//* creation chemin avec variable globales ****/
						
					 
						 $uploadpath1=DEMANDE_EMPL_DIR; 
						 $path_filename1=$uploadpath1.$name1;
						 $path_source1=$tmp_name1;
						
						//****  tableau des extensions exclus  ******//
						
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						$candidat_demande="";
						
						 if(in_array($extension1,$extensions_permis))
						 {
							if(move_uploaded_file($path_source1,$path_filename1)==true)
							{
							   //$candidat_demande=$name1;
							}
						 }
						 
						 
						 //*********************************************************// 
				
							 $type_doss="Demande_emploi";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension1;
							 
							 @rename($path_filename1,$uploadpath1.$nom_link);
							 
						   //***********************************************************//  
			 
			   }
			   else
			   {
						$type_doss="Demande_emploi";
						$nom_doss=$type_doss;
						$nom_link=$old_name1;
			   }
					
					  
					   $nom_candidat_demande=substr($name1,0,-4);
	 
				       $Tab_candidat_demande=array(
													'DOSSIER_NOM'=>$nom_doss,
													'DOSSIER_LIEN'=>$nom_link,
													'DOSSIER_ID'=>$id1,
													'Type_doss'=>"Demande_emploi"
											      );
					  							
				   					 
				     $recu1=$Objcl_dossier->modifier_enreg_dossier($Tab_candidat_demande,$Cnn);
						  
					/******  traitement cv uploder**********/
					
					
					$name2=$_FILES['CANDIDAT_CV']['name'];
		            $old_name2=$_POST['OLD_CANDIDAT_CV'];
					$id2=$_POST['ID_CANDIDAT_CV'];
					
					if($old_name2!=$name2 && $name2!="")
					{
							$tmp_name2=$_FILES['CANDIDAT_CV']['tmp_name']; 
		
							$name2=$_FILES['CANDIDAT_CV']['name']; 
							
							$ext_st2=pathinfo($name2);
							$extension2=$ext_st2['extension'];
							
							$size2=$_FILES['CANDIDAT_CV']['size']; 
							$type2=$_FILES['CANDIDAT_CV']['type']; 
							$erreur2=$_FILES['CANDIDAT_CV']['error'];
							
							//* creation chemin avec variable globales ****/
						
								$uploadpath2=CV_DIR; 
								$path_filename2=$uploadpath2.$name2;
								$path_source2=$tmp_name2;
							
							//****  tableau des extensions exclus  ******//
							
							 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
							 $candidat_cv="";
							
							 if(in_array($extension2,$extensions_permis))
							 {
								if(move_uploaded_file($path_source2,$path_filename2)==true)
								{
								   //$candidat_cv=$name2;
								}
							 }
							 
						 //*********************************************************// 
				
							 $type_doss="Cv";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension2;
							 
							 @rename($path_filename2,$uploadpath2.$nom_link);
							 
						   //***********************************************************//  
			 
			   }
			   else
			   {
						$type_doss="Cv";
						$nom_doss=$type_doss;
						$nom_link=$old_name2;
			   }
					  
					  
					   $nom_candidat_cv=substr($name2,0,-4);
	 
				       $Tab_candidat_cv=array(
													'DOSSIER_NOM'=>$nom_doss,
													'DOSSIER_LIEN'=>$nom_link,
													'DOSSIER_ID'=>$id2,
								                    'Type_doss'=>"Cv"
											      );
				       $recu2=$Objcl_dossier->modifier_enreg_dossier($Tab_candidat_cv,$Cnn);
					   
					
					//------ recuperation de  id du candidat -----------------//
					
					 $fk_annonce_id=$_POST["FK_ANNONCE_ID"]; 
					
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
	       //************************************************************//		 
				
					$Cnn->beginTransaction();	 
				
					try
					{		 		
						if($recu1==true && $recu2==true)
						{
							$Cnn->commit();
							$Objcl->redirige($current_path);
						}
						else
						{
							$Cnn->rollback();
							$message="pieces jointes non enregistré !";
							$Objcl->message_box($message);
							$Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint')."&annonce_id=".$fk_annonce_id);
						}
					}
					catch(Exception $e)
					{
						 $Cnn->rollback();
						 $message="pieces jointes non enregistré !";
						 $Objcl->message_box($message);
						 $Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint')."&annonce_id=".$fk_annonce_id);
					}
					
		 }
	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Dossier_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_dossier($id))
		{
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_dossier').'&module='.$Objcl->param_encode('xxx'));
		}
		else
		{
	
			$message="ATTENTION!dossier non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_dossier').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}
	
	
	function controler_ajout_apre_postule()
	{
		
		 /******  traitement demande uploder**********/
		 $Objcl=new Candidat_class();
		 $Objcl_dossier=new Dossier_class();
		 $Cnn=$Objcl->ma_connexion();
		 
		 $fk_util_id=$_POST['id_user'];
		 
		 $lister_candidat=$Objcl->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$Objcl->GetCh_CANDIDAT_ID()];
		 
		 $type=@$_POST["type_candidat"];
		 
		 $recu1=false;
		 $recu2=false;
		 $recu3=true;
		 $recu4=true;
		 $recu5=true;
		 $recu6=true;
		 $recu7=true;
		 $recu8=true;
		 $recu9=false;
		 
		  
		 if($type=="Externe")
		 {
			
					$tmp_name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['tmp_name']; 
					$name1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['name']; 
					
					$ext_st1=pathinfo($name1);
					$extension1=$ext_st1['extension'];
					
					$size1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['size']; 
					$type1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['type']; 
					$erreur1=$_FILES['CANDIDAT_DEMANDE_EMPLOI']['error'];
					
					//* creation chemin avec variable globales ****/
					
					 $uploadpath1=DEMANDE_EMPL_DIR; 
					 $path_filename1=$uploadpath1.$name1;
					 $path_source1=$tmp_name1;
					
					//****  tableau des extensions exclus  ******//
					
					$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
					$candidat_demande="";
					
					 if(in_array($extension1,$extensions_permis))
					 {
						if(move_uploaded_file($path_source1,$path_filename1)==true)
						{
							//$candidat_demande=$path_filename1;
						}
						
					 }
					 
					 $type_doss="Demande_emploi";
					 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
					 $nom_doss=$type_doss;
					 $nom_link=$type_doss.$increment_doss.".".$extension1;
					 
					 @rename($path_filename1,$uploadpath1.$nom_link);
					
					 
					
					 $nom_candidat_demande=substr($name1,0,-4);
					 
					 $Tab_demande_empl=array(
												'DOSSIER_NOM'=>$nom_doss,
												'DOSSIER_LIEN'=>$nom_link,
												'FK_CANDIDAT_ID'=>$candidat_id,
												'Type_doss'=>"Demande_emploi"
										   );
										   
					 $recu1=$Objcl_dossier->ajouter_enreg_dossier($Tab_demande_empl,$Cnn);
					 
					 
					  /******  traitement cv uploder**********/
					
					$tmp_name2=$_FILES['CANDIDAT_CV']['tmp_name']; 
					$name2=$_FILES['CANDIDAT_CV']['name']; 
					
					$ext_st2=pathinfo($name2);
					$extension2=$ext_st2['extension'];
					
					$size2=$_FILES['CANDIDAT_CV']['size']; 
					$type2=$_FILES['CANDIDAT_CV']['type']; 
					$erreur2=$_FILES['CANDIDAT_CV']['error'];
					
					//*** creation chemin avec variable globales ****//
					
						$uploadpath2=CV_DIR; 
						$path_filename2=$uploadpath2.$name2;
						$path_source2=$tmp_name2;
					
					//****  tableau des extensions exclus  ******//
					
					$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
					$candidat_cv="";
					
					 if(in_array($extension2,$extensions_permis))
					 {
						if(move_uploaded_file($path_source2,$path_filename2)==true)
						{
						   //$candidat_cv=$path_filename2;
						}
						
					 }
					 
					//*********************************************************// 
					
						 $type_doss="Cv";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension2;
						 
						 @rename($path_filename2,$uploadpath2.$nom_link);
					 
					//***********************************************************// 
					 
					 
					 $nom_candidat_cv=substr($name2,0,-4);
					 
					 $Tab_cv=array(
										'DOSSIER_NOM'=>$nom_doss,
										'DOSSIER_LIEN'=>$nom_link,
										'FK_CANDIDAT_ID'=>$candidat_id,
										'Type_doss'=>"Cv"
									);
									
					 $recu2=$Objcl_dossier->ajouter_enreg_dossier($Tab_cv,$Cnn);
					 
					 
					/******  traitement CANDIDAT_ACTE_NAISS  iploder**********/
					
				
				if(isset($_FILES['CANDIDAT_ACTE_NAISS']))
				{
					$tmp_name4=$_FILES['CANDIDAT_ACTE_NAISS']['tmp_name']; 
					$name4=$_FILES['CANDIDAT_ACTE_NAISS']['name']; 
					
					$ext_st4=pathinfo($name4);
					$extension4=$ext_st4['extension'];
					
					$size4=$_FILES['CANDIDAT_ACTE_NAISS']['size']; 
					$type4=$_FILES['CANDIDAT_ACTE_NAISS']['type']; 
					$erreur4=$_FILES['CANDIDAT_ACTE_NAISS']['error'];
					
					//* creation chemin avec variable globales ****/
					   
						$uploadpath4=ACT_NAISS_DIR; 
						$path_filename4=$uploadpath4.$name4;
						$path_source4=$tmp_name4;
					
					//****  tableau des extensions exclus  ******//
					
					$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
					$acte_de_naissance="";
					
					 if(in_array($extension4,$extensions_permis))
					 {
						if(move_uploaded_file($path_source4,$path_filename4)==true)
						{
							//$acte_de_naissance=$name4;
						}
						
					 }
					 
					 //*********************************************************// 
					
						 $type_doss="Act_naiss";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension4;
						 
						 @rename($path_filename4,$uploadpath4.$nom_link);
						  
					//***********************************************************//
					
					 $nom_candidat_cv=substr($name4,0,-4);
					 
					 $Tab_Act_naiss=array(
										'DOSSIER_NOM'=>$nom_doss,
										'DOSSIER_LIEN'=>$nom_link,
										'FK_CANDIDAT_ID'=>$candidat_id,
										'Type_doss'=>"Act_naiss"
									);
					 $recu3=$Objcl_dossier->ajouter_enreg_dossier($Tab_Act_naiss,$Cnn);
				}
				
					 
				/******  traitement CANDIDAT_CERTIFICAT_TRAVAIL  iploder**********/
							
				if(isset($_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']))
				{
							$tmp_name3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['tmp_name']; 
							$name3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['name']; 
							
							$ext_st3=pathinfo($name3);
							$extension3=$ext_st3['extension'];
							
							$size3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['size']; 
							$type3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['type']; 
							$erreur3=$_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['error'];
							
							//* creation chemin avec variable globales ****/
							   
								
								$uploadpath3=CERTIF_TRAV_DIR; 
								$path_filename3=$uploadpath3.$name3;
								$path_source3=$tmp_name3;
							
							//****  tableau des extensions exclus  ******//
							
								$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
								$certificat_de_travail="";
		
								
								 if(in_array($extension3,$extensions_permis))
								 {
									if(move_uploaded_file($path_source3,$path_filename3)==true)
									{
									   //$certificat_de_travail=$name3;
									}
									
								 }
							//*********************************************************// 
						
							 $type_doss="Cert_trav";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension3;
							 
							 @rename($path_filename3,$uploadpath3.$nom_link);
						 
						  //***********************************************************//
							
							 $nom_certificat_de_travail=substr($name3,0,-4);
					 
							 $Tab_Cert_trav=array(
												'DOSSIER_NOM'=>$nom_doss,
												'DOSSIER_LIEN'=>$nom_link,
												'FK_CANDIDAT_ID'=>$candidat_id,
												'Type_doss'=>"Cert_trav"
											);
											
							 $recu4=$Objcl_dossier->ajouter_enreg_dossier($Tab_Cert_trav,$Cnn);
							 
				}
				
							 
				/******  traitement CANDIDAT_CERTIF_NAT  iploder**********/
				
				if(isset($_FILES['CANDIDAT_CERTIF_NAT']))
				{			
								@$tmp_name5=$_FILES['CANDIDAT_CERTIF_NAT']['tmp_name']; 
								@$name5=$_FILES['CANDIDAT_CERTIF_NAT']['name']; 
								
								@$ext_st5=pathinfo($name5);
								@$extension5=$ext_st5['extension'];
								
								@$size5=$_FILES['CANDIDAT_CERTIF_NAT']['size']; 
								@$type5=$_FILES['CANDIDAT_CERTIF_NAT']['type']; 
								@$erreur5=$_FILES['CANDIDAT_CERTIF_NAT']['error'];
							
							//* creation chemin avec variable globales ****/
							   
								
								$uploadpath5=CERTIF_NATIONAL_DIR; 
								$path_filename5=$uploadpath5.$name5;
								$path_source5=$tmp_name5;
							
								 //****  tableau des extensions exclus  ******//
							
								$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
								$certificat_nationalite="";
								
								 if(in_array($extension5,$extensions_permis))
								 {
									if(move_uploaded_file($path_source5,$path_filename5)==true)
									{
									   //$certificat_nationalite=$name5;
									}
									
								 }
								
							//*********************************************************// 
						
							 $type_doss="Cert_nat";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension5;
							 
							 @rename($path_filename5,$uploadpath5.$nom_link);
						 
						  //***********************************************************// 
						  
							 $nom_certificat_nationalite=substr($name5,0,-4);
					 
							 $Tab_certificat_nationalite=array(
																'DOSSIER_NOM'=>$nom_doss,
																'DOSSIER_LIEN'=>$nom_link,
																'FK_CANDIDAT_ID'=>$candidat_id,
																'Type_doss'=>"Cert_nat"
															 );
							 $recu4=$Objcl_dossier->ajouter_enreg_dossier($Tab_certificat_nationalite,$Cnn); 
							 
							/******  traitement CANDIDAT_CERTIF_DOMICILE  iploder**********/
							
								@$tmp_name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['tmp_name']; 
								@$name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['name']; 
								
								@$ext_st6=pathinfo($name6);
								@$extension6=$ext_st6['extension'];
								
								@$size6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['size']; 
								@$type6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['type']; 
								@$erreur6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['error'];
								
							//* creation chemin avec variable globales ****/
								
								 
								$uploadpath6=CERTIF_DOM_DIR; 
								$path_filename6=$uploadpath6.$name6;
								$path_source6=$tmp_name6;
							
							//****  tableau des extensions exclus  ******//
							
								 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
								 $certificat_domicile="";
								
								 if(in_array($extension6,$extensions_permis))
								 {
									if(move_uploaded_file($path_source6,$path_filename6)==true)
									{
									  //$certificat_domicile=$name6;
									}
									
								 } 
							 
							 //*********************************************************// 
						
								 $type_doss="Cert_dom";
								 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
								 $nom_doss=$type_doss;
								 $nom_link=$type_doss.$increment_doss.".".$extension6;
								 
								 @rename($path_filename6,$uploadpath6.$nom_link);
						 
							 //***********************************************************// 
							 
								$nom_certificat_domicile=substr($name6,0,-4);
					 
								$Tab_certificat_domicile=array(
																'DOSSIER_NOM'=>$nom_doss,
																'DOSSIER_LIEN'=>$nom_link,
																'FK_CANDIDAT_ID'=>$candidat_id,
																'Type_doss'=>"Cert_dom"
															  );
															  
								$recu5=$Objcl_dossier->ajouter_enreg_dossier($Tab_certificat_domicile,$Cnn); 
				}
				
				/******  traitement CANDIDAT_CERTIF_MEDICAL  iploder**********/
				if(isset($_FILES['CANDIDAT_CERTIF_MEDICAL']))
				{			 
							
							
								@$tmp_name7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['tmp_name']; 
								@$name7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['name']; 
								
								@$ext_st7=pathinfo($name7);
								@$extension7=$ext_st7['extension'];
								
								@$size7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['size']; 
								@$type7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['type']; 
								@$erreur7=$_FILES['CANDIDAT_CERTIF_MEDICAL']['error'];
							
							//* creation chemin avec variable globales ****/
							   
								
								$uploadpath7=CERTIF_MEDIC_DIR; 
								$path_filename7=$uploadpath7.$name7;
								$path_source7=$tmp_name7;
							
							//****  tableau des extensions exclus  ******//
							
								 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
								
				
								 $certificat_medical="";
								
								 if(in_array($extension7,$extensions_permis))
								 {
									if(move_uploaded_file($path_source7,$path_filename7)==true)
									{
									   //$certificat_medical=$name7;
									}
									
								 }  
							 
							 //*********************************************************// 
						
									 $type_doss="Cert_med";
									 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
									 $nom_doss=$type_doss;
									 $nom_link=$type_doss.$increment_doss.".".$extension7;
									 
									 @rename($path_filename7,$uploadpath7.$nom_link);
						 
							 //***********************************************************// 
							 
								  $nom_certificat_medical=substr($name7,0,-4);
					 
								  $Tab_certificat_medical=array(
																'DOSSIER_NOM'=>$nom_doss,
																'DOSSIER_LIEN'=>$nom_link,
																'FK_CANDIDAT_ID'=>$candidat_id,
																'Type_doss'=>"Cert_med"
																);
																
								  $recu6=$Objcl_dossier->ajouter_enreg_dossier($Tab_certificat_medical,$Cnn);
				 }
				  
								  
				/******  traitement CANDIDAT_CASIER_JUDICIAIRE  uploder********************************/
							
				 if(isset($_FILES['CANDIDAT_CASIER_JUDICIAIRE']))
				 {
					 	
								@$tmp_name8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['tmp_name']; 
								@$name8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['name']; 
								
								@$ext_st8=pathinfo($name8);
								@$extension8=$ext_st8['extension'];
								
								@$size8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['size']; 
								@$type8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['type']; 
								@$erreur8=$_FILES['CANDIDAT_CASIER_JUDICIAIRE']['error'];
								
								//* creation chemin avec variable globales ****/
								
									
									$uploadpath8=CASIER_JUD_DIR; 
									$path_filename8=$uploadpath8.$name8;
									$path_source8=$tmp_name8;
								
								//****  tableau des extensions exclus  ******//
								
								$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
								
								 $casier_judiciaire="";
								
								 if(in_array($extension8,$extensions_permis))
								 {
									if(move_uploaded_file($path_source8,$path_filename8)==true)
									{
									   //$casier_judiciaire=$name8;
									}
									
								 }
								 
							   //*********************************************************// 
						
									 $type_doss="Casier_jud";
									 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
									 $nom_doss=$type_doss;
									 $nom_link=$type_doss.$increment_doss.".".$extension8;
									 
									 @rename($path_filename8,$uploadpath8.$nom_link);
						 
							 //***********************************************************// 
								  $nom_casier_judiciaire=substr($name8,0,-4);
					 
								  $Tab_casier_judiciaire=array(
																'DOSSIER_NOM'=>$nom_doss,
																'DOSSIER_LIEN'=>$nom_link,
																'FK_CANDIDAT_ID'=>$candidat_id,
																'Type_doss'=>"Casier_jud"
															  );
											
								  $recu7=$Objcl_dossier->ajouter_enreg_dossier($Tab_casier_judiciaire,$Cnn);
				 }
				 
				/******  traitement CANDIDAT_FICHE_FAMILLE  uploder**********/
				
				if(isset($_FILES['CANDIDAT_FICHE_FAMILLE']))
				{			
								$tmp_name9=$_FILES['CANDIDAT_FICHE_FAMILLE']['tmp_name']; 
								$name9=$_FILES['CANDIDAT_FICHE_FAMILLE']['name']; 
								
								$ext_st9=pathinfo($name9);
								$extension9=$ext_st9['extension'];
								
								$size9=$_FILES['CANDIDAT_FICHE_FAMILLE']['size']; 
								$type9=$_FILES['CANDIDAT_FICHE_FAMILLE']['type']; 
								$erreur9=$_FILES['CANDIDAT_FICHE_FAMILLE']['error'];
								
								//* creation chemin avec variable globales ****/
								
									$uploadpath9=FICHE_FAMIL_DIR; 
									$path_filename9=$uploadpath9.$name9;
									$path_source9=$tmp_name9;
								
								//****  tableau des extensions exclus  ******//
								
								$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
								$fiche_famille="";
								
								 if(in_array($extension9,$extensions_permis))
								 {
									if(move_uploaded_file($path_source9,$path_filename9)==true)
									{
									   //$fiche_famille=$name9;
									}
								 }
								 
							   //*********************************************************// 
						
									 $type_doss="Fiche_fam";
									 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
									 $nom_doss=$type_doss;
									 $nom_link=$type_doss.$increment_doss.".".$extension9;
									 
									 @rename($path_filename9,$uploadpath9.$nom_link);
						 
							 //***********************************************************// 
								
								  $nom_fiche_famille=substr($name9,0,-4);
					 
								  $Tab_fiche_famille=array(
												'DOSSIER_NOM'=>$nom_doss,
												'DOSSIER_LIEN'=>$nom_link,
												'FK_CANDIDAT_ID'=>$candidat_id,
												'Type_doss'=>"Fiche_fam"
											);
								  $recu8=$Objcl_dossier->ajouter_enreg_dossier($Tab_fiche_famille,$Cnn); 
				}
				
						$current_path=HOME.$Objcl->param_encode('form_piece_joint'); 
					 
				   //************************************************************//		 
						
								$Cnn->beginTransaction();	 
							
								try
								{		 		
									if($recu1==true && $recu2==true && $recu3==true && $recu4==true && $recu5==true && $recu6==true && $recu7==true && $recu8==true)
									{
										$Cnn->commit();
										$Objcl->redirige($current_path);
									}
									else
									{
										$Cnn->rollback();
										$message="pieces jointes non enregistré !";
										$Objcl->message_box($message);
										$Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint'));
									}
								}
								catch(Exception $e)
								{
									 $Cnn->rollback();
									 $message="pieces jointes non enregistré !";
									 $Objcl->message_box($message);
									 $Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint'));
								}
						
						//----------------------------------------//					   
						
							
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
					
					//* creation chemin avec variable globales ****/
					
					 $uploadpath1=DEMANDE_EMPL_DIR; 
					 $path_filename1=$uploadpath1.$name1;
					 $path_source1=$tmp_name1;
					
					//****  tableau des extensions exclus  ******//
					
					$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
					$candidat_demande="";
					
					 if(in_array($extension1,$extensions_permis))
					 {
						if(move_uploaded_file($path_source1,$path_filename1)==true)
						{
						   //$candidat_demande=$name1;
						}
						
					 }
					 
					 //*********************************************************// 
				
							 $type_doss="Demande_emploi";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension1;
							 
							 @rename($path_filename1,$uploadpath1.$nom_link);
				 
				     //***********************************************************// 
					 
					  $nom_candidat_demande=substr($name1,0,-4);
			 
					  $Tab_candidat_demande=array(
									'DOSSIER_NOM'=>$nom_doss,
									'DOSSIER_LIEN'=>$nom_link,
									'FK_CANDIDAT_ID'=>$candidat_id,
								    'Type_doss'=>"Demande_emploi"
								);
					  $recu1=$Objcl_dossier->ajouter_enreg_dossier($Tab_candidat_demande,$Cnn); 
					  
					/******  traitement cv uploder**********/
					
					$tmp_name2=$_FILES['CANDIDAT_CV']['tmp_name']; 
					$name2=$_FILES['CANDIDAT_CV']['name']; 
					
					$ext_st2=pathinfo($name2);
					$extension2=$ext_st2['extension'];
					
					$size2=$_FILES['CANDIDAT_CV']['size']; 
					$type2=$_FILES['CANDIDAT_CV']['type']; 
					$erreur2=$_FILES['CANDIDAT_CV']['error'];
					
					//* creation chemin avec variable globales ****/
					
						$uploadpath2=CV_DIR; 
						$path_filename2=$uploadpath2.$name2;
						$path_source2=$tmp_name2;
					
					//****  tableau des extensions exclus  ******//
					
					 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
					 $candidat_cv="";
					
					 if(in_array($extension2,$extensions_permis))
					 {
						if(move_uploaded_file($path_source2,$path_filename2)==true)
						{
						   //$candidat_cv=$name2;
						}
						
					 }
					 
					  //*********************************************************// 
				
							 $type_doss="Cv";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension2;
							 
							 @rename($path_filename2,$uploadpath2.$nom_link);
				 
				     //***********************************************************// 
					
					  $nom_candidat_cv=substr($name2,0,-4);
			 
					  $Tab_candidat_cv=array(
									'DOSSIER_NOM'=>$nom_doss,
									'DOSSIER_LIEN'=>$nom_link,
									'FK_CANDIDAT_ID'=>$candidat_id,
								    'Type_doss'=>"Cv"
								);
					  $recu2=$Objcl_dossier->ajouter_enreg_dossier($Tab_candidat_cv,$Cnn); 
					  
				
					 //-------------------------------- enregistrement validation ------------------------------//
				
					
					$current_path=HOME.$Objcl->param_encode('form_piece_joint'); 
					
	       //************************************************************//		 
				
					$Cnn->beginTransaction();	 
				
					try
					{		 		
						if($recu1==true && $recu2==true && $recu10=true)
						{
							$Cnn->commit();
							$Objcl->redirige($current_path);
						}
						else
						{
							$Cnn->rollback();
							$message="pieces jointes non enregistré !";
							$Objcl->message_box($message);
							$Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint'));
						}
					}
					catch(Exception $e)
					{
						 $Cnn->rollback();
						 $message="pieces jointes non enregistré !";
						 $obj_candidat->message_box($message);
						 $obj_candidat->redirige(HOME.$obj_candidat->param_encode('form_piece_joint'));
					}
					
			   }
					
				
		
	
		
		
	}
	
	function controler_modif_apre_postule()
	{
		
		   /******  traitement demande uploder**********/
		 $Objcl=new Candidat_class();
		
		 $Objcl_dossier=new Dossier_class();
		 $Cnn=$Objcl->ma_connexion();
		 
		 $fk_util_id=$_POST['id_user'];
		 
		 $lister_candidat=$Objcl->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$Objcl->GetCh_CANDIDAT_ID()];
		 
		 
		 
		 $type=@$_POST["type_candidat"];
		 $dossier_id=$_POST["DOSSIER_ID"];
		 
		 $recu1=false;
		 $recu2=false;
		 $recu3=true;
		 $recu4=true;
		 $recu5=true;
		 $recu6=true;
		 $recu7=true;
		 $recu8=true;
		 $recu9=false;
		 
		 
		 
		 
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
				
					//* creation chemin avec variable globales ****/
					
					
					 $uploadpath1=DEMANDE_EMPL_DIR; 
					 $path_filename1=$uploadpath1.$name1;
					 $path_source1=$tmp_name1;
				
				   //****  tableau des extensions exclus  ******//
				
						$extensions_permis= array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						
						$candidat_demande="";
						
						 if(in_array($extension1,$extensions_permis))
						 {
							if(move_uploaded_file($path_source1,$path_filename1)==true)
							{
							   //$candidat_demande=$name1;
							}
						 }
						 
						//*********************************************************// 
			
						 $type_doss="Demande_emploi";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension1;
						 
						 @rename($path_filename1,$uploadpath1.$nom_link);
						 
			 
				       //***********************************************************//  
					  
						 
			   }
			   else
			   {
				    $type_doss="Demande_emploi";
				    $nom_doss=$type_doss;
					$nom_link=$old_name1;
			   }
			   
			   
			    
						 
				 $nom_candidat_demande=substr($name1,0,-4);
	 
				 $Tab_candidat_demande=array(
												'DOSSIER_NOM'=>$nom_doss,
												'DOSSIER_LIEN'=>$nom_link,
												'DOSSIER_ID'=>$dossier_id,
								                'Type_doss'=>"Demande_emploi"
											);
											
				 $recu1=$Objcl_dossier->modifier_enreg_dossier($Tab_candidat_demande,$Cnn);
			   
			  /******  traitement cv uploder**********/
			
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
			
				    //* creation chemin avec variable globales ****//
				    
			          
					$uploadpath2=CV_DIR; 
					$path_filename2=$uploadpath2.$name2;
					$path_source2=$tmp_name2;
				
		            //****  tableau des extensions exclus  ******//
			
					  $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
					  $candidat_cv="";
				
					 if(in_array($extension2,$extensions_permis))
					 {
						if(move_uploaded_file($path_source2,$path_filename2)==true)
						{
						   //$candidat_cv=$name2;
						}
						
					 }
					 
			         //*********************************************************// 
			
						 $type_doss="Cv";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension2;
						 
						 @rename($path_filename2,$uploadpath2.$nom_link);
						 
			 
				       //***********************************************************//  
					  
						 
			   }
			   else
			   {
				    //$candidat_demande=$old_name1;
				    $type_doss="Cv";
				    $nom_doss=$type_doss;
					$nom_link=$old_name2;
			   }
			   
			 
			  
			     $nom_candidat_cv=substr($name2,0,-4);
	 
				 $Tab_candidat_cv=array(
											'DOSSIER_NOM'=>$nom_doss,
											'DOSSIER_LIEN'=>$nom_link,
											'DOSSIER_ID'=>$dossier_id,
											'Type_doss'=>"Cv"
										);
				 $recu2=$Objcl_dossier->modifier_enreg_dossier($Tab_candidat_cv,$Cnn);
				 
			/******  traitement CANDIDAT_ACTE_NAISS  iploder**********/
			
			if(isset($_POST['OLD_CANDIDAT_ACTE_NAISS']))
			{
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
						
						//* creation chemin avec variable globales ****/
						  
							$uploadpath4=ACT_NAISS_DIR; 
							$path_filename4=$uploadpath4.$name4;
							$path_source4=$tmp_name4;
						
						//****  tableau des extensions exclus  ******//
							
							 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
							 $acte_de_naissance="";
						
							 if(in_array($extension4,$extensions_permis))
							 {
								if(move_uploaded_file($path_source4,$path_filename4)==true)
								{
								   //$acte_de_naissance=$name4;
								}
								
							 }
							 
						  //*********************************************************// 
				
							 $type_doss="Cv";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension4;
							 
							 @rename($path_filename4,$uploadpath4.$nom_link);
							 
						   //***********************************************************//  
							 
				   }
				   else
				   {
							$type_doss="Act_naiss";
							$nom_doss=$type_doss;
							$nom_link=$old_name4;
				   }
				   
				
					 $nom_acte_de_naissance=substr($name4,0,-4);
		 
					 $Tab_acte_de_naissance=array(
													'DOSSIER_NOM'=>$nom_doss,
													'DOSSIER_LIEN'=>$nom_link,
													'DOSSIER_ID'=>$dossier_id,
													'Type_doss'=>"Act_naiss"
												 );
												
					 $recu3=$Objcl_dossier->modifier_enreg_dossier($Tab_acte_de_naissance,$Cnn);
					 
			}
			
			/******  traitement CANDIDAT_CERTIFICAT_TRAVAIL  iploder**********/
			if(isset($_POST['OLD_CANDIDAT_CERTIFICAT_TRAVAIL']))
			{
				
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
					
					//* creation chemin avec variable globales ****/
					   
						$uploadpath3=CERTIF_TRAV_DIR; 
						$path_filename3=$uploadpath3.$name3;
						$path_source3=$tmp_name3;
					
					//****  tableau des extensions exclus  ******//
					
						 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						 $certificat_de_travail="";
						
						 if(in_array($extension3,$extensions_permis))
						 {
							if(move_uploaded_file($path_source3,$path_filename3)==true)
							{
							   //$certificat_de_travail=$name3;
							}
							
						 }
						 
			           //*********************************************************// 
			
						 $type_doss="Cert_trav";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension3;
						 
						 @rename($path_filename3,$uploadpath3.$nom_link);
						 
				       //***********************************************************//  
					  	 
			   }
			   else
			   {
						$type_doss="Cert_trav";
						$nom_doss=$type_doss;
						$nom_link=$old_name3;
			   }
					 
					 
					  $nom_certificat_de_travail=substr($name3,0,-4);
	 
				      $Tab_certificat_de_travail=array(
														'DOSSIER_NOM'=>$nom_doss,
														'DOSSIER_LIEN'=>$nom_link,
														'DOSSIER_ID'=>$dossier_id,
														'Type_doss'=>"Cert_trav"
											          );
				      $recu4=$Objcl_dossier->modifier_enreg_dossier($Tab_certificat_de_travail,$Cnn);
					  
			}
			
			
		  /******  traitement CANDIDAT_CERTIF_NAT  iploder**********/
			
			if(isset($_POST['OLD_CANDIDAT_CERTIF_NAT']))
			{		
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
					
					//****** creation chemin avec variable globales ****//
					   
						$uploadpath5=CERTIF_NATIONAL_DIR; 
						$path_filename5=$uploadpath5.$name5;
						$path_source5=$tmp_name5;
					
					//****  tableau des extensions exclus  ******//
					
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						$certificat_nationalite="";
						
						 if(in_array($extension5,$extensions_permis))
						 {
							if(move_uploaded_file($path_source5,$path_filename5)==true)
							{
							   //$certificat_nationalite=$name5;
							}
							
						 }
						 
				      //*********************************************************// 
			
						 $type_doss="Cert_nat";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension5;
						 
						 @rename($path_filename5,$uploadpath5.$nom_link);
						 
				       //***********************************************************//  
					  	 
			   }
			   else
			   {
						$type_doss="Cert_nat";
						$nom_doss=$type_doss;
						$nom_link=$old_name5;
			   }
			   
				      $nom_certificat_nationalite=substr($name5,0,-4);
	 
				      $Tab_certificat_nationalite=array(
														'DOSSIER_NOM'=>$nom_doss,
														'DOSSIER_LIEN'=>$nom_link,
														'DOSSIER_ID'=>$dossier_id,
														'Type_doss'=>"Cert_nat"
											           );
											
				      $recu5=$Objcl_dossier->modifier_enreg_dossier($Tab_certificat_nationalite,$Cnn);
			}
			
			/******  traitement CANDIDAT_CERTIF_DOMICILE  iploder**********/
			if(isset($_POST['OLD_CANDIDAT_CERTIF_DOMICILE']))
			{		
					$name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['name'];
		            $old_name6=$_POST['OLD_CANDIDAT_CERTIF_DOMICILE'];
			   
					if($old_name6!=$name6 && $name6!="")
					{	
					
						$tmp_name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['tmp_name']; 
						$name6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['name']; 
						
						$ext_st6=pathinfo($name6);
						$extension6=$ext_st6['extension'];

						
						$size6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['size']; 
						$type6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['type']; 
						$erreur6=$_FILES['CANDIDAT_CERTIF_DOMICILE']['error'];
						
					//* creation chemin avec variable globales ****/
					  
						$uploadpath6=CERTIF_DOM_DIR; 
						$path_filename6=$uploadpath6.$name6;
						$path_source6=$tmp_name6;

					
					//****  tableau des extensions exclus  ******//
					
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						$certificat_domicile="";
						
						 if(in_array($extension6,$extensions_permis))
						 {
							if(move_uploaded_file($path_source6,$path_filename6)==true)
							{
							   //$certificat_domicile=$name6;
							}
							
						 } 
						 
					  //*********************************************************// 
			
						 $type_doss="Cert_dom";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension6;
						 
						 @rename($path_filename6,$uploadpath6.$nom_link);
						 
				       //***********************************************************//  
					  	 
			   }
			   else
			   {
						$type_doss="Cert_dom";
						$nom_doss=$type_doss;
						$nom_link=$old_name6;
			   }
					
					  $nom_certificat_domicile=substr($name6,0,-4);
	 
				      $Tab_certificat_domicile=array(
														'DOSSIER_NOM'=>$nom_doss,
														'DOSSIER_LIEN'=>$nom_link,
														'DOSSIER_ID'=>$dossier_id,
														'Type_doss'=>"Cert_dom"
													);
				      $recu6=$Objcl_dossier->modifier_enreg_dossier($Tab_certificat_domicile,$Cnn);
			}
			
			
					/******  traitement CANDIDAT_CERTIF_MEDICAL  iploder**********/
			
			if(isset($_POST['OLD_CANDIDAT_CERTIF_DOMICILE']))
			{
					
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
					
					//* creation chemin avec variable globales ****/
					  
						$uploadpath7=CERTIF_MEDIC_DIR; 
						$path_filename7=$uploadpath7.$name7;
						$path_source7=$tmp_name7;
					
					//****  tableau des extensions exclus  ******//
					
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						$certificat_medical="";
						
						 if(in_array($extension7,$extensions_permis))
						 {
							if(move_uploaded_file($path_source7,$path_filename7)==true)
							{
							   //$certificat_medical=$name7;
							}
						 } 
						 
					  //*********************************************************// 
			
						 $type_doss="Cert_med";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension7;
						 
						 @rename($path_filename7,$uploadpath7.$nom_link);
						 
				       //***********************************************************//  
					  	 
			   }
			   else
			   {
						$type_doss="Cert_med";
						$nom_doss=$type_doss;
						$nom_link=$old_name7;
			   }
					
					   $nom_certificat_medical=substr($name7,0,-4);
	 
				       $Tab_certificat_medical=array(
														'DOSSIER_NOM'=>$nom_doss,
														'DOSSIER_LIEN'=>$nom_link,
														'DOSSIER_ID'=>$dossier_id,
														'Type_doss'=>"Cert_med"
											        );
											
				      $recu7=$Objcl_dossier->modifier_enreg_dossier($Tab_certificat_medical,$Cnn);
				
			}
			
				/******  traitement CANDIDAT_CASIER_JUDICIAIRE  uploder**********/
			
			if(isset($_POST['OLD_CANDIDAT_CASIER_JUDICIAIRE']))
			{
						
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
						
						//* creation chemin avec variable globales ****/
						
					 
							$uploadpath8=CASIER_JUD_DIR; 
							$path_filename8=$uploadpath8.$name8;
							$path_source8=$tmp_name8;
						
						//****  tableau des extensions exclus  ******//
						
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						$casier_judiciaire="";
						
						 if(in_array($extension8,$extensions_permis))
						 {
							if(move_uploaded_file($path_source8,$path_filename8)==true)
							{
							   //$casier_judiciaire=$name8;
							}
						 }
						 
					  //*********************************************************// 
			
						 $type_doss="Cert_med";
						 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
						 $nom_doss=$type_doss;
						 $nom_link=$type_doss.$increment_doss.".".$extension8;
						 
						 @rename($path_filename8,$uploadpath8.$nom_link);
						 
				       //***********************************************************//  
					  	 
			   }
			   else
			   {
						$type_doss="Cert_med";
						$nom_doss=$type_doss;
						$nom_link=$old_name8;
			   }
					
					
					   $nom_casier_judiciaire=substr($name8,0,-4);
	 
				       $Tab_casier_judiciaire=array(
														'DOSSIER_NOM'=>$nom_doss,
														'DOSSIER_LIEN'=>$nom_link,
														'DOSSIER_ID'=>$dossier_id,
														'Type_doss'=>"Casier_jud"
											       );
				       $recu8=$Objcl_dossier->modifier_enreg_dossier($Tab_casier_judiciaire,$Cnn);
			}
			
			
				 /******  traitement CANDIDAT_FICHE_FAMILLE  uploder**********/
			
			if(isset($_POST['OLD_CANDIDAT_FICHE_FAMILLE']))
			{		
					
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
						
						//* creation chemin avec variable globales ****/
						 
			                
							$uploadpath9=FICHE_FAMIL_DIR; 
							$path_filename9=$uploadpath9.$name9;
							$path_source9=$tmp_name9;
						
						//****  tableau des extensions exclus  ******//
						
							$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
							$fiche_famille="";
						
						 if(in_array($extension9,$extensions_permis))
						 {
							if(move_uploaded_file($path_source9,$path_filename9)==true)
							{
							   //$fiche_famille=$name9;
							}
							
						 }
						 //*********************************************************// 
				
							 $type_doss="Fiche_fam";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension9;
							 
							 @rename($path_filename9,$uploadpath9.$nom_link);
							 
						   //***********************************************************//  
			 
			   }
			   else
			   {
						$type_doss="Fiche_fam";
						$nom_doss=$type_doss;
						$nom_link=$old_name9;
			   }
						
					   $nom_fiche_famille=substr($name9,0,-4);
	 
				       $Tab_fiche_famille=array(
												'DOSSIER_NOM'=>$nom_doss,
												'DOSSIER_LIEN'=>$nom_link,
												'DOSSIER_ID'=>$dossier_id,
								                'Type_doss'=>"Fiche_fam"
											   );
				     $recu9=$Objcl_dossier->modifier_enreg_dossier($Tab_fiche_famille,$Cnn);
			}
			
			
						//------ recuperation de  id du candidat -----------------//
					
					
				$current_path=HOME.$Objcl->param_encode('form_piece_joint'); 
					 
	       //************************************************************//		 
				
					$Cnn->beginTransaction();	 
				
					try
					{		 		
						if($recu1==true && $recu2==true && $recu3==true && $recu4=true && $recu5=true && $recu6=true && $recu7=true && $recu8=true)
						{
							$Cnn->commit();
							$Objcl->redirige($current_path);
						}
						else
						{
							$Cnn->rollback();
							$message="pieces jointes non enregistré !";
							$Objcl->message_box($message);
							$Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint'));
						}
					}
					catch(Exception $e)
					{
						 $Cnn->rollback();
						 $message="pieces jointes non enregistré !";
						 $Objcl->message_box($message);
						 $Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint'));
					}
						 
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
						
						//* creation chemin avec variable globales ****/
						
					 
						 $uploadpath1=DEMANDE_EMPL_DIR; 
						 $path_filename1=$uploadpath1.$name1;
						 $path_source1=$tmp_name1;
						
						//****  tableau des extensions exclus  ******//
						
						$extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
						$candidat_demande="";
						
						 if(in_array($extension1,$extensions_permis))
						 {
							if(move_uploaded_file($path_source1,$path_filename1)==true)
							{
							   //$candidat_demande=$name1;
							}
						 }
						 
						 
						 //*********************************************************// 
				
							 $type_doss="Demande_emploi";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension1;
							 
							 @rename($path_filename1,$uploadpath1.$nom_link);
							 
						   //***********************************************************//  
			 
			   }
			   else
			   {
						$type_doss="Demande_emploi";
						$nom_doss=$type_doss;
						$nom_link=$old_name1;
			   }
					
					  
					   $nom_candidat_demande=substr($name1,0,-4);
	 
				       $Tab_candidat_demande=array(
													'DOSSIER_NOM'=>$nom_doss,
													'DOSSIER_LIEN'=>$nom_link,
													'DOSSIER_ID'=>$dossier_id,
													'Type_doss'=>"Demande_emploi"
											      );
												 
				       $recu1=$Objcl_dossier->modifier_enreg_dossier($Tab_candidat_demande,$Cnn);
					  
					/******  traitement cv uploder**********/
					
					
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
							
							//* creation chemin avec variable globales ****/
						
								$uploadpath2=CV_DIR; 
								$path_filename2=$uploadpath2.$name2;
								$path_source2=$tmp_name2;
							
							//****  tableau des extensions exclus  ******//
							
							 $extensions_permis=array('png','jpeg','PNG','JPEG','JPG','jpg','PDF','pdf');
							 $candidat_cv="";
							
							 if(in_array($extension2,$extensions_permis))
							 {
								if(move_uploaded_file($path_source2,$path_filename2)==true)
								{
								   //$candidat_cv=$name2;
								}
								
							 }
							 
							 
					 
						 //*********************************************************// 
				
							 $type_doss="Cv";
							 $increment_doss=$Objcl_dossier->getLastDossId($type_doss);
							 $nom_doss=$type_doss;
							 $nom_link=$type_doss.$increment_doss.".".$extension2;
							 
							 @rename($path_filename2,$uploadpath2.$nom_link);
							 
						   //***********************************************************//  
			 
			   }
			   else
			   {
						$type_doss="Cv";
						$nom_doss=$type_doss;
						$nom_link=$old_name2;
			   }
					  
					  
					   $nom_candidat_cv=substr($name2,0,-4);
	 
				       $Tab_candidat_cv=array(
													'DOSSIER_NOM'=>$nom_doss,
													'DOSSIER_LIEN'=>$nom_link,
													'DOSSIER_ID'=>$dossier_id,
								                    'Type_doss'=>"Cv"
											      );
				       $recu2=$Objcl_dossier->modifier_enreg_dossier($Tab_candidat_cv,$Cnn);
					   
					
					
						$current_path=HOME.$Objcl->param_encode('form_piece_joint'); 
					 
	       //************************************************************//		 
				
					$Cnn->beginTransaction();	 
				
					try
					{		 		
						if($recu1==true && $recu2==true)
						{
							$Cnn->commit();
							$Objcl->redirige($current_path);
						}
						else
						{
							$Cnn->rollback();
							$message="pieces jointes non enregistré !";
							$Objcl->message_box($message);
							$Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint'));
						}
					}
					catch(Exception $e)
					{
						 $Cnn->rollback();
						 $message="pieces jointes non enregistré !";
						 $Objcl->message_box($message);
						 $Objcl->redirige(HOME.$Objcl->param_encode('form_piece_joint'));
					}
					
		 }
		
	}
	

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Dossier_controler();
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