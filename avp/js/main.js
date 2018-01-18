s

	/*Gestion sous menu side bar gauche*/
	
var counter = 1;
	var limit = 3;

	
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Entry " + (counter + 1) + " <br><input type='text' name='myInputs[]'>";
		  newdiv1.innerHTML = "Entry " + (counter + 1) + " <br><input type='file' name='myInputs[]'>";
          
		  document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
	}
	
	
function chiffres(event,sp)
{
    // Compatibilité IE / Firefox
    if(!event && window.event) {
        event=window.event;
    }
    var code = event.keyCode;
    var which = event.which;
    // IE
    if ((code < 48 || code > 57) && code != 46 && code != 8 && code != 9 && code != 16 && code != 13) {
        event.returnValue = false;
        event.cancelBubble = true;
        document.getElementById(sp).innerHTML = "<span style='color: red;'>Attention ! Ce champ ne doit contenir que des chiffres!</span>";
    }
     else
    {
     document.getElementById(sp).innerHTML = "";
    }
    // DOM (dont Firefox)
    if ((which < 48 || which > 57) && (code < 37 || code > 40) && code != 46 && code != 8 && code != 9 && code != 16 && code != 13) {
        event.preventDefault();
        event.stopPropagation();
        document.getElementById(sp).innerHTML = "<span style='color: red;'>Attention ! Ce champ ne doit contenir que des chiffres !</span>";
    }
     else
    {
     document.getElementById(sp).innerHTML = "";
    }
}
/**************************/
function validateEmail($email){
		return ereg("^[a-zA-Z0-9]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$", $email);
	}


function lettres(event,sp)
{
    // Compatibilité IE / Firefox
    if(!event&&window.event) {
        event=window.event;
    }
    var code = event.keyCode;
    var which = event.which;
    // IE
    //Si le keycode ne correspond pas à [A-Z] ou à [a-z] ou aux autres autorisés...
    if  (!((code >= 65 && code <= 90) || (code >= 97 && code <= 122)|| (code >= 37 && code <= 40) || code == 8 || code == 9 || code == 13 || code == 16 || code == 46 || code == 32)) {
        event.returnValue = false;
        event.cancelBubble = true;
        document.getElementById(sp).innerHTML = "<span style='color: red;'>Attention ! Ce champ ne doit contenir que des lettres !</span>";
    }
     else
    {
     document.getElementById(sp).innerHTML = "";
    }
    // DOM (dont Firefox)
    if  (!((which >= 65 && which <= 90) || (which >= 97 && which <= 122)|| (code >= 35 && code <= 40) || code == 9 || code == 8 || code == 13 || which == 16 || code == 46 ||  which== 32)) {
        event.preventDefault();
        event.stopPropagation();
        document.getElementById(sp).innerHTML = "<span style='color: red;'>Attention ! Ce champ ne doit contenir que des lettres !</span>";
    }
     else
    {
     document.getElementById(sp).innerHTML = "";
    }
}