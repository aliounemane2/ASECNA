<?php
function age($annee_naissance, $mois_naissance, $jour_naissance, $timestamp =0) {

	if(empty($timestamp))
		$timestamp = time();
	//On evalue l'age, à un an par exces
	$age = date('Y',$timestamp) - $annee_naissance;
 
	//On retire un an si l'anniversaire n'est pas encore passé
	if($mois_naissance > date('n', $timestamp) || ( $mois_naissance== date('n', $timestamp) && $jour_naissance > date('j', $timestamp)))
		$age--;
 
	return $age;
}

?>
<?php
echo $_SESSION["role"];
echo $_SESSION["id_user"];

	/*if(isset($_SESSION["login"] )) echo '<p  align="center" style="border:5px solid;margin-left: 400px;padding:1px;background-color:#000080; color:#FFFFFF; id="connected_as"><font color="#FFFFFF"> Bienvenue <br> <span>'.$_SESSION["login"].'</span></font></p>';*/

if(isset($_SESSION["role"]))
{

$sql = "SELECT *, date_format(ANNONCE_DATE_DEB , '%d/%m/%Y') as date_debut, date_format(ANNONCE_DATE_FIN, '%d/%m/%Y') as date_fin, date_format(ANNONCE_DELAI_AGE, '%d/%m/%Y') as delai
FROM candidat c, annonce a
WHERE C.FK_UTIL_ID ='".$_SESSION['id_user']."' 
AND a.annonce_id =".$_GET['id_annonce']."";
$test=$_SESSION['id_user'];
$test1="".$_GET['id_annonce']."";


$resultat = mysql_query($sql);
// Traitement et affichage des données

$data = mysql_fetch_assoc($resultat);



$var=isset($_POST["envoyer"]);
$nom=isset($_POST["CANDIDAT_NOM"]) ? trim($_POST["CANDIDAT_NOM"]): "";
$prenom=isset($_POST["CANDIDAT_PRENOM"]) ? trim($_POST["CANDIDAT_PRENOM"]): "";
echo $var;
if($var <> ""){


//$_POST["LETTRE_MOTIVATION"]=mysql_escape_string($_POST["LETTRE_MOTIVATION"]);
//$_POST["MOTIV_POSTE"]=mysql_escape_string($_POST["MOTIV_POSTE"]);
//$_POST["FK_ANNONCE_ID"]=mysql_escape_string($_POST["FK_ANNONCE_ID"]);


$nom=isset($_POST["CANDIDAT_NOM"]) ? trim($_POST["CANDIDAT_NOM"]): "";
$prenom=isset($_POST["CANDIDAT_PRENOM"]) ? trim($_POST["CANDIDAT_PRENOM"]): "";

if($_POST["LETTRE_MOTIVATION"]!='')
	{
		$sql= 'INSERT INTO lettre_motivation VALUES ("",
		"'.$_POST["LETTRE_MOTIVATION"].'",
		"'.$data['CANDIDAT_ID'].'",		
		"'.$data['ANNONCE_ID'].'")';
		// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	}
/********INSERTION DANS LA TABLE POSTULATION********/
//$agenaissance = str_replace('."-."' ,'."-."',"'.$_POST["CANDIDAT_DATE_NAISSANCE"].'"); echo $agenaissance; 
$annonce = mysql_query('SELECT * FROM annonce where ANNONCE_ID = '.$_GET["id_annonce"]);
$annonce = mysql_fetch_array($annonce);

$agenaissance = str_replace('-',',',$data['CANDIDAT_DATE_NAISSANCE']); 
$annonce_age = $annonce['ANNONCE_DELAI_AGE'];
$annonce_age = date("m/d/Y ", strtotime($annonce_age));
$agecandidat = age(date('Y',strtotime($data['CANDIDAT_DATE_NAISSANCE'])),date('m',strtotime($data['CANDIDAT_DATE_NAISSANCE'])), date('d',strtotime($data['CANDIDAT_DATE_NAISSANCE'])), strtotime ($annonce_age)); 
 
$sql = 'INSERT INTO postulation VALUES ("", NOW(),"'.$test.'", "'.$agecandidat.'" , "'.$_GET["id_annonce"].'")';
// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 




header('Location:index.php?url=index');

}
}
?>

<article class="art-post art-article">
                                <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Postuler</a></h3>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
				
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p style="text-align: justify;">
		<span style="font-family: Arial;">  
		
<!-- contenu à mettre  -->	
<form action="index.php?url=new10&titre_annonce=<?php echo $_GET["titre_annonce"]; ?>&id_annonce=<?php echo $_GET["id_annonce"]; ?>&date_delai_annonce=<?php echo $_GET["date_delai_annonce"]; ?>" method="post" enctype="multipart/form-data" id="SignupForm"  required name="formulaire">
<tr class="fond4">
											<td valign=top colspan=2 class=txt background="images/pages/fond_zone_chapeau.gif" style="background-repeat:no-repeat;" width=579>
												<center>
													<table cellspacing=0 cellpadding=0 border=0 width=559>
														<tr>
														  <td valign=top><img src="images/home/pixel.gif" width=1 height=5></td>
														</tr>
														<tr>
														  <td valign=top colspan=2 class="titre1"><b>Candidature au poste de <?php  echo $_GET['titre_annonce']; ?> </b>
														  </td>
														  </tr>
														 <tr>
														  <td>
														  <b><br/>
															Référence : <b><?php echo $data['ANNONCE_NUM'] ?><br/>
															Poste : <b><?php echo $data['ANNONCE_TITRE'] ?><br/>
															Description : <b><?php echo $data['ANNONCE_DESCRIPTION'] ?><br/>
															Poste à pourvoir le : <b><?php echo $data['date_fin'] ?><br/>
															Date limite de réception des candidatures : <b><?php echo $data['date_debut'] ?><br/>
															Age requis : <b><?php echo $data['ANNONCE_AGE'] ?>  ans  au  <b><?php echo $data['delai'] ?><br/> 
														  </td>
														</tr>
														<tr>
										  <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
										<tr>
										  <td>
											<div>
											  <fieldset>
												<legend>Lettre de motivation <font color=red>*</legend>
												<textarea name="LETTRE_MOTIVATION" rows="20" cols="60"  placeholder="Saisissez vottre lettre de  motivation pour le poste" id="LETTRE_MOTIVATION" required size="30" maxlength="500"></textarea>
											  </fieldset>
											</div>
											</td>
										</tr>
														
										<tr align="center">
										
										  <td><p align="justify">Je certifie que les déclarations faites par moi en réponse aux questions ci-dessus sont, dans toute la mesure où je puis en être certain, vraies, complètes et exactes. Je prends note du fait que toute déclaration inexacte ou omission importante dans une notice personnelle ou toute autre pièce requise par l'ASECNA constitue, soit un rejet de la candidature, soit un motif de licenciement sans préavis ni indemnité si cela est décelé après l'engagement. </p>
											<input type="submit" name="envoyer" value="Envoyer" style=" width:80px;margin-top:20px; margin-left: 200px;"></td>
										</tr>
										<tr>
										  <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
								</table>
						</td>
			
			</table>
	
	<div id="sheepItForm"></div>
	<div id="reference"><div id="reference_template"></div>
           
</form>
<script type="application/javascript" src="js/messages_fr.js"></script>
<script type="application/javascript" src="js/jquery.validate.min.js"></script>
<script type="application/javascript" src="js/additional-methods.js"></script>
<script type="application/javascript" src="js/formulaire.js"></script>
<!--?php
}else{
header("Location:index.php?url=index"); 
}

?-->

<!-- fin contenu à mettre  -->


		</span>
	   </p>

    </div>
    </div>
</div>
</div>
</article>