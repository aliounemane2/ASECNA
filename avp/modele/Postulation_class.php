<?php
require_once($_SESSION['AVP_CONFIG']);
Class Postulation_class extends Utilitaires_class{

//création du model 
protected $table_postulation;
protected $champ_postulation_id;
protected $champ_postulation_date;
protected $champ_FK_UTIL_ID;
protected $champ_postulation_age_candidat;
protected $champ_FK_annonce_id;
protected $champ_note;
protected $champ_retenu;
protected $champ_preselect;

function __construct()
  {
	
	$this->table_postulation='postulation';
	$this->champ_postulation_id='postulation_id';
	$this->champ_postulation_date='postulation_date';
	$this->champ_FK_UTIL_ID='FK_UTIL_ID';
	$this->champ_postulation_age_candidat='postulation_age_candidat';
	$this->champ_FK_annonce_id='FK_annonce_id';
	$this->champ_note='note';
	$this->champ_retenu='retenu';
	$this->champ_preselect='preselect';

  }
 
// les getteurs 
function Get_table_postulation(){return $this->table_postulation;}
function GetCh_postulation_id(){return $this->champ_postulation_id;}
function GetCh_postulation_date(){return $this->champ_postulation_date;}
function GetCh_FK_UTIL_ID(){return $this->champ_FK_UTIL_ID;}
function GetCh_postulation_age_candidat(){return $this->champ_postulation_age_candidat;}
function GetCh_FK_annonce_id(){return $this->champ_FK_annonce_id;}

function GetCh_note(){return $this->champ_note;}
function GetCh_retenu(){return $this->champ_retenu;}
function GetCh_preselect(){return $this->champ_preselect;}

// création de la fonction Lister postulation

function lister_postulation($cle="",$trie="ASC",$nbre_enreg="")
  {
	$le_champ_cle=$this->GetCh_postulation_id();

	$type_champ="text";

	$result=$this->lister_enreg($this->Get_table_postulation(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);

	return $result;

  }
  function getNoteByidannAndFk_util_ser($id_annonce,$fk_user_id)
  {
	   $Cnn=$this->ma_connexion();
	   $req = sprintf("SELECT note FROM postulation WHERE ".$this->GetCh_FK_UTIL_ID()."=%s  AND ".$this->GetCh_FK_annonce_id()."=%s",
	   
	   $this->GetSQLValueString($fk_user_id,"int"),
	   $this->GetSQLValueString($id_annonce,"int"));
	   
	   $retour=$Cnn->query($req);
	   $result=$retour->fetchAll(PDO::FETCH_ASSOC);
	   
	   $note=$result[0][$this->GetCh_note()];
	   if($note!="")
	   {
	    return $note;
	   }
	   else
	   {
		    return "";
	   }
  }
  
  function liste_candidat_saisi_note_retenu($annonce_id)
  {
	    $req= sprintf( " SELECT * FROM utilisateurs u,candidat c, postulation p, annonce a WHERE  u.UTIL_ID = p.FK_UTIL_ID 
	
	        AND c.FK_UTIL_ID  = u.UTIL_ID AND p.FK_annonce_id= a.ANNONCE_ID
            AND p.FK_annonce_id =%s",
			
			$this->GetSQLValueString($annonce_id,"int")); 
			
			$Cnn=$this->ma_connexion();
			 
		    $retour=$Cnn->query($req);
	        $result=$retour->fetchAll(PDO::FETCH_ASSOC);
	   
	        return $result;  
  }
  
  
  
  
  function  getInfo_postul_candidat($fk_util_id,$id_annonce)
  {
	 $req= sprintf("SELECT * FROM candidat c, postulation p, annonce a WHERE p.fk_util_id = c.fk_util_id
            AND p.fk_annonce_id = a.annonce_id  AND p.postulation_age_candidat <= a.annonce_age && p.postulation_age_candidat >=18
            AND p.fk_annonce_id =%s   AND c.fk_util_id=%s",
			
			$this->GetSQLValueString($id_annonce,"int"),
			$this->GetSQLValueString($fk_util_id,"int")); 
			$Cnn=$this->ma_connexion();
			 
		    $retour=$Cnn->query($req);
	        $result=$retour->fetchAll(PDO::FETCH_ASSOC);
	   
	        return $result;
			
			
	  
  }
  
  function  getInfo_postul_annonce($id_annonce)
  {
	 $req= sprintf("SELECT *
					FROM candidat c, postulation p, annonce a
					WHERE p.fk_util_id = c.fk_util_id
					AND p.fk_annonce_id = a.annonce_id
					AND p.postulation_age_candidat <= a.annonce_age && p.postulation_age_candidat >=18
					AND p.fk_annonce_id =%s",
			
					$this->GetSQLValueString($id_annonce,"int")); 
					$Cnn=$this->ma_connexion();
					 
					$retour=$Cnn->query($req);
					$result=$retour->fetchAll(PDO::FETCH_ASSOC);
	   
	                return $result;
  }
  
  function update_postulation($note,$fk_util_id,$annonce_id,$retenu)
  {
	  $req=sprintf(" UPDATE  ".$this->Get_table_postulation()." SET ".$this->GetCh_note()."=%s ,".$this->GetCh_retenu()."=%s  WHERE ".$this->GetCh_FK_UTIL_ID()."=%s  AND ".$this->GetCh_FK_annonce_id()."=%s ",
	  
	  $this->GetSQLValueString($note,"int"),
	  $this->GetSQLValueString($retenu,"text"),
	  $this->GetSQLValueString($fk_util_id,"int"),
	  $this->GetSQLValueString($annonce_id,"int"));
	 
	   $Cnn=$this->ma_connexion();
	   $retour=$Cnn->exec($req);
	   
	   if($retour)
	   {
		   return true; 
	   }
	   else
	   {
		   return false;
	   }
	 
	  
  }
  
  function update_topic_postul($preselect,$fk_util_id,$annonce_id)
  {
	  $req=sprintf(" UPDATE  ".$this->Get_table_postulation()." SET ".$this->GetCh_preselect()."=%s  WHERE ".$this->GetCh_FK_UTIL_ID()."=%s  AND ".$this->GetCh_FK_annonce_id()."=%s ",
	  
	  $this->GetSQLValueString($preselect,"text"),
	  $this->GetSQLValueString($fk_util_id,"int"),
	  $this->GetSQLValueString($annonce_id,"int"));
	 
	   $Cnn=$this->ma_connexion();
	   $retour=$Cnn->exec($req);
	   
	   if($retour)
	   {
		   return true; 
	   }
	   else
	   {
		   return false;
	   }
	 
	  
  }
  
  function update_topic_postulBy_annonce_id($preselect,$annonce_id)
  {
	  $req=sprintf(" UPDATE  ".$this->Get_table_postulation()." SET ".$this->GetCh_preselect()."=%s  WHERE ".$this->GetCh_FK_annonce_id()."=%s ",
	  
	  $this->GetSQLValueString($preselect,"text"),
	  $this->GetSQLValueString($annonce_id,"int"));
	 
	   $Cnn=$this->ma_connexion();
	   $retour=$Cnn->exec($req);
	   
	   if($retour)
	   {
		   return true; 
	   }
	   else
	   {
		   return false;
	   }
	 
	  
  }


// création de la fonction supprimer postulation

function supprimer_postulation($cle)
  {
	$le_champ_cle=$this->GetCh_postulation_id();

	if($this->supprimer_enreg($this->Get_table_postulation(),$le_champ_cle,$cle))
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

  }

//Ajout d'enregistrement

function ajouter_enreg_postulation($param,$Cnn)
  {

	$insertSQL = sprintf("INSERT INTO ".$this->Get_table_postulation()."(
	
	".$this->GetCh_postulation_date().",
	".$this->GetCh_FK_UTIL_ID().",
	".$this->GetCh_postulation_age_candidat().",
	".$this->GetCh_FK_annonce_id()."
	)
	VALUES(%s,%s,%s,%s)",

	
	$this->GetSQLValueString($param['postulation_date'], "text"),
	$this->GetSQLValueString($param['FK_UTIL_ID'], "text"),
	$this->GetSQLValueString($param['postulation_age_candidat'], "text"),
	$this->GetSQLValueString($param['FK_annonce_id'], "text"));

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

//modification des enregistrements de la table postulation 

function modifier_enreg_postulation($param,$Cnn)
  {

	$updateSQL = sprintf("UPDATE ".$this->Get_table_postulation()." SET 
	
	".$this->GetCh_postulation_date()."=%s,
	".$this->GetCh_FK_UTIL_ID()."=%s,
	".$this->GetCh_postulation_age_candidat()."=%s,
	".$this->GetCh_FK_annonce_id()."=%s
	 WHERE ".$this->GetCh_postulation_id()."=%s",

	
	$this->GetSQLValueString($param['postulation_date'], "text"),
	$this->GetSQLValueString($param['FK_UTIL_ID'], "text"),
	$this->GetSQLValueString($param['postulation_age_candidat'], "text"),
	$this->GetSQLValueString($param['FK_annonce_id'], "text"),
	$this->GetSQLValueString($param['FK_annonce_id'], "text"),
	$this->GetSQLValueString($param['postulation_id'], "text")
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
   
   function test_postulation($id_user)
   {
	   $Cnn=$this->ma_connexion();
	   $req = "SELECT * FROM postulation WHERE FK_UTIL_ID=$id_user";
	   
	   $retour=$Cnn->query($req);
	   $result=$retour->fetchAll(PDO::FETCH_ASSOC);
	   
	   return $result;
	   
   }
   
   function check_nbre_postul($id_user,$id_annonce)
   {
	   
	   $Cnn=$this->ma_connexion();
	   $req = sprintf("SELECT * FROM postulation WHERE ".$this->GetCh_FK_UTIL_ID()."=%s  AND ".$this->GetCh_FK_annonce_id()."=%s",
	   
	   $this->GetSQLValueString($id_user,"int"),
	   $this->GetSQLValueString($id_annonce,"int"));
	   
	   $retour=$Cnn->query($req);
	   $result=$retour->fetchAll(PDO::FETCH_ASSOC);
	   
	   $nbre_count=count($result);
	 
	   if($result && $nbre_count>=1)
	   {
		  return true;
	   }
	   else
	   {
		  return false;
	   }
	   
	 	   
   }
   
   function check_nbrepostule($id_user)
   {
	   
	   $Cnn=$this->ma_connexion();
	   $req = sprintf("SELECT * FROM postulation WHERE ".$this->GetCh_FK_UTIL_ID()."=%s ",
	   
	   $this->GetSQLValueString($id_user,"int"));
	   
	   $retour=$Cnn->query($req);
	   $result=$retour->fetchAll(PDO::FETCH_ASSOC);
	   
	   $nbre_count=count($result);
	 
	   if($result && $nbre_count>=1)
	   {
		  return true;
	   }
	   else
	   {
		  return false;
	   }
	  
	   
   }
   
   


}
?>