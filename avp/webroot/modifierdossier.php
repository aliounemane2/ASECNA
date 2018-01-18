<?php
$erreur="";
$var=isset($_POST["envoyer"]);

$test=$_SESSION["id_user"];
//$test1=$_GET['id_annonce'];
if(isset($_REQUEST['id_dossier']))
{
    $id_dossier=@$_REQUEST['id_dossier'];


    $sql ='SELECT * FROM dossier WHERE DOSSIER_ID='.$id_dossier;

    $exereq= mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
    $result = mysql_fetch_array($exereq);
    $nom_dossier=$result['DOSSIER_NOM'];
    $fk_candidat_id=$result['FK_CANDIDAT_ID'];
    $lien_dossier=$result['DOSSIER_LIEN'];
    $libelle="";
    $name="";

    switch($nom_dossier)
    {
        case $fk_candidat_id."-"."demande_emploi":
        {
            $libelle="Demande d'emploi";
            $name="CANDIDAT_DEMANDE_DEMPLOI";
            break;
        }
        case $fk_candidat_id."-"."cv":
        {
            $libelle="CV";
            $name="CANDIDAT_CV";
            break;
        }
        case $fk_candidat_id."-"."certificat-travail":
        {
            $libelle="Certificat du dernier emploi";
            $name="CANDIDAT_CERTIFICAT_TRAVAIL";
            break;
        }
        case $fk_candidat_id."-"."photo":
        {
            $libelle="Photo";
            $name="CANDIDAT_PHOTO";
            break;
        }

        case $fk_candidat_id."-"."acte-naissance":
        {
            $libelle="Acte de naissance";
            $name="CANDIDAT_ACT_NAISS";
            break;
        }
        case $fk_candidat_id."-"."fiche-famille":
        {
            $libelle="Fiche de famille";
            $name="CANDIDAT_FICHE_FAMILLE";
            break;
        }
        case $fk_candidat_id."-"."certificat-nationalite":
        {
            $libelle="Certificat de nationalité";
            $name="CANDIDAT_CERTIFICAT_NATIONALITE";
            break;
        }
        case $fk_candidat_id."-"."certificat-domicile":
        {
            $libelle="Certificat de domicile";
            $name="CANDIDAT_CERTIFICAT_DOMICILE";
            break;
        }
        case $fk_candidat_id."-"."certificat-medical":
        {
            $libelle="Certificat médical";
            $name="CANDIDAT_CERTIFICAT_MEDICAL";
            break;
        }
        case $fk_candidat_id."-"."casier-judiciaire":
        {
            $libelle="Casier judiciaire";
            $name="CANDIDAT_CASIER_JUDICIAIRE";
            break;
        }
    }

}
$sql2 ='SELECT * FROM candidat WHERE CANDIDAT_ID='.$fk_candidat_id;

$exereq2= mysql_query ($sql2) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$result2 = mysql_fetch_array($exereq2);
$matricule=$result2['CANDIDAT_MATRICULE'];
$nom=$result2['CANDIDAT_NOM'];
$prenom=$result2['CANDIDAT_PRENOM'];
$_SESSION['identifiant'] = $fk_candidat_id."-".$matricule."-".$nom."-".$prenom;
if($var <> ""){

    // unlink($_POST['last_file']);
    //mkdir($numero_insere);
    if(isset($_FILES['CANDIDAT_DEMANDE_EMPLOI']['name']))
    {
        $extensionDemandeEmloi = substr($_FILES['CANDIDAT_DEMANDE_EMPLOI']['name'],-4,4);
        $cheminPhotoDemandeEmloi = "demande_emploi/".$_SESSION['identifiant'].$extension;
        $nomfichierDemandeEmloi = $id_dossier."-demande_emploi";
        if(move_uploaded_file($_FILES['CANDIDAT_DEMANDE_EMPLOI']['tmp_name'], $cheminPhotoDemandeEmloi)) {
            echo "La demande d'emploi  ".  basename( $_FILES['CANDIDAT_DEMANDE_EMPLOI']['name']).
                " a ete bien sauvegarde.".'<br />';
        }
        else
            echo "Erreur dans la sauvegarde de la demande d'emploi!.".'<br />';

        $sql= 'UPDATE dossier SET
                DOSSIER_NOM="'.$nomfichierDemandeEmloi.'",
                DOSSIER_LIEN="'.$cheminPhotoDemandeEmloi.'"
                WHERE DOSSIER_ID='.$_POST['id_dossier'];
        // on fait un update (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
    }

    if(isset($_FILES['CANDIDAT_CV']['name']))
    {
        $extensionCV = substr($_FILES['CANDIDAT_CV']['name'],-4,4);

        $cheminPhotoCV = "cv/".@$_SESSION['identifiant'].$extensionCV;
        $nomfichierCV = $_POST['FK_CANDIDAT_ID']."-cv";

        if(move_uploaded_file($_FILES['CANDIDAT_CV']['tmp_name'], $cheminPhotoCV)) {
            echo "Le cv  ".  basename( $_FILES['CANDIDAT_CV']['name']).
                " a ete bien sauvegarde.".'<br />';
        }
        else
            echo "Erreur dans la sauvegarde du cv!.".'<br />';

        $sql= 'UPDATE dossier SET
                    DOSSIER_NOM="'.$nomfichierCV.'",
                    DOSSIER_LIEN="'.$cheminPhotoCV.'"
                    WHERE DOSSIER_ID='.$_POST['id_dossier'];

        // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
    }

    if(isset($_FILES['CANDIDAT_CV']['name']))
    {
      $extensionCertificatTravail = substr($_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['name'],-4,4);
        $cheminPhotoCertificatTravail = "certificat_travail/".$_SESSION['identifiant'].$extensionCertificatTravail;
        $nomfichierCertificatTravail = $_POST['FK_CANDIDAT_ID']."-certificat-travail";

        if(move_uploaded_file($_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['tmp_name'], $cheminPhotoCertificatTravail)) {
            echo "Le certificat de travail  ".  basename( $_FILES['CANDIDAT_CERTIFICAT_TRAVAIL']['name']).
                " a ete bien sauvegarde.".'<br />';
        }
        else
            echo "Erreur dans la sauvegarde du certificat de travail!.".'<br />';
        $sql= 'UPDATE dossier SET
                    DOSSIER_NOM="'.$nomfichierCertificatTravail.'",
                    DOSSIER_LIEN="'.$cheminPhotoCertificatTravail.'"
                    WHERE DOSSIER_ID='.$_POST['id_dossier'];
        // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
    }

    if(isset($_FILES['CANDIDAT_PHOTO']['name']))
    {

        $extensionPhoto = substr($_FILES['CANDIDAT_PHOTO']['name'],-4,4);
        $cheminPhoto = "photos/".$_SESSION['identifiant'].$extensionPhoto;
        $nomfichierPhoto = $_POST['FK_CANDIDAT_ID']."-photo";

        if(move_uploaded_file($_FILES['CANDIDAT_PHOTO']['tmp_name'], $cheminPhoto)) {
            echo "La photo  ".  basename( $_FILES['CANDIDAT_PHOTO']['name']).
                " a ete bien sauvegarde.".'<br />';
        }
        else
            echo "Erreur dans la sauvegarde de la photo!.".'<br />';
        $sql= 'UPDATE dossier SET
                    DOSSIER_NOM="'.$nomfichierPhoto.'",
                    DOSSIER_LIEN="'.$cheminPhoto.'"
                    WHERE DOSSIER_ID='.$_POST['id_dossier'];
        // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

    }

    if(isset($_FILES['CANDIDAT_ACTE_NAISS']['name']))
    {
        $extensionActeNaissance = substr($_FILES['CANDIDAT_ACTE_NAISS']['name'],-4,4);
        $cheminActeNaissance = "acteNaissance/".$_SESSION['identifiant'].$extensionActeNaissance;
        $nomfichierActeNaissance = $_POST['FK_CANDIDAT_ID']."-acte-naissance";

        if(move_uploaded_file($_FILES['CANDIDAT_ACTE_NAISS']['tmp_name'], $cheminActeNaissance)) {
            echo "L'acte de naissance  ".  basename( $_FILES['CANDIDAT_ACTE_NAISS']['name']).
                " a ete bien sauvegarde.".'<br />';
        }
        else
            echo "Erreur dans la sauvegarde de l'acte de naissance!".'<br />';
        $sql= 'UPDATE dossier SET
                    DOSSIER_NOM="'.$nomfichierActeNaissance.'",
                    DOSSIER_LIEN="'.$cheminActeNaissance.'"
                    WHERE DOSSIER_ID='.$_POST['id_dossier'];
        // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
    }

    if(isset($_FILES['CANDIDAT_FICHE_FAMILLE']['name']))
    {
        $extensionFicheFamille = substr($_FILES['CANDIDAT_FICHE_FAMILLE']['name'],-4,4);
        $cheminFicheFamille = "ficheFamille/".$_SESSION['identifiant'].$extensionFicheFamille;
        $nomfichierFicheFamille = $_POST['FK_CANDIDAT_ID']."-fiche-famille";

        if(move_uploaded_file($_FILES['CANDIDAT_FICHE_FAMILLE']['tmp_name'], $cheminFicheFamille)) {
            echo "La fiche famille  ".  basename( $_FILES['CANDIDAT_FICHE_FAMILLE']['name']).
                " a ete bien sauvegarde.".'<br />';
        }
        else
            echo "Erreur dans la sauvegarde de la fiche famille!".'<br />';
        $sql= 'UPDATE dossier SET
                    DOSSIER_NOM="'.$nomfichierFicheFamille.'",
                    DOSSIER_LIEN="'.$cheminFicheFamille.'"
                    WHERE DOSSIER_ID='.$_POST['id_dossier'];
        // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

    }

    if(isset($_FILES['CANDIDAT_CERTIF_NAT']['name']))
    {
        $extensioncertificatNationalite = substr($_FILES['CANDIDAT_CERTIF_NAT']['name'],-4,4);
        $chemincertificatNationalite = "certificatNationalite/".$_SESSION['identifiant'].$extensioncertificatNationalite;
        $nomfichiercertificatNationalite = $_POST['FK_CANDIDAT_ID']."-certificat-nationalite";

        if(move_uploaded_file($_FILES['CANDIDAT_CERTIF_NAT']['tmp_name'], $chemincertificatNationalite)) {
            echo "Le certificat de nationalite  ".  basename( $_FILES['CANDIDAT_CERTIF_NAT']['name']).
                " a ete bien sauvegarde.".'<br />';
        }
        else
            echo "Erreur dans la sauvegarde du certficat de nationalite!".'<br />';
        $sql= 'UPDATE dossier SET
                    DOSSIER_NOM="'.$nomfichiercertificatNationalite.'",
                    DOSSIER_LIEN="'.$chemincertificatNationalite.'"
                    WHERE DOSSIER_ID='.$_POST['id_dossier'];
    // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
    }

    if(isset($_FILES['CANDIDAT_CERTIF_DOMICILE']['name']))
    {
        $extensioncertificatDomicile = substr($_FILES['CANDIDAT_CERTIF_DOMICILE']['name'],-4,4);
        $chemincertificatDomicile = "certificatDomicile/".$_SESSION['identifiant'].$extensioncertificatDomicile;
        $nomfichiercertificatDomicile = $_POST['FK_CANDIDAT_ID']."-certificat-domicile";

        if(move_uploaded_file($_FILES['CANDIDAT_CERTIF_DOMICILE']['tmp_name'], $chemincertificatDomicile)) {
            echo "Le certificat de domicile  ".  basename( $_FILES['CANDIDAT_CERTIF_DOMICILE']['name']).
                " a ete bien sauvegarde.".'<br />';
        }
        else
            echo "Erreur dans la sauvegarde du certificat de domicile!".'<br />';
        $sql= 'UPDATE dossier SET
                    DOSSIER_NOM="'.$nomfichiercertificatDomicile.'",
                    DOSSIER_LIEN="'.$chemincertificatDomicile.'"
                    WHERE DOSSIER_ID='.$_POST['id_dossier'];
    // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

    }

    if(isset($_FILES['CANDIDAT_CERTIF_MEDICAL']['name']))
    {
        $extensioncertificatMedical = substr($_FILES['CANDIDAT_CERTIF_MEDICAL']['name'],-4,4);
        $chemincertificatMedical = "certificatMedical/".$_SESSION['identifiant'].$extensioncertificatMedical;
        $nomfichiercertificatMedical = $_POST['FK_CANDIDAT_ID']."-certificat-medical";

        if(move_uploaded_file($_FILES['CANDIDAT_CERTIF_MEDICAL']['tmp_name'], $chemincertificatMedical)) {
            echo "Le certificat medical  ".  basename( $_FILES['CANDIDAT_CERTIF_MEDICAL']['name']).
                " a ete bien sauvegarde".'<br />';
        }
        else
            echo "Erreur dans la sauvegarde du certificat medical!".'<br />';
        $sql= 'UPDATE dossier SET
                    DOSSIER_NOM="'.$nomfichiercertificatMedical.'",
                    DOSSIER_LIEN="'.$chemincertificatMedical.'"
                    WHERE DOSSIER_ID='.$_POST['id_dossier'];
    // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
    }

    if(isset($_FILES['CANDIDAT_CASIER_JUDICIAIRE']['name']))
    {
        $extensioncasierJudiciaire = substr($_FILES['CANDIDAT_CASIER_JUDICIAIRE']['name'],-4,4);
        $chemincasierJudiciaire = "casierJudiciaire/".$_SESSION['identifiant'].$extensioncasierJudiciaire;
        $nomfichiercasierJudiciaire = $_POST['FK_CANDIDAT_ID']."-casier-judiciaire";

        if(move_uploaded_file($_FILES['CANDIDAT_CASIER_JUDICIAIRE']['tmp_name'], $chemincasierJudiciaire)) {
            echo "Le casier judiciaire  ".  basename( $_FILES['CANDIDAT_CASIER_JUDICIAIRE']['name']).
                " a ete bien sauvegarde .".'<br />';
        }
        else
            echo "Erreur dans la sauvegarde du casier judiciaire!".'<br />';
        $sql= 'UPDATE dossier SET
                    DOSSIER_NOM="'.$nomfichiercasierJudiciaire.'",
                    DOSSIER_LIEN="'.$chemincasierJudiciaire.'"
                    WHERE DOSSIER_ID='.$_POST['id_dossier'];
    // on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
        mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
    }

    // Fin transfert des fichiers
    header("Location: index.php?url=affichedossiers");
}
?>


<article class="art-post art-article">
    <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Profil </a> ><a href="#">Piéces jointes</a></h3>

    <div class="art-postcontent art-postcontent-0 clearfix">

        <div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell layout-item-0" style="width: 100%" >
                    <p style="text-align: justify;">
		<span style="font-family: Arial;">

<!-- contenu à mettre  -->

<form action="index.php?url=modifierdossier"  id="myformannonce" name="annonce" method="post" enctype="multipart/form-data">

    <fieldset>
        <table>
            <tr>
                <th align="right"><?php echo $libelle;?> : <font color=red>*</font></th>
                <td><?php
                    switch($nom_dossier)
                    {
                            case $fk_candidat_id."-"."demande_emploi":
                            {
                            ?>
                    <input type="file" class="required checkinput" accept="image/*" value="photo" name="CANDIDAT_DEMANDE_DEMPLOI">
                    <?php
                            break;
                            }
                            case $fk_candidat_id."-"."cv":
                            {echo "est";
                                ?>
                                <input type="file" class="required checkinput" accept="image/*" value="photo" name="CANDIDAT_CV">
                                <?php

                            break;
                            }
                            case $fk_candidat_id."-"."certificat-travail":
                            {
                                ?>
                                <input type="file" class="required checkinput" accept="image/*" value="photo" name="CANDIDAT_CERTIFICAT_TRAVAIL">
                                <?php
                            break;
                            }
                            case $fk_candidat_id."-"."photo":
                            {
                                ?>
                                <input type="file" class="required checkinput" accept="image/*" value="photo" name="CANDIDAT_PHOTO">
                                <?php

                            break;
                            }

                            case $fk_candidat_id."-"."acte-naissance":
                            {
                                ?>
                                <input type="file" class="required checkinput" accept="image/*" value="photo" name="CANDIDAT_ACT_NAISS">
                                <?php

                            break;
                            }
                            case $fk_candidat_id."-"."fiche-famille":
                            {
                                ?>
                                <input type="file" class="required checkinput" accept="image/*" value="photo" name="CANDIDAT_FICHE_FAMILLE">
                                <?php

                            break;
                            }
                            case $fk_candidat_id."-"."certificat-nationalite":
                            {
                                ?>
                                <input type="file" class="required checkinput" accept="image/*" value="photo" name="CANDIDAT_CERTIF_NAT">
                                <?php

                            break;
                            }
                            case $fk_candidat_id."-"."certificat-domicile":
                            {
                                ?>
                                <input type="file" class="required checkinput" accept="image/*" value="photo" name="CANDIDAT_CERTIF_DOMICILE">
                                <?php

                            break;
                            }
                            case $fk_candidat_id."-"."certificat-medical":
                            {
                                ?>
                                <input type="file" class="required checkinput" accept="image/*" value="photo" name="CANDIDAT_CERTIF_MEDICAL">
                                <?php

                            break;
                            }
                            case $fk_candidat_id."-"."casier-judiciaire":
                            {
                                ?>
                                <input type="file" class="required checkinput" accept="image/*" value="photo" name="CANDIDAT_CASIER_JUDICIAIRE">
                                <?php

                            break;
                            }
                    }
?>

                    <input type="hidden" name="id_dossier" value="<?php echo $id_dossier; ?>"/>
                    <input type="hidden" name="FK_CANDIDAT_ID" value="<?php echo $fk_candidat_id; ?>"/></td>

            </tr>

        </table>
        <input type="submit" name="envoyer" value="Valider" style="margin-top:20px; margin-left: 200px;">
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