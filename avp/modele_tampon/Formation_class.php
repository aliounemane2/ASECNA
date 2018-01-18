<?php
require_once($_SESSION['AVP_CONFIG']);
Class Formation_class extends Utilitaires_class{

//création du model 
protected $table_formation;
protected $champ_FORMATION_ID;
protected $champ_FORMATION_AN_DEB;
protected $champ_FORMATION_AN_FIN;
protected $champ_ETABLISSEMENT_NOM;
protected $champ_FORMATION_LIEU;
protected $champ_FORMATION_DIPLOME;
protected $champ_FORMATION_DOM_PRINC_ETUD;
protected $champ_FK_CANDIDAT_ID;
protected $champ_FORMATION_CYCLE;
protected $champ_FORMATION_DIPLOME_FICHIER;

function __construct()
  {
	
	$this->table_formation=$Tab['formation'];
	$this->champ_FORMATION_ID='FORMATION_ID';
	$this->champ_FORMATION_AN_DEB='FORMATION_AN_DEB';
	$this->champ_FORMATION_AN_FIN='FORMATION_AN_FIN';
	$this->champ_ETABLISSEMENT_NOM='ETABLISSEMENT_NOM';
	$this->champ_FORMATION_LIEU='FORMATION_LIEU';
	$this->champ_FORMATION_DIPLOME='FORMATION_DIPLOME';
	$this->champ_FORMATION_DOM_PRINC_ETUD='FORMATION_DOM_PRINC_ETUD';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';
	$this->champ_FORMATION_CYCLE='FORMATION_CYCLE';
	$this->champ_FORMATION_DIPLOME_FICHIER='FORMATION_DIPLOME_FICHIER';

  }
 
// les getteurs 
function Get_table_formation(){return $this->table_formation;}
function GetCh_FORMATION_ID(){return $this->champ_FORMATION_ID;}
function GetCh_FORMATION_AN_DEB(){return $this->champ_FORMATION_AN_DEB;}
function GetCh_FORMATION_AN_FIN(){return $this->champ_FORMATION_AN_FIN;}
function GetCh_ETABLISSEMENT_NOM(){return $this->champ_ETABLISSEMENT_NOM;}
function GetCh_FORMATION_LIEU(){return $this->champ_FORMATION_LIEU;}
function GetCh_FORMATION_DIPLOME(){return $this->champ_FORMATION_DIPLOME;}
function GetCh_FORMATION_DOM_PRINC_ETUD(){return $this->champ_FORMATION_DOM_PRINC_ETUD;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}
function GetCh_FORMATION_CYCLE(){return $this->champ_FORMATION_CYCLE;}
function GetCh_FORMATION_DIPLOME_FICHIER(){return $this->champ_FORMATION_DIPLOME_FICHIER;}

// création de la fonction Lister formation

function lister_formation($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_FORMATION_ID();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_formation(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }
  
  function lister_formation_cand($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_FK_CANDIDAT_ID();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_formation(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }



// création de la fonction supprimer formation

function supprimer_formation($cle)
  {
	$le_champ_cle=$this->GetCh_FORMATION_ID();

	if($this->supprimer_enreg($this->Get_table_formation(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_formation($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_formation()."(
	
	".$this->GetCh_FORMATION_AN_DEB().",
	".$this->GetCh_FORMATION_AN_FIN().",
	".$this->GetCh_ETABLISSEMENT_NOM().",
	".$this->GetCh_FORMATION_LIEU().",
	".$this->GetCh_FORMATION_DIPLOME().",
	".$this->GetCh_FORMATION_DOM_PRINC_ETUD().",
	".$this->GetCh_FK_CANDIDAT_ID().",
	".$this->GetCh_FORMATION_CYCLE().",
	".$this->GetCh_FORMATION_DIPLOME_FICHIER()."
	)
	VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s)",

	
	$this->GetSQLValueString($param['FORMATION_AN_DEB'], "text"),
	$this->GetSQLValueString($param['FORMATION_AN_FIN'], "text"),
	$this->GetSQLValueString($param['ETABLISSEMENT_NOM'], "text"),
	$this->GetSQLValueString($param['FORMATION_LIEU'], "text"),
	$this->GetSQLValueString($param['FORMATION_DIPLOME'], "text"),
	$this->GetSQLValueString($param['FORMATION_DOM_PRINC_ETUD'], "text"),
	$this->GetSQLValueString($param['FK_CANDIDAT_ID'], "text"),
	$this->GetSQLValueString($param['FORMATION_CYCLE'], "text"),
	$this->GetSQLValueString($param['FORMATION_DIPLOME_FICHIER'], "text"));

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

//modification des enregistrements de la table formation 

function modifier_enreg_formation($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_formation()." SET 
	
	".$this->GetCh_FORMATION_AN_DEB()."=%s,
	".$this->GetCh_FORMATION_AN_FIN()."=%s,
	".$this->GetCh_ETABLISSEMENT_NOM()."=%s,
	".$this->GetCh_FORMATION_LIEU()."=%s,
	".$this->GetCh_FORMATION_DIPLOME()."=%s,
	".$this->GetCh_FORMATION_DOM_PRINC_ETUD()."=%s,
	".$this->GetCh_FK_CANDIDAT_ID()."=%s,
	".$this->GetCh_FORMATION_CYCLE()."=%s,
	".$this->GetCh_FORMATION_DIPLOME_FICHIER()."=%s
	 WHERE ".$this->GetCh_FORMATION_ID()."=%s",

	
	$this->GetSQLValueString($param['FORMATION_AN_DEB'], "text"),
	$this->GetSQLValueString($param['FORMATION_AN_FIN'], "text"),
	$this->GetSQLValueString($param['ETABLISSEMENT_NOM'], "text"),
	$this->GetSQLValueString($param['FORMATION_LIEU'], "text"),
	$this->GetSQLValueString($param['FORMATION_DIPLOME'], "text"),
	$this->GetSQLValueString($param['FORMATION_DOM_PRINC_ETUD'], "text"),
	$this->GetSQLValueString($param['FK_CANDIDAT_ID'], "text"),
	$this->GetSQLValueString($param['FORMATION_CYCLE'], "text"),
	$this->GetSQLValueString($param['FORMATION_DIPLOME_FICHIER'], "text"),
	$this->GetSQLValueString($param['FORMATION_ID'], "int"));
	
	

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