<?php
require_once($_SESSION['AVP_CONFIG']);
Class Famille_class extends Utilitaires_class{

//création du model 
protected $table_famille;
protected $champ_FAMILLE_ID;
protected $champ_FAMILLE_NOM;
protected $champ_FAMILLE_PRENOM;
protected $champ_FAMILLE_STRUCTURE;
protected $champ_FAMILLE_DEGRE;
protected $champ_FK_CANDIDAT_ID;

function __construct()
  {
	
	$this->table_famille=$Tab['famille'];
	$this->champ_FAMILLE_ID='FAMILLE_ID';
	$this->champ_FAMILLE_NOM='FAMILLE_NOM';
	$this->champ_FAMILLE_PRENOM='FAMILLE_PRENOM';
	$this->champ_FAMILLE_STRUCTURE='FAMILLE_STRUCTURE';
	$this->champ_FAMILLE_DEGRE='FAMILLE_DEGRE';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';

  }
 
// les getteurs 
function Get_table_famille(){return $this->table_famille;}
function GetCh_FAMILLE_ID(){return $this->champ_FAMILLE_ID;}
function GetCh_FAMILLE_NOM(){return $this->champ_FAMILLE_NOM;}
function GetCh_FAMILLE_PRENOM(){return $this->champ_FAMILLE_PRENOM;}
function GetCh_FAMILLE_STRUCTURE(){return $this->champ_FAMILLE_STRUCTURE;}
function GetCh_FAMILLE_DEGRE(){return $this->champ_FAMILLE_DEGRE;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}

// création de la fonction Lister famille

function lister_famille($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_famille(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer famille

function supprimer_famille($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_famille(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_famille($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_famille()."(
	".$this->GetCh_FAMILLE_ID().",
	".$this->GetCh_FAMILLE_NOM().",
	".$this->GetCh_FAMILLE_PRENOM().",
	".$this->GetCh_FAMILLE_STRUCTURE().",
	".$this->GetCh_FAMILLE_DEGRE().",
	".$this->GetCh_FK_CANDIDAT_ID()."
	)
	VALUES(%s,%s,%s,%s,%s,%s)",

	$this->GetSQLValueString($param['FAMILLE_ID'], "text"),
	$this->GetSQLValueString($param['FAMILLE_NOM'], "text"),
	$this->GetSQLValueString($param['FAMILLE_PRENOM'], "text"),
	$this->GetSQLValueString($param['FAMILLE_STRUCTURE'], "text"),
	$this->GetSQLValueString($param['FAMILLE_DEGRE'], "text"),
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

//modification des enregistrements de la table famille 

function modifier_enreg_famille($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_famille()." SET 
	".$this->GetCh_FAMILLE_ID()."=%s,
	".$this->GetCh_FAMILLE_NOM()."=%s,
	".$this->GetCh_FAMILLE_PRENOM()."=%s,
	".$this->GetCh_FAMILLE_STRUCTURE()."=%s,
	".$this->GetCh_FAMILLE_DEGRE()."=%s,
	".$this->GetCh_FK_CANDIDAT_ID()."=%s
	 WHERE ".$this->GetCh_FAMILLE_ID()."=%s",

	$this->GetSQLValueString($param['FAMILLE_ID'], "text"),
	$this->GetSQLValueString($param['FAMILLE_NOM'], "text"),
	$this->GetSQLValueString($param['FAMILLE_PRENOM'], "text"),
	$this->GetSQLValueString($param['FAMILLE_STRUCTURE'], "text"),
	$this->GetSQLValueString($param['FAMILLE_DEGRE'], "text"),
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