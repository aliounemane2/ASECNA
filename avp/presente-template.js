    <script src="js/validation_formulaire.js"></script>
	    <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
		
        <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
		<script type="text/javascript" src="js/jquery.sheepItPlugin.js"></script>
		
		<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker-fr.js"></script>
		<script type="text/javascript" src="js/jquery.livequery.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
         <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> -->
        <script type="text/javascript" src="js/jquery.dataTables.js"></script>
        
        <script type="text/javascript" src="js/jquery.bpopup.min.js"></script>
        <script type="text/javascript" src="js/jquery.DOMWindow.js"></script>
        <script src="js/SpryValidationSelect.js" type="text/javascript"></script>
        <script type='text/javascript' src='js/jquery.simplemodal.js'></script>
        <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
		
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
      
        
        <link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.all.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.core.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.datepicker.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.progressbar.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.slider.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.tabs.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.ui.theme.css">

		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
        
		<!--link href="css/SpryValidationSelect.css" rel="stylesheet" type="text/css">
		<link href="css/SpryValidationTextField.css" rel="stylesheet" type="text/css"-->

		<link type='text/css' href='css/demo.css' rel='stylesheet' media='screen' />

        <!-- Contact Form CSS files -->
        <link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
        
        <!-- IE6 "fix" for the close png image -->
        <!--[if lt IE 7]>
        <link type='text/css' href='css/basic_ie.css' rel='stylesheet' media='screen' />
        <![endif]-->
        
        <link href="css/css_additional.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
        
        
        <script type="text/javascript">

		  $(document).ready(function() 
		  {
			  //$('#dataTable').dataTable();
					 
				$('#basic-modal .basic').click(function (e) 
				{
					$('#basic-modal-content').modal();
					return false;
					
				});
	
				$('#dataTable').dataTable();
				
				//*************** selection des candidature a exporter ***********//
				
				  var tab=[]; 
				  
				  $("#lien_export").click( function()
				  {
					  $("input[type=checkbox]:checked").each(
						  function()
						  {
							tab.push($(this).val());
						  }
					  );
			  
					  var originalHref =$("#lien_export").attr("href");
					  $("#lien_export").attr('href',originalHref+'&tab='+tab);
			  
			  
				  });

	            //****************************************************************//
				
	
				  $('#basic-modal .basic').click(function (e) 
				  {
					  $('#basic-modal-content').modal();
					  return false;
					  
				  });
				  
				  
} );
</script>
 	
        
        <script type="text/javascript" src="js/jquery-1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.bpopup.min.js"></script>
        <script type="text/javascript" src="js/jquery.DOMWindow.js"></script>
        <script type="text/javascript" src="js/jquery.sheepItPlugin.js"></script>
	
<script type="text/javascript">
jQuery('.datatable').dataTable({"sPaginationType": "full_numbers",});

</script>
	