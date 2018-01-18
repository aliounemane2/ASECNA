<?php 
@session_start();
require_once("_Init_file.php");

if(isset($_SESSION['message'])) echo $_SESSION['message']; ?><br>

<article class="art-post art-article">
    <h3 class="art-postheader"> <a href="" >Accueil</a> > <a href="index.php?url=ressources">Ressources Humaines </a> ><a href="#">Politique de ressources humaines</a></h3>

    <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell layout-item-0" style="width: 100%" >
                    <p style="text-align: justify;">
		<span style="font-family: Arial;">
<!-- contenu à mettre  -->
            <style type="text/css">
                ul.dash {
                    list-style: none;
                    margin-left: 0;
                    padding-left: 1em;
                }
                ul.dash > li:before {
                    display: inline-block;
                    content: "";
                    }
                h4.article-A {
                    color: #b9121b;
                }
            </style>
<!-- Script pour afficher et cacher les textes du titre  -->
            <script type="text/javascript" language="JavaScript"><!--
                
				function HideContent(d) 
				{
                    dcument.getElementById(d).style.display = "none";
                }
                function ShowContent(d) 
				{
                    document.getElementById(d).style.display = "block";
                }
				
                function ReverseDisplay(d) 
				{
                    if(document.getElementById(d).style.display == "none") 
					{
					 document.getElementById(d).style.display = "block"; 
					}
                    else 
					{ 
					  document.getElementById(d).style.display = "none";
					}
					
                }
                //--></script>
				
<p class="index_paragraphe"><h3><b>Bonjour et Bienvenue dans l’espace « Recrutement »  de l’Asecna.</b></h3></p>
<p>Cet espace vous est dédié pour postuler aux « Avis de Vacances de Poste » (AVP) que nous vous proposons.</p>

<p>L’Asecna, de par son prestige et sa notoriété, étant l’un des plus gros employeurs de la place, attire un vivier non négligeable de candidats pour servir plus de 600 métiers recensés en son sein. Cette diversité, forte de notre objectif toujours croissant de performance, impose une sélection minutieuse  et pointue de ses recrues.</p>

<p>Nous attachons  de ce fait énormément d’importance à la qualité de notre recrutement, cette exigence se matérialise avant tout par la qualité des candidatures. Fort de cela, nous accordons une attention particulière aux éléments que vous nous fournirez et eux seuls détermineront la suite du processus de recrutement.</p>

<p>La sélection se faisant selon des critères objectifs, Nous vous encourageons vivement à lire les recommandations ci-après avant de débuter votre dépôt de candidature.</p>

<!-- j'appelle cette element lire-->
                    <!--<p><a href="javascript:ReverseDisplay('lire')">
<input type="button" value="Comment répondre à une annonce?" name="" class="art-button button-color" />
                    </a></p>
<div id="lire" style="display:none;">
<p >  L’importance d’une lecture attentive de l’Avis de Vacance de Poste (AVP) vous garantira la certitude que votre profil est en total adéquation avec les exigences du poste (compétences spécifiques,nombre d’années d’expérience, niveau de diplôme, âge, nationalité). Ces prérequis étant TOUS indispensable à la prise en compte de votre candidature, le manquement de l’un d’eux, sera décisif pour le non-examen de votre profil.</p>
</div>-->
<!-- j'appelle cette element prepare-->
                    <p><a href="javascript:ReverseDisplay('prepare')">
                    <input type="button" value="Liste des documents à fournir sous forme électronique." name="" class="art-button button-color" />
                    </a></p>
<div id="prepare" style="display:none;">
<p>  Les documents demandés sont indispensables pour valider la candidature à un AVP.
Veuillez au préalable vous assurer que vous disposez sous format électronique des pièces dans l'un des formats suivants: JPEG,PNG,PDF</p>
<p>   <b><cite>Pour les candidatures externes</cite></b>: </p>
                    <ul class="dash">
                        <li>- CV</li>
                        <li>- Demande d’emploi</li>
                        <li>- Photo</li>
                        <li>- Pièce d’identité</li>
                        <li>- Extrait d’acte de naissance</li>
                        <li>- Diplômes</li>
                        <li>- Attestations d’emploi</li>
                        <li>- Livret de famille ou Fiche Famille</li>
                        <li>- Certificat de nationalité</li>
                        <li>- Certificat de domicile</li>
                        <li>- Certificat médical</li>
                        <li>- Casier judiciaire</li>
                        </ul>
<p><b><cite>Pour les candidatures internes</cite></b> :</p>
                    <ul class="dash">
                        <li>- CV</li>
                        <li>- Demande d’emploi </li>
                        <li>- Photo</li>
                     </ul>
</div>
 <!-- j'appelle cette element postuler-->
                    <p><a href="javascript:ReverseDisplay('postuler')">
<input type="button" value="Comment postuler ?" name="" class="art-button button-color" />
                    </a></p>
<div id="postuler" style="display:none;">
                         <p>L’importance d’une lecture attentive de l’Avis de Vacance de Poste (AVP) vous garantira la certitude que votre profil est en total adéquation avec les exigences du poste (compétences spécifiques,nombre d’années d’expérience, niveau de diplôme, âge, nationalité). Ces prérequis étant TOUS indispensable à la prise en compte de votre candidature, le manquement de l’un d’eux, sera décisif pour le non-examen de votre profil.</p>
                         <p><h3><b>Vous souhaitez déposer une candidature </b>:</h3></p>
                         <p><h4 class="article-A"><b>A. Vous n'êtes pas encore enregistré</b></h4></p>
                         <p><h4><b>vous souhaitez postuler à un avis de vacance de poste :</b></h4></p>
    <p>
                        <ol>
                        <li>Cliquez sur  "Créer votre compte" , vous afficherez  alors notre page de création de "compte candidat" avec un formulaire à remplir avec vos informations.</li>
                        <li>Vous recevrez ensuite un email de confirmation sur votre adresse mail. </li>
                        <li>Cliquez sur le lien pour valider votre inscription et vous aurez ensuite accès à votre "compte candidat".</li>
                        <li>Cliquez sur "RECRUTEMENT" ensuite sur  "Postes vacants" , vous afficherez alors notre page de vacance de poste.</li>
                        <li>Vous pouvez consulter un avis de vacance de poste qui vous intéresse en cliquant  sur "En savoir plus".</li>
                        <li>Cliquez sur  "Postuler" pour déposer votre candidature en remplissant le formulaire.</li>
                        <li>A la fin du formulaire Cliquez sur "soumettre" pour valider votre candidature.</li>
                        </ol>
    </p>
                        <hr/>
                        <p> <h3><b>B. Vous êtes  déjà enregistré</b></h3>
                        <h4 class="article-A"><b>vous souhaitez postuler à un avis de vacance de poste:</b></h4>
                        <ol>
                        <li>N'oubliez pas de vous connecter vous devrez renseigner vote "login" et votre "mot de passe".</li>
                        <li>Cliquez sur "RECRUTEMENT" ensuite sur  "Postes vacants", vous afficherez alors notre page de vacance de poste.</li>
                        <li>Vous pouvez consulter un avis de vacance de poste qui vous intéresse en cliquant  sur "En savoir plus" .</li>
                        <li>Cliquez sur  "Postuler" pour déposer votre candidature en remplissant le formulaire.</li>
                        <li>A la fin du formulaire Cliquez sur "soumettre" pour valider votre candidature .</li>
                        </ol>
                        </p>
</div>
<!-- fin contenu à mettre  -->

		</span>
                    </p>

                </div>
            </div>
        </div>
    </div>
</article>





