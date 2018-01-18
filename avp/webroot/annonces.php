<?php
 @session_start();
 require_once($_SESSION['AVP_CONFIG']);
 
    $obj_secteur=new Secteur_class();
    $liste_secteur=$obj_secteur->lister_secteur();
	
	$obj_departement=new Departement_class();
	$liste_departement= $obj_departement->lister_departement();
	
	
 
    $obj_postulation=new Postulation_class();

	if(!@$_SESSION["id_user"])
	{
	    $obj_postulation->session_valide();	
	}

?>
<style>


</style>

<div class="container col-sm-11">

<div class="col-sm-11" style="margin-left:-30px;">

<ol class="breadcrumb" >
  <li><a href="#">Accueil</a></li>
  <li><a href="#">Ressources Humaines</a></li>
  <li class="active">Insertion des avis de vacance de poste</li>
</ol>
                                                
<!-- contenu à mettre  -->
<form  class="form-horizontal" action="controler/Annonce_controler.php" method="POST"  id="form" name="form"  enctype="multipart/form-data"> 	
  <fieldset>
				<div class="form-group">
                    <div class="col-sm-1"></div>
					  <label class="col-sm-3">R&eacute;f&eacute;rence</label>
                    <div class="col-sm-7">
					  <input type="text" name="ANNONCE_NUM" id="ANNONCE_NUM" size="60" value=""  class="form-control">
					</div>
                </div>
                
				<div class="form-group">
                    <div class="col-sm-1"></div>
                    <label class="col-sm-3">Titre</label>
                    <div class="col-sm-7">
                      <input type="text" name="ANNONCE_TITRE" id="ANNONCE_TITRE" value=""  class="form-control">
                    </div>
                </div> 
                   
                <div class="form-group">
                    <div class="col-sm-1"></div>
                        <label class="col-sm-3">Description</label>
                        <div class="col-sm-7">
                        <textarea name="ANNONCE_DESCRIPTION"  id="ANNONCE_DESCRIPTION"  rows="6" cols="70" placeholder="Saisissez la description de l'annonce"  class="form-control"></textarea>
                       </div>
                </div>
                
                <div class="form-group">
                     <div class="col-sm-1"></div> 
                       <label class="col-sm-3">Date limite de réception des candidatures</label>
                     <div class="col-sm-3">
                        <input type="text"  name="ANNONCE_DATE_DEB"  id="ANNONCE_DATE_DEB"  value="" class="form-control">
                     </div>  
               </div>
               <div class="form-group">
                      <div class="col-sm-1"></div>
                        <label class="col-sm-3">Poste à pourvoir</label>
                      <div class="col-sm-3">  
                        <input type="text"  name="ANNONCE_DATE_FIN"  value="" id="ANNONCE_DATE_FIN"  class="form-control">
                      </div>
               </div>
               
                <div class="form-group">
                    <div class="col-sm-1"></div>
                        <label class="col-sm-3">Age</label>
                      <div class="col-sm-3">
                        <input type="text" name="ANNONCE_AGE"   id="ANNONCE_AGE"  value=""  class="form-control">
				     </div>
               </div>
               
			   <div class="form-group">
                    <div class="col-sm-1"></div>
                       <label class="col-sm-3">Date d&eacute;lai age</label>
                          <div class="col-sm-3">
                        <input type="text"  name="ANNONCE_DELAI_AGE" id="ANNONCE_DELAI_AGE" value="" class="form-control">
				     </div>
                     
                 </div>
				<div class="form-group">
                     <div class="col-sm-1"></div>
                      <label class="col-sm-3">Lien</label>
                      <div class="col-sm-5">
                        <input type="file"    name="ANNONCE_LIEN"  id="ANNONCE_LIEN" value=""  class="filestyle" data-buttonBefore="true" data-buttonText="Choisir Fichier"  accept="application/pdf">
				     </div>
              
			   </div>
               <div class="form-group">
                  <div class="col-sm-1"></div>
                      <label class="col-sm-3">Secteur :</label>
                       <div class="col-sm-4"> 
                            <SELECT name="SECTEUR" id="SECTEUR" class="form-control">
                               <option value="" >Selectionnez un secteur</option> 
                               <?php
							   foreach($liste_secteur as $row)
							   {
							  ?>
                                <option value="<?php echo $row[$obj_secteur->GetCh_id()]; ?>" ><?php echo ucfirst($row[$obj_secteur->GetCh_domaine()]); ?></option>
                                
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
                            <SELECT name="DEPARTEMENT" id="DEPARTEMENT" class="form-control">
                               <option value="" >Selectionnez un departement</option> 
                               <?php
							   foreach($liste_departement as $row)
							   {
							  ?>
                                <option value="<?php echo $row[$obj_departement->GetCh_id()]; ?>" ><?php echo ucfirst($row[$obj_departement->GetCh_libelle()]); ?></option>
                                
                                <?php
							    }
								?>
                                  
                           </SELECT>
                      </div>
                      
                 </div>
                 
               <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-2">
                     <button type="submit" class="btn btn-info" id="submit" >Enregistrer</button>
                  </div>
                  <div class="col-sm-2">
                    <button type="reset" class="btn btn-info">Annuler</button>
                  </div>
               </div>
              <input type="hidden" name="joker" id="joker" value="1"/> 
			  </fieldset>
</form>	

</div>
</div>

