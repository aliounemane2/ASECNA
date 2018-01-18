<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);


$obj_connaissance_ling=new Connaissances_linguistiques_class();
$obj_postulation=new Postulation_class();


if(!@$_SESSION["id_user"])
{
   $obj_postulation->session_valide();	
}


$fk_annonce_id="";

if(isset($_GET["annonce_id"]))
{
	$fk_annonce_id=@$_GET["annonce_id"];
}
 
 
 $fk_util_id=@$_SESSION['id_user'];
 $obj_candidat=new Candidat_class();
	   
 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
 $candidat_id=@$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
 
 $lister_conn_ling=$obj_connaissance_ling->lister_conn_ling($candidat_id);
 $lister_autre_conn_ling=$obj_connaissance_ling->lister_conn_autre_ling($candidat_id);
 
  $nbre_ligne_autorise=0;
  $nbre_ligne_autorise=count($lister_autre_conn_ling);
 
 $langue_nom="";
 $langue_orale="";
 $langue_lecture="";
 $langue_ecrite="";
 $joker_normal="1";
 $btn_normal="Enregistrer";
 $id_ling_normal="";
 
 $langue_nom_autre="";
 $langue_orale_autre="";
 $langue_lecture_autre="";
 $langue_ecrite_autre="";
 $joker_autre="4";
 $btn_autre="Enregistrer";
 $id_ling_autre="";
 
 if(isset($_GET["id_linguistique"]) && $_GET["type"]=="NORMAL")
 {
	  $id_linguistique=$_GET["id_linguistique"];
	  $type=$_GET["type"];
	  
	  $liste_ling=$obj_connaissance_ling->lister_conn_ling_id_type($id_linguistique,$type);
	  $langue_nom=$liste_ling[0][$obj_connaissance_ling->GetCh_LANGUE_NOM()];
	  $langue_orale=$liste_ling[0][$obj_connaissance_ling->GetCh_LANGUE_ORALE()];
	  $langue_lecture=$liste_ling[0][$obj_connaissance_ling->GetCh_LANGUE_LECTURE()];
	  $langue_ecrite=$liste_ling[0][$obj_connaissance_ling->GetCh_LANGUE_ECRITE()];
	  $id_ling_normal=$liste_ling[0][$obj_connaissance_ling->GetCh_LANGUE_ID()];
	  
	  $joker_normal="2";
	  
 
 
	 
 }
 
 if(isset($_GET["id_ling_autre"]) && $_GET["type"]=="AUTRE")
 {
	  $id_linguistique=$_GET["id_ling_autre"];
	  $type=$_GET["type"];
	  
	  $liste_ling_autre=$obj_connaissance_ling->lister_conn_ling_id_type($id_linguistique,$type);

	  $langue_nom_autre=$liste_ling_autre[0][$obj_connaissance_ling->GetCh_LANGUE_NOM()];
	  $langue_orale_autre=$liste_ling_autre[0][$obj_connaissance_ling->GetCh_LANGUE_ORALE()];
	  $langue_lecture_autre=$liste_ling_autre[0][$obj_connaissance_ling->GetCh_LANGUE_LECTURE()];
	  $langue_ecrite_autre=$liste_ling_autre[0][$obj_connaissance_ling->GetCh_LANGUE_ECRITE()];
	  $id_ling_autre=$liste_ling_autre[0][$obj_connaissance_ling->GetCh_LANGUE_ID()];
	  
	  $joker_autre="5";
	  
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
<form  class="form-horizontal"  action="controler/Connaissances_linguistiques_controler.php"  method="POST"  name="form" id="form">
    
    <fieldset  class="col-sm-9">
      <legend>7-Linguistiques</legend>
      
       <span>Utiliser <strong>Enregistrer</strong> pour enregistrer et rester sur la meme page </span><br/>
               			<span>Utiliser <strong>Enregistrer et Continuer</strong>  pour enregistrer et aller à la page suivante </span><br/>
               			<span>Oubien utiliser <strong>Le menu gauche</strong> pour renseigner chaque etape de la Postulation </span><br/><br/>
        <span>Indiquez dans quelle mesure vous maîtrisez les langues ci-dessous</span><br/><br/>
            <div class="form-group">
            <div class="col-sm-1"></div>
                <label class="col-sm-3">Langue : </label>
                     <div class="col-sm-3">
                        <SELECT name="LANGUE_NOM" id="LANGUE_NOM" class="form-control"  >
                                <option value="">S&eacute;lectionnez</option>
                                <OPTION VALUE="Francais" <?php  if(@$langue_nom=="Francais"){ echo 'selected';}?>>Francais</OPTION>
                                <OPTION VALUE="Anglais" <?php   if(@$langue_nom=="Anglais"){ echo 'selected';}?>>Anglais</OPTION>
                         </SELECT>
                                       </div> 
                          </div> 
                          <div class="form-group">  
                                <div class="col-sm-1"></div> 
                                <label class="col-sm-3">Expression orale : </label>
                                <div class="col-sm-3">
                                <SELECT name="LANGUE_ORALE" id="LANGUE_ORALE" class="form-control" >
                                     <option value="">S&eacute;lectionnez</option>
                                    <OPTION VALUE="Base" <?php  if(@$langue_orale=="Base"){ echo 'selected';}?> >Base</OPTION>
                                    <OPTION VALUE="Moyen" <?php  if(@$langue_orale=="Moyen"){ echo 'selected';}?>>Moyen</OPTION>
                                    <OPTION VALUE="Avanc&eacute;" <?php  if(@$langue_orale=="Avancé"){ echo 'selected';}?>>Avanc&eacute;e</OPTION>
                                    </SELECT>
                               </div>
                         </div>
                                 <div class="form-group"> 
                                    <div class="col-sm-1"></div>
                                      
                                        <label class="col-sm-3">Expression ecrite : </label>
                                        <div class="col-sm-3">
                                        <SELECT name="LANGUE_ECRITE"  id="LANGUE_ECRITE" class="form-control" >
                                            <option value="">S&eacute;lectionnez</option>
                                            <OPTION VALUE="Base" <?php  if(@$langue_ecrite=="Base"){ echo 'selected';}?> >Base</OPTION>
                                            <OPTION VALUE="Moyen" <?php  if(@$langue_ecrite=="Moyen"){ echo 'selected';}?>>Moyen</OPTION>
                                            <OPTION VALUE="Avanc&eacute;" <?php  if(@$langue_ecrite=="Avancé"){ echo 'selected';}?>>Avanc&eacute;e</OPTION>
                                        </SELECT>
                                      </div>
                                   </div>
                                   
                                  <div class="form-group"> 
                                    <div class="col-sm-1"></div>  
                                
                                    <label class="col-sm-3">Lecture : </label>
                                       <div class="col-sm-3">
                                    <SELECT name="LANGUE_LECTURE"  id="LANGUE_LECTURE" class="form-control"  value="<?php  echo @$langue_lecture; ?>">
                                            <option value="">S&eacute;lectionnez</option>
                                            <OPTION VALUE="Base" <?php  if(@$langue_lecture=="Base"){ echo 'selected';}?> >Base</OPTION>
                                            <OPTION VALUE="Moyen" <?php  if(@$langue_lecture=="Moyen"){ echo 'selected';}?>>Moyen</OPTION>
                                            <OPTION VALUE="Avanc&eacute;" <?php  if(@$langue_lecture=="Avancé"){ echo 'selected';}?>>Avanc&eacute;e</OPTION>
                                        </SELECT>
                                  </div>       
                            </div>
                        </fieldset>
                       <input type="hidden"  name="id_user" id="id_user" value="<?php echo @$fk_util_id; ?>" />
                       <input type="hidden"  name="joker" id="joker" value="<?php echo @$joker_normal; ?>" />
                       <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
                       <input type="hidden"  name="LANGUE_ID" id="LANGUE_ID" value="<?php echo @$id_ling_normal; ?>" />
                       <div class="form-group">
                     <div class="col-sm-6">
                        <div class="modal-footer">
                         <button type="submit" class="btn btn-info" id="submit" <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?> name="enregistrer_continue" value="<?php  echo $btn_normal; ?>" ><?php  echo $btn_normal; ?></button>
                       <?php  if(@$btn_normal=="Enregistrer"){ echo '<button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit" '?> <?php if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?> <?php echo ' value="Enregistrer et Continuer">Enregistrer et Continuer</button>';} ?>
                           
                        </div>
                      </div>
                    </div>
             </form>   
    
<div class="col-sm-8" style="float:left;margin-left:200px;margin-top:-150px;">
&nbsp;&nbsp;&nbsp;&nbsp;
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Langue</th>
            <th>Expression Orale</th>
            <th>Expression Ecrite</th>
            <th>Lecture</th>
            <th style="width:30px;">Action</th>
        </tr>
    </thead>
 
   
    <tbody>
       <?php 
	   foreach($lister_conn_ling as $row)
	   {
	   ?>
        <tr>
            <td><?php  echo $row[$obj_connaissance_ling->GetCh_LANGUE_NOM()];?></td>
            <td><?php  echo $row[$obj_connaissance_ling->GetCh_LANGUE_ORALE()];?></td>
            <td><?php  echo $row[$obj_connaissance_ling->GetCh_LANGUE_ECRITE()];?></td>
            <td><?php  echo $row[$obj_connaissance_ling->GetCh_LANGUE_LECTURE()];?></td>
            <td>
            <a href="index.php?page=form_linguistique&id_linguistique=<?php  echo $row[$obj_connaissance_ling->GetCh_LANGUE_ID()]."&annonce_id=".$fk_annonce_id.'&type=NORMAL';?>"  class="btn-sm btn-success" <?php if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?>>Editer</a>
            
            <a href="controler/Connaissances_linguistiques_controler.php?joker=3&id_con_ling=<?php  echo $row[$obj_connaissance_ling->GetCh_LANGUE_ID()]."&annonce_id=".$fk_annonce_id;?>"  class="btn-sm btn-danger" <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } else {  echo 'onclick="return confirm(\'Voulez vous supprimer cet enregistrement\')"'.'   class="btn-sm btn-danger"' ; } ?> >Supprimer</a></td>
        </tr>
        <?php
	   }
		?>
      
    </tbody>
</table>
</div>
<div class="col-sm-10" style="float:right;margin-top:-2px;">
<form class="form-horizontal" action="controler/Connaissances_linguistiques_controler.php" method="POST"  id="form_autre"  name="form_autre"  onsubmit="return compte_number_ligne_autorize('nbre_ligne_autorise','3','Autre linguistiques');">
               <fieldset>
                    <legend>Autres connaissances Linguistiques</legend>
                    <span>Quelle(s) autre(s) langue(s) maîtrisez-vous?</span>
                            <span>commentez brièvement dans quelle mesure vous maîtrisez ces langues</span><br/><br/>
                              <div class="form-group">
                                     <div class="col-sm-1"></div>
                                        <label class="col-sm-3">Langue : </label>
                                        <div class="col-sm-3">
                                        <input type="text"  name="AUTRE_LANGUE_NOM"  id="AUTRE_LANGUE_NOM" placeholder="" size="30" maxlength="10" class="form-control"  value="<?php  echo @$langue_nom_autre; ?>">
                                     </div>
                              </div>
                               <div class="form-group">
                                     <div class="col-sm-1"></div>
                                 
                                     <label class="col-sm-3">Expression orale : </label>
                               <div class="col-sm-3">
                                     <SELECT name="AUTRE_LANGUE_ORALE" id="AUTRE_LANGUE_ORALE" class="form-control">
                                            <option value="">S&eacute;lectionnez</option>
                                            <OPTION VALUE="Base" <?php  if(@$langue_orale_autre=="Base"){ echo 'selected';}?> >Base</OPTION>
                                            <OPTION VALUE="Moyen" <?php  if(@$langue_orale_autre=="Moyen"){ echo 'selected';}?>>Moyen</OPTION>
                                            <OPTION VALUE="Avanc&eacute;" <?php  if(@$langue_orale_autre=="Avancé"){ echo 'selected';}?>>Avanc&eacute;e</OPTION>
                                        </SELECT>
                                    </div>
                              </div>
                              <div class="form-group">
                                 <div class="col-sm-1"></div>
                                    <label class="col-sm-3">Expression ecrite : </label>
                                         <div class="col-sm-3">
                                        <SELECT name="AUTRE_LANGUE_ECRITE" id="AUTRE_LANGUE_ECRITE" class="form-control">
                                            <option value="">S&eacute;lectionnez</option>
                                            <OPTION VALUE="Base" <?php  if(@$langue_ecrite_autre=="Base"){ echo 'selected';}?> >Base</OPTION>
                                            <OPTION VALUE="Moyen" <?php  if(@$langue_ecrite_autre=="Moyen"){ echo 'selected';}?>>Moyen</OPTION>
                                            <OPTION VALUE="Avanc&eacute;" <?php  if(@$langue_ecrite_autre=="Avancé"){ echo 'selected';}?>>Avanc&eacute;e</OPTION>
                                            </SELECT>
                                         </div>
                                     </div>
                                     
                               <div class="form-group">
                                 <div class="col-sm-1"></div>
                                    
                                        <label class="col-sm-3">Lecture : </label>
                                         <div class="col-sm-3">
                                        <SELECT name="AUTRE_LANGUE_LECTURE" id="AUTRE_LANGUE_LECTURE"  class="form-control">
                                              <option value="">S&eacute;lectionnez</option>
                                            <OPTION VALUE="Base" <?php  if(@$langue_lecture_autre=="Base"){ echo 'selected';}?> >Base</OPTION>
                                            <OPTION VALUE="Moyen" <?php  if(@$langue_lecture_autre=="Moyen"){ echo 'selected';}?>>Moyen</OPTION>
                                            <OPTION VALUE="Avanc&eacute;" <?php  if(@$langue_lecture_autre=="Avancé"){ echo 'selected';}?>>Avanc&eacute;e</OPTION>
                                            </SELECT>
                                     </div>
                                  </div>   
                           
                        </fieldset>
                         <input type="hidden"  name="id_user" id="id_user" value="<?php echo $fk_util_id; ?>" />
                         <input type="hidden"  name="joker" id="joker2" value="<?php echo $joker_autre; ?>" />
                         <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo $fk_annonce_id; ?>" />
                         <input type="hidden"  name="AUTRE_LANGUE_ID" id="AUTRE_LANGUE_ID" value="<?php echo @$id_ling_autre; ?>" />
                         <input type="hidden"  name="nbre_ligne_autorise" id="nbre_ligne_autorise" value="<?php echo @$nbre_ligne_autorise; ?>" />
                    
                      <div class="form-group">
                     <div class="col-sm-7">
                        <div class="modal-footer">
                          <a class="btn btn-info col-sm-4" id="next" href="controler/Connaissances_linguistiques_controler.php?joker=6&annonce_id=<?php echo @$fk_annonce_id;?>" >Passer cet etape</a>
                         <button type="submit" class="btn btn-info" id="submit" <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?> name="enregistrer_continue" value="<?php  echo $btn_autre; ?>" ><?php  echo $btn_autre; ?></button>
                       <?php  if(@$btn_autre=="Enregistrer"){ echo '<button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit" '?> <?php if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?> <?php echo ' value="Enregistrer et Continuer">Enregistrer et Continuer</button>';} ?>
                           
                        </div>
                      </div>
                    </div>  
    
 </form>
 </div>
<div class="col-sm-8" style="float:left;margin-left:200px;margin-top:-2px;">
<table id="example1" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Langue</th>
            <th>Expression Orale</th>
            <th>Expression Ecrite</th>
            <th>Lecture</th>
            <th style="width:30px;">Action</th>
        </tr>
    </thead>
    <tbody>
       <?php 
	   foreach($lister_autre_conn_ling as $row)
	   {
	   
	   ?>
        <tr>
           <td><?php  echo $row[$obj_connaissance_ling->GetCh_LANGUE_NOM()];?></td>
            <td><?php  echo $row[$obj_connaissance_ling->GetCh_LANGUE_ORALE()];?></td>
            <td><?php  echo $row[$obj_connaissance_ling->GetCh_LANGUE_ECRITE()];?></td>
            <td><?php  echo $row[$obj_connaissance_ling->GetCh_LANGUE_LECTURE()];?></td>
             <td>
             <a href="index.php?page=form_linguistique&id_ling_autre=<?php  echo $row[$obj_connaissance_ling->GetCh_LANGUE_ID()]."&annonce_id=".$fk_annonce_id.'&type=AUTRE';?>"  class="btn-sm btn-success" <?php if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?>>Editer</a>
             <a href="controler/Connaissances_linguistiques_controler.php?joker=3&id_con_ling=<?php  echo $row[$obj_connaissance_ling->GetCh_LANGUE_ID()]."&annonce_id=".$fk_annonce_id;?>"  class="btn-sm btn-danger" <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } else {  echo 'onclick="return confirm(\'Voulez vous supprimer cet enregistrement\')"'.'   class="btn-sm btn-danger"' ; } ?> >Supprimer</a></td>
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
