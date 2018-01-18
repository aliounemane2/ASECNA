$( function()
{
        var $signupForm = $( '#SignupForm' );

        $signupForm.formToWizard({
            showProgress: true, //default value for showProgress is also true
            nextBtnName: 'Forward >>',
            prevBtnName: '<< Previous',
            showStepNo: false,
            validateBeforeNext: function() {
                return $signupForm.validation( 'validite' );
            }
        });


        $( '#txt_stepNo' ).change( function() {
            $signupForm.formToWizard( 'GotoStep', $( this ).val() );
        });

        $( '#btn_next' ).click( function() {
            return false;
            $signupForm.formToWizard( 'NextStep' );
        });

        $( '#btn_prev' ).click( function() {
            $signupForm.formToWizard( 'PreviousStep' );
        });
    });

    $.validator.addClassRules({
        checkinput:{
            required: true,
            // Ici, on limite la taille maxi à 1  Mo. On peut aussi utiliser des Ko ou même des Go.
            // Modifiez les arguments selon vos besoins !
            maxfilesize: [500, "Ko"]
        }
    });

    $('#SignupForm').validate({
        rules: {
            "CANDIDAT_MATRICULE" : {
                number: true,
                minlength:6,
                maxlength:6
            }/*,
            "EXP_DEBUT_TRAVAIL[]": {
                date: true
            },
            "EXP_FIN_TRAVAIL[]": {
                date: true
            }*/,
            "EXP_SALAIRE[]": {
                number: true
            },
            "EXP_NBRE_PERS_SORD[]": {
                number: true
            },
            "REF_TEL[]": {
                number: true
            },
            "REF_EMAIL[]" : {
                email: true
            },
            "cr" : {
                required: true
            }
        },
        messages: {
            "CANDIDAT_MATRICULE":{
                number: "Entrez des caractères numériques.",
                minlength: "Il faut au minimum 6 caractères.",
                maxlength: "Il faut au maximum 6 caractères."
            },
            "EXP_DEBUT_TRAVAIL[]": {
                date: "Spécifiez une date valide."
            },
            "EXP_FIN_TRAVAIL[]": {
                date: "Spécifiez une date valide."
            },
            "EXP_SALAIRE[]": {
                number: "Le montant doit être spécifié qu'en chiffres."
            },
            "EXP_NBRE_PERS_SORD[]": {
                number: "Le nombre doit être spécifié en chiffres."
            },
            "REF_TEL[]": {
                number: "Spécifiez un numéro de téléphone valide"
            },
            "REF_EMAIL[]" : {
                email: "Entre une adresse email valide."
            },
            "cr" : {
                required: ""
            }
        }
    });

    $("#id_CANDIDAT_IS_FAMILLE").change( function () {
        if($(this).val() === "Oui"){
            $(".display_famille").show().fadeIn();
        } else {
            $(".display_famille").hide();
        }
    });

      $("#MAT").hide();

    $("#id_CANDIDAT_TYPE").change( function()
    {
        var type = $(this).val();
        if(type === "Interne")
        {
            $(".is_externe").hide();
            $("#MAT").show();
        }
        else
        {
            $(".is_externe").show();
            $("#MAT").hide();
        }
    });

    $("#id_code").keyup(function() {
        var value = $(this).val();
        if (value.length === 5){
            $.post(
                '/avp/json/test_recaptcha_json.php',
                {'code': value},
                function(data){
                    if (data.classe === "correct") {
                        $('#hide_button').show();
                        $('#id_error').hide();
                    }else{
                        $('#hide_button').hide();
                        $('#id_error').show();
                    }
                }, "json"
            );
        }else{
            $('#hide_button').hide();
        }
    });











