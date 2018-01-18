<?php
require_once($_SESSION['AVP_CONFIG']);
Class Competences_class extends Utilitaires_class{

//création du model 
protected $table_competences;
protected $champ_COMP_ID;
protected $champ_COMP_LIB;
protected $champ_FK_CANDIDAT_ID;
protected $champ_FK_ANNONCE_ID;


function __construct()
  {
	
	$this->table_competences='competences';
	$this->champ_COMP_ID='COMP_ID';
	$this->champ_COMP_LIB='COMP_LIB';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';
	$this->champ_FK_ANNONCE_ID='FK_ANNONCE_ID';

  }
 
// les getteurs 
function Get_table_competences(){return $this->table_competences;}
function GetCh_COMP_ID(){return $this->champ_COMP_ID;}
function GetCh_COMP_LIB(){return $this->champ_COMP_LIB;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}
function GetCh_FK_ANNONCE_ID(){return $this->champ_FK_ANNONCE_ID;}

// création de la fonction Lister competences

function lister_competences($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_COMP_ID();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_competences(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }
  
  function lister_competences_cand_id_annonce($candidat_id,$annonce_id)
  {
	  $Cnn=$this->ma_connexion();
	   
	   $Req=sprintf("SELECT * FROM  ".$this->Get_table_competences()." WHERE  ".$this->GetCh_FK_CANDIDAT_ID()."=%s  AND ".$this->GetCh_FK_ANNONCE_ID()."=%s" ,
	   
	   $this->GetSQLValueString($candidat_id,"int"),
	   $this->GetSQLValueString($annonce_id,"text"));
	   
	   
	   $retour=$Cnn->query($Req);
	   $result=$retour->fetchAll(PDO::FETCH_ASSOC);
	   
	   return $result; 
  }
  function lister_comp_By_CAN_ID($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_FK_CANDIDAT_ID();

	$type_champ="int";

	$result=$this->lister_enreg($this->Get_table_competences(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }
  
 // function lister_compt_by_annonce_


// création de la fonction supprimer competences

function supprimer_competences($cle)
  {
	$le_champ_cle=$this->GetCh_COMP_ID();

	if($this->supprimer_enreg($this->Get_table_competences(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_competences($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_competences()."(
	
	".$this->GetCh_COMP_LIB().",
	".$this->GetCh_FK_CANDIDAT_ID().",
	".$this->GetCh_FK_ANNONCE_ID()."
	)
	VALUES(%s,%s,%s)",

	  $this->GetSQLValueString($param['COMP_LIB'], "text"),
	  $this->GetSQLValueString($param['FK_CANDIDAT_ID'], "int"),
	  $this->GetSQLValueString($param['FK_ANNONCE_ID'], "int")
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

//modification des enregistrements de la table competences 

function modifier_enreg_competences($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_competences()." SET 
	
	".$this->GetCh_COMP_LIB()."=%s
	 WHERE ".$this->GetCh_COMP_ID()."=%s",

	$this->GetSQLValueString($param['COMP_LIB'], "text"),
	$this->GetSQLValueString($param['COMP_ID'], "int")
	);

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