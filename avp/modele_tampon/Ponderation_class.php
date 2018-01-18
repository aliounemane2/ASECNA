<?php
require_once($_SESSION['AVP_CONFIG']);
Class Ponderation_class extends Utilitaires_class{

//création du model 
protected $table_ponderation;
protected $champ_id;
protected $champ_groupe;
protected $champ_adequate_form;
protected $champ_pert_experience;
protected $champ_compt_specific;
protected $champ_expe_con_asecna;
protected $champ_con_infor;
protected $champ_motiv_comp_redact;
protected $champ_sens_initiative;
protected $champ_autre_critere;
protected $champ_apt_manag_esprit;

function __construct()
  {
	
	$this->table_ponderation=$Tab['ponderation'];
	$this->champ_id='id';
	$this->champ_groupe='groupe';
	$this->champ_adequate_form='adequate_form';
	$this->champ_pert_experience='pert_experience';
	$this->champ_compt_specific='compt_specific';
	$this->champ_expe_con_asecna='expe_con_asecna';
	$this->champ_con_infor='con_infor';
	$this->champ_motiv_comp_redact='motiv_comp_redact';
	$this->champ_sens_initiative='sens_initiative';
	$this->champ_autre_critere='autre_critere';
	$this->champ_apt_manag_esprit='apt_manag_esprit';

  }
 
// les getteurs 
function Get_table_ponderation(){return $this->table_ponderation;}
function GetCh_id(){return $this->champ_id;}
function GetCh_groupe(){return $this->champ_groupe;}
function GetCh_adequate_form(){return $this->champ_adequate_form;}
function GetCh_pert_experience(){return $this->champ_pert_experience;}
function GetCh_compt_specific(){return $this->champ_compt_specific;}
function GetCh_expe_con_asecna(){return $this->champ_expe_con_asecna;}
function GetCh_con_infor(){return $this->champ_con_infor;}
function GetCh_motiv_comp_redact(){return $this->champ_motiv_comp_redact;}
function GetCh_sens_initiative(){return $this->champ_sens_initiative;}
function GetCh_autre_critere(){return $this->champ_autre_critere;}
function GetCh_apt_manag_esprit(){return $this->champ_apt_manag_esprit;}

// création de la fonction Lister ponderation

function lister_ponderation($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_ponderation(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer ponderation

function supprimer_ponderation($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_ponderation(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_ponderation($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_ponderation()."(
	".$this->GetCh_id().",
	".$this->GetCh_groupe().",
	".$this->GetCh_adequate_form().",
	".$this->GetCh_pert_experience().",
	".$this->GetCh_compt_specific().",
	".$this->GetCh_expe_con_asecna().",
	".$this->GetCh_con_infor().",
	".$this->GetCh_motiv_comp_redact().",
	".$this->GetCh_sens_initiative().",
	".$this->GetCh_autre_critere().",
	".$this->GetCh_apt_manag_esprit()."
	)
	VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",

	$this->GetSQLValueString($param['id'], "text"),
	$this->GetSQLValueString($param['groupe'], "text"),
	$this->GetSQLValueString($param['adequate_form'], "text"),
	$this->GetSQLValueString($param['pert_experience'], "text"),
	$this->GetSQLValueString($param['compt_specific'], "text"),
	$this->GetSQLValueString($param['expe_con_asecna'], "text"),
	$this->GetSQLValueString($param['con_infor'], "text"),
	$this->GetSQLValueString($param['motiv_comp_redact'], "text"),
	$this->GetSQLValueString($param['sens_initiative'], "text"),
	$this->GetSQLValueString($param['autre_critere'], "text"),
	$this->GetSQLValueString($param['apt_manag_esprit'], "text"));

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

//modification des enregistrements de la table ponderation 

function modifier_enreg_ponderation($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_ponderation()." SET 
	".$this->GetCh_id()."=%s,
	".$this->GetCh_groupe()."=%s,
	".$this->GetCh_adequate_form()."=%s,
	".$this->GetCh_pert_experience()."=%s,
	".$this->GetCh_compt_specific()."=%s,
	".$this->GetCh_expe_con_asecna()."=%s,
	".$this->GetCh_con_infor()."=%s,
	".$this->GetCh_motiv_comp_redact()."=%s,
	".$this->GetCh_sens_initiative()."=%s,
	".$this->GetCh_autre_critere()."=%s,
	".$this->GetCh_apt_manag_esprit()."=%s
	 WHERE ".$this->GetCh_id()."=%s",

	$this->GetSQLValueString($param['id'], "text"),
	$this->GetSQLValueString($param['groupe'], "text"),
	$this->GetSQLValueString($param['adequate_form'], "text"),
	$this->GetSQLValueString($param['pert_experience'], "text"),
	$this->GetSQLValueString($param['compt_specific'], "text"),
	$this->GetSQLValueString($param['expe_con_asecna'], "text"),
	$this->GetSQLValueString($param['con_infor'], "text"),
	$this->GetSQLValueString($param['motiv_comp_redact'], "text"),
	$this->GetSQLValueString($param['sens_initiative'], "text"),
	$this->GetSQLValueString($param['autre_critere'], "text"),
	$this->GetSQLValueString($param['apt_manag_esprit'], "text"));

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