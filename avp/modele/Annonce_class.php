<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);
Class Annonce_class extends Utilitaires_class
{

//création du model 
protected $table_annonce;
protected $champ_ANNONCE_ID;
protected $champ_ANNONCE_NUM;
protected $champ_ANNONCE_TITRE;
protected $champ_ANNONCE_DESCRIPTION;
protected $champ_ANNONCE_LIEN;
protected $champ_ANNONCE_DATE_DEB;
protected $champ_ANNONCE_DATE_FIN;
protected $champ_ANNONCE_DATE_CREATION;
protected $champ_ANNONCE_AGE;
protected $champ_ANNONCE_DELAI_AGE;
protected $champ_SECTEUR;
protected $champ_ETAT;
protected $champ_DEPARTEMENT;

  function __construct()
  {
	
	$this->table_annonce='annonce';
	$this->champ_ANNONCE_ID='ANNONCE_ID';
	$this->champ_ANNONCE_NUM='ANNONCE_NUM';
	$this->champ_ANNONCE_TITRE='ANNONCE_TITRE';
	$this->champ_ANNONCE_DESCRIPTION='ANNONCE_DESCRIPTION';
	$this->champ_ANNONCE_LIEN='ANNONCE_LIEN';
	$this->champ_ANNONCE_DATE_DEB='ANNONCE_DATE_DEB';
	$this->champ_ANNONCE_DATE_FIN='ANNONCE_DATE_FIN';
	$this->champ_ANNONCE_DATE_CREATION='ANNONCE_DATE_CREATION';
	$this->champ_ANNONCE_AGE='ANNONCE_AGE';
	$this->champ_ANNONCE_DELAI_AGE='ANNONCE_DELAI_AGE';
	$this->champ_SECTEUR='SECTEUR';
	$this->champ_ETAT='ETAT';
	$this->champ_DEPARTEMENT='DEPARTEMENT';

  }
 
// les getteurs 
function Get_table_annonce(){return $this->table_annonce;}
function GetCh_ANNONCE_ID(){return $this->champ_ANNONCE_ID;}
function GetCh_ANNONCE_NUM(){return $this->champ_ANNONCE_NUM;}
function GetCh_ANNONCE_TITRE(){return $this->champ_ANNONCE_TITRE;}
function GetCh_ANNONCE_DESCRIPTION(){return $this->champ_ANNONCE_DESCRIPTION;}
function GetCh_ANNONCE_LIEN(){return $this->champ_ANNONCE_LIEN;}
function GetCh_ANNONCE_DATE_DEB(){return $this->champ_ANNONCE_DATE_DEB;}
function GetCh_ANNONCE_DATE_FIN(){return $this->champ_ANNONCE_DATE_FIN;}
function GetCh_ANNONCE_DATE_CREATION(){return $this->champ_ANNONCE_DATE_CREATION;}
function GetCh_ANNONCE_AGE(){return $this->champ_ANNONCE_AGE;}
function GetCh_ANNONCE_DELAI_AGE(){return $this->champ_ANNONCE_DELAI_AGE;}
function GetCh_SECTEUR(){return $this->champ_SECTEUR;}
function GetCh_ETAT(){return $this->champ_ETAT;}
function GetCh_DEPARTEMENT(){return $this->champ_DEPARTEMENT;}

// création de la fonction Lister annonce

  function lister_annonce($cle="",$trie="ASC",$nbre_enreg="")
  {
	 $le_champ_cle=$this->GetCh_ANNONCE_ID();

	 $type_champ="text";

	 $result=$this->lister_enreg($this->Get_table_annonce(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	 return $result;

  }
  
  function lister_annonce_admin($id_user)
  {
    $req="SELECT * , date_format(ANNONCE_DATE_DEB , '%d/%m/%Y') as date_debut, date_format(ANNONCE_DATE_FIN, '%d/%m/%Y') as date_fin,date_format(ANNONCE_DELAI_AGE, '%d/%m/%Y') as delai
        FROM annonce a WHERE a.ANNONCE_ID NOT IN ( SELECT p.FK_annonce_id FROM postulation p WHERE p.FK_UTIL_ID =".$id_user.")
        AND ANNONCE_DATE_FIN >= CURRENT_DATE";
		
		$Cnn=$this->ma_connexion();
		
		$retour=$Cnn->query($req);
		$resultat=$retour->fetchAll(PDO::FETCH_ASSOC);
		return $resultat;
  }
  
  
  
  function lister_annonce_pagine($limit_start,$pagination)
  {
    $req="SELECT *,date_format(ANNONCE_DATE_DEB ,'%d/%m/%Y') as date_debut, date_format(ANNONCE_DATE_FIN, '%d/%m/%Y') as date_fin, date_format(ANNONCE_DELAI_AGE, '%d/%m/%Y') as delai  FROM annonce order by ANNONCE_DATE_CREATION DESC LIMIT $limit_start, $pagination";
		
		$Cnn=$this->ma_connexion();
		
		
		$retour=$Cnn->query($req);
		$resultat=$retour->fetchAll(PDO::FETCH_ASSOC);
		return $resultat;
  }
  
  function count_annonce()
  {
        $req = 'SELECT COUNT(*) AS nb_total FROM annonce';
        $Cnn=$this->ma_connexion();
		$retour=$Cnn->query($req);
		$resultat=$retour->fetchAll(PDO::FETCH_ASSOC);
		return $resultat[0]["nb_total"];
  }
  
  function count_annonce_admin($id_user)
  {
        $req = "SELECT *, COUNT(*) AS nb_total, date_format(ANNONCE_DATE_DEB , '%d/%m/%Y') as date_debut, date_format(ANNONCE_DATE_FIN, '%d/%m/%Y') as date_fin,date_format(ANNONCE_DELAI_AGE, '%d/%m/%Y') as delai
        FROM annonce a WHERE a.ANNONCE_ID NOT IN ( SELECT p.FK_annonce_id FROM postulation p WHERE p.FK_UTIL_ID =".$id_user.")
        AND ANNONCE_DATE_FIN >= CURRENT_DATE";
		
        $Cnn=$this->ma_connexion();
		$retour=$Cnn->query($req);
		$resultat=$retour->fetchAll(PDO::FETCH_ASSOC);
		return $resultat[0]["nb_total"];
		
  }
  
  function count_annonce2()
  {
        $req = 'SELECT COUNT(*) AS nb_total FROM annonce WHERE ANNONCE_DATE_FIN >= CURRENT_DATE';
        $Cnn=$this->ma_connexion();
		$retour=$Cnn->query($req);
		$resultat=$retour->fetchAll(PDO::FETCH_ASSOC);
		return $resultat[0]["nb_total"];
  }
  
  function lister_annonce_pagine1($limit_start,$pagination)
  {
    $req="SELECT *, date_format(ANNONCE_DATE_DEB , '%d/%m/%Y') as date_debut, date_format(ANNONCE_DATE_FIN, '%d/%m/%Y') as date_fin,date_format(ANNONCE_DELAI_AGE, '%d/%m/%Y') as delai  FROM annonce WHERE ANNONCE_DATE_FIN >= CURRENT_DATE order by ANNONCE_DATE_CREATION DESC  LIMIT $limit_start, $pagination";
		
		$Cnn=$this->ma_connexion();
		$retour=$Cnn->query($req);
		$resultat=$retour->fetchAll(PDO::FETCH_ASSOC);
		return $resultat;
  }

   function lister_annonce_pagine2($secteur,$limit_start,$pagination)
  {
    $req="SELECT *, date_format(ANNONCE_DATE_DEB , '%d/%m/%Y') as date_debut, date_format(ANNONCE_DATE_FIN, '%d/%m/%Y') as date_fin, date_format(ANNONCE_DELAI_AGE, '%d/%m/%Y') as delai FROM annonce  WHERE ANNONCE_DATE_FIN >= CURRENT_DATE  AND SECTEUR='$secteur'  order by ANNONCE_DATE_CREATION DESC LIMIT $limit_start, $pagination";
		
		$Cnn=$this->ma_connexion();
		$retour=$Cnn->query($req);
		$resultat=$retour->fetchAll(PDO::FETCH_ASSOC);
		return $resultat;
  }


// création de la fonction supprimer annonce

 function supprimer_annonce($cle)
 {
	$le_champ_cle=$this->GetCh_ANNONCE_ID();

	if($this->supprimer_enreg($this->Get_table_annonce(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_annonce($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_annonce()."(
	
	".$this->GetCh_ANNONCE_NUM().",
	".$this->GetCh_ANNONCE_TITRE().",
	".$this->GetCh_ANNONCE_DESCRIPTION().",
	".$this->GetCh_ANNONCE_LIEN().",
	".$this->GetCh_ANNONCE_DATE_DEB().",
	".$this->GetCh_ANNONCE_DATE_FIN().",
	".$this->GetCh_ANNONCE_DATE_CREATION().",
	".$this->GetCh_ANNONCE_AGE().",
	".$this->GetCh_ANNONCE_DELAI_AGE().",
	".$this->GetCh_SECTEUR().",
	".$this->GetCh_ETAT().",
	".$this->GetCh_DEPARTEMENT()."
	)
	VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",


	$this->GetSQLValueString($param['ANNONCE_NUM'], "text"),
	$this->GetSQLValueString($param['ANNONCE_TITRE'], "text"),
	$this->GetSQLValueString($param['ANNONCE_DESCRIPTION'], "text"),
	$this->GetSQLValueString($param['ANNONCE_LIEN'], "text"),
	$this->GetSQLValueString($param['ANNONCE_DATE_DEB'], "text"),
	$this->GetSQLValueString($param['ANNONCE_DATE_FIN'], "text"),
	$this->GetSQLValueString($param['ANNONCE_DATE_CREATION'], "text"),
	$this->GetSQLValueString($param['ANNONCE_AGE'], "text"),
	$this->GetSQLValueString($param['ANNONCE_DELAI_AGE'], "text"),
	$this->GetSQLValueString($param['SECTEUR'], "text"),
	$this->GetSQLValueString($param['ETAT'], "text"),
	$this->GetSQLValueString($param['DEPARTEMENT'], "text"));
	
	
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

//modification des enregistrements de la table annonce 

function modifier_enreg_annonce($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_annonce()." SET 
	
	".$this->GetCh_ANNONCE_NUM()."=%s,
	".$this->GetCh_ANNONCE_TITRE()."=%s,
	".$this->GetCh_ANNONCE_DESCRIPTION()."=%s,
	".$this->GetCh_ANNONCE_LIEN()."=%s,
	".$this->GetCh_ANNONCE_DATE_DEB()."=%s,
	".$this->GetCh_ANNONCE_DATE_FIN()."=%s,
	".$this->GetCh_ANNONCE_DATE_CREATION()."=%s,
	".$this->GetCh_ANNONCE_AGE()."=%s,
	".$this->GetCh_ANNONCE_DELAI_AGE()."=%s,
	".$this->GetCh_SECTEUR()."=%s,
	".$this->GetCh_ETAT()."=%s,
	".$this->GetCh_DEPARTEMENT()."=%s
	 WHERE ".$this->GetCh_ANNONCE_ID()."=%s",

	
	$this->GetSQLValueString($param['ANNONCE_NUM'], "text"),
	$this->GetSQLValueString($param['ANNONCE_TITRE'], "text"),
	$this->GetSQLValueString($param['ANNONCE_DESCRIPTION'], "text"),
	$this->GetSQLValueString($param['ANNONCE_LIEN'], "text"),
	$this->GetSQLValueString($param['ANNONCE_DATE_DEB'], "text"),
	$this->GetSQLValueString($param['ANNONCE_DATE_FIN'], "text"),
	$this->GetSQLValueString($param['ANNONCE_DATE_CREATION'], "text"),
	$this->GetSQLValueString($param['ANNONCE_AGE'], "text"),
	$this->GetSQLValueString($param['ANNONCE_DELAI_AGE'], "text"),
	$this->GetSQLValueString($param['SECTEUR'], "text"),
	$this->GetSQLValueString($param['ETAT'], "text"),
	$this->GetSQLValueString($param['DEPARTEMENT'], "int"),
	$this->GetSQLValueString($param['ANNONCE_ID'], "int"));
	

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