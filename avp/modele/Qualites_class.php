<?php
require_once($_SESSION['AVP_CONFIG']);
Class Qualites_class extends Utilitaires_class{

//création du model 
protected $table_qualites;
protected $champ_QUAL_ID;
protected $champ_QUAL_LIB;
protected $champ_FK_CANDIDAT_ID;

function __construct()
  {
	
	$this->table_qualites='qualites';
	$this->champ_QUAL_ID='QUAL_ID';
	$this->champ_QUAL_LIB='QUAL_LIB';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';

  }
 
// les getteurs 
function Get_table_qualites(){return $this->table_qualites;}
function GetCh_QUAL_ID(){return $this->champ_QUAL_ID;}
function GetCh_QUAL_LIB(){return $this->champ_QUAL_LIB;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}

// création de la fonction Lister qualites

function lister_qualites($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_QUAL_ID();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_qualites(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }
  
  function lister_qualites_By_CAND_ID($candidat_id)
  {
  
	   $Req=sprintf(" SELECT * FROM ".$this->Get_table_qualites()." WHERE ".$this->GetCh_FK_CANDIDAT_ID()."=%s ",
	   
	   $this->GetSQLValueString($candidat_id,"int"));
	   
	   $Cnn=$this->ma_connexion();
	  
	   
	   $retour=$Cnn->query($Req);
	   $result=$retour->fetchAll(PDO::FETCH_ASSOC);
	   
	   return $result;
  }


// création de la fonction supprimer qualites

function supprimer_qualites($cle)
  {
	$le_champ_cle=$this->GetCh_QUAL_ID();

	if($this->supprimer_enreg($this->Get_table_qualites(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_qualites($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_qualites()."(
	
	".$this->GetCh_QUAL_LIB().",
	".$this->GetCh_FK_CANDIDAT_ID()."
	)
	VALUES(%s,%s)",

	$this->GetSQLValueString($param['QUAL_LIB'], "text"),
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

//modification des enregistrements de la table qualites 

  function modifier_enreg_qualites($param,$Cnn)
  {
	$updateSQL = sprintf("UPDATE ".$this->Get_table_qualites()." SET 
	
	".$this->GetCh_QUAL_LIB()."=%s
	
	 WHERE ".$this->GetCh_QUAL_ID()."=%s",

	$this->GetSQLValueString($param['QUAL_LIB'], "text"),
	$this->GetSQLValueString($param['QUAL_ID'], "text"));

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