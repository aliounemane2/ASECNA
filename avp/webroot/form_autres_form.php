<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);
$obj_form=new Autre_formation_class();
$obj_postulation=new Postulation_class();


if(!@$_SESSION["id_user"])
{
  $obj_postulation->session_valide();	
}


$fk_annonce_id="";

if(isset($_GET["annonce_id"]))
{
	$fk_annonce_id=$_GET["annonce_id"];
	
}

$obj_candidat=new Candidat_class();
$fk_util_id=@$_SESSION["id_user"];
$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
$candidat_id=@$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
$lister_formation=$obj_form->lister_autre_formBy_CAN_ID($candidat_id);
$nbre_ligne_autorise=0;
$nbre_ligne_autorise=count($lister_formation);

$id_formation="";
$lister_form="";


if(isset($_GET["id_formation"]))
{
	$id_formation=$_GET["id_formation"];
	$lister_form=$obj_form->lister_autre_formation($id_formation);
}


		$formation_id="";
		$formation_an_deb="";
		$form_nom="";
		$formation_intitule="";
		$fk_candidat_id="";
		$formation_lib="";
		$formation_diplome_fich="";
		$joker="1";
		$btn_enreg="Enregistrer";

        if($obj_postulation->check_nbrepostule($fk_util_id)==true)
		{ 
		  $joker=4;
		}             

if(!empty($lister_form) && $id_formation!="")
{
	$formation_id=$lister_form[0][$obj_form->GetCh_FORM_ID()];
	$formation_an_deb=$lister_form[0][$obj_form->GetCh_FORMATION_AN_DEB()];
	$form_nom=$lister_form[0][$obj_form->GetCh_FORM_NOM()];
	$formation_intitule=$lister_form[0][$obj_form->GetCh_FORM_INTITULE()];
	$fk_candidat_id=$lister_form[0][$obj_form->GetCh_FK_CANDIDAT_ID()];
	$formation_lib=$lister_form[0][$obj_form->GetCh_FORM_LIB()];
	$formation_diplome_fich=$lister_form[0][$obj_form->GetCh_AUTRE_FORMATION_DIPLOME_FICHIER()];
	$joker="2";
	
	if($obj_postulation->check_nbrepostule($fk_util_id)==true)
	{ 
	  $joker=5;
	} 
	
}

?>
<center>
<div class="span10"  style="float:left;">
<?php

include(WEBROOT_DIR."menu_gauche.php");
?>


<div class="container">

<form class="form-horizontal" method="POST"  action="controler/Autre_formation_controler.php"  enctype="multipart/form-data"  id="form" name="form"  onsubmit="return compte_number_ligne_autorize('nbre_ligne_autorise','5','Autres Formations');">
              <fieldset class="col-sm-9">
                  <span>Utiliser <strong>Enregistrer</strong> pour enregistrer et rester sur la meme page </span><br/>
               	  <span>Utiliser <strong>Enregistrer et Continuer</strong>  pour enregistrer et aller à la page suivante </span><br/>
               	  <span>Oubien utiliser <strong>Le menu gauche</strong> pour renseigner chaque etape de la Postulation </span><br/><br/>
              <legend>4-Autre Formation </legend>
                      <div class="form-group">
                        <div class="col-sm-1"></div>
                          
                                <label class="col-sm-3">Intitul&eacute; de la formation  <font color=red>*</font></label>
                                 <div class="col-sm-5"> 
                                    <INPUT type="text" name="FORM_LIB"  id="FORM_LIB" placeholder=""  value="<?php echo @$formation_lib; ?>"  size="30" maxlength="30" class="form-control"/>
                             </div>
                         </div>
                         
                         <div class="form-group">
                              <div class="col-sm-1"></div>
                            
                               <label class="col-sm-3">Ann&eacute;e : <font color=red>*</font></label>
                                <div class="col-sm-3">
                                <SELECT  name="FORMATION_AN_DEB"  id="FORMATION_AN_DEB" class="form-control">
                                        <option value="">S&eacute;lectionnez</option>
                                       <?php for($i=date('Y');$i>1960; $i--)
										{
											
                                         ?>   
                                         <OPTION VALUE=<?php echo $i; ?> <?php if(@$formation_an_deb==$i){ echo 'selected';} ?> ><?php echo $i; ?></OPTION>                                    
									 <?php
										}
                                       ?>
                                    </SELECT>
                               </div> 
                          </div> 
                            
                          <div class="form-group">
                              <div class="col-sm-1"></div>
                             <label class="col-sm-3">Centre de formation    : <font color=red>*</font></label>
                              <div class="col-sm-5"> 
                              <INPUT type="text" name="FORM_NOM" placeholder="" id="FORM_NOM" value="<?php echo @$form_nom; ?>"  size="30" maxlength="30" class="form-control"   />
                            </div>
                           </div>
                           
                           <div class="form-group">
                           <div class="col-sm-1"></div>
                         
                             <label class="col-sm-3">Dipl&ocirc;me : <font color=red>*</font></label>
                               <div class="col-sm-5">
                             <input type="hidden" name="old_fichier"  id="old_fichier" value="<?php  echo $formation_diplome_fich;?>"   >
                             <input type="file" name="AUTRE_FORMATION_DIPLOME_FICHIER"  id="AUTRE_FORMATION_DIPLOME_FICHIER" value=""  class="filestyle" data-buttonBefore="true" data-buttonText="Choisir Fichier"  accept="image/*" ><span >*.jpg;*.png; taille= 5Mo </span>&nbsp;&nbsp;
                             <span style="color:#003"><?php if(@$formation_diplome_fich!="") { echo @$formation_diplome_fich;}?></span>
                              </div>
                       </div>
                           
                             <div class="form-group">
                              <div class="col-sm-1"></div>
                               <label  class="col-sm-3">Utilit&eacute; pour les fonctions : <font color=red>*</font></label>
                               <div class="col-sm-5"> 
                               <INPUT type="text" name="FORM_INTITULE" placeholder="" id="FORM_INTITULE" value="<?php echo @$formation_intitule; ?>"  size="30" maxlength="30" class="form-control" />
                                </div>
                          
                        </div> 
                        
                        
                     
                       <input type="hidden"  name="joker" id="joker" value="<?php echo @$joker; ?>" />
                       <input type="hidden"  name="FK_UTIL_ID" id="FK_UTIL_ID" value="<?php echo @$_SESSION['id_user']; ?>" />
                       <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
                       <input type="hidden"  name="FORM_ID" id="FORM_ID" value="<?php echo @$formation_id; ?>" />
                       <input type="hidden"  name="FK_CANDIDAT_ID" id="FK_CANDIDAT_ID" value="<?php echo @$candidat_id; ?>" />
                       <input type="hidden"  name="nbre_ligne_autorise" id="nbre_ligne_autorise" value="<?php echo @$nbre_ligne_autorise; ?>" />
                    
                    </fieldset>
                   
                     <div class="form-group">
                     <div class="col-sm-6">
                        <div class="modal-footer">
                         <button type="submit" class="btn btn-info" id="submit"  name="enregistrer_continue" value="<?php  echo $btn_enreg; ?>" ><?php  echo $btn_enreg; ?></button>
                       <?php  if(@$btn_enreg=="Enregistrer"){ echo '<button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit" '?>  <?php echo ' value="Enregistrer et Continuer">Enregistrer et Continuer</button>';} ?>
                           
                        </div>
                      </div>
                    </div>
</form>

<div class="col-sm-1" ></div>
<div class="col-sm-10" style="float:left;margin-top:-40px;">
&nbsp;&nbsp;&nbsp;&nbsp;
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Cycle</th>
            <th>Année debut</th>
            <th>Nom</th>
            <th>Intitulé</th>
            <th>Diplome</th>
            <th>Actions</th>
            
        </tr>
    </thead>
 
   
 
    <tbody>
       <?php 
	   foreach($lister_formation as $row)
	   {
	   
	   ?>
        <tr>
            <td><?php  echo $row[$obj_form->GetCh_FORM_LIB()];?></td>
            <td><?php  echo $row[$obj_form->GetCh_FORMATION_AN_DEB()];?></td>
            <td><?php  echo $row[$obj_form->GetCh_FORM_NOM()];?></td>
            <td><?php  echo $row[$obj_form->GetCh_FORM_INTITULE()];?></td>
            <td><?php  echo $row[$obj_form->GetCh_AUTRE_FORMATION_DIPLOME_FICHIER()];?></td>
            <td>
            <a href="index.php?page=form_autres_form<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; }else{ echo '&';} ?>id_formation=<?php  echo $row[$obj_form->GetCh_FORM_ID()];?>"  class="btn-sm btn-success">Editer</a>
            <a href="controler/Autre_formation_controler.php?joker=3&id_formation=<?php  echo $row[$obj_form->GetCh_FORM_ID()]."&annonce_id=".$fk_annonce_id;?>"  class="btn-sm btn-danger"  <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } else {  echo 'onclick="return confirm(\'Voulez vous supprimer cet enregistrement\')"'.'   class="btn-sm btn-danger"' ; } ?>>Supprimer</a></td>
        </tr>
        <?php
	   }
		?>
      
    </tbody>
</table>
</div>
</div>

</center>

