<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);

Class Utilisateurs_controler extends Utilisateurs_class
{

	//Controleur ajout
	
	function controler_ajout()
	{
	
		$Objcl=new Utilisateurs_class();
		
		$Tab_param=array(
			
						  'UTIL_LOGIN'=>$_POST['EMAIL'],
						  'UTIL_MDP'=>crypt(md5(trim($_POST['UTIL_MDP'])),"securite"),
						  'UTIL_EMAIL'=>$_POST['EMAIL'],
						  'UTIL_ROLE'=>'0',
						  'active'=>"non",
						  'token'=> sha1($_POST['EMAIL'])
					   
			          );
	
	//*********************************************************************************//	
			
		$Cnn=$Objcl->ma_connexion();

		$Cnn->beginTransaction();
		try
		{
			if($Objcl->ajouter_enreg_utilisateurs($Tab_param,$Cnn)==true)
			{
					$expediteur=$_POST['EMAIL'];
					$message_mail='Bienvenue sur le site de <a href="'.URL_SITE.'/index.php?page=activation&token='.sha1($_POST['EMAIL']).'"> cliquer ici pour activer votre compte </a>';
					echo "123";
					
					date("D,j M Y H:i:s");
					$entete = "MIME-Version:1.0\r\n";
					$entete.="Content-Type: text/html; charset=\"iso-8859-1\"";
					$entete.="From:$expediteur\n";
					$entete.="Cc:\n";
					$entete.="Replay-To:$expediteur\n";
					$entete.="Date:".date("D,j M Y H:i:s");
	                $_SESSION["reussie"]='ok';

				      //$recu=@mail($_POST['EMAIL'], "Validation", $message_mail, $entete);
					  $recu=true;
					 
					 if(@$recu==true)
					 {
						  $Cnn->commit();
						  $Objcl->redirige(HOME.$Objcl->param_encode('reussie'));
					 }
					 else
					 {
						 $Cnn->rollback();
						 
						 if($recu==false)
						 {
							 $message="Le mail na pas pu envoyé!";
						 }
						 $message="utilisateurs non enregistré!";
						 $Objcl->message_box($message);
						 $Objcl->redirige(HOME.$Objcl->param_encode('inscription'));
					 }
			}
			else
			{
		        $Cnn->rollback();
				$message="utilisateurs non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('inscription'));
		
			}
			
		}
		catch(Exeption $e)
		{
			$Cnn->rollback();
			$message="utilisateurs non enregistré!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('inscription'));
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Utilisateurs_class();
			$Tab_param=array(
				'UTIL_ID'=>$_POST['UTIL_ID'],
				'UTIL_LOGIN'=>$_POST['UTIL_LOGIN'],
				'UTIL_MDP'=>$_POST['UTIL_MDP'],
				'UTIL_EMAIL'=>$_POST['UTIL_EMAIL'],
				'UTIL_ROLE'=>$_POST['UTIL_ROLE'],
				'active'=>$_POST['active'],
				'token'=>$_POST['token']);

			$Cnn=$Objcl->ma_connexion();
			
			if($Objcl->modifier_enreg_utilisateurs($Tab_param,$Cnn))
			{
	
				$message="utilisateurs modifié avec succès!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_utilisateurs').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="utilisateurs non modifié!";
	
				$Objcl->message_box($message);
	
				//$Objcl->redirige(HOME.$Objcl->param_encode('detail_utilisateurs').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Utilisateurs_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_utilisateurs($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_utilisateurs').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!utilisateurs non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_utilisateurs').'&module='.$Objcl->param_encode('xxx'));
		}
		//break;
	}
	
	function controler_connexion()
	{
		
		$login=$_POST['UTIL_LOGIN'];
		$_motdepasse=trim($_POST['UTIL_MDP']);
		$active="oui";
		//$remember=$_POST["remember_me"];
		
		
		
		$param=array(
					 'UTIL_LOGIN'=>$login,
					 'UTIL_MDP'=>crypt(md5($_motdepasse),"securite"),
					 'active'=>$active
					);
					
				

		$Objcl=new Utilisateurs_class();
		
		$liste_user=$Objcl->login($param);
		
	
		if(count($liste_user)==1 && !empty($liste_user))
		{
			  $role=$liste_user[0][$Objcl->GetCh_UTIL_ROLE()];
			  $id_user=$liste_user[0][$Objcl->GetCh_UTIL_ID()];
			 
			  $_SESSION["login"]   = $login;
			  $_SESSION["role"]    = $role;
			  $_SESSION["id_user"] =  $id_user;
			  $_SESSION['lastaccess'] = time();
			  //$_SESSION['remember_me'] = $remember;
			  
		      $Objcl->redirige(HOME1);
			  
		}
		else
		{
			 $message="Login ou mot de passe incorrect!";
			 $Objcl->message_box($message);
			 $Objcl->redirige(HOME.$Objcl->param_encode('login'));
		}
		
	}
	
	function controler_change_pass()
	{
		
		
		$Objcl=new Utilisateurs_class();
		
		$Cnn=$Objcl->ma_connexion();
		
		$old_pass=$_POST['OLD_PASS'];
		$new_pass=$_POST['NEW_PASS'];
		$login=$_POST['login_user'];
		$id_user=$_POST['id_user'];
		
		$Cnn->beginTransaction();
		
		try
		{
			
			if($Objcl->UpdateUserByLogin($old_pass,$new_pass,$login,$Cnn)==true)
			{
					
					
					$expediteur=$login;
					$message_mail=" Votre mot de pass a ete bien change \n Pass:".$new_pass;
					
					date("D,j M Y H:i:s");
					$entete = "MIME-Version:1.0\r\n";
					$entete.="Content-Type: text/html; charset=\"iso-8859-1\"";
					$entete.="From:$expediteur\n";
					$entete.="Cc:\n";
					$entete.="Replay-To:$expediteur\n";
					$entete.="Date:".date("D,j M Y H:i:s");
	              
					//@mail($mail, "Validation", $message_mail, $entete);
					
					 $recu=@mail($_POST['EMAIL'], "Validation", $message_mail, $entete);
					
					 
					 if(@$recu==true)
					 {
						$Cnn->commit();
						$message="Mot de passe changé avec success!";
						$Objcl->message_box($message);
						$Objcl->redirige(HOME.$Objcl->param_encode('deconnexion'));
					 }
					 else
					 {
						$Cnn->rollback();
						$message="Mot de passe non changé !";
						$Objcl->message_box($message);
						$Objcl->redirige(HOME.$Objcl->param_encode('change_pass')); 
					 }
				
			}
			else
			{
		        $Cnn->rollback();
				$message="Mot de passe non changé !";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('changer_pass'));
		
			}
			
		}
		catch(Exception $e)
		{
			$Cnn->rollback();
			$message="utilisateurs non enregistré!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('changer_pass'));
		}

		
	}

}

//*********************************
	@$joker=trim($_REQUEST["joker"]);
	$Obj=new Utilisateurs_controler();
	@$joker=$Obj->param_decode($joker);
	
    switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	case 4:{$obj_controler=$Obj->controler_connexion();break;}
	case 5:{$obj_controler=$Obj->controler_change_pass();break;}
	
	}

?>