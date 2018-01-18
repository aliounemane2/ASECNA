<?php
	if($form4)
	{
		$REAL_LIB             	 = $realisation['REAL_LIB'];          
		$COMP_LIB            	 = $competences['COMP_LIB'];         
		$QUAL_LIB                = $qualites['QUAL_LIB'];        
		
	}
	else
	{
		$REAL_LIB             = '';
		$COMP_LIB             = '';
		$QUAL_LIB             = '';
		
	} 
	
?>									
									<tr class="form_child" id="SignupForm">
											<td><a id="displayBlocTravail" href="#">Travail de fin d'etudes</a>
											  <div style="border:solid;"id="monBlocTravail">
												<fieldset>
												  <legend>3- Travail de fin d'&eacute;tude</legend>
												  <span>Quel &eacute;tait le titre de votre travail de fin d'&eacute;tudes(Licence,Ma&icirc;trise,Master,DEA,th&egravese; de doctorat...) pour le plus haut dipl&ocirc;me obtenu? </span> <br>
												  <textarea id="REAL_LIB" name="REAL_LIB" rows="5" cols="50" wrap="off"><?php echo $REAL_LIB; ?> Saisissez le titre du travail</textarea>
												</fieldset>
											  </div></td>
										</tr>
										<tr>
										  <td><a id="displayBlocCompetence" href="#">Competences</a>
											<div style="border:solid;"id="monBlocCompetence">
											  <fieldset>
												<legend>10 - Competences</legend>
												<span>Saisissez vos competences</span> <br>
												<textarea id="COMP_LIB" name="COMP_LIB" rows="5" cols="50" wrap="off" placeholder="" size="30" maxlength="10"><?php echo $COMP_LIB; ?> Saisissez vos competences</textarea>
											  </fieldset>
											</div></td>
										</tr>
										<tr>
										  <td><a id="displayBlocQualite" href="#">Qualites</a>
											<div style="border:solid;"id="monBlocQualite">
											  <fieldset>
												<legend>3- Qualit&eacute;s personnelles</legend>
												<br>
												<textarea id="QUAL_LIB" name="QUAL_LIB" rows="5" cols="50" wrap="off"><?php echo $QUAL_LIB; ?> Saisissez vos qualites personnelles</textarea>
											  </fieldset>
											</div></td>
										</tr>