<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Connaissances_informatiques_controler extends Connaissances_informatiques_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Connaissances_informatiques_class();
		$Tab_param=array(
			'INFORMATIQUE_ID'=>$_POST['INFORMATIQUE_ID'],
			'LOGICIELS'=>$_POST['LOGICIELS'],
			'INFORMATIQUE_NIV'=>$_POST['INFORMATIQUE_NIV'],
			'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_connaissances_informatiques($Tab_param,$Cnn))
		{
	
			$message="connaissances_informatiques enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_connaissances_informatiques').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="connaissances_informatiques non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_connaissances_informatiques').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Connaissances_informatiques_class();
			$Tab_param=array(
				'INFORMATIQUE_ID'=>$_POST['INFORMATIQUE_ID'],
				'LOGICIELS'=>$_POST['LOGICIELS'],
				'INFORMATIQUE_NIV'=>$_POST['INFORMATIQUE_NIV'],
				'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_connaissances_informatiques($Tab_param,$Cnn))
			{
	
				$message="connaissances_informatiques modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_connaissances_informatiques').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="connaissances_informatiques non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_connaissances_informatiques').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Connaissances_informatiques_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_connaissances_informatiques($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_connaissances_informatiques').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!connaissances_informatiques non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_connaissances_informatiques').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Connaissances_informatiques_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>