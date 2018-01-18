<?php
 @session_start();
 require_once($_SESSION['AVP_CONFIG']);
 $obj_secteur=new Secteur_class();
 $obj_annonce=new Annonce_class();
 $obj_postulation=new Postulation_class();
 $obj_candidat=new Candidat_class();

 $lister_annonces=$obj_annonce->lister_annonce();
 $liste_secteur=$obj_secteur->lister_secteur();
 
 
 $obj_postulation=new Postulation_class();


	if(!@$_SESSION["id_user"])
	{
	   $obj_postulation->session_valide();	
	}
 
 $role=@$_SESSION["role"];
 $fk_util_id=@$_SESSION["id_user"];
 
 //------------------ recuperation de  id du candidat ----------------------//
	 
	   $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
	   $candidat_id=@$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
  //-------------------------------------------------------------//

?>
<div class="container"  class="col-sm-11">

<div class="col-sm-11" style="margin-left:-25px;">


   <ol class="breadcrumb" >
      <li><a href="#">Recrutements</a></li>
      <li><a href="#">Postes Vacants</a></li>
      <li class="active">Liste des Postulants/Candidats</li>
   </ol>
<table id="example" class="display" cellspacing="0" width="100%" style="float:left;">
    <thead>
        <tr>
            <th>Numero</th>
            <th>Titre</th>
            <th>Date debut</th>
            <th>Date fin</th>
             <th>Age</th>
            <th>Date creation</th>
            <th width="1%">Etat</th>
            <th style="width:90px;">Actions</th>
        </tr>
    </thead>
 
   
 
    <tbody>
       <?php 
	   foreach($lister_annonces as $row)
	   {
	   ?>
        <tr>
            <td class="col-sm-1"><?php  echo $row[$obj_annonce->GetCh_ANNONCE_NUM()];?></td>
            <td><?php  echo $row[$obj_annonce->GetCh_ANNONCE_TITRE()];?></td>
            <td><?php   if($obj_annonce->La_date_est_en($row[$obj_annonce->GetCh_ANNONCE_DATE_DEB()])==true)
			{echo $obj_annonce->dateswitch($row[$obj_annonce->GetCh_ANNONCE_DATE_DEB()]);}
			
			else
			{
				echo $row[$obj_annonce->GetCh_ANNONCE_DATE_DEB()];
			}
			?>
			</td>
           <td>
		<?php  
		if($obj_annonce->La_date_est_en($row[$obj_annonce->GetCh_ANNONCE_DATE_FIN()])==true)
		{echo $obj_annonce->dateswitch($row[$obj_annonce->GetCh_ANNONCE_DATE_FIN()]);}
		else
		{  echo $obj_annonce->dateswitch($row[$obj_annonce->GetCh_ANNONCE_DATE_FIN()]);
		}
		?></td>
            <td><?php  echo $row[$obj_annonce->GetCh_ANNONCE_AGE()];?></td>
            <td><?php  if($obj_annonce->La_date_est_en($row[$obj_annonce->GetCh_ANNONCE_DATE_CREATION()])==true)
		{ echo $obj_annonce->dateswitch($row[$obj_annonce->GetCh_ANNONCE_DATE_CREATION()]);}
		else
		{ echo $row[$obj_annonce->GetCh_ANNONCE_DATE_CREATION()];}
		?></td>
            <td><?php  echo $row[$obj_annonce->GetCh_ETAT()];?></td>
            <?php
			if($role=="1")
			{
			?>
                <td>
                   <a href="?page=liste_des_candidats&annonce_id=<?php  echo $row[$obj_annonce->GetCh_ANNONCE_ID()];?>" class="btn-sm btn-info"><i class="icon-pencil icon-white"></i>Candidats</a>
                   <a href="?page=liste_des_postulants&annonce_id=<?php  echo $row[$obj_annonce->GetCh_ANNONCE_ID()];?>" class="btn-sm btn-info">Postulants</a>
                    <a href="?page=saisi_note_ponderation&annonce_id=<?php  echo $row[$obj_annonce->GetCh_ANNONCE_ID()];?>" class="btn-sm btn-info">Saisi Note</a>
                   
                </td>
            <?php
			}
			else
			{
			?>
             <td>
             <a href="?page=detail_annonce&id_annonce=<?php  echo $row[$obj_annonce->GetCh_ANNONCE_ID()];?>" class="btn-sm btn-warning" >En savoir Plus</a> &nbsp;
             
             <?php   
			   if($obj_postulation->check_nbre_postul($fk_util_id,$row[$obj_annonce->GetCh_ANNONCE_ID()])==true)
			   {
			   ?>
             <a href="?page=form_coord_personnelles&id_annonce=<?php  echo $row[$obj_annonce->GetCh_ANNONCE_ID()];?>" class="btn-sm btn-info">Postuler</a>
              <?php 
			   }
			  ?>
            
             </td>
             <?php
			   }
			 ?>
        </tr>
        <?php
	   }
		?>
      
    </tbody>
</table>
</div>