  <?php
 
 $cryptinstall="../crypt/cryptographp.fct.php";
 include $cryptinstall;
  
  if(isset($_GET["code"]) && $_GET["code"]!="")
  {
	  echo  chk_crypt($_GET["code"]);
  }
  
?>