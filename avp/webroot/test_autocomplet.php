
<link rel="stylesheet" href="../css/main_style.css">
<link rel="stylesheet" href="../css/bootstrap3.3.1.css">
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../css/jquery.dataTables.css">

<script src="../js/jquery.min.1.11.1.js"></script>

<script src="../js/bootstrap.min.3.3.1.js"></script>

<script src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-filestyle.min.js"> </script>

<script type="text/javascript" src="../js/date_picker_bootstrap.js"> </script>
<script type="text/javascript" src="../js/moment.js"> </script>
<link rel="stylesheet" href="../css/date_picker_bootstrap.css">


    <div  id="sandbox-container">

    <div class="input-daterange input-group" id="datepicker">
    <input class="input-sm form-control" name="start" type="text">
    <span class="input-group-addon">bis</span>
    <input class="input-sm form-control" name="end" type="text">
    
    
    
    </div>
    
    
    <?php
	
	@session_start();
     require_once("../_Init_file.php");
	  $obj_pays=new Pays_class();
	  $liste=$obj_pays->getPaysBy_nom_pays("s");
	
	?>