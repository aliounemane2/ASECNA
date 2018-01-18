<?php
   @session_start();
   require_once("../_Init_file.php");
   
       
	    $obj_ponderation=new Ponderation_class();
		$lister_ponderation=$obj_ponderation->lister_ponderation();
		$chaine="";
	
		foreach($lister_ponderation as $row ){
			
		 $chaine.=$row[$obj_ponderation->GetCh_adequate_form()]."|||".$row[$obj_ponderation->GetCh_pert_experience()]."|||".$row[$obj_ponderation->GetCh_compt_specific()]."|||".$row[$obj_ponderation->GetCh_apt_manag_esprit()]."|||".$row[$obj_ponderation->GetCh_expe_con_asecna()]."|||".$row[$obj_ponderation->GetCh_con_infor()]."|||".$row[$obj_ponderation->GetCh_motiv_comp_redact()]."|||".$row[$obj_ponderation->GetCh_sens_initiative()]."|||".$row[$obj_ponderation->GetCh_autre_critere()];
		 								
		}
		 
		echo $chaine;

?>