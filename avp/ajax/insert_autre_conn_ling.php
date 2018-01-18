<?php
   @session_start();
   require_once("../_Init_file.php");
   
       
	     $obj_candidat=new Candidat_class();
		 $fk_util_id=strip_tags($_POST['id_user']);
		 	
		 //------ recuperation de  id du candidat -----------------//
		 
		$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		$candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];

         $obj_conn_ling=new Connaissances_linguistiques_class();
		
		$Tab_param=array(
						'LANGUE_NOM'=>strip_tags($_POST['AUTRE_LANGUE_NOM']),
						'LANGUE_ORALE'=>strip_tags($_POST['AUTRE_LANGUE_ORALE']),
						'LANGUE_ECRITE'=>strip_tags($_POST['AUTRE_LANGUE_ECRITE']),
						'LANGUE_LECTURE'=>strip_tags($_POST['AUTRE_LANGUE_LECTURE']),
						'FK_CANDIDAT_ID'=>$candidat_id,
						'Type'=>"AUTRE"
						);

		$Cnn=$obj_conn_ling->ma_connexion();
		
		
		//-------------------------------- enregistrement validation ------------------------------//
		
		 $obj_validation=new Validation_cadidature_class();
		 $Tab_date=$obj_validation->date_heure_systeme_jjmmaa();
		 
		 $date_enreg=$Tab_date["date_enreg"];
		 $fk_annonce_id=$_POST["FK_ANNONCE_ID"];
		 
		 $param_validation= array(
									 "etape"=>"7",
									 "date"=>$date_enreg,
									 "id_annonce"=>$fk_annonce_id,
									 "id_candidat"=>$candidat_id,
									 "libelle"=>"Linguistique"
		                         );
								 
		 $recu=$obj_validation->ajouter_enreg_validation_cadidature($param_validation,$Cnn);
		 $recu1=$obj_conn_ling->ajouter_enreg_connaissances_linguistiques($Tab_param,$Cnn);
		 
		//-----------------------  fin validation --------------------------------------------------// 
		
		if($recu==true && $recu1==true){ echo "OK" ;}
		else{ echo "KO";}

?>