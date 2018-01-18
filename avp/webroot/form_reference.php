<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);
$obj_reference=new Reference_class();
$obj_postulation=new Postulation_class();

$fk_annonce_id="";


if(!@$_SESSION["id_user"])
{
   $obj_postulation->session_valide();	
}

if(isset($_GET["annonce_id"]))
{
	$fk_annonce_id=@$_GET["annonce_id"];
	
}

 $fk_util_id=@$_SESSION['id_user'];
 $obj_candidat=new Candidat_class();
 $obj_postulation=new Postulation_class();
	   
 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
 $candidat_id=@$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
 
 $lister_reference=$obj_reference->lister_ref_By_CAND_ID($candidat_id);
  $nbre_ligne_autorise=0;
  $nbre_ligne_autorise=count($lister_reference);
 
    $ref_nom_ent="";
    $ref_nom_ent="" ;
	$ref_pers_cont="";
	$ref_post_occ="";
	$ref_tel="" ;
	$ref_ref_email="" ;
	$ref_rid="" ;
	$joker="1";
	$btn_enreg="Enregistrer";
	
    $lister_ref="";
	
	if($obj_postulation->check_nbrepostule($fk_util_id)==true)
	{ 
	  $joker=4;
	} 
 
	 if(isset($_GET["id_ref"]))
	 {
		 $id_ref=$_GET["id_ref"];
		 $lister_ref=$obj_reference->lister_reference($id_ref);
	 }
 
	 if(!empty($lister_ref))
	 {
		$ref_nom_ent=$lister_ref[0][$obj_reference->GetCh_REF_NOM_ENT()];
		$ref_pers_cont=$lister_ref[0][$obj_reference->GetCh_REF_PERS_CONT()];
		$ref_post_occ=$lister_ref[0][$obj_reference->GetCh_REF_POST_OCC()];
		$ref_tel=$lister_ref[0][$obj_reference->GetCh_REF_TEL()];
		$ref_email=$lister_ref[0][$obj_reference->GetCh_REF_EMAIL()];
		$ref_id=$lister_ref[0][$obj_reference->GetCh_REF_ID()];
		$joker="2";
		
		if($obj_postulation->check_nbrepostule($fk_util_id)==true)
		{ 
		  $joker=5;
		  
		} 
		
	 }
 
 
?>

<!--script type="text/javascript" src="js/validation_formulaire.js"> </script>
<script type="text/javascript" src="js/traitement_formulaire.js"> </script-->
<center>
 <div class="span10"  style="float:left;">
<?php

include(WEBROOT_DIR."menu_gauche.php");
?>


 <div class="container">
  
<form class="form-horizontal" action="controler/Reference_controler.php" method="POST"  name="form" id="form"  onsubmit="return compte_number_ligne_autorize('nbre_ligne_autorise','3','References');">
                        <fieldset  class="col-sm-9">
                        <span>Utiliser <strong>Enregistrer</strong> pour enregistrer et rester sur la meme page </span><br/>
               			<span>Utiliser <strong>Enregistrer et Continuer</strong>  pour enregistrer et aller à la page suivante </span><br/>
               			<span>Oubien utiliser <strong>Le menu gauche</strong> pour renseigner chaque etape de la Postulation </span><br/><br/>
                            <legend>10-Reference</legend>
      <span>Veuillez donner le nom et les coordonn&eacute;es de trois personnes n'ayant avec vous aucun lien de parent&eacute;
      et connaissant vos aptitudes professionnelles <br/> et vos qualit&eacute;s personnelles.<br/></span>
                               <div class="form-group">
                                <div class="col-sm-1"></div>
                             
                                        <label class="col-sm-3">Nom Entreprise : </label>
                                        <div class="col-sm-5">
                                        <input type="text" name="REF_NOM_ENT" id="REF_NOM_ENT" placeholder="" class="form-control"  value="<?php echo @$ref_nom_ent; ?>" >
                                    </div>
                                    </div>
                             <div class="form-group">
                                <div class="col-sm-1"></div>
                                    <label class="col-sm-3">Nom de la personne &agrave; contacter : </label>
                                        <div class="col-sm-5">
                                        <input type="text" name="REF_PERS_CONT" id="REF_PERS_CONT"  placeholder="" class="form-control" value="<?php echo @$ref_pers_cont; ?>" >
                                   </div>
                                </div>   
                                <div class="form-group">
                                   <div class="col-sm-1"></div>
                                     
                                    <label class="col-sm-3">Poste occup&eacute; : </label>
                                     <div class="col-sm-3">
                                        <input type="text" name="REF_POST_OCC" id="REF_POST_OCC" placeholder=""  class="form-control"  value="<?php echo @$ref_post_occ; ?>">
                                      </div>
                                     </div>
                                <div class="form-group">
                                   <div class="col-sm-1"></div>
                                      <label class="col-sm-3">T&eacute;l&eacute;phone : </label>
                                         <div class="col-sm-3">
                                        <input type="text" name="REF_TEL" id="REF_TEL" placeholder="" size="30" maxlength="10" class="form-control" onblur="return chiffres('REF_TEL');"  value="<?php echo @$ref_tel; ?>">
                                      </div>
                                    </div>
                                <div class="form-group">
                                   <div class="col-sm-1"></div>
                                     <label class="col-sm-3">Email : </label>
                                     <div class="col-sm-3">
                                    <input type="mail" name="REF_EMAIL"  id="REF_EMAIL" OnBlur="return validate_mail();" placeholder="" size="30" maxlength="30" class="form-control"  value="<?php echo @$ref_email; ?>">             
                                    </div>
                                    
                               </div>
                        </fieldset>
                        <input type="hidden" name="joker"  id="joker" value="<?php echo @$joker; ?>" />
                        <input type="hidden"  name="id_user"  id="id_user" value="<?php echo @$_SESSION["id_user"]; ?>" />
                        <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
                        <input type="hidden"  name="REF_ID" id="REF_ID" value="<?php echo @$ref_id; ?>" />
                        <input type="hidden"  name="nbre_ligne_autorise" id="nbre_ligne_autorise" value="<?php echo @$nbre_ligne_autorise; ?>" />
                    
                        
                        
                        <div class="form-group">
                     <div class="col-sm-6">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info" id="submit"  name="enregistrer_continue" value="<?php  echo $btn_enreg; ?>" ><?php  echo $btn_enreg; ?></button>
                       <?php  if(@$btn_enreg=="Enregistrer"){ echo '<button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit" '?> <?php echo ' value="Enregistrer et Continuer">Enregistrer et Continuer</button>';} ?>
                           
                        </div>
                      </div>
                    </div> 
 </form>
 </div>

<div class="col-sm-10" style="height:25px;margin-top:-30px;margin-left:50px;float:left">
&nbsp;&nbsp;&nbsp;&nbsp;
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nom entreprise</th>
            <th>Personne à Contact</th>
            <th>Poste occupeé</th>
            <th>Telephone</th>
            <th>Email</th>
          <th style="width:30px;">Action</th>
        </tr>
    </thead>
 
   
 
    <tbody>
       <?php 
	   foreach($lister_reference as $row)
	   {
	   
	   ?>
        <tr>
            <td><?php  echo $row[$obj_reference->GetCh_REF_NOM_ENT()];?></td>
             <td><?php echo $row[$obj_reference->GetCh_REF_PERS_CONT()];?></td>
            <td><?php  echo $row[$obj_reference->GetCh_REF_POST_OCC()];?></td>
            <td><?php  echo $row[$obj_reference->GetCh_REF_TEL()];?></td>
            <td><?php  echo $row[$obj_reference->GetCh_REF_EMAIL()];?></td>
            <td>
            <a href="index.php?page=form_reference<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; }else{ echo '&';} ?>id_ref=<?php  echo $row[$obj_reference->GetCh_REF_ID()];?>"  class="btn-sm btn-success">Editer</a>
            
            <a href="controler/Reference_controler.php?joker=3&id_ref=<?php echo $row[$obj_reference->GetCh_REF_ID()]."&annonce_id=".$fk_annonce_id;?>"  class="btn-sm btn-danger" <?php if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } else {  echo 'onclick="return confirm(\'Voulez vous supprimer cet enregistrement\')"'.'   class="btn-sm btn-danger"' ; } ?> >Supprimer</a></td>
        </tr>
        <?php
	   }
		?>
      
    </tbody>
</table>
</div>
</div>
</div>
</center>
