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

<tr><td id="lb">Id</td>
<td><input type="text" name="id" id="id" /></td>
</tr>

<tr><td id="lb">Etape</td>
<td><input type="text" name="etape" id="etape" /></td>
</tr>

<tr><td id="lb">Date_enreg</td>
<td><input type="text" name="date_enreg" id="date_enreg" /></td>
</tr>

<tr><td id="lb">Id_annonce</td>
<td><input type="text" name="id_annonce" id="id_annonce" /></td>
</tr>

<tr><td id="lb">Id_candidat</td>
<td><input type="text" name="id_candidat" id="id_candidat" /></td>
</tr>

<tr><td id="lb">Libelle</td>
<td><input type="text" name="libelle" id="libelle" /></td>
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