<?php
   @session_start();
   require_once("../_Init_file.php");

   
 
       $libelle=strip_tags($_POST['FORM_LIB']);
	   $an_deb=strip_tags($_POST['FORMATION_AN_DEB']);
	   $an_fin=strip_tags($_POST['FORMATION_AN_FIN']);
	   $nom=strip_tags($_POST['FORM_NOM']);
	   $intitule=strip_tags($_POST['FORM_INTITULE']);
	   $fk_util_id=strip_tags($_POST['id_user']);
	   
	 
	  
		$tmp_name=$_FILES['AUTRE_AUTRE_FORMATION_DIPLOME_FICHIER']['tmp_name']; 
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
			 
			 if(!in_array($nom_sans_ext,$extensions_exclus))
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
							'FORMATION_AN_DEB'=>$an_deb,
							'FORMATION_AN_FIN'=>$an_fin,
							'ETABLISSEMENT_NOM'=>$nom,
							'FORMATION_LIEU'=>$lieu,
							'FORMATION_DIPLOME'=>$diplome,
							'FORMATION_DOM_PRINC_ETUD'=>$dom_princ_etu,
							'FK_CANDIDAT_ID'=>$fk_util_id,
							'FORMATION_CYCLE'=>$cycle,
							'AUTRE_FORMATION_DIPLOME_FICHIER'=>$candidat_diplome,
							'FK_CANDIDAT_ID'=>$candidat_id
			            );

		
		$recu1=$Objcl->ajouter_enreg_autre_formation($Tab_param,$Cnn);
		
		
		if($recu1==true && $recu==true){ echo "OK" ;}
		else{ echo "KO";}



?>