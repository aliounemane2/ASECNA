<tr>
											<td>
									  
												<a id="displayBlocInformatique" href="#">Connaissances Informatiques</a>
												<div style="border:solid;"id="monBlocInformatique">
													<div id="connaissancesInformatiques">
														<div id="connaissancesInformatiques_template">
															<fieldset>
															  <legend><?php echo "6.#index#"?>-Précisez ci-dessous vos connaissances pour: </legend>
															  <table>
																<tr>
																  <th align="right">Logiciels bureautique   : </th>
																  <td><SELECT name="LOGICIELS[]">
																	  <option value="">S&eacute;lectionnez</option>
																	  <OPTION VALUE="Traitement de texte">Traitement de texte</OPTION>
																	  <OPTION VALUE="Tableur">Tableur</OPTION>
																	  <OPTION VALUE="Outils collaboratif">Outils collaboratif</OPTION>
																	  <OPTION VALUE="Outils de presentation">Outils de presentation</OPTION>
																	  <OPTION VALUE="Messagerie">Messagerie</OPTION>
																	  <OPTION VALUE="Base de donnees">Base de donnees</OPTION>
																	  <OPTION VALUE="Base de donnees">Autres</OPTION>
																	</SELECT></td>
																</tr>
																<tr>
																  <th align="right">Connaissance</th>
																  <td><SELECT name="INFORMATIQUE_NIV">
																	  <option value="">S&eacute;lectionnez</option>
																	  <OPTION VALUE="Base">Base</OPTION>
																	  <OPTION VALUE="Moyen">Moyen</OPTION>
																	  <OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
																	</SELECT></td>
																</tr>
																
																
															  </table>
															</fieldset>
														</div>
													  <div id="connaissancesInformatiques_noforms_template">Aucune connaissance informatique renseignee</div>
													  <div id="connaissancesInformatiques_controls">
														<table>
														  <tr>
															<td><div id="connaissancesInformatiques_add"><a><span>Ajouter une connaissance informatique<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
															<td><div id="connaissancesInformatiques_remove_last"><a><span>Supprimer une connaissance informatique<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
														  </tr>
														</table>
													  </div>
													</div>
													<div id="autreconInfo">
													  <div id="autreconInfo_template">
														<fieldset>
														  <legend><?php echo "7.#index#"?>-Précisez d'autres Connaissances Informatique</legend>
														  <span>Mentionnez éventuellement d'autres logiciels qui sont pertinents pour la fonction souhaitée.</span><br/>
														  &nbsp;&nbsp;
														  <table>
															<tr>
															  <th align="right">Outils   : </th>
															  <td><INPUT type="text" name="AUTRE_LOGICIELS[]" placeholder="" size="30" maxlength="10"/></td>
															</tr>
															<tr>
															  <th align="right">Connaissance : </th>
															  <td><SELECT name="AUTRE_INFORMATIQUE_NIV">
																  <option value="">S&eacute;lectionnez</option>
																  <OPTION VALUE="Base">Base</OPTION>
																  <OPTION VALUE="Moyen">Moyen</OPTION>
																  <OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
																</SELECT></td>
															</tr>
														  </table>
														</fieldset>
													  </div>
													  <div id="autreconInfo_noforms_template">Aucune autre connaissance informatique renseignee</div>
													  <div id="autreconInfo_controls">
														<table>
														  <tr>
															<td><div id="autreconInfo_add"><a><span>Ajouter une autre connaissance informatique<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
															<td><div id="autreconInfo_remove_last"><a><span>Supprimer une autre connaissance informatique<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
														  </tr>
														</table>
													  </div>
													</div>
												</div>
											</td>
					  
										</tr>
										
										<tr>
											<td>
											  
												<a id="displayBlocLangue" href="#">Connaissances Linguistiques</a>
												<div style="border:solid;"id="monBlocLangue">
												  
													<div id="conLinguistiques">
															<div id="conLinguistiques_template">
																<fieldset>
																	<legend><?php echo "8.#index#"?>- Indiquez dans quelle mesure vous maîtrisez les langues ci-dessous</legend>
																	<table>
																	  <tr>
																		<th align="right">Langue : </th>
																		<td><SELECT name="LANGUE_NOM[]">
																			<option value="">S&eacute;lectionnez</option>
																			<OPTION VALUE="Francais">Francais</OPTION>
																			<OPTION VALUE="Anglais">Anglais</OPTION>
																		  </SELECT></td>
																	  </tr>
																	</table>
																	<table>
																	  <tr>
																		<th align="right">Expression orale : </th>
																		<td><SELECT name="LANGUE_ORALE[]">
																			<option value="">S&eacute;lectionnez</option>
																			<OPTION VALUE="Base">Base</OPTION>
																			<OPTION VALUE="Moyen">Moyen</OPTION>
																			<OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
																		  </SELECT></td>
																	  </tr>
																	  <tr>
																		<th align="right">Expression ecrite : </th>
																		<td><SELECT name="LANGUE_ECRITE[]">
																			<option value="">S&eacute;lectionnez</option>
																			<OPTION VALUE="Base">Base</OPTION>
																			<OPTION VALUE="Moyen">Moyen</OPTION>
																			<OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
																		  </SELECT></td>
																	  </tr>
																	  <tr>
																		<th align="right">Lecture : </th>
																		<td><SELECT name="LANGUE_LECTURE[]">
																			<option value="">S&eacute;lectionnez</option>
																			<OPTION VALUE="Base">Base</OPTION>
																			<OPTION VALUE="Moyen">Moyen</OPTION>
																			<OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
																		  </SELECT></td>
																	  </tr>
																	</table>
																</fieldset>
															</div>
															<div id="conLinguistiques_noforms_template">Aucune connaissance linguistique renseign&eacute;e</div>
															<div id="conLinguistiques_controls">
															  <table>
																<tr>
																  <td><div id="conLinguistiques_add"><a><span>Ajouter une langue<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
																  <td><div id="conLinguistiques_remove_last"><a><span>Supprimer une langue<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
																</tr>
															  </table>
															</div>
														</div>
														<div id="autreConLing">
															  
															  
															  
															  
																<div id="autreConLing_template">
																  
																	<fieldset>
																		<legend><?php echo "9.#index#"?> Quelle(s) autre(s) langue(s) maîtrisez-vous?</legend>
																		<span>commentez brièvement dans quelle mesure vous maîtrisez ces langues</span><br/>
																		<table>
																			<tr>
																			  <th align="right"><b>Langue : </b></th>
																			  <td><input type="text"  name="AUTRE_LANGUE_NOM[]" placeholder="" size="30" maxlength="10"></td>
																			</tr>
																		</table>
																		<table>
																		  <tr>
																			<th align="right">Expression orale : </th>
																			<td><SELECT name="AUTRE_LANGUE_ORALE[]">
																				<option value="">S&eacute;lectionnez</option>
																				<OPTION VALUE="Base">Base</OPTION>
																				<OPTION VALUE="Moyen">Moyen</OPTION>
																				<OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
																			  </SELECT></td>
																		  </tr>
																		  <tr>
																			<th align="right">Expression ecrite : </th>
																			<td><SELECT name="AUTRE_LANGUE_ECRITE[]">
																				<option value="">S&eacute;lectionnez</option>
																				<OPTION VALUE="Base">Base</OPTION>
																				<OPTION VALUE="Moyen">Moyen</OPTION>
																				<OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
																			  </SELECT></td>
																		  </tr>
																		  <tr>
																			<th align="right">Lecture : </th>
																			<td><SELECT name="AUTRE_LANGUE_LECTURE[]">
																				<option value="">S&eacute;lectionnez</option>
																				<OPTION VALUE="Base">Base</OPTION>
																				<OPTION VALUE="Moyen">Moyen</OPTION>
																				<OPTION VALUE="Avanc&eacute;">Avanc&eacute;e</OPTION>
																			  </SELECT></td>
																		  </tr>
																		</table>
																	</fieldset>
																
																</div>
																
																<div id="autreConLing_noforms_template">Aucune autre connaissance linguistique renseignee</div>
																<div id="autreConLing_controls">
																  <table>
																	<tr>
																	  <td><div id="autreConLing_add"><a><span>Ajouter une autre connaissance linguistique<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
																	  <td><div id="autreConLing_remove_last"><a><span>Supprimer une autre connaissance linguistique<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
																	</tr>
																  </table>
																</div>
														</div>
												</div>
															
											</td>
													
										</tr>	