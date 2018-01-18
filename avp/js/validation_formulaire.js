
 $(function() {
  
    // Setup form validation on the #register-form element
	
	$.validator.addMethod(
    "date",
    function(value, element) {
        // put your own logic here, this is just a (crappy) example
        return value.match(/^\d\d?\-\d\d?\-\d\d\d\d$/);
    },
    "Please enter a date in the format dd-mm-yyyy."
);

$.validator.addClassRules({
    date: {
        date: true
    }
});
	
	$.validator.addMethod("greaterThan", function(value, element, params) {
		if($(params[0]).val() != '') 
		{    
				if (!/Invalid|NaN/.test(new Date(value))) 
				{
					return new Date(value) > new Date($(params[0]).val());
				}    
			return isNaN(value) && isNaN($(params[0]).val()) || (Number(value) > Number($(params[0]).val()));
		};
		
    return true; 
},'La date  fin doit etre superieure à la date fin' );

$.validator.addClassRules({
    greaterThan: {
        greaterThan: true
    }
});
//************************************************************************************//
$.validator.addMethod("greaterThan1", function(value, element, params) {
		if($(params[0]).val() != '') 
		{    
				if (!/Invalid|NaN/.test(new Date(value))) 
				{
					return new Date(value) >= new Date($(params[0]).val());
				}    
			return isNaN(value) && isNaN($(params[0]).val()) || (Number(value) >= Number($(params[0]).val()));
		};
		
    return true; 
},'La date  fin doit etre superieure ou egale à la date fin' );

//*******************************************//

$.validator.addMethod("greaterThanNomber", function (value, element, param) {
    var $element = $(element)
        , $min;

    if (typeof(param) === "string") {
        $min = $(param);
    } else {
        $min = $("#" + $element.data("min"));
    }

    if (this.settings.onfocusout) {
        $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
            $element.valid();
        });
    }
    return parseInt(value) >= parseInt($min.val());
}, "");


$.validator.addClassRules({
    greaterThan1: {
        greaterThan1: true
    }
});

	$.validator.addMethod('checkboxcr', function(value, element) {
                   if($('#id_cr').not(':checked'))
				   {
					   
				   }
				   else
				   {
					   
				   }
                },'Vueillez cocher la declaration elle est obligatoire');

 	 
//******************************************************//
    
    $("#form").validate({
    
        // Specify the validation rules
        rules: {
			
			
		//********form coordonnee personnelle ****/
             CANDIDAT_NOM: "required",
             CANDIDAT_NUM_TEL: {
								   required: true,
								   number:true 
                               },
			 CANDIDAT_TYPE: "required",
             CANDIDAT_CIVILITE: "required",
			 
			 CANDIDAT_MATRICULE: {
								   
								   required: {
									      depends: function(element) { return $('#CANDIDAT_TYPE').val()=="Interne" }
								         },
								   
								   number:true ,
								   minlength:6,
								   maxlength:6
								   
                                  },
			 CANDIDAT_DATE_NAISSANCE: {
										  required:true,
										  date: true
									  },
			 CANDIDAT_SIT_MAT: "required",
			 CANDIDAT_NBRE_ENF: "required",
			 CANDIDAT_ADR_PERM: "required",
			 CANDIDAT_INDICATIF:{
								   required: true,
								   number:true 
                                },
			 CANDIDAT_NUM_TEL: {
								    required: {
									            depends: function(element) { return $('#CANDIDAT_INDICATIF').val()!="" }
								              },
								    number:true
                                },
			 CANDIDAT_NUM_GSM:{
								   required: true,
								   number:true 
                              },
							  
			 
			 
			  CANDIDAT_PHOTO:{ required:{depends: function(element) { return $('#OLD_PHOTO').val()=="" } },
							   accept: "image/jpg,image/jpeg,image/png" 
							 },
	  CANDIDAT_IS_FAMILLE: "required",		
	  			 
      FAMILLE_NOM:       { required: { depends: function(element) { return $('#CANDIDAT_IS_FAMILLE').val()=='Oui' } } },
      FAMILLE_PRENOM:    { required: { depends: function(element) { return $('#CANDIDAT_IS_FAMILLE').val()=='Oui' } } },
      FAMILLE_STRUCTURE: { required: { depends: function(element) { return $('#CANDIDAT_IS_FAMILLE').val()=='Oui' } } },				 
	  FAMILLE_DEGRE:     { required: { depends: function(element) { return $('#CANDIDAT_IS_FAMILLE').val()=='Oui' } } },	
	
	//****************form formation*****************/	
	
	        	
			FORMATION_AN_DEB:{
							  required: true,
							  number: true
							 },
			FORMATION_AN_FIN:{
							  
							  greaterThanNomber: '#FORMATION_AN_DEB',
							  number: true
						     },
			ETABLISSEMENT_NOM:"required",
			FORMATION_LIEU:"required",
			FORMATION_DIPLOME:"required",
			FORMATION_DOM_PRINC_ETUD:"required",
			FORMATION_CYCLE:"required",
			FORMATION_DIPLOME_FICHIER:{
				                         required:{depends: function(element) { return $('#old_fichier').val()=="" } },
										 accept: "image/jpg,image/jpeg,image/png,application/pdf"
			                           },
			
	//******************formulaire travail fin etude**************************/
	        REAL_LIB: "required",
			
	//************************** formulaire autre formation *******************************//
	
			/*FORMATION_AN_DEB:{
							  required: true,
							  date: true
							 },*/
							 
			FORM_LIB:"required",
			FORM_NOM:"required",
			FORM_INTITULE:"required",
			AUTRE_FORMATION_DIPLOME_FICHIER:{
				                             required:"Le fichier est obligatoire",
										     accept: "image/jpg,image/jpeg,image/png,application/pdf"
			                                },	
			
 	//***********************formulaire experiences********************************//
	
	        EXP_ENT_NOM:"required",
			EXP_SEC_ACT:"required",
			EXP_POSTE:"required",
			EXP_DEBUT_TRAVAIL:{
							     required:true,
							     date:true
							   },
			EXP_FIN_TRAVAIL: {
								 greaterThan: '#EXP_DEBUT_TRAVAIL',
							     date: true
							 },
			EXP_SALAIRE:{
						    required: false,
						    number:true 
                        },
			EXP_NBRE_PERS_SORD:{
								   required: false,
								   number:true 
                                },
			EXP_TACHE:"required",
			EXP_MOTIF_DEP:"required",
			
	 //***************************formulaire informatique ********************//
	  
	         LOGICIELS:"required",
			 INFORMATIQUE_NIV:"required",
			 
			 AUTRE_LOGICIELS:"required",
			 AUTRE_INFORMATIQUE_NIV:"required",	
			 	
	 //**************** formulaire linguistique ***************************************//
	        LANGUE_NOM:"required",
			LANGUE_ORALE:"required",
			LANGUE_ECRITE:"required",
			LANGUE_LECTURE:"required",
	 //*************** formulaire competence ************************//
	        COMP_LIB:"required",
	//************* formulaire lettre de motivation ****************************//    
	        LETTRE_MOTIVATION:"required",
		    QUAL_LIB:"required",
			
	//***************formulaire reference ***********************//  
	
	        REF_NOM_ENT:"required",
			REF_PERS_CONT:"required",
			REF_POST_OCC:"required",
			REF_TEL:{
					   required:true,
					   number: true
					 
					},
			 
			REF_EMAIL:{
						required: true,
						email:true
                     }, 
	
	//*************** formulaire annonce *******************************************//
	
	         ANNONCE_NUM:"required",
			 ANNONCE_TITRE:"required",
			 ANNONCE_DESCRIPTION:"required",
			 ANNONCE_LIEN:{   
			                  required: true,
							  accept:"application/pdf"
								
						   },
			 ANNONCE_DATE_DEB:{
							    required:true,
							    date:true
							  },
			 ANNONCE_DATE_FIN:
			 { 
				 greaterThan:'#ANNONCE_DATE_DEB',
				 date:true
			 
			 },
			 ANNONCE_DATE_CREATION:
			                        {
									 required: true,
									 date: true
							        },
			 ANNONCE_AGE:{
						   required:true,
						   number: true
						},
			 ANNONCE_DELAI_AGE:{
								 required: true,
								 date: true
							   },
			 SECTEUR:"required",
			 ETAT:"required",
			 
	//************************* formulaire inscription ***************************//
	
			  EMAIL:{
					   required: true,
					   email: true
					 },
			  UTIL_MDP:{
						  required: true,
						  minlength: 8
                          
                        },
			 RE_UTIL_MDP:{
						  equalTo:"#UTIL_MDP"
                         },
						 
			 code:{ required:true,
			        minlength: 4,
					maxlength:4
			       },
			 hcode:{
						required: 
						{
							depends: function(element) {
								return $('#code').val()!=$('#hcode').val()
							}
						}
												
					},
  //*************** formulaire login ***********************//

                  UTIL_LOGIN:{
							   required: true,
							   email: true
					         },	
  //****************** form pieces jointe *******************************************//	
       CANDIDAT_DEMANDE_EMPLOI:{
								required: true,
								accept: "image/jpg,image/jpeg,image/png,application/pdf"  
                               },
	           CANDIDAT_CV:{
								required: true,
								accept: "image/jpg,image/jpeg,image/png,application/pdf" 
                           },
	CANDIDAT_CERTIFICAT_TRAVAIL:
								{
									required: 
									{
										depends: function(element) {
											return $('#type_candidat').val()=="Externe"
										}
									},
									accept: "image/jpg,image/jpeg,image/png,application/pdf"	
									
								},	
			//val_requis:{ required:{ depends:function(element){ return $('#val_requis').val()=="ko" } } },
							
			id_cr:{ required: { depends: function(element){ return $('#id_cr').not(':checked') } } },
			
			OLD_PASS:"required",
			NEW_PASS:{required:true,
					  minlength: 8
			         },
			CONFIRM_PASS:{ equalTo:"#NEW_PASS",
				            minlength: 8
			             }
        },
        
        // Specify the validation error messages
        messages: {
			
			
			OLD_PASS:"L\'ancien mot de passe ne doit pas etre nul",
			NEW_PASS:{
				      required:"L\'ancien mot de passe ne doit pas etre nul",
					  minlength:"La taille est inferieur a 8 carateres"
			         },
			CONFIRM_PASS:{
				           equalTo:"Le ot de passe saisi n est pas conforme",
			               minlength:"La taille est inferieur a 8 carateres"
			             },
			
		//*************************************************************************//	
             CANDIDAT_NOM: "Le nom ne doit pas etre nul",
             CANDIDAT_NUM_TEL: {
				                 required: "Le telephone doit etre numerique et non nul" ,
								 number:"Le telephone doit etre numerique"
				               },
							   
			 CANDIDAT_TYPE: "Le type ne doit pas etre nul",
             CANDIDAT_CIVILITE: "La civilite ne doit pas etre nul",
		     CANDIDAT_MATRICULE: {
				                   required:"Le matricule ne doit pas etre nul",
								   number:"La matricule n\est pas numerique",
								   minlength: "Le matricule doit etre egal a 6 chiffres",
								   maxlength: "Le matricule doit etre egal a 6 chiffres"
							     },
			 CANDIDAT_DATE_NAISSANCE:{ 
										required: "La date naissance ne doit pas etre nulle",
										 date:"Le format de date est invalide"
									 },
			 CANDIDAT_SIT_MAT: "La situation matrimoniale ne doit pas etre nulle",
			 CANDIDAT_ADR_PERM: "Le adresse habituelle ne doit pas etre nul",
			 CANDIDAT_INDICATIF: "L\'indicatif ne doit pas etre nul",
			 CANDIDAT_NUM_TEL: "Le num telephone ne doit pas etre nul",
			 CANDIDAT_NUM_GSM:{ 
			                     required:"le GSM doit etre numerique et non nul",
								 number:"le GSM doit etre numerique et non nul"
			                  },
			CANDIDAT_PHOTO:
							 {    
							   required:"La photo est obligatoire",
							   accept: "Seul les images png/jpeg sont autorisees" 
							 },
			 CANDIDAT_IS_FAMILLE:"Avez une famille doit etre oui/non",
			 
			 FAMILLE_DEGRE:{ required: "Le degre de la famille ne doit pas etre nul"  } ,
             FAMILLE_NOM: { required:"Le nom de la famille ne doit pas etre nul" },
             FAMILLE_PRENOM:{ required:"Le prenom de la famille ne doit pas etre nul"},
             FAMILLE_STRUCTURE: { required:"La structure de la famille ne doit pas etre nul"},
			 
	 //********************* formulaire formation ************************************//
	        FORMATION_AN_DEB: {
			                   required: "L\'annee debut formation ne doit pas etre nulle",
							   number: "Ceci n est pas un nombre"
			                  },
			
			FORMATION_AN_FIN: {
			                  greaterThanNomber: "L\'annee fin formation doit etre superieur ou egale a annee debut",
							   number: "Ceci n \'est pas une date valide"
			                  },
			ETABLISSEMENT_NOM: "L\ etablissement ne doit pas etre nul",
			FORMATION_LIEU: "Lelieu de formation  ne doit pas etre nul",
			FORMATION_DIPLOME: "Le diplome ne doit pas etre nul",
			FORMATION_DOM_PRINC_ETUD: "Le domaine d\'etude ne doit pas etre nul",
			FORMATION_CYCLE: "Le cycle ne doit pas etre nul",
			FORMATION_DIPLOME_FICHIER: {
				                             required:"Le fichier est obligatoire",
										     accept: "Les extensions autorisees sont jpg|jpeg|png"
			                           },
			
	//********************* formulaire travail fin detude *******************************//		
	       
	        REAL_LIB:"Le travail de fin d etude ne doit pas etre nul",
		   
	//************************** formulaire autre formation *******************************//
	
			//FORMATION_AN_DEB:"Le travail de fin d etude ne doit pas etre nul",
			FORM_LIB:"Le libelle formation ne doit pas etre nul",
			FORM_NOM:"Le nom de la formation ne doit pas etre nul",
			FORM_INTITULE:"L\'intitule de la formation ne doit pas etre nul",
			AUTRE_FORMATION_DIPLOME_FICHIER:{
				                             required:"Le fichier est obligatoire",
										     accept: "Les extensions autorisees sont jpg|jpeg|png"
			                                },
			
	//***********************formulaire experiences********************************//
	
	        EXP_ENT_NOM:"Le travail de fin d etude ne doit pas etre nul",
			EXP_SEC_ACT:"Le travail de fin d etude ne doit pas etre nul",
			EXP_POSTE:"Le poste ne doit pas etre nul",
			EXP_DEBUT_TRAVAIL:{ 
			                     required:"La date debut emploi ne doit pas etre nul",
								 date:"Le format de date est invalide"
			                  },
			
			EXP_FIN_TRAVAIL:{ 
							   greaterThan:"Le date fin emploi doit etre superieure a la date debut emploi",
							   date:"Le format de date est invalide ou nul"
							},
			EXP_SALAIRE:{
				          number:"Le salaire doit etre numerique",
			            },
			EXP_NBRE_PERS_SORD:{
				                 number:"Le nmbre de personne doit etre numerique",
			                   },
			EXP_TACHE:"La tache est obligatoire",
			EXP_MOTIF_DEP:"Le motif de depart ne doit pas etre nul",
			
			
	   //********************* formulaire informatique ********************//
			
			 LOGICIELS:"Le logiciel ne doit pas etre nul",
			 INFORMATIQUE_NIV:"Le niveau ne doit pas etre nul",
			 
			 AUTRE_LOGICIELS:"Le logiciel ne doit pas etre nul",
			 AUTRE_INFORMATIQUE_NIV:"Le niveau ne doit pas etre nul",
			 
		//************** formulaire linguistique *******************************//	
			LANGUE_NOM:"Le nom langue ne doit pas etre nul",
			LANGUE_ORALE:"La langue orale ne doit pas etre nulle",
			LANGUE_ECRITE:"La langue ecrite ne doit pas etre nulle",
			LANGUE_LECTURE:"La langue lecture ne doit pas etre nulle",  
		//***************formulaire competence *************************************//
		    COMP_LIB:"La competence ne doit pas etre nulle",
		   
		//*******************formulaire lettre motivation **********************//
		   LETTRE_MOTIVATION:"La motivation ne doit pas etre nulle", 
		   QUAL_LIB:"La qualite ne doit pas etre nulle",
		   
		 //*********** formulaire reference *****************************// 
		 
		    REF_NOM_ENT:"La qualite ne doit pas etre nulle",
			REF_PERS_CONT:"La qualite ne doit pas etre nulle",
			REF_POST_OCC:"La qualite ne doit pas etre nulle",
			REF_TEL:{
					   required:"Le telephone ne doit pas etre nul",
					   number: "Le telephone doit etre numerique"
					 
					},
			 
			REF_EMAIL:{ required:"L\'email ne doit pas etre nulle",
						email:"Le mail est invalide" 
					  },
			
	 //*************** formulaire annonce *******************************************//
	
	         ANNONCE_NUM:"Le numero annonce ne doit pas etre nul",
			 ANNONCE_TITRE:"Le titre annonce ne doit pas etre nul",
			 ANNONCE_DESCRIPTION:"La description  ne doit pas etre nul",
			 ANNONCE_LIEN:{
				            required: "Le lien ne doit pas etre nul",
							accept: "seulement les fichiers pdf sont autorises"
			              },
			 ANNONCE_DATE_DEB:{
							    required: "La date ne doit pas etre nul",
							    date: "Le format date est invalide"
							  },
			 ANNONCE_DATE_FIN:{
							     required: "La date ne doit pas etre nul",
							     date: "Le format date est invalide"
							  },
			 ANNONCE_DATE_FIN:
			 { 
			    greaterThan: "La date fin doit etre superieur a la date date debut"
			 
			 },
			 ANNONCE_DATE_CREATION:
			                       {
									  required: "La date ne doit pas etre nulle",
							          date: "Le format date est invalide"
							       },
			 ANNONCE_AGE:{
						   required:"L\' age ne doit pas etre nul",
						   number: "La valeur saisie n\'est pas un nombre"
						 
						},
			 ANNONCE_DELAI_AGE:{
								  required: "La date ne doit pas etre nulle",
							      date: "Le format date est invalide"
							   },
			 SECTEUR:"Selectionner un secteur",
			 ETAT:"Selectionner un etat",	
			 
	 //************************* formulaire inscription ***************************//
	
			  EMAIL:{
						   required:"Le login ne doit pas etre nulle",
						   email: "Format email non valide"
                         },
			  UTIL_MDP:{
						  required: "Le mot de pass ne doit pas etre nul",
						  minlength: "Le mot de passe doit etre superieur 8 caracteres "
                          
                        },
			 RE_UTIL_MDP:{
						    equalTo:"La confirmation doit etre identique"
                         },
						 
			 code:{  required:"Le code ne doit pas etre nul",
			         minlength:"Le code invalide",
					 maxlength:"Le code invalide",
			      } ,
			 
			 
			 hcode:"Le code n\' est pas conforme",
			 
		//******************* formulaire login ************************//
		      UTIL_LOGIN: {
				            required:"Le login ne doit pas etre nulle",
						    email: "Format email non valide"	
			              } ,
						  
			  CANDIDAT_DEMANDE_EMPLOI: {
										required: "La demande est obligatoire",
										accept: 'Seuls les fichiers jpeg ,png sont autorises'
			                           },
			  CANDIDAT_CV: {
										required: "Le cv est obligatoire",
										accept: 'seulement les fichiers jpeg ,jpg et png sont autorises'
		                   },
			CANDIDAT_CERTIFICAT_TRAVAIL:{  required:"Le certificat de travail est obligatoire",
			                               accept: 'seulement les fichiers jpeg ,jpg et png sont autorises' 
										},
			
			
			id_cr:" Vueillez Cocher la case pour certifier la declaration " ,
			val_requis:" Vueillez completer les etapes qui reste"
	
			//*************validation formulaire********************//
			
        },
		
        
        submitHandler: function(form) 
		{
            form.submit();
        }
		 
    });
	
	

  //************************** autres informatique et autre liguistique **************************//
  
	 $("#form_autre").validate({
    
        // Specify the validation rules
        rules: {
			
			 AUTRE_LOGICIELS:"required",
			 AUTRE_INFORMATIQUE_NIV:"required",	
			 
		//************** formulaire linguistique *******************************//	 
			AUTRE_LANGUE_NOM:"required",
			AUTRE_LANGUE_ORALE:"required",
			AUTRE_LANGUE_ECRITE:"required",
			AUTRE_LANGUE_LECTURE:"required",   	
	 
	         },
        
        // Specify the validation error messages
        messages: {
		
	   //********************* formulaire informatique ********************//
			 
			 AUTRE_LOGICIELS:"Le logiciel ne doit pas etre nul",
			 AUTRE_INFORMATIQUE_NIV:"Le niveau ne doit pas etre nul",
			 
		//************** formulaire linguistique *******************************//	
			AUTRE_LANGUE_NOM:"Le nom langue ne doit pas etre nul",
			AUTRE_LANGUE_ORALE:"La langue orale ne doit pas etre nulle",
			AUTRE_LANGUE_ECRITE:"La langue ecrite ne doit pas etre nulle",
			AUTRE_LANGUE_LECTURE:"La langue lecture ne doit pas etre nulle",  
	
        },
        
        submitHandler_other: function(form) 
		{
            form.submit();
        }
		
    });

  });
  
  //***********  function pour competr le nombre de ligne autoriser *******//
          function compte_number_ligne_autorize(champ_nbre_elements,autorize_number_display,libelle_concerne)
		  {
				var joker="";
				var vleur=$("#"+champ_nbre_elements).val();
				var val_courante=parseInt(vleur);
				var val1=parseInt(autorize_number_display);
				joker=$('#joker').val();
				
				if(libelle_concerne=="Autres connaissances informatiques" || libelle_concerne=="Autre linguistiques"){
				  joker=$('#joker2').val();	
				}
				
				
			if(isNaN(val1)==false && isNaN(val_courante)==false)
			{
				if(val_courante < val1)
				{
					return true;
				}else
				{
					if(joker>1) { return true; }
					else{ alert("Vous devez ajouter que "+String(autorize_number_display)+"  "+libelle_concerne);
					   return false;
					} 
					
				}
			}
				
		}
//*************** verifier les formulaire obligatoire ***********************//
	
	    function check_post()
		{
		    if( $('#val_requis').val()=="ko" )
		    {
			  $("#span_error3").remove();
			  $('<span id="span_error3">Vueillez completer les etapes qui restent</span>').insertAfter("#val_requis"); 
			  return false; 
		    }
			else{
				return true;
			}
		}
		
		function check_post1()
		{
		    if( $('#val_requis').val()=="ko" )
		    {
			  $("#span_error3").remove();
			  $('<span id="span_error3">Vueillez completer les etapes qui restent</span>').insertAfter("#val_requis"); 
			  return false; 
		    }
			else{
				return true;
			}
		}
		
//********************** check existe mail ***********************//
		
 function check_exist_mail()
 {

     $('#EMAIL').keypress( function()
     {
         var email=$('#EMAIL').val();

         if (email!="")
         {
             $("#mess_id").remove();
         }
         return true;

     });

     var email=$('#EMAIL').val();

     $.ajax({

         type: "GET",
         url: "/avp/ajax/check_email.php?email="+email,
         data: "",
         cache: false,

         success: function(reponse)
         {
             if(reponse=="KO")
             {
                 $("#mess_id").remove();
                 var mess='<span style=\"color:red\" id="mess_id">'+'Le mail existe deja'+'</span>';
                 $(mess).insertAfter('#EMAIL');
                 return false;
             }
             else
             {
                 $("#mess_id").remove();
                 return true;
             }

        }

     });
	 
 }
 
 //******************** function qui chec le code si cest valide ************************//
	 function check_code_valide()
	 {
		 
		 $('#code').keypress( function()
		 {
			 var code=$('#code').val();
	
			 if (code!="")
			 {
				 $("#mess_id").remove();
			 }
			 return true;
	
		 });
		  var code=$('#code').val();
		  
		  $.ajax({
	
			 type: "GET",
			 url: "/avp/ajax/check_code.php?code="+code,
			 data: "",
			 cache: false,
	
			 success: function(reponse)
			 {
				 if(reponse==false)
				 {
					 $("#mess_id").remove();
					 var mess='<span id="mess_id">'+'Le code n\'est pas valide'+'</span>';
					 $(mess).insertAfter('#code');
					 return false;
				 }
				 else
				 {
					 $("#mess_id").remove();
					 return true;
				 }
	
			  }
	
		 });

  }
//***********************************************************//

          

