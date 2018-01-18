<?php
require_once($_SESSION['AVP_CONFIG']);
Class Realisation_class extends Utilitaires_class{

//création du model 
protected $table_realisation;
protected $champ_REAL_ID;
protected $champ_REAL_LIB;
protected $champ_FK_CANDIDAT_ID;

function __construct()
  {
	
	$this->table_realisation=$Tab['realisation'];
	$this->champ_REAL_ID='REAL_ID';
	$this->champ_REAL_LIB='REAL_LIB';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';

  }
 
// les getteurs 
function Get_table_realisation(){return $this->table_realisation;}
function GetCh_REAL_ID(){return $this->champ_REAL_ID;}
function GetCh_REAL_LIB(){return $this->champ_REAL_LIB;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}

// création de la fonction Lister realisation

function lister_realisation($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_realisation(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer realisation

function supprimer_realisation($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_realisation(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_realisation($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_realisation()."(
	".$this->GetCh_REAL_ID().",
	".$this->GetCh_REAL_LIB().",
	".$this->GetCh_FK_CANDIDAT_ID()."
	)
	VALUES(%s,%s,%s)",

	$this->GetSQLValueString($param['REAL_ID'], "text"),
	$this->GetSQLValueString($param['REAL_LIB'], "text"),
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

//modification des enregistrements de la table realisation 

function modifier_enreg_realisation($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_realisation()." SET 
	".$this->GetCh_REAL_ID()."=%s,
	".$this->GetCh_REAL_LIB()."=%s,
	".$this->GetCh_FK_CANDIDAT_ID()."=%s
	 WHERE ".$this->GetCh_REAL_ID()."=%s",

	$this->GetSQLValueString($param['REAL_ID'], "text"),
	$this->GetSQLValueString($param['REAL_LIB'], "text"),
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