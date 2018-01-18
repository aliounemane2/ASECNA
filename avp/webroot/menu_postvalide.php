<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);
$fk_annonce_id="";

if(isset($_GET["annonce_id"]))
{
	$fk_annonce_id=$_GET["annonce_id"];
}

$fk_util_id=@$_SESSION['id_user'];
$obj_candidat=new Candidat_class();
$liste_can=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
$candidat_id=@$liste_can[0][$obj_candidat->GetCh_CANDIDAT_ID()];


?>
<script>
function check_require()
{
	alert("Vueillez renseigner les informations de coordonnées personnelles etape 1 d'abord");
	return false;
}
</script>
<div class="span2"  style="float:left;width:205px;margin-right:5px;font-size:12px;text-align:left;" >
 <!--Sidebar content-->
  <div class="panel panel-info">
         <!-- Default panel contents -->
      <div class="panel-heading">Candidature au poste de</div>
        <!-- List group -->
      <ul class="list-group">
       
        <li class="list-group-item"><a href="?page=form_competence1&annonce_id=<?php echo $fk_annonce_id;?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Competences</a></li>
        <li class="list-group-item"><a href="?page=form_lettre_motivation1&annonce_id=<?php echo $fk_annonce_id;?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Lettre de Motivation</a></li>
        
       <li class="list-group-item"><a href="?page=form_validate&annonce_id=<?php echo $fk_annonce_id;?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Validation</a></li>
        
        
      </ul>
  </div>
 </div>