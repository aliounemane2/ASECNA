<?php
require_once($_SESSION['AVP_CONFIG']);
Class Departement_class extends Utilitaires_class{

//création du model 
protected $table_departement;
protected $champ_id;
protected $champ_libelle;

function __construct()
  {
	
	$this->table_departement=$Tab['departement'];
	$this->champ_id='id';
	$this->champ_libelle='libelle';

  }
 
// les getteurs 
function Get_table_departement(){return $this->table_departement;}
function GetCh_id(){return $this->champ_id;}
function GetCh_libelle(){return $this->champ_libelle;}

// création de la fonction Lister departement

function lister_departement($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_departement(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer departement

function supprimer_departement($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_departement(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_departement($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_departement()."(
	".$this->GetCh_id().",
	".$this->GetCh_libelle()."
	)
	VALUES(%s,%s)",

	$this->GetSQLValueString($param['id'], "text"),
	$this->GetSQLValueString($param['libelle'], "text"));

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

//modification des enregistrements de la table departement 

function modifier_enreg_departement($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_departement()." SET 
	".$this->GetCh_id()."=%s,
	".$this->GetCh_libelle()."=%s
	 WHERE ".$this->GetCh_id()."=%s",

	$this->GetSQLValueString($param['id'], "text"),
	$this->GetSQLValueString($param['libelle'], "text"));

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