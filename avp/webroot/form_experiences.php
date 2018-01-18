<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);
$obj_exper=new Experience_professionnelle_class();
$fk_annonce_id="";

$obj_postulation=new Postulation_class();

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
 
	   
 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
 $candidat_id=@$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
 
 $lister_experience=@$obj_exper->lister_experience_prof_By_CAND_ID($candidat_id);
 
 $nbre_ligne_autorise=0;
 $nbre_ligne_autorise=count($lister_experience);
 
 
 $lister_exper="";
 $id_experience="";
 
		if(isset($_GET["id_experience"]))
		{
			$id_experience=$_GET["id_experience"];
			$lister_exper=@$obj_exper->lister_experience_professionnelle($id_experience);
		}
		
	
 
        $ex_poste="";
		$ex_ent_nom="";
		$ex_deb_travail="";
		$ex_deb_ann="";
		$ex_deb_mois="";
		$ex_sec_act="";
		    
		$ex_fin_travail="";
		
		$ex_fin_ann="";
		$ex_fin_mois="";
		
		$ex_salaire="";
		$exp_nbre_pers_sord="";
		$ex_tache="";
		$ex_motif_dep="";
		$fk_candidat_id="";
		$exp_id="";
		
	    $btn="Enregistrer";
	    $joker="1";
		
		if($obj_postulation->check_nbrepostule($fk_util_id)==true)
		{ 
		  $joker=4;
		} 
 
     if(!empty($lister_exper))
	 {
	    $ex_poste=$lister_exper[0][$obj_exper->GetCh_EXP_POSTE()];
		$ex_ent_nom=$lister_exper[0][$obj_exper->GetCh_EXP_ENT_NOM()];
		$ex_deb_travail=$lister_exper[0][$obj_exper->GetCh_EXP_DEBUT_TRAVAIL()];
		$ex_deb_str=explode("##",$ex_deb_travail);
		$ex_deb_ann=$ex_deb_str[0];
		$ex_deb_mois=$ex_deb_str[1];
		
		$ex_sec_act=$lister_exper[0][$obj_exper->GetCh_EXP_SEC_ACT()];
		$ex_fin_travail=$lister_exper[0][$obj_exper->GetCh_EXP_FIN_TRAVAIL()];
			$ex_fin_str=explode("##",$ex_fin_travail);
			$ex_fin_ann=$ex_fin_str[0];
			$ex_fin_mois=$ex_fin_str[1];
		
		$ex_salaire=$lister_exper[0][$obj_exper->GetCh_EXP_SALAIRE()];
		$exp_nbre_pers_sord=$lister_experience[0][$obj_exper->GetCh_EXP_NBRE_PERS_SORD()];
		$ex_tache=$lister_exper[0][$obj_exper->GetCh_EXP_TACHE()];
		$ex_motif_dep=$lister_exper[0][$obj_exper->GetCh_EXP_MOTIF_DEP()];
		$fk_candidat_id=$lister_exper[0][$obj_exper->GetCh_FK_CANDIDAT_ID()];
		$exp_id=$lister_exper[0][$obj_exper->GetCh_EXP_ID()];
	
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
  <form class="form-horizontal"  action="controler/Experience_professionnelle_controler.php" method="POST" id="form"  name="form"  onsubmit="return compte_number_ligne_autorize('nbre_ligne_autorise','7','Experience professionelles');">
                        <fieldset class="col-sm-9">
                        <span>Utiliser <strong>Enregistrer</strong> pour enregistrer et rester sur la meme page </span><br/>
               			<span>Utiliser <strong>Enregistrer et Continuer</strong>  pour enregistrer et aller à la page suivante </span><br/>
               			<span>Oubien utiliser <strong>Le menu gauche</strong> pour renseigner chaque etape de la Postulation </span><br/><br/>
                        <legend>5-Experience</legend>
                             <p>Veuillez commencer par l'emploi le plus r&eacute;cent</p>
                             <div class="form-group">
                               <div class="col-sm-1"></div>
                              
                                    <label class="col-sm-3">Poste occupé   : <font color=red>*</font></label>
                                     <div class="col-sm-3">
                                    <INPUT type="text" name="EXP_POSTE" id="EXP_POSTE" placeholder=""  size="30" maxlength="30" class="form-control"    value="<?php echo @$ex_poste; ?>"/>
                                    </div>
                                </div>     
                                <div class="form-group">
                               <div class="col-sm-1"></div>     
                                
                                    <label class="col-sm-3">Nom et adresse de l'employeur   :<font color=red>*</font> </label>
                                    <div class="col-sm-5">
                                    <INPUT type="text" name="EXP_ENT_NOM" placeholder=""   size="30" maxlength="30" class="form-control"    value="<?php echo @$ex_ent_nom; ?>"/>
                                </div>
                             </div>
                             
                             <div class="form-group">
                                <div class="col-sm-1"></div>
                              
                                    <label class="col-sm-3">Dur&eacute;e de l'emploi de   :<font color=red>*</font> </label>
                                    <div class="col-sm-2">

                                 <!--INPUT type="text"  name="EXP_DEBUT_TRAVAIL" id="EXP_DEBUT_TRAVAIL"   class="form-control"   value="<?php echo @$ex_deb_travail; ?>"/-->
                                <!--INPUT type="text"  name="EXP_DEBUT_MOIS" id="EXP_DEBUT_MOIS"  class="form-control"  value=""/>   
                                <INPUT type="text"  name="EXP_DEBUT_ANN" id="EXP_DEBUT_ANN"  class="form-control"  value=""/-->  
                                
                                <select name="EXP_DEBUT_ANN" id="EXP_DEBUT_ANN" class="form-control">
                                       <option value="">S&eacute;lectionnez</option>
                                       <?php for($i=date('Y');$i>1960; $i--)
										{
                                       ?>   
                                        <OPTION VALUE=<?php echo $i; ?> <?php if($ex_deb_ann==$i){ echo 'selected'; }?> ><?php echo $i; ?></OPTION>                                    
									   <?php
										}
                                       ?>
                                </select>  
                                </div>
                                <div class="col-sm-2"> 
                                 <select name="EXP_DEBUT_MOIS" id="EXP_DEBUT_MOIS" class="form-control">
                                       <option value="">S&eacute;lectionnez</option>
                                       
                                       <?php for($i=1;$i<=12; $i++)
										{
                                        ?>   
                                       <OPTION VALUE=<?php echo $i; ?> <?php if($ex_deb_mois==$i){ echo 'selected'; }?>><?php if($i<10){echo '0'.$i ;} else{ echo $i;} ?></OPTION>                                    
									   <?php
										}
                                       ?>
                                </select>
                                </div>
                                </div>
                                 <div class="form-group">
                                <div class="col-sm-1"></div>
                                
                                    <label class="col-sm-3">&agrave;<font color=red>*</font></label>
                                    <div class="col-sm-2">
                                    <!--INPUT type="text" name="EXP_FIN_TRAVAIL"  id="EXP_FIN_TRAVAIL" class="form-control"    value="<?php echo @$ex_fin_travail; ?>"  /-->
                                    
                                    <select name="EXP_FIN_ANN" id="EXP_FIN_ANN" class="form-control">
                                       <option value="">S&eacute;lectionnez</option>
                                       <?php for($i=date('Y');$i>1960; $i--)
										{
                                       ?>   
                                        <OPTION VALUE=<?php echo $i; ?> <?php if($ex_fin_ann==$i){ echo 'selected'; }?>><?php echo $i; ?></OPTION>                                    
									   <?php
										}
                                       ?>
                                </select>  
                                </div>
                                <div class="col-sm-2"> 
                                 <select name="EXP_FIN_MOIS" id="EXP_FIN_MOIS" class="form-control">
                                       <option value="">S&eacute;lectionnez</option>
                                       
                                       <?php for($i=1;$i<=12; $i++)
										{
                                        ?>   
                                       <OPTION VALUE=<?php echo $i; ?> <?php if($ex_fin_mois==$i){ echo 'selected'; }?>><?php if($i<10){echo '0'.$i ;} else{ echo $i;} ?></OPTION>
									   <?php
										}
                                       ?>
                                </select>
                                    </div>
                               </div>
                                
                                <div class="form-group">
                                <div class="col-sm-1"></div>
                               
                                    <label class="col-sm-3">Domaine d'activit&eacute;   : <font color=red>*</font></label>
                                 <div class="col-sm-5">
                                    <INPUT type="text" name="EXP_SEC_ACT" placeholder=""  size="30" maxlength="30" class="form-control"   value="<?php echo @$ex_sec_act; ?>" />
                                 </div>
                                
                              </div>
                              
                             
                             <div class="form-group">
                                <div class="col-sm-1"></div>
                                
                               
                                    <label class="col-sm-3">Salaire brut moyen mensuel(CFA)   : </label>
                                    
                                 <div class="col-sm-3">
                                    <INPUT type="text" name="EXP_SALAIRE" placeholder="" size="30" maxlength="10" class="form-control"   value="<?php echo @$ex_salaire; ?>"/>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                <label class="col-sm-3">Nombre de personnes plac&eacute;es sous vos ordres   : </label>
                                     <div class="col-sm-3">
                                    <INPUT type="text" name="EXP_NBRE_PERS_SORD" placeholder="" size="30" maxlength="10" class="form-control"   value="<?php echo @$exp_nbre_pers_sord; ?>"/>
                                </div>
                               </div>
                               
                              <div class="form-group">
                                <div class="col-sm-1"></div>  
                                
                                    <label class="col-sm-3">Motif du d&eacute;part   : <font color=red>*</font> </label>
                                     <div class="col-sm-5">
                                    <INPUT type="text"  name="EXP_MOTIF_DEP" placeholder="" size="30" maxlength="50" class="form-control"    value="<?php echo @$ex_motif_dep; ?>"/>
                                </div>
                               
                               </div>
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                                 
                                    <label class="col-sm-3">Description de vos t&acirc;ches,responsabilit&eacute;s et accomplissements   :<font color=red>*</font> </label><div class="col-sm-5">
                                    <textarea   name="EXP_TACHE" cols="35" rows="5" id="EXP_TACHE"  placeholder=""  class="form-control"  ><?php echo @$ex_tache; ?></textarea>
                                 </div>
                               
                             </div>
                             <input type="hidden" name="joker"  id="joker" value="<?php echo @$joker; ?>" />
                             <input type="hidden"  name="id_user"  id="id_user" value="<?php echo @$_SESSION["id_user"]; ?>" />
                             <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
                             <input type="hidden"  name="EXP_ID" id="EXP_ID" value="<?php echo @$exp_id; ?>" />
                             <input type="hidden"  name="nbre_ligne_autorise" id="nbre_ligne_autorise" value="<?php echo @$nbre_ligne_autorise; ?>" />
                    
                             
                        </fieldset>
                          <div class="form-group">
                     <div class="col-sm-8">
                        <div class="modal-footer">
                         <button type="submit" class="btn btn-info" id="submit" name="enregistrer_continue" value="<?php  echo $btn; ?>" ><?php  echo $btn; ?></button>
                       <?php  if(@$btn=="Enregistrer"){ echo '<button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit" '?>  <?php echo ' value="Enregistrer et Continuer">Enregistrer et Continuer</button>';} ?>
                           
                        </div>
                      </div>
                    </div>                 
                      </form>
                      
                      
 <div class="col-sm-11">
&nbsp;&nbsp;&nbsp;&nbsp;
<table id="example" class="display" cellspacing="0" width="100%" style="margin-right:45px;">
    <thead>
        <tr>
            <th>Experience ent nom</th>
            <th>Secteur activite</th>
            <th>Poste</th>
            <th>Date debut</th>
            <th>Date fin</th>
            <th>Tache</th>
            <th style="width:150px;">Action</th>
        </tr>
    </thead>
    <tbody>
       <?php 
	   foreach($lister_experience as $row)
	   {
		   $ex_deb_travail=$row[$obj_exper->GetCh_EXP_DEBUT_TRAVAIL()];
		   $ex_deb_str=explode("##",$ex_deb_travail);
		   $ex_deb_ann=$ex_deb_str[0];
		   $ex_deb_mois=$ex_deb_str[1];
		
		   $ex_fin_travail=$row[$obj_exper->GetCh_EXP_FIN_TRAVAIL()];
		
		   $ex_fin_str=explode("##",$ex_fin_travail);
		   $ex_fin_ann=$ex_fin_str[0];
		   $ex_fin_mois=$ex_fin_str[1];
		   
	   ?>
        <tr>
            <td><?php  echo $row[$obj_exper->GetCh_EXP_ENT_NOM()];?></td>
            <td><?php  echo $row[$obj_exper->GetCh_EXP_SEC_ACT()];?></td>
            <td><?php  echo $row[$obj_exper->GetCh_EXP_POSTE()];?></td>
            <td><?php  echo @$ex_deb_mois."  ".@$ex_deb_ann;?></td>
            <td><?php  echo @$ex_fin_mois."  ".@$ex_fin_ann;?></td>
            <td><?php  echo $row[$obj_exper->GetCh_EXP_TACHE()];?></td>
            <td>
            <a href="index.php?page=form_experiences<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; }else{ echo '&';} ?>id_experience=<?php  echo @$row[$obj_exper->GetCh_EXP_ID()];?>"  class="btn-sm btn-success" >Editer</a>
            <a href="controler/Experience_professionnelle_controler.php?joker=3&id_exp=<?php echo $row[$obj_exper->GetCh_EXP_ID()]."&annonce_id=".$fk_annonce_id;?>"  class="btn-sm btn-danger" <?php if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } else {  echo 'onclick="return confirm(\'Voulez vous supprimer cet enregistrement\')"'.'   class="btn-sm btn-danger"' ; } ?> >Supprimer</a>
            </td>
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
          
 
<script>
	 function test_annee_exp()
		 {
			var ann1=$('#EXP_DEBUT_TRAVAIL').val();
			var ann2=$('#EXP_FIN_TRAVAIL').val();
	
			if(ann1>ann2)
			{
				$('<span style="color:red;font-weight:bold;" id="spann_err">Annee debut de formation doit etre inferieure a Annee fin de formation</span>').insertAfter("#EXP_FIN_TRAVAIL");
				return false;
			}
			else
			{
			  $('#spann_err').remove();	
			}
		}    

 </script>
 


 