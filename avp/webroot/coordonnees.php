<?php
echo $_SESSION["role"];
echo $_SESSION["id_user"];


if(isset($_SESSION["role"]))
{

$sql = "select * from CANDIDAT C, Famille F where C.FK_UTIL_ID ='".$_SESSION['id_user']."' and F.fk_candidat_id=c.candidat_id";
$result = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
$user = mysql_fetch_array($result);


$var=isset($_POST["envoyer"]);
$nom=isset($_POST["CANDIDAT_NOM"]) ? trim($_POST["CANDIDAT_NOM"]): "";
$prenom=isset($_POST["CANDIDAT_PRENOM"]) ? trim($_POST["CANDIDAT_PRENOM"]): "";
echo $var;
if($var <> ""){

$_POST["CANDIDAT_TYPE"]=mysql_escape_string($_POST["CANDIDAT_TYPE"]);	
$_POST["CANDIDAT_CIVILITE"]=mysql_escape_string($_POST["CANDIDAT_CIVILITE"]);		
$_POST["CANDIDAT_NOM"]=mysql_escape_string($_POST["CANDIDAT_NOM"]);
$_POST["CANDIDAT_PRENOM"]=mysql_escape_string($_POST["CANDIDAT_PRENOM"]);
$_POST["CANDIDAT_LOGIN"]=mysql_escape_string($_POST["CANDIDAT_LOGIN"]);
$_POST["CANDIDAT_MDP"]=mysql_escape_string($_POST["CANDIDAT_MDP"]);
$_POST["CANDIDAT_IS_ADMIN"]=mysql_escape_string($_POST["CANDIDAT_IS_ADMIN"]);
$_POST["CANDIDAT_MATRICULE"]=mysql_escape_string($_POST["CANDIDAT_MATRICULE"]);
$_POST["CANDIDAT_DATE_NAISSANCE"]=mysql_escape_string($_POST["CANDIDAT_DATE_NAISSANCE"]);
$_POST["CANDIDAT_LIEU_NAISSANCE"]=mysql_escape_string($_POST["CANDIDAT_LIEU_NAISSANCE"]);
$_POST["CANDIDAT_NATIONALITE"]=mysql_escape_string($_POST["CANDIDAT_NATIONALITE"]);
$_POST["CANDIDAT_SIT_MAT"]=mysql_escape_string($_POST["CANDIDAT_SIT_MAT"]);
$_POST["CANDIDAT_NBRE_ENF"]=mysql_escape_string($_POST["CANDIDAT_NBRE_ENF"]);
$_POST["CANDIDAT_SEXE"]=mysql_escape_string($_POST["CANDIDAT_SEXE"]);
$_POST["CANDIDAT_ADR_PERM"]=mysql_escape_string($_POST["CANDIDAT_ADR_PERM"]);
$_POST["CANDIDAT_ADR_ACT"]=mysql_escape_string($_POST["CANDIDAT_ADR_ACT"]);
$_POST["CANDIDAT_NUM_TEL"]=mysql_escape_string($_POST["CANDIDAT_NUM_TEL"]);
$_POST["CANDIDAT_NUM_GSM"]=mysql_escape_string($_POST["CANDIDAT_NUM_GSM"]);
$_POST["CANDIDAT_EMAIL"]=mysql_escape_string($_POST["CANDIDAT_EMAIL"]);
$_POST["CANDIDAT_PERMIS"]=mysql_escape_string($_POST["CANDIDAT_PERMIS"]);
$_POST["CANDIDAT_IS_FAMILLE"]=mysql_escape_string($_POST["CANDIDAT_IS_FAMILLE"]);
$_POST["CANDIDAT_MOTIV_POSTE"]=mysql_escape_string($_POST["CANDIDAT_MOTIV_POSTE"]);
$_POST["FAMILLE_NOM"]=mysql_escape_string($_POST["FAMILLE_NOM"]);
$_POST["FAMILLE_PRENOM"]=mysql_escape_string($_POST["FAMILLE_PRENOM"]);
$_POST["FAMILLE_STRUCTURE"]=mysql_escape_string($_POST["FAMILLE_STRUCTURE"]);
$_POST["FAMILLE_DEGRE"]=mysql_escape_string($_POST["FAMILLE_DEGRE"]);
$_POST["FORMATION_AN_DEB"]=mysql_escape_string($_POST["FORMATION_AN_DEB"]);
$_POST["FORMATION_AN_FIN"]=mysql_escape_string($_POST["FORMATION_AN_FIN"]);
$_POST["ETABLISSEMENT_NOM"]=mysql_escape_string($_POST["ETABLISSEMENT_NOM"]);
$_POST["FORMATION_LIEU"]=mysql_escape_string($_POST["FORMATION_LIEU"]);
$_POST["FORMATION_DIPLOME"]=mysql_escape_string($_POST["FORMATION_DIPLOME"]);
$_POST["FORMATION_DOM_PRINC_ETUD"]=mysql_escape_string($_POST["FORMATION_DOM_PRINC_ETUD"]);
$_POST["FORMATION_CYCLE"]=mysql_escape_string($_POST["FORMATION_CYCLE"]);
$_POST["FORMATION_DIPLOME_FICHIER"]=mysql_escape_string($_POST["FORMATION_DIPLOME_FICHIER"]);
$_POST["REAL_LIB"]=mysql_escape_string($_POST["REAL_LIB"]);
$_POST["FORMATION_AN_DEB"]=mysql_escape_string($_POST["FORMATION_AN_DEB"]);
$_POST["FORM_LIB"]=mysql_escape_string($_POST["FORM_LIB"]);
$_POST["FORM_NOM"]=mysql_escape_string($_POST["FORM_NOM"]);
$_POST["FORM_INTITULE"]=mysql_escape_string($_POST["FORM_INTITULE"]);
$_POST["AUTRE_FORMATION_DIPLOME_FICHIER"]=mysql_escape_string($_POST["AUTRE_FORMATION_DIPLOME_FICHIER"]);
$_POST["EXP_ENT_NOM"]=mysql_escape_string($_POST["EXP_ENT_NOM"]);
$_POST["EXP_SEC_ACT"]=mysql_escape_string($_POST["EXP_SEC_ACT"]);
$_POST["EXP_POSTE"]=mysql_escape_string($_POST["EXP_POSTE"]);
$_POST["EXP_DEBUT_TRAVAIL"]=mysql_escape_string($_POST["EXP_DEBUT_TRAVAIL"]);
$_POST["EXP_FIN_TRAVAIL"]=mysql_escape_string($_POST["EXP_FIN_TRAVAIL"]);
$_POST["EXP_SALAIRE"]=mysql_escape_string($_POST["EXP_SALAIRE"]);
$_POST["EXP_NBRE_PERS_SORD"]=mysql_escape_string($_POST["EXP_NBRE_PERS_SORD"]);
$_POST["EXP_TACHE"]=mysql_escape_string($_POST["EXP_TACHE"]);
$_POST["EXP_MOTIF_DEP"]=mysql_escape_string($_POST["EXP_MOTIF_DEP"]);
$_POST["LOGICIELS"]=mysql_escape_string($_POST["LOGICIELS"]);
$_POST["INFORMATIQUE_NIV"]=mysql_escape_string($_POST["INFORMATIQUE_NIV"]);
$_POST["LANGUE_NOM"]=mysql_escape_string($_POST["LANGUE_NOM"]);
$_POST["LANGUE_ORALE"]=mysql_escape_string($_POST["LANGUE_ORALE"]);
$_POST["LANGUE_ECRITE"]=mysql_escape_string($_POST["LANGUE_ECRITE"]);
$_POST["LANGUE_LECTURE"]=mysql_escape_string($_POST["LANGUE_LECTURE"]);
$_POST["LETTRE_MOTIVATION"]=mysql_escape_string($_POST["LETTRE_MOTIVATION"]);
$_POST["QUAL_LIB"]=mysql_escape_string($_POST["QUAL_LIB"]);
$_POST["REF_NOM_ENT"]=mysql_escape_string($_POST["REF_NOM_ENT"]);
$_POST["REF_PERS_CONT"]=mysql_escape_string($_POST["REF_PERS_CONT"]);
$_POST["REF_POST_OCC"]=mysql_escape_string($_POST["REF_POST_OCC"]);
$_POST["REF_TEL"]=mysql_escape_string($_POST["REF_TEL"]);
$_POST["REF_EMAIL"]=mysql_escape_string($_POST["REF_EMAIL"]);

$nom=isset($_POST["CANDIDAT_NOM"]) ? trim($_POST["CANDIDAT_NOM"]): "";
$prenom=isset($_POST["CANDIDAT_PRENOM"]) ? trim($_POST["CANDIDAT_PRENOM"]): "";
if (isset($_POST['CANDIDAT_PRENOM']) && isset($_POST['CANDIDAT_TYPE'])) {

		// lancement de la requête
		
		var_dump($_POST);
 // lancement de la requete
 $sql = 'UPDATE candidat set CANDIDAT_PRENOM = "'.$_POST["CANDIDAT_PRENOM"].'" 
                             
		WHERE FK_UTIL_ID = "'.$_SESSION["id_user"].'" ';

		// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on ferme la connexion à la base
		mysql_close();

		// un petit message permettant de se rendre compte de la modification effectuée
		echo 'La nouvelle adresse de '.$_SESSION["id_user"].'  est : '.$_POST[CANDIDAT_PRENOM];
}
else {
		echo 'Les variables du formulaire ne sont pas déclarées';
}
if (isset($_POST['FAMILLE_NOM']) && isset($_POST['FAMILLE_PRENOM'])) {
for($i=0; $i<sizeof($_POST["FAMILLE_NOM"]); $i++){	  
$sql= 'INSERT INTO famille VALUES ("",
"'.$_POST["FAMILLE_NOM"][$i].'",
"'.$_POST["FAMILLE_PRENOM"][$i].'",
"'.$_POST["FAMILLE_STRUCTURE"][$i].'",
"'.$_POST["FAMILLE_DEGRE"][$i].'",
"'.$numero_insere.'")';

// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
}


}
}
?>

<article class="art-post art-article">
                                <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Inscription</a></h3>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
				
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p style="text-align: justify;">
		<span style="font-family: Arial;">  
		
<!-- contenu à mettre  -->	
<form action="index.php?url=postuler&titre_annonce=<?php echo $_GET["titre_annonce"]; ?>&id_annonce=<?php echo $_GET["id_annonce"]; ?>&date_delai_annonce=<?php echo $_GET["date_delai_annonce"]; ?>" method="post" enctype="multipart/form-data" id="myform"  required name="formulaire">  
<tr class="fond4">
											<td valign=top colspan=2 class=txt background="images/pages/fond_zone_chapeau.gif" style="background-repeat:no-repeat;" width=579>
												<center>
													<table cellspacing=0 cellpadding=0 border=0 width=559>
														<tr>
														  <td valign=top><img src="images/home/pixel.gif" width=1 height=5></td>
														</tr>
														<tr>
														  <td valign=top colspan=2 class="titre1"><b>Candidature au poste de <?php  echo $_GET['titre_annonce']; ?> </b></td>
														</tr>
														
														 
														
														<tr>
															<td valign=top><img src="images/home/pixel.gif" width=1 height=5/></td>
														</tr>
													</table>
												</center>
											</td>
										</tr>
										<tr>
											<td valign=top><img src="images/home/pixel.gif" width=1 height=10></td>
										</tr>
										
										<tr> 
											<td>
												<a id="displayBlocCoordonnes" href="#">Coordonnees</a>
												<div style="border:solid;"id="monBlocCoordonnes">
													<!--  debut tableau Coordonnees personnelles -->
													<fieldset>
														<legend>1-Coordonnees personnelles</legend>
														<p>Indiquez ci-dessous vos coordonnées personnelles.</p>
														
														<table >
															<tr>
																<th><div align="right">Type <font color=red>*</font> : </div></th>
																<td><select  name="CANDIDAT_TYPE"> 
																  <option value="">S&eacute;lectionnez</option>
																  <OPTION value="<?php if($user['CANDIDAT_TYPE']=='Interne') echo $user['CANDIDAT_TYPE']; ?>" <?php if($user['CANDIDAT_TYPE']=='Interne') echo 'selected'; ?>  >Interne</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_TYPE']=='Externe') echo $user['CANDIDAT_TYPE']; ?>" <?php if($user['CANDIDAT_TYPE']=='Externe') echo 'selected'; ?>  >Externe</OPTION>
																  </select>
																</td>
															</tr>
															<tr>
															  <th><div align="right">Civilit&eacute; : </div></th>
															  <td><SELECT  name="CANDIDAT_CIVILITE" >  
																  <option value="">S&eacute;lectionnez</option>
																  <OPTION value="<?php if($user['CANDIDAT_CIVILITE']=='M.') echo $user['CANDIDAT_CIVILITE']; ?>" <?php if($user['CANDIDAT_CIVILITE']=='M.') echo 'selected'; ?>  >M.</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_CIVILITE']=='Mme') echo $user['CANDIDAT_CIVILITE']; ?>" <?php if($user['CANDIDAT_CIVILITE']=='Mme') echo 'selected'; ?>  >Mme</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_CIVILITE']=='Melle') echo $user['CANDIDAT_CIVILITE']; ?>" <?php if($user['CANDIDAT_CIVILITE']=='Melle') echo 'selected'; ?> >Melle</OPTION>
																  
																  												
																</SELECT>
																</td>
															</tr>
															<tr>
															  <th><div align="right">Nom <font color=red>*</font> : </div></th>
															  <td><input type="text" name="CANDIDAT_NOM" placeholder="" id="CANDIDAT_NOM"  maxlength="10" value="<?php echo $user['CANDIDAT_NOM']; ?>" disabled /></td>
															</tr>
															<tr>
															  <th><div align="right">Pr&eacute;nom <font color=red>*</font> : </div></th>
															  <td><INPUT type="text" name="CANDIDAT_PRENOM" placeholder="" id="CANDIDAT_PRENOM"  size="30" maxlength="10" value="<?php echo $user['CANDIDAT_PRENOM']; ?>" disabled /></td>
															</tr>
														
															<tr>
															  <th><div align="right">Num&eacute;ro matricule : </div></th>
															  <td><INPUT type="text" name="CANDIDAT_MATRICULE" placeholder="" size="30" maxlength="6" value="<?php echo $user['CANDIDAT_MATRICULE']; ?>"OnBlur="validite('formulaire','CANDIDAT_MATRICULE','N',6,6);"/></td>
															</tr>
															<tr>
															  <th><div align="right">Date de naissance <font color=red>*</font> : </div></th>
															  <td><INPUT type="text" name="CANDIDAT_DATE_NAISSANCE" class="datepicker" value="<?php echo $user['CANDIDAT_DATE_NAISSANCE']; ?>"/></td>
															</tr>
															<tr>
															  <th><div align="right">Lieu de naissance  : </div></th>
															  <td><INPUT type="text" name="CANDIDAT_LIEU_NAISSANCE" value="<?php echo $user['CANDIDAT_LIEU_NAISSANCE']; ?>" disabled /></td>
															</tr>
															<tr>
															  <th><div align="right">Nationalit&eacute; : </div></th>
															  <td><SELECT name="CANDIDAT_NATIONALITE"  disabled>
																  <option value="">S&eacute;lectionnez</option>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='BENINOISE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='BENINOISE') echo 'selected'; ?> >BENINOISE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='BISSAO-GUINEENNE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='BISSAO-GUINEENNE') echo 'selected'; ?> >BISSAO-GUINEENNE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='BURKINABE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='BURKINABE') echo 'selected'; ?> >BURKINABE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='CAMEROUNAISE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='CAMEROUNAISE') echo 'selected'; ?> >CAMEROUNAISE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='CENTRAFRICAINE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='CENTRAFRICAINE') echo 'selected'; ?> >CENTRAFRICAINE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='COMORIENNE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='COMORIENNE') echo 'selected'; ?> >COMORIENNE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='CONGOLAISE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='CONGOLAISE') echo 'selected'; ?> >CONGOLAISE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='EQUATO-GUINEENNE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='EQUATO-GUINEENNE') echo 'selected'; ?> >EQUATO-GUINEENNE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='FRANCAISE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='FRANCAISE') echo 'selected'; ?> >FRANCAISE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='GABONAISE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='GABONAISE') echo 'selected'; ?> >GABONAISE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='IVOIRIENNE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='IVOIRIENNE') echo 'selected'; ?> >IVOIRIENNE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='MALGACHE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='MALGACHE') echo 'selected'; ?> >MALGACHE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='MALIENNE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='MALIENNE') echo 'selected'; ?> >MALIENNE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='MAURITANIENNE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='MAURITANIENNE') echo 'selected'; ?> >MAURITANIENNE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='NIGERIENNE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='NIGERIENNE') echo 'selected'; ?> >NIGERIENNE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='SENEGALAISE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='SENEGALAISE') echo 'selected'; ?> >SENEGALAISE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='TCHADIENNE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='TCHADIENNE') echo 'selected'; ?> >TCHADIENNE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NATIONALITE']=='TOGOLAISE') echo $user['CANDIDAT_NATIONALITE']; ?>" <?php if($user['CANDIDAT_NATIONALITE']=='TOGOLAISE') echo 'selected'; ?> >TOGOLAISE</OPTION>
																  </SELECT></td>
															</tr>
															<tr>
															  <th><div align="right">Situation matrimoniale <font color=red>*</font> : </div></th>
															  <td><SELECT   name="CANDIDAT_SIT_MAT">
																  <option value="">S&eacute;lectionnez </option>
																  <OPTION value="<?php if($user['CANDIDAT_SIT_MAT']=='CELIBATAIRE') echo $user['CANDIDAT_SIT_MAT']; ?>" <?php if($user['CANDIDAT_SIT_MAT']=='CELIBATAIRE') echo 'selected'; ?> >CELIBATAIRE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_SIT_MAT']=='DIVORCE') echo $user['CANDIDAT_SIT_MAT']; ?>" <?php if($user['CANDIDAT_SIT_MAT']=='DIVORCE') echo 'selected'; ?> >DIVORCE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_SIT_MAT']=='MARIE') echo $user['CANDIDAT_SIT_MAT']; ?>" <?php if($user['CANDIDAT_SIT_MAT']=='MARIE') echo 'selected'; ?> >MARIE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_SIT_MAT']=='SEPARE') echo $user['CANDIDAT_SIT_MAT']; ?>" <?php if($user['CANDIDAT_SIT_MAT']=='SEPARE') echo 'selected'; ?> >SEPARE</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_SIT_MAT']=='VEUF') echo $user['CANDIDAT_SIT_MAT']; ?>" <?php if($user['CANDIDAT_SIT_MAT']=='VEUF') echo 'selected'; ?> >VEUF</OPTION>
																  </SELECT></td>
															</tr>
															<tr>
															  <th><div align="right">Nombre d'enfants &aacute; charge : </div></th>
															  <td><SELECT name="CANDIDAT_NBRE_ENF">
																  <option value="">S&eacute;lectionnez</option>
																  <OPTION value="<?php if($user['CANDIDAT_NBRE_ENF']==0) echo $user['CANDIDAT_NBRE_ENF']; ?>" <?php if($user['CANDIDAT_NBRE_ENF']==0) echo 'selected'; ?> >0</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NBRE_ENF']==1) echo $user['CANDIDAT_NBRE_ENF']; ?>" <?php if($user['CANDIDAT_NBRE_ENF']==0) echo 'selected'; ?> >1</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NBRE_ENF']==2) echo $user['CANDIDAT_NBRE_ENF']; ?>" <?php if($user['CANDIDAT_NBRE_ENF']==1) echo 'selected'; ?> >2</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NBRE_ENF']==3) echo $user['CANDIDAT_NBRE_ENF']; ?>" <?php if($user['CANDIDAT_NBRE_ENF']==3) echo 'selected'; ?> >3</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NBRE_ENF']==4) echo $user['CANDIDAT_NBRE_ENF']; ?>" <?php if($user['CANDIDAT_NBRE_ENF']==4) echo 'selected'; ?> >4</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NBRE_ENF']==5) echo $user['CANDIDAT_NBRE_ENF']; ?>" <?php if($user['CANDIDAT_NBRE_ENF']==5) echo 'selected'; ?> >5</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_NBRE_ENF']==6) echo $user['CANDIDAT_NBRE_ENF']; ?>" <?php if($user['CANDIDAT_NBRE_ENF']==6) echo 'selected'; ?> >6</OPTION>
																  </SELECT></td>
															</tr>
															<tr>
															  <th><div align="right">Sexe : </div></th>
															  <td><SELECT name="CANDIDAT_SEXE"  disabled>
																  <option value="">S&eacute;lectionnez</option>
																  <OPTION value="<?php if($user['CANDIDAT_SEXE']=='FEMNIN') echo $user['CANDIDAT_SEXE']; ?>" <?php if($user['CANDIDAT_SEXE']=='FEMININ') echo 'selected'; ?> >FEMININ</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_SEXE']=='MACULIN') echo $user['CANDIDAT_SEXE']; ?>" <?php if($user['CANDIDAT_SEXE']=='MASCULIN') echo 'selected'; ?> >MASCULIN</OPTION>
																 </SELECT></td>
															</tr>
															<tr>
															  <th><div align="right">Adresse habituelle <font color=red>*</font> : </div></th>
															  <td><textarea name="CANDIDAT_ADR_PERM" cols="30" rows="2" id="CANDIDAT_ADR_PERM" ><?php echo $user['CANDIDAT_ADR_PERM']; ?></textarea></td>
															</tr>
															<tr>
															  <th><div align="right">Adresse actuelle : </div></th>
															  <td><textarea name="CANDIDAT_ADR_ACT" cols="30" rows="2"><?php echo $user['CANDIDAT_ADR_ACT']; ?></textarea></td>
															</tr>
															<tr>
															  <th><div align="right">Num&eacute;ro de t&eacute;l&eacute;phone  : </div></th>
															  <td><INPUT type="text" name="CANDIDAT_NUM_TEL" placeholder="" value="<?php echo $user['CANDIDAT_NUM_TEL']; ?>" size="30" maxlength="10"/></td>
															</tr>
															<tr>
															  <th><div align="right">Num&eacute;ro de GSM : </div></th>
															  <td><INPUT type="text" name="CANDIDAT_NUM_GSM" placeholder="" value="<?php echo $user['CANDIDAT_NUM_GSM']; ?>" size="30" maxlength="10"/></td>
															</tr>
															<tr>
															  <th><div align="right">Permis de conduire B<font color=red>*</font> : </div></th>
															  <td><SELECT required="true" name="CANDIDAT_PERMIS">
																  <option value="">S&eacute;lectionnez</option>
																  <OPTION value="<?php if($user['CANDIDAT_PERMIS']=='Oui') echo $user['CANDIDAT_PERMIS']; ?>" <?php if($user['CANDIDAT_PERMIS']=='Oui') echo 'selected'; ?> >Oui</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_PERMIS']=='Non') echo $user['CANDIDAT_PERMIS']; ?>" <?php if($user['CANDIDAT_PERMIS']=='Non') echo 'selected'; ?> >Non</OPTION>
																  </SELECT></td>
															</tr>
															<tr>
															  <th><div align="right">Avez vous des parents &agrave; l'ASECNA <font color=red>*</font> : </div></th>
															  <td><SELECT  name="CANDIDAT_IS_FAMILLE">
																  <option value="">S&eacute;lectionnez</option>
																  <OPTION value="<?php if($user['CANDIDAT_IS_FAMILLE']=='Oui') echo $user['CANDIDAT_IS_FAMILLE']; ?>" <?php if($user['CANDIDAT_IS_FAMILLE']=='Oui') echo 'selected'; ?> >Oui</OPTION>
																  <OPTION value="<?php if($user['CANDIDAT_IS_FAMILLE']=='Non') echo $user['CANDIDAT_IS_FAMILLE']; ?>" <?php if($user['CANDIDAT_IS_FAMILLE']=='Non') echo 'selected'; ?> >Non</OPTION>
															</SELECT></td>
															</tr>
														</table>
														
														<p>Si affirmatif, veuillez saisir les informations sur les liens de parent&eacute;</p>
													</fieldset>
													<!--  fin tableau Coordonnees personnelles -->
													<div id="famille">
												  <div id="famille_template">
													<fieldset>
													<?php $i=0; while($user = mysql_fetch_array($famille)) { $i++; ?>
																<legend><b> <?php echo $i; ?>-Infos famille</b> </legend>
													  <table>
														<tr>
														  <th align="right">Nom :</th>
														  <td><input type="text" name="FAMILLE_NOM[]" placeholder="" value="<?php echo $user['FAMILLE_NOM']; ?>" size="30" maxlength="10" ></td>
														  <tr>
														  <th align="right">Pr&eacute;noms :</th>
														  <td><input type="text" name="FAMILLE_PRENOM[]" placeholder="" value="<?php echo $user['FAMILLE_PRENOM']; ?>" size="30" maxlength="10"></td>
														</tr>
														<tr>
														  <th align="right">Structure :</th>
														  <td><input type="text" name="FAMILLE_STRUCTURE[]" placeholder="" value="<?php echo $user['FAMILLE_STRUCTURE']; ?>" size="30" maxlength="10"></td>
														</tr>
														<tr>
														  <th align="right">Degr&eacute; :</th>
														  <td><input type="text" name="FAMILLE_DEGRE[]" placeholder="" value="<?php echo $user['FAMILLE_DEGRE']; ?>" size="30" maxlength="10"></td>
														</tr>
													  </table>
													  <?php } ?>
													</fieldset>
												  </div>
												  <div id="famille_noforms_template">Aucune information famille renseign&eacute;e</div>
												  <div id="famille_controls">
													<table>
													  <tr>
														<td><div id="famille_add"><a><span>Ajouter une autre famille<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
														<td><div id="famille_remove_last"><a><span>Supprimer une famille<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
													  </tr>
													</table>
												  </div>
												</div>
												</div>
											</td>
										</tr>
										<tr>
											<td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
										
										
										<tr>
											<td>
									  
												<a id="displayBlocInformatique" href="#">Connaissances Informatiques</a>
												<div style="border:solid;"id="monBlocInformatique">
													<div id="connaissancesInformatiques">
														<div id="connaissancesInformatiques_template">
															<fieldset>
															  <legend><?php echo "6.#index#"?>-Précisez ci-dessous vos connaissances pour: </legend>
															  <table>
																<tr>
																  <th align="right">Logiciels bureautique   : </th>
																  <td><SELECT name="LOGICIELS[]">
																	  <option value="">S&eacute;lectionnez</option>
																	  <OPTION value="<?php if($user['LOGICIELS']=='Traitement de texte') echo $user['LOGICIELS']; ?>" <?php if($user['LOGICIELS']=='Traitement de texte') echo 'selected'; ?>  >Traitement de texte</OPTION>
																      <OPTION value="<?php if($user['LOGICIELS']=='Tableur') echo $user['LOGICIELS']; ?>" <?php if($user['LOGICIELS']=='Tableur') echo 'selected'; ?>  >Tableur</OPTION>
																      <OPTION value="<?php if($user['LOGICIELS']=='Outils collaboratif') echo $user['LOGICIELS']; ?>" <?php if($user['LOGICIELS']=='Outils collaboratif') echo 'selected'; ?>  >Outils collaboratif</OPTION>
																      <OPTION value="<?php if($user['LOGICIELS']=='Outils de presentation') echo $user['LOGICIELS']; ?>" <?php if($user['LOGICIELS']=='Outils de presentation') echo 'selected'; ?>  >Outils de presentation</OPTION>
																      <OPTION value="<?php if($user['LOGICIELS']=='Messagerie') echo $user['LOGICIELS']; ?>" <?php if($user['LOGICIELS']=='Messagerie') echo 'selected'; ?>  >Messagerie</OPTION>
																      <OPTION value="<?php if($user['LOGICIELS']=='Base de donnees') echo $user['LOGICIELS']; ?>" <?php if($user['LOGICIELS']=='Base de donnees') echo 'selected'; ?>  >Base de donnees</OPTION>
																	  </SELECT></td>
																</tr>
																<tr>
																  <th align="right">Connaissance</th>
																  <td><SELECT name="INFORMATIQUE_NIV">
																	  <option value="">S&eacute;lectionnez</option>
																	  <OPTION value="<?php if($user['INFORMATIQUE_NIV']=='Base') echo $user['INFORMATIQUE_NIV']; ?>" <?php if($user['INFORMATIQUE_NIV']=='Base') echo 'selected'; ?>  >Base</OPTION>
																      <OPTION value="<?php if($user['INFORMATIQUE_NIV']=='Moyen') echo $user['INFORMATIQUE_NIV']; ?>" <?php if($user['INFORMATIQUE_NIV']=='Moyen') echo 'selected'; ?>  >Moyen</OPTION>
																      <OPTION value="<?php if($user['INFORMATIQUE_NIV']=='Avanc&eacute;e') echo $user['INFORMATIQUE_NIV']; ?>" <?php if($user['INFORMATIQUE_NIV']=='Avanc&eacute;e') echo 'selected'; ?>  >Avanc&eacute;e</OPTION>
																	  </SELECT></td>
																</tr>
																
																
															  </table>
															</fieldset>
														</div>
													  <div id="connaissancesInformatiques_noforms_template">Aucune connaissance informatique renseignee</div>
													  <div id="connaissancesInformatiques_controls">
														<table>
														  <tr>
															<td><div id="connaissancesInformatiques_add"><a><span>Ajouter une connaissance informatique<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
															<td><div id="connaissancesInformatiques_remove_last"><a><span>Supprimer une connaissance informatique<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
														  </tr>
														</table>
													  </div>
													</div>
													<div id="autreconInfo">
													  <div id="autreconInfo_template">
														<fieldset>
														  <legend><?php echo "7.#index#"?>-Précisez d'autres Connaissances Informatique</legend>
														  <span>Mentionnez éventuellement d'autres logiciels qui sont pertinents pour la fonction souhaitée.</span><br/>
														  &nbsp;&nbsp;
														  <table>
															<tr>
															  <th align="right">Outils   : </th>
															  <td><input type="text" name="LOGICIELS[]" placeholder="" value="<?php echo $user['LOGICIELS']; ?>" size="30" maxlength="10" ></td>
													              
															</tr>
															<tr>
															  <th align="right">Connaissance : </th>
															  <td><SELECT name="INFORMATIQUE_NIV">
																  <option value="">S&eacute;lectionnez</option>
																  <option value="">S&eacute;lectionnez</option>
																	  <OPTION value="<?php if($user['INFORMATIQUE_NIV']=='Base') echo $user['INFORMATIQUE_NIV']; ?>" <?php if($user['INFORMATIQUE_NIV']=='Base') echo 'selected'; ?>  >Base</OPTION>
																      <OPTION value="<?php if($user['INFORMATIQUE_NIV']=='Moyen') echo $user['INFORMATIQUE_NIV']; ?>" <?php if($user['INFORMATIQUE_NIV']=='Moyen') echo 'selected'; ?>  >Moyen</OPTION>
																      <OPTION value="<?php if($user['INFORMATIQUE_NIV']=='Avanc&eacute;e') echo $user['INFORMATIQUE_NIV']; ?>" <?php if($user['INFORMATIQUE_NIV']=='Avanc&eacute;e') echo 'selected'; ?>  >Avanc&eacute;e</OPTION>
																	  
																</SELECT></td>
															</tr>
														  </table>
														</fieldset>
													  </div>
													  <div id="autreconInfo_noforms_template">Aucune autre connaissance informatique renseignee</div>
													  <div id="autreconInfo_controls">
														<table>
														  <tr>
															<td><div id="autreconInfo_add"><a><span>Ajouter une autre connaissance informatique<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
															<td><div id="autreconInfo_remove_last"><a><span>Supprimer une autre connaissance informatique<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
														  </tr>
														</table>
													  </div>
													</div>
												</div>
											</td>
					  
										</tr>
										<tr>
											<td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
										<tr>
											<td>
											  
												<a id="displayBlocLangue" href="#">Connaissances Linguistiques</a>
												<div style="border:solid;"id="monBlocLangue">
												  
													<div id="conLinguistiques">
															<div id="conLinguistiques_template">
																<fieldset>
																	<legend><?php echo "8.#index#"?>- Indiquez dans quelle mesure vous maîtrisez les langues ci-dessous</legend>
																	<table>
																	  <tr>
																		<th align="right">Langue : </th>
																		<td><SELECT name="LANGUE_NOM[]">
																			<option value="">S&eacute;lectionnez</option>
																			<OPTION value="<?php if($user['LANGUE_NOM']=='Francais') echo $user['LANGUE_NOM']; ?>" <?php if($user['LANGUE_NOM']=='Francais') echo 'selected'; ?>  >Francais</OPTION>
																		    <OPTION value="<?php if($user['LANGUE_NOM']=='Anglais') echo $user['LANGUE_NOM']; ?>" <?php if($user['LANGUE_NOM']=='Anglais') echo 'selected'; ?>  >Anglais</OPTION>
																		
																			<OPTION VALUE="Francais">Francais</OPTION>
																			<OPTION VALUE="Anglais">Anglais</OPTION>
																		  </SELECT></td>
																	  </tr>
																	</table>
																	<table>
																	  <tr>
																		<th align="right">Expression orale : </th>
																		<td><SELECT name="LANGUE_ORALE[]">
																			<option value="">S&eacute;lectionnez</option>
																			<OPTION value="<?php if($user['LANGUE_ORALE']=='Base') echo $user['LANGUE_ORALE']; ?>" <?php if($user['LANGUE_ORALE']=='Base') echo 'selected'; ?>  >Base</OPTION>
																      <OPTION value="<?php if($user['LANGUE_ORALE']=='Moyen') echo $user['LANGUE_ORALE']; ?>" <?php if($user['LANGUE_ORALE']=='Moyen') echo 'selected'; ?>  >Moyen</OPTION>
																      <OPTION value="<?php if($user['LANGUE_ORALE']=='Avanc&eacute;e') echo $user['LANGUE_ORALE']; ?>" <?php if($user['LANGUE_ORALE']=='Avanc&eacute;e') echo 'selected'; ?>  >Avanc&eacute;e</OPTION>
																	  
																		  </SELECT></td>
																	  </tr>
																	  <tr>
																		<th align="right">Expression ecrite : </th>
																		<td><SELECT name="LANGUE_ECRITE[]">
																			<option value="">S&eacute;lectionnez</option>
																			<OPTION value="<?php if($user['LANGUE_ECRITE']=='Base') echo $user['LANGUE_ECRITE']; ?>" <?php if($user['LANGUE_ECRITE']=='Base') echo 'selected'; ?>  >Base</OPTION>
																      <OPTION value="<?php if($user['LANGUE_ECRITE']=='Moyen') echo $user['LANGUE_ECRITE']; ?>" <?php if($user['LANGUE_ECRITE']=='Moyen') echo 'selected'; ?>  >Moyen</OPTION>
																      <OPTION value="<?php if($user['LANGUE_ECRITE']=='Avanc&eacute;e') echo $user['LANGUE_ECRITE']; ?>" <?php if($user['LANGUE_ECRITE']=='Avanc&eacute;e') echo 'selected'; ?>  >Avanc&eacute;e</OPTION>
																	  
																		  </SELECT></td>
																	  </tr>
																	  <tr>
																		<th align="right">Lecture : </th>
																		<td><SELECT name="LANGUE_LECTURE[]">
																			<option value="">S&eacute;lectionnez</option>
																			<OPTION value="<?php if($user['LANGUE_LECTURE']=='Base') echo $user['LANGUE_LECTURE']; ?>" <?php if($user['LANGUE_LECTURE']=='Base') echo 'selected'; ?>  >Base</OPTION>
																      <OPTION value="<?php if($user['LANGUE_LECTURE']=='Moyen') echo $user['LANGUE_LECTURE']; ?>" <?php if($user['LANGUE_LECTURE']=='Moyen') echo 'selected'; ?>  >Moyen</OPTION>
																      <OPTION value="<?php if($user['LANGUE_LECTURE']=='Avanc&eacute;e') echo $user['LANGUE_LECTURE']; ?>" <?php if($user['LANGUE_LECTURE']=='Avanc&eacute;e') echo 'selected'; ?>  >Avanc&eacute;e</OPTION>
																	  
																		  </SELECT></td>
																	  </tr>
																	</table>
																</fieldset>
															</div>
															<div id="conLinguistiques_noforms_template">Aucune connaissance linguistique renseign&eacute;e</div>
															<div id="conLinguistiques_controls">
															  <table>
																<tr>
																  <td><div id="conLinguistiques_add"><a><span>Ajouter une langue<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
																  <td><div id="conLinguistiques_remove_last"><a><span>Supprimer une langue<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
																</tr>
															  </table>
															</div>
														</div>
														<div id="autreConLing">
															  
															  
															  
															  
																<div id="autreConLing_template">
																  
																	<fieldset>
																		<legend><?php echo "9.#index#"?> Quelle(s) autre(s) langue(s) maîtrisez-vous?</legend>
																		<span>commentez brièvement dans quelle mesure vous maîtrisez ces langues</span><br/>
																		<table>
																			<tr>
																			  <th align="right"><b>Langue : </b></th>
																			  <td><input type="text" name="LANGUE_NOM[]" placeholder="" value="<?php echo $user['LANGUE_NOM']; ?>" size="30" maxlength="10" ></td>
													        
																			</tr>
																		</table>
																		<table>
																		  <tr>
																			<th align="right">Expression orale : </th>
																			<td><SELECT name="LANGUE_ORALE[]">
																				<option value="">S&eacute;lectionnez</option>
																				<OPTION value="<?php if($user['LANGUE_ORALE']=='Base') echo $user['LANGUE_ORALE']; ?>" <?php if($user['LANGUE_ORALE']=='Base') echo 'selected'; ?>  >Base</OPTION>
																      <OPTION value="<?php if($user['LANGUE_ORALE']=='Moyen') echo $user['LANGUE_ORALE']; ?>" <?php if($user['LANGUE_ORALE']=='Moyen') echo 'selected'; ?>  >Moyen</OPTION>
																      <OPTION value="<?php if($user['LANGUE_ORALE']=='Avanc&eacute;e') echo $user['LANGUE_ORALE']; ?>" <?php if($user['LANGUE_ORALE']=='Avanc&eacute;e') echo 'selected'; ?>  >Avanc&eacute;e</OPTION>
																	  
																			  </SELECT></td>
																		  </tr>
																		  <tr>
																			<th align="right">Expression ecrite : </th>
																			<td><SELECT name="LANGUE_ECRITE[]">
																				<option value="">S&eacute;lectionnez</option>
																				<OPTION value="<?php if($user['LANGUE_ECRITE']=='Base') echo $user['LANGUE_ECRITE']; ?>" <?php if($user['LANGUE_ECRITE']=='Base') echo 'selected'; ?>  >Base</OPTION>
																      <OPTION value="<?php if($user['LANGUE_ECRITE']=='Moyen') echo $user['LANGUE_ECRITE']; ?>" <?php if($user['LANGUE_ECRITE']=='Moyen') echo 'selected'; ?>  >Moyen</OPTION>
																      <OPTION value="<?php if($user['LANGUE_ECRITE']=='Avanc&eacute;e') echo $user['LANGUE_ECRITE']; ?>" <?php if($user['LANGUE_ECRITE']=='Avanc&eacute;e') echo 'selected'; ?>  >Avanc&eacute;e</OPTION>
																	  
																			  </SELECT></td>
																		  </tr>
																		  <tr>
																			<th align="right">Lecture : </th>
																			<td><SELECT name="LANGUE_LECTURE[]">
																				<option value="">S&eacute;lectionnez</option>
																				<OPTION value="<?php if($user['LANGUE_LECTURE']=='Base') echo $user['LANGUE_LECTURE']; ?>" <?php if($user['LANGUE_LECTURE']=='Base') echo 'selected'; ?>  >Base</OPTION>
																      <OPTION value="<?php if($user['LANGUE_LECTURE']=='Moyen') echo $user['LANGUE_LECTURE']; ?>" <?php if($user['LANGUE_LECTURE']=='Moyen') echo 'selected'; ?>  >Moyen</OPTION>
																      <OPTION value="<?php if($user['LANGUE_LECTURE']=='Avanc&eacute;e') echo $user['LANGUE_LECTURE']; ?>" <?php if($user['LANGUE_LECTURE']=='Avanc&eacute;e') echo 'selected'; ?>  >Avanc&eacute;e</OPTION>
																	  
																			  </SELECT></td>
																		  </tr>
																		</table>
																	</fieldset>
																
																</div>
																
																<div id="autreConLing_noforms_template">Aucune autre connaissance linguistique renseignee</div>
																<div id="autreConLing_controls">
																  <table>
																	<tr>
																	  <td><div id="autreConLing_add"><a><span>Ajouter une autre connaissance linguistique<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
																	  <td><div id="autreConLing_remove_last"><a><span>Supprimer une autre connaissance linguistique<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
																	</tr>
																  </table>
																</div>
														</div>
												</div>
															
											</td>
													
										</tr>	
										<tr>
										  <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
										<tr>
										  <td><a id="displayBlocCompetence" href="#">Competences</a>
											<div style="border:solid;"id="monBlocCompetence">
											  <fieldset>
												<legend>10 - Competences</legend>
												<span>Saisissez vos competences</span> <br>
												<td><textarea name="COMP_LIB" cols="50" rows="5"><?php echo $user['COMP_LIB']; ?></textarea></td>
											  </fieldset>
											</div></td>
										</tr>
										<tr>
										  <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
										<tr>
										  <td><a id="displayBlocQualite" href="#">Qualites</a>
											<div style="border:solid;"id="monBlocQualite">
											  <fieldset>
												<legend>3- Qualit&eacute;s personnelles</legend>
												<br>
												<td><textarea name="QUAL_LIB" cols="50" rows="5"><?php echo $user['QUAL_LIB']; ?></textarea></td>
											  </fieldset>
											</div></td>
										</tr>
										<tr>
										  <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
										<tr>
										  <td><a id="displayBlocMotivation" href="#">Motivation</a>
											<div style="border:solid;"id="monBlocMotivation">
											  <fieldset>
												<legend>.Motivation<font color=red>*</font></legend>
												<p><b>1- Veuillez saisir votre motivation pour le poste </b></p>
												<td><textarea name="CANDIDAT_MOTIV_POSTE" cols="60" rows="6"><?php echo $user['CANDIDAT_MOTIV_POSTE']; ?></textarea></td>
												<p><b>11-Lettre de motivation </b></p>
												<td><textarea name="LETTRE_MOTIVATION" cols="60" rows="20"><?php echo $user['LETTRE_MOTIVATION']; ?></textarea></td>
												
											  </fieldset>
											</div></td>
										</tr>
										<tr>
										  <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
										<tr>
											<td>
												<a id="displayBlocReference" href="#">R&eacute;f&eacute;rences</a>
												<div style="border:solid;"id="monBlocReference">
												  <div id="reference">
													<div id="reference_template">
													  <fieldset>
														<legend><?php echo "12.#index#"?>-R&eacute;f&eacute;rences</legend>
														<table>
														  <tr>Veuillez donner le nom et les coordonn&eacute;es de trois personnes n'ayant avec vous aucun lien de parent&eacute; et connaissant vos aptitudes professionnelles et vos qualit&eacute;s personnelles. </tr>
														  <tr>
															<th align="right">Nom Entreprise : </th>
															
															  <td><input type="text" name="REF_NOM_ENT[]" placeholder="" value="<?php echo $user['REF_NOM_ENT']; ?>" size="30" maxlength="10" ></td>
													        
														  </tr>
														  <tr>
															<th align="right">Nom de la personne &agrave; contacter : </th>
															<td><input type="text" name="REF_PERS_CONT[]" placeholder="" value="<?php echo $user['REF_PERS_CONT']; ?>" size="30" maxlength="10" ></td>
													        
														  </tr>
														  <tr>
															<th align="right">Poste occup&eacute; : </th>
															<td><input type="text" name="REF_POST_OCC[]" placeholder="" value="<?php echo $user['REF_POST_OCC']; ?>" size="30" maxlength="10" ></td>
													        
														  </tr>
														  <tr>
															<th align="right">T&eacute;l&eacute;phone : </th>
															<td><input type="text" name="REF_TEL[]" placeholder="" value="<?php echo $user['REF_TEL']; ?>" size="30" maxlength="10" ></td>
													        
														  </tr>
														  <tr>
															<th align="right">Email : </th>
															<td><input type="text" name="REF_EMAIL[]" placeholder="" value="<?php echo $user['REF_EMAIL']; ?>" size="30" maxlength="10" ></td>
													        
														  </tr>
														</table>
													  </fieldset>
													</div>
													<div id="reference_noforms_template">Aucune autre r&eacute;f&eacute;rence renseign&eacute;e</div>
													<div id="reference_controls">
													  <table>
														<tr>
														  <td><div id="reference_add"><a><span>Ajouter une autre r&eacute;f&eacute;rence<img class="delete" src="images/ajouter.png" width="16" height="16" border="0" /></span></a></div></td>
														  <td><div id="reference_remove_last"><a><span>Supprimer une autre r&eacute;f&eacute;rence<img class="delete" src="images/bouton_supprimer.png" width="16" height="16" border="0" /></span></a></div></td>
														</tr>
													  </table>
													</div>
												  </div>
												</div>
												
											</td>
										</tr>					
										<tr>
										  <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
										<tr>
										  <td><a id="displayBlocPiece" href="#">P&egrave;ces jointes</a>
											<div style="border:solid;"id="monBlocPiece">
											  <fieldset>
												<legend>13. P&egrave;ces jointes</legend>
												<table>
												  <tr>
													<th align="right">Demande d'emploi <font color=red>*</font> : </th>
													<td><input type="file" value="photo" name="CANDIDAT_DEMANDE_EMPLOI"></td>
												  </tr>
												  <tr>
													<th align="right">CV <font color=red>*</font> : </th>
													<td><input type="file" value="photo" name="CANDIDAT_CV"></td>
												  </tr>
												  <tr>
													<th align="right">Certificat du dernier emploi <font color=red>*</font> : </th>
													<td><input type="file" value="photo" name="CANDIDAT_CERTIFICAT_TRAVAIL"></td>
												  </tr>
												  <tr>
													<th align="right">Photo <font color=red>*</font> : </th>
													<td><input type="file" value="photo" name="CANDIDAT_PHOTO"></td>
												  </tr>
												  <tr>
													<th align="right">Extrait de l'acte de naissance <font color=red>*</font> : </th>
													<td><input type="file" value="acte_naissance" name="CANDIDAT_ACTE_NAISS"></td>
												  </tr>
												  <tr>
													<th align="right">Livret de famille ou Fiche Famille <font color=red>*</font> : </th>
													<td><input type="file" value="fiche_famille" name="CANDIDAT_FICHE_FAMILLE"></td>
												  </tr>
												  <tr>
													<th align="right">Certificat de nationalit&eacute;<font color=red>*</font> : </th>
													<td><input type="file" value="certif_nat" name="CANDIDAT_CERTIF_NAT"></td>
												  </tr>
												  <tr>
													<th align="right">Certificat de domicile <font color=red>*</font> : </th>
													<td><input type="file" value="certificat_domicile" name="CANDIDAT_CERTIF_DOMICILE"></td>
												  </tr>
												  <tr>
													<th align="right">Certificat m&eacute;dical <font color=red>*</font> : </th>
													<td><input type="file" value="certificat_medical" name="CANDIDAT_CERTIF_MEDICAL"></td>
												  </tr>
												  <tr>
													<th align="right">Casier judiciaire <font color=red>*</font> : </th>
													<td><input type="file" value="casier_judiciaire" name="CANDIDAT_CASIER_JUDICIAIRE"></td>
												  </tr>
												</table>
											  </fieldset>
											</div></td>
										</tr>
										<tr>
										  <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
										<tr>
										  <td valign=top><img src="images/home/pixel.gif" width=1 height=25></td>
										</tr>
										<tr align="center">
										
										  <td><p align="justify">Je certifie que les déclarations faites par moi en réponse aux questions ci-dessus sont, dans toute la mesure où je puis en être certain, vraies, complètes et exactes. Je prends note du fait que toute déclaration inexacte ou omission importante dans une notice personnelle ou toute autre pièce requise par l'ASECNA constitue, soit un rejet de la candidature, soit un motif de licenciement sans préavis ni indemnité si cela est décelé après l'engagement. </p>
											<input type="submit" name="envoyer" value="Envoyer"></td>
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
<?php
}else{
header("Location:index.php?url=index"); 
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