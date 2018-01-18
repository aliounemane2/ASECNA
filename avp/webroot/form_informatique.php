<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);

 $obj_candidat=new Candidat_class();
 $obj_postulation=new Postulation_class();
 $obj_connaissance=new Connaissances_informatiques_class();
 

	if(!@$_SESSION["id_user"])
	{
	   $obj_postulation->session_valide();	
	}


$fk_annonce_id="";

if(isset($_GET["annonce_id"])){ $fk_annonce_id=@$_GET["annonce_id"]; }

 $fk_util_id=@$_SESSION['id_user'];

 $lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
 $candidat_id=@$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
 
 $lister_connaissance=$obj_connaissance->lister_conn_informatique($candidat_id);
 $lister_autre_conn=$obj_connaissance->lister_conn_autre_informatique($candidat_id);
 $nbre_ligne_autorise=0;
 $nbre_ligne_autorise=count($lister_autre_conn);
 
 $logiciel="";
 $infomr_niv="";
 $joker_normal="1";
 $btn_normal="Enregistrer";
 $id_inf_normal="";
 
 $autre_logiciel="";
 $autre_infomr_niv="";
 $joker_autre="4";
 $btn_autre="Enregistrer";
 $id_inf_autre="";
 $lister_conn="";
 $lister_conn_autre="";
 
 if(isset($_GET["id_informatique"]) && $_GET["type"]=="NORMAL" )
 {
	 $id_formation=$_GET["id_informatique"];
	 $type=$_GET["type"];
	 $lister_conn=$obj_connaissance->lister_conn_inf_type_id($id_formation,$type);
 }
 
 if(isset($_GET["id_autre_infor"]) && $_GET["type"]=="AUTRE" )
 {
	 $id_formation=$_GET["id_autre_infor"];
	 $type=$_GET["type"];
	 $lister_conn_autre=$obj_connaissance->lister_conn_inf_type_id($id_formation,$type);
	 
 }
 
 if(!empty($lister_conn))
 {
	 $logiciel=$lister_conn[0][$obj_connaissance->GetCh_LOGICIELS()];
	 $infomr_niv=$lister_conn[0][$obj_connaissance->GetCh_INFORMATIQUE_NIV()];
	 $id_inf_normal=$lister_conn[0][$obj_connaissance->GetCh_INFORMATIQUE_ID()]; 
	 
	 $joker_normal="2";
	 
 }
 
 if(!empty($lister_conn_autre))
 {
	 $autre_logiciel=$lister_conn_autre[0][$obj_connaissance->GetCh_LOGICIELS()];
	 $autre_infomr_niv=$lister_conn_autre[0][$obj_connaissance->GetCh_INFORMATIQUE_NIV()];
	 $id_inf_autre=$lister_conn_autre[0][$obj_connaissance->GetCh_INFORMATIQUE_ID()]; 
	 
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
 <form class="form-horizontal"  action="controler/Connaissances_informatiques_controler.php"  method="POST" id="form"  name="form"  >
               <fieldset>
                        <span>Utiliser <strong>Enregistrer</strong> pour enregistrer et rester sur la meme page </span><br/>
               			<span>Utiliser <strong>Enregistrer et Continuer</strong>  pour enregistrer et aller à la page suivante </span><br/>
               			<span>Oubien utiliser <strong>Le menu gauche</strong> pour renseigner chaque etape de la Postulation </span><br/><br/>
                          <legend>6-Informatiques</legend>
                            <span>Précisez ci-dessous vos connaissances pour: </span><br/><br/>
                            <div class="form-group">
                                  <div class="col-sm-1"></div>
                                  
                                   <label class="col-sm-3">Logiciels bureautique   : </label>
                                   <div class="col-sm-3">
                                   <SELECT name="LOGICIELS" id="LOGICIELS"  class="form-control" OnBlur="return validite('form','LOGICIELS','AN',2,50);" >
                                            <option value="">S&eacute;lectionnez</option>
                                            <OPTION VALUE="Traitement de texte"  <?php if($logiciel=="Traitement de texte") {  echo 'selected';} ?> >Traitement de texte</OPTION>
                                            <OPTION VALUE="Tableur" <?php if($logiciel=="Tableur") {  echo 'selected';} ?>>Tableur</OPTION>
                                            <OPTION VALUE="Outils collaboratif" <?php if($logiciel=="Outils collaboratif") {  echo 'selected';} ?> >Outils collaboratif</OPTION>
                                            <OPTION VALUE="Outils de presentation"  <?php if($logiciel=="Outils de presentation") {  echo 'selected';} ?>>Outils de presentation</OPTION>
                                            <OPTION VALUE="Messagerie" <?php if($logiciel=="Messagerie") {  echo 'selected';} ?>>Messagerie</OPTION>
                                            <OPTION VALUE="Base de donnees"  <?php if($logiciel=="Base de donnees") {  echo 'selected';} ?>>Base de donnees</OPTION>
                                            <OPTION VALUE="autres"  <?php if($logiciel=="autres") {  echo 'selected';} ?>>Autres</OPTION>
                                        </SELECT>
                                   </div>
                               </div>
                            <div class="form-group">
                              <div class="col-sm-1"></div>
                                <label class="col-sm-3">Connaissance</label>
                                     <div class="col-sm-3">
                                        <SELECT name="INFORMATIQUE_NIV" id="INFORMATIQUE_NIV" class="form-control" >
                                            <option value="">S&eacute;lectionnez</option>
                                            <OPTION VALUE="Base" <?php if($infomr_niv=="Base") {  echo 'selected';} ?>>Base</OPTION>
                                            <OPTION VALUE="Moyen"  <?php if($infomr_niv=="Moyen") {  echo 'selected';} ?>>Moyen</OPTION>
                                            <OPTION VALUE="Avance"  <?php if($infomr_niv=="Avance") {  echo 'selected';} ?>>Avanc&eacute;e</OPTION>
                                        </SELECT>
                                   </div>
                             </div>
                            
                             <input type="hidden"  name="type" id="type" value="NORMAL" />
                             <input type="hidden" name="joker"  id="joker" value="<?php echo @$joker_normal; ?>" />
                             <input type="hidden"  name="id_user"  id="id_user" value="<?php echo @$_SESSION["id_user"]; ?>" />
                             <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
                             <input type="hidden"  name="INFORMATIQUE_ID" id="INFORMATIQUE_ID" value="<?php echo @$id_inf_normal; ?>" /> 
                             
                        </fieldset>
                    <div class="form-group">
                     <div class="col-sm-6">
                        <div class="modal-footer">
                         <button type="submit" class="btn btn-info" id="submit" <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?> name="enregistrer_continue" value="<?php  echo $btn_normal; ?>" ><?php  echo $btn_normal; ?></button>
                       <?php  if(@$btn_normal=="Enregistrer"){ echo '<button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit" '?> <?php if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?> <?php echo ' value="Enregistrer et Continuer">Enregistrer et Continuer</button>';} ?>
                           
                        </div>
                      </div>
                    </div>
             </form>  
             
<div class="col-sm-8" style="float:left;margin-left:200px;margin-top:-200px;">
&nbsp;&nbsp;&nbsp;&nbsp;
<table id="example" class="display" cellspacing="0" width="100%" >
    <thead>
        <tr>
            <th>Logiciels bureatiques</th>
            <th>Connaissances</th>
            <th style="width:30px;">Action</th>
        </tr>
    </thead>
  <tbody>
       <?php 
	   foreach($lister_connaissance as $row)
	   {
	   
	   ?>
        <tr>
            <td><?php  echo $row[$obj_connaissance->GetCh_LOGICIELS()];?></td>
            <td><?php  echo $row[$obj_connaissance->GetCh_INFORMATIQUE_NIV()];?></td>
            <td>
            
             <a href="index.php?page=form_informatique&id_informatique=<?php  echo $row[$obj_connaissance->GetCh_INFORMATIQUE_ID()]."&annonce_id=".$fk_annonce_id."&type=NORMAL"; ?>"  class="btn-sm btn-success"  <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?>>Editer</a>
             
            <a href="controler/Connaissances_informatiques_controler.php?joker=3&id_info=<?php  echo $row[$obj_connaissance->GetCh_INFORMATIQUE_ID()]."&annonce_id=".$fk_annonce_id;?>"  class="btn-sm btn-danger" <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } else {  echo 'onclick="return confirm(\'Voulez vous supprimer cet enregistrement\')"'.'   class="btn-sm btn-danger"' ; } ?>>Supprimer</a>
            </td>
        </tr>
        <?php
	   }
		?>
      
    </tbody>
</table>
</div>     
 <!--------------- bebut bloc 2----------------------->
 <div class="col-sm-10" style="float:right;margin-top:-10px;">
<form class="form-horizontal" action="controler/Connaissances_informatiques_controler.php" method="POST"  id="form_autre"  name="form_autre"  onsubmit="return compte_number_ligne_autorize('nbre_ligne_autorise','3','Autres connaissances informatiques');">
            <fieldset  class="col-sm-9"></br></br>
                      <legend>Précisez d'autres Connaissances Informatique</legend>      
                            <span>Mentionnez éventuellement d'autres logiciels qui sont pertinents pour la fonction souhaitée.</span><br/><br/>
                            &nbsp;&nbsp;
                            <div class="form-group">
                                    <div class="col-sm-1"></div>
                                    <label class="col-sm-3">Outils   : </label>
                                    <div class="col-sm-5">
                                    <INPUT type="text" name="AUTRE_LOGICIELS" id="AUTRE_LOGICIELS"  placeholder="" size="30" maxlength="30"  class="form-control" value="<?php echo @$autre_logiciel; ?>"/>
                                    </div>
                              </div>
                              <div class="form-group">
                                    <div class="col-sm-1"></div>    
                               
                                    <label class="col-sm-3">Connaissance : </label>
                                     <div class="col-sm-5">
                                    <SELECT name="AUTRE_INFORMATIQUE_NIV" id="AUTRE_INFORMATIQUE_NIV"  class="form-control">
                                    <option value="">S&eacute;lectionnez</option>
                                    <OPTION VALUE="Base" <?php if($autre_infomr_niv=="Base") {  echo 'selected';} ?>>Base</OPTION>
                                    <OPTION VALUE="Moyen"  <?php if($autre_infomr_niv=="Moyen") {  echo 'selected';} ?>>Moyen</OPTION>
                                    <OPTION VALUE="Avance"  <?php if($autre_infomr_niv=="Avance") {  echo 'selected';} ?>>Avanc&eacute;e</OPTION>
                                    </SELECT>
                                 </div>
                             </div>
                             
                         
                           <div class="form-group">
                     <div class="col-sm-9">
                        <div class="modal-footer">
                   <a class="btn btn-info col-sm-4" id="next" href="controler/Connaissances_informatiques_controler.php?joker=6&annonce_id=<?php echo @$fk_annonce_id;?>" >Passer cet etape</a>
                         <button type="submit" class="btn btn-info" id="submit" <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?> name="enregistrer_continue" value="<?php  echo $btn_autre; ?>" ><?php  echo $btn_autre; ?></button>
                       <?php  if(@$btn_autre=="Enregistrer"){ echo '<button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit" '?> <?php if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?> <?php echo ' value="Enregistrer et Continuer">Enregistrer et Continuer</button>';} ?>
                        </div>
                      </div>
                    </div> 
                     <input type="hidden"  name="type" id="type" value="AUTRE" />
                     <input type="hidden" name="joker"  id="joker2" value="<?php echo @$joker_autre; ?>" />
                     <input type="hidden"  name="id_user"  id="id_user" value="<?php echo @$_SESSION["id_user"]; ?>" />
                     <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
                     <input type="hidden"  name="AUTRE_INFORMATIQUE_ID" id="AUTRE_INFORMATIQUE_ID" value="<?php echo @$id_inf_autre; ?>" /> 
                     <input type="hidden"  name="nbre_ligne_autorise" id="nbre_ligne_autorise" value="<?php echo @$nbre_ligne_autorise; ?>" />
                    
</fieldset> 
               </form>
               </div>
<div class="col-sm-8" style="float:left;margin-left:200px;margin-top:-10px;">
&nbsp;&nbsp;&nbsp;&nbsp;
<table id="example1" class="display" cellspacing="0" width="100%" >
    <thead>
        <tr>
            <th>Logiciels bureatiques</th>
            <th>Connaissances</th>
            <th style="width:30px;">Action</th>
        </tr>
    </thead>
 
    <tbody>
       <?php 
	   foreach($lister_autre_conn as $row)
	   {
	   
	   ?>
        <tr>
            <td><?php  echo $row[$obj_connaissance->GetCh_LOGICIELS()];?></td>
            <td><?php  echo $row[$obj_connaissance->GetCh_INFORMATIQUE_NIV()];?></td>
             <td>
             
                <a href="index.php?page=form_informatique&id_autre_infor=<?php echo $row[$obj_connaissance->GetCh_INFORMATIQUE_ID()]."&annonce_id=".$fk_annonce_id."&type=AUTRE";?>"  class="btn-sm btn-success"  <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?>>Editer</a>
                
            <a href="controler/Connaissances_informatiques_controler.php?joker=3&id_info=<?php  echo $row[$obj_connaissance->GetCh_INFORMATIQUE_ID()]."&annonce_id=".$fk_annonce_id;?>"  class="btn-sm btn-danger" <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } else {  echo 'onclick="return confirm(\'Voulez vous supprimer cet enregistrement\')"'.'   class="btn-sm btn-danger"' ; } ?>>Supprimer</a>
            </td>
        </tr>
        <?php
	   }
		?>
      
    </tbody>
</table>
</div>

<!----fin bloc 2--------------->
</div>
</div>
</center>
