<?php
require_once($_SESSION['AVP_CONFIG']);
Class Experience_professionnelle_class extends Utilitaires_class{

//création du model 
protected $table_experience_professionnelle;
protected $champ_EXP_ID;
protected $champ_EXP_ENT_NOM;
protected $champ_EXP_SEC_ACT;
protected $champ_EXP_POSTE;
protected $champ_EXP_DEBUT_TRAVAIL;
protected $champ_EXP_FIN_TRAVAIL;
protected $champ_EXP_SALAIRE;
protected $champ_EXP_NBRE_PERS_SORD;
protected $champ_EXP_TACHE;
protected $champ_EXP_MOTIF_DEP;
protected $champ_FK_CANDIDAT_ID;

function __construct()
  {
	
	$this->table_experience_professionnelle='experience_professionnelle';
	$this->champ_EXP_ID='EXP_ID';
	$this->champ_EXP_ENT_NOM='EXP_ENT_NOM';
	$this->champ_EXP_SEC_ACT='EXP_SEC_ACT';
	$this->champ_EXP_POSTE='EXP_POSTE';
	$this->champ_EXP_DEBUT_TRAVAIL='EXP_DEBUT_TRAVAIL';
	$this->champ_EXP_FIN_TRAVAIL='EXP_FIN_TRAVAIL';
	$this->champ_EXP_SALAIRE='EXP_SALAIRE';
	$this->champ_EXP_NBRE_PERS_SORD='EXP_NBRE_PERS_SORD';
	$this->champ_EXP_TACHE='EXP_TACHE';
	$this->champ_EXP_MOTIF_DEP='EXP_MOTIF_DEP';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';

  }
 
// les getteurs 
function Get_table_experience_professionnelle(){return $this->table_experience_professionnelle;}
function GetCh_EXP_ID(){return $this->champ_EXP_ID;}
function GetCh_EXP_ENT_NOM(){return $this->champ_EXP_ENT_NOM;}
function GetCh_EXP_SEC_ACT(){return $this->champ_EXP_SEC_ACT;}
function GetCh_EXP_POSTE(){return $this->champ_EXP_POSTE;}
function GetCh_EXP_DEBUT_TRAVAIL(){return $this->champ_EXP_DEBUT_TRAVAIL;}
function GetCh_EXP_FIN_TRAVAIL(){return $this->champ_EXP_FIN_TRAVAIL;}
function GetCh_EXP_SALAIRE(){return $this->champ_EXP_SALAIRE;}
function GetCh_EXP_NBRE_PERS_SORD(){return $this->champ_EXP_NBRE_PERS_SORD;}
function GetCh_EXP_TACHE(){return $this->champ_EXP_TACHE;}
function GetCh_EXP_MOTIF_DEP(){return $this->champ_EXP_MOTIF_DEP;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}

// création de la fonction Lister experience_professionnelle

function lister_experience_professionnelle($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_EXP_ID();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_experience_professionnelle(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }
  
  function lister_experience_prof_By_CAND_ID($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_FK_CANDIDAT_ID();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_experience_professionnelle(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }



// création de la fonction supprimer experience_professionnelle

function supprimer_experience_professionnelle($cle)
  {
	$le_champ_cle=$this->GetCh_EXP_ID();

	if($this->supprimer_enreg($this->Get_table_experience_professionnelle(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_experience_professionnelle($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_experience_professionnelle()."(
	
	".$this->GetCh_EXP_ENT_NOM().",
	".$this->GetCh_EXP_SEC_ACT().",
	".$this->GetCh_EXP_POSTE().",
	".$this->GetCh_EXP_DEBUT_TRAVAIL().",
	".$this->GetCh_EXP_FIN_TRAVAIL().",
	".$this->GetCh_EXP_SALAIRE().",
	".$this->GetCh_EXP_NBRE_PERS_SORD().",
	".$this->GetCh_EXP_TACHE().",
	".$this->GetCh_EXP_MOTIF_DEP().",
	".$this->GetCh_FK_CANDIDAT_ID()."
	)
	VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",


	$this->GetSQLValueString($param['EXP_ENT_NOM'], "text"),
	$this->GetSQLValueString($param['EXP_SEC_ACT'], "text"),
	$this->GetSQLValueString($param['EXP_POSTE'], "text"),
	$this->GetSQLValueString($param['EXP_DEBUT_TRAVAIL'], "text"),
	$this->GetSQLValueString($param['EXP_FIN_TRAVAIL'], "text"),
	$this->GetSQLValueString($param['EXP_SALAIRE'], "text"),
	$this->GetSQLValueString($param['EXP_NBRE_PERS_SORD'], "text"),
	$this->GetSQLValueString($param['EXP_TACHE'], "text"),
	$this->GetSQLValueString($param['EXP_MOTIF_DEP'], "text"),
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

//modification des enregistrements de la table experience_professionnelle 

function modifier_enreg_experience_professionnelle($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_experience_professionnelle()." SET 
	
	".$this->GetCh_EXP_ENT_NOM()."=%s,
	".$this->GetCh_EXP_SEC_ACT()."=%s,
	".$this->GetCh_EXP_POSTE()."=%s,
	".$this->GetCh_EXP_DEBUT_TRAVAIL()."=%s,
	".$this->GetCh_EXP_FIN_TRAVAIL()."=%s,
	".$this->GetCh_EXP_SALAIRE()."=%s,
	".$this->GetCh_EXP_NBRE_PERS_SORD()."=%s,
	".$this->GetCh_EXP_TACHE()."=%s,
	".$this->GetCh_EXP_MOTIF_DEP()."=%s,
	".$this->GetCh_FK_CANDIDAT_ID()."=%s
	 WHERE ".$this->GetCh_EXP_ID()."=%s",

	
	$this->GetSQLValueString($param['EXP_ENT_NOM'], "text"),
	$this->GetSQLValueString($param['EXP_SEC_ACT'], "text"),
	$this->GetSQLValueString($param['EXP_POSTE'], "text"),
	$this->GetSQLValueString($param['EXP_DEBUT_TRAVAIL'], "text"),
	$this->GetSQLValueString($param['EXP_FIN_TRAVAIL'], "text"),
	$this->GetSQLValueString($param['EXP_SALAIRE'], "text"),
	$this->GetSQLValueString($param['EXP_NBRE_PERS_SORD'], "text"),
	$this->GetSQLValueString($param['EXP_TACHE'], "text"),
	$this->GetSQLValueString($param['EXP_MOTIF_DEP'], "text"),
	$this->GetSQLValueString($param['FK_CANDIDAT_ID'], "text"),
	$this->GetSQLValueString($param['EXP_ID'], "text"));

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