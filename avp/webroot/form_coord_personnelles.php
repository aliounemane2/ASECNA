<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);

$fk_annonce_id="";

   $ob_famille=new Famille_class();
   $obj_candidat=new Candidat_class();
   $obj_postulation=new Postulation_class();

	if(!@$_SESSION["id_user"])
	{
	   $obj_postulation->session_valide();	
	}
	
	if(@isset($_GET["annonce_id"]))
	{
		$fk_annonce_id=@$_GET["annonce_id"];
	}

 
   $fk_util_id=@$_SESSION['id_user'];
	   
   $lister_cand=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
   $candidat_id=@$lister_cand[0][$obj_candidat->GetCh_CANDIDAT_ID()];
 
   $lister_candidat=@$obj_candidat->GetCandidat_By_candidat_id_and_fk_util_id($candidat_id,$fk_util_id);
   $liste_famille="";
 
   if($candidat_id!="" && $candidat_id!=0)
   {
     $liste_famille=@$ob_famille->lister_famille_By_CAND_ID($candidat_id);
   }
   
   $nbre_line=0;
   $nbre_line=count($liste_famille);
 
 //---------------------------------------------------------------//
 
        $candidat_type="";
		$candidat_civilite="";
		$candidat_nom="";
		$candidat_prenom="";
		$candidat_matricule="";
		$candidat_date_naissance="";
		$candidat_lieu_naissance="";
		$candidat_naissance="";
		$candidat_nationalite="";
		$candidat_sit_mat="";
		$candidat_nbre_enf="";
		$candidat_adr_perm="";
		$candidat_adr_act="";
		$candidat_indicatif="";
		$candidat_num_tel="";
		$candidat_num_gsm="";
		$candidat_permis="";
		$candidat_demande_emploi="";
		$candidat_cv="";
		$candidat_certificat_travail="";
		$candidat_photo="";
		$candidat_acte_naiss="";
		$candidat_fiche_famille="";
		$candidat_certif_nat="";
		$candidat_certif_dom="";
		$candidat_certif_med="";
		$candidat_casier_jud="";
		$candidat_is_famille="";
		$candidat_motiv_poste="";
		
		$joker="1";
		$btn_enreg="Enregistrer";
		
   
   if(!empty($lister_candidat))
   {
		
		$candidat_type=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_TYPE()];
		$candidat_civilite=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_CIVILITE()];
		$candidat_nom=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_NOM()];
		$candidat_prenom=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_PRENOM()];
		$candidat_matricule=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_MATRICULE()];
		$candidat_date_naissance=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_DATE_NAISSANCE()];
		
		($obj_candidat->La_date_est_en($candidat_date_naissance)==true) ? $candidat_date_naissance=$obj_candidat->dateswitch($candidat_date_naissance): $candidat_date_naissance;
		
		$candidat_lieu_naissance=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_LIEU_NAISSANCE()];
		$candidat_nationalite=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_NATIONALITE()];
		$candidat_sit_mat=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_SIT_MAT()];
		$candidat_nbre_enf=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_NBRE_ENF()];
		$candidat_adr_perm=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ADR_PERM()];
		$candidat_adr_act=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ADR_ACT()];
		$candidat_indicatif=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_INDICATIF()];
		$candidat_num_tel=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_NUM_TEL()];
		$candidat_num_gsm=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_NUM_GSM()];
		$candidat_permis=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_PERMIS()];
		$candidat_demande_emploi=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_DEMANDE_EMPLOI()];
		$candidat_cv=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_CV()];
		$candidat_certificat_travail=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_CERTIFICAT_TRAVAIL()];
		$candidat_photo=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_PHOTO()];
		$candidat_acte_naiss=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ACTE_NAISS()];
		$candidat_fiche_famille=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_FICHE_FAMILLE()];
		$candidat_certif_nat=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_CERTIF_NAT()];
		$candidat_certif_dom=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_CERTIF_DOMICILE()];
		$candidat_certif_med=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_CERTIF_MEDICAL()];
		$candidat_casier_jud=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_CASIER_JUDICIAIRE()];
		$candidat_is_famille=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_IS_FAMILLE()];
		$candidat_motiv_poste=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_MOTIV_POSTE()];
		
		$joker="2";
		$btn_enreg="Enregistrer";
   }
   
	   $id_famille=0;
	   $famille_nom="";
	   $famille_structure="";
	   $famille_degre="";
	   $famille_prenom="";
	   $lister_fam="";
   
	   if(@isset($_GET["id_famille"]) && @$_GET["id_famille"]!="")
	   {
		 $id_famille= @$_GET["id_famille"];
		 $lister_fam=@$ob_famille->lister_famille($id_famille); 
	   }
	   
	   if(!empty($lister_fam) && count($lister_fam)>0)
	   {
		 $famille_nom=$lister_fam[0][$ob_famille->GetCh_FAMILLE_NOM()];
		 $famille_structure=$lister_fam[0][$ob_famille->GetCh_FAMILLE_STRUCTURE()];
		 $famille_degre=$lister_fam[0][$ob_famille->GetCh_FAMILLE_DEGRE()];
		 $famille_prenom=$lister_fam[0][$ob_famille->GetCh_FAMILLE_PRENOM()];   
	   }
	   
	
	
	if($obj_postulation->check_nbrepostule($fk_util_id)==true)
	{ 
	  $joker=6;
	  
	}  
   
?>

<script>
  var selected_indic='<?php echo @$candidat_indicatif; ?>';
</script>
<script type="text/javascript" src="js/coordonnee_perso.js"> </script>

<center>
<div class="span10" style="margin-left:1px;">

<?php
include(WEBROOT_DIR."menu_gauche.php");
?>
<div class="container">
<!-- onsubmit="return verif_champ_famille123();"-->
<form class="form-horizontal"  action="controler/Candidat_controler.php" method="POST"  enctype="multipart/form-data"  id="form" name="form" onsubmit="return verif_champ_famille();" >
               
                <fieldset class="col-sm-9">
                        <span>Utiliser <strong>Enregistrer</strong> pour enregistrer et rester sur la meme page </span><br/>
               			<span>Utiliser <strong>Enregistrer et Continuer</strong>  pour enregistrer et aller à la page suivante </span><br/>
               			<span>Oubien utiliser <strong>Le menu gauche</strong> pour renseigner chaque etape de la Postulation </span><br/><br/>
                    <legend>1-Coordonn&eacutees personnelles</legend>
                    <p>Indiquez ci-dessous vos coordonn&eacute;es personnelles.</p>
                      
                       <div class="form-group">
                       <div class="col-sm-1"></div>
                        
                              <label for="firstname" class="col-sm-3">Type de candidature : <font color=red>*</font></label>
                         <div class="col-sm-3"> 
                               <select  name="CANDIDAT_TYPE" id="CANDIDAT_TYPE" class="form-control" onchange="return bloc_hide();" >
                                        <option value="">S&eacute;lectionnez</option>
                                        <option value="Interne"  <?php if(@$candidat_type=="Interne"){ echo 'selected'; } ?>>Interne</option>
                                        <option value="Externe"  <?php if(@$candidat_type=="Externe"){ echo 'selected'; } ?>>Externe</option>
                               </select>
                          </div>
                       </div>   
                         <div class="form-group">
                       <div class="col-sm-1"></div> 
                          <label for="firstname" class="col-sm-3">Civilit&eacute; :<font color=red>*</font></label>
                          <div class="col-sm-3">     
                               <SELECT  name="CANDIDAT_CIVILITE"  id="CANDIDAT_CIVILITE" class="form-control"  >
                                    <option value="">S&eacute;lectionnez</option>
                                    <OPTION VALUE="M."   <?php if(@$candidat_civilite=="M."){   echo 'selected'; } ?> >M.</OPTION>
                                    <OPTION VALUE="Mme"  <?php if(@$candidat_civilite=="Mme"){  echo 'selected'; } ?> >Mme</OPTION>
                                    <OPTION VALUE="Mlle" <?php if(@$candidat_civilite=="Mlle"){ echo 'selected'; } ?> >Melle</OPTION>
                                </SELECT>
                           </div>
                       </div>
                      
                       <div class="form-group" id="ft_bloc">
                       <div class="col-sm-1"></div>
                           
                             <label for="firstname" class="col-sm-3">Nom : <font color=red>*</font></label>
                            <div class="col-sm-3"> 
                             <input class="form-control" type="text" name="CANDIDAT_NOM" placeholder="" id="CANDIDAT_NOM"   maxlength="30"    value="<?php echo @$candidat_nom; ?>"/>
                           </div>
                      </div>
                       <div class="form-group">
                       <div class="col-sm-1"></div>
                            <label for="firstname" class="col-sm-3" >Pr&eacute;nom :</label>
                           <div class="col-sm-3">
                              <INPUT  class="form-control"  type="text" name="CANDIDAT_PRENOM" placeholder="" id="CANDIDAT_PRENOM"  size="30" maxlength="30"   value="<?php echo @$candidat_prenom;?>" />
                           </div>
                           
                        </div> 
                        <!---    -->
                        <div id="bloc_hide">
                            <div class="form-group">
                               <div class="col-sm-1"></div>
                                   <label for="firstname" class="col-sm-3">Num&eacute;ro matricule:<font color=red>*</font></label>
                                   <div class="col-sm-3">
                                   <INPUT  class="form-control"  type="text" name="CANDIDAT_MATRICULE" id="CANDIDAT_MATRICULE" placeholder="" size="30" maxlength="6" value="<?php echo @$candidat_matricule;  ?>"   >
                                   
                                  </div> 
                            </div>
                         </div>
                        <!-----  debut bloc supp --->  
                           
                        <div class="form-group" id="bloc_sup">
                           <div class="col-sm-1"></div>
                              <label for="firstname" class="col-sm-3">Date de naissance : <font color=red>*</font></label>
                               <div class="col-sm-3">
                               <INPUT class="form-control"    type="text" name="CANDIDAT_DATE_NAISSANCE" id="CANDIDAT_DATE_NAISSANCE" placeholder="aaaa-mm-jj"  value="<?php echo @$candidat_date_naissance; ?>"   />
                              <!--span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span-->
							  </div>
                             
                        </div>  
                        <!--- fin bloc supp ---->
                        <div class="form-group" >
                           <div class="col-sm-1"></div>
                              <label class="col-sm-3"> Photo:<font color=red>*</font></label>
                               <div class="col-sm-5">
                              <INPUT type="file" name="CANDIDAT_PHOTO"  id="CANDIDAT_PHOTO"  class="filestyle" data-buttonBefore="true" data-buttonText="Choisir Fichier"/>
                               <span><?php if(@$candidat_photo!=""){ echo @$candidat_photo; }?></span>
                                <INPUT type="hidden" name="OLD_PHOTO"  id="OLD_PHOTO"  value="<?php echo @$candidat_photo;?>"  />
                              </div>
                        </div>
                         <div class="form-group">
                           <div class="col-sm-1"></div>
                             
                               <label for="firstname" class="col-sm-3">Lieu de naissance :<font color=red>*</font></label>
                               <div class="col-sm-3">
                               <INPUT class="form-control"  name="CANDIDAT_LIEU_NAISSANCE" id="CANDIDAT_LIEU_NAISSANCE" placeholder=""  size="30" maxlength="30"  type="text"   value="<?php echo @$candidat_lieu_naissance; ?>"/>
                              </div>
                           </div>   
                              <div class="form-group">
                               <div class="col-sm-1"></div>
                                   <label for="firstname" class="col-sm-3">Nationalit&eacute; :<font color=red>*</font></label>
                                   <div class="col-sm-3">
                                 <SELECT name="CANDIDAT_NATIONALITE" class="form-control" >
                                    <option value="">S&eacute;lectionnez</option>
                                    <OPTION VALUE="BENINOISE"  <?php if(@$candidat_nationalite=="BENINOISE"){ echo 'selected'; } ?>>B&eacute;ninoise</OPTION>
                                    <OPTION VALUE="BISSAO-GUINEENNE"  <?php if(@$candidat_nationalite=="BISSAO-GUINEENNE"){ echo 'selected'; } ?>>Bissao-guin&eacute;enne</OPTION>
                                    <OPTION VALUE="BURKINABE"  <?php if(@$candidat_nationalite=="BURKINABE"){ echo 'selected'; } ?>>Burkinab&eacute;</OPTION>
                                    <OPTION VALUE="CAMEROUNAISE"  <?php if(@$candidat_nationalite=="CAMEROUNAISE"){ echo 'selected'; } ?>>Camerounaise</OPTION>
                                    <OPTION VALUE="CENTRAFRICAINE"  <?php if(@$candidat_nationalite=="CENTRAFRICAINE"){ echo 'selected'; } ?>>Centrafricaine</OPTION>
                                    <OPTION VALUE="COMORIENNE"  <?php if(@$candidat_nationalite=="COMORIENNE"){ echo 'selected'; } ?>>Comorienne</OPTION>
                                    <OPTION VALUE="CONGOLAISE"  <?php if(@$candidat_nationalite=="CELIBATAIRE"){ echo 'selected'; } ?>>Congolaise</OPTION>
                                    <OPTION VALUE="EQUATO-GUINEENNE"  <?php if(@$candidat_nationalite=="EQUATO-GUINEENNE"){ echo 'selected'; } ?>>Equato-guin&eacute;enne</OPTION>
                                    <OPTION VALUE="FRANCAISE"  <?php if(@$candidat_nationalite=="FRANCAISE"){ echo 'selected'; } ?>>Fran&ccedil;aise</OPTION>
                                    <OPTION VALUE="GABONAISE"  <?php if(@$candidat_nationalite=="GABONAISE"){ echo 'selected'; } ?>>Gabonaise</OPTION>
                                    <OPTION VALUE="IVOIRIENNE"  <?php if(@$candidat_nationalite=="IVOIRIENNE"){ echo 'selected'; } ?>>Ivoirienne</OPTION>
                                    <OPTION VALUE="MALGACHE"  <?php if(@$candidat_nationalite=="MALGACHE"){ echo 'selected'; } ?>>Malgache</OPTION>
                                    <OPTION VALUE="MALIENNE"  <?php if(@$candidat_nationalite=="MALIENNE"){ echo 'selected'; } ?> >Malienne</OPTION>
                                    <OPTION VALUE="MAURITANIENNE"  <?php if(@$candidat_nationalite=="MAURITANIENNE"){ echo 'selected'; } ?>>Mauritanienne</OPTION>
                                    <OPTION VALUE="NIGERIENNE"  <?php if(@$candidat_nationalite=="NIGERIENNE"){ echo 'selected'; } ?>>Nig&eacute;rienne</OPTION>
                                    <OPTION VALUE="SENEGALAISE"  <?php if(@$candidat_nationalite=="SENEGALAISE"){ echo 'selected'; } ?>>S&eacute;n&eacute;galaise</OPTION>
                                    <OPTION VALUE="TCHADIENNE"  <?php if(@$candidat_nationalite=="TCHADIENNE"){ echo 'selected'; } ?>>Tchadienne</OPTION>
                                    <OPTION VALUE="TOGOLAISE"  <?php if(@$candidat_nationalite=="CELIBATAIRE"){ echo 'selected'; } ?>>Togolaise</OPTION>
                                </SELECT>
                              </div>
                        </div> 
                         
                         <div class="form-group">
                            <div class="col-sm-1"></div>
                            
                              <label for="firstname" class="col-sm-3">Situation matrimoniale : <font color=red>*</font></label>
                               <div class="col-sm-3">
                               <SELECT   name="CANDIDAT_SIT_MAT" class="form-control" >
                                    <option value="">S&eacute;lectionnez</option>
                                    <OPTION VALUE="CELIBATAIRE"  <?php if(@$candidat_sit_mat=="CELIBATAIRE"){ echo 'selected'; } ?>>C&eacute;libataire</OPTION>
                                    <OPTION VALUE="DIVORCE"  <?php if(@$candidat_sit_mat=="DIVORCE"){ echo 'selected'; } ?>>Divorc&eacute;(e)</OPTION>
                                    <OPTION VALUE="MARIE"  <?php if(@$candidat_sit_mat=="MARIE"){ echo 'selected'; } ?>>Mari&eacute;(e)</OPTION>
                                    <OPTION VALUE="SEPARE"  <?php if(@$candidat_sit_mat=="SEPARE"){ echo 'selected'; } ?>>S&eacute;par&eacute;(e)</OPTION>
                                    <OPTION VALUE="VEUF"  <?php if(@$candidat_sit_mat=="VEUF"){ echo 'selected'; } ?>>Veuf(Veuve)</OPTION>
                                </SELECT>
                              </div>
                         </div>     
                           <div class="form-group">
                             <div class="col-sm-1"></div>
                                <label for="firstname" class="col-sm-3">Nombre d'enfants &aacute; charge:<font color=red>*</font></label>
                                 <div class="col-sm-3">
                                  <SELECT name="CANDIDAT_NBRE_ENF" class="form-control" >
                                    <option value="">S&eacute;lectionnez</option>
                                    <OPTION VALUE="0" <?php if(@$candidat_nbre_enf=="0"){ echo 'selected'; } ?>>0</OPTION>
                                    <OPTION VALUE="1" <?php if(@$candidat_nbre_enf=="1"){ echo 'selected'; } ?>>1</OPTION>
                                    <OPTION VALUE="2" <?php if(@$candidat_nbre_enf=="2"){ echo 'selected'; } ?>>2</OPTION>
                                    <OPTION VALUE="3" <?php if(@$candidat_nbre_enf=="3"){ echo 'selected'; } ?>>3</OPTION>
                                    <OPTION VALUE="4" <?php if(@$candidat_nbre_enf=="4"){ echo 'selected'; } ?>>4</OPTION>
                                    <OPTION VALUE="5" <?php if(@$candidat_nbre_enf=="5"){ echo 'selected'; } ?>>5</OPTION>
                                    <OPTION VALUE="6" <?php if(@$candidat_nbre_enf=="6"){ echo 'selected'; } ?>>6</OPTION>
                                  </SELECT>
                              </div>
                       </div>     
                       
                       <div class="form-group">
                       <div class="col-sm-1"></div>
                         
                           <label for="firstname"  class="col-sm-3">Adresse habituelle : <font color=red>*</font></font></label>
                          <div class="col-sm-5">
                           <textarea  name="CANDIDAT_ADR_PERM" cols="30" rows="2" id="CANDIDAT_ADR_PERM"  placeholder="" class="form-control"  ><?php  echo @$candidat_adr_perm;?></textarea>
                         </div>
                        </div> 
                        <div class="form-group">
                           <div class="col-sm-1"></div> 
                             <label for="firstname" class="col-sm-3">Adresse actuelle :</font></label>
                             <div class="col-sm-5">
                              <textarea name="CANDIDAT_ADR_ACT" cols="30" rows="2" placeholder="" class="form-control" ><?php  echo @$candidat_adr_act;?></textarea>
                             </div>
                        </div>
                        
                        <div class="form-group">
                        <div class="col-sm-1"></div>
                            
                              <label for="firstname" class="col-sm-3">Indicatif du pays :<font color=red>*</font></font></label>
                              <div class="col-sm-5">
                               <select name="CANDIDAT_INDICATIF" id="CANDIDAT_INDICATIF" class="form-control" ></select>
                               </div>
                        </div> 
                        
                        <div class="form-group">
                        <div class="col-sm-1"></div>       
                            
                              <label for="firstname" class="col-sm-3">Num&eacute;ro de t&eacute;l&eacute;phone : <font color=red>*</font></font></label>       
                              <div class="col-sm-3">
                              <INPUT type="text" name="CANDIDAT_NUM_TEL" id="CANDIDAT_NUM_TEL" placeholder=""  size="30" maxlength="15"   onkeypress="return  verif_tel();"  class="form-control"   value="<?php  echo @$candidat_num_tel;?>"/>
                              </div>
                        </div>
                        
                       <div class="form-group">
                       <div class="col-sm-1"></div>
                          
                              <label for="firstname" class="col-sm-3">Num&eacute;ro de GSM : <font color=red>*</font></font></label>  
                              <div class="col-sm-3">                           <INPUT type="text" name="CANDIDAT_NUM_GSM" placeholder="" value="<?php echo @$candidat_num_gsm; ?>" size="30" maxlength="15"    class="form-control" />
                              </div>
                       </div> 
                       
                        <div class="form-group">
                           <div class="col-sm-1"></div>     
                             <label for="firstname" class="col-sm-3">Permis de conduire :<font color=red>*</font></font></label>
                               <div class="col-sm-3">
                               <SELECT name="CANDIDAT_PERMIS" id="CANDIDAT_PERMIS"  class="form-control" >
                                    <option value="">S&eacute;lectionnez</option>
                                        <OPTION VALUE="A1" <?php if(@$candidat_permis=="A1"){ echo 'selected'; } ?>>A1</OPTION>
                                        <OPTION VALUE="A" <?php if(@$candidat_permis=="A"){ echo 'selected'; } ?>>A</OPTION>
                                        <OPTION VALUE="B" <?php if(@$candidat_permis=="B"){ echo 'selected'; } ?>>B</OPTION>
                                        <OPTION VALUE="C" <?php if(@$candidat_permis=="C"){ echo 'selected'; } ?>>C</OPTION>
                                        <OPTION VALUE="D" <?php if(@$candidat_permis=="D"){ echo 'selected'; } ?>>D</OPTION>
                                        <OPTION VALUE="E" <?php if(@$candidat_permis=="E"){ echo 'selected'; } ?>>E</OPTION>
                                        <OPTION VALUE="F" <?php if(@$candidat_permis=="F"){ echo 'selected'; } ?>>F</OPTION>
                                </SELECT>
                              </div>
                        </div>
                       
                       <div class="form-group">
                        <div class="col-sm-1"></div> 
                          
                               <label class="col-sm-3">Avez vous des parents &agrave; l'ASECNA : <font color=red>*</font></label>
                                <div class="col-sm-3">
                                <SELECT  name="CANDIDAT_IS_FAMILLE" id="CANDIDAT_IS_FAMILLE" class="form-control" onchange="return disable_bloc();">
                                    <option value="">S&eacute;lectionnez</option>
                                    <option value="Oui" <?php if(@$candidat_is_famille=="Oui"){ echo 'selected'; } ?>>Oui</option>
                                    <option value="Non" <?php if(@$candidat_is_famille=="Non"){ echo 'selected'; } ?>>Non</option>
                                </SELECT>
                               </div>
                         </div>
                         
                           
                        <div class="form-group" id="div_is_fam">
                        <div class="col-sm-1"></div> 
                           <div class="col-sm-6">
                              <p>Si affirmatif, veuillez saisir les informations sur les liens de parent&eacute;</p>
                           </div>
                          <input type="hidden" id="joker"  name="joker"  value="<?php echo @$joker; ?>" />
                          <input type="hidden" id="FK_UTIL_ID"  name="FK_UTIL_ID"  value="<?php echo @$_SESSION["id_user"];?>" />
                          <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
                          <input type="hidden"  name="CANDIDAT_ID" id="CANDIDAT_ID" value="<?php echo @$candidat_id; ?>" />
                          <input type="hidden"  name="FAMILLE_ID" id="FAMILLE_ID" value="<?php echo @$id_famille; ?>" />
                        </div>
                </fieldset>  
 <div id="bloc_a_cacher" class="col-sm-11">  
    <div class="col-sm-11" style="text-align:right;">
    <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==false)
	{ 
	?> 
<span  id="btn_ajout_famille" onclick="return add_line_fam();"><img src="images/ajouter.png" width="16" height="16"/> Ajouter Famille </span>
    <?php
	
	
	
	} ?>
    </div> 
    <div class="col-lsm-11">      
        <legend class="col-sm-11">Famille </legend>
    </div>         
    <div class="col-sm-1"></div>
    <div class="col-sm-11">
&nbsp;&nbsp;&nbsp;&nbsp;
<table id="example" class="display" cellspacing="0" width="100%" style="float:left;">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Structure</th>
            <th>Degre</th>
            <th style="width:15%">Actions</th>
        </tr>
    </thead>
 
 
    <tbody  id="replace_data">
       <?php 
	   if(!empty($liste_famille))
	   {
	   foreach(@$liste_famille as $row)
	   {
	   ?>
        <tr>
            <td><?php  echo $row[$ob_famille->GetCh_FAMILLE_NOM()];?></td>
            <td><?php  echo $row[$ob_famille->GetCh_FAMILLE_PRENOM()];?></td>
            <td><?php  echo $row[$ob_famille->GetCh_FAMILLE_STRUCTURE()];?></td>
            <td><?php  echo $row[$ob_famille->GetCh_FAMILLE_DEGRE()];?></td>
            <td style="height:15px;">
             <a href="index.php?page=form_coord_personnelles<?php if($obj_postulation->check_nbrepostule($fk_util_id)==false){ echo '&annonce_id='.$fk_annonce_id; }else{ echo '&';} ?>id_famille=<?php  echo $row[$ob_famille->GetCh_FAMILLE_ID()];?>"  class="btn-sm btn-success"  <?php if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?> >Editer</a>
            <a href="controler/Famille_controler.php?joker=3&id_famille=<?php echo $row[$ob_famille->GetCh_FAMILLE_ID()]."&annonce_id=".$fk_annonce_id;?>"  class="btn-sm btn-danger" <?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } else {  echo 'onclick="return confirm(\'Voulez vous supprimer cet enregistrement\')"'.'  class="btn-sm btn-danger"' ; } ?>>Supprimer</a></td>
        </tr>
        
        <?php
	   }
	   
	   }
		?>
      
    </tbody>
</table>
   </div> 
   
     <div class="col-sm-1"></div>
    <div class="col-sm-11"  id="form_famille">
                <input type="hidden" value="<?php if(@$nbre_line){ echo @$nbre_line;}else{ echo '0';} ?>" name="nbre_lign" id="nbre_lign" />
                    <fieldset>
                        <div  id="a_changer"> 
                        <?php
						
						if(!empty($lister_fam))
						{
								foreach($lister_fam as $row)
								{
									
						echo '<div class="form-group"  >'.
                          
                              '<div class="col-sm-2">'. 
                                '<label>Nom :<font color=red>*</font></label>'.
                               '<input type="text" name="FAMILLE_NOM"  id="FAMILLE_NOM" placeholder="" value="'.$famille_nom.'" size="30" maxlength="30" class="form-control" >'.
							   '</div>'.
                              '<div class="col-sm-3">'.
                                '<label>Pr&eacute;noms :<font color=red>*</font></label>'.
                                '<input type="text" name="FAMILLE_PRENOM" id="FAMILLE_PRENOM" placeholder="" value="'.$famille_prenom.'" size="30" maxlength="30" class="form-control" >'.
                               '</div>'.
                               
                                '<div class="col-sm-2">'.
                                '<label>Structure :<font color=red>*</font></label>'.
                                '<input type="text" name="FAMILLE_STRUCTURE" id="FAMILLE_STRUCTURE"  placeholder="" value="'.$famille_structure.'" size="30" maxlength="30" class="form-control" >'.
								'</div>'.
                                '<div class="col-sm-2">'.
                                '<label>Degr&eacute; :<font color=red>*</font></label>'.
                                '<input type="text" name="FAMILLE_DEGRE" id="FAMILLE_DEGRE"  placeholder="" value="'.$famille_degre.'" size="30" maxlength="30" class="form-control" >'.
                                
                              '</div>'.
							   '<div class="col-sm-2">'.
							    '<input type="hidden" name="CANDIDAT_ID_FAM" id="CANDIDAT_ID_FAM"  value="'.$candidat_id.'" size="30" maxlength="30" class="form-control">'.
								'<input type="hidden" name="FAMILLE_ID" id="FAMILLE_ID"  value="'.$id_famille.'" size="30" maxlength="30" class="form-control">'.
							'<input type="hidden" name="FK_ANNONCE_ID" id="FK_ANNONCE_ID"  value="'.$fk_annonce_id.'" size="30" maxlength="30" class="form-control">'.    '<label>&nbsp;&nbsp;&nbsp;</label></br>'.
								'</div>'.
                            '</div>';
								
								
								}
						}
						?>
                        
                        </div>
                    </fieldset>
           </div>         
  </div>              
                <!--  fin  element a cacher --->  <!--?php  if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?--> <!--?php if($obj_postulation->check_nbrepostule($fk_util_id)==true){ echo DISABLE_LINK; } ?-->
               <div id="div_btn_enreg">
                  <div class="form-group" >
                     <div class="col-sm-7">
                        <div class="modal-footer">
                         <button type="submit" class="btn btn-info" id="submit"  name="enregistrer_continue" value="<?php  echo $btn_enreg; ?>" ><?php  echo $btn_enreg; ?></button>
                       <?php  if(@$btn_enreg=="Enregistrer"){ echo '<button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit" '?>  <?php echo ' value="Enregistrer et Continuer">Enregistrer et Continuer</button>';} ?>
                           
                        </div>
                      </div>
                    </div>
                    </div>
          </form>       
         
</div>
</div>
</center>
<script>

            /* var choix_fam=$('#CANDIDAT_IS_FAMILLE').val();
			  
			  if(choix_fam=="Non" || choix_fam=="" ){
				  
					var cont=$('#div_btn_enreg').html(); 
					$('#div_btn_enreg').remove(); 
					$(cont).insertBefore('#bloc_a_cacher');
			   
			  }
			  
			  if(choix_fam=="Oui" ){
				  
					var cont=$('#div_btn_enreg').html(); 
					$('#div_btn_enreg').remove(); 
					$(cont).insertAfter('#bloc_a_cacher');
			   
			  }
			*/  
			
			 
</script>

