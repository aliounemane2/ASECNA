<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
class Annonce_controler extends Annonce_class{

	//Controleur ajout
	function controler_ajout()
	{
	 
		    $Objcl=new Annonce_class();
		
		    $tmp_name=$_FILES['ANNONCE_LIEN']['tmp_name']; 
            $name=$_FILES['ANNONCE_LIEN']['name']; 
            
            $ext_st=pathinfo($name);
            $extension=$ext_st['extension'];
            
            $size=$_FILES['ANNONCE_LIEN']['size']; 
            $type=$_FILES['ANNONCE_LIEN']['type']; 
            $erreur=$_FILES['ANNONCE_LIEN']['error'];
			
			//* creation chemin avec variable globales ****/
			
			$uploadpath=ANNONCE_DIR; 
			$path_filename=$uploadpath.$name;
			$path_source=$tmp_name;
			
		    //****  tableau des extensions exclus  ******//
			
			 $extensions_permis= array('pdf','xpdf');
			 $nom_sans_ext=substr($name,0,-4);
			 
			 $lien="";
			
			 if(in_array($extension,$extensions_permis))
			 {
				if(move_uploaded_file($path_source,$path_filename)==true)
				{
				   $lien=$name;
				}
				
			 }
			 
		    $tab_date=$Objcl->date_heure_systeme_jjmmaa();
			
			$date_syst=$tab_date["date_enreg"];
			$heure_enreg=$tab_date["heure_enreg"];
			
			
			($Objcl->La_date_est_fr($date_syst)==true) ? $date_syst=$Objcl->dateswitch($date_syst):$date_syst;
			
			 $obj_secteur=new Secteur_class();
			
			$annonce_date_deb=$_POST['ANNONCE_DATE_DEB'];
			$annonce_date_fin=$_POST['ANNONCE_DATE_FIN'];
			$annonce_delai_age=$_POST['ANNONCE_DELAI_AGE'];
			
		($Objcl->La_date_est_fr($annonce_date_deb)==true) ? $annonce_date_deb=$Objcl->dateswitch($annonce_date_deb): $annonce_date_deb;
		($Objcl->La_date_est_fr($annonce_date_fin)==true) ? $annonce_date_fin=$Objcl->dateswitch($annonce_date_fin): $annonce_date_fin;
		($Objcl->La_date_est_fr($annonce_delai_age)==true)? $annonce_delai_age=$Objcl->dateswitch($annonce_delai_age):$annonce_delai_age;
		
		
		$Tab_param=array(
			
			'ANNONCE_NUM'=>$_POST['ANNONCE_NUM'],
			'ANNONCE_TITRE'=>$_POST['ANNONCE_TITRE'],
			'ANNONCE_DESCRIPTION'=>$_POST['ANNONCE_DESCRIPTION'],
			'ANNONCE_LIEN'=>$lien,
			'ANNONCE_DATE_DEB'=>$annonce_date_deb,
			'ANNONCE_DATE_FIN'=>$annonce_date_fin,
			'ANNONCE_DATE_CREATION'=>$date_syst." ".$heure_enreg,
			'ANNONCE_AGE'=>$_POST['ANNONCE_AGE'],
			'ANNONCE_DELAI_AGE'=>$annonce_delai_age,
			'SECTEUR'=>$_POST['SECTEUR'],
			'DEPARTEMENT'=>$_POST['DEPARTEMENT'],
			'ETAT'=>"EN COURS");
			
		

		 $Cnn=$Objcl->ma_connexion();
			
		 $Cnn->beginTransaction();
		
		 try
		 {	
		
			if($Objcl->ajouter_enreg_annonce($Tab_param,$Cnn))
			{  
			    $Cnn->commit();
				//$message="annonce enregistré avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_des_avps'));
			}
			else
			{  
			    $Cnn->rollback();
				$message="annonce non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('annonces'));
			}
		 }
		 catch(Exception $e)
		 {
			    $Cnn->rollback();
				$message="annonce non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('annonces'));
		 }

	}

	//Controleur modifier
	function controler_modifier()
	{
	
	    $Objcl=new Annonce_class();
			
     //********************************************************//
			
		$old_lien=$_POST["OLD_ANNONCE_LIEN"];
		$name=@$_FILES['ANNONCE_LIEN']['name'];
		$lien="";	 
				 
		 if($old_lien!=$name  && $name!="")
		 {
			$tmp_name=$_FILES['ANNONCE_LIEN']['tmp_name']; 
            $name=$_FILES['ANNONCE_LIEN']['name']; 
            
            $ext_st=pathinfo($name);
            $extension=$ext_st['extension'];
            
            $size=$_FILES['ANNONCE_LIEN']['size']; 
            $type=$_FILES['ANNONCE_LIEN']['type']; 
            $erreur=$_FILES['ANNONCE_LIEN']['error'];
			
			//* creation chemin avec variable globales ****/
			
				$uploadpath=ANNONCE_DIR; 
				$path_filename=$uploadpath.$name;
				$path_source=$tmp_name;
			
		    //****  tableau des extensions exclus  ******//
			
			 $extensions_exclus= array('pdf','xpdf');
			 $nom_sans_ext=substr($name,0,-4);
			 
			     if(in_array($extension,$extensions_exclus))
				 {
					if(move_uploaded_file($path_source,$path_filename)==true)
					{
					   $lien=$name;
					}
				 }
		 }
		 else
		 {
			 $lien=$old_lien;
		 }
			
  //*******************************************************//
  
  
            $annonce_date_deb=$_POST['ANNONCE_DATE_DEB'];
			$annonce_date_fin=$_POST['ANNONCE_DATE_FIN'];
			$annonce_delai_age=$_POST['ANNONCE_DELAI_AGE'];
			
		($Objcl->La_date_est_fr($annonce_date_deb)==true) ? $annonce_date_deb=$Objcl->dateswitch($annonce_date_deb): $annonce_date_deb;
		($Objcl->La_date_est_fr($annonce_date_fin)==true) ? $annonce_date_fin=$Objcl->dateswitch($annonce_date_fin): $annonce_date_fin;
		($Objcl->La_date_est_fr($annonce_delai_age)==true)? $annonce_delai_age=$Objcl->dateswitch($annonce_delai_age):$annonce_delai_age;
			
			
			$Tab_param=array(
				
				'ANNONCE_NUM'=>$_POST['ANNONCE_NUM'],
				'ANNONCE_TITRE'=>$_POST['ANNONCE_TITRE'],
				'ANNONCE_DESCRIPTION'=>$_POST['ANNONCE_DESCRIPTION'],
				'ANNONCE_LIEN'=>$lien,
				'ANNONCE_DATE_DEB'=> $annonce_date_deb,
				'ANNONCE_DATE_FIN'=> $annonce_date_fin,
				'ANNONCE_DATE_CREATION'=>$annonce_delai_age,
				'ANNONCE_AGE'=>$_POST['ANNONCE_AGE'],
				'ANNONCE_DELAI_AGE'=>$annonce_delai_age,
				'SECTEUR'=>$_POST['SECTEUR'],
				'ETAT'=>$_POST['ETAT'],
				'DEPARTEMENT'=>$_POST['DEPARTEMENT'],
				'ANNONCE_ID'=>$_POST['ANNONCE_ID']
				
				);
			
				
			
				
			$Cnn=$Objcl->ma_connexion();
			
			$Cnn->beginTransaction();
			
			try
			{
			
				if($Objcl->modifier_enreg_annonce($Tab_param,$Cnn))
				{
					$Cnn->commit();
					$message="annonce modifié avec succès!";
					//$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('liste_des_avps'));
				}
				else
				{
					$Cnn->rollback();
					$message="annonce non modifié!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('annonce_detail&annonce_id='.$_POST['ANNONCE_ID']));
				}
			}
			catch(Exception $e)
			{
				    $Cnn->rollback();
					$message="annonce non modifié!";
					$Objcl->message_box($message);
					$Objcl->redirige(HOME.$Objcl->param_encode('annonce_detail&annonce_id='.$_POST['ANNONCE_ID']));
			}
			
	}
	
		//Controleur supprimer
		
		function controler_supprimer()
		{
		
			$Objcl=new Annonce_class();
			$id=$Objcl->param_decode(trim($_GET["annonce_id"]));
			
			if($Objcl->supprimer_annonce($id))
			{
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_des_avps'));
			}
			else
			{
				$message="ATTENTION!annonce non supprimée!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_des_avps'));
			}
			break;
		}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);

$Obj=new Annonce_controler();
@$joker=$Obj->param_decode($joker);

    switch(trim($joker))
	{
		case 1:{$Obj->controler_ajout();break;}
		case 2:{$Obj->controler_modifier();break;}
		case 3:{$Obj->controler_supprimer();break;}
	}

?>