// JavaScript Document
           var choix_fam=$('#CANDIDAT_IS_FAMILLE').val();
		   if(choix_fam=="Oui")
		   {
			  $("#bloc_a_cacher").show();
		   }

        $.ajax({
					
				  type: "POST",
                  url: "/avp/ajax/charger_pays.php",
                  data: "",
                  cache: false,

                  success: function(html)
                  {  
                        var str_val=html.split("###");
                        document.getElementById("CANDIDAT_INDICATIF").options.length=0;
                        var elOptNouv = document.createElement("OPTION");
                        elOptNouv.value='';
                        elOptNouv.text='';
                        document.getElementById("CANDIDAT_INDICATIF").add(elOptNouv,null);

                       for(var i=0;i<str_val.length;i++)
                       {
								if(str_val[i]!="")
								{
									var str_tab=str_val[i].split("|||");
									var elOptNouv = document.createElement("OPTION");
									elOptNouv.value=str_tab[0];
									var ch_str='(+'+str_tab[0]+' ) '+str_tab[1];
									elOptNouv.text=ch_str;
									if(str_tab[0]==selected_indic)
									{
										elOptNouv.selected=true;
									}
									
									document.getElementById("CANDIDAT_INDICATIF").add(elOptNouv,null);
								}
                        }
				  }

      	      });
			  
		//**********************************************************//	
			  	
			function disable_bloc()
			{
				   var choix_fam=$('#CANDIDAT_IS_FAMILLE').val();
				  
				   if(choix_fam=="Oui")
				   { 
						$('#bloc_a_cacher').show();
						var cont=$('#div_btn_enreg').html(); 
						$('#div_btn_enreg').remove(); 
						$($('<div id="div_btn_enreg">'+cont+'</div>')).insertAfter('#bloc_a_cacher');
						return true;
				   }
				   else if(choix_fam=="Non" || choix_fam=="")
				   {
						$('#bloc_a_cacher').hide();
						var cont2=$('#div_btn_enreg').html(); 
						$('#div_btn_enreg').remove(); 
						$('<div id="div_btn_enreg">'+cont2+'</div>').insertAfter('#div_is_fam');
					    return  true;
				   }
			}
	//****************************************************************************//		
			function bloc_hide()
			{
			   var choix_fam=$('#CANDIDAT_TYPE').val();
			   if(choix_fam=="Interne")
			   {
				  $('<div class="form-group" id="ft_gt">'+
                                  '<div class="col-sm-1"></div>'+
                                   '<label for="firstname" class="col-sm-3">Num&eacute;ro matricule:<font color=red>*</font></label>'+
								   '<div class="col-sm-3">'+
                                   '<INPUT  class="form-control"  type="text" name="CANDIDAT_MATRICULE" placeholder="" size="30" maxlength="6" value="">'+
                                   
                                  '</div>'+
                                  '</div>').insertAfter("div#ft_bloc");
							
				  return true;
			   }
			   else
			   {
				   $("#bloc_hide").remove();
				   $("#ft_gt").remove();
				  
				   return  true;
			   }
			}
	//*************************************************************************************//
			
			function add_line_fam()
			{
				var nbre=parseInt($('#nbre_lign').val());
				
				if(nbre>=3)
				{
				   alert("Vous devez ajouter que trois seulement");	
				   return false;
				}
				else
				{
				    nbre++;
					$('#nbre_lign').val(nbre);
				    var ch="ligne"+nbre;
				    var ligne='<div class="form-group"  id="'+ch+'">'+
                          
                              '<div class="col-sm-3">'+ 
                                '<label>Nom :<font color=red>*</font></label>'+
                               '<input type="text" name="FAMILLE_NOM[]" id="FAMILLE_NOM" placeholder="" value="" size="30" maxlength="30" class="form-control"  onkeypress="return valide_field(\'FAMILLE_NOM\',1);" >'+
							   '</div>'+
                              '<div class="col-sm-3">'+
                                '<label>Pr&eacute;noms :<font color=red>*</font></label>'+
                                '<input type="text" name="FAMILLE_PRENOM[]" id="FAMILLE_PRENOM" placeholder="" value="" size="30" maxlength="30" class="form-control" onkeypress="return valide_field(\'FAMILLE_PRENOM\',2);">'+
                               '</div>'+
                               
                                '<div class="col-sm-2">'+
                                '<label>Structure :<font color=red>*</font></label>'+
                                '<input type="text" name="FAMILLE_STRUCTURE[]" id="FAMILLE_STRUCTURE" placeholder="" value="" size="30" maxlength="30" class="form-control" onkeypress="return valide_field(\'FAMILLE_STRUCTURE\',4);">'+
								                             '</div>'+
                              '<div class="col-sm-2">'+
                                '<label>Degr&eacute; :<font color=red>*</font></label>'+
                                '<input type="text" name="FAMILLE_DEGRE[]" id="FAMILLE_DEGRE"  placeholder="" value="" size="30" maxlength="30" class="form-control" onkeypress="return valide_field(\'FAMILLE_DEGRE\',3);">'+
                                
                              '</div>'+
							   '<div class="col-sm-2">'+
							    '<label>&nbsp;&nbsp;&nbsp;</label></br>'+
							  	'<span title="'+nbre+'"  id="supp_ligne" onclick="return del_line();" style="margin-top:-5px;">Supprimer <span id="icon_supp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>'+
								'</div>'+
                            '</div>';
					
					        $(ligne).insertBefore("#a_changer");
					
					return true;
				}
              
		}
			
//**************************************************************************//

			
			function del_line()
			{
				var nbre=$('#supp_ligne').attr("title");
				var selector="#ligne"+parseInt(nbre);
				
			    $(selector).remove();
				var rc=$('#nbre_lign').val();
				
				var rc1=parseInt(rc-1);
				
				if(isNaN(rc1)){ 
				    rc1=0; 
				}else{
					rc1=rc1;
				}
				
				$('#nbre_lign').val(rc1);
				
				return true;
		
			}
			

		function verif_indicatif()
		{
			var val= $('#CANDIDAT_INDICATIF').val();
	
			if(val=="")
			{
				alert("Indicatif obligatoire");
				return false;
			}
	
		}
		
		function verif_tel()
		{
			var val= $('#CANDIDAT_INDICATIF').val();
	
			if(val=="")
			{
				alert("Indicatif obligatoire");
				return false;
			}
			
	
		}

   
			  
			$('#modif_famille').click( function(e)
			{
				   var famille_nom=$('#FAMILLE_NOM').val();
				   var famille_prenom=$('#FAMILLE_PRENOM').val();
				   var famille_degre=$('#FAMILLE_DEGRE').val();
				   var famille_structure=$('#FAMILLE_STRUCTURE').val();
				   
				   var famille_id=$('#FAMILLE_ID').val();
				   var candidat_id=$('#CANDIDAT_ID_FAM').val();
				   var fk_annonce_id=$('#FK_ANNONCE_ID').val();
				
				 
				 var  param="famille_nom="+famille_nom+"&famille_prenom="+famille_prenom+"&famille_degre="+famille_degre+"&famille_structure="+famille_structure+"&candidat_id="+candidat_id+"&famille_id="+famille_id+"&fk_annonce_id="+fk_annonce_id;
				 
				
				 
				 $.ajax({
							  type: "POST",
							  url: "/avp/ajax/modifier_famille.php",
							  data: param,
							  cache: false,
			
							  success: function(html)
							  {
								  var rec=html.split("###");
								  
								  alert("Famille modifiée avec success"); 
								  $('#nbre_lign').val(rec[1]);
								  $('#replace_data').html(rec[0]);  
						  
							  }
				      });
				
				
		 });
		 
		 function verif_champ_famille()
		 {
				var candidat_famille=$('#CANDIDAT_IS_FAMILLE').val();
				var mess=0; 
				$('input[id=FAMILLE_PRENOM]').each(function(i,val){
				
					   var famille_prenom=$(this).val();
					   if(famille_prenom=="" && candidat_famille=="Oui")
					   {
						  $("#span_error2").remove();
						  $('<span id="span_error2">Prenom ne doit pas etre nul</span>').insertAfter(this);
						  mess++;
					   }
				});
				
				$('input[id=FAMILLE_NOM]').each(function(i,val){
				
					   var famille_nom=$(this).val();
					   if(famille_nom=="" && candidat_famille=="Oui")
					   {
						  $("#span_error1").remove();
						  $('<span id="span_error1">Nom ne doit pas etre nul</span>').insertAfter(this);
						  mess++;
					   }
				});	
				
				$('input[id=FAMILLE_DEGRE]').each(function(i,val){
				
					   var famille_degre=$(this).val();
					   if(famille_degre=="" && candidat_famille=="Oui")
					   {
						   $("#span_error3").remove(); 
						   $('<span id="span_error3">Degre ne doit pas etre nul</span>').insertAfter(this);
						   mess++;
					   }
					   
				});
				
				$('input[id=FAMILLE_STRUCTURE]').each(function(i,val){
		
					   var famille_structure=$(this).val();
					   if(famille_structure=="" && candidat_famille=="Oui")
					   {
							$("#span_error4").remove(); 
							$('<span id="span_error4">Structure ne doit pas etre nulle</span>').insertAfter(this);
							mess++;
					   }
				});	
				
				if(mess>0){ return false; }
				else { return true;}
				      
		 }
		 
	//***************************************************************//
	
	           function valide_field(field,itm,ligne)
			   { 
				   var val=$('#'+field).val();
				   if(val!="")
				   {
					 $("#span_error"+itm).remove();  
					 return true;
				   } 
			   }        
			
	
		 

 		 