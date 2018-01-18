<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<fieldset id="fieldset_style">
	<legend id="legend_fielset_style">Ajout</legend>
<form name="form2" method="POST" action="">
	<table width="484" border="0" align="center">
	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>

</tr>

<tr><td id="lb">EXP_ID</td>
<td><input type="text" name="EXP_ID" id="EXP_ID" /></td>
</tr>

<tr><td id="lb">EXP_ENT_NOM</td>
<td><input type="text" name="EXP_ENT_NOM" id="EXP_ENT_NOM" /></td>
</tr>

<tr><td id="lb">EXP_SEC_ACT</td>
<td><input type="text" name="EXP_SEC_ACT" id="EXP_SEC_ACT" /></td>
</tr>

<tr><td id="lb">EXP_POSTE</td>
<td><input type="text" name="EXP_POSTE" id="EXP_POSTE" /></td>
</tr>

<tr><td id="lb">EXP_DEBUT_TRAVAIL</td>
<td><input type="text" name="EXP_DEBUT_TRAVAIL" id="EXP_DEBUT_TRAVAIL" /></td>
</tr>

<tr><td id="lb">EXP_FIN_TRAVAIL</td>
<td><input type="text" name="EXP_FIN_TRAVAIL" id="EXP_FIN_TRAVAIL" /></td>
</tr>

<tr><td id="lb">EXP_SALAIRE</td>
<td><input type="text" name="EXP_SALAIRE" id="EXP_SALAIRE" /></td>
</tr>

<tr><td id="lb">EXP_NBRE_PERS_SORD</td>
<td><input type="text" name="EXP_NBRE_PERS_SORD" id="EXP_NBRE_PERS_SORD" /></td>
</tr>

<tr><td id="lb">EXP_TACHE</td>
<td><input type="text" name="EXP_TACHE" id="EXP_TACHE" /></td>
</tr>

<tr><td id="lb">EXP_MOTIF_DEP</td>
<td><input type="text" name="EXP_MOTIF_DEP" id="EXP_MOTIF_DEP" /></td>
</tr>

<tr><td id="lb">FK_CANDIDAT_ID</td>
<td><input type="text" name="FK_CANDIDAT_ID" id="FK_CANDIDAT_ID" /></td>
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