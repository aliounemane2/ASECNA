<?php
if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);
Class Connaissances_linguistiques_controler extends Connaissances_linguistiques_class{

	//Controleur ajout
	function controler_ajout()
	{
	
		$Objcl=new Connaissances_linguistiques_class();
		$Tab_param=array(
			'LANGUE_ID'=>$_POST['LANGUE_ID'],
			'LANGUE_NOM'=>$_POST['LANGUE_NOM'],
			'LANGUE_ORALE'=>$_POST['LANGUE_ORALE'],
			'LANGUE_ECRITE'=>$_POST['LANGUE_ECRITE'],
			'LANGUE_LECTURE'=>$_POST['LANGUE_LECTURE'],
			'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

		$Cnn=$Objcl->ma_connexion();
		if($Objcl->ajouter_enreg_connaissances_linguistiques($Tab_param,$Cnn))
		{
	
			$message="connaissances_linguistiques enregistré avec succès!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_connaissances_linguistiques').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="connaissances_linguistiques non enregistré!";
	
			$Objcl->message_box($message);
	
			$Objcl->redirige(HOME.$Objcl->param_encode('ajout_connaissances_linguistiques').'&module='.$Objcl->param_encode('xxx'));
	
		}

	}

	//Controleur modifier
	function controler_modifier()
	{
	
			$Objcl=new Connaissances_linguistiques_class();
			$Tab_param=array(
				'LANGUE_ID'=>$_POST['LANGUE_ID'],
				'LANGUE_NOM'=>$_POST['LANGUE_NOM'],
				'LANGUE_ORALE'=>$_POST['LANGUE_ORALE'],
				'LANGUE_ECRITE'=>$_POST['LANGUE_ECRITE'],
				'LANGUE_LECTURE'=>$_POST['LANGUE_LECTURE'],
				'FK_CANDIDAT_ID'=>$_POST['FK_CANDIDAT_ID']);

			$Cnn=$Objcl->ma_connexion();
			if($Objcl->modifier_enreg_connaissances_linguistiques($Tab_param,$Cnn))
			{
	
				$message="connaissances_linguistiques modifié avec succès!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('liste_connaissances_linguistiques').'&module='.$Objcl->param_encode('xxx'));
	
			}
			else
			{
	
				$message="connaissances_linguistiques non modifié!";
	
				$Objcl->message_box($message);
	
				$Objcl->redirige(HOME.$Objcl->param_encode('detail_connaissances_linguistiques').'&module='.$Objcl->param_encode('xxx'));
	
			}

	}

	//Controleur supprimer
	function controler_supprimer()
	{
	
		$Objcl=new Connaissances_linguistiques_class();
	

		$id=$Objcl->param_decode(trim($_GET[xxx]));
		if($Objcl->supprimer_connaissances_linguistiques($id))
		{
	
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_connaissances_linguistiques').'&module='.$Objcl->param_encode('xxx'));
	
		}
		else
		{
	
			$message="ATTENTION!connaissances_linguistiques non supprimée!";
	
			$Objcl->message_box($message);
			$Objcl->redirige(HOME.$Objcl->param_encode('liste_connaissances_linguistiques').'&module='.$Objcl->param_encode('xxx'));
		}
		break;
	}

}

//*********************************
@$joker=trim($_REQUEST["joker"]);
$Obj=new Connaissances_linguistiques_controler();
@$joker=$Obj->param_decode($joker);
switch(trim($joker))
	{
	case 1:{$Obj->controler_ajout();break;}
	case 2:{$Obj->controler_modifier();break;}
	case 3:{$Obj->controler_supprimer();break;}
	
	}

?>