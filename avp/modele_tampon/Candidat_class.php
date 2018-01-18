<?php
require_once($_SESSION['AVP_CONFIG']);
Class Candidat_class extends Utilitaires_class{

//création du model 
protected $table_candidat;
protected $champ_CANDIDAT_ID;
protected $champ_CANDIDAT_TYPE;
protected $champ_CANDIDAT_CIVILITE;
protected $champ_CANDIDAT_NOM;
protected $champ_CANDIDAT_PRENOM;
protected $champ_CANDIDAT_MATRICULE;
protected $champ_CANDIDAT_DATE_NAISSANCE;
protected $champ_CANDIDAT_LIEU_NAISSANCE;
protected $champ_CANDIDAT_NATIONALITE;
protected $champ_CANDIDAT_SIT_MAT;
protected $champ_CANDIDAT_NBRE_ENF;
protected $champ_CANDIDAT_ADR_PERM;
protected $champ_CANDIDAT_ADR_ACT;
protected $champ_CANDIDAT_INDICATIF;
protected $champ_CANDIDAT_NUM_TEL;
protected $champ_CANDIDAT_NUM_GSM;
protected $champ_CANDIDAT_PERMIS;
protected $champ_CANDIDAT_DEMANDE_EMPLOI;
protected $champ_CANDIDAT_CV;
protected $champ_CANDIDAT_CERTIFICAT_TRAVAIL;
protected $champ_CANDIDAT_PHOTO;
protected $champ_CANDIDAT_ACTE_NAISS;
protected $champ_CANDIDAT_FICHE_FAMILLE;
protected $champ_CANDIDAT_CERTIF_NAT;
protected $champ_CANDIDAT_CERTIF_DOMICILE;
protected $champ_CANDIDAT_CERTIF_MEDICAL;
protected $champ_CANDIDAT_CASIER_JUDICIAIRE;
protected $champ_CANDIDAT_IS_FAMILLE;
protected $champ_CANDIDAT_MOTIV_POSTE;
protected $champ_FK_UTIL_ID;

function __construct()
  {
	
	$this->table_candidat=$Tab['candidat'];
	$this->champ_CANDIDAT_ID='CANDIDAT_ID';
	$this->champ_CANDIDAT_TYPE='CANDIDAT_TYPE';
	$this->champ_CANDIDAT_CIVILITE='CANDIDAT_CIVILITE';
	$this->champ_CANDIDAT_NOM='CANDIDAT_NOM';
	$this->champ_CANDIDAT_PRENOM='CANDIDAT_PRENOM';
	$this->champ_CANDIDAT_MATRICULE='CANDIDAT_MATRICULE';
	$this->champ_CANDIDAT_DATE_NAISSANCE='CANDIDAT_DATE_NAISSANCE';
	$this->champ_CANDIDAT_LIEU_NAISSANCE='CANDIDAT_LIEU_NAISSANCE';
	$this->champ_CANDIDAT_NATIONALITE='CANDIDAT_NATIONALITE';
	$this->champ_CANDIDAT_SIT_MAT='CANDIDAT_SIT_MAT';
	$this->champ_CANDIDAT_NBRE_ENF='CANDIDAT_NBRE_ENF';
	$this->champ_CANDIDAT_ADR_PERM='CANDIDAT_ADR_PERM';
	$this->champ_CANDIDAT_ADR_ACT='CANDIDAT_ADR_ACT';
	$this->champ_CANDIDAT_INDICATIF='CANDIDAT_INDICATIF';
	$this->champ_CANDIDAT_NUM_TEL='CANDIDAT_NUM_TEL';
	$this->champ_CANDIDAT_NUM_GSM='CANDIDAT_NUM_GSM';
	$this->champ_CANDIDAT_PERMIS='CANDIDAT_PERMIS';
	$this->champ_CANDIDAT_DEMANDE_EMPLOI='CANDIDAT_DEMANDE_EMPLOI';
	$this->champ_CANDIDAT_CV='CANDIDAT_CV';
	$this->champ_CANDIDAT_CERTIFICAT_TRAVAIL='CANDIDAT_CERTIFICAT_TRAVAIL';
	$this->champ_CANDIDAT_PHOTO='CANDIDAT_PHOTO';
	$this->champ_CANDIDAT_ACTE_NAISS='CANDIDAT_ACTE_NAISS';
	$this->champ_CANDIDAT_FICHE_FAMILLE='CANDIDAT_FICHE_FAMILLE';
	$this->champ_CANDIDAT_CERTIF_NAT='CANDIDAT_CERTIF_NAT';
	$this->champ_CANDIDAT_CERTIF_DOMICILE='CANDIDAT_CERTIF_DOMICILE';
	$this->champ_CANDIDAT_CERTIF_MEDICAL='CANDIDAT_CERTIF_MEDICAL';
	$this->champ_CANDIDAT_CASIER_JUDICIAIRE='CANDIDAT_CASIER_JUDICIAIRE';
	$this->champ_CANDIDAT_IS_FAMILLE='CANDIDAT_IS_FAMILLE';
	$this->champ_CANDIDAT_MOTIV_POSTE='CANDIDAT_MOTIV_POSTE';
	$this->champ_FK_UTIL_ID='FK_UTIL_ID';

  }
 
// les getteurs 
function Get_table_candidat(){return $this->table_candidat;}
function GetCh_CANDIDAT_ID(){return $this->champ_CANDIDAT_ID;}
function GetCh_CANDIDAT_TYPE(){return $this->champ_CANDIDAT_TYPE;}
function GetCh_CANDIDAT_CIVILITE(){return $this->champ_CANDIDAT_CIVILITE;}
function GetCh_CANDIDAT_NOM(){return $this->champ_CANDIDAT_NOM;}
function GetCh_CANDIDAT_PRENOM(){return $this->champ_CANDIDAT_PRENOM;}
function GetCh_CANDIDAT_MATRICULE(){return $this->champ_CANDIDAT_MATRICULE;}
function GetCh_CANDIDAT_DATE_NAISSANCE(){return $this->champ_CANDIDAT_DATE_NAISSANCE;}
function GetCh_CANDIDAT_LIEU_NAISSANCE(){return $this->champ_CANDIDAT_LIEU_NAISSANCE;}
function GetCh_CANDIDAT_NATIONALITE(){return $this->champ_CANDIDAT_NATIONALITE;}
function GetCh_CANDIDAT_SIT_MAT(){return $this->champ_CANDIDAT_SIT_MAT;}
function GetCh_CANDIDAT_NBRE_ENF(){return $this->champ_CANDIDAT_NBRE_ENF;}
function GetCh_CANDIDAT_ADR_PERM(){return $this->champ_CANDIDAT_ADR_PERM;}
function GetCh_CANDIDAT_ADR_ACT(){return $this->champ_CANDIDAT_ADR_ACT;}
function GetCh_CANDIDAT_INDICATIF(){return $this->champ_CANDIDAT_INDICATIF;}
function GetCh_CANDIDAT_NUM_TEL(){return $this->champ_CANDIDAT_NUM_TEL;}
function GetCh_CANDIDAT_NUM_GSM(){return $this->champ_CANDIDAT_NUM_GSM;}
function GetCh_CANDIDAT_PERMIS(){return $this->champ_CANDIDAT_PERMIS;}
function GetCh_CANDIDAT_DEMANDE_EMPLOI(){return $this->champ_CANDIDAT_DEMANDE_EMPLOI;}
function GetCh_CANDIDAT_CV(){return $this->champ_CANDIDAT_CV;}
function GetCh_CANDIDAT_CERTIFICAT_TRAVAIL(){return $this->champ_CANDIDAT_CERTIFICAT_TRAVAIL;}
function GetCh_CANDIDAT_PHOTO(){return $this->champ_CANDIDAT_PHOTO;}
function GetCh_CANDIDAT_ACTE_NAISS(){return $this->champ_CANDIDAT_ACTE_NAISS;}
function GetCh_CANDIDAT_FICHE_FAMILLE(){return $this->champ_CANDIDAT_FICHE_FAMILLE;}
function GetCh_CANDIDAT_CERTIF_NAT(){return $this->champ_CANDIDAT_CERTIF_NAT;}
function GetCh_CANDIDAT_CERTIF_DOMICILE(){return $this->champ_CANDIDAT_CERTIF_DOMICILE;}
function GetCh_CANDIDAT_CERTIF_MEDICAL(){return $this->champ_CANDIDAT_CERTIF_MEDICAL;}
function GetCh_CANDIDAT_CASIER_JUDICIAIRE(){return $this->champ_CANDIDAT_CASIER_JUDICIAIRE;}
function GetCh_CANDIDAT_IS_FAMILLE(){return $this->champ_CANDIDAT_IS_FAMILLE;}
function GetCh_CANDIDAT_MOTIV_POSTE(){return $this->champ_CANDIDAT_MOTIV_POSTE;}
function GetCh_FK_UTIL_ID(){return $this->champ_FK_UTIL_ID;}

// création de la fonction Lister candidat

function lister_candidat($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->xxx;

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_candidat(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer candidat

function supprimer_candidat($cle)
  {
	$le_champ_cle=$this->xxx;

	if($this->supprimer_enreg($this->Get_table_candidat(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_candidat($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_candidat()."(
	".$this->GetCh_CANDIDAT_ID().",
	".$this->GetCh_CANDIDAT_TYPE().",
	".$this->GetCh_CANDIDAT_CIVILITE().",
	".$this->GetCh_CANDIDAT_NOM().",
	".$this->GetCh_CANDIDAT_PRENOM().",
	".$this->GetCh_CANDIDAT_MATRICULE().",
	".$this->GetCh_CANDIDAT_DATE_NAISSANCE().",
	".$this->GetCh_CANDIDAT_LIEU_NAISSANCE().",
	".$this->GetCh_CANDIDAT_NATIONALITE().",
	".$this->GetCh_CANDIDAT_SIT_MAT().",
	".$this->GetCh_CANDIDAT_NBRE_ENF().",
	".$this->GetCh_CANDIDAT_ADR_PERM().",
	".$this->GetCh_CANDIDAT_ADR_ACT().",
	".$this->GetCh_CANDIDAT_INDICATIF().",
	".$this->GetCh_CANDIDAT_NUM_TEL().",
	".$this->GetCh_CANDIDAT_NUM_GSM().",
	".$this->GetCh_CANDIDAT_PERMIS().",
	".$this->GetCh_CANDIDAT_DEMANDE_EMPLOI().",
	".$this->GetCh_CANDIDAT_CV().",
	".$this->GetCh_CANDIDAT_CERTIFICAT_TRAVAIL().",
	".$this->GetCh_CANDIDAT_PHOTO().",
	".$this->GetCh_CANDIDAT_ACTE_NAISS().",
	".$this->GetCh_CANDIDAT_FICHE_FAMILLE().",
	".$this->GetCh_CANDIDAT_CERTIF_NAT().",
	".$this->GetCh_CANDIDAT_CERTIF_DOMICILE().",
	".$this->GetCh_CANDIDAT_CERTIF_MEDICAL().",
	".$this->GetCh_CANDIDAT_CASIER_JUDICIAIRE().",
	".$this->GetCh_CANDIDAT_IS_FAMILLE().",
	".$this->GetCh_CANDIDAT_MOTIV_POSTE().",
	".$this->GetCh_FK_UTIL_ID()."
	)
	VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",

	$this->GetSQLValueString($param['CANDIDAT_ID'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_TYPE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CIVILITE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_NOM'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_PRENOM'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_MATRICULE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_DATE_NAISSANCE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_LIEU_NAISSANCE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_NATIONALITE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_SIT_MAT'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_NBRE_ENF'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_ADR_PERM'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_ADR_ACT'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_INDICATIF'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_NUM_TEL'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_NUM_GSM'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_PERMIS'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_DEMANDE_EMPLOI'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CV'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CERTIFICAT_TRAVAIL'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_PHOTO'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_ACTE_NAISS'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_FICHE_FAMILLE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CERTIF_NAT'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CERTIF_DOMICILE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CERTIF_MEDICAL'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CASIER_JUDICIAIRE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_IS_FAMILLE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_MOTIV_POSTE'], "text"),
	$this->GetSQLValueString($param['FK_UTIL_ID'], "text"));

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

//modification des enregistrements de la table candidat 

function modifier_enreg_candidat($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_candidat()." SET 
	".$this->GetCh_CANDIDAT_ID()."=%s,
	".$this->GetCh_CANDIDAT_TYPE()."=%s,
	".$this->GetCh_CANDIDAT_CIVILITE()."=%s,
	".$this->GetCh_CANDIDAT_NOM()."=%s,
	".$this->GetCh_CANDIDAT_PRENOM()."=%s,
	".$this->GetCh_CANDIDAT_MATRICULE()."=%s,
	".$this->GetCh_CANDIDAT_DATE_NAISSANCE()."=%s,
	".$this->GetCh_CANDIDAT_LIEU_NAISSANCE()."=%s,
	".$this->GetCh_CANDIDAT_NATIONALITE()."=%s,
	".$this->GetCh_CANDIDAT_SIT_MAT()."=%s,
	".$this->GetCh_CANDIDAT_NBRE_ENF()."=%s,
	".$this->GetCh_CANDIDAT_ADR_PERM()."=%s,
	".$this->GetCh_CANDIDAT_ADR_ACT()."=%s,
	".$this->GetCh_CANDIDAT_INDICATIF()."=%s,
	".$this->GetCh_CANDIDAT_NUM_TEL()."=%s,
	".$this->GetCh_CANDIDAT_NUM_GSM()."=%s,
	".$this->GetCh_CANDIDAT_PERMIS()."=%s,
	".$this->GetCh_CANDIDAT_DEMANDE_EMPLOI()."=%s,
	".$this->GetCh_CANDIDAT_CV()."=%s,
	".$this->GetCh_CANDIDAT_CERTIFICAT_TRAVAIL()."=%s,
	".$this->GetCh_CANDIDAT_PHOTO()."=%s,
	".$this->GetCh_CANDIDAT_ACTE_NAISS()."=%s,
	".$this->GetCh_CANDIDAT_FICHE_FAMILLE()."=%s,
	".$this->GetCh_CANDIDAT_CERTIF_NAT()."=%s,
	".$this->GetCh_CANDIDAT_CERTIF_DOMICILE()."=%s,
	".$this->GetCh_CANDIDAT_CERTIF_MEDICAL()."=%s,
	".$this->GetCh_CANDIDAT_CASIER_JUDICIAIRE()."=%s,
	".$this->GetCh_CANDIDAT_IS_FAMILLE()."=%s,
	".$this->GetCh_CANDIDAT_MOTIV_POSTE()."=%s,
	".$this->GetCh_FK_UTIL_ID()."=%s
	 WHERE ".$this->GetCh_CANDIDAT_ID()."=%s",

	$this->GetSQLValueString($param['CANDIDAT_ID'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_TYPE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CIVILITE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_NOM'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_PRENOM'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_MATRICULE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_DATE_NAISSANCE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_LIEU_NAISSANCE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_NATIONALITE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_SIT_MAT'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_NBRE_ENF'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_ADR_PERM'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_ADR_ACT'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_INDICATIF'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_NUM_TEL'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_NUM_GSM'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_PERMIS'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_DEMANDE_EMPLOI'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CV'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CERTIFICAT_TRAVAIL'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_PHOTO'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_ACTE_NAISS'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_FICHE_FAMILLE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CERTIF_NAT'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CERTIF_DOMICILE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CERTIF_MEDICAL'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_CASIER_JUDICIAIRE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_IS_FAMILLE'], "text"),
	$this->GetSQLValueString($param['CANDIDAT_MOTIV_POSTE'], "text"),
	$this->GetSQLValueString($param['FK_UTIL_ID'], "text"));

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