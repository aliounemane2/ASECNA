<?php
require_once($_SESSION['AVP_CONFIG']);
Class Autre_formation_class extends Utilitaires_class{

//création du model 
protected $table_autre_formation;
protected $champ_FORM_ID;
protected $champ_FORMATION_AN_DEB;
protected $champ_FORM_LIB;
protected $champ_FORM_NOM;
protected $champ_FORM_INTITULE;
protected $champ_FK_CANDIDAT_ID;
protected $champ_AUTRE_FORMATION_DIPLOME_FICHIER;

function __construct()
  {
	
	$this->table_autre_formation='autre_formation';
	$this->champ_FORM_ID='FORM_ID';
	$this->champ_FORMATION_AN_DEB='FORMATION_AN_DEB';
	$this->champ_FORM_LIB='FORM_LIB';
	$this->champ_FORM_NOM='FORM_NOM';
	$this->champ_FORM_INTITULE='FORM_INTITULE';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';
	$this->champ_AUTRE_FORMATION_DIPLOME_FICHIER='AUTRE_FORMATION_DIPLOME_FICHIER';

  }
 
// les getteurs 
function Get_table_autre_formation(){return $this->table_autre_formation;}
function GetCh_FORM_ID(){return $this->champ_FORM_ID;}
function GetCh_FORMATION_AN_DEB(){return $this->champ_FORMATION_AN_DEB;}
function GetCh_FORM_LIB(){return $this->champ_FORM_LIB;}
function GetCh_FORM_NOM(){return $this->champ_FORM_NOM;}
function GetCh_FORM_INTITULE(){return $this->champ_FORM_INTITULE;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}
function GetCh_AUTRE_FORMATION_DIPLOME_FICHIER(){return $this->champ_AUTRE_FORMATION_DIPLOME_FICHIER;}

// création de la fonction Lister autre_formation

  function lister_autre_formation($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_FORM_ID();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_autre_formation(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }
  
  function lister_autre_formBy_CAN_ID($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_FK_CANDIDAT_ID();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_autre_formation(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer autre_formation

 function supprimer_autre_formation($cle)
 {
	  $le_champ_cle=$this->GetCh_FORM_ID();

	  if($this->supprimer_enreg($this->Get_table_autre_formation(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	  else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_autre_formation($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_autre_formation()."(
	".$this->GetCh_FORMATION_AN_DEB().",
	".$this->GetCh_FORM_LIB().",
	".$this->GetCh_FORM_NOM().",
	".$this->GetCh_FORM_INTITULE().",
	".$this->GetCh_FK_CANDIDAT_ID().",
	".$this->GetCh_AUTRE_FORMATION_DIPLOME_FICHIER()."
	)
	VALUES(%s,%s,%s,%s,%s,%s)",

	$this->GetSQLValueString($param['FORMATION_AN_DEB'], "text"),
	$this->GetSQLValueString($param['FORM_LIB'], "text"),
	$this->GetSQLValueString($param['FORM_NOM'], "text"),
	$this->GetSQLValueString($param['FORM_INTITULE'], "text"),
	$this->GetSQLValueString($param['FK_CANDIDAT_ID'], "text"),
	$this->GetSQLValueString($param['AUTRE_FORMATION_DIPLOME_FICHIER'], "text"));

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

//modification des enregistrements de la table autre_formation 

function modifier_enreg_autre_formation($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_autre_formation()." SET 
	
	".$this->GetCh_FORMATION_AN_DEB()."=%s,
	".$this->GetCh_FORM_LIB()."=%s,
	".$this->GetCh_FORM_NOM()."=%s,
	".$this->GetCh_FORM_INTITULE()."=%s,
	".$this->GetCh_FK_CANDIDAT_ID()."=%s,
	".$this->GetCh_AUTRE_FORMATION_DIPLOME_FICHIER()."=%s
	 WHERE ".$this->GetCh_FORM_ID()."=%s",

	
	$this->GetSQLValueString($param['FORMATION_AN_DEB'], "text"),
	$this->GetSQLValueString($param['FORM_LIB'], "text"),
	$this->GetSQLValueString($param['FORM_NOM'], "text"),
	$this->GetSQLValueString($param['FORM_INTITULE'], "text"),
	$this->GetSQLValueString($param['FK_CANDIDAT_ID'], "text"),
	$this->GetSQLValueString($param['AUTRE_FORMATION_DIPLOME_FICHIER'], "text"),
	$this->GetSQLValueString($param['FORM_ID'], "text"));

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