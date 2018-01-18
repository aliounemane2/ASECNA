<?php
require_once($_SESSION['AVP_CONFIG']);
Class Secteur_class extends Utilitaires_class{

//création du model 
protected $table_secteur;
protected $champ_id;
protected $champ_domaine;

function __construct()
  {
	
	$this->table_secteur=$Tab['secteur'];
	$this->champ_id='id';
	$this->champ_domaine='domaine';

  }
 
// les getteurs 
function Get_table_secteur(){return $this->table_secteur;}
function GetCh_id(){return $this->champ_id;}
function GetCh_domaine(){return $this->champ_domaine;}

// création de la fonction Lister secteur

function lister_secteur($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_secteur(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer secteur

function supprimer_secteur($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_secteur(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_secteur($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_secteur()."(
	".$this->GetCh_id().",
	".$this->GetCh_domaine()."
	)
	VALUES(%s,%s)",

	$this->GetSQLValueString($param['id'], "text"),
	$this->GetSQLValueString($param['domaine'], "text"));

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

//modification des enregistrements de la table secteur 

function modifier_enreg_secteur($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_secteur()." SET 
	".$this->GetCh_id()."=%s,
	".$this->GetCh_domaine()."=%s
	 WHERE ".$this->GetCh_id()."=%s",

	$this->GetSQLValueString($param['id'], "text"),
	$this->GetSQLValueString($param['domaine'], "text"));

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