<?php
$obj_ponderation= new Ponderation_class();

$lister_ponderation=$obj_ponderation->lister_ponderation();

            $adequate_form="";
			$pert_experience="";
			$compt_specific="";
			$expe_con_asecna="";
			$con_infor="";
			$motiv_comp_redact="";
			$sens_initiative="";
			$autre_critere="";
			$apt_manag_esprit="";
			$id_pond=0;
			$joker=1;
			$tot1=0;
			$tot2=0;
			$tot3=0;
			$totgen=0;

if(!empty($lister_ponderation))
{
		$adequate_form=$lister_ponderation[0][$obj_ponderation->GetCh_adequate_form()];
		$pert_experience=$lister_ponderation[0][$obj_ponderation->GetCh_pert_experience()];
		$compt_specific=$lister_ponderation[0][$obj_ponderation->GetCh_compt_specific()];
		$expe_con_asecna=$lister_ponderation[0][$obj_ponderation->GetCh_expe_con_asecna()];
		$con_infor=$lister_ponderation[0][$obj_ponderation->GetCh_con_infor()];
		$motiv_comp_redact=$lister_ponderation[0][$obj_ponderation->GetCh_motiv_comp_redact()];
		$sens_initiative=$lister_ponderation[0][$obj_ponderation->GetCh_sens_initiative()];
		$autre_critere=$lister_ponderation[0][$obj_ponderation->GetCh_autre_critere()];
		$apt_manag_esprit=$lister_ponderation[0][$obj_ponderation->GetCh_apt_manag_esprit()];
		$id_ponderation=$lister_ponderation[0][$obj_ponderation->GetCh_id()];
		
		$tot1=intval($adequate_form)+intval($pert_experience);
		$tot2=intval($compt_specific)+intval($apt_manag_esprit)+intval($expe_con_asecna);
		$tot3=intval($con_infor)+intval($motiv_comp_redact)+intval($sens_initiative)+intval($autre_critere);
		$totgen=intval($tot1)+intval($tot2)+intval($tot3);
		
		$joker=2;
		
		
			
				
}

?>



<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<header>

<script type="text/javascript">

	function remplir_entete_grp1()
	{
		var niv_qual=$('#niv_qualif').val();
		var adeq_form=$('#adequate_form').val();
		var pert_exp=$('#pert_experience').val();
		
		if(!isNaN(adeq_form) &&!isNaN(pert_exp))
		{
			var new_val=parseInt(adeq_form)+parseInt(pert_exp);
			
			if(isNaN(new_val)){ $('#niv_qualif').val(0);}
			else{ $('#niv_qualif').val(new_val); }
			
			total_pond();
		   
		}
		
	}
	
	function remplir_entete_grp2()
	{
		var apt_manag=$('#apt_manag_esprit').val();
		var compt_specif=$('#compt_specific').val();
		var expe_con_asecna=$('#expe_con_asecna').val();
		
		if(!isNaN(apt_manag) &&!isNaN(compt_specif) &&!isNaN(expe_con_asecna))
		{
			var new_val=parseInt(expe_con_asecna)+parseInt(apt_manag)+ parseInt(compt_specif);
			
			if(isNaN(new_val)){ $('#comp_requis').val(0);}
			else{ $('#comp_requis').val(new_val); }
			total_pond();
		    
		}
		
	}
	
	
	
	function remplir_entete_grp3()
	{
		
		var con_infor=$('#con_infor').val();
		var motiv_comp_redact=$('#motiv_comp_redact').val();
		var sens_initiative=$('#sens_initiative').val();
		var autre_critere=$('#autre_critere').val();
		
		
		if(!isNaN(con_infor) &&!isNaN(motiv_comp_redact) &&!isNaN(sens_initiative) && !isNaN(autre_critere) )
		{
			var new_val=parseInt(con_infor)+parseInt(motiv_comp_redact)+ parseInt(sens_initiative)+ parseInt(autre_critere) ;
			
			if(isNaN(new_val)){ $('#autre_compt').val(0);}
			else{ $('#autre_compt').val(new_val); }
		    total_pond();
		}
		
	}
	
	function total_pond()
	{
		var val1=$('#comp_requis').val();
		var val2=$('#autre_compt').val();
		var val3=$('#niv_qualif').val();
		var new_val=parseInt(val1)+ parseInt(val2)+ parseInt(val3);
		
		if(isNaN(new_val)){ $('#total_pond').val(0);}
		else{ $('#total_pond').val(new_val); }
		
	}
	function pond()
	{
		remplir_entete_grp1();
		remplir_entete_grp2()
		remplir_entete_grp3();
	}

</script>
</header>

<div class="container col-sm-12">


<ol class="breadcrumb" >
  <li><a href="#">Recrutement</a></li>
  <li class="active">Ponderation</li>
</ol> 

<form name="form2" method="POST" action="controler/Ponderation_controler.php"  class="form-horizontal"  >

 <fieldset>
	<legend id="legend_fielset_style">Ponderation </legend>
	
                  <div class="form-group" id="line_entete">
                  <div class="col-sm-2"></div>
                 
                  <label class="col-sm-4" id="entete_pond"><strong>Niveau de Qualification</strong></label>
                   <div class="col-sm-1">
                       <div name="niv_qualif" id="niv_qualif" class="div_entete_bold"><?php echo $tot1; ?></div>
                   </div></div>
                   
                  <div class="form-group">
                  <div class="col-sm-2"></div>
                  <label class="col-sm-4"> Adequation et Pertinence de la formation base(s) et</label>
                  <div class="col-sm-1">
                       <input type="text" name="adequate_form" id="adequate_form" class="form-control" onBlur="return remplir_entete_grp1();"  value="<?php echo $adequate_form; ?>"/>
                 </div></div>

                  <div class="form-group">
                  <div class="col-sm-2"></div>
                  
                  <label class="col-sm-4">Pertinence de l'experience professionnelle( domaine(s)</label>
                   <div class="col-sm-1">
                      <input type="text" name="pert_experience" id="pert_experience" class="form-control"  onBlur="return remplir_entete_grp1();"  value="<?php echo $pert_experience; ?>"/>
                </div></div>

                <div class="form-group" id="line_entete">
                  <div class="col-sm-2"></div>
                 
                  <label class="col-sm-4" id="entete_pond"><strong>Competences Requises</strong></label>
                   <div class="col-sm-1">
                  <div name="comp_requis" id="comp_requis" class="div_entete_bold"><?php echo $tot2; ?></div>
                 </div></div>
                 
                 <div class="form-group">
                  <div class="col-sm-2"></div>
                 
                   <label class="col-sm-4">Aptitude manageriales /Esprit d equipe / Capacité</label>
                   <div class="col-sm-1">
                  <input type="text" name="apt_manag_esprit" id="apt_manag_esprit" class="form-control" onBlur="return remplir_entete_grp2();" value="<?php echo $apt_manag_esprit; ?>"/>
                  </div>
                  </div>
               
                  <div class="form-group">
                  <div class="col-sm-2"></div>
                
                  <label class="col-sm-4">Compétences specifiques liées au poste</label>
                    <div class="col-sm-1">
                    <input type="text" name="compt_specific" id="compt_specific" class="form-control"  onBlur="return remplir_entete_grp2();" value="<?php echo $compt_specific; ?>"/>
                 </div>
                 </div>
                 
                 
                  <div class="form-group">
                  <div class="col-sm-2"></div>
                  
                  <label class="col-sm-4">Expérience/ Connaissance de l'ASECNA</label>
                  <div class="col-sm-1">
                     <input type="text" name="expe_con_asecna" id="expe_con_asecna" class="form-control"  onBlur="return remplir_entete_grp2();" value="<?php echo $expe_con_asecna;  ?>"/>
                  </div>
                  </div>

                  <div class="form-group"  id="line_entete">
                  <div class="col-sm-2"></div>
                 
                  <label class="col-sm-4" id="entete_pond"><strong>Autre Competence</strong></label>
                   <div class="col-sm-1">
                     <div name="autre_compt" id="autre_compt"  class="div_entete_bold"><?php echo $tot3; ?></div>
                    </div>
                  </div>

                   <div class="form-group">
                  <div class="col-sm-2"></div>
                    <label class="col-sm-4">Connnaissances Informatiques(logiciels)</label>
                  <div class="col-sm-1">
                     <input type="text" name="con_infor" id="con_infor" class="form-control"  onBlur="return remplir_entete_grp3();" value="<?php echo $con_infor; ?>" />  </div>
                  </div>

                  <div class="form-group">
                  <div class="col-sm-2"></div>
                 
                  <label class="col-sm-4">Motivations et competences redactionnelles</label>
                   <div class="col-sm-1">
                       <input type="text" name="motiv_comp_redact" id="motiv_comp_redact" class="form-control"  onBlur="return remplir_entete_grp3();" value="<?php echo $motiv_comp_redact;  ?>"/>
                  </div>
                  </div>

                  <div class="form-group">
                  <div class="col-sm-2"></div>
                
                  <label class="col-sm-4">Sens de l'initiative et  motivation</label>
                    <div class="col-sm-1">
                        <input type="text" name="sens_initiative" id="sens_initiative" class="form-control"  onBlur="return remplir_entete_grp3();" value="<?php echo $sens_initiative;  ?>"/>
                   </div>
                   </div>

                  <div class="form-group">
                  <div class="col-sm-2"></div>
                
                  <label class="col-sm-4">Autres criteres d' appreciation( age, nationalite..)</label>
                    <div class="col-sm-1"> 
                      <input type="text" name="autre_critere" id="autre_critere" class="form-control"  onBlur="return remplir_entete_grp3();" value="<?php echo $autre_critere; ?>" />
                  </div>
                  </div>
                  
                  
                   <div class="form-group" id="line_entete">
                  <div class="col-sm-2"></div>
                
                  <label class="col-sm-4" id="entete_pond"><strong>Total</strong></label>
                    <div class="col-sm-1"> 
                      <div name="total_pond" id="total_pond"  class="div_entete_bold"><?php echo $totgen; ?></div>
                   </div>
                  </div>

              <input type="hidden"  name="joker"  id="joker" value="<?php echo $joker ;?>" size="5">
              <input type="hidden"  name="id"  id="id" value="<?php echo @$id_ponderation;?>" size="5">
    </fieldset>
                <div class="form-group">
                  <div class="col-sm-5"></div>
                  <div class="col-sm-3">
                    <input   class="btn btn-info  name="cmd_annuler" type="reset"  id="cmd_annuler" value="Annuler">
                    <input   class="btn btn-info  name="cmd_enreg" type="submit"  id="cmd_enreg" value="Enregistrer">
                    </div>
                  </div>
 

</form>

</div>
</body>
</html>