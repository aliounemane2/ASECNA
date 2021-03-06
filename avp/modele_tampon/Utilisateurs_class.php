<?php
require_once($_SESSION['AVP_CONFIG']);
Class Utilisateurs_class extends Utilitaires_class{

//création du model 
protected $table_utilisateurs;
protected $champ_UTIL_ID;
protected $champ_UTIL_LOGIN;
protected $champ_UTIL_MDP;
protected $champ_UTIL_EMAIL;
protected $champ_UTIL_ROLE;
protected $champ_active;
protected $champ_token;

function __construct()
  {
	
	$this->table_utilisateurs=$Tab['utilisateurs'];
	$this->champ_UTIL_ID='UTIL_ID';
	$this->champ_UTIL_LOGIN='UTIL_LOGIN';
	$this->champ_UTIL_MDP='UTIL_MDP';
	$this->champ_UTIL_EMAIL='UTIL_EMAIL';
	$this->champ_UTIL_ROLE='UTIL_ROLE';
	$this->champ_active='active';
	$this->champ_token='token';

  }
 
// les getteurs 
function Get_table_utilisateurs(){return $this->table_utilisateurs;}
function GetCh_UTIL_ID(){return $this->champ_UTIL_ID;}
function GetCh_UTIL_LOGIN(){return $this->champ_UTIL_LOGIN;}
function GetCh_UTIL_MDP(){return $this->champ_UTIL_MDP;}
function GetCh_UTIL_EMAIL(){return $this->champ_UTIL_EMAIL;}
function GetCh_UTIL_ROLE(){return $this->champ_UTIL_ROLE;}
function GetCh_active(){return $this->champ_active;}
function GetCh_token(){return $this->champ_token;}

// création de la fonction Lister utilisateurs

function lister_utilisateurs($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_utilisateurs(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer utilisateurs

function supprimer_utilisateurs($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_utilisateurs(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_utilisateurs($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_utilisateurs()."(
	".$this->GetCh_UTIL_ID().",
	".$this->GetCh_UTIL_LOGIN().",
	".$this->GetCh_UTIL_MDP().",
	".$this->GetCh_UTIL_EMAIL().",
	".$this->GetCh_UTIL_ROLE().",
	".$this->GetCh_active().",
	".$this->GetCh_token()."
	)
	VALUES(%s,%s,%s,%s,%s,%s,%s)",

	$this->GetSQLValueString($param['UTIL_ID'], "text"),
	$this->GetSQLValueString($param['UTIL_LOGIN'], "text"),
	$this->GetSQLValueString($param['UTIL_MDP'], "text"),
	$this->GetSQLValueString($param['UTIL_EMAIL'], "text"),
	$this->GetSQLValueString($param['UTIL_ROLE'], "text"),
	$this->GetSQLValueString($param['active'], "text"),
	$this->GetSQLValueString($param['token'], "text"));

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

//modification des enregistrements de la table utilisateurs 

function modifier_enreg_utilisateurs($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_utilisateurs()." SET 
	".$this->GetCh_UTIL_ID()."=%s,
	".$this->GetCh_UTIL_LOGIN()."=%s,
	".$this->GetCh_UTIL_MDP()."=%s,
	".$this->GetCh_UTIL_EMAIL()."=%s,
	".$this->GetCh_UTIL_ROLE()."=%s,
	".$this->GetCh_active()."=%s,
	".$this->GetCh_token()."=%s
	 WHERE ".$this->GetCh_UTIL_ID()."=%s",

	$this->GetSQLValueString($param['UTIL_ID'], "text"),
	$this->GetSQLValueString($param['UTIL_LOGIN'], "text"),
	$this->GetSQLValueString($param['UTIL_MDP'], "text"),
	$this->GetSQLValueString($param['UTIL_EMAIL'], "text"),
	$this->GetSQLValueString($param['UTIL_ROLE'], "text"),
	$this->GetSQLValueString($param['active'], "text"),
	$this->GetSQLValueString($param['token'], "text"));

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