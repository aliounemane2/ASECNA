<?php

@session_start();
 require_once($_SESSION['AVP_CONFIG']);


 $obj_postulation=new Postulation_class();
 $obj_candidat=new Candidat_class();

	if(!@$_SESSION["id_user"])
	{
	   $obj_postulation->session_valide();	
	}

 $role=$_SESSION["role"];
 $fk_util_user=$_SESSION["id_user"];
 
 $annonce_id="";
 
 if(isset($_GET["annonce_id"]))
 {
	$annonce_id=$_GET["annonce_id"];
	$liste_des_postulants=$obj_candidat->lister_des_postulants($annonce_id);
 }


?>


<div class="container"  class="col-sm-11">

<div class="col-sm-11" style="margin-left:-25px;">
<!--div class="panel panel-info" >
  <div class="panel-heading" class="col-sm-11">Liste des Candidats</div>
</div-->
 <ol class="breadcrumb" >
      <li><a href="#">Recrutements</a></li>
      <li><a href="#">Postes Vacants</a></li>
      <li class="active">Liste des Candidats</li>
   </ol>

<table id="example" class="display" cellspacing="0" width="100%" style="float:left;">
    <thead>
        <tr>
            <th>Matricule</th>
            <th>Civilité</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Age</th>
            <th>Date postulation</th>
            <th>Exporter</th>
        </tr>
    </thead>
 
    <tbody>
        <?php
		
		foreach($liste_des_postulants as $row)
		{
		  
		?>
        <tr>
            <td class="col-sm-1"><?php echo $row[$obj_candidat->GetCh_CANDIDAT_MATRICULE()]; ?></td>
            <td><?php echo $row[$obj_candidat->GetCh_CANDIDAT_CIVILITE()]; ?></td>
            <td><?php echo $row[$obj_candidat->GetCh_CANDIDAT_NOM()]; ?></td>
            <td><?php echo $row[$obj_candidat->GetCh_CANDIDAT_PRENOM()]; ?></td>
            <td><?php echo $obj_candidat->calcul_age($row[$obj_candidat->GetCh_CANDIDAT_DATE_NAISSANCE()]); ?></td>
            <td><?php echo $row[$obj_postulation->GetCh_postulation_date()]; ?></td>
            <td><a href="?page=listeCandidat&id=<?php echo $row[$obj_candidat->GetCh_CANDIDAT_ID()]; ?>&id_annonce=<?php echo @$annonce_id; ?>" target="_blank"><img src="images/pdf_icon.png" width="18" height="18" alt="Voir"/></td>
        </tr>
        <?php
		}
		
		?>
      
    </tbody>
</table>

</div>

<script>

  /*$(document).ready(function() 
  {
    $('#example').DataTable({
		
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
    });
	
		
		var tab=[];
		
		$("#lien_export").click( function()
		{
			$("input[type=checkbox]:checked").each(
				function()
				{
				  tab.push($(this).val());
				}
			);
	
			var originalHref =$("#lien_export").attr("href");
			$("#lien_export").attr('href',originalHref+'&tab='+tab);
	
		});
		
		
} );*/
</script>