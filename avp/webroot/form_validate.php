<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);

$obj_postulation=new Postulation_class();


	if(!@$_SESSION["id_user"])
	{
	   $obj_postulation->session_valide();	
	}

$annonce_id="";
if(isset($_GET["annonce_id"]))
{
   $annonce_id=$_GET["annonce_id"];	
}
$obj_validation= new Validation_cadidature_class();
$obj_postulation=new Postulation_class();

 $fk_util_id=$_SESSION["id_user"];
 $obj_candidat=new Candidat_class();
 //------ recuperation de  id du candidat -----------------//
 
$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
$fk_candidat_id=@$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];



?>
<center>
<div class="span10"  style="float:left;">
<?php

if($obj_postulation->check_nbrepostule($fk_util_id)==true)
{ 
   $val_requis=$obj_validation->Validation_after_postul($annonce_id,$fk_candidat_id);
   include(WEBROOT_DIR."menu_postvalide.php");
}else
{
   $val_requis=$obj_validation->Validation_requis($annonce_id,$fk_candidat_id);
   include(WEBROOT_DIR."menu_gauche.php");
}
?>
<div class="container">
<form  class="form-horizontal" action="controler/Postulation_controler.php" method="POST"  id="form" name="form"  <?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo 'onsubmit="return check_post();"'; }else{ echo 'onsubmit="return check_post1();"'; } ?> >
        <fieldset  class="col-sm-9">
          <legend>12-Valdation Finale</legend>
        
          <?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ ?>
          
            <div class="checkbox disabled" >
                <div class="col-sm-1"></div>
                 <label><input type="checkbox"   name="v_coord_pers" id="v_coord_pers"  value="1" <?php  if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"1")===true) { echo 'checked'; } ?>  disabled  >Coordonnées Personnelles</label>
                 <?php if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"1")==false){ echo '   <font color="red">  Cet etape est requise vueiller la  completer</font>';}  ?>
            </div>
        <?php }  ?>
          
         <?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ ?> 
            <div class="checkbox disabled">
                <div class="col-sm-1"></div>
                <label><input type="checkbox"  name="v_formation" id="v_formation"  value="2" <?php  if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"2")===true) { echo 'checked'; } ?>  disabled>Formation</label>
                  <?php if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"2")==false){ echo '   <font color="red">  Cet etape est requise vueiller la completer</font>';}  ?>
            </div>
            <?php }  ?>
            
             <?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ ?>
            <div class="checkbox disabled">
                <div class="col-sm-1"></div>
                  <label><input type="checkbox"   name="v_travail_fin_etude" id="v_travail_fin_etude"    value="3" <?php  if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"3")===true) { echo 'checked'; } ?>  disabled>Travail Fin d'etude</label>
                  
            </div>
           <?php }  ?> 
            
             <?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ ?>
            <div class="checkbox disabled">
                <div class="col-sm-1"></div>
                 <label><input type="checkbox"  name="v_autre_formation" id="v_autre_formation"  value="4"  <?php  if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"4")===true) { echo 'checked'; } ?>  disabled>Autres formations</label>
                  
            </div>
             <?php }  ?>
            
             <?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ ?>
            <div class="checkbox disabled">
                <div class="col-sm-1"></div>
                <label><input type="checkbox"  name="v_experience" id="v_experience"  value="5" <?php  if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"5")===true) { echo 'checked'; } ?>  disabled>Experiences</label>
                 <?php if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"5")==false){ echo '   <font color="red">  Cet etape est requise vueiller la  completer</font>';}  ?>
            </div>
            <?php }  ?>
            
            
             <?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ ?>
            <div class="checkbox disabled">
                <div class="col-sm-1"></div>
                  <label><input type="checkbox"  name="v_informatique" id="v_informatique"  value="6" <?php  if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"6")===true) { echo 'checked'; } ?>  disabled>Informatiques</label>
                  
            </div>
            <?php }  ?>
            
             <?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ ?>
            <div class="checkbox disabled">
                <div class="col-sm-1"></div>
                 <label><input type="checkbox" name="v_linguistique" id="v_linguistique" value="7"  <?php  if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"7")===true) { echo 'checked'; } ?>  disabled>Liguistiques</label>
                  
            </div>
            
           <?php }  ?> 
           
            <div class="checkbox disabled">
                <div class="col-sm-1"></div>
                <label><input type="checkbox"  name="v_competence" id="v_competence" value="8" <?php  if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"8")===true) { echo 'checked'; } ?>  disabled>Competences</label>
                 
            </div>
            
            <div class="checkbox disabled">
            <div class="col-sm-1"></div>
                  <label><input type="checkbox"  name="v_lettre_motive" id="v_lettre_motive" value="9" <?php if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"9")===true) { echo 'checked'; } ?>  disabled>Lettre de motivation</label>
               <?php if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"9")==false){ echo '   <font color="red">  Cet etape est requise vueiller la  completer</font>';}  ?>     
            </div>
            
             <?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ ?>
                 <div class="checkbox disabled">
                     <div class="col-sm-1"></div>
                     <label><input type="checkbox"  name="v_reference" id="v_reference" value="10"  <?php  if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"10")===true) { echo 'checked'; } ?>  disabled>Rèferences</label>
                 </div>
             <?php }  ?>
             
             <?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ ?>
                <div class="checkbox">
                    <div class="col-sm-1"></div>
                    <label><input type="checkbox"  name="v_piece_joint" id="v_piece_joint" value="11"  <?php  if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"11")===true) { echo 'checked'; } ?>  disabled>Pièces Jointes</label>
                     <?php if($obj_validation->fct_valid_By_IdAn_AND_idEtape($annonce_id,$fk_candidat_id,"11")==false){ echo '   <font color="red">  Cet etape est requise vueiller la  completer</font>';}  ?> 
                </div>
            <?php }  ?>
            
             <div class="form-group">
                  <div class="col-sm-1"></div>
             </div>
             
             <input type="hidden"  name="val_requis" id="val_requis" value="<?php echo $val_requis; ?>" />
             <div class="checkbox">
                <div class="col-sm-1"></div>
             <label><input type="checkbox"  name="id_cr" id="id_cr"  /> <label> 
               </div>
              <div class="form-group">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10">  
              Je certifie que les déclarations faites par moi en réponse aux questions ci-dessus sont, dans toute la mesure où je puis en être certain, vraies, complètes et exactes. Je prends note du fait que toute déclaration inexacte ou omission importante dans une notice personnelle ou toute autre pièce requise par l'ASECNA constitue, soit un rejet de la candidature, soit un motif de licenciement sans préavis ni indemnité si cela est décelé après l'engagement. </div>
             </div>
           
             <input type="hidden"  name="FK_annonce_id" id="FK_annonce_id" value="<?php echo $annonce_id; ?>" />
             <input type="hidden"  name="FK_UTIL_ID" id="FK_UTIL_ID" value="<?php echo $_SESSION["id_user"]; ?>" />
             <input type="hidden"  name="joker" id="joker" value="1" />
             
             
            <div class="form-group">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-1">
                     <button type="submit" class="btn btn-info " id="submit" >Valider</button>
                  </div>
                  
            </div>
        </fieldset>
</form>
</div>
</div>
</center>