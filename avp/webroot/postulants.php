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
$sql = "SELECT * , date_format(ANNONCE_DATE_DEB , '%d/%m/%Y') as date_debut, date_format(ANNONCE_DATE_FIN, '%d/%m/%Y') as date_fin,date_format(ANNONCE_DELAI_AGE, '%d/%m/%Y') as delai
		FROM annonce a WHERE a.ANNONCE_ID NOT IN ( SELECT p.FK_annonce_id FROM postulation p WHERE p.FK_UTIL_ID =".$_SESSION['id_user'].")
		AND ANNONCE_DATE_FIN >= CURRENT_DATE"; 
else:					
$sql = "SELECT * , date_format(ANNONCE_DATE_DEB , '%d/%m/%Y') as date_debut, date_format(ANNONCE_DATE_FIN, '%d/%m/%Y') as date_fin, date_format(ANNONCE_DELAI_AGE, '%d/%m/%Y') as delai
		FROM annonce 
		order by ANNONCE_DATE_CREATION DESC LIMIT $limit_start, $pagination";
endif; 


/*$sql = "SELECT * FROM annonce a WHERE a.ANNONCE_ID NOT IN ( SELECT p.FK_annonce_id FROM postulation p 
															WHERE p.FK_UTIL_ID =".$_SESSION['id_user'].""; 

*/


$nb_total = mysql_query('SELECT COUNT(*) AS nb_total FROM annonce');
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
        echo " <a href=\"?url=pvacants&page=$i\">$i</a> ";
}
echo ' ]</p>';
?>

<?php 
$resultat = mysql_query($sql) or die(mysql_error());
 if(isset($_SESSION['id_user'])){
        $query='select FK_UTIL_ID from postulation where FK_UTIL_ID='.$_SESSION['id_user'];
$result=  mysql_query($query) or die(mysql_error());
if(mysql_num_rows($result)>0)
 $user_post= mysql_num_rows($result);
    $user_post= mysql_num_rows($result);
  }
    else $user_post=0;
while ( $data = mysql_fetch_assoc($resultat) ) {
?>
            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
            <?php unset($_SESSION['message']); ?>
			
					 <br/>&gt;

					    <b><u>Référence</u> : </b><?php echo $data['ANNONCE_NUM'] ?></b><br/>
                        <b><u>Poste</u> : </b><?php echo $data['ANNONCE_TITRE'] ?></b><br/>
                        <b><u>Description</u> : </b><?php echo $data['ANNONCE_DESCRIPTION'] ?></b><br/>
                        <b><u>Poste à pourvoir le</u> : </b><?php echo $data['date_fin'] ?></b><br/>
                        <b><u>Date limite de réception des candidatures</u> : </b><?php echo $data['date_debut'] ?></b><br/>
                        <b><u>Age requis</u> : <?php echo $data['ANNONCE_AGE'] ?>  ans </b> au  <b><?php echo $data['delai'] ?></b><br/>

					<?php if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])) && $_SESSION['role'] == 1) : ?>
                            <a href="index.php?url=listePostulants&id_annonce=<?php echo $data['ANNONCE_ID']?>" class="navhaut"><b>Liste des candidats </b></a>
					<?php else : ?>
						
							<a href="<?php echo $data['ANNONCE_LIEN']?>"><b> &gt; En savoir plus </b></a> 
							<?php if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])) && $_SESSION['role'] == 0 ) : ?>
                                                                <?php if(!empty($_SESSION['id_user'])):?>
                                                                    <?php if($user_post>0): ?>
															|<a href="index.php?url=new10&id_ref=<?php echo $data['ANNONCE_NUM']?>&titre_annonce=<?php echo $data['ANNONCE_TITRE']?>&id_annonce=<?php echo $data['ANNONCE_ID'] ?>&date_delai_annonce=<?php echo $data['ANNONCE_DELAI_AGE'] ?>" &gt;<b> Postuler </b></a>
                                                                    <?php else:?>
                                                               | <a href="index.php?url=formulaire&id_ref=<?php echo $data['ANNONCE_NUM']?>&titre_annonce=<?php echo $data['ANNONCE_TITRE']?>&id_annonce=<?php echo $data['ANNONCE_ID'] ?>&date_delai_annonce=<?php echo $data['ANNONCE_DELAI_AGE'] ?>" class="navhaut"><b> Postuler </b></a>
                                                                <?php endif;//if pour voir si l'utilisateur a une fois postulé'?>
                                                        <?php endif;//If pour tester si le user est conecté?>
					<?php endif ?>
					<?php endif ?>
					<br>
					<hr>
							
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
        echo " <a href=\"?url=pvacants&page=$i\">$i</a> ";
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