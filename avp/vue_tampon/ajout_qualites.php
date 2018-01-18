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

<tr><td id="lb">QUAL_ID</td>
<td><input type="text" name="QUAL_ID" id="QUAL_ID" /></td>
</tr>

<tr><td id="lb">QUAL_LIB</td>
<td><input type="text" name="QUAL_LIB" id="QUAL_LIB" /></td>
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