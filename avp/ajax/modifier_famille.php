<?php
    @session_start();
    require_once("../_Init_file.php");
	
	
	$famille_nom=$_POST["famille_nom"];
	$famille_prenom=$_POST["famille_prenom"];
	$famille_degre=$_POST["famille_degre"];
	$famille_structure=$_POST["famille_structure"];
	$famille_id=$_POST["famille_id"];
	$candidat_id=$_POST["candidat_id"];
	$fk_annonce_id=$_POST["fk_annonce_id"];
	
	
	$obj_famille=new Famille_class();
	
	$Cnn=$obj_famille->ma_connexion();
	
	
	if($candidat_id!="")
	{
		
		
		$Tab_param=array(
                        "FAMILLE_NOM"=>$famille_nom,
						"FAMILLE_PRENOM"=>$famille_prenom,
						"FAMILLE_STRUCTURE"=>$famille_structure,
						"FAMILLE_DEGRE"=>$famille_degre,
						"FK_CANDIDAT_ID"=>$candidat_id,
						'FAMILLE_ID'=>$famille_id
						);
						
			$Cnn=$obj_famille->ma_connexion();
			$chaine="";
			
			if($obj_famille->modifier_enreg_famille($Tab_param,$Cnn)==true)
			{
				$liste_famille=@$obj_famille->lister_famille_By_CAND_ID($candidat_id);
				$nbre=count($liste_famille);
			
				foreach($liste_famille as $row)
				{
					$chaine.='<tr>'.
					'<td>'.$row[$obj_famille->GetCh_FAMILLE_NOM()].'</td>'.
					'<td>'.$row[$obj_famille->GetCh_FAMILLE_PRENOM()].'</td>'.
					'<td>'.$row[$obj_famille->GetCh_FAMILLE_STRUCTURE()].'</td>'.
					'<td>'.$row[$obj_famille->GetCh_FAMILLE_DEGRE()].'</td>'.
					'<td style="height:35px;">'.
					 '<a href="index.php?page=form_coord_personnelles&id_famille='.$row[$obj_famille->GetCh_FAMILLE_ID()].'"&annonce_id="'.$fk_annonce_id.'"  class="btn-sm btn-success">Modifier</a>'.'&nbsp;&nbsp;'.
					'<a href="controler/Famille_controler.php?joker=3&id_famille='.$row[$obj_famille->GetCh_FAMILLE_ID()].'"&annonce_id="'.$fk_annonce_id.'" style="height:35px;" class="btn-sm btn-danger" onclick="return confirm('.'Voulez vous supprimer cet enregistrement'.')" >Supprimer</a></td>'.
				'</tr>';
					
				}
				
				echo $chaine."###".$nbre ;
				
			}
			else
			{
				echo "KO";
			}
		
	}
	
	
	
	

?>