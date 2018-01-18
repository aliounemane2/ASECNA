<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);
$fk_annonce_id="";

if(isset($_GET["annonce_id"])){$fk_annonce_id=$_GET["annonce_id"]; }

$fk_util_id=@$_SESSION['id_user'];

$obj_candidat=new Candidat_class();
$obj_postulation=new Postulation_class();

$liste_can=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
$candidat_id=@$liste_can[0][$obj_candidat->GetCh_CANDIDAT_ID()];


/*Recuperation des infos sur l'annonce a postuler*/
$connexion = Connexion_class::getConnexion();
$req = $connexion->prepare("SELECT * FROM annonce WHERE ANNONCE_ID='".$_GET["annonce_id"]."'");
$req->execute();
$donnees = $req->fetch(PDO::FETCH_ASSOC);
/*fin*/
?>
<script>
function check_require()
{
	alert("Vueillez renseigner les informations de coordonnées personnelles etape 1 d'abord");
	return false;
}
</script>
<div class="span2" style="float:left;width:205px;margin-right:5px;font-size:12px;text-align:left;" >
 <!--Sidebar content-->
  <div class="panel panel-info">
         <!-- Default panel contents -->
      <!--<div class="panel-heading" >Candidature au poste de</div>-->
      <div class="panel-heading" ><strong><?php echo $donnees['ANNONCE_TITRE']; ?></strong></div>

      <!-- List group -->
      <ul class="list-group">
      <?php
	    if($obj_postulation->check_nbrepostule($fk_util_id)==true)
		{
	  ?>
        <li class="list-group-item"><a href="?page=form_coord_personnelles<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>">Coordonn&eacute;e personnelles</a>&nbsp;<span class="badge">1</span></li>
        <li class="list-group-item"><a href="?page=form_formation<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Formation</a><span class="badge">2</span></li>   
 <li class="list-group-item"><a href="?page=form_autres_form<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Autres formations</a><span class="badge">4</span></li>
 <li class="list-group-item"><a href="?page=form_experiences<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Exp&eacute;riences</a><span class="badge">5</span></li>
<li class="list-group-item"><a href="?page=form_lettre_motivation<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Lettre de Motivation</a><span class="badge">9</span></li>
<li class="list-group-item"><a href="?page=form_reference<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>References</a><span class="badge">10</span></li>
        <li class="list-group-item"><a href="?page=form_piece_joint<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?> <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Pieces Jointes</a><span class="badge">11</span></li>
         <li class="list-group-item"><a href="?page=recap_candidature<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>"  target="_blank"   
	 <?php 
     if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo 'onclick="return false"'; }
     else if($obj_postulation->check_nbrepostule($fk_util_id)==true && $candidat_id==""){ echo 'onclick="return false"';}
     ?> >Recap</a></li>
        <li class="list-group-item"><a href="?page=form_validate<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php 
     if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo 'onclick="return false"'; }
     else if($obj_postulation->check_nbrepostule($fk_util_id)==true && $candidat_id==""){ echo 'onclick="check_require(); return false"';}
     ?> >Validation Finale</a><span class="badge">12</span></li>
        
       <?php
		}else
		{
	   ?>
         <li class="list-group-item"><a href="?page=form_coord_personnelles<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>">Coordonn&eacute;e personnelles</a>&nbsp;<span class="badge">1</span></li>
        <li class="list-group-item"><a href="?page=form_formation<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Formation</a><span class="badge">2</span></li>
        <li class="list-group-item"><a href="?page=form_travail_fin_etude<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Travail de Fin d'etude</a><span class="badge">3</span></li>
        <li class="list-group-item"><a href="?page=form_autres_form<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Autres formations</a><span class="badge">4</span></li>
        <li class="list-group-item"><a href="?page=form_experiences<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Exp&eacute;riences</a><span class="badge">5</span></li>
        <li class="list-group-item"><a href="?page=form_informatique<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Informatiques</a><span class="badge">6</span></li>
        <li class="list-group-item"><a href="?page=form_linguistique<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Linguistiques</a><span class="badge">7</span></li>
        <li class="list-group-item"><a href="?page=form_competence<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Competences</a><span class="badge">8</span></li>
        <li class="list-group-item"><a href="?page=form_lettre_motivation<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Lettre de Motivation</a><span class="badge">9</span></li>
        <li class="list-group-item"><a href="?page=form_reference<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>References</a><span class="badge">10</span></li>
        <li class="list-group-item"><a href="?page=form_piece_joint<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?> <?php if($candidat_id==""){ echo 'onclick="check_require(); return false"';}?>>Pieces Jointes</a><span class="badge">11</span></li>
         <li class="list-group-item"><a href="?page=recap_candidature<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>"  target="_blank"   
	 <?php 
     //if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo 'onclick="return false"'; }
     //if($obj_postulation->check_nbrepostule($fk_util_id)==true && $candidat_id==""){ echo 'onclick="return false"';}
     ?> >Recap</a></li>
        <li class="list-group-item"><a href="?page=form_validate<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; } ?>" <?php 
     if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo 'onclick="return false"'; }
     else if($obj_postulation->check_nbrepostule($fk_util_id)==true && $candidat_id==""){ echo 'onclick="check_require(); return false"';}
     ?> >Validation Finale</a><span class="badge">12</span></li>
       <?php
		}
	   ?>
      </ul>
  </div>
 </div>