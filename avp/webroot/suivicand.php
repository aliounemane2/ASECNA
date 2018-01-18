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

$fk_util_id=$result['FK_UTIL_ID'];

$sql2 ="SELECT an.ANNONCE_NUM,an.ANNONCE_TITRE,an.ETAT,date_format(postulation_date, '%d/%m/%Y %H:%m:%s') as date_postulation , date_format(ANNONCE_DATE_FIN, '%d/%m/%Y') as DATE_FIN_ANNONCE,an.ANNONCE_LIEN  FROM postulation as p,annonce as an  WHERE  p.FK_annonce_id=an.ANNONCE_ID AND  p.FK_UTIL_ID=".$fk_util_id;



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

<!-- contenu à mettre  -->



            <tr><td valign="top"><img src="Ressources%20Humaines%20-%20Consultez%20nos%20offres_fichiers/pixel.gif" height="10" width="1"></td>
            </tr>
<tr>
    <td colspan="2" class="txt" valign="top"><p align="justify">
        <table cellpadding="0" cellspacing="0" border="1" class="display" id="dataTable">
            <thead>

            <th>Ref Annonce</th>
            <th>Titre Annonce</th>
            <th>Etat</th>
            <th>Date postulation</th>
            <th>Date cloture</th>
            <th>fichier</th>
            <!--th></th-->
            </tr>
            </thead>
            <tbody>

            <?php

            while ( $data = mysql_fetch_assoc($results) ) {
                ?>
                <tr>
                    <td><?php echo @$data['ANNONCE_NUM']; ?></td>
                    <td><?php echo @$data['ANNONCE_TITRE']; ?></td>
                    <td><?php echo $data['ETAT']; ?></td>
                    <td><?php echo $data['date_postulation']; ?></td>
                    <td><?php echo $data['DATE_FIN_ANNONCE']; ?></td>
                    <td><a href="<?php echo $data['ANNONCE_LIEN']; ?>">Fichier</a> </td>


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