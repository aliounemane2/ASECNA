<?php
if( isset($_GET['page']) && is_numeric($_GET['page']) )
    $page = $_GET['page'];
else
    $page = 1;

// Nombre d'infos par page
$pagination = 5;
// Numéro du 1er enregistrement à lire
$limit_start = ($page - 1) * $pagination;

// Préparation de la requête

$sql ='SELECT * FROM candidat WHERE FK_UTIL_ID='.$_SESSION['id_user'];

$exereq= mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$result = mysql_fetch_array($exereq);

$fk_candidat_id=$result['CANDIDAT_ID'];

$sql2 ='SELECT * FROM reference WHERE FK_CANDIDAT_ID='.$fk_candidat_id;

$results= mysql_query ($sql2) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
//$formations = mysql_fetch_array($exereq2);

?>
<article class="art-post art-article">
    <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Profil</a> ><a href="#">Références</a></h3>

    <div class="art-postcontent art-postcontent-0 clearfix">

        <div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell layout-item-0" style="width: 100%" >
                    <p style="text-align: justify;">
		<span style="font-family: Arial;">
		<b><h3><a href="index.php?url=form8">Ajouter une référence</a></h3></b>
<!-- contenu à mettre  -->

            <?php
            if(isset($_GET['supp']))
            {

                $id= $_GET["id_ref"];

//On sélectionne tout dans la table correspondant à l'id
                $result = mysql_query("DELETE FROM reference where REF_ID =$id");

                // Si il ya une erreur on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
                if(!$result)
                {
                    die ('Requete invalide:'.mysql_error());
                }else
                {
                    echo '<p>la référence à été supprimée avec succés.</p>';
                    header('Location:index.php?url=afficheReferences');
                }
            }

            if(isset($_GET["id_annonce"]))
            { $id = $_GET["id_annonce"];
                ?>
                <tr><td>
                        <form action="index.php?url=afficheavp&id_annonce=<?php echo $id;?>" method="POST">
                            <input name="supprimer" value="supprimer l'avis N°<?php echo $id;?>" type="submit"/>
                        </form>
                    </td></tr>
            <?php } ?>

            <tr><td valign="top"><img src="Ressources%20Humaines%20-%20Consultez%20nos%20offres_fichiers/pixel.gif" height="10" width="1"></td>
            </tr>
<tr>
    <td colspan="2" class="txt" valign="top"><p align="justify">
        <table cellpadding="0" cellspacing="0" border="1" class="display" id="dataTable">
            <thead>

            <th>Nom entreprise</th>
            <th>Nom Contact</th>
            <th>Poste occupé</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Actions</th>
            <!--th></th-->
            </tr>
            </thead>
            <tbody>

            <?php

            while ( $data = mysql_fetch_assoc($results) ) {
                ?>
                <tr>
                    <td><?php echo @$data['REF_NOM_ENT']; ?></td>
                    <td><?php echo @$data['REF_PERS_CONT']; ?></td>
                    <td><?php echo $data['REF_POST_OCC']; ?></td>
                    <td><?php echo $data['REF_TEL']; ?></td>
                    <td><?php echo $data['REF_EMAIL']; ?></td>

                    <td><a href="index.php?url=modifierReference&id_ref=<?php echo $data['REF_ID']?>"><img src="images/edit.png" width="15" height="15" alt="Modifier"/></a><br/>
                    <a href="index.php?url=afficheReferences&id_ref=<?php echo $data['REF_ID']."&supp=3"?>"><img src="images/bouton_supprimer.png" width="15" height="15" alt="Supprimer"/></a></td>

                </tr>

            <?php
            }  ?>
            </tbody>
        </table>




        <!-- modal content -->


        <!-- preload the images -->
        <div style='display:none'>
            <img src='images/x.png' alt='Fermer' />
        </div>


				<tr><td valign="top"><img src="Ressources%20Humaines%20-%20Consultez%20nos%20offres_fichiers/pixel.gif" height="10" width="1"></td></tr>

        <tr><td valign="top"><img src="Ressources%20Humaines%20-%20Consultez%20nos%20offres_fichiers/pixel.gif" height="25" width="1"></td></tr>
            </tbody></table>
            </td>
            </tr>
            <tr class="fond3"><td colspan="10" valign="top"><img src="Ressources%20Humaines%20-%20Consultez%20nos%20offres_fichiers/pixel.gif" height="5" width="1"></td></tr>
            </tbody></table>

            <!-- fin contenu à mettre  -->


		</span>
                    </p>

                </div>
            </div>
        </div>
    </div>
</article>