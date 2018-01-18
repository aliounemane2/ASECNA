<?php

$annonce_id=$_GET["annonce_id"];

$obj_candidat=new Candidat_class();
$obj_ponderation=new Ponderation_class();
$obj_annonce=new Annonce_class();
$obj_candidat_saisi_note=new Candidat_saisi_note_class();

$lister_candidat_by_ann_id=$obj_candidat->lister_candidat_postul_retenu($annonce_id);

$liste_ponderation=$obj_ponderation->lister_ponderation();

$lister_annonce=$obj_annonce->lister_annonce($annonce_id);
$date_fin=$lister_annonce[0][$obj_annonce->GetCh_ANNONCE_DATE_FIN()];
($obj_annonce->La_date_est_en($date_fin)==true) ? $date_fin=$obj_annonce->dateswitch($date_fin): $date_fin;
 
$annonce_num=$lister_annonce[0][$obj_annonce->GetCh_ANNONCE_NUM()];
$annonce_titre=$lister_annonce[0][$obj_annonce->GetCh_ANNONCE_TITRE()];

$liste_candidat_saisi_note=$obj_candidat_saisi_note->lister_candidat_saisi_note_by_annonce($annonce_id);
$observation=$obj_candidat_saisi_note->getObservationById_anonce($annonce_id);

$check_elem="false";


if(!empty($liste_candidat_saisi_note))
{
  $check_elem="true";	
}



?>

<script type="text/javascript" >

	   
			   $.ajax({
							type: "GET" ,
							url: "/avp/ajax/charge_ponderation.php",
							
							success: function(msg)
							{
							  $('#current_ponderation').val(msg);
							  return true;
							  
							}
							
					
					});
				
				
			
			
			function note_pondere(champs_a_recupe,index_tab_pond,champ_a_maj,index)
			{
				var ponderat=$('#current_ponderation').val();
				var	tabsplit=ponderat.split("|||");	
					   
			    var  tabponderation = [ tabsplit[0],tabsplit[1],tabsplit[2],tabsplit[3],tabsplit[4],tabsplit[5],tabsplit[6],tabsplit[7],tabsplit[8]];

                var bareme=[1,2,3,4,5];
                var indexselector='#ligne'+index;
				var indextotal='#total'+index;
				
				var champselector='#'+champs_a_recupe;
				
				var val_saisi=$(indexselector+" "+champselector ).val();
				
				if(parseInt(val_saisi)>5)
				{
					alert('la note saisie n\'est pas bonne');
					$(indexselector+" "+champselector ).val('')
					return false;
				}
				
				
				
				var ponderation=tabponderation[index_tab_pond];
				
				var node_pondere=parseInt(val_saisi) * parseInt(ponderation);
			
				
				if(isNaN(node_pondere)){
					
					$(indextotal+' #'+champ_a_maj).text();
					
				}
				else{
					
					$(indextotal+' #'+champ_a_maj).text(node_pondere);
				}
				
			
				calcul_total1(index);
				calcul_total2(index);
				calcul_total3(index);
				calcul_totgen(index);
				calcul_tot_ligne(index);
				
				
			}
			
			function calcul_total1(index){
				
				var indexselector='#ligne'+index;
				var indextotal='#total'+index;
				
				var val1=$(indextotal+' #note_pondgr11').text();
				var val2=$(indextotal+' #note_pondgr12').text();
				
				var tot1=parseInt(val1)+parseInt(val2);
				
				if(isNaN(tot1)){
					
				   $(indextotal+' #tot1').text();
				}
				else{
				   $(indextotal+' #tot1').text(tot1);
				}
				
			}
			function calcul_total2(index){
				
				var indexselector='#ligne'+index;
				var indextotal='#total'+index;
				
				var val1=$(indextotal+' #note_pondgr21').text();
				var val2=$(indextotal+' #note_pondgr22').text();
				var val3=$(indextotal+' #note_pondgr23').text();
				
				var tot2=parseInt(val1)+parseInt(val2)+parseInt(val3);
				
				if(isNaN(tot2)){
				   $(indextotal+' #tot2').text();
				}
				else{
				   $(indextotal+' #tot2').text(tot2);
				}
				
			}
			
			function calcul_total3(index){
				
				var indexselector='#ligne'+index;
				var indextotal='#total'+index;
				
				var val1=$(indextotal+' #note_pondgr31').text();
				var val2=$(indextotal+' #note_pondgr32').text();
				var val3=$(indextotal+' #note_pondgr33').text();
				var val4=$(indextotal+' #note_pondgr34').text();
				
				var tot3=parseInt(val1)+parseInt(val2)+parseInt(val3)+parseInt(val4);
				
				if(isNaN(tot3)){
					
				   $(indextotal+' #tot3').text();
				}
				else{
				   $(indextotal+' #tot3').text(tot3);
				}
				
			}
			
			function calcul_totgen(index)
			{
				var indexselector='#ligne'+index;
				var indextotal='#total'+index;
				
				var tot1=$(indextotal+' #tot1').text();
				var tot2=$(indextotal+' #tot2').text();
				var tot3=$(indextotal+' #tot3').text();
				
				var totgen=parseInt(tot1)+parseInt(tot2)+parseInt(tot3);
				
				if(isNaN(totgen))
				{
					$(indextotal+' #totgen').text();
				}
				else{
					$(indextotal+' #totgen').text(totgen);
				}
				
				
			}
			
			function calcul_tot_ligne(index)
			{
				var indexselector='#ligne'+index;
				var indextotal='#total'+index;
				
			    var gr11=$(indexselector+' #gr11').val();
				var gr12=$(indexselector+' #gr12').val();	
				
				var totligne1=parseInt(gr11)+parseInt(gr12);
				
				if(isNaN(totligne1))
				{
					$(indexselector+' #tot_ligne1').text();
				}
				else{
					
					$(indexselector+' #tot_ligne1').text(totligne1);
				}
				
				
				
				var gr21=$(indexselector+' #gr21').val();	
				var gr22=$(indexselector+' #gr22').val();	
				var gr23=$(indexselector+' #gr23').val();	
				
				
				var totligne2=parseInt(gr21)+parseInt(gr22)+parseInt(gr23);
				
				if(isNaN(totligne2))
				{
					$(indexselector+' #tot_ligne2').text();
				}
				else{
					
					$(indexselector+' #tot_ligne2').text(totligne2);
				}
				
				var gr31=$(indexselector+' #gr31').val();	
				var gr32=$(indexselector+' #gr32').val();	
				var gr33=$(indexselector+' #gr33').val();	
				var gr34=$(indexselector+' #gr34').val();
				
				
				var totligne3=parseInt(gr31)+parseInt(gr32)+parseInt(gr33)+parseInt(gr34);
				
				if(isNaN(totligne3))
				{
					$(indexselector+' #tot_ligne3').text();
				}
				else{
					
					$(indexselector+' #tot_ligne3').text(totligne3);
				}	
				
				
				var tot_ligne_gen=totligne1+totligne2+totligne3
				
				if(isNaN(tot_ligne_gen)){
					
					$(indexselector+' #tot_lignegen').text();
					
				}else
				{
					$(indexselector+' #tot_lignegen').text(tot_ligne_gen);
				}
					
				
			}



</script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<style>
table {
	border-collapse: collapse;
	width: 98%;
	font-size:12px;
 }
th  {
 border:1px solid #CCCCCC;
 color:#000033;
 width:20%;
 font-weight:bold;
 height:15%;
text-align: center;
	font-weight: bold;
 
 }


td {
 border:1px solid #CCCCCC;
 color:#000;
 width:20%;
 font-weight:bold;
 height:15%;
 text-align: center;
	font-weight: bold;
 
 }

caption {
 font-weight:bold
 }
 input[type="text"]{
	border:1px solid #00;
	text-align:center;
	font-weight:bold;
	width:70px;
	font-size:12px;
	outline:none;

 }
 
 #totgen
 {
  border:2px solid #000033;	 
 }
    #note_pondgr11 
    #note_pondgr12
  
    #note_pondgr21
    #note_pondgr22
	#note_pondgr23
	
	#note_pondgr31
    #note_pondgr32
	#note_pondgr33
	#note_pondgr34
	{
		font-weight:normal;
	}


</style>
<body>
<div style="text-align:left;">
<span style="font-size:12px;font-weight:bold;width:150px;text-align:right;">Date:</span>
<span style="font-size:14px;font-weight:bold;color:#000033;width:100px;text-align:right;"><?php echo $date_fin; ?></span><br/>
<span style="font-size:12px;font-weight:bold;width:150px;text-align:right;">Annonce Num:</span>
<span style="font-size:14px;font-weight:bold;color:#000033;width:100px;text-align:right;"><?php  echo $annonce_num; ?></span><br/>
<span style="font-size:12px;font-weight:bold;width:150px;text-align:right;">Annonce Titre :</span>
<span style="font-size:14px;font-weight:bold;color:#000033;width:100px;text-align:right;"><?php  echo $annonce_titre; ?></span><br/>
</div>
<div id="entete_bareme"><span style="font-size:12px;font-weight:bold;">Barème</span><br/><span>(1 = très insuffisant; 2 = insuffisant; 3 = moyen; 4 = bien; 5 = très bien)</span> </div>
<input type="hidden" name="current_ponderation" id="current_ponderation" value="" /> <!-- ne pas supprimer cette ligne -->
<table width="98%" style="height:auto;font-size:12px;font-weight:bold;" cellpadding="1" cellspacing="1">
<tr style="text-align:center;border:1px solid #ccc;color:#000033;">
 <td width="7%" height="29" style="font-size:9px;">
   <span></span><br/>
   <span></span>
 </td>
  <td colspan="3">Niveau de Qualification</td>
  <td colspan="4">Competences Requises</td>
  <td colspan="5">Autre Competence</td>
  <td width="10%"></td>
</tr>
<tr style="font-size:10px; text-align:justify; color:#000;border:1px solid #ccc;vertical-align:top">
  <td width="7%" height="35"></td>
  <td width="7%">Adéquation et Pertinence de la formation (base (s) et continue (s))</td>
  <td width="9%">Pertinence de l'expérience professionnelle (domaine(s) et durée (s))</td>
  <td width="4%"></td>
  <td width="7%">Compétences spécifiques liées au poste </td>
  <td width="7%">Aptitudes managériales / Esprit d'équipe / capacité d'adaptation</td>
  <td width="7%">Expérience / Conaissance de l'ASECNA</td>
  <td width="8%"></td>
  <td width="7%">Connaissances informatiques (logiciels, …)</td>
  <td width="7%">Motivations et competences rédactionnelles </td>
  <td width="7%">Sens de l'initiative et motivation</td>
  <td width="7%">Autres critères d'appréciation (âge, nationalité ...)</td>
  <td width="7%"></td>
  <td width="9%">Resultat</td>
</tr>

<?php
 if($liste_ponderation!=null)
 {
	 
	   $tot1=       intval($liste_ponderation[0][$obj_ponderation->GetCh_adequate_form()]) +
                    intval($liste_ponderation[0][$obj_ponderation->GetCh_pert_experience()]);
                    
	   $tot2=       intval( $liste_ponderation[0][$obj_ponderation->GetCh_compt_specific()])+ 
                    intval( $liste_ponderation[0][$obj_ponderation->GetCh_apt_manag_esprit()])+
                    intval( $liste_ponderation[0][$obj_ponderation->GetCh_expe_con_asecna()]);
                    
	   $tot3=       intval($liste_ponderation[0][$obj_ponderation->GetCh_con_infor()])+
                    intval($liste_ponderation[0][$obj_ponderation->GetCh_motiv_comp_redact()])+
                    intval($liste_ponderation[0][$obj_ponderation->GetCh_sens_initiative()])+
                    intval($liste_ponderation[0][$obj_ponderation->GetCh_autre_critere()]);
                    
	 $totgen=$tot1+$tot2+$tot3;
?>
<tr style="font-size:12px;text-align:justify; color: #000;border:1px solid #ccc;background:#F5F5F5">
  <td width="7%" height="54" style="color:#000033;">Ponderation</td>
  <td width="7%"><?php echo $liste_ponderation[0][$obj_ponderation->GetCh_adequate_form()];?></td>
  <td width="9%"><?php echo $liste_ponderation[0][$obj_ponderation->GetCh_pert_experience()];?></td>
  <td width="2%" class="entete_pond" style="width:15px;"><?php echo $tot1; ?></td>
  <td width="7%"><?php echo $liste_ponderation[0][$obj_ponderation->GetCh_compt_specific()];?></td>
  <td width="7%"><?php echo $liste_ponderation[0][$obj_ponderation->GetCh_apt_manag_esprit()];?></td>
  <td width="7%"><?php echo $liste_ponderation[0][$obj_ponderation->GetCh_expe_con_asecna()];?></td>
  <td width="8%" class="entete_pond"><?php echo $tot2; ?></td>
  <td width="7%"><?php echo $liste_ponderation[0][$obj_ponderation->GetCh_con_infor()];?></td>
  <td width="7%"><?php echo $liste_ponderation[0][$obj_ponderation->GetCh_motiv_comp_redact()];?></td>
  <td width="7%"><?php echo $liste_ponderation[0][$obj_ponderation->GetCh_sens_initiative()];?></td>
  <td width="7%"><?php echo $liste_ponderation[0][$obj_ponderation->GetCh_autre_critere()];?></td>
  <td width="7%" class="entete_pond"><?php echo $tot3; ?></td>
  <td width="9%" class="entete_pond"><?php echo $totgen; ?></td>
 
</tr>
<?php
 }
?>
<form name="form" id="form"  method="POST" action="controler/Ponderation_controler.php"  >
<?php
	$i=0; $idk=0;
foreach($lister_candidat_by_ann_id as $row)
{

	$index='ligne'.$i;
	$indextot='total'.$i;
?>

<tr style="font-size:8px;text-align:center;color:#000;border:1px solid #F5F5F5;background:F5F5F5;" id="<?php echo $index; ?>">
  <td width="7%" height="54"><?php echo $row[$obj_candidat->GetCh_CANDIDAT_NOM()]."  ".$row[$obj_candidat->GetCh_CANDIDAT_PRENOM()];?></td>
  
  <td width="7%" style="text-align:center;width:100%;"><input type="text" id="gr11" name="gr11[]" value="" onKeyUp="return note_pondere('gr11',0,'note_pondgr11',<?php echo $i ;?>)"/></td>
  <td width="9%" style="text-align:center;width:100%;"><input type="text" id="gr12" name="gr12[]" value="" onKeyUp="return note_pondere('gr12',1,'note_pondgr12',<?php echo $i ;?>)"/></td>
  <td width="4%" class="entete_pond" style="width:15px;"  id="tot_ligne1"></td>
  <td width="7%" style="text-align:center;width:100%;"><input type="text" id="gr21" name="gr21[]"  value="" onKeyUp="return note_pondere('gr21',2,'note_pondgr21',<?php echo $i ;?>)"/></td>
  <td width="7%" style="text-align:center;width:100%;"><input type="text" id="gr22" name="gr22[]" value="" onKeyUp="return note_pondere('gr22',3,'note_pondgr22',<?php echo $i ;?>)"/></td>
  <td width="7%" style="text-align:center;width:100%;"><input type="text" id="gr23" name="gr23[]" value="" onKeyUp="return note_pondere('gr23',4,'note_pondgr23',<?php echo $i ;?>)"/></td>
  <td width="8%" class="entete_pond"  id="tot_ligne2"></td>
  <td width="7%" style="text-align:center;width:100%;"><input type="text" id="gr31" name="gr31[]" value="" onKeyUp="return note_pondere('gr31',5,'note_pondgr31',<?php echo $i ;?>)"/></td>
  <td width="7%" style="text-align:center;width:100%;"><input type="text" id="gr32" name="gr32[]" value="" onKeyUp="return note_pondere('gr32',6,'note_pondgr32',<?php echo $i ;?>)"/></td>
  <td width="7%" style="text-align:center;width:100%;"><input type="text" id="gr33" name="gr33[]" value="" onKeyUp="return note_pondere('gr33',7,'note_pondgr33',<?php echo $i ;?>)"/></td>
  <td width="7%" style="text-align:center;width:100%;"><input type="text" id="gr34" name="gr34[]" value="" onKeyUp="return note_pondere('gr34',8,'note_pondgr34',<?php echo $i ;?>)"/></td>
  <td width="7%" class="entete_pond"  id="tot_ligne3"></td>
  <td width="9%" class="entete_pond" id="tot_lignegen"></td>
 
  
 
</tr>
<tr style="font-size:12px;text-align: justify;color:#000033;border:1px solid #ccc;background:#F5F5F5;" id="<?php echo $indextot; ?>">
  <td width="7%" height="54" style="color:#000033;">Total</td>
  <td width="7%" style="text-align:center" id="note_pondgr11">
  <?php if($check_elem=="true"){ echo $liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_adequate_form()];} ?></td>
  <td width="9%" style="text-align:center" id="note_pondgr12">
  <?php if($check_elem=="true"){ echo $liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_pert_experience()];} ?></td>
  <td width="4%" class="entete_pond" style="with:15px;" id="tot1">
  
  <?php if($check_elem=="true")
  { 
 
    $curtot1=intval($liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_adequate_form()])+
    intval($liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_pert_experience()]);
	
	echo $curtot1;
  
  } ?>
  </td>
  <td width="7%" style="text-align:center" id="note_pondgr21">
  <?php if($check_elem=="true"){ echo $liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_compt_specific()];} ?></td>
  <td width="7%" style="text-align:center" id="note_pondgr22">
  <?php if($check_elem=="true"){ echo $liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_apt_manag_esprit()];} ?></td>
  <td width="7%" style="text-align:center" id="note_pondgr23">
  <?php if($check_elem=="true"){ echo $liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_expe_con_asecna()];} ?></td>
  
  <td width="8%" class="entete_pond" style="with:15px;" id="tot2">
  
    <?php if($check_elem=="true")
	{ 
	
	
	$curtot2=intval($liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_compt_specific()]) +
	intval($liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_apt_manag_esprit()])+
	intval($liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_expe_con_asecna()]);
	
	echo $curtot2;
	
	} ?>
  
  </td>
  <td width="7%" style="text-align:center" id="note_pondgr31">
  <?php if($check_elem=="true"){ echo $liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_con_infor()];} ?></td>
  <td width="7%" style="text-align:center" id="note_pondgr32">
  <?php if($check_elem=="true"){ echo $liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_motiv_comp_redact()];} ?></td>
  <td width="7%" style="text-align:center" id="note_pondgr33">
  <?php if($check_elem=="true"){ echo $liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_sens_initiative()];} ?></td>
  <td width="7%" style="text-align:center" id="note_pondgr34">
  <?php if($check_elem=="true"){ echo $liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_autre_critere()];} ?></td>
  <td width="7%" class="entete_pond" id="tot3">
   <?php if($check_elem=="true")
   { 
    $curtot3=intval($liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_con_infor()])+
	 intval($liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_motiv_comp_redact()])+
	 intval($liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_sens_initiative()])+
	 intval($liste_candidat_saisi_note[$idk][$obj_candidat_saisi_note->GetCh_autre_critere()]);
	 
	 echo $curtot3;
	 
	 } ?>
  
  </td>
  <td width="9%" class="entete_pond" id="totgen">
   <?php if($check_elem=="true")
   { 
      echo  $curtot1+$curtot2+$curtot3;
   }
  ?>
  </td>
</tr>
<tr><td colspan="14" style="width:2px;"></td></tr>

<?php
$i++;$idk++;
}
?>
     <tr><td colspan="3">Autres observations éventuelles :</td><td colspan="11" style="margin-top:15px;"><textarea  id="observation" name="observation" cols="110" rows="5"><?php echo @$observation; ?></textarea></td></tr>
     <tr style="border:none"><td colspan="14" style="border:none">&nbsp;&nbsp;</td></tr>    
     <tr style="border:none">
         <td colspan="14" style="border:none">
         <input type="hidden" name="annonce_id" id="annonce_id" value="<?php echo $annonce_id; ?>" />
         <input type="hidden" name="joker" id="joker" value="4" />
         <input  class="btn btn-info"  name="cmd_annuler" type="reset"  id="cmd_annuler" value="Annuler">
         <input  class="btn btn-info"  name="cmd_enreg" type="submit"  id="cmd_enreg" value="Enregistrer" >
         </td> 
    </tr>
</form>
</table>
<?php
if($check_elem=="true")
{
	?>

<div style="float:left;text-decoration:none;">
 <a href="controler/Ponderation_controler.php?joker=5&annonce_id=<?php echo $annonce_id; ?>"  class="btn-sm btn-info"><i class="icon-trash icon-white"></i>Envoyer Mail au candidats retenus</a>
</div>
<?php
}
?>
</body>
</html>