<?php 
		@session_start();
		
	    $_SESSION["login"]="";
	    $_SESSION["role"]="";
	    $_SESSION["id_user"]="";
	    $_SESSION['lastaccess']="";

		$_SESSION = array();
		session_unset();
		session_destroy();

        $path="index.php";

		$var="window.location.replace('".$path."')";
		$var="<SCRIPT LANGUAGE='JavaScript'>".$var."</script>";

		echo $var;

?>