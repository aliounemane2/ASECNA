<?php
   @session_start();
   require_once("../_Init_file.php");
   
       $exp_poste=strip_tags($_POST['EXP_POSTE']);
	   $exp_ent_nom=strip_tags($_POST['EXP_ENT_NOM']);
	   $exp_sec_act=strip_tags($_POST['EXP_SEC_ACT']);
	   $exp_debut_travail=strip_tags($_POST['EXP_DEBUT_TRAVAIL']);
	   $exp_salaire=strip_tags($_POST['EXP_SALAIRE']);
	   $exp_fin_travail=strip_tags($_POST['EXP_FIN_TRAVAIL']);
	   $exp_nbre_pers_sord=strip_tags($_POST['EXP_NBRE_PERS_SORD']);
	   $exp_tache=strip_tags($_POST['EXP_TACHE']);
	   $exp_motif_dep=strip_tags($_POST['EXP_MOTIF_DEP']);
	   $fk_util_id=strip_tags($_POST['id_user']);
	   


       $obj_exper=new Experience_professionnelle_class();
	   
	   $obj_candidat=new Candidat_class();
		 
		 //------ recuperation de  id du candidat -----------------//
		 
		$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		$candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
	   
	   
		
		 $Tab_param=array(
			'EXP_ID'=>$exp_poste,
			'EXP_ENT_NOM'=>$exp_ent_nom,
			'EXP_SEC_ACT'=>$exp_sec_act,
			'EXP_POSTE'=>$exp_poste,
			'EXP_DEBUT_TRAVAIL'=>$exp_debut_travail,
			'EXP_FIN_TRAVAIL'=>$exp_fin_travail,
			'EXP_SALAIRE'=>$exp_salaire,
			'EXP_NBRE_PERS_SORD'=>$exp_nbre_pers_sord,
			'EXP_TACHE'=>$exp_tache,
			'EXP_MOTIF_DEP'=>$exp_motif_dep,
			'FK_CANDIDAT_ID'=>$candidat_id);
		
		    $Cnn=$obj_exper->ma_connexion();
		
		
		//-------------------------------- enregistrement validation ------------------------------//
		
		 $obj_validation=new Validation_cadidature_class();
		 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
		 
		 $date_enreg=$Tab_date["date_enreg"];
		 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		 
		 $param_validation= array(
									 "etape"=>"5",
									 "date"=>$date_enreg,
									 "id_annonce"=>$fk_annonce_id,
									 "id_candidat"=>$candidat_id,
									 "libelle"=>"Experience"
		                         );
								 
		 $recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
		 $recu1=$obj_exper->ajouter_enreg_experience_professionnelle($Tab_param,$Cnn);
		 
		//-----------------------  fin validation --------------------------------------------------// 
		
		if($recu==true && $recu1=true){ echo "OK" ;}
		else{ echo "KO";}

?>