<?php
require_once($_SESSION['AVP_CONFIG']);
Class Dossier_class extends Utilitaires_class{

//création du model 
protected $table_dossier;
protected $champ_DOSSIER_ID;
protected $champ_DOSSIER_NOM;
protected $champ_DOSSIER_LIEN;
protected $champ_FK_CANDIDAT_ID;
protected $champ_Type_doss;

function __construct()
  {
	
	$this->table_dossier='dossier';
	$this->champ_DOSSIER_ID='DOSSIER_ID';
	$this->champ_DOSSIER_NOM='DOSSIER_NOM';
	$this->champ_DOSSIER_LIEN='DOSSIER_LIEN';
	$this->champ_FK_CANDIDAT_ID='FK_CANDIDAT_ID';
	$this->champ_Type_doss='Type_doss';

  }
 
// les getteurs 
function Get_table_dossier(){return $this->table_dossier;}
function GetCh_DOSSIER_ID(){return $this->champ_DOSSIER_ID;}
function GetCh_DOSSIER_NOM(){return $this->champ_DOSSIER_NOM;}
function GetCh_DOSSIER_LIEN(){return $this->champ_DOSSIER_LIEN;}
function GetCh_FK_CANDIDAT_ID(){return $this->champ_FK_CANDIDAT_ID;}
function GetCh_Type_doss(){return $this->champ_Type_doss;}

// création de la fonction Lister dossier

function lister_dossier($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_DOSSIER_ID();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_dossier(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }
  
  function lister_dossier_By_CAND_ID($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_FK_CANDIDAT_ID();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_dossier(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }


// création de la fonction supprimer dossier

function supprimer_dossier($cle)
  {
	$le_champ_cle=$this->GetCh_DOSSIER_ID();

	if($this->supprimer_enreg($this->Get_table_dossier(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_dossier($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_dossier()."(
	
	".$this->GetCh_DOSSIER_NOM().",
	".$this->GetCh_DOSSIER_LIEN().",
	".$this->GetCh_FK_CANDIDAT_ID().",
	".$this->GetCh_Type_doss()."
	
	)
	VALUES(%s,%s,%s,%s)",

	
	$this->GetSQLValueString($param['DOSSIER_NOM'], "text"),
	$this->GetSQLValueString($param['DOSSIER_LIEN'], "text"),
	$this->GetSQLValueString($param['FK_CANDIDAT_ID'], "text"),
	$this->GetSQLValueString($param['Type_doss'], "text")
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

//modification des enregistrements de la table dossier 

  function modifier_enreg_dossier($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_dossier()." SET 
	
	".$this->GetCh_DOSSIER_NOM()."=%s,
	".$this->GetCh_DOSSIER_LIEN()."=%s	
	 WHERE ".$this->GetCh_DOSSIER_ID()."=%s",

	$this->GetSQLValueString($param['DOSSIER_NOM'], "text"),
	$this->GetSQLValueString($param['DOSSIER_LIEN'], "text"),
	$this->GetSQLValueString($param['DOSSIER_ID'], "int"));
	
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
   
   function getPath_dir($type_doss)
   {
	
	   switch($type_doss)
	   {
		   case "Act_naiss":
		   {
			   return ACT_NAISS;  
			   break;
		   }
		   case "Demande_emploi":
		   {
			   return DEMANDE_EMPL;
			   break;
		   }
		   case "Cv":
		   {
			   return CV;
			   break;
		   }
		   case "Cert_trav":
		   {
			   return CERTIF_TRAV;
			   break;
		   }
		   case "Cert_nat":
		   {
			   return CERTIF_NATIONAL;
			   break;
		   }
		   case "Cert_dom":
		   {
			   return CERTIF_DOM;
			   break;
		   }
		   case "Cert_med":
		   {
			   return CERTIF_MEDIC;
			   break;
		   }
		   case "Casier_jud":
		   {
			   return CASIER_JUD;
			   break;
		   }
		   case "Fiche_fam":
		   {
			  return FICHE_FAMIL;
			  break; 
		   }
		   
	   }
   }
   
   function getLastDossId($type_doss)
   {
	    
		$currentype_doss='';
		
		switch($type_doss)
	    {
			   case "Act_naiss":
			   {
		           $currentype_doss="Act_naiss";
				   break;
			   }
			   case "Demande_emploi":
			   {
				  $currentype_doss="Demande_emploi";
				   break;
			   }
			   case "Cv":
			   {
				   $currentype_doss="Cv";
				   break;
			   }
			  
			   case "Cert_trav":
			   {
				   $currentype_doss="Cert_trav";
				   break;
			   }
			   case "Cert_nat":
			   {
				   $currentype_doss="Cert_nat";
				   break;
			   }
			   case "Cert_dom":
			   {
				   $currentype_doss="Cert_dom";
				   break;
			   }
			   case "Cert_med":
			   {
				   $currentype_doss="Cert_med";
				   break;
			   }
			   case "Casier_jud":
			   {
				  $currentype_doss="Casier_jud";
				   break;
			   }
			   case "Fiche_fam":
			   {
				   $currentype_doss="Fiche_fam";
				   break;
			   }
	       }
		   
		   $obj_dossier=new Dossier_class();
		   $Cnn= $obj_dossier->ma_connexion();
		   $default=1;
		   
		   $requete=sprintf(" SELECT  ".$this->GetCh_DOSSIER_ID()." FROM ".$this->Get_table_dossier()."  WHERE 1=1");

		      if($currentype_doss!="")
			  {
				   $requete.=sprintf(" AND  ".$this->GetCh_Type_doss()."=%s ",
				   $this->GetSQLValueString($currentype_doss,"text"));
			  }
		                
			 $requete.=sprintf("  ORDER BY ".$this->GetCh_DOSSIER_ID()."  DESC ");
			 $retour=$Cnn->query($requete);
			 $result=$retour->fetchAll(PDO::FETCH_ASSOC);
			 $lastid=@$result[0][$this->GetCh_DOSSIER_ID()];
			 if($lastid!="" && $lastid!=NULL )
			 {
				 return intval($lastid) + 1;
			 }
			 else
			 {
				return $default; 
			 }
	 
     }


}
?>