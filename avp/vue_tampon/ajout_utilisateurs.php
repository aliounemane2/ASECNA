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

<tr><td id="lb">UTIL_ID</td>
<td><input type="text" name="UTIL_ID" id="UTIL_ID" /></td>
</tr>

<tr><td id="lb">UTIL_LOGIN</td>
<td><input type="text" name="UTIL_LOGIN" id="UTIL_LOGIN" /></td>
</tr>

<tr><td id="lb">UTIL_MDP</td>
<td><input type="text" name="UTIL_MDP" id="UTIL_MDP" /></td>
</tr>

<tr><td id="lb">UTIL_EMAIL</td>
<td><input type="text" name="UTIL_EMAIL" id="UTIL_EMAIL" /></td>
</tr>

<tr><td id="lb">UTIL_ROLE</td>
<td><input type="text" name="UTIL_ROLE" id="UTIL_ROLE" /></td>
</tr>

<tr><td id="lb">Active</td>
<td><input type="text" name="active" id="active" /></td>
</tr>

<tr><td id="lb">Token</td>
<td><input type="text" name="token" id="token" /></td>
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