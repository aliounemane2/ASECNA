<?php
 require_once($_SESSION['AVP_CONFIG']);
 $obj_secteur=new Secteur_class();
 $obj_annonce=new Annonce_class();
 $id_annonce="";
 
 if($_GET["id_annonce"])
 {
	$id_annonce =@$_GET["id_annonce"];
	 
 }
 
 @$lister_annonces=$obj_annonce->lister_annonce($id_annonce);
 @$liste_secteur=$obj_secteur->lister_secteur();
 
 $role=@$_SESSION["role"];
 

?>
<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
    .photo{
        position: absolute;
        top: 165px;
        right: 50px;
    }
    h1 {
        color: green;
        text-align: center;
        font-weight: bold;
        font-size: 30pt;
    }
    h3 {
        font-familly :  Verdana,Arial,san-serif;
        color: #1E1565;
        border-bottom: #1E1565 1px solid;
    }
    div {
        font: 10pt "Verdana";
    }
</style>

<body>
<div class="container" id="cv">
    

  <div>
      <h3> DETAIL DE L 'ANNONCE N° <?php echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_NUM()]; ?> </h3>
  </div>
  <div>
     <form >
         
            
             <b>Titre: &nbsp; &nbsp;</b> <?php echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_TITRE()]; ?><br/><br/>
             <b>Description:</b> <?php echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_DESCRIPTION()]; ?><br/><br/>
             <b>Date Debut:</b> <?php echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_DATE_DEB()]; ?><br/><br/>
             <b>Date Fin:</b> <?php echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_DATE_FIN()]; ?><br/><br/>
             <b>Date Creation:</b> <?php echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_DATE_CREATION()]; ?><br/><br/>
             <b>Age limite:</b> <?php echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_AGE()]; ?><br/><br/>
             <b>Delai Age :</b> <?php echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_DELAI_AGE()]; ?><br/><br/>
             <b>Secteur :</b> <?php echo $lister_annonces[0][$obj_annonce->GetCh_SECTEUR()]; ?><br/><br/>
             <b>Lien:</b> <a href="<?php echo $lister_annonces[0][$obj_annonce->GetCh_ANNONCE_LIEN()]; ?>" >Lien</a><br/><br/>
             
             
     </form>        
  </div>
</div>
</body>

