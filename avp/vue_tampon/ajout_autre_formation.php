<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<form name="form2" method="POST" action=""  class="form-horizontal" >
	<fieldset class="col-sm-9">
	<legend >Ajout</legend>
<div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">FORM_ID</label>
<div class="col-sm-3"> <input type="text" name="FORM_ID" id="FORM_ID" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">FORMATION_AN_DEB</label>
<div class="col-sm-3"> <input type="text" name="FORMATION_AN_DEB" id="FORMATION_AN_DEB" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">FORM_LIB</label>
<div class="col-sm-3"> <input type="text" name="FORM_LIB" id="FORM_LIB" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">FORM_NOM</label>
<div class="col-sm-3"> <input type="text" name="FORM_NOM" id="FORM_NOM" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">FORM_INTITULE</label>
<div class="col-sm-3"> <input type="text" name="FORM_INTITULE" id="FORM_INTITULE" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">FK_CANDIDAT_ID</label>
<div class="col-sm-3"> <input type="text" name="FK_CANDIDAT_ID" id="FK_CANDIDAT_ID" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">AUTRE_FORMATION_DIPLOME_FICHIER</label>
<div class="col-sm-3"><input type="text" name="AUTRE_FORMATION_DIPLOME_FICHIER" id="AUTRE_FORMATION_DIPLOME_FICHIER" /></div>
</div>
	<input name="joker" type="hidden" id="joker" value="<?php echo $obj->param_encode(\"1\");?>"  />
	
	<div class="form-group"><div class="col-sm-7"><div class="modal-footer"><button type="submit" class="btn btn-info" id="submit"  name="enregistrer_continue" value="" ></button><button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit" value="Enregistrer et Continuer">Enregistrer et Continuer</button></div></div></div>
	
</fieldset>
</form>
</body>
</html>