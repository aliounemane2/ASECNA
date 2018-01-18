<?php
$erreur="";
$var=isset($_POST["formationUpdate"]);
$test=$_SESSION["id_user"];

if(isset($_REQUEST['id_formation']))
{
     $id_formation=@$_REQUEST['id_formation'];
     $sql ='SELECT * FROM autre_formation WHERE FORM_ID='.$id_formation;
     $exereq= mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
     $result = mysql_fetch_array($exereq);
}

if($var <> ""){
    if (!empty($_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['name'])) {
        $sql_candidat = "SELECT * FROM candidat WHERE FK_UTIL_ID = {$test}";
        $req_candidat = mysql_query($sql_candidat);
        $result_candidat = mysql_fetch_assoc($req_candidat);
        $matricule = empty($result_candidat['CANDIDAT_MATRICULE']) ? '': $result_candidat['CANDIDAT_MATRICULE'];

        unlink($_POST['last_file']);

        $P = rand(10, 10000);
        $extension = substr($_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['name'],-4,4);
       $chemin = "diplome/".$P."-".$test."-".$result_candidat['CANDIDAT_NOM']."-".$matricule.$extension;
        if(move_uploaded_file($_FILES['AUTRE_FORMATION_DIPLOME_FICHIER']['tmp_name'], $chemin)) {
            echo "Le diplome ete bien sauvegarde.".'<br />';
            }
    }else{
        $chemin = $result['AUTRE_FORMATION_DIPLOME_FICHIER'];
        }
    $sql = "UPDATE autre_formation SET FORM_lIB= '".$_POST['FORM_LIB']."', FORMATION_AN_DEB = '".$_POST['FORM_AN_DEB'].
        "', FORM_NOM = '".$_POST['FORM_NOM']."', FORM_INTITULE = '".$_POST['FORM_INTITULE']."' , AUTRE_FORMATION_DIPLOME_FICHIER = '".$chemin."' WHERE FORM_ID=".$_POST['id_formation'];

    $req = mysql_query($sql);
    $_SESSION['message'] = "Modifications enregistrées.";
    header("Location: index.php?url=afficheAutresformations");
}
?>

<article class="art-post art-article">
    <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Profil </a> ><a href="#">Autres Formations</a></h3>

    <div class="art-postcontent art-postcontent-0 clearfix">

        <div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell layout-item-0" style="width: 100%" >
                    <p style="text-align: justify;">
		<span style="font-family: Arial;">

<!-- contenu à mettre  -->

<form action="index.php?url=modifierAutreformation"  id="myformannonce" name="annonce" method="post" enctype="multipart/form-data">

    <fieldset>
        <table>
            <tr>
                <th><div align="right">Intitul&eacute; de la formation   : </div></th>
                <td><INPUT type="text" name="FORM_LIB" placeholder="" id="FORM_LIB" value="<?php echo $result['FORM_LIB'];?>"  size="30" /></td>
            </tr>
            <tr>
                <th><div align="right">Ann&eacute;e   : </div></th>
                <td><SELECT name="FORM_AN_DEB">
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
                <th><div align="right">Centre de formation   : </div></th>
                <td><INPUT type="text" name="FORM_NOM" placeholder="" id="FORM_NOM" value="<?php echo $result['FORM_NOM'];?>" size="30" /></td>
            </tr>
            <tr>
                <th><div align="right">Utilit&eacute; pour les fonctions   : </div></th>
                <td><INPUT type="text" name="FORM_INTITULE" placeholder="" id="FORM_INTITULE" value="<?php echo $result['FORM_INTITULE'];?>" size="30" ></td>
            </tr>
            <tr>
                <th align="right">Diplôme   : </th>
                <td>

                    <input type="file" name="AUTRE_FORMATION_DIPLOME_FICHIER" />;
                    <input type="hidden" name="last_file" value="<?php echo $result['AUTRE_FORMATION_DIPLOME_FICHIER'] ?>"/>
                    <input type="hidden" name="id_formation" value="<?php echo $id_formation; ?>"/>
                </td>
            </tr>
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