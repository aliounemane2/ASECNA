<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);

$obj_form=new Formation_class();
$obj_candidat=new Candidat_class();
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

$fk_util_id=@$_SESSION["id_user"];
$lister_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
$candidat_id=@$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
$lister_formation=$obj_form->lister_form_By_CAND_ID($candidat_id);
$nbre_ligne_autorise=0;
$nbre_ligne_autorise=count($lister_formation);

$id_formation="";
$lister_form="";


if(isset($_GET["id_formation"]))
{
	$id_formation=$_GET["id_formation"];
	$lister_form=$obj_form->lister_formation($id_formation);
}


		$formation_id="";
		$formation_an_deb="";
		$formation_an_fin="";
		$etablissement="";
		$formation_lieu="";
		$formation_diplome="";
		$formation_dom_princ="";
		$fk_candidat_id="";
		$formation_cycle="";
		$formation_diplome_fich="";
		$joker="1";
		$btn_enreg="Enregistrer";
		

   
    if($obj_postulation->check_nbrepostule($fk_util_id)==true)
	{ 
	  $joker=4;
	  
	}             

	if(!empty($lister_form) && $id_formation!="")
	{
		$formation_id=$lister_form[0][$obj_form->GetCh_FORMATION_ID()];
		$formation_an_deb=$lister_form[0][$obj_form->GetCh_FORMATION_AN_DEB()];
		$formation_an_fin=$lister_form[0][$obj_form->GetCh_FORMATION_AN_FIN()];
		$etablissement=$lister_form[0][$obj_form->GetCh_ETABLISSEMENT_NOM()];
		$formation_lieu=$lister_form[0][$obj_form->GetCh_FORMATION_LIEU()];
		$formation_diplome=$lister_form[0][$obj_form->GetCh_FORMATION_DIPLOME()];
		$formation_dom_princ=$lister_form[0][$obj_form->GetCh_FORMATION_DOM_PRINC_ETUD()];
		$fk_candidat_id=$lister_form[0][$obj_form->GetCh_FK_CANDIDAT_ID()];
		$formation_cycle=$lister_form[0][$obj_form->GetCh_FORMATION_CYCLE()];
		$formation_diplome_fich=$lister_form[0][$obj_form->GetCh_FORMATION_DIPLOME_FICHIER()];
		$joker="2";
		
			
		if($obj_postulation->check_nbrepostule($fk_util_id)==true)
		{ 
		  $joker=5;
		} 
		
	}

?>
<center>
<div class="span10" style="margin-left:1px;">

<?php

include(WEBROOT_DIR."menu_gauche.php");
?>
<div class="container">
 
 <form class="form-horizontal" method="POST"  action="controler/Formation_controler.php"  enctype="multipart/form-data"  id="form"  >
              <fieldset class="col-sm-9">
              
               <span>Utiliser <strong>Enregistrer</strong> pour enregistrer et rester sur la meme page </span><br/>
               <span>Utiliser <strong>Enregistrer et Continuer</strong>  pour enregistrer et aller à la page suivante </span><br/>
               <span>Oubien utiliser <strong>Le menu gauche</strong> pour renseigner chaque etape de la Postulation </span><br/><br/>
               <legend>2-Formation </legend><br/>
                          <div class="form-group">
                                <div class="col-sm-1"></div>
                                <label class="col-sm-3">Formation cycle : <font color=red>*</font></label>
                                 <div class="col-sm-3">
                                <SELECT name="FORMATION_CYCLE" id="FORMATION_CYCLE" class="form-control"  >
                                        <option value="">S&eacute;lectionnez</option>
                                        <OPTION VALUE="Universitaires"  <?php if(@$formation_cycle=="Universitaires"){ echo 'selected';} ?>>Universitaires</OPTION>
                                        <OPTION VALUE="Secondaires" <?php if(@$formation_cycle=="Secondaires"){ echo 'selected';} ?>>Secondaires</OPTION>
                                    </SELECT>
                             </div>
                            </div>
                            
                              <div class="form-group">
                                <div class="col-sm-1"></div>
                           
                               <label class="col-sm-3">Ann&eacute;e d'&eacute;tude de : <font color=red>*</font></label>
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
                                <label class="col-sm-3">&agrave; : <font color=red>*</font></label>
                               <div class="col-sm-3"> 
                               <SELECT  name="FORMATION_AN_FIN"  id="FORMATION_AN_FIN"   class="form-control"  >
                                        <option value="">S&eacute;lectionnez</option>
                                        <?php for($i=date('Y');$i>1960; $i--)
										{
                                         ?>   
                             <OPTION VALUE=<?php echo $i; ?> <?php if(@$formation_an_fin==$i){ echo 'selected';} ?> ><?php echo $i; ?></OPTION>                                     
									 <?php
										}
                                       ?>
                                </SELECT>
                            </div>
                           </div>
                          <div class="form-group">
                            <div class="col-sm-1"></div>
                                
                            <label class="col-sm-3">Nom de l'&eacute;tablissement : <font color=red>*</font></label>
                              
                            <div class="col-sm-5">    
                              <INPUT type="text" name="ETABLISSEMENT_NOM" placeholder="" id="ETABLISSEMENT_NOM" value="<?php echo $etablissement; ?>"  size="30" maxlength="30" class="form-control"   />
                            </div>
                           
                          
                       </div>
                         
                         <div class="form-group">
                          <div class="col-sm-1"> </div>
                           <label class="col-sm-3">Adresse de l'&eacute;tablissement : <font color=red>*</font></label>
                                <div class="col-sm-5"> 
                               <INPUT type="text" name="FORMATION_LIEU" placeholder="" id="FORMATION_LIEU" value="<?php echo @$formation_lieu; ?>"  size="30" maxlength="30" class="form-control" />
                                </div>
                          </div>
                         <div class="form-group">
                          <div class="col-sm-1"> </div> 
                         
                               <label class="col-sm-3">Niveau de formation : <font color=red>*</font></label>
                                 <div class="col-sm-5">
                                <SELECT name="FORMATION_DIPLOME" id="FORMATION_DIPLOME" class="form-control" >
                                        <option value="">S&eacute;lectionnez un niveau de diplôme</option>                            
                                        <OPTION VALUE="Lycee, Niveau Bac" <?php if(@$formation_diplome=="Lycee, Niveau Bac"){ echo 'selected';} ?>>Lyc&#233;e, Niveau Bac</OPTION>
                                        <OPTION VALUE="Bac Professionnel, BEP, CAP"   <?php if(@$formation_diplome=="Bac Professionnel, BEP, CAP"){ echo 'selected';} ?>>Bac Professionnel, BEP, CAP</OPTION>
                                        <OPTION VALUE="DUT, BTS, Bac + 2"  <?php if(@$formation_diplome=="DUT, BTS, Bac + 2"){ echo 'selected';} ?>>DUT, BTS, Bac + 2</OPTION>
                                        <OPTION VALUE="Licence, Bac + 3"  <?php if(@$formation_diplome=="Licence, Bac + 3"){ echo 'selected';} ?>>Licence, Bac + 3</OPTION>
                                        <OPTION VALUE="Maîtrise,Master 1, IEP, IUP,Ingénieur Bac + 4"  <?php if(@$formation_diplome=="Maîtrise,Master 1, IEP, IUP,Ingénieur Bac + 4"){ echo 'selected';} ?>>Ma&#238;trise, Master 1, IEP, IUP, Ingénieur, Bac + 4</OPTION>
                                        <OPTION VALUE="DESS, DEA, Master 2,Ingénieur, Bac + 5"  <?php if(@$formation_diplome=="DESS, DEA, Master 2,Ingénieur, Bac + 5"){ echo 'selected';} ?>>DESS, DEA, Master 2,Ingénieur, Bac + 5</OPTION>
                                        <OPTION VALUE="Doctorat, 3eme cycle"  <?php if(@$formation_diplome=="Doctorat, 3eme cycle"){ echo 'selected';} ?>>Doctorat, 3&#232;me cycle</OPTION>
                                        <OPTION VALUE="Expert, Recherche"  <?php if(@$formation_diplome=="Expert, Recherche"){ echo 'selected';} ?>>Expert, Recherche</OPTION>
                                </SELECT>

                           </div>
                           </div>
                     
                      <div class="form-group">
                             <div class="col-sm-1"></div>
                             <label class="col-sm-3">Dipl&ocirc;me : <font color=red>*</font></label>
                             <div class="col-sm-5">
                             <input type="hidden" name="old_fichier"  id="old_fichier" value="<?php  echo $formation_diplome_fich;?>"   >
                             <input type="file" name="FORMATION_DIPLOME_FICHIER"  id="FORMATION_DIPLOME_FICHIER" value=""  class="filestyle" data-buttonBefore="true" data-buttonText="Choisir Fichier" accept="image/*" >*.jpg;*.png; taille= 5Mo
                             <span><?php if(@$formation_diplome_fich!="") { echo $formation_diplome_fich;}?></span>
                              </div>
                       </div>
                     
                     
                      <div class="form-group">
                          <div class="col-sm-1"> </div>
                           
                              <label class="col-sm-3">Domaine Principal d'&eacute;tude : <font color=red>*</font></label>
                           <div class="col-sm-3"> 
                               <INPUT type="text" name="FORMATION_DOM_PRINC_ETUD" placeholder="" id="FORMATION_DOM_PRINC_ETUD" value="<?php echo @$formation_dom_princ; ?>"  size="30" maxlength="30"  class="form-control" >
                             </div>
                             </div>
                             
                       <input type="hidden"  name="joker" id="joker" value="<?php echo @$joker; ?>" />
                       <input type="hidden"  name="FK_UTIL_ID" id="FK_UTIL_ID" value="<?php echo @$_SESSION['id_user']; ?>" />
                       <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
                       <input type="hidden"  name="FORMATION_ID" id="FORMATION_ID" value="<?php echo @$formation_id; ?>" />
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
<div class="col-sm-1" style="height:25px;"></div>
<div class="col-sm-11"  style="float:left;margin-left:-120px;">
&nbsp;&nbsp;&nbsp;&nbsp;
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Cycle</th>
            <th>Année debut</th>
            <th>Année Fin</th>
            <th>Etablissement</th>
            <th>Domaine</th>
            <th>Niveau</th>
            <th style="width:150px;">Actions</th>
        </tr>
    </thead>
    <tbody>
       <?php 
	   foreach($lister_formation as $row)
	   {
	   ?>
       <tr>
        <td><?php  echo $row[$obj_form->GetCh_FORMATION_CYCLE()];?></td>
        <td><?php  echo $row[$obj_form->GetCh_FORMATION_AN_DEB()];?></td>
        <td><?php  echo $row[$obj_form->GetCh_FORMATION_AN_FIN()];?></td>
        <td><?php  echo $row[$obj_form->GetCh_ETABLISSEMENT_NOM()];?></td>
        <td><?php  echo $row[$obj_form->GetCh_FORMATION_DOM_PRINC_ETUD()];?></td>
        <td><?php  echo $row[$obj_form->GetCh_FORMATION_DIPLOME()];?></td>
        <td>
        <a href="index.php?page=form_formation<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; }else{ echo '&';} ?>id_formation=<?php  echo $row[$obj_form->GetCh_FORMATION_ID()];?>"  class="btn-sm btn-success" >Editer</a>
        <a href="controler/Formation_controler.php?joker=3&id_formation=<?php  echo $row[$obj_form->GetCh_FORMATION_ID()]."&annonce_id=".$fk_annonce_id;?>"  class="btn-sm btn-danger" <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } else {  echo 'onclick="return confirm(\'Voulez vous supprimer cet enregistrement\')"'.'   class="btn-sm btn-danger"' ; } ?>>Supprimer</a></td>
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
	 function test_annee()
		 {
			var ann1=$('#FORMATION_AN_DEB').val();
			var ann2=$('#FORMATION_AN_FIN').val();
	
			if(ann1>ann2)
			{
				$('<span style="color:red;font-weight:bold;">Annee debut de formation doit etre inferieure a Annee fin de formation</span>').insertAfter("#FORMATION_AN_FIN");
				return false;
			}
		}    

 </script>
