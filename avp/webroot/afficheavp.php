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

$sql = "SELECT *
FROM  annonce ";

?>
<article class="art-post art-article">
                                <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Liste des avis de vacance de poste</a></h3>

                <div class="art-postcontent art-postcontent-0 clearfix">

<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p style="text-align: justify;">
		<span style="font-family: Arial;">
		<b><h3><a href="index.php?url=annonce ">Ajouter une annonce</a></h3></b>
<!-- contenu à mettre  -->

<?php
if(isset($_POST['supprimer']))
{

	$id= $_GET["id_annonce"];

//On sélectionne tout dans la table correspondant à l'id
$result = mysql_query("DELETE FROM annonce where annonce_id =$id");

	  // Si il ya une erreur on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
      if(!$result)
	  {
	  die ('Requete invalide:'.mysql_error());
      }else
      {
 echo '<p>l avis à été effectué avec succés.</p>';
	  header('Location:index.php?url=afficheavp');
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

        <th>Annonce Num</th>
        <th>Annonce Titre</th>
        <th>Annonce date debut</th>
        <th>Annonce date fin</th>
        <th>Annonce date creation</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>

       <?php
// Requête SQL
$resultat = mysql_query($sql);
// Traitement et affichage des données
while ( $data = mysql_fetch_assoc($resultat) ) {
?>
<tr>
	        <td><?php echo $data['ANNONCE_NUM']; ?></td>
            <td><?php echo $data['ANNONCE_TITRE']; ?></td>
            <td><?php echo $data['ANNONCE_DATE_DEB']; ?></td>
            <td><?php echo $data['ANNONCE_DATE_FIN']; ?></td>
            <td><?php echo $data['ANNONCE_DATE_CREATION']; ?></td>

			<td><a href="index.php?url=modifier&id_annonce=<?php echo $data['ANNONCE_ID']?>"> <img src="images/edit.png" width="15" height="15" alt="Modifier"/></a><br/>
                <a href="index.php?url=afficheavp&id_annonce=<?php echo $data['ANNONCE_ID']?>"><img src="images/bouton_supprimer.png" width="15" height="15" alt="Modifier"/></a></td>

				                <!--?php echo $this->Html->link("Modifier", array('controller' => 'annonces', 'action' => 'edit', $v['id'])); ?>--
                <!--?php echo $this->Html->link('Supprimer', array('controller' => 'annonces', 'action' => 'delete', $v['id']), null, 'etes vous sure ? cette action est irreversible'); ?-->
            </td>
	<!--<td>
	<ul class="actions">

			<li><div id='basic-modal'>
					<a class="view basic" href="#" title="Voir d&eacute;tails">Voir</a>
				</div></a>
				<div id="basic-modal-content">
					<!--<h3>Basic Modal Dialog</h3>
					<p>For this demo, SimpleModal is using this "hidden" data for its content. You can also populate the modal dialog with an AJAX response, standard HTML or DOM element(s).</p>
					<p>Examples:</p>
					<p><code>$('#basicModalContent').modal(); // jQuery object - this demo</code></p>
					<p><code>$.modal(document.getElementById('basicModalContent')); // DOM</code></p>
					<p><code>$.modal('&lt;p&gt;&lt;b&gt;HTML&lt;/b&gt; elements&lt;/p&gt;'); // HTML</code></p>
					<p><code>$('&lt;div&gt;&lt;/div&gt;').load('page.html').modal(); // AJAX</code></p>

					<p><a href='http://www.ericmmartin.com/projects/simplemodal/'>More details...</a></p>
					<p> Contenu </p>
				</div>
			</li>
			<li><a class="delete" href="#" title="Supprimer"></a></li>
	  </ul>
	</td>-->
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