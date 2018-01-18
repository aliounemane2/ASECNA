<?php
require_once($_SESSION['AVP_CONFIG']);
Class Connaissances_linguistiques_class extends Utilitaires_class{

//création du model 
protected $table_connaissances_linguistiques;
protected $champ_LANGUE_ID;
protected $champ_LANGUE_NOM;
protected $champ_LANGUE_ORALE;
protected $champ_LANGUE_ECRITE;
protected $champ_LANGUE_LECTURE;
protected $champ_FK_CANDIDAT_ID;

function __construct()
  {
	
	$this->table_connaissances_linguistiques=$Tab['connaissances_linguistiques'];
	$this->champ_LANGUE_ID='LANGUE_ID';
	$this->champ_LANGUE_NOM='LANGUE_NOM';
	$this->champ_LANGUE_ORALE='LANGUE_ORALE';
	$this->champ_LANGUE_ECRITE='LANGUE_ECRITE';
	$this->champ_LANGUE_LECTURE='LANGUE_LECTURE';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';

  }
 
// les getteurs 
function Get_table_connaissances_linguistiques(){return $this->table_connaissances_linguistiques;}
function GetCh_LANGUE_ID(){return $this->champ_LANGUE_ID;}
function GetCh_LANGUE_NOM(){return $this->champ_LANGUE_NOM;}
function GetCh_LANGUE_ORALE(){return $this->champ_LANGUE_ORALE;}
function GetCh_LANGUE_ECRITE(){return $this->champ_LANGUE_ECRITE;}
function GetCh_LANGUE_LECTURE(){return $this->champ_LANGUE_LECTURE;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}

// création de la fonction Lister connaissances_linguistiques

function lister_connaissances_linguistiques($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_connaissances_linguistiques(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer connaissances_linguistiques

function supprimer_connaissances_linguistiques($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_connaissances_linguistiques(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_connaissances_linguistiques($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_connaissances_linguistiques()."(
	".$this->GetCh_LANGUE_ID().",
	".$this->GetCh_LANGUE_NOM().",
	".$this->GetCh_LANGUE_ORALE().",
	".$this->GetCh_LANGUE_ECRITE().",
	".$this->GetCh_LANGUE_LECTURE().",
	".$this->GetCh_FK_CANDIDAT_ID()."
	)
	VALUES(%s,%s,%s,%s,%s,%s)",

	$this->GetSQLValueString($param['LANGUE_ID'], "text"),
	$this->GetSQLValueString($param['LANGUE_NOM'], "text"),
	$this->GetSQLValueString($param['LANGUE_ORALE'], "text"),
	$this->GetSQLValueString($param['LANGUE_ECRITE'], "text"),
	$this->GetSQLValueString($param['LANGUE_LECTURE'], "text"),
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

//modification des enregistrements de la table connaissances_linguistiques 

function modifier_enreg_connaissances_linguistiques($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_connaissances_linguistiques()." SET 
	".$this->GetCh_LANGUE_ID()."=%s,
	".$this->GetCh_LANGUE_NOM()."=%s,
	".$this->GetCh_LANGUE_ORALE()."=%s,
	".$this->GetCh_LANGUE_ECRITE()."=%s,
	".$this->GetCh_LANGUE_LECTURE()."=%s,
	".$this->GetCh_FK_CANDIDAT_ID()."=%s
	 WHERE ".$this->GetCh_LANGUE_ID()."=%s",

	$this->GetSQLValueString($param['LANGUE_ID'], "text"),
	$this->GetSQLValueString($param['LANGUE_NOM'], "text"),
	$this->GetSQLValueString($param['LANGUE_ORALE'], "text"),
	$this->GetSQLValueString($param['LANGUE_ECRITE'], "text"),
	$this->GetSQLValueString($param['LANGUE_LECTURE'], "text"),
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