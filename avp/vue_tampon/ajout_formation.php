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

<tr><td id="lb">FORMATION_ID</td>
<td><input type="text" name="FORMATION_ID" id="FORMATION_ID" /></td>
</tr>

<tr><td id="lb">FORMATION_AN_DEB</td>
<td><input type="text" name="FORMATION_AN_DEB" id="FORMATION_AN_DEB" /></td>
</tr>

<tr><td id="lb">FORMATION_AN_FIN</td>
<td><input type="text" name="FORMATION_AN_FIN" id="FORMATION_AN_FIN" /></td>
</tr>

<tr><td id="lb">ETABLISSEMENT_NOM</td>
<td><input type="text" name="ETABLISSEMENT_NOM" id="ETABLISSEMENT_NOM" /></td>
</tr>

<tr><td id="lb">FORMATION_LIEU</td>
<td><input type="text" name="FORMATION_LIEU" id="FORMATION_LIEU" /></td>
</tr>

<tr><td id="lb">FORMATION_DIPLOME</td>
<td><input type="text" name="FORMATION_DIPLOME" id="FORMATION_DIPLOME" /></td>
</tr>

<tr><td id="lb">FORMATION_DOM_PRINC_ETUD</td>
<td><input type="text" name="FORMATION_DOM_PRINC_ETUD" id="FORMATION_DOM_PRINC_ETUD" /></td>
</tr>

<tr><td id="lb">FK_CANDIDAT_ID</td>
<td><input type="text" name="FK_CANDIDAT_ID" id="FK_CANDIDAT_ID" /></td>
</tr>

<tr><td id="lb">FORMATION_CYCLE</td>
<td><input type="text" name="FORMATION_CYCLE" id="FORMATION_CYCLE" /></td>
</tr>

<tr><td id="lb">FORMATION_DIPLOME_FICHIER</td>
<td><input type="text" name="FORMATION_DIPLOME_FICHIER" id="FORMATION_DIPLOME_FICHIER" /></td>
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