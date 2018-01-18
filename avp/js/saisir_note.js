// JavaScript Document
//*****************gestion des notes ****************************//

        $("#example tr td #id_note").click(function() 
		{
			var idtr =$(this).attr("title");
			$("#id_user").val();
			$("#form_bt_modal #id_user").val(idtr);
		}); 
	
		$("#saisir_note_btn").click(function()
		{
		   var note= $('#note').val();
		   var retenu= $('#retenu').val();
		   var fk_util_id= $('#id_user').val();
		   var annonce_id= $('#FK_ANNONCE_ID').val();
		   
			if(note=="" || note=="0"  )
			{
				 $('<span id="span_error">La Note ne doit pas etre nulle</span>').insertAfter("#note");
				 return false;
			}
			  
				 $.ajax({
								type: "GET",
								url: "/avp/ajax/insert_note.php?"+"fk_util_id="+fk_util_id+"&annonce_id="+annonce_id+"&note="+note+"&retenu="+retenu,
								data: "",
								success: function(msg)
								{
								  $("tbody#id_note_postul").val(msg);
								  return true;
								},
								error: function()
								{
								  alert("Note non enregisgter");
								  return false;
								}
						
					   });	   
	   });

	