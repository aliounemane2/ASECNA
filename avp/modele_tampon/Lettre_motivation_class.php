<?php
require_once($_SESSION['AVP_CONFIG']);
Class Lettre_motivation_class extends Utilitaires_class{

//création du model 
protected $table_lettre_motivation;
protected $champ_LETTRE_MOTIVATION_ID;
protected $champ_LETTRE_MOTIVATION;
protected $champ_FK_CANDIDAT_ID;
protected $champ_FK_ANNONCE_ID;

function __construct()
  {
	
	$this->table_lettre_motivation=$Tab['lettre_motivation'];
	$this->champ_LETTRE_MOTIVATION_ID='LETTRE_MOTIVATION_ID';
	$this->champ_LETTRE_MOTIVATION='LETTRE_MOTIVATION';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';
	$this->champ_FK_ANNONCE_ID='FK_ANNONCE_ID';

  }
 
// les getteurs 
function Get_table_lettre_motivation(){return $this->table_lettre_motivation;}
function GetCh_LETTRE_MOTIVATION_ID(){return $this->champ_LETTRE_MOTIVATION_ID;}
function GetCh_LETTRE_MOTIVATION(){return $this->champ_LETTRE_MOTIVATION;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}
function GetCh_FK_ANNONCE_ID(){return $this->champ_FK_ANNONCE_ID;}

// création de la fonction Lister lettre_motivation

function lister_lettre_motivation($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_lettre_motivation(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer lettre_motivation

function supprimer_lettre_motivation($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_lettre_motivation(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_lettre_motivation($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_lettre_motivation()."(
	".$this->GetCh_LETTRE_MOTIVATION_ID().",
	".$this->GetCh_LETTRE_MOTIVATION().",
	".$this->GetCh_FK_CANDIDAT_ID().",
	".$this->GetCh_FK_ANNONCE_ID()."
	)
	VALUES(%s,%s,%s,%s)",

	$this->GetSQLValueString($param['LETTRE_MOTIVATION_ID'], "text"),
	$this->GetSQLValueString($param['LETTRE_MOTIVATION'], "text"),
	$this->GetSQLValueString($param['FK_CANDIDAT_ID'], "text"),
	$this->GetSQLValueString($param['FK_ANNONCE_ID'], "text"));

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

//modification des enregistrements de la table lettre_motivation 

function modifier_enreg_lettre_motivation($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_lettre_motivation()." SET 
	".$this->GetCh_LETTRE_MOTIVATION_ID()."=%s,
	".$this->GetCh_LETTRE_MOTIVATION()."=%s,
	".$this->GetCh_FK_CANDIDAT_ID()."=%s,
	".$this->GetCh_FK_ANNONCE_ID()."=%s
	 WHERE ".$this->GetCh_LETTRE_MOTIVATION_ID()."=%s",

	$this->GetSQLValueString($param['LETTRE_MOTIVATION_ID'], "text"),
	$this->GetSQLValueString($param['LETTRE_MOTIVATION'], "text"),
	$this->GetSQLValueString($param['FK_CANDIDAT_ID'], "text"),
	$this->GetSQLValueString($param['FK_ANNONCE_ID'], "text"));

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