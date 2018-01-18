<?php
require_once($_SESSION['AVP_CONFIG']);
Class Validation_cadidature_class extends Utilitaires_class{

//création du model 
protected $table_validation_cadidature;
protected $champ_id;
protected $champ_etape;
protected $champ_date_enreg;
protected $champ_id_annonce;
protected $champ_id_candidat;
protected $champ_libelle;

function __construct()
  {
	
	$this->table_validation_cadidature=$Tab['validation_cadidature'];
	$this->champ_id='id';
	$this->champ_etape='etape';
	$this->champ_date_enreg='date_enreg';
	$this->champ_id_annonce='id_annonce';
	$this->champ_id_candidat='id_candidat';
	$this->champ_libelle='libelle';

  }
 
// les getteurs 
function Get_table_validation_cadidature(){return $this->table_validation_cadidature;}
function GetCh_id(){return $this->champ_id;}
function GetCh_etape(){return $this->champ_etape;}
function GetCh_date_enreg(){return $this->champ_date_enreg;}
function GetCh_id_annonce(){return $this->champ_id_annonce;}
function GetCh_id_candidat(){return $this->champ_id_candidat;}
function GetCh_libelle(){return $this->champ_libelle;}

// création de la fonction Lister validation_cadidature

function lister_validation_cadidature($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_validation_cadidature(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer validation_cadidature

function supprimer_validation_cadidature($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_validation_cadidature(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_validation_cadidature($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_validation_cadidature()."(
	".$this->GetCh_id().",
	".$this->GetCh_etape().",
	".$this->GetCh_date_enreg().",
	".$this->GetCh_id_annonce().",
	".$this->GetCh_id_candidat().",
	".$this->GetCh_libelle()."
	)
	VALUES(%s,%s,%s,%s,%s,%s)",

	$this->GetSQLValueString($param['id'], "text"),
	$this->GetSQLValueString($param['etape'], "text"),
	$this->GetSQLValueString($param['date_enreg'], "text"),
	$this->GetSQLValueString($param['id_annonce'], "text"),
	$this->GetSQLValueString($param['id_candidat'], "text"),
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

//modification des enregistrements de la table validation_cadidature 

function modifier_enreg_validation_cadidature($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_validation_cadidature()." SET 
	".$this->GetCh_id()."=%s,
	".$this->GetCh_etape()."=%s,
	".$this->GetCh_date_enreg()."=%s,
	".$this->GetCh_id_annonce()."=%s,
	".$this->GetCh_id_candidat()."=%s,
	".$this->GetCh_libelle()."=%s
	 WHERE ".$this->GetCh_id()."=%s",

	$this->GetSQLValueString($param['id'], "text"),
	$this->GetSQLValueString($param['etape'], "text"),
	$this->GetSQLValueString($param['date_enreg'], "text"),
	$this->GetSQLValueString($param['id_annonce'], "text"),
	$this->GetSQLValueString($param['id_candidat'], "text"),
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