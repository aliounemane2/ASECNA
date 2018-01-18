<?php

 require_once($_SESSION['AVP_CONFIG']);
 $obj_secteur=new Secteur_class();
 $liste_secteur=$obj_secteur->lister_secteur();
 $id_annonce="";
 $lister_annonces=array();
 
    $obj_postulation=new Postulation_class();
    $obj_annonce=new Annonce_class();
 
    $obj_departement=new Departement_class();
	$liste_departement=$obj_departement->lister_departement();


if(!@$_SESSION["id_user"])
{
  $obj_postulation->session_valide();	
}

 
 $date_deb="";
 $date_fin="";
 $date_delai="";
 
 if(isset($_GET["annonce_id"]))
 { 
	$id_annonce=$_GET["annonce_id"];
	
    $lister_annonces=$obj_annonce->lister_annonce($id_annonce);
	
	$date_deb=$lister_annonces[0][$obj_annonce->GetCh_ANNONCE_DATE_DEB()];
    $date_fin=$lister_annonces[0][$obj_annonce->GetCh_ANNONCE_DATE_FIN()];
    $date_delai=$lister_annonces[0][$obj_annonce->GetCh_ANNONCE_DELAI_AGE()];
	$date_creation=$lister_annonces[0][$obj_annonce->GetCh_ANNONCE_DATE_CREATION()];
	
	
	
	
	 ($obj_annonce->La_date_est_en($date_deb)==true) ? $date_deb=$obj_annonce->dateswitch($date_deb): $date_deb;
	 ($obj_annonce->La_date_est_en($date_fin)==true) ? $date_fin=$obj_annonce->dateswitch($date_fin): $date_fin;
	 ($obj_annonce->La_date_est_en($date_delai)==true) ? $date_delai=$obj_annonce->dateswitch($date_delai): $date_delai;
	 ($obj_annonce->La_date_est_en($date_creation)==true) ? $date_creation=$obj_annonce->dateswitch($date_creation): $date_creation;
	 
 }


?>


<div class="container"  class="col-sm-11">
<div class="col-sm-11" style="margin-left:-30px;">
<ol class="breadcrumb" >
  <li><a href="#">Accueil</a></li>
  <li><a href="#">Ressources Humaines</a></li>
  <li class="active">Insertion des avis de vacance de poste</li>
</ol>     
<!-- contenu à mettre  -->
<form  class="form-horizontal" action="controler/Annonce_controler.php"  id="myformannonce" name="annonce" method="POST" enctype="multipart/form-data"> 	

			<fieldset>
				<div class="form-group">
                    <div class="col-sm-1"></div>
						<label class="col-sm-3">R&eacute;f&eacute;rence</label>
                        <div class="col-sm-3">
						<input type="text" required name="ANNONCE_NUM" size="60" value="<?php  echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_NUM()]; ?>"  class="form-control">
					  </div>
                      
                </div>
                <div class="form-group">
                    <div class="col-sm-1"></div>
                            <label class="col-sm-3">Titre</label>
                            <div class="col-sm-3">
                            <input type="text" required name="ANNONCE_TITRE" value="<?php  echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_TITRE()]; ?>"  class="form-control">
                        </div>
                 </div>
                <div class="form-group">
                    <div class="col-sm-1"></div>
                        <label class="col-sm-3">Description</label>
                         <div class="col-sm-6">
                        <textarea name="ANNONCE_DESCRIPTION" required rows="6" cols="70" placeholder="Saisissez la description de l'annonce"  class="form-control"><?php  echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_DESCRIPTION()]; ?></textarea>
                         </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-1"></div>
                        <label class="col-sm-3">Date creation:</label>
                        <div class="col-sm-3">
                        <input type="text" required name="ANNONCE_DATE_CREATION" value="<?php  echo $date_creation; ?>" id="ANNONCE_DATE_CREATION"  class="form-control">
                      </div>
                     
              </div>
               <div class="form-group">
                    <div class="col-sm-1"></div>
                       <label class="col-sm-3">Date limite de réception des candidatures</label>
                        <div class="col-sm-4">
                        <input type="text" required name="ANNONCE_DATE_DEB" value="<?php  echo $date_deb; ?>" id="ANNONCE_DATE_DEB"  class="form-control">
                        </div>
               </div>
              <div class="form-group">
                    <div class="col-sm-1"></div>
                       <label class="col-sm-3">Poste à pourvoir</label>
                       <div class="col-sm-3">
                        <input type="text" required name="ANNONCE_DATE_FIN" value="<?php  echo $date_fin; ?>" id="ANNONCE_DATE_FIN"  class="form-control">
                      </div>
               </div>
                <div class="form-group">
                    <div class="col-sm-1"></div>
                        <label class="col-sm-3">Age</label>
                          <div class="col-sm-3">
                        <input type="text" required name="ANNONCE_AGE" value="<?php  echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_AGE()]; ?>"  class="form-control">
				    </div>
               </div>
               
			   <div class="form-group">
                    <div class="col-sm-1"></div>
                     
                        <label class="col-sm-3">Date d&eacute;lai age</label>
                         <div class="col-sm-3">
                        <input type="text" required name="ANNONCE_DELAI_AGE" id="ANNONCE_DELAI_AGE" value="<?php  echo $date_delai; ?>" class="form-control">
				     </div>
                     
                 </div>
                  <div class="form-group">
                    <div class="col-sm-1"></div>
                
                      <label class="col-sm-3">Secteur :</label>
                          <div class="col-sm-3">
                            <SELECT name="SECTEUR"  id="SECTEUR" class="form-control">
                               <option value="" >Selectionnez un secteur</option> 
                               <?php
							   foreach($liste_secteur  as $row)
							   {
								?>
                                <option value="<?php echo $row[$obj_secteur->GetCh_id()]; ?>"  <?php if($row[$obj_secteur->GetCh_id()]==$lister_annonces[0][$obj_annonce->GetCh_SECTEUR()]) { echo 'selected';} ?>><?php echo ucfirst($row[$obj_secteur->GetCh_domaine()]); ?></option>
                                
                                <?php
							    }
								?>
                               
                               
                           </SELECT>
                      </div>
                      </div>
                      
                      
                       <div class="form-group">
                       <div class="col-sm-1"></div>
                      <label class="col-sm-3">Departement :</label>
                       <div class="col-sm-4"> 
                        <SELECT name="DEPARTEMENT" id="DEPARTEMENT"  class="form-control">
                           <option value="" >Selectionnez un departement</option> 
                           <?php
                           foreach($liste_departement as $row)
                           {
                                 
                          ?>
                            <option value="<?php echo $row[$obj_departement->GetCh_id()]; ?>"  
                            <?php if($row[$obj_departement->GetCh_id()]==$lister_annonces[0][$obj_annonce->GetCh_DEPARTEMENT()]) { echo 'selected';} ?> >
                            <?php echo ucfirst($row[$obj_departement->GetCh_libelle()]); ?>
                            </option>
                            
                            <?php
                            }
                            ?>
                              
                       </SELECT>
                      </div>
                      
                 </div>
				<div class="form-group">
                    <div class="col-sm-1"></div>
                      
                        <label class="col-sm-3">Lien</label>
                        <div class="col-sm-4">
                        <input type="file"     name="ANNONCE_LIEN" id="ANNONCE_LIEN"  value=""    class="filestyle" data-buttonBefore="true"><?php echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_LIEN()]; ?>
                       
				     </div>
                    
			   </div>
                <input type="hidden" name="OLD_ANNONCE_LIEN" id="OLD_ANNONCE_LIEN"  value="<?php echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_LIEN()]; ?>"/>
               
               <div class="form-group">
                    <div class="col-sm-1"></div>
                        <label class="col-sm-3">Etat</label>
                         <div class="col-sm-4">
                        <select     id="ETAT" name="ETAT"    class="form-control">
                         <option value="EN COURS" >EN COURS</option>
                         <option value="CLOTURE" >CLOTURE</option>
                        </select>
				     </div>
                   
			   </div>
               <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-1">
                     <button type="submit" class="btn btn-info ">Modifier</button>
                  </div>
                  <div class="col-sm-2">
                    <button type="reset" class="btn btn-info ">Annuler</button>
                  </div>
               </div>
    <input type="hidden" name="joker" id="joker" value="2" />
    <input type="hidden" name="ANNONCE_ID" id="ANNONCE_ID" value="<?php echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_ID()]; ?>" />
               
				
			  </fieldset>
</form>	
<!-- fin contenu à mettre  -->
</div>
</div>

<script type="text/javascript">
          // When the document is ready
          /*  $(document).ready(function () 
			{
                $('#ANNONCE_DATE_FIN').datepicker({
                    format: "dd-mm-yyyy",
                });
				
				  $('#ANNONCE_DATE_DEB').datepicker({
                    format: "dd-mm-yyyy"
                });
				$('#ANNONCE_DELAI_AGE').datepicker({
						format: "dd-mm-yyyy"
					});
            });*/
  </script>