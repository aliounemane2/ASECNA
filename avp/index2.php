<?php
require "webroot/db/conn_db.php"; 
if(!isset($_GET['url'])){$_GET['url']="index";}
if(!file_exists("webroot/".$_GET['url'].".php"))
{$_GET['url']="404";}

 if(!preg_match("#^[a-zA-Z0-9\/]+$#",$_GET['url']))
 {  
    $_GET['url']="404";  
 }  
ob_start();
require "webroot/".$_GET['url'].".php";
$content=ob_get_contents();
ob_end_clean();

if($_GET['url']=='synthese')

    require "template-synth.php";
else
    require "template.php";
	
mysql_close();
?>	