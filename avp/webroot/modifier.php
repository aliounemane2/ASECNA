<?php 
$ROOT_DIR = 'avp';
$id= $_GET["id_annonce"];

if(isset($_POST['modifier']))
{
    $NUMERO = $_POST["ANNONCE_NUM"];
    $TITRE = $_POST["ANNONCE_TITRE"];
    $DESCRIPTION= $_POST["ANNONCE_DESCRIPTION"];
    $LIEN = $_FILES['ANNONCE_LIEN']['name'];
    $DATE_DEB = $_POST["ANNONCE_DATE_DEB"];
    $DATE_FIN = $_POST["ANNONCE_DATE_FIN"];
    //$AGE1 = $_POST["ANNONCE_date_creation"];
    $AGE = $_POST["ANNONCE_AGE"];
    $DELAI_AGE = $_POST["ANNONCE_DELAI_AGE"];

    $r = mysql_query("SELECT ANNONCE_LIEN FROM annonce WHERE ANNONCE_ID = {$id}");
    $q = mysql_fetch_assoc($r);
    $cheminAnnonce = $q['ANNONCE_LIEN'];
    echo $cheminAnnonce.'<br>';
    if(!empty($_FILES['ANNONCE_LIEN']['name']))
    {
        if(file_exists($q['ANNONCE_LIEN'])){
            unlink($q['ANNONCE_LIEN']);
        }
        $cheminAnnonce = "annonce/" . basename( $_FILES['ANNONCE_LIEN']['name']);
        move_uploaded_file($_FILES['ANNONCE_LIEN']['tmp_name'], $cheminAnnonce);
    }
    $sql = 'UPDATE annonce SET
                ANNONCE_NUM = "'.$NUMERO.'",
                ANNONCE_TITRE = "'.$TITRE.'" ,
                ANNONCE_DESCRIPTION = "'.$DESCRIPTION.'",
                ANNONCE_DATE_DEB = "'.$DATE_DEB.'",
                ANNONCE_DATE_FIN = "'.$DATE_FIN.'",
                ANNONCE_AGE = '.$AGE.',
                ANNONCE_DELAI_AGE = "'.$DELAI_AGE.'",
                ANNONCE_LIEN = "'.$cheminAnnonce.'"
                where ANNONCE_ID = '.$id;
    echo $sql;
    $result = mysql_query($sql);
    // Si il ya une erreur on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
    if(!$result)
    {
    die ('Requete invalide:'.mysql_error());
    }else
    {
    echo '<p>la modification à été effectué avec succés.</p>';
    header('Location:index.php?url=afficheavp');
    }
	  }

 
//On sélectionne tout dans la table correspondant à l'id
$result = mysql_query("SELECT * FROM annonce where annonce_id =$id");

while($affiche_commentaire_data = mysql_fetch_array($result))
 {
// $t1=$affiche_commentaire['ANNONCE_LIEN'];
 
//$t2='<a href="http://localhost/'.$ROOT_DIR.'/'.$t1.'"></a>';
 
//$affiche_commentaire_data .= $affiche_commentaire["ANNONCE_NUM"]."-".$affiche_commentaire["ANNONCE_TITRE"]."-".$affiche_commentaire["ANNONCE_DESCRIPTION"]."-".$affiche_commentaire["ANNONCE_DATE_DEB"]."-".$affiche_commentaire["ANNONCE_DATE_FIN"]."-".$affiche_commentaire["ANNONCE_AGE"]."-".$affiche_commentaire["ANNONCE_DELAI_AGE"]."-".$affiche_commentaire['ANNONCE_LIEN']." ;<br/>";

 
 ?>
 

<article class="art-post art-article">
                                <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Mise à jour d'un avis de vacance de poste</a></h3>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
				
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p style="text-align: justify;">
		<span style="font-family: Arial;">  
		<b><h3><a href="index.php?url=annonce ">Ajouter une annonce</a></h3></b>
		
<!-- contenu à mettre  -->

 	
<form action="index.php?url=modifier&id_annonce=<?php echo $id;?>" method="POST" enctype="multipart/form-data" id="myformannonce" name="annonce">
			<fieldset>
				<table>
					<tr>
						<th>R&eacute;f&eacute;rence</th>
						<td><input name="ANNONCE_NUM" size="22" value="<?php echo $affiche_commentaire_data["ANNONCE_NUM"];?>" type="text"/></td>
					</tr>
				<tr>
					<th>Titre</th>
					<td><input name="ANNONCE_TITRE" size="22" value="<?php echo ''.$affiche_commentaire_data["ANNONCE_TITRE"].' ';?>" type="text"/></td>
				</tr>
				
				<tr>
					<th>Description</th>
					<td><textarea name="ANNONCE_DESCRIPTION" rows="5" cols="22"> <?php echo ' '.$affiche_commentaire_data["ANNONCE_DESCRIPTION"].' ';?></textarea></td>

				</tr>
				
				<tr>
					<th>Date de d&eacute;but</th>
					<td><input name="ANNONCE_DATE_DEB" size="22" value="<?php echo ''.$affiche_commentaire_data["ANNONCE_DATE_DEB"].' ';?>" class="datepicker"/></td>
				</tr>
                    
                 <tr>
					<th>Date de fin</th>
					<td><input name="ANNONCE_DATE_FIN" size="22" value="<?php echo $affiche_commentaire_data["ANNONCE_DATE_FIN"];?>" class="datepicker"/></td>
				</tr>
				
                <tr>
					<th>Age</th>
					<td><input name="ANNONCE_AGE" size="22" value="<?php echo ''.$affiche_commentaire_data["ANNONCE_AGE"].' ';?>" type="text"/></td>
					
				</tr>
				<tr>
					<th>Date d&eacute;lai age</th>
					<td><input name="ANNONCE_DELAI_AGE" size="22" value="<?php echo ''.$affiche_commentaire_data["ANNONCE_DELAI_AGE"].' ';?>" class="datepicker"/></td>
				</tr>
				
				<tr>
					<th>Modifier Lien</th> 
					<td><input name="ANNONCE_LIEN" id="ANNONCE_LIEN" size="22" type="file"/></td>
					<!--<td>
						<a id="modif_lien" href="#">Modifier</a>
						<input id="input_lien" type="file" name="ANNONCE_LIEN" />
					</td>-->
				</tr>
                
				
              </table>
			  
			 <input type="submit" name="modifier" value="modifier" style="margin-top:20px; margin-left: 110px;">
         
				
			  </fieldset>
			  
			     
            
</form>	
<?php
//On ferme la boucle while
 }
	
?>
<!-- fin contenu à mettre  -->


		</span>
	   </p>

    </div>
    </div>
</div>
</div>
</article>
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