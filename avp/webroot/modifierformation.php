<?php
$erreur="";
$var=isset($_POST["formationUpdate"]);
$test=$_SESSION["id_user"];

if(isset($_REQUEST['id_formation']))
{
    $id_formation=@$_REQUEST['id_formation'];
    $sql ='SELECT * FROM formation WHERE FORMATION_ID='.$id_formation;
    $exereq= mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
    $result = mysql_fetch_array($exereq);
}

if($var <> ""){
    if (!empty($_FILES['FORMATION_DIPLOME_FICHIER']['name'])) {
        $sql_candidat = "SELECT * FROM candidat WHERE FK_UTIL_ID = {$test}";
        $req_candidat = mysql_query($sql_candidat);
        $result_candidat = mysql_fetch_assoc($req_candidat);
        $matricule = empty($result_candidat['CANDIDAT_MATRICULE']) ? '': $result_candidat['CANDIDAT_MATRICULE'];

        unlink($_POST['last_file']);
        $P = rand(10, 10000);
        $extension = substr($_FILES['FORMATION_DIPLOME_FICHIER']['name'],-4,4);
        $chemin = "diplome/".$P."-".$test."-".$result_candidat['CANDIDAT_NOM']."-".$matricule.$extension;
        if(move_uploaded_file($_FILES['FORMATION_DIPLOME_FICHIER']['tmp_name'], $chemin)) {
            echo "Le diplome ete bien sauvegarde.".'<br />';
        }
    }else{
        $chemin = $result['FORMATION_DIPLOME_FICHIER'];
    }

    $sql = "UPDATE formation SET FORMATION_CYCLE = '".$_POST['FORMATION_CYCLE']."', FORMATION_AN_DEB = '".$_POST['FORMATION_AN_DEB'].
        "', FORMATION_AN_FIN = '".$_POST['FORMATION_AN_FIN']."', ETABLISSEMENT_NOM = '".$_POST['ETABLISSEMENT_NOM']."', FORMATION_DIPLOME = '".$_POST['FORMATION_DIPLOME'].
        "', FORMATION_DOM_PRINC_ETUD = '".$_POST['FORMATION_DOM_PRINC_ETUD']."' , FORMATION_DIPLOME_FICHIER = '".$chemin."' WHERE FORMATION_ID=".$_POST['id_formation'];
    $req = mysql_query($sql);
    $_SESSION['message'] = "Modifications enregistrées.";
    header("Location: index.php?url=afficheformations");


}
?>

<article class="art-post art-article">
    <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Profil </a> ><a href="#">Formations</a></h3>

    <div class="art-postcontent art-postcontent-0 clearfix">

        <div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell layout-item-0" style="width: 100%" >
                    <p style="text-align: justify;">
                        <span style="font-family: Arial;">
                        <!-- contenu à mettre  -->
                        <form action="index.php?url=modifierformation"  id="myformannonce" name="annonce" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <table>
                                    <tr>
                                        <th><div align="right">Formation cycle<font color=red>*</font> : </div></th>
                                        <td><SELECT name="FORMATION_CYCLE">
                                                <option value="">S&eacute;lectionnez</option>
                                                <OPTION VALUE="Universitaires" <?php if($result['FORMATION_CYCLE']=="Universitaires"){echo 'selected';}?>>Universitaires</OPTION>
                                                <OPTION VALUE="Secondaires" <?php if($result['FORMATION_CYCLE']=="Secondaires"){echo 'selected';}?>>Secondaires</OPTION>
                                            </SELECT>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> <div align="right">Ann&eacute;e d'&eacute;tude de <font color=red>*</font> : </div></th>
                                        <td><SELECT name="FORMATION_AN_DEB">
                                                <option value="">S&eacute;lectionnez</option>
                                                <?php for ($i=1960; $i<date('Y'); $i++):
                                                    if($result['FORMATION_AN_DEB']==$i)
                                                    {
                                                        echo '<OPTION VALUE='.$i.' selected=selected>'.$i.'</OPTION>';
                                                    }
                                                    else
                                                    {
                                                        echo '<OPTION VALUE='.$i.'>'.$i.'</OPTION>';
                                                    }

                                                endfor; ?>
                                            </SELECT></td>
                                    </tr>
                                    <tr>
                                        <th> <div align="right">&agrave;</div></th>
                                        <td><SELECT name="FORMATION_AN_FIN">
                                                <option value="">S&eacute;lectionnez</option>
                                                <?php for ($i=1960; $i<date('Y'); $i++):
                                                    if($result['FORMATION_AN_FIN']==$i)
                                                    {
                                                        echo '<OPTION VALUE='.$i.' selected=selected>'.$i.'</OPTION>';
                                                    }
                                                    else
                                                    {
                                                        echo '<OPTION VALUE='.$i.'>'.$i.'</OPTION>';
                                                    }
                                                endfor; ?>
                                            </SELECT></td>
                                    </tr>
                                    <tr>
                                        <th><div align="right">Nom de l'&eacute;tablissement <font color=red>*</font> : </div></th>
                                        <td><INPUT type="text" name="ETABLISSEMENT_NOM" placeholder="" id="ETABLISSEMENT_NOM[]" value="<?php echo $result['ETABLISSEMENT_NOM'];?>" required size="30" maxlength="10"/></td>
                                    </tr>
                                    <tr>
                                        <th><div align="right">Adresse de l'&eacute;tablissement <font color=red>*</font> : </div></th>
                                        <td><INPUT type="text" name="FORMATION_LIEU" placeholder="" id="FORMATION_LIEU[]" value="<?php echo $result['FORMATION_LIEU'];?>" required size="30" maxlength="10"/></td>
                                    </tr>
                                    <tr>
                                        <th><div align="right">Dipl&ocirc;mes obtenus <font color=red>*</font> : </div></th>
                                        <td><INPUT type="text" name="FORMATION_DIPLOME" placeholder="" id="FORMATION_DIPLOME[]" value="<?php echo $result['FORMATION_DIPLOME'];?>" required size="30" maxlength="10"/></td>
                                    </tr>
                                    <tr>
                                        <th><div align="right">Domaine Principal d'&eacute;tude <font color=red>*</font> : </div></th>
                                        <td><INPUT type="text" name="FORMATION_DOM_PRINC_ETUD" placeholder="" id="FORMATION_DOM_PRINC_ETUD[]" value="<?php echo $result['FORMATION_DOM_PRINC_ETUD'];?>" required size="30" maxlength="10"/></td>
                                    </tr>

                                    <th><div align="right">Diplôme <font color=red>*</font> : </div></th>
                                    <td><input type="file"  name="FORMATION_DIPLOME_FICHIER" value="<?php echo $result['FORMATION_DIPLOME_FICHIER'] ?>"></td>
                                    <input type="hidden" name="last_file" value="<?php echo $result['FORMATION_DIPLOME_FICHIER'] ?>"/>
                                    <input type="hidden" name="id_formation" value="<?php echo $id_formation; ?>"/>
                                <!--/tr-->
                                </table>
                                <input type="submit" name="formationUpdate" value="Valider" style="margin-top:20px; margin-left: 200px;">
                            </fieldset>
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