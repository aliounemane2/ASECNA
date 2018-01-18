<?php
   @session_start();
   require_once("_Init_file.php");
   
        
    $obj_postul=new Postulation_class();
	$Cnn=$obj_postul->ma_connexion();
	 $obj_candidat=new Candidat_class();
	
	
	
	$fk_util_id=$_REQUEST["fk_util_id"];
	$annonce_id=$_REQUEST["annonce_id"];
	$retenu=$_REQUEST["retenu"];
	$note=$_REQUEST["note"];
	
	$liste_des_postulants=$obj_candidat->fct_candidat_info($annonce_id,$fk_util_id);
	$recu=$obj_postul->update_postulation($note,$fk_util_id,$annonce_id,$retenu);
	$chaine="";
	
	 if($recu==true )
	 { 
	    foreach($liste_des_postulants as $row)
		{
	       $chaine.='<tr>'.
            '<td>'.$row[$obj_candidat->GetCh_CANDIDAT_MATRICULE()].'</td>'.
            '<td>'.$row[$obj_candidat->GetCh_CANDIDAT_CIVILITE()].'</td>'.
            '<td>'.$row[$obj_candidat->GetCh_CANDIDAT_NOM()].'</td>'.
            '<td>'.$row[$obj_candidat->GetCh_CANDIDAT_PRENOM()].'</td>'.
            '<td>'.$row[$obj_postul->GetCh_note()].'</td>'.
            '<td>'.$obj_candidat->calcul_age($row[$obj_candidat->GetCh_CANDIDAT_DATE_NAISSANCE()]).'</td>'.
            '<td>'.$row[$obj_postul->GetCh_postulation_date()].'</td>'.
            '<td><input type="button" name="" class="btn-sm btn-info" id="id_note" value="Noter"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  title="'.$row[$obj_candidat->GetCh_FK_UTIL_ID()].'">'.
            '</td>'.
            '</tr>';
		
		}
		
		echo $chaine;
	 
	 }
	 else{ echo "KO";}

?>