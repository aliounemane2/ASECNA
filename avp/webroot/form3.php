<?php
$sql_formation = "SELECT * FROM formation WHERE FK_CANDIDAT_ID = ".$_SESSION['id_user'];

$req_formation = mysql_query($sql_formation);
$formations[] = mysql_fetch_array($req_formation);

$erreur="";
$var=isset($_POST["envoyer"]);

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
        /*********INSERTION DANS LA TABLE AUTRE FORMATION ********/
        if(isset($_POST["FORM_AN_DEB"]))
        {
            $_POST["FORM_AN_DEB"]=($_POST["FORM_AN_DEB"]);
            $_POST["FORM_LIB"]=($_POST["FORM_LIB"]);
            $_POST["FORM_NOM"]=($_POST["FORM_NOM"]);
            $_POST["FORM_INTITULE"]=($_POST["FORM_INTITULE"]);
            $_POST["AUTRE_FORMATION_DIPLOME_FICHIER"]=($_POST["AUTRE_FORMATION_DIPLOME_FICHIER"]);

            for($i=0; $i<sizeof($_POST["FORM_AN_DEB"]); $i++){
                if($_POST["FORM_NOM"][$i]!='')
                {
                    $o= rand(10,10000);
                    $extension = substr($_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['name'][$i],-4,4);
                    $chemin = "diplome/".$o."-".$_SESSION['identifiant'].$extension;
                    if(move_uploaded_file($_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['tmp_name'][$i], $chemin)) {
                        echo "Le diplome ".  basename( $_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['name'][$i]).
                            " a ete bien sauvegarde.".'<br />';
                    }
                    else
                        echo "Erreur dans la sauvegarde du diplome!.".'<br />';
                    $sql= 'INSERT INTO AUTRE_FORMATION  VALUES ("",
				"'.htmlentities($_POST["FORMA_AN_DEB"][$i]).'",
				"'.htmlentities($_POST["FORM_LIB"][$i]).'",
				"'.htmlentities($_POST["FORM_NOM"][$i]).'",
				"'.htmlentities($_POST["FORM_INTITULE"][$i]).'",
				"'.htmlentities($fk_candidat_id).'",
				"'.htmlentities($chemin).'")';

                    // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
                    mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                    header('Location:index.php?url=afficheAutresformations');
                }
            }
        }

    }
}


?>
<article class="art-post art-article">
    <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Profil</a> ><a href="#">Autres Formations</a></h3>

    <div class="art-postcontent art-postcontent-0 clearfix">

        <div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell layout-item-0" style="width: 100%" >
                    <p style="text-align: justify;">
		<span style="font-family: Arial;">

<!-- contenu à mettre  -->
<form action="index.php?url=form3" method="post" enctype="multipart/form-data" id="SignupForm">

    <!--a id="displayBlocFormation" href="#">Formation</a-->
    <div style="border:1px solid;" id="monBlocFormation" class="resized">
        <div id="sheepItForm_template" >
            <fieldset id="displayBlocFormation">
                <legend><?php echo "2.#index#"?>- Autres Formations</legend>
                <span>Renseignez ci-dessous d'autres formations et/ou cours qui sont pertinents pour  le poste.</span> <br/>
                &nbsp;&nbsp;
                <table>
                    <tr>
                        <th><div align="right">Intitul&eacute; de la formation   : </div></th>
                        <td><INPUT type="text" name="FORM_LIB[]" placeholder="" id="FORM_LIB[]" value=""  size="30" /></td>
                    </tr>
                    <tr>
                        <th><div align="right">Ann&eacute;e   : </div></th>
                        <td><SELECT name="FORM_AN_DEB[]">
                                <option value="">S&eacute;lectionnez</option>
                                <?php for ($i=1960; $i<date('Y'); $i++):
                                    echo '<OPTION VALUE='.$i.'>'.$i.'</OPTION>';
                                endfor; ?>
                            </SELECT></td>
                    </tr>
                    <tr>
                        <th><div align="right">Centre de formation   : </div></th>
                        <td><INPUT type="text" name="FORM_NOM[]" placeholder="" id="FORM_NOM[]" value="" size="30" /></td>
                    </tr>
                    <tr>
                        <th><div align="right">Utilit&eacute; pour les fonctions   : </div></th>
                        <td><INPUT type="text" name="FORM_INTITULE[]" placeholder="" id="FORM_INTITULE[]" value="" size="30" ></td>
                    </tr>
                    <tr>
                        <th align="right">Diplôme   : </th>
                        <td>

                               <input type="file" name="AUTRE_FORMATION_DIPLOME_FICHIER[]" />;

                        </td>
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

