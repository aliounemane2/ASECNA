<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Postulation_controler extends Postulation_class{

	//Controleur ajout
	function controler_ajout()
	{
	
	    $fk_annonce_id=$_POST['FK_annonce_id'];
		$fk_util_id=$_POST['FK_UTIL_ID'];
		
		//-------------- recuperer les info de l'annonce --------------//
		
		  $obj_annonce=new Annonce_class();
		  $Objcl=new Postulation_class();
		  
		  $liste_annonce=$obj_annonce->lister_annonce($fk_annonce_id);
		  $postulation_age=$liste_annonce[0][$obj_annonce->GetCh_ANNONCE_AGE()];
		
		//-----------------Recuperer la date du jour------------------  //
		
		     
			 $Tab_date=$obj_annonce->date_heure_systeme_jjmmaa();
			 
			 $postulation_date=$Tab_date["date_enreg"];
			 
			 ($Objcl->La_date_est_fr($postulation_date)==true) ? $postulation_date=$Objcl->datefr2en($postulation_date): $postulation_date;
			 
			 $postulation_heure=$Tab_date["heure_enreg"];
			 
			 $date_postule=$postulation_date;
		
		//----------------------------------------------------------//
	
		
		
		$Tab_param=array(
							'postulation_date'=>$date_postule,
							'FK_UTIL_ID'=>$fk_util_id,
							'postulation_age_candidat'=>$postulation_age,
							'FK_annonce_id'=>$fk_annonce_id
			            );

		$Cnn=$Objcl->ma_connexion();
		
		$Cnn->beginTransaction();
		
		try
		{	
			if($Objcl->ajouter_enreg_postulation($Tab_param,$Cnn))
			{
				$Cnn->commit();
				//$message="postulation enregistré avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('validation_reussie'));
			}
			else
			{
				$Cnn->rollback();
				$message="postulation non enregistré!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('form_validate')."&annonce_id=".$fk_annonce_id);
			}
		}
		catch(Exception $e)
		{
			$Cnn->rollback();
			$message="postulation non enregistré!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('form_validate')."&annonce_id=".$fk_annonce_id);
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Postulation_class();
			
			
			$Tab_param=array(
				'postulation_id'=>$_POST['postulation_id'],
				'postulation_date'=>$_POST['postulation_date'],
				'FK_UTIL_ID'=>$_POST['FK_UTIL_ID'],
				'postulation_age_candidat'=>$_POST['postulation_age_candidat'],
				'FK_annonce_id'=>$_POST['FK_annonce_id']);

			$Cnn=$Objcl->ma_connexion();
			
		$Cnn->beginTransaction();
		
		try
		{	
			if($Objcl->modifier_enreg_postulation($Tab_param,$Cnn))
			{
	
				//$message="postulation modifié avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_postulation').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
				$Cnn->rollback();
				$message="postulation non modifié!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_postulation').'&module='.$Objcl->param_encode('xxx'));
	
			}
		}
		catch(Exception $e)
		{
			
		}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Postulation_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_postulation($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_postulation').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!postulation non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_postulation').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}
	
	function controler_candidats_retenu()
	{    
	     $recu_str=$_GET["tab"];
		 
		 
		 $recu=explode(",",$recu_str);
	     $id_annonce=$_GET['annonce_id'];
		 $obj_postule=new Postulation_class();
		 $Cnn= $obj_postule->ma_connexion();
		 $mess=0;
		 
        $Cnn->beginTransaction();
		
		try
		{
			   for($kl=0;$kl< sizeof($recu);$kl++)
			   {
				  
					$fk_util_id=$recu[$kl];
					$preselection="OUI";
					
					$recu=$obj_postule->update_topic_postul($preselection,$fk_util_id,$id_annonce);
					
					if($recu==true){$mess++;}
			   }
			   
			   if($mess==0)
			   {
				   $Cnn->commit();
				   $message="Un mail a eté envoyé à tous les candidats retenus!";
				   $obj_postule->message_box($message);
				   $obj_postule->redirige(HOME.$obj_postule->param_encode('liste_des_postulants')."&annonce_id=".$id_annonce);
				   
			   }
			   else
			   {
				   $Cnn->rollback();  
				   $message="L'envoi mail a echoué!";
				   $obj_postule->message_box($message);
				   $obj_postule->redirige(HOME.$obj_postule->param_encode('liste_des_postulants')."&annonce_id=".$id_annonce);
			   }
			   
		}catch(Exception $e){
			
			$cnn->rollback();
			
		}
		
		
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Postulation_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	case 4:{$Obj->controler_candidats_retenu();break;}
	}

?>