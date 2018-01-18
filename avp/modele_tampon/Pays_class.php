<?php
require_once($_SESSION['AVP_CONFIG']);
Class Pays_class extends Utilitaires_class{

//création du model 
protected $table_pays;
protected $champ_id;
protected $champ_code;
protected $champ_nom_pays;

function __construct()
  {
	
	$this->table_pays=$Tab['pays'];
	$this->champ_id='id';
	$this->champ_code='code';
	$this->champ_nom_pays='nom_pays';

  }
 
// les getteurs 
function Get_table_pays(){return $this->table_pays;}
function GetCh_id(){return $this->champ_id;}
function GetCh_code(){return $this->champ_code;}
function GetCh_nom_pays(){return $this->champ_nom_pays;}

// création de la fonction Lister pays

function lister_pays($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_pays(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer pays

function supprimer_pays($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_pays(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_pays($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_pays()."(
	".$this->GetCh_id().",
	".$this->GetCh_code().",
	".$this->GetCh_nom_pays()."
	)
	VALUES(%s,%s,%s)",

	$this->GetSQLValueString($param['id'], "text"),
	$this->GetSQLValueString($param['code'], "text"),
	$this->GetSQLValueString($param['nom_pays'], "text"));

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

//modification des enregistrements de la table pays 

function modifier_enreg_pays($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_pays()." SET 
	".$this->GetCh_id()."=%s,
	".$this->GetCh_code()."=%s,
	".$this->GetCh_nom_pays()."=%s
	 WHERE ".$this->GetCh_id()."=%s",

	$this->GetSQLValueString($param['id'], "text"),
	$this->GetSQLValueString($param['code'], "text"),
	$this->GetSQLValueString($param['nom_pays'], "text"));

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