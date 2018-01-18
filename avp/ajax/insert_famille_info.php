<?php
   @session_start();
   require_once("../_Init_file.php");

       $famille_nom=strip_tags($_POST['FAMILLE_NOM']);
	   $famille_prenom=strip_tags($_POST['FAMILLE_PRENOM']);
	   $famille_structure=strip_tags($_POST['FAMILLE_STRUCTURE']);
	   $famille_degre=strip_tags($_POST['FAMILLE_DEGRE']);
	  
	   $fk_util_id=strip_tags($_POST['id_user']);
	   
	  
		//----------------------------------------------------------------//
		
         $Objcl=new Famille_class_class();
		 $obj_candidat=new Candidat_class();
	
		 //------------------ recuperation de  id du candidat ----------------------//
		 
		 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
		 $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		 //-------------------------------------------------------------//
		 
		  $Tab_param= array(
							'FAMILLE_NOM'=>$famille_nom,
							'FAMILLE_PRENOM'=>$famille_prenom,
							'FAMILLE_STRUCTURE'=>$famille_structure,
							'FAMILLE_DEGRE'=>$famille_degre,
							'FK_CANDIDAT_ID'=>$candidat_id
							
							);

		$Cnn=$Objcl->ma_connexion();
		
		if($Objcl->ajouter_enreg_famille($Tab_param,$Cnn)){ echo "OK" ;}
		else{ echo "KO";}



?>