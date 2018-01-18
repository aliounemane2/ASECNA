<?php

@session_start();
 require_once($_SESSION['AVP_CONFIG']);
 
 $obj_postulation=new Postulation_class();
 $obj_candidat=new Candidat_class();
 $obj_formation=new Formation_class();
 	
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
      <li class="active">Liste des Postulants</li>
   </ol>

<table id="example" class="display" cellspacing="0" width="100%" style="float:left;">
    <thead>
        <tr>
            <th>Matricule</th>
            <th>Dernière Formation</th>
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
        $candidat_id=$row[$obj_candidat->GetCh_CANDIDAT_ID()];
        $lister_formation=$obj_formation->lister_derniere_formation($candidat_id);
		
		$derniere_formation=$lister_formation[0][$obj_formation->GetCh_FORMATION_DIPLOME()];
    
    ?>
    <tr>
        <td class="col-sm-1"><?php echo $row[$obj_candidat->GetCh_CANDIDAT_MATRICULE()]; ?></td>
        <td class="col-sm-2"><?php echo @$derniere_formation; ?></td>
        <td class="col-sm-1"><?php echo $row[$obj_candidat->GetCh_CANDIDAT_CIVILITE()]; ?></td>
        <td><?php echo $row[$obj_candidat->GetCh_CANDIDAT_NOM()]; ?></td>
        <td><?php echo $row[$obj_candidat->GetCh_CANDIDAT_PRENOM()]; ?></td>
        <td class="col-xs-1"><?php echo $obj_candidat->calcul_age($row[$obj_candidat->GetCh_CANDIDAT_DATE_NAISSANCE()]); ?></td>
        <td class="col-xs-2"><?php echo $row[$obj_postulation->GetCh_postulation_date()]; ?></td>
        <td class="col-xs-1"><input type="checkbox"  name="id_export[]" id="id_export" value="<?php echo $row[$obj_candidat->GetCh_FK_UTIL_ID()];?>" ></td>
    </tr>
	<?php
    }
    
    ?>
      
    </tbody>
</table>
<div>
<div style="float:left;"><a id="link_send" style="text-decoration:none;"  href="index.php?page=synthese&candidat_selection_excel&id_annonce=<?php echo @$annonce_id; ?>" class="btn-sm btn-info" target="_blank">Exporter au format Excel</a></div>
<div style="width:150px;float:left;">
&nbsp;&nbsp;&nbsp;&nbsp;
</div>

<div style="float:right;margin-right:250px;">
<a id="link_send1" style="text-decoration:none;" href="controler/Postulation_controler.php?joker=4&annonce_id=<?php echo $annonce_id; ?>" class="btn-sm btn-info">Candidats retenus</a></div>
</div>
</div>

<script>

  $(document).ready( function() 
  {
			$("#link_send").click( function()
			{
				var tab=[];
				$("input[type=checkbox]:checked").each(
					function()
					{
						
					    tab.push($(this).val());
					}
				);
				
				var originalHref =$("#link_send").attr("href");
				$("#link_send").attr('href',originalHref+'&tab='+tab);
				
			});
			
			$("#link_send1").click( function()
			{
				var tab1=[];
				
				$("input[type=checkbox]:checked").each(
					function()
					{
					    tab1.push($(this).val());
					}
				);
				
				if(tab1==""){
					alert("Vous devez cocher au moins un candidat");
					return false;
				}
				else{
					var originalHref =$("#link_send1").attr("href");
					$("#link_send1").attr('href',originalHref+'&tab='+tab1);
				}
				
			});
		
});
</script>