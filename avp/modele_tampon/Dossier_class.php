<?php
require_once($_SESSION['AVP_CONFIG']);
Class Dossier_class extends Utilitaires_class{

//création du model 
protected $table_dossier;
protected $champ_DOSSIER_ID;
protected $champ_DOSSIER_NOM;
protected $champ_DOSSIER_LIEN;
protected $champ_FK_CANDIDAT_ID;

function __construct()
  {
	
	$this->table_dossier=$Tab['dossier'];
	$this->champ_DOSSIER_ID='DOSSIER_ID';
	$this->champ_DOSSIER_NOM='DOSSIER_NOM';
	$this->champ_DOSSIER_LIEN='DOSSIER_LIEN';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';

  }
 
// les getteurs 
function Get_table_dossier(){return $this->table_dossier;}
function GetCh_DOSSIER_ID(){return $this->champ_DOSSIER_ID;}
function GetCh_DOSSIER_NOM(){return $this->champ_DOSSIER_NOM;}
function GetCh_DOSSIER_LIEN(){return $this->champ_DOSSIER_LIEN;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}

// création de la fonction Lister dossier

function lister_dossier($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_dossier(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer dossier

function supprimer_dossier($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_dossier(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_dossier($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_dossier()."(
	".$this->GetCh_DOSSIER_ID().",
	".$this->GetCh_DOSSIER_NOM().",
	".$this->GetCh_DOSSIER_LIEN().",
	".$this->GetCh_FK_CANDIDAT_ID()."
	)
	VALUES(%s,%s,%s,%s)",

	$this->GetSQLValueString($param['DOSSIER_ID'], "text"),
	$this->GetSQLValueString($param['DOSSIER_NOM'], "text"),
	$this->GetSQLValueString($param['DOSSIER_LIEN'], "text"),
	$this->GetSQLValueString($param['FK_CANDIDAT_ID'], "text"));

	$retour=$Cnn->exec($insertSQL);

	if(($retour===false))
	  {
		return false;
	  }
 	else
	  {
		return true;
	  }
 
   } 

//modification des enregistrements de la table dossier 

function modifier_enreg_dossier($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_dossier()." SET 
	".$this->GetCh_DOSSIER_ID()."=%s,
	".$this->GetCh_DOSSIER_NOM()."=%s,
	".$this->GetCh_DOSSIER_LIEN()."=%s,
	".$this->GetCh_FK_CANDIDAT_ID()."=%s
	 WHERE ".$this->GetCh_DOSSIER_ID()."=%s",

	$this->GetSQLValueString($param['DOSSIER_ID'], "text"),
	$this->GetSQLValueString($param['DOSSIER_NOM'], "text"),
	$this->GetSQLValueString($param['DOSSIER_LIEN'], "text"),
	$this->GetSQLValueString($param['FK_CANDIDAT_ID'], "text"));

	$retour=$Cnn->exec($updateSQL);

	if(($retour===false))
	  {
		return false;
	  }
 	else
	  {
		return true;
	  }
 
   }


}
?>