<?php
require_once($_SESSION['AVP_CONFIG']);
Class Connaissances_linguistiques_class extends Utilitaires_class{

//création du model 
protected $table_connaissances_linguistiques;
protected $champ_LANGUE_ID;
protected $champ_LANGUE_NOM;
protected $champ_LANGUE_ORALE;
protected $champ_LANGUE_ECRITE;
protected $champ_LANGUE_LECTURE;
protected $champ_FK_CANDIDAT_ID;
protected $champ_Type;


function __construct()
  {
	
	$this->table_connaissances_linguistiques='connaissances_linguistiques';
	$this->champ_LANGUE_ID='LANGUE_ID';
	$this->champ_LANGUE_NOM='LANGUE_NOM';
	$this->champ_LANGUE_ORALE='LANGUE_ORALE';
	$this->champ_LANGUE_ECRITE='LANGUE_ECRITE';
	$this->champ_LANGUE_LECTURE='LANGUE_LECTURE';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';
    $this->champ_Type='Type';

  }
 
// les getteurs 
function Get_table_connaissances_linguistiques(){return $this->table_connaissances_linguistiques;}
function GetCh_LANGUE_ID(){return $this->champ_LANGUE_ID;}
function GetCh_LANGUE_NOM(){return $this->champ_LANGUE_NOM;}
function GetCh_LANGUE_ORALE(){return $this->champ_LANGUE_ORALE;}
function GetCh_LANGUE_ECRITE(){return $this->champ_LANGUE_ECRITE;}
function GetCh_LANGUE_LECTURE(){return $this->champ_LANGUE_LECTURE;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}
function GetCh_Type(){return $this->champ_Type;}


// création de la fonction Lister connaissances_linguistiques

function lister_connaissances_linguistiques($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_LANGUE_ID();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_connaissances_linguistiques(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }
  
  function lister_connaissances_ling_By_CAND_ID($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_FK_CANDIDAT_ID();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_connaissances_linguistiques(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }
  
  function lister_autre_conn_ling($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_Type();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_connaissances_linguistiques(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }
  function lister_conn_ling($fk_candidat_id)
  {
	  $Cnn=$this->ma_connexion();
	   
	   $Req=sprintf("SELECT * FROM  ".$this->Get_table_connaissances_linguistiques()." WHERE  ".$this->GetCh_Type()."=%s  AND ".$this->GetCh_FK_CANDIDAT_ID()."=%s" ,
	   
	   $this->GetSQLValueString("NORMAL","text"),
	   $this->GetSQLValueString($fk_candidat_id,"int"));
	   
	   
	   $retour=$Cnn->query($Req);
	   $result=$retour->fetchAll(PDO::FETCH_ASSOC);
	   
	   return $result;

  }
  
  function lister_conn_autre_ling($fk_candidat_id)
  {
	  $Cnn=$this->ma_connexion();
	   
	   $Req=sprintf("SELECT * FROM  ".$this->Get_table_connaissances_linguistiques()." WHERE  ".$this->GetCh_Type()."=%s  AND ".$this->GetCh_FK_CANDIDAT_ID()."=%s" ,
	   
	   $this->GetSQLValueString("AUTRE","text"),
	   $this->GetSQLValueString($fk_candidat_id,"int"));
	   
	   
	   $retour=$Cnn->query($Req);
	   $result=$retour->fetchAll(PDO::FETCH_ASSOC);
	   
	   return $result;

  }
  
  function lister_conn_ling_id_type($id_langue,$type)
  {
	  $Cnn=$this->ma_connexion();
	   
	   $Req=sprintf("SELECT * FROM  ".$this->Get_table_connaissances_linguistiques()." WHERE  ".$this->GetCh_LANGUE_ID()."=%s  AND ".$this->GetCh_Type()."=%s" ,
	   
	   $this->GetSQLValueString($id_langue,"int"),
	   $this->GetSQLValueString($type,"text"));
	   
	   
	   $retour=$Cnn->query($Req);
	   $result=$retour->fetchAll(PDO::FETCH_ASSOC);
	   
	   return $result;

  }


// création de la fonction supprimer connaissances_linguistiques

function supprimer_connaissances_linguistiques($cle)
{
	$le_champ_cle=$this->GetCh_LANGUE_ID();

	  if($this->supprimer_enreg($this->Get_table_connaissances_linguistiques(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	  else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_connaissances_linguistiques($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_connaissances_linguistiques()."(
	
	".$this->GetCh_LANGUE_NOM().",
	".$this->GetCh_LANGUE_ORALE().",
	".$this->GetCh_LANGUE_ECRITE().",
	".$this->GetCh_LANGUE_LECTURE().",
	".$this->GetCh_FK_CANDIDAT_ID().",
	".$this->GetCh_Type()."
	
	)
	VALUES(%s,%s,%s,%s,%s,%s)",

	
	$this->GetSQLValueString($param['LANGUE_NOM'], "text"),
	$this->GetSQLValueString($param['LANGUE_ORALE'], "text"),
	$this->GetSQLValueString($param['LANGUE_ECRITE'], "text"),
	$this->GetSQLValueString($param['LANGUE_LECTURE'], "text"),
	$this->GetSQLValueString($param['FK_CANDIDAT_ID'], "text"),
	$this->GetSQLValueString($param['Type'], "text")
	);

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

//modification des enregistrements de la table connaissances_linguistiques 

function modifier_enreg_connaissances_linguistiques($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_connaissances_linguistiques()." SET 
	
	".$this->GetCh_LANGUE_NOM()."=%s,
	".$this->GetCh_LANGUE_ORALE()."=%s,
	".$this->GetCh_LANGUE_ECRITE()."=%s,
	".$this->GetCh_LANGUE_LECTURE()."=%s
	WHERE ".$this->GetCh_LANGUE_ID()."=%s",

	
	$this->GetSQLValueString($param['LANGUE_NOM'], "text"),
	$this->GetSQLValueString($param['LANGUE_ORALE'], "text"),
	$this->GetSQLValueString($param['LANGUE_ECRITE'], "text"),
	$this->GetSQLValueString($param['LANGUE_LECTURE'], "text"),
	$this->GetSQLValueString($param['LANGUE_ID'], "text"));

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