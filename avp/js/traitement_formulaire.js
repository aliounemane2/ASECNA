// JavaScript Document



$(document).ready(function() 
 {
  	     
	    
		 $('#CANDIDAT_DATE_NAISSANCE').datepicker({
                   format: "dd-mm-yyyy",
				   language: "fr-FR"
					
                    }); 
	    $('#EXP_DEBUT_TRAVAIL').datepicker({
			format: "dd-mm-yyyy",
			language: "fr-FR"
		});  
	     $('#EXP_FIN_TRAVAIL').datepicker({
			format: "dd-mm-yyyy",
			language: "fr-FR"
		});
		

			$('#ANNONCE_DATE_FIN').datepicker({
				format: "dd-mm-yyyy",
				language: "fr-FR"
			});
			
			  $('#ANNONCE_DATE_DEB').datepicker({
				format: "dd-mm-yyyy",
				language: "fr-FR"
			});
			$('#ANNONCE_DELAI_AGE').datepicker({
					format: "dd-mm-yyyy",
					language: "fr-FR"
				});
          			
				      
	  //*******************************************************************************//
	    $('#example').DataTable({ 
		
					"language": 
					{
						"sProcessing":     "Traitement en cours...",
						"sSearch":         "Rechercher&nbsp;:",
						"sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
						"sInfo":           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
						"sInfoEmpty":      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
						"sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
						"sInfoPostFix":    "",
						"sLoadingRecords": "Chargement en cours...",
						"sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
						"sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
						
						"oPaginate": 
						{
							"sFirst":      "Premier",
							"sPrevious":   "Pr&eacute;c&eacute;dent",
							"sNext":       "Suivant",
							"sLast":       "Dernier"
						},
						
						"oAria": 
						{
							"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
							"sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
						}
			
				   }
			 
			 
		});
		
		
		//*****************datatable *******************************// 
			 
			 
		
	//******************** formulaire informatique ********************************//
	
	         $('#example1').DataTable({ "language": {
				"sProcessing":     "Traitement en cours...",
				"sSearch":         "Rechercher&nbsp;:",
				"sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
				"sInfo":           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
				"sInfoEmpty":      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
				"sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
				"sInfoPostFix":    "",
				"sLoadingRecords": "Chargement en cours...",
				"sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
				"sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
				"oPaginate": {
					"sFirst":      "Premier",
					"sPrevious":   "Pr&eacute;c&eacute;dent",
					"sNext":       "Suivant",
					"sLast":       "Dernier"
				},
				"oAria": {
					"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
					"sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
				}
			}});
		
	//******************************************************************//
	
			$("#bloc_a_cacher").hide();
		    $("#bloc_hide").hide();
			$("#bloc_hide").remove();
		    $("#ft_gt").remove();
	
	       var choix_fam=$('#CANDIDAT_IS_FAMILLE').val();
		   if(choix_fam=="Oui")
		   {
					$("#bloc_a_cacher").show();
					var cont2=$('#div_btn_enreg').html(); 		
					$('#div_btn_enreg').remove(); 
					$($('<div id="div_btn_enreg">'+cont2+'</div>')).insertAfter('#bloc_a_cacher');
			        return true;
		   }
		   else
		   {
			    $("#bloc_a_cacher").hide();
			    var cont2=$('#div_btn_enreg').html(); 	
				$('#div_btn_enreg').remove(); 
				$($('<div id="div_btn_enreg">'+cont2+'</div>')).insertAfter('#div_is_fam');
			    return  true;
		   }
		   
		       var choix_type=$('#CANDIDAT_TYPE').val();
	
			   if(choix_type=="")
			   {
				   $("#bloc_hide").hide();
				   return  true;
			   }
			   if(choix_type!="" && choix_type=="Interne" )
			   {
				  $("#bloc_hide").show();
				  return true;
			   }
			   else if(choix_type=="" || choix_type=="Externe")
			   {
				  $("#bloc_hide").hide();
				  return  true;
			   }	
		
		
		
		
		
		
	//***********************formulaire coordonnee personnelles *************************//
	
	
				
	
	//*********************** formulaire formation ************************************//
	
		 function test_annee()
		 {
			var ann1=$('#FORMATION_AN_DEB').val();
			var ann2=$('#FORMATION_AN_FIN').val();
	
			if(ann1>ann2)
			{
				alert('Annee debut de formation doit etre inferieure a Annee fin de formation');
				return false;
			}
		}
		
   //****************** formulaire linguistique *********************//
               
			    function validate_mail()
				{
				   var email = $("#REF_EMAIL").val();
				  
					  if(validateEmail(email)) 
					  {
						return true;
					  } 
					  else
					  {
						alert("Mail invalide");
						return false;
					  }
				  
				}

 //**************************************************************************//
	
	
	 

        function remove_err_mess()
        {
            var email = $('#EMAIL').val();

            if (email=="")
            {
                $("#mess_id").remove();
            }

        }

   

 function champ_vide_text(chaine,nom_champ) 
 {
	if(document.getElementById(chaine).value=="")
	{
	 	var mess= "Veuillez renseigner le champ "+nom_champ+">> SVP ";
        document.getElementById(chaine).focus();
		
		document.getElementById(chaine).style.borderColor='#FF866A';
		document.getElementById(chaine).style.borderWidth='2px';
		
		return false;
	}
	else
	{
		document.getElementById(chaine).style.backgroundColor ='#FFF';
		return true;
	}
	
}

 function correct_mail(mailteste)
 {
		  var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

		  return(reg.test(mailteste));
 }

	    function check_post()
		{
		    if( $('#val_requis').val()=="ko" )
		    {
			 alert("Vueillez renseigner le(s) etapes qui restent"); 
			 return false; 
		    }
		}
		
		function check_post1()
		{
			var nbre_case1=0;
			
			$("input[type=checkbox]:checked").each(function()
			{
			   nbre_case1++;
			   
			});
		
		    if(nbre_case1<3)
		    {
			 alert("Vueillez renseigner le(s) etapes qui restent"); 
			 return false; 
		    }
		  
	
		}
		
		
		 function test_annee()
		 {
			var ann1=$('#FORMATION_AN_DEB').val();
			var ann2=$('#FORMATION_AN_FIN').val();
	
			if(ann1>ann2)
			{
				$('<span style="color:red;font-weight:bold;">Annee debut de formation doit etre inferieure a Annee fin de formation</span>').insertAfter("#FORMATION_AN_FIN");
				return false;
			}
		}    
	
	//***************** fonctions detraitement ***********************************//
	
	
	
	
	
	
	
	
	// Fonction de blocage de la saisie si elle n'est pas conforme
function bloque(formulaire,champ) {
// Creation d'un raccourci pour manipuler le champ
	var controle = eval('document.' + formulaire + '.' + champ);

// On se place sur le champ incrimine
	controle.focus();

// On selectionne le contenu pour faciliter la reprise de la saisie
	controle.select();
	}


// Fonction de controle des champs vides

// Debut du message qui sera affiche en cas d'un ou plusieurs champ(s) vide(s)
var mess = "Les champs suivants sont necessaires au traitement de votre demande :\n";

// Copie pour reinitialisation
var mess_init = "Les champs suivants sont necessaires au traitement de votre demande :\n";

// Variable marquant l'erreur (0 : tout va bien, 1 : blocage demande)
var necessaire = 0;

function vide(formulaire,champ,alerte) {

// Creation d'un raccourci pour manipuler le champ a tester
	var controle = eval('document.' + formulaire + '.' + champ);

// Si c'est un champ 'text'
	if ( controle.type == 'text' ) {

// Et que la valeur du champ comporte moins de 1 caractere (vide)
		if ( controle.value.length < 1 ) {

// On ajoute l'intitule du champ dans le message d'erreur
			mess += alerte;
			mess += "\n";

// On marque qu'il ne faut pas valider le formulaire
			necessaire = 1;
			}
		}

// Si c'est un champ de type mot de passe
	if ( controle.type == 'password' ) {
		if ( controle.value.length < 1 ) {
			mess += alerte;
			mess += "\n";
			necessaire = 1;
			}
		}

// Si c'est un champ de type texte multilignes
	if ( controle.type == 'textarea' ) {
		if ( controle.value.length < 1 ) {
			mess += alerte;
			mess += "\n";
			necessaire = 1;
			}
		}

// Si c'est une liste
	if ( controle.type == 'select-one' ) {

// Si c'est le premier element qui est selectionne (element vide a indiquer dans le HTML)
		if ( controle.options[0].selected ) {
			mess += alerte;
			mess += "\n";
			necessaire = 1;
			}
		}

// Si c'est une case a cocher
	if ( controle.type == 'checkbox' ) {

// Quand elle est cochee, l'etat est 'true', ici on cherche l'inverse (false)
		if (!controle.status) {
			mess += alerte;
			mess += "\n";
			necessaire = 1;
			}
		}
	}

// Fonction pour le test des boutons radio
function vide_radio(formulaire,champ,alerte) {

// Creation d'un raccourci pour manipuler le champ a tester
	var controle = eval('document.' + formulaire + '.' + champ);

// On declare par defaut que les champs ne sont pas coches,
	var non = "hs";
	for ( i = 0; i < controle.length; i++ ) {

// Si on trouve un bouton coche, on le marque
		if (controle[i].status) {
			non = "ok";
			}
		}

// Si on n'a pas marque un champ comme 'coche' (ok)
	if ( non != "ok" ) {
		mess += alerte;
		mess += "\n";
		necessaire = 1;
		}
	}


// Fonction de validation du formulaire
function resultat(formulaire) {

// Si on a marque qu'au moins un champ etait vide
	if ( necessaire == 1 ) {

// Affichage du message d'erreur avec tous les champs en erreur
		alert(mess);
		}

// Si aucun champ n'est vide
	if ( necessaire == 0 ) {
		var formu = eval('document.' + formulaire);

// Validation du formulaire
		formu.submit();
		}

// Quoi qu'il arrive, on re-initialise le message d'erreur pour permettre un autre passage des tests
	mess = mess_init;
	necessaire = 0;
	}


// Fonction de controle de validite de la saisie
// Creation d'une variable pour marquer s'il y a incoherence de saisie ou pas
var probleme = 0;

/*function validite(formulaire,champ,format,mini,maxi) {

// Initialisation de la variable
	probleme = 0;

// Les differents tests possibles :
// On affecte a la variable 'RE' le test d'expression reguliere souhaite
//	A	: alphabetique
	if ( format == "A" ) { RE = /^([A-Za-z]+[ ]*[-]*[A-Za-z]*)+$/;}

//	AN	: alphanumerique
	if ( format == "AN" ) { RE = /^[A-Za-zàâäéèêëîïôùûç\s,'0-9\-]+$/;}

//	N	: numerique
	if ( format == "N" ) { RE = /^\d+$/;}

//	CP	: code postal francais (5 chiffres)
	if ( format == "CP" ) { RE = /^\d{5}$/;}

//	D	: Date (xx/xx/xx ou xx/xx/xxxx ou xx-xx-xx ou xx-xx-xxxx)
	if ( format == "D" ) { RE = /^\d{2}([\/]|[\-])+\d{2}([\/]|[\-])+\d{2}(\d{2})*$/;}

//	EMAIL	: email
	if ( format == "EMAIL" ) { RE = /^[A-Za-z0-9\.\-_]+[@][A-Za-z0-9\-\.]+[\.][A-Za-z][A-Za-z][A-Za-z]?$/;}

// Creation d'un raccourci pour manipuler le champ a tester
	var controle = eval('document.' + formulaire + '.' + champ);

// On ne fera les tests que si le champ est rempli d'au moins un caractere (pas vide)
	if (controle.value.length > 0) {

// Si on ne trouve pas dans le champ l'expression reguliere recherchee
		if (!RE.test(controle.value)) {

// Envoi d'une alerte
			alert('Votre saisie est incorrecte.');

// On marque que la saisie n'est pas coherente
			probleme = 1;
			}

// Tests de longueur du champ (nombre de caracteres saisis)
// Si il a ete specifie '0', le test n'est pas effectue
		if ( mini != 0 ) {

// Si la longueur de la saisie est inferieure au minimum demande
			if ( controle.value.length < mini ) {

// Envoi d'une alerte
				alert('Vous devez saisir au moins ' + mini + ' caracteres.');
				probleme = 1;
				}
			}

// Si la longueur de la saisie est superieure au maximum demande
		if ( maxi != 0 ) {
			if ( controle.value.length > maxi ) {
				alert('Vous ne devez pas saisir plus de ' + maxi + ' caracteres.');
				probleme = 1;
				}
			}

// Si on a marque qu'il y avait un probleme
		if ( probleme == 1 ) {

// On active le blocage du champ
			bloque(formulaire,champ);
			}
		}
	}
*/

// Fonction de verification d'une plage de nombres (entre X et Y)
function check_num(formulaire,champ,plancher,plafond) {

// Creation d'un raccourci pour manipuler le champ a tester
	var controle = eval('document.' + formulaire + '.' + champ);

// Si la valeur de la saisie est inferieure au plancher demande
	if ( controle.value < plancher ) {

// Envoi d'une alerte
		alert('Votre saisie ne doit pas etre inferieure a ' + plancher + '.');

// On active le blocage du champ
		bloque(formulaire,champ);
		}

// Si la valeur de la saisie est superieure au plafond demande
	if ( controle.value > plafond ) {
		alert('Votre saisie ne doit pas etre superieure a ' + plafond + '.');
		bloque(formulaire,champ);
		}
	}


// Fonction pour verifier la coherence de deux saisies de mot de passe
// Cette fonction se declenche a partir du second champ uniquement
function check_pw(formulaire,champ1,champ2) {
// Creation de deux raccourcis pour manipuler les champ a comparer
	var prems = eval('document.' + formulaire + '.' + champ1);
	var deuze = eval('document.' + formulaire + '.' + champ2);

// Si le premier champ n'est pas rempli
	if (!prems.value) {

// Envoi d'une alerte
		alert('Vous n\'avez pas saisi votre mot de passe');

// On active le blocage du champ
		bloque(formulaire,champ1);
		}

// Si le premier champ est rempli
	else {

// Si la saisie des deux champ est differente
		if ( prems.value != deuze.value ) {

// Envoi d'une alerte
			alert('La confirmation de votre mot de passe n\'est pas exacte.');

// Reinitialisation des deux champs
			deuze.value = "";
			prems.value = "";

// On active le blocage du champ
			bloque(formulaire,champ1);
			}
		}
	}
	
	
	function check_require()
	{
		alert("Vueillez renseigner les informations de coordonnées personnelles etape 1 d'abord");
		return false;
	}
	
	function chiffres(chaine) 
	{
	
	var LaChaine=document.getElementById(chaine).value;
	
	var lg=LaChaine.length;
	var l=LaChaine.substring(lg-1); 
	
	if(((l.charCodeAt(0)>=48 )&& (l.charCodeAt(0) <= 57 ))||(l.charCodeAt(0)==46)||(l.charCodeAt(0)==8)||(l.charCodeAt(0)==44) || (l.charCodeAt(0)==20))
		{document.getElementById(chaine).value=LaChaine;}
	else
		{
		 document.getElementById(chaine).value=LaChaine.substring(0,lg-1);
		 alert("Entrez des valeurs numériques SVP!");
		}

}

function validateEmail(email) { 
 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

});


