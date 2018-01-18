<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);
$fk_util_id= $_SESSION["id_user"];

	$fk_annonce_id="";
	$obj_postulation=new Postulation_class();

	if(!@$_SESSION["id_user"])
	{
	   $obj_postulation->session_valide();	
	}

if(isset($_GET["annonce_id"]))
{
	$fk_annonce_id=$_GET["annonce_id"];
}

 $fk_util_id=@$_SESSION['id_user'];
 $obj_candidat=new Candidat_class();
 $obj_postulation=new Postulation_class();
 $obj_dossier=new Dossier_class();
 
 $candidat_type="";
 $candidat_id="";
	   
 $lister_cand=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
 $candidat_id=@$lister_cand[0][$obj_candidat->GetCh_CANDIDAT_ID()];
 
 
  
  $lister_candidat=@$obj_candidat->GetCandidat_By_candidat_id_and_fk_util_id($candidat_id,$fk_util_id);
  $candidat_id=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
  $candidat_type=$lister_candidat[0][$obj_candidat->GetCh_CANDIDAT_TYPE()];
  $liste_dossier=$obj_dossier->lister_dossier_By_CAND_ID($candidat_id);
 
 //---------------------------------------------------------------//

		$joker="1";
		$btn_enreg="Enregistrer";
		
		if($obj_postulation->check_nbrepostule($fk_util_id)==true)
		{ 
		  $joker=4;
		}
		//***********************************************//
		
		$candidat_demande_emploi="";
		$candidat_cv="";
		$candidat_acte_naiss="";
		$candidat_certificat_travail="";
		$candidat_fiche_famille="";
		$candidat_certif_nat="";
		$candidat_certif_dom="";
		$candidat_certif_med="";
		$candidat_casier_jud="";
   
	   if(!empty($liste_dossier))
	   {
			$joker="2";
			$dossier_id=$liste_dossier[0][$obj_dossier->GetCh_DOSSIER_ID()];
			
			foreach($liste_dossier as $row){
				
				   $type_doss=$row[$obj_dossier->GetCh_Type_doss()];
				   
				
				   if($type_doss=="Act_naiss")
				   {
					  $candidat_acte_naiss=$row[$obj_dossier->GetCh_DOSSIER_LIEN()];
					  $id_act_naiss=$row[$obj_dossier->GetCh_DOSSIER_ID()];
				   }
				   if($type_doss=="Demande_emploi")
				   {
					  $candidat_demande_emploi=$row[$obj_dossier->GetCh_DOSSIER_LIEN()];
					  $id_dem_epl=$row[$obj_dossier->GetCh_DOSSIER_ID()];
				   }
				   if($type_doss=="Cv")
				   {
					   $candidat_cv=$row[$obj_dossier->GetCh_DOSSIER_LIEN()];
					   $id_cv=$row[$obj_dossier->GetCh_DOSSIER_ID()];
				   }
				   if($type_doss=="Cert_trav")
				   {
					 $candidat_certificat_travail=$row[$obj_dossier->GetCh_DOSSIER_LIEN()];
					 $id_cert_trav=$row[$obj_dossier->GetCh_DOSSIER_ID()];
				   }
				   if($type_doss=="Cert_nat")
				   {
					  $candidat_certif_nat=$row[$obj_dossier->GetCh_DOSSIER_LIEN()];
					  $id_cert_nat=$row[$obj_dossier->GetCh_DOSSIER_ID()];
				   }
				   if($type_doss=="Cert_dom")
				   {
					   $candidat_certif_dom=$row[$obj_dossier->GetCh_DOSSIER_LIEN()];
					   $id_cert_dom=$row[$obj_dossier->GetCh_DOSSIER_ID()];
				   }
				   if($type_doss=="Cert_med")
				   {
					   $candidat_certif_med=$row[$obj_dossier->GetCh_DOSSIER_LIEN()];
					   $id_cert_med=$row[$obj_dossier->GetCh_DOSSIER_ID()];
				   }
				   if($type_doss=="Casier_jud")
				   {
					  $candidat_casier_jud=$row[$obj_dossier->GetCh_DOSSIER_LIEN()];
					  $id_casier_jud=$row[$obj_dossier->GetCh_DOSSIER_ID()];
				   }
				   if($type_doss=="Fiche_fam")
				   {
					  $candidat_fiche_famille=$row[$obj_dossier->GetCh_DOSSIER_LIEN()];
					  $id_fiche_fam=$row[$obj_dossier->GetCh_DOSSIER_ID()]; 
				   }
			}
			
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
<form class="form-horizontal"  action="controler/Dossier_controler.php" method="POST"  enctype="multipart/form-data"  name="form" id="form">
                <fieldset  class="col-sm-9">
                   <span>Utiliser <strong>Enregistrer</strong> pour enregistrer et rester sur la meme page </span><br/>
               			<span>Utiliser <strong>Enregistrer et Continuer</strong>  pour enregistrer et aller à la page suivante </span><br/>
               			<span>Oubien utiliser <strong>Le menu gauche</strong> pour renseigner chaque etape de la Postulation </span><br/><br/>
                    <legend>11-P&egrave;ces jointes</legend>
                    
                   <div class="form-group">
                       <div class="col-sm-1"></div>
                     
                            <label class="col-sm-3">Demande d'emploi : <font color=red>*</font></label>
                            <div class="col-sm-5">
                            <span><?php if(@$candidat_demande_emploi!=""){ echo @$candidat_demande_emploi; }?></span>
                            <input type="file"   value="" name="CANDIDAT_DEMANDE_EMPLOI" id="CANDIDAT_DEMANDE_EMPLOI" class="filestyle" data-buttonBefore="true" data-buttonText="Choisir Fichier"  >*.jpeg; *.jpg
                            <INPUT type="hidden" name="OLD_CANDIDAT_DEMANDE_EMPLOI" id="OLD_CANDIDAT_DEMANDE_EMPLOI"  value="<?php echo @$candidat_demande_emploi;?>"  />
                            
                            <INPUT type="hidden" name="ID_CANDIDAT_DEMANDE_EMPLOI" id="ID_CANDIDAT_DEMANDE_EMPLOI"  value="<?php echo @$id_dem_epl;?>"  />
                            </div>
                      </div>
                   <div class="form-group">
                       <div class="col-sm-1"></div>
                           <label class="col-sm-3">CV : <font color=red>*</font></label>
                               <div class="col-sm-5">
                                <span><?php if(@$candidat_cv!=""){ echo @$candidat_cv; }?></span>
                            <input type="file"  accept="image/*,pdf" value=""  name="CANDIDAT_CV" id="CANDIDAT_CV" class="filestyle" data-buttonBefore="true" data-buttonText="Choisir Fichier"  >*.jpeg; *.jpg  
                             <INPUT type="hidden" name="OLD_CANDIDAT_CV"  id="OLD_CANDIDAT_CV"  value="<?php echo @$candidat_cv;?>"  />
                             <INPUT type="hidden" name="ID_CANDIDAT_CV" id="ID_CANDIDAT_CV"  value="<?php echo @$id_cv;?>"  />
                              </div>
                  </div>
                   
                         
                         <?php
						
						 if(@$candidat_type!="" && @$candidat_type=="Externe")
						 {
						 ?>
                         <div class="form-group">
                         <div class="col-sm-1"></div>
                            <label class="col-sm-3">Extrait de l'acte de naissance : <font color=red>*</font></label>
                            <div class="col-sm-5">
                            <span><?php if(@$candidat_acte_naiss!=""){ echo @$candidat_acte_naiss; }?></span>
                            <input type="file"  value="acte_naissance" name="CANDIDAT_ACTE_NAISS" id="CANDIDAT_ACTE_NAISS" class="filestyle" data-buttonBefore="true" data-buttonText="Choisir Fichier"  >*.jpeg; *.jpg
                            <INPUT type="hidden" name="OLD_CANDIDAT_ACTE_NAISS"  id="OLD_CANDIDAT_ACTE_NAISS"  value="<?php echo @$candidat_acte_naiss;?>"  />
                            <INPUT type="hidden" name="ID_CANDIDAT_ACTE_NAISS"  id="ID_CANDIDAT_ACTE_NAISS"  value="<?php echo @$id_act_naiss;?>"  />
                            </div>
                         </div>
                         
                        <div class="form-group">
                            <div class="col-sm-1"></div>
                             
                            <label class="col-sm-3">Certificat du dernier emploi : <font color=red>*</font></label>
                             <div class="col-sm-5">
                              <span><?php if(@$candidat_certificat_travail!=""){ echo @$candidat_certificat_travail; }?></span>
                            <input type="file"   value="photo" name="CANDIDAT_CERTIFICAT_TRAVAIL" id="CANDIDAT_CERTIFICAT_TRAVAIL" class="filestyle" data-buttonBefore="true" data-buttonText="Choisir Fichier"  >*.jpeg; *.jpg
                            <INPUT type="hidden" name="OLD_CANDIDAT_CERTIFICAT_TRAVAIL"  id="OLD_CANDIDAT_CERTIFICAT_TRAVAIL"  value="<?php echo @$candidat_certificat_travail;?>"  />
                            
                            <INPUT type="hidden" name="ID_CANDIDAT_CERTIFICAT_TRAVAIL"  id="ID_CANDIDAT_CERTIFICAT_TRAVAIL"  value="<?php echo @$id_cert_trav;?>"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1"></div>
                       
                            <label class="col-sm-3">Livret de famille ou Fiche Famille : <font color=red>*</font></label>
                           <div class="col-sm-5">
                            <span><?php if(@$candidat_fiche_famille!=""){ echo @$candidat_fiche_famille; }?></span>
                            <input type="file"  value="fiche_famille" name="CANDIDAT_FICHE_FAMILLE" class="filestyle" data-buttonBefore="true" data-buttonText="Choisir Fichier"  > *.jpeg; *.jpg
                            <INPUT type="hidden" name="OLD_CANDIDAT_FICHE_FAMILLE"  id="OLD_CANDIDAT_FICHE_FAMILLE"  value="<?php echo @$candidat_fiche_famille;?>"  />
                            <INPUT type="hidden" name="ID_CANDIDAT_FICHE_FAMILLE"  id="ID_CANDIDAT_FICHE_FAMILLE"  value="<?php echo @$id_fiche_fam;?>"  />
                           </div>
                       </div>
                        
                      <div class="form-group">
                           <div class="col-sm-1"></div>
                            <label class="col-sm-3">Certificat de nationalit&eacute; : <font color=red>*</font></label> 
                            <div class="col-sm-5">
                             <span><?php if(@$candidat_certif_nat!=""){ echo @$candidat_certif_nat; }?></span>
                            <input type="file"  value="certif_nat" name="CANDIDAT_CERTIF_NAT" class="filestyle" data-buttonBefore="true" data-buttonText="Choisir Fichier"  >*.jpeg; *.jpg
                            <INPUT type="hidden" name="OLD_CANDIDAT_CERTIF_NAT"  id="OLD_CANDIDAT_CERTIF_NAT"  value="<?php echo @$candidat_certif_nat;?>"  /> 
                            <INPUT type="hidden" name="ID_CANDIDAT_CERTIF_NAT"  id="ID_CANDIDAT_CERTIF_NAT"  value="<?php echo @$id_cert_nat;?>"  />     
                            
                             </div>
                          </div>
                          
                          <div class="form-group">
                          <div class="col-sm-1"></div>
                           <label class="col-sm-3">Certificat de domicile : <font color=red>*</font></label>
                             <div class="col-sm-5">
                             <span><?php if(@$candidat_certif_dom!=""){ echo @$candidat_certif_dom; }?></span>
                            <input type="file"  value="certificat_domicile" name="CANDIDAT_CERTIF_DOMICILE" class="filestyle" data-buttonBefore="true" data-buttonText="Choisir Fichier"  >*.jpeg; *.jpg
                            <INPUT type="hidden" name="OLD_CANDIDAT_CERTIF_DOMICILE"  id="OLD_CANDIDAT_CERTIF_DOMICILE"  value="<?php echo @$candidat_certif_dom;?>"  />
                            <INPUT type="hidden" name="ID_CANDIDAT_CERTIF_DOMICILE"  id="ID_CANDIDAT_CERTIF_DOMICILE"  value="<?php echo @$id_cert_dom;?>"  />
                           </div>
                           </div>
                        
                       <div class="form-group">
                         <div class="col-sm-1"></div>
                           
                            <label class="col-sm-3">Certificat m&eacute;dical : <font color=red>*</font></label>
                            <div class="col-sm-5">
                            <span><?php if(@$candidat_certif_med!=""){ echo @$candidat_certif_med; }?></span>
                            <input type="file"  value="certificat_medical" name="CANDIDAT_CERTIF_MEDICAL"  class="filestyle" data-buttonBefore="true" data-buttonText="Choisir Fichier" >*.jpeg; *.jpg
                            <INPUT type="hidden" name="OLD_CANDIDAT_CERTIF_MEDICAL"  id="OLD_CANDIDAT_CERTIF_MEDICAL"  value="<?php echo @$candidat_certif_med;?>"  />
                            <INPUT type="hidden" name="ID_CANDIDAT_CERTIF_MEDICAL"  id="ID_CANDIDAT_CERTIF_MEDICAL"  value="<?php echo @$id_cert_med;?>"  />
                           </div>
                           </div>
                           
                           <div class="form-group">
                           <div class="col-sm-1"></div>
                            <label class="col-sm-3">Casier judiciaire : <font color=red>*</font></label>
                             <div class="col-sm-5">
                             <span><?php if(@$candidat_casier_jud!=""){ echo @$candidat_casier_jud; }?></span>
                            <input type="file" value="casier_judiciaire" name="CANDIDAT_CASIER_JUDICIAIRE"  class="filestyle" data-buttonBefore="true" data-buttonText="Choisir Fichier"  >*.jpeg; *.jpg
                           <INPUT type="hidden" name="OLD_CANDIDAT_CASIER_JUDICIAIRE"  id="OLD_CANDIDAT_CASIER_JUDICIAIRE"  value="<?php echo @$candidat_casier_jud;?>"  /> 
                           <INPUT type="hidden" name="ID_CANDIDAT_CASIER_JUDICIAIRE"  id="ID_CANDIDAT_CASIER_JUDICIAIRE"  value="<?php echo @$id_casier_jud;?>"  /> 
                          </div>
                      </div>
                      <?php
						 }
					  ?>
                       <div class="form-group">
                     <div class="col-sm-8">
                        <div class="modal-footer">
                         <button type="submit" class="btn btn-info" id="submit"  name="enregistrer_continue" value="<?php  echo $btn_enreg; ?>" ><?php  echo $btn_enreg; ?></button>
                       <?php  if(@$btn_enreg=="Enregistrer"){ echo '<button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit" '?> <?php echo ' value="Enregistrer et Continuer">Enregistrer et Continuer</button>';} ?>
                           
                        </div>
                      </div>
                    </div>
                       <input type="hidden" name="joker" id="joker" value="<?php echo $joker; ?>" />
                       <input type="hidden" name="id_user" id="id_user" value="<?php echo @$fk_util_id; ?>" />
                       <input type="hidden" name="type_candidat" id="type_candidat" value="<?php echo @$candidat_type; ?>" />
                       <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$fk_annonce_id; ?>" />
                       <input type="hidden"  name="DOSSIER_ID" id="DOSSIER_ID" value="<?php echo @$dossier_id; ?>" />

                </fieldset>
    </form>
    </div>
    </div>
    </center>