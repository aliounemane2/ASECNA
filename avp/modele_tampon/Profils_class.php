<?php
require_once($_SESSION['AVP_CONFIG']);
Class Profils_class extends Utilitaires_class{

//création du model 
protected $table_profils;
protected $champ_PROFIL_ID;
protected $champ_PROFIL_NOM;

function __construct()
  {
	
	$this->table_profils=$Tab['profils'];
	$this->champ_PROFIL_ID='PROFIL_ID';
	$this->champ_PROFIL_NOM='PROFIL_NOM';

  }
 
// les getteurs 
function Get_table_profils(){return $this->table_profils;}
function GetCh_PROFIL_ID(){return $this->champ_PROFIL_ID;}
function GetCh_PROFIL_NOM(){return $this->champ_PROFIL_NOM;}

// création de la fonction Lister profils

function lister_profils($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_profils(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer profils

function supprimer_profils($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_profils(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_profils($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_profils()."(
	".$this->GetCh_PROFIL_ID().",
	".$this->GetCh_PROFIL_NOM()."
	)
	VALUES(%s,%s)",

	$this->GetSQLValueString($param['PROFIL_ID'], "text"),
	$this->GetSQLValueString($param['PROFIL_NOM'], "text"));

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

//modification des enregistrements de la table profils 

function modifier_enreg_profils($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_profils()." SET 
	".$this->GetCh_PROFIL_ID()."=%s,
	".$this->GetCh_PROFIL_NOM()."=%s
	 WHERE ".$this->GetCh_PROFIL_ID()."=%s",

	$this->GetSQLValueString($param['PROFIL_ID'], "text"),
	$this->GetSQLValueString($param['PROFIL_NOM'], "text"));

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