<?php

    @session_start();
    require_once($_SESSION['AVP_CONFIG']);
	
	
if($_SESSION)
{
	if((time() - $_SESSION['lastaccess'] )> 180) 
	{
		 $ObjCl=new Utilitaires_class();
		 $ObjCl->destroy_session();
		 
	}

}
   
  
    $obj_annonce= new Annonce_class();
  
  
 
  //echo $obj_annonce->GetCh_ANNONCE_NUM();
 
 $joker="disable";
 
if(@isset($_POST["joker"])){ $joker=@$_POST["joker"]; }

if(@$joker=="disable")
{
// Numero de page (1 par d�faut)
    if(isset($_GET['page']) && is_numeric($_GET['page']))
        $page = $_GET['page'];
    else
        $page = 1;

// Nombre d'infos par page
$pagination = 2;
// Num�ro du 1er enregistrement � lire
$limit_start = ($page - 1) * $pagination;

// Pr�paration de la requ�te

  if((isset($_SESSION['id_user'])) && (!empty($_SESSION['id_user']))) 
  {
	  if($_SESSION['role'] == 1) 
	  {
		  $liste_annonce=$obj_annonce->lister_annonce_pagine($limit_start,$pagination);
		  $nb_total=$obj_annonce->count_annonce();
	  }
	  else 
	  {
		   $liste_annonce=$obj_annonce->lister_annonce_admin($_SESSION['id_user']);
		   $nb_total=$obj_annonce->count_annonce_admin($_SESSION['id_user']);
		
	  }
  }
  else
  {
		  $liste_annonce=$obj_annonce->lister_annonce_pagine1($limit_start,$pagination);
		  $nb_total=$obj_annonce->count_annonce2();
  }

       

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
					
					 $text_pag='<ul class="pagination pagination-sm" style="margin:20px;">';
					 $text_pag.='<li class="disabled"><a href="#">&laquo;</a></li>';
						
						$nb_pages = ceil($nb_total / $pagination);
					
						for($i = 1 ; $i <= $nb_pages ; $i++) 
						{
							if ($i==$page )
							{
						      $text_pag.='<li class="active"><a href="#">'.$i.'</a></li>';
							}
							else
							{
							   $text_pag.='<li><a href="index.php?url=pvacants&page='.$i.'">'.$i.'</a></li>';
							}
					    }
					
					$text_pag.='<li><a href="#">&raquo;</a></li></ul>';
					echo $text_pag;
					
					?>

<?php

//$resultat = mysql_query($sql) or die(mysql_error());


 if(isset($_SESSION['id_user']))
 {

        $query='select FK_UTIL_ID from postulation where FK_UTIL_ID='.$_SESSION['id_user'];
        $result=  mysql_query($query) or die(mysql_error());
        if(mysql_num_rows($result)>0)
        $user_post= mysql_num_rows($result);
     // $user_post= mysql_num_rows($result);
  }
    else $user_post=0;
//if ($da['nb_total'] != '0'):

/*
while( $data = mysql_fetch_assoc($resultat) ) 
{
*/
foreach($liste_annonce as $data)
{
?>

        <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
        <?php unset($_SESSION['message']); ?>
        <br/>&gt;

		<b><u>Référence</u> : </b><?php echo $data[$obj_annonce->GetCh_ANNONCE_NUM()]; ?></b><br/>
		<b><u>Poste</u> : </b><?php echo $data[$obj_annonce->GetCh_ANNONCE_TITRE()]; ?></b><br/>
		<b><u>Description</u> : </b><?php echo $data[$obj_annonce->GetCh_ANNONCE_DESCRIPTION()]; ?></b><br/>
		<b><u>Poste à pourvoir le</u> : </b><?php echo $data['date_debut'] ?></b><br/>
		<b><u>Date limite de réception des candidatures</u> : </b><?php echo $data['date_fin'] ?></b><br/>
		<b><u>Age requis</u> : <?php echo $data[$obj_annonce->GetCh_ANNONCE_AGE()] ?>  ans </b> au  <b><?php echo $data['delai'] ?></b><br/>

		<?php if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])) && $_SESSION['role'] == 1) : ?>
				<a href="index.php?url=listeavp&id_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_ID()]; ?>" class="navhaut"><b>Voir les avps </b></a>
		<?php else : ?>
				<a href="<?php echo $data[$obj_annonce->GetCh_ANNONCE_LIEN()]; ?>"><b> &gt; En savoir plus </b></a>
				<?php if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])) && $_SESSION['role'] == 0 ) : ?>
                    <?php if(!empty($_SESSION['id_user'])):?>
                        <?php if($user_post>0): ?>
					       |<a href="index.php?url=new10&id_ref=<?php echo $data[$obj_annonce->GetCh_ANNONCE_NUM()]; ?>&titre_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_TITRE()]; ?>&id_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_ID()];?>&date_delai_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_DELAI_AGE()]; ?>" &gt;<b> Postuler </b></a>
                        <?php else:?>
                            | <a href="index.php?url=formulaire&id_ref=<?php echo $data[$obj_annonce->GetCh_ANNONCE_NUM()];?>&titre_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_TITRE()];?>&id_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_ID()]; ?>&date_delai_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_DELAI_AGE()]; ?>" class="navhaut"><b> Postuler </b></a>
                        <?php endif;//if pour voir si l'utilisateur a une fois postulé'?>
                <?php endif;//If pour tester si le user est conecté?>
		<?php endif ?>
	   <?php endif ?>
		<br>
		<hr>

<?php 
}
?>

<?php //endif; ?>




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

<?php
}
?>

<!--  source pour faire la rechere  -->
 <?php

 if(isset($_POST["rechercher"]) && $joker=="enable")
 {
     // Numero de page (1 par d�faut)
	 
     if( isset($_GET['page']) && is_numeric($_GET['page']) )
         $page = $_GET['page'];
     else
         $page = 1;

// Nombre d'infos par page
     $pagination = 5;
// Num�ro du 1er enregistrement � lire
     $limit_start = ($page - 1) * $pagination;

         $secteur=$_POST["SECTEUR"];
	 
	     $liste_annonce=$obj_annonce->lister_annonce_pagine2($secteur,$limit_start,$pagination);
	     $nb_total=$obj_annonce->count_annonce2();

    /* 
	 $sql = "SELECT *, date_format(ANNONCE_DATE_DEB , '%d/%m/%Y') as date_debut, date_format(ANNONCE_DATE_FIN, '%d/%m/%Y') as date_fin, date_format(ANNONCE_DELAI_AGE, '%d/%m/%Y') as delai FROM annonce  WHERE ANNONCE_DATE_FIN >= CURRENT_DATE  AND SECTEUR='$secteur'  order by ANNONCE_DATE_CREATION DESC LIMIT $limit_start, $pagination";

     $nb_total = mysql_query('SELECT COUNT(*) AS nb_total FROM annonce WHERE ANNONCE_DATE_FIN >= CURRENT_DATE');
     $nb_total = mysql_fetch_array($nb_total);
     $nb_total = $nb_total['nb_total'];
	 
	 */

 ?>
     <article class="art-post art-article">
         <h3 class="art-postheader"> <a href="" >Accueil</a>  &gt; <a href="index.php?url=ressources">Recherche </a> &gt; <a href="#">Postes vacants</a></h3>

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


            if(isset($_SESSION['id_user']))
            {

                $query='select FK_UTIL_ID from postulation where FK_UTIL_ID='.$_SESSION['id_user'];
				
                $result=  mysql_query($query) or die(mysql_error());
                if(mysql_num_rows($result)>0)
                {
                    $user_post= mysql_num_rows($result);
                    $mess="";
                }
                else
                {
                    $mess="Pas de données retournées";
                }
                // $user_post= mysql_num_rows($result);
				
            }
            else $user_post=0;
            //if ($da['nb_total'] != '0'):


           /* while( $data = mysql_fetch_assoc($resultat) ) 
			{
         */
		 foreach($liste_annonce as $data)
		 {
             ?>

                <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); ?>
                <br/>&gt;

                <b><u>Référence</u> : </b><?php echo $data[$obj_annonce->GetCh_ANNONCE_NUM()]; ?></b><br/>
                        <b><u>Poste</u> : </b><?php echo $data[$obj_annonce->GetCh_ANNONCE_TITRE()]; ?></b><br/>
                        <b><u>Description</u> : </b><?php echo $data[$obj_annonce->GetCh_ANNONCE_DESCRIPTION()]; ?></b><br/>
                        <b><u>Poste à pourvoir le</u> : </b><?php echo $data['date_debut'] ?></b><br/>
                        <b><u>Date limite de réception des candidatures</u> : </b><?php echo $data['date_fin'] ?></b><br/>
                        <b><u>Age requis</u> : <?php echo $data[$obj_annonce->GetCh_ANNONCE_AGE()] ;?>  ans </b> au  <b><?php echo $data['delai'] ?></b><br/>

                <?php if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])) && $_SESSION['role'] == 1) : ?>
                        <a href="index.php?url=listeavp&id_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_ID()];?>" class="navhaut"><b>Voir les avps </b></a>
                    <?php else : ?>
                        <a href="<?php echo $data[$obj_annonce->GetCh_ANNONCE_LIEN()];?>"><b> &gt; En savoir plus </b></a>
                        <?php if ((isset($_SESSION['login'])) && (!empty($_SESSION['login'])) && $_SESSION['role'] == 0 ) : ?>
                            <?php if(!empty($_SESSION['id_user'])):?>
                                <?php if($user_post>0): ?>
                                    |<a href="index.php?url=new10&id_ref=<?php echo $data[$obj_annonce->GetCh_ANNONCE_NUM()];?>&titre_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_TITRE()];?>&id_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_ID()]; ?>&date_delai_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_DELAI_AGE()]; ?>" &gt;<b> Postuler </b></a>
                                <?php else:?>
                                    | <a href="index.php?url=formulaire&id_ref=<?php echo $data[$obj_annonce->GetCh_ANNONCE_NUM()] ;?>&titre_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_TITRE()];?>&id_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_ID()]; ?>&date_delai_annonce=<?php echo $data[$obj_annonce->GetCh_ANNONCE_DELAI_AGE()]; ?>" class="navhaut"><b> Postuler </b></a>
                                <?php endif;//if pour voir si l'utilisateur a une fois postulé'?>
                            <?php endif;//If pour tester si le user est conecté?>
                        <?php endif ?>
                    <?php endif ?>
                <br>
                <hr>

            <?php 
			}
			
		    ?>

            <?php //endif; ?>


            <?php // Pagination
           $nb_pages = ceil($nb_total / $pagination);
            echo '<p style="text-align: right";>[ Page :';
            // Boucle sur les pages
            for ($i = 1 ; $i <= $nb_pages ; $i++)
            {
                if($i == $page )
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

 <?php
 }
 ?>
 <!-- fin bloc recherche -->