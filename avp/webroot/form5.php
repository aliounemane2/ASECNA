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
        /*******************INSERTION DANS LA TABLE EXPERIENCES PROFESSIONNELLES*******************/
        for($i=0; $i<sizeof($_POST["EXP_ENT_NOM"]); $i++)
        {
            if($_POST["EXP_ENT_NOM"][$i]!='')
            {
                $sql= 'INSERT INTO experience_professionnelle VALUES ("",
			"'.htmlentities($_POST["EXP_ENT_NOM"][$i]).'",
			"'.htmlentities($_POST["EXP_SEC_ACT"][$i]).'",
			"'.htmlentities($_POST["EXP_POSTE"][$i]).'",
			"'.htmlentities($_POST["EXP_DEBUT_TRAVAIL"][$i]).'",
			"'.htmlentities($_POST["EXP_FIN_TRAVAIL"][$i]).'",
			"'.htmlentities($_POST["EXP_SALAIRE"][$i]).'",
			"'.htmlentities($_POST["EXP_NBRE_PERS_SORD"][$i]).'",
			"'.htmlentities($_POST["EXP_TACHE"][$i]).'",
			"'.htmlentities($_POST["EXP_MOTIF_DEP"][$i]).'",
			"'.htmlentities($fk_candidat_id).'")';
                // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
                mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                header('Location:index.php?url=afficheexperiencespro');}
        }
    }
}


?>
<article class="art-post art-article">
    <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Profil</a> ><a href="#">Expériences professionnelles</a></h3>

    <div class="art-postcontent art-postcontent-0 clearfix">

        <div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell layout-item-0" style="width: 100%" >
                    <p style="text-align: justify;">
		<span style="font-family: Arial;">

<!-- contenu à mettre  -->
<form action="index.php?url=form5" method="post" enctype="multipart/form-data" id="SignupForm">

    <div style="border:1px dotted #000000;" id="monBlocFormation" class="resized">
        <div id="sheepItForm_template" >
            <fieldset id="displayBlocFormation">
                    <legend><?php echo "5.#index#"?>-Exp&eacute;riences professionnelles pass&eacute;es</legend>
                    <p>Veuillez commencer par l'emploi le plus r&eacute;cent</p>
                    <table>
                        <tr>
                            <th align="left">Poste occupé:</th>
                            <td><INPUT type="text" name="EXP_POSTE[]" placeholder="" size="30" maxlength="10"/></td>
                        </tr>
                        <tr>
                            <th align="left">Nom et adresse de l'employeur   : </th>
                            <td><INPUT type="text" name="EXP_ENT_NOM[]" placeholder="" size="30" maxlength="10"/></td>
                        </tr>
                        <tr>
                            <th align="left">Domaine d'activit&eacute;   : </th>
                            <td><INPUT type="text" name="EXP_SEC_ACT[]" placeholder="" size="30" maxlength="10"/></td>
                        </tr>
                        <tr>
                            <th align="left">Dur&eacute;e de l'emploi de   : </th>
                            <td><INPUT type="text" name="EXP_DEBUT_TRAVAIL[]" value="" class="monthpicker"/></td>
                        </tr>
                        <tr>
                            <th>&agrave;</th>
                            <td><INPUT type="text" name="EXP_FIN_TRAVAIL[]" value="" class="monthpicker"/></td>
                        </tr>
                        <tr>
                            <th align="left">Salaire brut moyen mensuel(CFA)   : </th>
                            <td><INPUT type="text" name="EXP_SALAIRE[]" placeholder="" size="30" maxlength="10"/></td>
                        </tr>
                        <tr>
                            <th align="left">Nombre de personnes plac&eacute;es sous vos ordres   : </th>
                            <td><INPUT type="text" name="EXP_NBRE_PERS_SORD[]" placeholder="" size="30" maxlength="10"/></td>
                        </tr>
                        <tr>
                            <th align="left">Description de vos t&acirc;ches,responsabilit&eacute;s et accomplissements   : </th>
                            <td><INPUT type="text" name="EXP_TACHE[]" placeholder="" size="30" maxlength="10"/></td>
                        </tr>
                        <tr>
                            <th align="left">Motif du d&eacute;part   : </th>
                            <td><INPUT type="text" name="EXP_MOTIF_DEP[]" placeholder="" size="30" maxlength="10"/></td>
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