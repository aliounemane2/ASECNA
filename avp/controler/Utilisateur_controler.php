<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Utilisateur_controler extends Utilisateur_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Utilisateur_class();
        $Tab_date=$Objcl->date_heure_systeme_jjmmaa();
        
        
		$Tab_param=array(
		
			'id_utilisateur'=>$_POST['id_utilisateur'],
			'nom_utilisateur'=>$_POST['nom_utilisateur'],
			'prenom_utilisateur'=>$_POST['prenom_utilisateur'],
			'login_utilisateur'=>$_POST['login_utilisateur'],
			'pass_utilisateur'=>$_POST['pass_utilisateur'],
			'tel_utilisateur'=>$_POST['tel_utilisateur'],
			'mail_utilisateur'=>$_POST['mail_utilisateur'],
			'adresse_utilisateur'=>$_POST['adresse_utilisateur'],
			'login_enreg'=>$_SESSION[LOGIN],
			'date_enreg'=>$Tab_date['date_enreg'],
			'heure_enreg'=>$Tab_date['heure_enreg'],
			'actif_utilisateur'=>$_POST['actif_utilisateur']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_utilisateur($Tab_param,$Cnn))
		{
	
			$message="utilisateur enregistré avec succès!";
			$Objcl->message_box($message);
		    $Objcl->redirige("../accueil_admin.php?page=utilisateurs");
		}
		else
		{
	
			$message="utilisateur non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige("../accueil_admin.php?page=ajout_utilisateur");
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			 $Objcl=new Utilisateur_class();
             $Objcl_profil=new Profil_user_class();
             
			$Tab_param=array(
				
				'id_utilisateur'=>$_POST['id_utilisateur'],
				'nom_utilisateur'=>$_POST['nom_utilisateur'],
				'prenom_utilisateur'=>$_POST['prenom_utilisateur'],
				'login_utilisateur'=>$_POST['login_utilisateur'],
				'tel_utilisateur'=>$_POST['tel_utilisateur'],
				'mail_utilisateur'=>$_POST['mail_utilisateur'],
				'adresse_utilisateur'=>$_POST['adresse_utilisateur'],
				'actif_utilisateur'=>$_POST['actif_utilisateur']);
                
         if(!isset($_POST['id_profil']) || $_POST['id_profil']=="" || $_POST['id_profil']==NULL ) 
         {
                $id_profil=$Objcl_profil->num_suivant_profil();
            
            	$Tab_param_profil=array(
                            			'profil_param'=>$_POST['profil_param'],
                            			'profil_emploi_temp'=>$_POST['profil_emploi_temp'],
                            			'profil_etudiant'=>$_POST['profil_etudiant'],
                            			'profil_formation'=>$_POST['profil_formation'],
                            			'profil_inscription'=>$_POST['profil_inscription'],
                            			'id_profil'=>$id_profil,
                            			'id_utilisateur'=>$_POST['id_utilisateur']
                                        );
										
					$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_utilisateur($Tab_param,$Cnn)&& $Objcl_profil->ajouter_enreg_profil_user($Tab_param_profil,$Cnn))
			{
	
				$message="utilisateur modifié avec succès!";
				$Objcl->message_box($message);
				$Objcl->redirige("../accueil_admin.php?page=utilisateurs");
			}
			else
			{
	
				$message="utilisateur non modifié!";
				$Objcl->message_box($message);
				$Objcl->redirige("../accueil_admin.php?page=detail_utilisateur&=id_utilisateur=".$Objcl->param_encode($_POST['id_utilisateur']));
			}					
										
         }
         else
         {
                $Tab_param_profil=array(
                            			'profil_param'=>$_POST['profil_param'],
                            			'profil_emploi_temp'=>$_POST['profil_emploi_temp'],
                            			'profil_etudiant'=>$_POST['profil_etudiant'],
                            			'profil_formation'=>$_POST['profil_formation'],
                            			'profil_inscription'=>$_POST['profil_inscription'],
										'id_profil'=>$_POST['id_profil'],
                            			'id_utilisateur'=>$_POST['id_utilisateur']
                                        ); 
										
				$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_utilisateur($Tab_param,$Cnn)&& $Objcl_profil->modifier_enreg_profil_user($Tab_param_profil,$Cnn))
			{
	
				$message="utilisateur modifié avec succès!";
				$Objcl->message_box($message);
				$Objcl->redirige("../accueil_admin.php?page=utilisateurs");
			}
			else
			{
	
				$message="utilisateur non modifié!";
				$Objcl->message_box($message);
				$Objcl->redirige("../accueil_admin.php?page=detail_utilisateur&=id_utilisateur=".$Objcl->param_encode($_POST['id_utilisateur']));
			}						
										
            
         }
          
          
	


			

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Utilisateur_class();
	

		$id=$Objcl->param_decode(trim($_GET['id_utilisateur']));
		if($Objcl->supprimer_utilisateur($id))
		{
	
			$Objcl->redirige("../accueil_admin.php?page=utilisateurs");
		}
		else
		{
	
			$message="ATTENTION!utilisateur non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige("../accueil_admin.php?page=utilisateurs");
		}
		//break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Utilisateur_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>