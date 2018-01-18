<?php
 @session_start();
 require_once($_SESSION['AVP_CONFIG']);
 $obj_secteur=new Secteur_class();
 $obj_annonce=new Annonce_class();
 $obj_postulation=new Postulation_class();


 $lister_annonces=$obj_annonce->lister_annonce();

 $liste_secteur=$obj_secteur->lister_secteur();
 $role="";
 $fk_util_user="";
 
 if(isset($_SESSION["role"]))
 {
	 $role=@$_SESSION["role"];
 }

 $fk_util_user=@$_SESSION["id_user"];

?>

<div class="container"  class="col-sm-12">

<div class="col-sm-11" style="margin-left:-25px;">
  <ol class="breadcrumb" >
      <li><a href="#">Recrutements</a></li>
      <li><a href="#">Postes Vacants</a></li>
      <li class="active">Liste des Avis de Postes Vacants (AVP)</li>
   </ol>
   
    <?php if(@$_SESSION["role"]=="1"){ echo '<center><a href="?page=annonces" class="btn-sm btn-info" style="text-decoration:none;" >Ajouter Annonce</a></center>';} ?>
<table id="example" class="display" cellspacing="0" width="100%" style="float:left;">
    <thead>
        <tr>
            <th>Numero</th>
            <th>Titre</th>
            <th>Date debut</th>
            <th>Date fin</th>
            <th>Age</th>
            <th>Date creation</th>
            <th>Etat</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
       <?php 
	   foreach($lister_annonces as $row)
	   {
		   $date_deb=$row[$obj_annonce->GetCh_ANNONCE_DATE_DEB()];
		   $date_fin=$row[$obj_annonce->GetCh_ANNONCE_DATE_FIN()];
		   $date_creation=$row[$obj_annonce->GetCh_ANNONCE_DATE_CREATION()];
	
		 ($obj_annonce->La_date_est_en($date_fin)==true) ? $date_fin=$obj_annonce->dateswitch($date_fin): $date_fin;
		 ($obj_annonce->La_date_est_en($date_deb)==true) ? $date_deb=$obj_annonce->dateswitch($date_deb): $date_deb;
		 ($obj_annonce->La_date_est_en($date_creation)==true) ? $date_creation=$obj_annonce->dateswitch($date_creation): $date_creation;
	   ?>
        <tr>
            <td class="col-sm-1"><?php  echo $row[$obj_annonce->GetCh_ANNONCE_NUM()];?></td>
            <td><?php  echo $row[$obj_annonce->GetCh_ANNONCE_TITRE()];?></td>
            <td class="col-sm-2"><?php  echo $date_deb;   ?></td>
            <td class="col-sm-1"><?php  echo $date_fin;   ?></td>
            <td class="col-sm-1"><?php  echo $row[$obj_annonce->GetCh_ANNONCE_AGE()];?></td>
            <td class="col-sm-2"><?php  echo $date_creation;?></td>
            <td class="col-sm-1"><?php  echo $row[$obj_annonce->GetCh_ETAT()];?></td>
            <?php
			if($role=="1")
			{
			?>
                <td class="col-sm-2">
                   <a href="?page=annonce_detail&annonce_id=<?php  echo $row[$obj_annonce->GetCh_ANNONCE_ID()];?>" class="btn-sm btn-success"><i class="icon-pencil icon-white"></i>Modifier</a>
                   <a href="controler/Annonce_controler.php?joker=3&annonce_id=<?php echo $row[$obj_annonce->GetCh_ANNONCE_ID()];?>" onclick="return confirm('Vouler vous supprimer cet annonce');" class="btn-sm btn-danger"><i class="icon-trash icon-white"></i>Supprimer</a>
                   
                </td>   
            <?php
			}
			else
			{
			?>
             <td class="col-sm-2">
             <a href="<?php echo ANNONCE.$row[$obj_annonce->GetCh_ANNONCE_LIEN()];?>" class="btn-sm btn-warning" target="_blank">En savoir Plus</a>  <?php   
			   if($obj_postulation->check_nbrepostule($fk_util_user)==false)
			   {
				   $page="form_coord_personnelles";
			   }
			   else if($obj_postulation->check_nbrepostule($fk_util_user)==true)
			   {
				   $page="form_competence1";
			   }
			   ?>
               <?php
			    if($obj_postulation->check_nbre_postul($fk_util_user,$row[$obj_annonce->GetCh_ANNONCE_ID()])==false && $fk_util_user!="")
			   {
			   ?>
               <a href="?page=<?php echo $page;?>&annonce_id=<?php echo $row[$obj_annonce->GetCh_ANNONCE_ID()];?>" class="btn-sm btn-info">Postuler</a>
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
</div>
<script>

 /* $(document).ready(function() 
  {
    $('#example').DataTable(
	{
		
        "language": {
    "sProcessing":     "Traitement en cours...",
    "sSearch":         "Rechercher&nbsp;:",
    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
    "sInfo":           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
    "sInfoEmpty":      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
    "sInfoPostFix":    "",
    "sLoadingRecords": "Chargement en cours...",
    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
    "oPaginate": {
        "sFirst":      "Premier",
        "sPrevious":   "Pr&eacute;c&eacute;dent",
        "sNext":       "Suivant",
        "sLast":       "Dernier"
    },
    "oAria": {
        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
    }
}
    }
	
	);
} );
*/
</script>