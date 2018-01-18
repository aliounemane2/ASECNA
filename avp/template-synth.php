<?php 
if(isset($_POST['envoyer'])&&!empty($_POST['envoyer'])){

		$_POST['UTIL_LOGIN']=addslashes($_POST['UTIL_LOGIN']);
		$_POST['UTIL_MDP']  =addslashes($_POST['UTIL_MDP']);
		
$sql  = "select UTIL_ID as id_user , UTIL_ROLE as role, UTIL_LOGIN from utilisateurs where UTIL_LOGIN ='".$_POST['UTIL_LOGIN']."'AND UTIL_MDP='".sha1($_POST['UTIL_MDP'])."'";
$req  = mysql_query($sql);
$user = mysql_fetch_assoc($req); 
if(mysql_num_rows($req)==1){
if($user['role'] == 0) {
	$_SESSION["login"] = $_POST["UTIL_LOGIN"];
	$_SESSION["role"] = $user['role'] ; 
    $_SESSION["id_user"] = $user['id_user'] ;
	header("Location:index.php?url=pvacants"); 
   }else{ 
	     $_SESSION["login"]   = $_POST["UTIL_LOGIN"];
	     $_SESSION["role"]    = $user['role']; 
	     $_SESSION["id_user"] = $user['id_user'] ;
	     header("Location:index.php?url=annonce"); 
        }
   }else{
   $error_connexion='<center><font color="#FF000" >Login ou mot de passe incorrect!</font></center>';
   }
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
    <meta charset="utf-8">
    <title>Accueil> Ressources Humaines > Politique de ressources humaines</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    
</head>
<body>


 <!-- contenu pages -->
 
<?php
echo $content;
?>

 <!-- fin contenu pages -->


</body></html>