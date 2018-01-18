<?php
require_once($_SESSION['AVP_CONFIG']);
Class Postulation_class extends Utilitaires_class{

//création du model 
protected $table_postulation;
protected $champ_postulation_id;
protected $champ_postulation_date;
protected $champ_FK_UTIL_ID;
protected $champ_postulation_age_candidat;
protected $champ_FK_annonce_id;

function __construct()
  {
	
	$this->table_postulation=$Tab['postulation'];
	$this->champ_postulation_id='postulation_id';
	$this->champ_postulation_date='postulation_date';
	$this->champ_FK_UTIL_ID='FK_UTIL_ID';
	$this->champ_postulation_age_candidat='postulation_age_candidat';
	$this->champ_FK_annonce_id='FK_annonce_id';

  }
 
// les getteurs 
function Get_table_postulation(){return $this->table_postulation;}
function GetCh_postulation_id(){return $this->champ_postulation_id;}
function GetCh_postulation_date(){return $this->champ_postulation_date;}
function GetCh_FK_UTIL_ID(){return $this->champ_FK_UTIL_ID;}
function GetCh_postulation_age_candidat(){return $this->champ_postulation_age_candidat;}
function GetCh_FK_annonce_id(){return $this->champ_FK_annonce_id;}

// création de la fonction Lister postulation

function lister_postulation($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_postulation(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer postulation

function supprimer_postulation($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_postulation(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_postulation($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_postulation()."(
	".$this->GetCh_postulation_id().",
	".$this->GetCh_postulation_date().",
	".$this->GetCh_FK_UTIL_ID().",
	".$this->GetCh_postulation_age_candidat().",
	".$this->GetCh_FK_annonce_id()."
	)
	VALUES(%s,%s,%s,%s,%s)",

	$this->GetSQLValueString($param['postulation_id'], "text"),
	$this->GetSQLValueString($param['postulation_date'], "text"),
	$this->GetSQLValueString($param['FK_UTIL_ID'], "text"),
	$this->GetSQLValueString($param['postulation_age_candidat'], "text"),
	$this->GetSQLValueString($param['FK_annonce_id'], "text"));

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

//modification des enregistrements de la table postulation 

function modifier_enreg_postulation($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_postulation()." SET 
	".$this->GetCh_postulation_id()."=%s,
	".$this->GetCh_postulation_date()."=%s,
	".$this->GetCh_FK_UTIL_ID()."=%s,
	".$this->GetCh_postulation_age_candidat()."=%s,
	".$this->GetCh_FK_annonce_id()."=%s
	 WHERE ".$this->GetCh_postulation_id()."=%s",

	$this->GetSQLValueString($param['postulation_id'], "text"),
	$this->GetSQLValueString($param['postulation_date'], "text"),
	$this->GetSQLValueString($param['FK_UTIL_ID'], "text"),
	$this->GetSQLValueString($param['postulation_age_candidat'], "text"),
	$this->GetSQLValueString($param['FK_annonce_id'], "text"));

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