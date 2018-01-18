 <!--  fin tableau Coordonnees personnelles -->
                <div class="display_famille" style="display: none;">
                    <div id="famille">
                        <div id="famille_template">
                            <fieldset>
                                <legend><b> <?php echo "1.#index#"?>-Infos famille</b> </legend>
                                <table>
                                    <tr>
                                        <th align="right">Nom :</th>
                                        <td><input type="text" name="FAMILLE_NOM[]" placeholder="" value="" size="30" maxlength="30" ></td>
                                    </tr>
                                    <tr>
                                        <th align="right">Pr&eacute;noms :</th>
                                        <td><input type="text" name="FAMILLE_PRENOM[]" placeholder="" value="" size="30" maxlength="30"></td>
                                    </tr>
                                    <tr>
                                        <th align="right">Structure :</th>
                                        <td><input type="text" name="FAMILLE_STRUCTURE[]" placeholder="" value="" size="30" maxlength="30"></td>
                                    </tr>
                                    <tr>
                                        <th align="right">Degr&eacute; :</th>
                                        <td><input type="text" name="FAMILLE_DEGRE[]" placeholder="" value="" size="30" maxlength="30"></td>
                                    </tr>
                                </table>
                            </fieldset>
                        </div>
                        <div id="famille_noforms_template">Aucune information famille renseign&eacute;e</div>
                        <div id="famille_controls">
                            <table>
                                <tr>
                                    <td><div id="famille_add"><a><span>Ajouter <img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                                    <td><div id="famille_remove_last"><a><span>Supprimer<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>