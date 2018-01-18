 <?php 

// Numero de page (1 par d�faut)
if( isset($_GET['page']) && is_numeric($_GET['page']) )
    $page = $_GET['page'];
else
    $page = 1;

// Nombre d'infos par page
$pagination = 5;
// Num�ro du 1er enregistrement � lire
$limit_start = ($page - 1) * $pagination;

// Pr�paration de la requ�te
if ((isset($_SESSION['id_user'])) && (!empty($_SESSION['id_user']))) : 
$sql = "SELECT * , date_format(avis_date_deb , '%d/%m/%Y') as date_debut, date_format(avis_date_fin, '%d/%m/%Y') as date_fin
		FROM avis a WHERE a.avis_ID NOT IN ( SELECT p.FK_avis_id FROM postulation p WHERE p.FK_util_id =".$_SESSION['id_user'].")
		AND avis_date_fin >= CURRENT_DATE"; 
else:					
$sql = "SELECT * , date_format(avis_date_deb , '%d/%m/%Y') as date_debut, date_format(avis_date_fin, '%d/%m/%Y') as date_fin
		FROM avis 
		order by avis_date_creation DESC LIMIT $limit_start, $pagination";
endif; 


/*$sql = "SELECT * FROM avis a WHERE a.avis_ID NOT IN ( SELECT p.FK_avis_id FROM postulation p 
															WHERE p.FK_candidat_id =".$_SESSION['id_user'].""; 

*/


$nb_total = mysql_query('SELECT COUNT(*) AS nb_total FROM avis');
$nb_total = mysql_fetch_array($nb_total);
$nb_total = $nb_total['nb_total'];
?>
 
 <article class="art-post art-article">
                                <h3 class="art-postheader"> <a href="" >Accueil</a>  &gt; <a href="index.php?url=ressources">Ressources Humaines </a> &gt; <a href="#">Postes vacants</a></h3>
                <div class="art-postcontent art-postcontent-0 clearfix">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p style="text-align: justify;">
		<span style="font-family: Arial;">  
		
<!-- contenu à mettre  -->	
				<?php // Pagination
$nb_pages = ceil($nb_total / $pagination);
 
echo '<p style="text-align: right";>[ Page :';
// Boucle sur les pages
for ($i = 1 ; $i <= $nb_pages ; $i++) {
    if ($i == $page )
        echo " $i";
    else
        echo " <a href=\"?page=$i\">$i</a> ";
}
echo ' ]</p>';
?>

<?php 
$resultat = mysql_query($sql) or die(mysql_error());
 if(isset($_SESSION['id_user'])){
        $query='select FK_util_id from postulation where FK_util_id='.$_SESSION['id_user'];
$result=  mysql_query($query) or die(mysql_error());
if(mysql_num_rows($result)>0)
 $user_post= mysql_num_rows($result);
    $user_post= mysql_num_rows($result);
  }
    else $user_post=0;
while ( $data = mysql_fetch_assoc($resultat) ) {
?>
			avis_id,
avis_etablissement,
avis_cycle,
avis_num,
avis_titre,
avis_description,
avis_lien,
avis_date_deb,
avis_date_fin,
avis_date_creation,
avis_age, 
avis_delai_age


 
					 <br/>&gt;<b> <?php echo $data['avis_titre'] ?></b><br/>
					<b>Ref </b>: <?php echo $data['avis_num'] ?><br/>
					<?php echo $data['avis_description'] ?><br/>
					- Poste à pourvoir le <b><?php echo $data['date_findebut'] ?></b><br/>
					- Date limite de réception des candidatures le <b><?php echo $data['date_'] ?></b><br/>
					<?php if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])) && $_SESSION['role'] == 2) : ?>
							<a href="index.php?url=listeavp&id_avis=<?php echo $data['avis_id']?>" class="navhaut"><b>Voir les avps </b></a>
					<?php else : ?>
						
							<a href="<?php echo $data['avis_lien']?>"><b> &gt; En savoir plus </b></a> 
							<?php if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])) && $_SESSION['role'] == 0 ) : ?>
                                                                <?php if(!empty($_SESSION['id_user'])):?>
                                                                    <?php if($user_post>0): ?>
															|<a href="index.php?url=new10&id_ref=<?php echo $data['avis_NUM']?>&titre_avis=<?php echo $data['avis_titre']?>&id_avis=<?php echo $data['avis_id'] ?>&date_delai_avis=<?php echo $data['avis_delai_age'] ?>" &gt;<b> Postuler </b></a>
                                                                    <?php else:?>
                                                               | <a href="index.php?url=formulaire&id_ref=<?php echo $data['avis_NUM']?>&titre_avis=<?php echo $data['avis_titre']?>&id_avis=<?php echo $data['avis_id'] ?>&date_delai_avis=<?php echo $data['avis_delai_age'] ?>" class="navhaut"><b> Postuler </b></a>
                                                                <?php endif;//if pour voir si l'utilisateur a une fois postulé'?>
                                                        <?php endif;//If pour tester si le user est conecté?>
					<?php endif ?>
					<?php endif ?>
					<br>
							
<?php   
}  
?>	




<?php // Pagination
$nb_pages = ceil($nb_total / $pagination);
echo '<p style="text-align: right";>[ Page :';
// Boucle sur les pages
for ($i = 1 ; $i <= $nb_pages ; $i++) {
    if ($i == $page )
        echo " $i";
    else
        echo " <a href=\"?page=$i\">$i</a> ";
}
echo ' ]</p>';
?>
	


<!-- fin contenu à mettre  -->


		</span>
	   </p>

    </div>
    </div>
</div>
</div>
</article>