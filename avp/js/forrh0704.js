
$(document).ready(function() {
	
	//debut mail
  $('#CANDIDAT_EMAIL').change(function(){
		 
		var data='mail='+$('#CANDIDAT_EMAIL').val();
		$.ajax({
			  type: "POST",
			  url: "monajax.php?action=verifiermail",
			  data: data,
			  dataType: "json",
			  success: function(json){
				  if(json==true){
					  $("#mail").html("l'adresse email existe");
					  $('#CANDIDAT_EMAIL').val("");
					  
					  }else  if(json==false){
					  $("#mail").html("");
					  
					  }
				  }
			});
		});
		
		//fin mail
});