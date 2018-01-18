/* Created by jankoatwarpspeed.com */

(function($) {
    $.fn.formToWizard = function(options) {
        options = $.extend({
            submitButton: ""
        }, options);

        var element = this;
        var j=0;
        var fin = false;

        var steps = $(element).find("debut");
        var count = steps.size();
        var submmitButtonName = "#" + options.submitButton;
        $(submmitButtonName).hide();

        // 2
        $(element).before("<ul id='steps'></ul>");

        steps.each(function(i) {
            $(this).wrap("<div id='step" + i + "'></div>");
            $(this).append("<p id='step" + i + "commands'></p>");
/*//rajout pour navigation facile
            var name = $(this).find("legend1").html();
            $("#steps").append("<li id='stepDesc" + i + "' Class='Stepsname'>Etape " + (i + 1) + "<span>" + name + "</span></li>");

            //add Class to <li> for CSS

            $("#stepDesc" + i).bind("click", function(e) {
                for (var f=0;f<=count;f++){
                    $("#step" + f).hide();
                }
                $("#step" + i).show();
                if (i + 1 == count)
                    $(submmitButtonName).show();
                selectStep(i);
            });
            //fin rajout*/

            // 2 blocage etape par etape
            var name = $(this).find("legend1").html();
            $("#steps").append("<li id='stepDesc" + i + "'>Etape " + (i + 1) + "<span>" + name + "</span></li>");

            if (i == 0) {
                createNextButton(i);

                if(j!=0)
                {
                    $("#step"+i+"Last").show();
                   /* $("#step"+i+"Next").css("float","right");
                    $("#step"+i+"Next").css("margin-right","200");
                    $("#step"+i+"Last").css("float","right");
                    $("#step"+i+"Last").css("margin-right","0");*/
                }

                else
                    $("#step"+i+"Last").hide();
                if(fin==true)
                {
                    $("#step"+i+"Last").show();
                }
                selectStep(i);
            }
            else if (i == count - 1) {
                $("#step" + i).hide();
                createPrevButton(i);
            }
            else {
                $("#step" + i).hide();
                createPrevButton(i);
                createNextButton(i);
            }
        });

        function createPrevButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Prev' class='prev'>< Précédent</a>");

            $("#" + stepName + "Prev").bind("click", function(e) {
                $("#" + stepName).hide();
                $("#step" + (i - 1)).show();
                $(submmitButtonName).hide();
                selectStep(i - 1);
            });
        }

        function createNextButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Next' class='next'>Suivant ></a>");

            $("#" + stepName + "Next").bind("click", function(e) {
                //if (options.validationEnabled) {
                var stepIsValid = true;
                $("#" + stepName + " :input").each( function(index) {
                    console.log($(this));
                    stepIsValid = element.validate().element($(this)) && stepIsValid;
                });
                console.log(stepIsValid);
                if (!stepIsValid) {
                    return false;
                }
                //else {
                $("#" + stepName).hide();
                $("#step" + (i + 1)).show();
                if (i + 2 == count)
                    $(submmitButtonName).show();
                selectStep(i + 1);
                //}
                //}

            });
        }
        /*function createNextButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Next' class='next'>Suivant ></a>");

            $("#" + stepName + "Next").bind("click", function(e) {
                $("#" + stepName).hide();
                $("#step" + (i + 1)).show();
                if (i + 2 == count)
                    $(submmitButtonName).show();
                selectStep(i + 1);
            });
        }*/

        function selectStep(i) {
            $("#steps li").removeClass("current");
            $("#stepDesc" + i).addClass("current");
        }

    }
})(jQuery);