<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<fieldset id="fieldset_style">
	<legend id="legend_fielset_style">Ajout</legend>
<form name="form2" method="POST" action="">
	<table width="484" border="0" align="center">
	<tr>
	<td width="327">&nbsp;</td>
	<td width="147">&nbsp;</td>

</tr>

<tr>
<td id="lb"><h3><strong>Niveau de Qualification</strong></h3></td>
<td><input type="text" name="niv_qualif" id="niv_qualif" /></td>
</tr>

<tr>
  <td id="lb">Adequation et Pertinence de la formation (base(s) et</td>
  <td><input type="text" name="adequate_form" id="adequate_form" /></td>
</tr>
<tr>
  <td id="lb">Pertinence de l experience professionnelle( domaine(s)</td>
<td><input type="text" name="pert_experience" id="pert_experience" /></td>
</tr>


<tr>
  <td id="lb2"><h3><strong>Competences Requises</strong></h3></td>
  <td><input type="text" name="comp_requis" id="comp_requis" /></td>
</tr>
<tr>
  <td id="lb5">Aptitude manageriales /Esprit d equipe / Capacité</td>
  <td><input type="text" name="apt_manag_esprit2" id="apt_manag_esprit2" /></td>
</tr>
<tr>
  <td id="lb">Compétences specifiques liées au poste</td>
  <td><input type="text" name="compt_specific" id="compt_specific" /></td>
</tr>
<tr>
  <td id="lb">Expérience/ Connaissance de l'ASECNA</td>
<td><input type="text" name="expe_con_asecna" id="expe_con_asecna" /></td>
</tr>

<tr>
  <td id="lb4"><h3><strong>Autre Competence</strong></h3></td>
  <td><input type="text" name="autre_compt" id="autre_compt" /></td>
</tr>

<tr>
  <td id="lb">Connnaissances Informatiques(logiciels)</td>
<td><input type="text" name="con_infor" id="con_infor" /></td>
</tr>

<tr>
  <td id="lb">Motivations et competences redactionnelles</td>
<td><input type="text" name="motiv_comp_redact" id="motiv_comp_redact" /></td>
</tr>

<tr>
  <td id="lb">Sens de l'initiative et  motivation</td>
<td><input type="text" name="sens_initiative" id="sens_initiative" /></td>
</tr>

<tr>
  <td id="lb">Autres criteres d' appreciation( age, nationalite..)</td>
<td><input type="text" name="autre_critere" id="autre_critere" /></td>
</tr>
<tr>
  <td colspan="2" id="lb"><input name="joker" type="hidden" id="joker" value="<?php echo $obj->param_encode("1");?>" size="5">
    
    <table width="166" border="0" align="center" style="margin-top:5px;"><tr>
      <td width="64"><input name="cmd_annuler" type="reset" class="st_boutton" id="cmd_annuler" value="Annuler"></td>
      <td width="92"><input name="cmd_enreg" type="submit" class="st_button" id="cmd_enreg" value="Enregistrer"></td>
  </tr></table></td>
  
</tr>
</table>
</form>
</fieldset>
</body>
</html>