<?php
require_once($_SESSION['AVP_CONFIG']);
Class Connaissances_informatiques_class extends Utilitaires_class{

//création du model 
protected $table_connaissances_informatiques;
protected $champ_INFORMATIQUE_ID;
protected $champ_LOGICIELS;
protected $champ_INFORMATIQUE_NIV;
protected $champ_FK_CANDIDAT_ID;

function __construct()
  {
	
	$this->table_connaissances_informatiques=$Tab['connaissances_informatiques'];
	$this->champ_INFORMATIQUE_ID='INFORMATIQUE_ID';
	$this->champ_LOGICIELS='LOGICIELS';
	$this->champ_INFORMATIQUE_NIV='INFORMATIQUE_NIV';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';

  }
 
// les getteurs 
function Get_table_connaissances_informatiques(){return $this->table_connaissances_informatiques;}
function GetCh_INFORMATIQUE_ID(){return $this->champ_INFORMATIQUE_ID;}
function GetCh_LOGICIELS(){return $this->champ_LOGICIELS;}
function GetCh_INFORMATIQUE_NIV(){return $this->champ_INFORMATIQUE_NIV;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}

// création de la fonction Lister connaissances_informatiques

function lister_connaissances_informatiques($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_connaissances_informatiques(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer connaissances_informatiques

function supprimer_connaissances_informatiques($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_connaissances_informatiques(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_connaissances_informatiques($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_connaissances_informatiques()."(
	".$this->GetCh_INFORMATIQUE_ID().",
	".$this->GetCh_LOGICIELS().",
	".$this->GetCh_INFORMATIQUE_NIV().",
	".$this->GetCh_FK_CANDIDAT_ID()."
	)
	VALUES(%s,%s,%s,%s)",

	$this->GetSQLValueString($param['INFORMATIQUE_ID'], "text"),
	$this->GetSQLValueString($param['LOGICIELS'], "text"),
	$this->GetSQLValueString($param['INFORMATIQUE_NIV'], "text"),
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

//modification des enregistrements de la table connaissances_informatiques 

function modifier_enreg_connaissances_informatiques($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_connaissances_informatiques()." SET 
	".$this->GetCh_INFORMATIQUE_ID()."=%s,
	".$this->GetCh_LOGICIELS()."=%s,
	".$this->GetCh_INFORMATIQUE_NIV()."=%s,
	".$this->GetCh_FK_CANDIDAT_ID()."=%s
	 WHERE ".$this->GetCh_INFORMATIQUE_ID()."=%s",

	$this->GetSQLValueString($param['INFORMATIQUE_ID'], "text"),
	$this->GetSQLValueString($param['LOGICIELS'], "text"),
	$this->GetSQLValueString($param['INFORMATIQUE_NIV'], "text"),
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