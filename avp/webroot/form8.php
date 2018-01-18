<?php
$sql_formation = "SELECT * FROM reference WHERE FK_CANDIDAT_ID = ".$_SESSION['id_user'];

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
        /*******************INSERTION DANS LA TABLE REFERENCE*******************/
        for($i=0; $i<sizeof($_POST["REF_NOM_ENT"]); $i++)
        {
            if($_POST["REF_NOM_ENT"][$i]!='')
            {
                $sql= 'INSERT INTO reference VALUES ("",
			"'.htmlentities($_POST["REF_NOM_ENT"][$i]).'",
			"'.htmlentities($_POST["REF_PERS_CONT"][$i]).'",
			"'.htmlentities($_POST["REF_POST_OCC"][$i]).'",
			"'.htmlentities($_POST["REF_TEL"][$i]).'",
			"'.htmlentities($_POST["REF_EMAIL"][$i]).'",
			"'.$fk_candidat_id.'")';

                // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
                mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                header('Location:index.php?url=afficheReferences');
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
<form action="index.php?url=form8" method="post" enctype="multipart/form-data" id="SignupForm>

    <!--a id="displayBlocFormation" href="#">Formation</a-->
    <div style="border:1px solid;" id="monBlocFormation" class="resized">
        <div id="sheepItForm_template" >
            <fieldset id="displayBlocFormation">
                <legend><?php echo "2.#index#"?>- Références</legend>
                <span>Renseignez ci-dessous d'autres formations et/ou cours qui sont pertinents pour  le poste.</span> <br/>
                &nbsp;&nbsp;
                <table>
                    <tr>Veuillez donner le nom et les coordonn&eacute;es de trois personnes n'ayant avec vous aucun lien de parent&eacute; et connaissant vos aptitudes professionnelles et vos qualit&eacute;s personnelles. </tr>
                    <tr>
                        <th align="right">Nom Entreprise : </th>
                        <td><input type="text" name="REF_NOM_ENT[]" placeholder="" size="30">
                            : </td>
                    </tr>
                    <tr>
                        <th align="right">Nom de la personne &agrave; contacter : </th>
                        <td><input type="text" name="REF_PERS_CONT[]" placeholder="" size="30" ></td>
                    </tr>
                    <tr>
                        <th align="right">Poste occup&eacute; : </th>
                        <td><input type="text" name="REF_POST_OCC[]" placeholder="" size="30" ></td>
                    </tr>
                    <tr>
                        <th align="right">T&eacute;l&eacute;phone : </th>
                        <td><input type="text" name="REF_TEL[]" placeholder="" size="30" ></td>
                    </tr>
                    <tr>
                        <th align="right">Email : </th>
                        <td><input type="text" name="REF_EMAIL[]" placeholder="" size="30" ></td>
                    </tr>
                </table>

            </fieldset>
        </div>
        <div id="sheepItForm_noforms_template">Aucune référence renseign&eacute;e</div>
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
        <input type="submit" name="envoyer" value="Valider" style="margin-top:20px; margin-left: 200px;">
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

