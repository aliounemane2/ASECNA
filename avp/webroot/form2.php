<?php
$sql_formation = "SELECT * FROM formation WHERE FK_CANDIDAT_ID = ".$_SESSION['id_user'];

$req_formation = mysql_query($sql_formation);
$formations[] = mysql_fetch_array($req_formation);

$erreur="";
$var=isset($_POST["envoyer"]);
$nom=isset($_POST["CANDIDAT_NOM"]) ? trim($_POST["CANDIDAT_NOM"]): "";
$prenom=isset($_POST["CANDIDAT_PRENOM"]) ? trim($_POST["CANDIDAT_PRENOM"]): "";
$test=$_SESSION["id_user"];
$sql ='SELECT * FROM candidat WHERE FK_UTIL_ID='.$_SESSION['id_user'];

$exereq= mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$result = mysql_fetch_array($exereq);

$fk_candidat_id=$result['CANDIDAT_ID'];




if($var <> ""){
$exereq = mysql_query("select count(FK_UTIL_ID) as nblogin from  candidat where FK_UTIL_ID ='" . $_SESSION["id_user"] . "'");
//$exereq=mysql_query("select count(CANDIDAT_LOGIN) as nblogin from  candidat where CANDIDAT_LOGIN ='".$_POST["CANDIDAT_LOGIN"]."'");
$nblogin = mysql_fetch_array($exereq);
$nblogin = $nblogin['nblogin'];
if($nblogin >=1 ){
    /***************INSERTION DANS LA TABLE FORMATION AVEC AJOUT MULTIPLES**********/
    if(isset($_POST["FORMATION_AN_DEB"]))
    {

        for($i=0; $i<sizeof($_POST["FORMATION_LIEU"]); $i++){
            if($_POST["ETABLISSEMENT_NOM"][$i]!='')
            {
                $P= rand(10,10000);
                $extension = substr($_FILES['FORMATION_DIPLOME_FICHIER']['name'][$i],-4,4);
                $chemin = "diplome/".$P."-".$_SESSION['identifiant'].$extension;
                if(move_uploaded_file($_FILES['FORMATION_DIPLOME_FICHIER']['tmp_name'][$i], $chemin)) {
                    echo "Le diplome ".  basename( $_FILES['FORMATION_DIPLOME_FICHIER']['name'][$i]).
                        " a ete bien sauvegarde.".'<br />';
                }
                else
                    echo "Erreur dans la sauvegarde du diplome!.".'<br />';

                $sql= 'INSERT INTO formation VALUES ("",
								"'.htmlentities($_POST["FORMATION_AN_DEB"][$i]).'",
								"'.htmlentities($_POST["FORMATION_AN_FIN"][$i]).'",
								"'.htmlentities($_POST["ETABLISSEMENT_NOM"][$i]).'",
								"'.htmlentities($_POST["FORMATION_LIEU"][$i]).'",
								"'.htmlentities($_POST["FORMATION_DIPLOME"][$i]).'",
								"'.htmlentities($_POST["FORMATION_DOM_PRINC_ETUD"][$i]).'",
								"'.htmlentities($fk_candidat_id).'",
								"'.htmlentities($_POST["FORMATION_CYCLE"][$i]).'",
								"'.htmlentities($chemin).'")';

                // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
                mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                header('Location:index.php?url=afficheformations');
            }

        }
    }
}
}


?>
<article class="art-post art-article">
    <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Profil</a> ><a href="#">Formations</a></h3>

    <div class="art-postcontent art-postcontent-0 clearfix">

        <div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell layout-item-0" style="width: 100%" >
                    <p style="text-align: justify;">
		<span style="font-family: Arial;">

<!-- contenu à mettre  -->
<form action="index.php?url=form2" method="post" enctype="multipart/form-data" id="SignupForm">

        <!--a id="displayBlocFormation" href="#">Formation</a-->
        <div style="border:1px solid;" id="monBlocFormation" class="resized">
            <div id="sheepItForm_template" >
                <fieldset id="displayBlocFormation">
                    <legend><?php echo "2.#index#"?>- Formations</legend>
                    <table>
                        <tr>
                            <th><div align="right">Formation cycle<font color=red>*</font> : </div></th>
                            <td><SELECT name="FORMATION_CYCLE[]">
                                    <option value="">S&eacute;lectionnez</option>
                                    <OPTION VALUE="Universitaires">Universitaires</OPTION>
                                    <OPTION VALUE="Secondaires">Secondaires</OPTION>
                                </SELECT>
                            </td>
                        </tr>
                        <tr>
                            <th> <div align="right">Ann&eacute;e d'&eacute;tude de <font color=red>*</font> : </div></th>
                            <td><SELECT name="FORMATION_AN_DEB[]">
                                    <option value="">S&eacute;lectionnez</option>
                                    <?php for ($i=1960; $i<date('Y'); $i++):
                                        echo '<OPTION VALUE='.$i.'>'.$i.'</OPTION>';
                                    endfor; ?>
                                </SELECT></td>
                        </tr>
                        <tr>
                            <th> <div align="right">&agrave;</div></th>
                            <td><SELECT name="FORMATION_AN_FIN[]">
                                    <option value="">S&eacute;lectionnez</option>
                                    <?php for ($i=1960; $i<date('Y'); $i++):
                                        echo '<OPTION VALUE='.$i.'>'.$i.'</OPTION>';
                                    endfor; ?>
                                </SELECT></td>
                        </tr>
                        <tr>
                            <th><div align="right">Nom de l'&eacute;tablissement <font color=red>*</font> : </div></th>
                            <td><INPUT type="text" name="ETABLISSEMENT_NOM[]" placeholder="" id="ETABLISSEMENT_NOM[]" value="<?php //if($etab_nom) echo $etab_nom; ?>" required size="30" maxlength="10"/></td>
                        </tr>
                        <tr>
                            <th><div align="right">Adresse de l'&eacute;tablissement <font color=red>*</font> : </div></th>
                            <td><INPUT type="text" name="FORMATION_LIEU[]" placeholder="" id="FORMATION_LIEU[]" value="<?php //if($fo_lieu) echo $fo_lieu; ?>" required size="30" maxlength="10"/></td>
                        </tr>
                        <!--<tr>
                            <th><div align="right">Dipl&ocirc;mes obtenus <font color=red>*</font> : </div></th>
                            <td><INPUT type="text" name="FORMATION_DIPLOME[]" placeholder="" id="FORMATION_DIPLOME[]" value="<?php /*//if($fo_diplome) echo $fo_diplome; */?>" required size="30" maxlength="10"/></td>
                        </tr>-->
                        <tr>
                            <th><div align="right">Niveau de formation : <font color=red>*</font></div></th>
                            <td><SELECT required name="FORMATION_DIPLOME[]">
                                    <option value="">S&eacute;lectionnez un niveau de diplôme</option>
                                    <!--                                        <OPTION VALUE="Bac non valid&#233;">Bac non valid&#233;</OPTION>-->
                                    <OPTION VALUE="Lyc&#233;e, Niveau Bac">Lyc&#233;e, Niveau Bac</OPTION>
                                    <OPTION VALUE="Bac Professionnel, BEP, CAP">Bac Professionnel, BEP, CAP</OPTION>
                                    <OPTION VALUE="DUT, BTS, Bac + 2">DUT, BTS, Bac + 2</OPTION>
                                    <!--                                        <OPTION VALUE="Dipl&#244;me non valid&#233;">Dipl&#244;me non valid&#233;</OPTION>-->
                                    <OPTION VALUE="Licence, Bac + 3">Licence, Bac + 3</OPTION>
                                    <OPTION VALUE="Ma&#238;trise,Master 1, IEP, IUP,Ingénieur Bac + 4">Ma&#238;trise, Master 1, IEP, IUP, Ingénieur, Bac + 4</OPTION>
                                    <OPTION VALUE="DESS, DEA, Master 2,Ingénieur, Bac + 5">DESS, DEA, Master 2,Ingénieur, Bac + 5</OPTION>
                                    <OPTION VALUE="Doctorat, 3&#232;me cycle">Doctorat, 3&#232;me cycle</OPTION>
                                    <OPTION VALUE="Expert, Recherche">Expert, Recherche</OPTION>
                                </SELECT>

                            </td>
                        </tr>
                        <tr>
                            <th><div align="right">Domaine Principal d'&eacute;tude <font color=red>*</font> : </div></th>
                            <td><INPUT type="text" name="FORMATION_DOM_PRINC_ETUD[]" placeholder="" id="FORMATION_DOM_PRINC_ETUD[]" value="<?php //if($fo_dom_princ_etud) echo $fo_dom_princ_etud; ?>" required size="30" maxlength="10"/></td>
                        </tr>
                        <tr>
                            <th><div align="right">Diplôme <font color=red>*</font> : </div></th>
                            <td><input type="file"  name="FORMATION_DIPLOME_FICHIER[]" value="<?php //if($fo_diplome_fichier) echo $fo_diplome_fichier; ?>"></td>
                        </tr>
                    </table>

                </fieldset>
            </div>
            <div id="sheepItForm_noforms_template">Aucune formation renseign&eacute;e</div>
            <div id="sheepItForm_controls">
                <table>
                    <tr>
                        <td><div id="sheepItForm_add"><a><span>Ajouter une formation<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
                        <td><div id="sheepItForm_remove_last"><a><span>Supprimer une formation<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
                    </tr>
                </table>
            </div>
        </div>

<div id="sheepItForm"></div>
<div id="reference"><div id="reference_template"></div>
    <input type="submit" name="envoyer" value="Valider" style=" width:80px;margin-top:20px; margin-left: 200px;">
    </form>


<!-- fin contenu à mettre  -->



		</span>
                    </p>

                </div>
            </div>
        </div>
    </div>
</article>
<script type="application/javascript" src="js/additional-methods.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker-fr.js"></script>
<script type="text/javascript" src="js/jquery.livequery.js"></script>
<script type="text/javascript">
    jQuery("#datepicker_annonce_un, #datepicker_annonce_deux, .datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange: "1960:2015",
        showOn: 'button',
        buttonImageOnly: true,
        buttonImage: 'images/calendar_icon.png'
    });


</script>

