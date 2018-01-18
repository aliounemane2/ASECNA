<?php
   @session_start();
   require_once("../_Init_file.php");
   
       $ref_nom_ent=strip_tags($_POST['REF_NOM_ENT']);
	   $ref_post_occ=strip_tags($_POST['REF_POST_OCC']);
	   $ref_pers_cont=strip_tags($_POST['REF_PERS_CONT']);
	   $ref_tel=strip_tags($_POST['REF_TEL']);
	   $ref_email=strip_tags($_POST['REF_EMAIL']);
	   $fk_util_id=strip_tags($_POST['id_user']);
	   
	    $obj_candidat=new Candidat_class();
		 
		 //------ recuperation de  id du candidat -----------------//
		 
		$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		$candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];



       $obj_ref=new Reference_class();
		
		 $Tab_param=array(
							'REF_NOM_ENT'=>$ref_nom_ent,
							'REF_POST_OCC'=>$ref_post_occ,
							'REF_PERS_CONT'=>$ref_pers_cont,
							'REF_TEL'=>$ref_tel,
							'REF_EMAIL'=>$ref_email,
							'FK_CANDIDAT_ID'=>$candidat_id
			            );

		 $Cnn=$obj_ref->ma_connexion();
		
		//-------------------------------- enregistrement validation ------------------------------//
		
		 $obj_validation=new Validation_cadidature_class();
		 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
		 
		 $date_enreg=$Tab_date["date_enreg"];
		 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		 
		 $param_validation= array(
									 "etape"=>"10",
									 "date"=>$date_enreg,
									 "id_annonce"=>$fk_annonce_id,
									 "id_candidat"=>$candidat_id,
									 "libelle"=>"Reference"
		                         );
								 
		 $recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
		 
		//-----------------------  fin validation --------------------------------------------------//
		
		 
		$recu1=$obj_ref->ajouter_enreg_reference($Tab_param,$Cnn);
		
		if($recu==true && $recu1=true ){ echo "OK" ;}
		else{ echo "KO";}

?>