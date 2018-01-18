<?php
 @session_start();
 require_once($_SESSION['AVP_CONFIG']);

        $obj_postule=new Postulation_class();
        $obj_candidat=new Candidat_class();
		$obj_formation=new Formation_class();
		$obj_autre_formation=new Autre_formation_class();
	    $obj_dossier=new Dossier_class();
		$obj_competence=new Competences_class();
		$obj_qualite=new Qualites_class();
		$obj_experience_professionnelle=new Experience_professionnelle_class();
		$obj_annonce=new Annonce_class();
		

if(isset($_GET["tab"]) && $_GET["tab"]!="")
{
        $recu_str=$_GET["tab"];
        $merge_array=array();
	   
		@$liste_formation="";
		@$liste_dossier="";
		@$liste_experience="";
		@$liste_autre_form="";
		@$liste_competence="";
		@$liste_qualite="";
		
		@$array_formation="";
		@$array_dossier="";
		@$array_experience="";
		@$array_autre_form="";
		@$array_competence="";
		@$array_qualite="";
	
    header("Content-type: application/vnd.ms-excel");
    header("Content-disposition: attachment; filename=avp_".date('d-m-Y H:i:s').".xls");

      $recu=explode(",",$recu_str);
	  $id_annonce=$_GET['id_annonce'];
	  
	  $annonce_num="";
	  $annonce_titre="";

       for($kl=0;$kl < sizeof($recu);$kl++)
       {
          
			$fk_util_id=$recu[$kl];
			$preselection="OUI";
			
		   
		    @$liste_candidat=$obj_candidat->lister_cand_By_FK_util_id($fk_util_id);
			$candidat_id=@$liste_candidat[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		
		    $data=$obj_postule->getInfo_postul_candidat($fk_util_id,$id_annonce);
			$annonce_num=$data[0][$obj_annonce->GetCh_ANNONCE_NUM()];
			$annonce_titre=$data[0][$obj_annonce->GetCh_ANNONCE_TITRE()];
			
            array_push($merge_array,$data);

       }
	  
 ?>
<center></center><h1>Annonce <?php echo @$annonce_num."  ".@$annonce_titre; ?></h1></center><br/><br/><br/>
<div style="margin-top: 25px;">
<table border="1px" align="center">
<caption>&nbsp;</caption>
<thead>
<tr>
    <th>N°</th>
    <th>Ref</th>
    <th>Intitulé</th>
    <th>Matricule</th>
    <th>Nom/Pr&eacute;nom</th>
    <th>Age</th>
    <th>Nationalité</th>
    <th>Coordonnées</th>
    <th>Formation</th>
    <th>Experiences</th>
    <th>Compétences</th>
    <th>Qualités</th>
    <th>Pi&egrave;ces jointes</th>
    <th>Appréciation</th>
</tr>
</thead>
<tbody>

<?php

      $num = 1;

      foreach($merge_array as $data)
      {
		 
		  
		$candidat_id=$data[0][$obj_candidat->GetCh_CANDIDAT_ID()];
		@$liste_formation=$obj_formation->lister_form_By_CAND_ID($candidat_id);
		@$liste_dossier=$obj_dossier->lister_dossier_By_CAND_ID($candidat_id);
		@$liste_experience=$obj_experience_professionnelle->lister_experience_prof_By_CAND_ID($candidat_id);
		@$liste_autre_form=$obj_autre_formation->lister_autre_formBy_CAN_ID($candidat_id);
		@$liste_competence=$obj_competence->lister_comp_By_CAN_ID($candidat_id);
		@$liste_qualite=$obj_qualite->lister_qualites_By_CAND_ID($candidat_id);
 ?>
        <tr>
        <td valign="top"><div style="margin-bottom:100px;"><?php echo $num; ?></div></td>
        <td valign="top"><?php echo $data[0][$obj_annonce->GetCh_ANNONCE_NUM()]?></td>
        <td valign="top"><?php echo $data[0][$obj_annonce->GetCh_ANNONCE_TITRE()]."\n"?></td>
        <td valign="top"><?php echo $data[0][$obj_candidat->GetCh_CANDIDAT_MATRICULE()]?></td>
        <td valign="top"><?php echo $data[0][$obj_candidat->GetCh_CANDIDAT_NOM()]." ".$data[0][$obj_candidat->GetCh_CANDIDAT_PRENOM()]?></td>
        <td valign="top"><?php echo $obj_candidat->calcul_age($data[0][$obj_candidat->GetCh_CANDIDAT_DATE_NAISSANCE()]); ?></td>
        <td valign="top"><?php echo $data[0][$obj_candidat->GetCh_CANDIDAT_NATIONALITE()]?></td>
        <td valign="top"><?php echo $data[0][$obj_candidat->GetCh_CANDIDAT_NUM_TEL()].";".$data[0][$obj_candidat->GetCh_CANDIDAT_ADR_PERM()]?></td>
        <td valign="top">

  <?php

  $formations_data = '';
  $i=0;
  
  foreach($liste_formation as $row ) 
  {
      $i++;
      $ls='<a href="'.PATH_URL_SITE.'/'.DIPLOME.$row[$obj_formation->GetCh_FORMATION_DIPLOME_FICHIER()].'">'.$row[$obj_formation->GetCh_FORMATION_DIPLOME()].'</a>';
      $formations_data .= $row[$obj_formation->GetCh_FORMATION_AN_DEB()]."-".$row[$obj_formation->GetCh_FORMATION_AN_FIN()]."-".$row[$obj_formation->GetCh_ETABLISSEMENT_NOM()]."-".$row[$obj_formation->GetCh_FORMATION_LIEU()]."-".$row[$obj_formation->GetCh_FORMATION_DIPLOME()]."-".$ls." ;<br/>";
	  
  }
 
  echo $formations_data;
  $autreformations_data = '';
  $i=0;
  
  foreach( $liste_autre_form as $row ) {
	  
      $i++;
      $ls1='';
      if($row[$obj_autre_formation->GetCh_AUTRE_FORMATION_DIPLOME_FICHIER()]!=='') $ls1='<a href="'.PATH_URL_SITE.'/'.DIPLOME.$row[$obj_autre_formation->GetCh_AUTRE_FORMATION_DIPLOME_FICHIER()].'"></a>';
      $ch_1 = $row[$obj_autre_formation->GetCh_FORMATION_AN_DEB()];
      if($ch_1!='')
          $ch_1 .= "-";
      $ch_2 = $row[$obj_autre_formation->GetCh_FORM_LIB()];
      if($ch_2!='')
          $ch_2 .= "-";
      $ch_3 = $row[$obj_autre_formation->GetCh_FORM_NOM()];
      if($ch_3!='')
          $ch_3 .= "-";
      $ch_4 = $row[$obj_autre_formation->GetCh_FORM_INTITULE()];
      if($ch_4!='')
          $ch_4 .= "-";
      $autreformations_data .= $ch_1.$ch_2.$ch_3.$ch_4.$ls1." ;<br/>";
  }
  
  if($i) echo substr($autreformations_data,0,-6);
  //echo $autreformations_data;
  $dossier_data='';
  $i=0;
  
  if($liste_dossier)
  {
      foreach($liste_dossier as $row )
      {
        $dossier_data.= '<a href="'.PATH_URL_SITE.'/'.DOSSIER.$row[$obj_dossier->GetCh_DOSSIER_LIEN()].'">'.$row[$obj_dossier->GetCh_DOSSIER_LIEN()].'</a> ;<br/>';
      }
      if($i)
          $dossier_data = substr($dossier_data,0,-6);
  }



  ?>
 </td>
          
 <td valign="top"><?php
   foreach($liste_experience as $row ) 
   {
        $expr_str_deb=explode("##",@$row[$obj_experience_professionnelle->GetCh_EXP_DEBUT_TRAVAIL()]);
	    $expr_str_fin=explode("##",@$row[$obj_experience_professionnelle->GetCh_EXP_FIN_TRAVAIL()]); 
	   
     echo @$obj_experience_professionnelle->getNomMois($expr_str_deb[1])." ".$expr_str_deb[0]."-".@$obj_experience_professionnelle->getNomMois($expr_str_fin[1])."   ".$expr_str_fin[0]."-".$row[$obj_experience_professionnelle->GetCh_EXP_POSTE()]."-".$row[$obj_experience_professionnelle->GetCh_EXP_ENT_NOM()]." ; <br/>";
  }
   ?>
            </td>
            <td valign="top"><?php
			
               foreach($liste_competence as $row) 
			   {
                    echo $row[$obj_competence->GetCh_COMP_LIB()]." ; ";
               }
              ?></td>
            <td valign="top">
			<?php
				 foreach($liste_qualite as $row) 
				 {
					echo $row[$obj_qualite->GetCh_QUAL_LIB()]." ; ";
				 }
            ?></td>

            <td valign="top"><?php echo $dossier_data?></td>
            <td valign="top"><?php echo " appreciations"?></td>
            <a href="<?php echo PATH_URL_SITE.'/'.DIPLOME.$formations_data['FORMATION_DIPLOME_FICHIER']?>"><?php echo $formations_data['FORMATION_DIPLOME']?></a>

        </tr>
      <?php

          $num++;

      }
?>

          </tbody>
          </table>
          </div>
<?php
}
else
{



     $id_annonce=$_GET['id_annonce'];
	 $preselect="OUI";
     $data_info=$obj_postule->getInfo_postul_annonce($id_annonce);
	 @$obj_postule->update_topic_postulBy_annonce_id($preselect,$id_annonce);



header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=avp_".date('d-m-Y H:i:s').".xls");

    
	
	 $data1=$obj_annonce->lister_annonce($id_annonce);

 ?>

<!-- contenu à mettre  -->
<center></center><h1>Annonce <?php echo @$data1[0][$obj_annonce->GetCh_ANNONCE_NUM()]."  ".@$data1[0][$obj_annonce->GetCh_ANNONCE_TITRE()]; ?></h1></center><br/><br/><br/>

	<div style="margin-top: 25px;">

    <table border="1px" align="center">
    <caption>&nbsp;</caption>
    <thead>
        <tr>
            <th>N°</th>
			<th>Ref</th>
			<th>Intitulé</th>
			<th>Matricule</th>
			<th>Nom/Pr&eacute;nom</th>
			<th>Age</th>
			<th>Nationalité</th>
			<th>Coordonnées</th>
			<th>Formation</th>
           	<th>Experiences</th>
			<th>Compétences</th>
			<th>Qualités</th>
			<th>Pi&egrave;ces jointes</th>
            <th>Appréciation</th>
		</tr>
    </thead>
    <tbody>

  <?php

        // Requête SQL
        //$resultat = mysql_query($sql);
        // Traitement et affichage des données
        $num = 1;

foreach($data_info as $data )
{
	
	
	
/*$formation = mysql_query("SELECT FORMATION_AN_DEB, FORMATION_AN_FIN, ETABLISSEMENT_NOM, FORMATION_LIEU, FORMATION_DIPLOME , FORMATION_DIPLOME_FICHIER from formation where fk_candidat_id =".$data['CANDIDAT_ID']);*/

/*$formation = mysql_query("SELECT * from formation where fk_candidat_id =".$data['CANDIDAT_ID']);
$dossiers = mysql_query("SELECT * from dossier where fk_candidat_id =".$data['CANDIDAT_ID']);
$experience = mysql_query("SELECT EXP_DEBUT_TRAVAIL,EXP_FIN_TRAVAIL,EXP_POSTE, EXP_ENT_NOM from experience_professionnelle where fk_candidat_id =".$data['CANDIDAT_ID']);
$autreformation = mysql_query("SELECT * from autre_formation where fk_candidat_id =".$data['CANDIDAT_ID']);
$competences = mysql_query("SELECT * FROM competences WHERE FK_CANDIDAT_ID = ".$data['CANDIDAT_ID']);
$qualites = mysql_query("SELECT * FROM qualites  WHERE FK_CANDIDAT_ID = ".$data['CANDIDAT_ID']);
*/

        $candidat_id=$data[$obj_candidat->GetCh_CANDIDAT_ID()];
		
		@$liste_formation=$obj_formation->lister_form_By_CAND_ID($candidat_id);
		@$liste_dossier=$obj_dossier->lister_dossier_By_CAND_ID($candidat_id);
		@$liste_experience=$obj_experience_professionnelle->lister_experience_prof_By_CAND_ID($candidat_id);
		@$liste_autre_form=$obj_autre_formation->lister_autre_formBy_CAN_ID($candidat_id);
		@$liste_competence=$obj_competence->lister_comp_By_CAN_ID($candidat_id);
		@$liste_qualite=$obj_qualite->lister_qualites_By_CAND_ID($candidat_id);

  

?>

   <tr>
       <td valign="top"> <div style="margin-bottom:100px;"><?php echo $num; ?></div></td>
       <td valign="top"><?php echo $data[$obj_annonce->GetCh_ANNONCE_NUM()]?></td>
       <td valign="top"><?php echo $data[$obj_annonce->GetCh_ANNONCE_TITRE()]."\n"?></td>
       <td valign="top"><?php echo $data[$obj_candidat->GetCh_CANDIDAT_MATRICULE()]?></td>
       <td valign="top"><?php echo $data[$obj_candidat->GetCh_CANDIDAT_NOM()]." ".$data[$obj_candidat->GetCh_CANDIDAT_PRENOM()]?></td>
       <td valign="top"><?php echo $obj_candidat->calcul_age($data[0][$obj_candidat->GetCh_CANDIDAT_DATE_NAISSANCE()]); ?></td>
       <td valign="top"><?php echo $data[$obj_candidat->GetCh_CANDIDAT_NATIONALITE()]?></td>
       <td valign="top"><?php echo $data[$obj_candidat->GetCh_CANDIDAT_NUM_TEL()].";".$data[$obj_candidat->GetCh_CANDIDAT_ADR_PERM()]?></td>
       <td valign="top">

  <?php

  $formations_data = '';
  $i=0;
  
  foreach($liste_formation as $row ) 
  {
      $i++;
      $ls='<a href="'.PATH_URL_SITE.'/'.DIPLOME.$row[$obj_formation->GetCh_FORMATION_DIPLOME_FICHIER()].'">'.$row[$obj_formation->GetCh_FORMATION_DIPLOME()].'</a>';
      $formations_data .= $row[$obj_formation->GetCh_FORMATION_AN_DEB()]."-".$row[$obj_formation->GetCh_FORMATION_AN_FIN()]."-".$row[$obj_formation->GetCh_ETABLISSEMENT_NOM()]."-".$row[$obj_formation->GetCh_FORMATION_LIEU()]."-".$row[$obj_formation->GetCh_FORMATION_DIPLOME()]."-".$ls." ;<br/>";
	  
  }
 
  echo $formations_data;
  $autreformations_data = '';
  $i=0;
  
  foreach( $liste_autre_form as $row ) {
	  
      $i++;
      $ls1='';
      if($row[$obj_autre_formation->GetCh_AUTRE_FORMATION_DIPLOME_FICHIER()]!=='') $ls1='<a href="'.PATH_URL_SITE.'/'.DIPLOME.$row[$obj_autre_formation->GetCh_AUTRE_FORMATION_DIPLOME_FICHIER()].'"></a>';
      $ch_1 = $row[$obj_autre_formation->GetCh_FORMATION_AN_DEB()];
      if($ch_1!='')
          $ch_1 .= "-";
      $ch_2 = $row[$obj_autre_formation->GetCh_FORM_LIB()];
      if($ch_2!='')
          $ch_2 .= "-";
      $ch_3 = $row[$obj_autre_formation->GetCh_FORM_NOM()];
      if($ch_3!='')
          $ch_3 .= "-";
      $ch_4 = $row[$obj_autre_formation->GetCh_FORM_INTITULE()];
      if($ch_4!='')
          $ch_4 .= "-";
      $autreformations_data .= $ch_1.$ch_2.$ch_3.$ch_4.$ls1." ;<br/>";
  }
  
  if($i) echo substr($autreformations_data,0,-6);
  //echo $autreformations_data;
  $dossier_data='';
  $i=0;
  
  if($liste_dossier)
  {
      foreach($liste_dossier as $row )
      {
        $dossier_data.= '<a href="'.PATH_URL_SITE.'/'.DOSSIER.$row[$obj_dossier->GetCh_DOSSIER_LIEN()].'">'.$row[$obj_dossier->GetCh_DOSSIER_LIEN()].'</a> ;<br/>';
      }
      if($i)
          $dossier_data = substr($dossier_data,0,-6);
  }
  ?>
 </td>
          
 <td valign="top"><?php
   foreach($liste_experience as $row ) 
   {
	    $expr_str_deb=explode("##",@$row[$obj_experience_professionnelle->GetCh_EXP_DEBUT_TRAVAIL()]);
	    $expr_str_fin=explode("##",@$row[$obj_experience_professionnelle->GetCh_EXP_FIN_TRAVAIL()]); 
	   
     echo @$obj_experience_professionnelle->getNomMois($expr_str_deb[1])." ".$expr_str_deb[0]."-".@$obj_experience_professionnelle->getNomMois($expr_str_fin[1])."   ".$expr_str_fin[0]."-".$row[$obj_experience_professionnelle->GetCh_EXP_POSTE()]."-".$row[$obj_experience_professionnelle->GetCh_EXP_ENT_NOM()]." ; <br/>";
	 
    }
   ?>
            </td>
            <td valign="top"><?php
			
               foreach($liste_competence as $row) 
			   {
                    echo $row[$obj_competence->GetCh_COMP_LIB()]." ; ";
               }
              ?></td>
            <td valign="top">
			<?php
				 foreach($liste_qualite as $row) 
				 {
					echo $row[$obj_qualite->GetCh_QUAL_LIB()]." ; ";
				 }
            ?></td>

            <td valign="top"><?php echo $dossier_data?></td>
            <td valign="top"><?php echo " appreciations"?></td>
        </tr>
   <?php $num++ ?>
<?php
}
?>
 </tbody>
 </table>
 </div>
<?php
}

?>
<!-- fin contenu à mettre  -->


   <!--/span>
    </p>
    </div>
    </div>
    </div>
    </div>
   </article-->