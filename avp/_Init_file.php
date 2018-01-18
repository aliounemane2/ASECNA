<?php
if(session_id()==""){@session_start();}

$DIR=$_SERVER['DOCUMENT_ROOT'].'avp/_config$/_Config_inc.php';
define('AVP_CONFIG',$DIR);

$_SESSION['AVP_CONFIG']=AVP_CONFIG;
require_once($_SESSION['AVP_CONFIG']);

?>