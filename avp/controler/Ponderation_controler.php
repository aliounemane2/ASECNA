<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Ponderation_controler extends Ponderation_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Ponderation_class();
		$Tab_param=array(
			
			'adequate_form'=>$_POST['adequate_form'],
			'pert_experience'=>$_POST['pert_experience'],
			'compt_specific'=>$_POST['compt_specific'],
			'expe_con_asecna'=>$_POST['expe_con_asecna'],
			'con_infor'=>$_POST['con_infor'],
			'motiv_comp_redact'=>$_POST['motiv_comp_redact'],
			'sens_initiative'=>$_POST['sens_initiative'],
			'autre_critere'=>$_POST['autre_critere'],
			'apt_manag_esprit'=>$_POST['apt_manag_esprit']);

		$Cnn=$Objcl->ma_connexion();
		
		if($Objcl->ajouter_enreg_ponderation($Tab_param,$Cnn))
		{
			//$message="ponderation enregistré avec succès!";
			//$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_ponderation'));
		}
		else
		{
			$message="ponderation non enregistré!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_ponderation'));
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Ponderation_class();
			$Tab_param=array(
				'id'=>$_POST['id'],
				'adequate_form'=>$_POST['adequate_form'],
				'pert_experience'=>$_POST['pert_experience'],
				'compt_specific'=>$_POST['compt_specific'],
				'expe_con_asecna'=>$_POST['expe_con_asecna'],
				'con_infor'=>$_POST['con_infor'],
				'motiv_comp_redact'=>$_POST['motiv_comp_redact'],
				'sens_initiative'=>$_POST['sens_initiative'],
				'autre_critere'=>$_POST['autre_critere'],
				'apt_manag_esprit'=>$_POST['apt_manag_esprit']);

			$Cnn=$Objcl->ma_connexion();
			
			if($Objcl->modifier_enreg_ponderation($Tab_param,$Cnn))
			{
				//$message="ponderation modifié avec succès!";
				//$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('ajout_ponderation'));
			}
			else
			{
				$message="ponderation non modifié!";
				$Objcl->message_box($message);
				$Objcl->redirige(HOME.$Objcl->param_encode('ajout_ponderation'));
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Ponderation_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		
		if($Objcl->supprimer_ponderation($id))
		{
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_ponderation').'&module='.$Objcl->param_encode('xxx'));
		}
		else
		{
			$message="ATTENTION!ponderation non supprimée!";
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_ponderation').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}
	
	function controler_calcul_ponderation()
	{
		
		$tabgr11=$_POST["gr11"];
		$tabgr12=$_POST["gr12"];
		
		$tabgr21=$_POST["gr21"];
		$tabgr22=$_POST["gr22"];
		$tabgr23=$_POST["gr23"];
		
		$tabgr31=$_POST["gr31"];
		$tabgr32=$_POST["gr32"];
		$tabgr33=$_POST["gr33"];
		$tabgr34=$_POST["gr34"];
		
		$annonce_id=$_POST["annonce_id"];
		
		$obj_ponderation=new Ponderation_class();
		$obj_postulation=new Postulation_class();
		$obj_candidat=new Candidat_class();
		
		$obj_cand_saisi_note=new Candidat_saisi_note_class();
		$Cnn=$obj_ponderation->ma_connexion();
		
		
		$liste_cand_retenu=$obj_candidat->lister_candidat_postul_retenu($annonce_id);
		$liste_ponderation=$obj_ponderation->lister_ponderation();
		
		
	    $adequate_form=$liste_ponderation[0][$obj_ponderation->GetCh_adequate_form()];
		$pert_experience=$liste_ponderation[0][$obj_ponderation->GetCh_pert_experience()];
		
		$compt_specific=$liste_ponderation[0][$obj_ponderation->GetCh_compt_specific()];
		$expe_con_asecna=$liste_ponderation[0][$obj_ponderation->GetCh_expe_con_asecna()];
		$apt_manag_esprit=$liste_ponderation[0][$obj_ponderation->GetCh_apt_manag_esprit()];
		
		
		$con_infor=$liste_ponderation[0][$obj_ponderation->GetCh_con_infor()];
		$motiv_comp_redact=$liste_ponderation[0][$obj_ponderation->GetCh_motiv_comp_redact()];
		$sens_initiative=$liste_ponderation[0][$obj_ponderation->GetCh_sens_initiative()];
		$autre_critere=$liste_ponderation[0][$obj_ponderation->GetCh_autre_critere()];
		
		
		
		$recu=true;
		$recu1=true;
		$mess=0;
		
		
	    $Cnn->beginTransaction();
	
	try{
		
		for($i=0;$i< sizeof($liste_cand_retenu);$i++)
		{
			$fk_util_id=$liste_cand_retenu[0][$obj_postulation->GetCh_FK_UTIL_ID()];
			$fk_annonce_id=$liste_cand_retenu[0][$obj_postulation->GetCh_FK_annonce_id()];
			
			$gr11=$_POST["gr11"][$i];
		    $gr12=$_POST["gr12"][$i];
		
			$gr21=$_POST["gr21"][$i];
			$gr22=$_POST["gr22"][$i];
			$gr23=$_POST["gr23"][$i];
			
			$gr31=$_POST["gr31"][$i];
			$gr32=$_POST["gr32"][$i];
			$gr33=$_POST["gr33"][$i];
			$gr34=$_POST["gr34"][$i];
			
			$retenu="oui";
			$param_candidat_saisi=array(
			
										'adequate_form'=>(intval($gr11)*intval($adequate_form)),
										'pert_experience'=>(intval($gr12)*intval($pert_experience)),
										
										'compt_specific'=>(intval($gr21)*intval($compt_specific)),
										'apt_manag_esprit'=>(intval($gr22)*intval($apt_manag_esprit)),
										'expe_con_asecna'=>(intval($gr23)*intval($expe_con_asecna)),
										
										'con_infor'=>( intval($gr31)*intval($con_infor)),
										'motiv_comp_redact'=>(intval($gr32)*intval($motiv_comp_redact)),
										'sens_initiative'=>(intval($gr33)*intval($sens_initiative)),
										'autre_critere'=>(intval($gr34)*intval($autre_critere)),
										'observation'=>$_POST['observation'],
										'FK_UTIL_ID'=>$fk_util_id,
										'FK_annonce_id'=>$fk_annonce_id
										
										
										);
			
			$tot1= intval($gr11)*intval($adequate_form) + intval($gr12)*intval($pert_experience);
			$tot2=intval($gr21) * intval($compt_specific) + intval($gr22)*intval($apt_manag_esprit) + intval($gr23)*intval($expe_con_asecna);
			$tot3= intval($gr31)*intval($con_infor) + intval($gr32)*intval($motiv_comp_redact) + intval($gr33)*intval($sens_initiative) + intval($gr34)*intval($autre_critere);
			
			
			$note=$tot1+$tot2+$tot3;
			
			@$recu=$obj_postulation->update_postulation($note,$fk_util_id,$fk_annonce_id,$retenu);
			
			@$recu1=$obj_cand_saisi_note->ajouter_enreg_candidat_saisi_note($param_candidat_saisi,$Cnn);
			
			if($recu==false || $recu1==false ){
			      $mess++;
		    }
			
		}
		
		 if($mess==0){ $Cnn->commit();}
		 else{ $Cnn->rollback();}
		 
		$obj_postulation->redirige(HOME.$obj_postulation->param_encode('saisi_note_ponderation')."&annonce_id=".$fk_annonce_id);
		 
	}catch(Exception $e)
	{
		 $Cnn->rollback();
		 $obj_postulation->redirige(HOME.$obj_postulation->param_encode('saisi_note_ponderation')."&annonce_id=".$fk_annonce_id);
	}
	
	}
	
	function controler_envoi_mail_candidat()
	{
		 $annonce_id=$_GET["annonce_id"];
		 $obj_postulation=new Postulation_class();
		 $obj_candidat=new Candidat_class();
		 $obj_utilisateurs=new Utilisateurs_class();
		 $obj_annonce=new Annonce_class();
		 
		 $liste_cand_saisi_note=$obj_postulation->liste_candidat_saisi_note_retenu($annonce_id);
		 $mess=0;
		 
		          
		 foreach($liste_cand_saisi_note as $row){
			 
			 $nom=$row[$obj_candidat->GetCh_CANDIDAT_NOM()];
			 $prenom=$row[$obj_candidat->GetCh_CANDIDAT_PRENOM()];
			 $civilite=$row[$obj_candidat->GetCh_CANDIDAT_CIVILITE()];
			 $mail=$row[$obj_utilisateurs->GetCh_UTIL_EMAIL()];
			 $annonce_num=$row[$obj_annonce->GetCh_ANNONCE_NUM()];
			 $annonce_titre=$row[$obj_annonce->GetCh_ANNONCE_TITRE()];
			 
			  $expediteur=$mail;
			  $message_mail='Bonjour '.$civilite." \n \r";
			  $message_mail='Vous avez eté retenu sur '.$annonce_num." \n \r";
			  $message_mail='Vous avez eté retenu sur '.$annonce_titre." \n \r";
			  $message_mail='Notre equipe vous contacterez';
					
			  date("D,j M Y H:i:s");
			  $entete = "MIME-Version:1.0\r\n";
			  $entete.="Content-Type: text/html; charset=\"iso-8859-1\"";
			  $entete.="From:$expediteur\n";
			  $entete.="Cc:\n";
			  $entete.="Replay-To:$expediteur\n";
			  $entete.="Date:".date("D,j M Y H:i:s");
			   
			  $recu=@mail($_POST['EMAIL'], "Validation", $message_mail, $entete);
			  
			  if($recu==false){
				  $mess++; 
			  }
		 }
		 
		 if($mess==0){
			 
			$message="Le mail a eté envoyer au candidats retenus";
			$obj_postulation->message_box($message);
			$obj_postulation->redirige(HOME.$obj_postulation->param_encode('saisi_note_ponderation')."&annonce_id=".$fk_annonce_id); 
		 }
	}
	
	

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Ponderation_controler();
@$joker=$Obj->param_decode($joker);

    switch(trim($joker))
	{
		case 1:{$Obj->controler_ajout();break;}
		case 2:{$Obj->controler_modifier();break;}
		case 3:{$Obj->controler_supprimer();break;}
		case 4:{$Obj->controler_calcul_ponderation();break;}
		case 5:{$Obj->controler_envoi_mail_candidat();break;}
	}

?>