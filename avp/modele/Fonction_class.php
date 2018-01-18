<?php
require_once($_SESSION['AVP_CONFIG']);
Class Fonction_class extends Utilitaires_class{

//création du model 
protected $table_fonction;
protected $champ_FONCTION_ID;
protected $champ_FONCTION_LIB;
protected $champ_FONCTION_DESC;

function __construct()
  {
	
	$this->table_fonction=$Tab['fonction'];
	$this->champ_FONCTION_ID='FONCTION_ID';
	$this->champ_FONCTION_LIB='FONCTION_LIB';
	$this->champ_FONCTION_DESC='FONCTION_DESC';

  }
 
// les getteurs 
function Get_table_fonction(){return $this->table_fonction;}
function GetCh_FONCTION_ID(){return $this->champ_FONCTION_ID;}
function GetCh_FONCTION_LIB(){return $this->champ_FONCTION_LIB;}
function GetCh_FONCTION_DESC(){return $this->champ_FONCTION_DESC;}

// création de la fonction Lister fonction

function lister_fonction($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_FONCTION_ID();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_fonction(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer fonction

function supprimer_fonction($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_fonction(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_fonction($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_fonction()."(
	".$this->GetCh_FONCTION_ID().",
	".$this->GetCh_FONCTION_LIB().",
	".$this->GetCh_FONCTION_DESC()."
	)
	VALUES(%s,%s,%s)",

	$this->GetSQLValueString($param['FONCTION_ID'], "text"),
	$this->GetSQLValueString($param['FONCTION_LIB'], "text"),
	$this->GetSQLValueString($param['FONCTION_DESC'], "text"));

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

//modification des enregistrements de la table fonction 

function modifier_enreg_fonction($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_fonction()." SET 
	".$this->GetCh_FONCTION_ID()."=%s,
	".$this->GetCh_FONCTION_LIB()."=%s,
	".$this->GetCh_FONCTION_DESC()."=%s
	 WHERE ".$this->GetCh_FONCTION_ID()."=%s",

	$this->GetSQLValueString($param['FONCTION_ID'], "text"),
	$this->GetSQLValueString($param['FONCTION_LIB'], "text"),
	$this->GetSQLValueString($param['FONCTION_DESC'], "text"));

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