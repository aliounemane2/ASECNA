<?php
require_once($_SESSION['AVP_CONFIG']);
Class Reference_class extends Utilitaires_class{

//création du model 
protected $table_reference;
protected $champ_REF_ID;
protected $champ_REF_NOM_ENT;
protected $champ_REF_PERS_CONT;
protected $champ_REF_POST_OCC;
protected $champ_REF_TEL;
protected $champ_REF_EMAIL;
protected $champ_FK_CANDIDAT_ID;

function __construct()
  {
	
	$this->table_reference=$Tab['reference'];
	$this->champ_REF_ID='REF_ID';
	$this->champ_REF_NOM_ENT='REF_NOM_ENT';
	$this->champ_REF_PERS_CONT='REF_PERS_CONT';
	$this->champ_REF_POST_OCC='REF_POST_OCC';
	$this->champ_REF_TEL='REF_TEL';
	$this->champ_REF_EMAIL='REF_EMAIL';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';

  }
 
// les getteurs 
function Get_table_reference(){return $this->table_reference;}
function GetCh_REF_ID(){return $this->champ_REF_ID;}
function GetCh_REF_NOM_ENT(){return $this->champ_REF_NOM_ENT;}
function GetCh_REF_PERS_CONT(){return $this->champ_REF_PERS_CONT;}
function GetCh_REF_POST_OCC(){return $this->champ_REF_POST_OCC;}
function GetCh_REF_TEL(){return $this->champ_REF_TEL;}
function GetCh_REF_EMAIL(){return $this->champ_REF_EMAIL;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}

// création de la fonction Lister reference

function lister_reference($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_reference(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer reference

function supprimer_reference($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_reference(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_reference($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_reference()."(
	".$this->GetCh_REF_ID().",
	".$this->GetCh_REF_NOM_ENT().",
	".$this->GetCh_REF_PERS_CONT().",
	".$this->GetCh_REF_POST_OCC().",
	".$this->GetCh_REF_TEL().",
	".$this->GetCh_REF_EMAIL().",
	".$this->GetCh_FK_CANDIDAT_ID()."
	)
	VALUES(%s,%s,%s,%s,%s,%s,%s)",

	$this->GetSQLValueString($param['REF_ID'], "text"),
	$this->GetSQLValueString($param['REF_NOM_ENT'], "text"),
	$this->GetSQLValueString($param['REF_PERS_CONT'], "text"),
	$this->GetSQLValueString($param['REF_POST_OCC'], "text"),
	$this->GetSQLValueString($param['REF_TEL'], "text"),
	$this->GetSQLValueString($param['REF_EMAIL'], "text"),
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

//modification des enregistrements de la table reference 

function modifier_enreg_reference($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_reference()." SET 
	".$this->GetCh_REF_ID()."=%s,
	".$this->GetCh_REF_NOM_ENT()."=%s,
	".$this->GetCh_REF_PERS_CONT()."=%s,
	".$this->GetCh_REF_POST_OCC()."=%s,
	".$this->GetCh_REF_TEL()."=%s,
	".$this->GetCh_REF_EMAIL()."=%s,
	".$this->GetCh_FK_CANDIDAT_ID()."=%s
	 WHERE ".$this->GetCh_REF_ID()."=%s",

	$this->GetSQLValueString($param['REF_ID'], "text"),
	$this->GetSQLValueString($param['REF_NOM_ENT'], "text"),
	$this->GetSQLValueString($param['REF_PERS_CONT'], "text"),
	$this->GetSQLValueString($param['REF_POST_OCC'], "text"),
	$this->GetSQLValueString($param['REF_TEL'], "text"),
	$this->GetSQLValueString($param['REF_EMAIL'], "text"),
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