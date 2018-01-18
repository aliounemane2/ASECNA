<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<form name="form2" method="POST" action=""  class="form-horizontal" >
	<fieldset class="col-sm-9">
	<legend >Ajout</legend>
<div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">ANNONCE_ID</label>
<div class="col-sm-3"> <input type="text" name="ANNONCE_ID" id="ANNONCE_ID" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">ANNONCE_NUM</label>
<div class="col-sm-3"> <input type="text" name="ANNONCE_NUM" id="ANNONCE_NUM" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">ANNONCE_TITRE</label>
<div class="col-sm-3"> <input type="text" name="ANNONCE_TITRE" id="ANNONCE_TITRE" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">ANNONCE_DESCRIPTION</label>
<div class="col-sm-3"> <input type="text" name="ANNONCE_DESCRIPTION" id="ANNONCE_DESCRIPTION" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">ANNONCE_LIEN</label>
<div class="col-sm-3"> <input type="text" name="ANNONCE_LIEN" id="ANNONCE_LIEN" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">ANNONCE_DATE_DEB</label>
<div class="col-sm-3"> <input type="text" name="ANNONCE_DATE_DEB" id="ANNONCE_DATE_DEB" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">ANNONCE_DATE_FIN</label>
<div class="col-sm-3"> <input type="text" name="ANNONCE_DATE_FIN" id="ANNONCE_DATE_FIN" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">ANNONCE_DATE_CREATION</label>
<div class="col-sm-3"> <input type="text" name="ANNONCE_DATE_CREATION" id="ANNONCE_DATE_CREATION" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">ANNONCE_AGE</label>
<div class="col-sm-3"> <input type="text" name="ANNONCE_AGE" id="ANNONCE_AGE" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">ANNONCE_DELAI_AGE</label>
<div class="col-sm-3"> <input type="text" name="ANNONCE_DELAI_AGE" id="ANNONCE_DELAI_AGE" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">SECTEUR</label>
<div class="col-sm-3"> <input type="text" name="SECTEUR" id="SECTEUR" /></div>
</div><div class="form-group"><div class="col-sm-1"></div><label class="col-sm-3">ETAT</label>
<div class="col-sm-3"><input type="text" name="ETAT" id="ETAT" /></div>
</div>
	<input name="joker" type="hidden" id="joker" value="<?php echo $obj->param_encode(\"1\");?>"  />
	
	<div class="form-group"><div class="col-sm-7"><div class="modal-footer"><button type="submit" class="btn btn-info" id="submit"  name="enregistrer_continue" value="" ></button><button type="submit" class="btn btn-info " name="enregistrer_continue" id="submit" value="Enregistrer et Continuer">Enregistrer et Continuer</button></div></div></div>
	
</fieldset>
</form>
</body>
</html>