<?php 
$testa=$_GET['id_annonce'];
//echo $testa;


if( isset($_GET['page']) && is_numeric($_GET['page']) )
    $page = $_GET['page'];
else
    $page = 1;

// Nombre d'infos par page
$pagination = 5;
// Numéro du 1er enregistrement à lire
$limit_start = ($page - 1) * $pagination;
 
// Préparation de la requête
/*$sql = "select * 
from candidat c, formation f, competences co, postulation p
where c.candidat_id = f.fk_candidat_id
and c.candidat_id = co.fk_candidat_id
and c.candidat_id = p.fk_candidat_id
";*/

$sql = "SELECT *
FROM candidat c, postulation p, annonce a
WHERE p.fk_util_id = c.fk_util_id
AND p.fk_annonce_id = a.annonce_id AND p.fk_annonce_id =".$_GET['id_annonce']."";

//compteur nbre candidat par poste

$exereq = mysql_query("SELECT COUNT(FK_annonce_id) AS nb_cand FROM postulation where FK_annonce_id =$testa");
$nb_cand = mysql_fetch_array($exereq);
$nb_cand = $nb_cand['nb_cand'];
?>


<article class="art-post art-article" style="margin-top: 2px;">
                                <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Liste des postulants</a></h3>
                                                
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
    &nbsp;&nbsp;
        <tr>
            <th>Matricule</th>
            <th>Civilite</th>
            <th>Nom</th>
			<th>Pr&eacute;nom</th>
			<th>Age</th>
			<th width="25%">Date postulation</th>
            <th width="5%">Exporté</th>

			<!--<th width="5%">Actions</th-->
        </tr> 
    </thead> 
    <tbody> 
       <?php 
// Requête SQL
$resultat = mysql_query($sql);
// Traitement et affichage des données

while ( $data = mysql_fetch_assoc($resultat) ) {
?><tr>
    <td><?php echo $data['CANDIDAT_MATRICULE']?></td>
    <td><?php echo $data['CANDIDAT_CIVILITE']?></td>
	<td><?php echo $data['CANDIDAT_NOM']?></td>
	<td><?php echo $data['CANDIDAT_PRENOM']?></td>
	<td><?php echo $data['postulation_age_candidat']?></td>
	<td><?php echo $data['postulation_date']?></td>
    <td><input type="checkbox" name="id_export[]" id="id_export" value="<?php echo $data['FK_UTIL_ID']; ?>" ></td>
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
        <br/><br/>
        <style type="text/css" width:80px heigth:30px></style>;


        <center><a  id="lien_export" href="index.php?url=synthese&id_annonce=<?php echo $_GET['id_annonce']?> ">EXporter au format Excel</a></center>


		
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