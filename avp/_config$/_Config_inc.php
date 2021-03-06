<?php 

    /* initialisation du site          */
	 define('NAME_APP','avp');
	 define('TITLE_APP','');
	 define('URL_SITE','http://localhost/avp');
	 define('PATH_URL_SITE','http://localhost');

	//********************* Mysql ******************
	  define('DB_SERVEUR','localhost;');
	    //define('DB_PORT','5432');
	  define('DB_BASE','recrut1');
      define('DB_USER','root');
	  define('DB_PASSWORD','');
	  define('DB_TYPE','mysql');
	 //**********************************
	  define('CNN_STRING',DB_TYPE.':host='.DB_SERVEUR.'dbname='.DB_BASE);
	
	/* variables pour require include et chemin des fichier configuration  dossiers */    
	
	define('APP_DIR',$_SERVER['DOCUMENT_ROOT'].'avp/');
	define('CONFIG_DIR',APP_DIR.'_config$/');
	define('CONTROLER_DIR',APP_DIR.'controler/');
	define('MODELE_DIR',APP_DIR.'modele/');
	define('UTILITAIRES',APP_DIR.'utilitaires/');
    define('PHOTO_DIR',APP_DIR.'photos/');
	define('ANNONCE_DIR',APP_DIR.'annonce/');
	define('CASIER_JUD_DIR',APP_DIR.'casierJudiciaire/');
    define('CERTIF_TRAV_DIR',APP_DIR.'certificat_travail/');
	
	define('CERTIF_DOM_DIR',APP_DIR.'certificatDomicile/');
    define('CERTIF_MEDIC_DIR',APP_DIR.'certificatMedical/');
	define('CERTIF_NATIONAL_DIR',APP_DIR.'certificatNationalite/');
	
	define('DEMANDE_EMPL_DIR',APP_DIR.'demande_emploi/');
    define('DIPLOME_DIR',APP_DIR.'diplome/');
	define('DOSSIER_DIR',APP_DIR.'dossiers/');
	define('CV_DIR',APP_DIR.'cv/');
	define('FICHE_FAMIL_DIR',APP_DIR.'ficheFamille/');
	define('ACT_NAISS_DIR',APP_DIR.'acteNaissance/');
    
	define('MODELE_TAMPON_DIR',APP_DIR.'modele_tampon/');
	define('CONTROLER_TAMPON_DIR',APP_DIR.'controler_tampon/');
	define('VUE_TAMPON_DIR',APP_DIR.'vue_tampon/');
	define('WEBROOT_DIR',APP_DIR.'webroot/');

	define('VUES_DIR',APP_DIR.'vues/');

	/*********** variable pour redirection and post ************************/
	
	 define('HOME','/avp/index.php?page=');
	 define('HOME1','/avp/index.php');
	 
	 define('PATH_DOC_ROOT','/avp/');
	 define('CONTROLER',PATH_DOC_ROOT.'controler/');
	 define('CONFIG',PATH_DOC_ROOT.'_config$/');
	 
     define('JS',PATH_DOC_ROOT.'js/');
     define('MODELE',PATH_DOC_ROOT.'modele/');
     define('VUES',PATH_DOC_ROOT.'vues/');
	 
	 define('PHOTO',PATH_DOC_ROOT.'photos/');
	 define('ANNONCE',PATH_DOC_ROOT.'annonce/');
	 define('CASIER_JUD',PATH_DOC_ROOT.'casierJudiciaire/');
	 define('CERTIF_TRAV',PATH_DOC_ROOT.'certificat_travail/');
	 
	 define('CERTIF_DOM',PATH_DOC_ROOT.'certificatDomicile/');
     define('CERTIF_MEDIC',PATH_DOC_ROOT.'certificatMedical/');
	 define('CERTIF_NATIONAL',PATH_DOC_ROOT.'certificatNationalite/');
	 
	 define('DEMANDE_EMPL',PATH_DOC_ROOT.'demande_emploi/');
     define('DIPLOME',PATH_DOC_ROOT.'diplome/');
	 define('DOSSIER',PATH_DOC_ROOT.'dossiers/');
	 define('CV',PATH_DOC_ROOT.'cv/');
	 define('FICHE_FAMIL',PATH_DOC_ROOT.'ficheFamille/');
	 define('ACT_NAISS',PATH_DOC_ROOT.'acteNaissance/');
	 define('WEBROOT',PATH_DOC_ROOT.'webroot/');
	 

	 define('DISABLE_LINK','style="cursor:pointer; background:#ccc; color:#FFF;ouline:none;"'.'  '.'onClick="return false;"');
	
	 define('LOG_OUT','../'); 
	
	
	function __autoload($class)
	{
	   if(!class_exists($class,false))
       {
       	  	$str_file_config_require=CONFIG_DIR.$class.'.php';
			$str_file_model_require=MODELE_DIR.$class.'.php';
			if(file_exists($str_file_config_require)){require_once(CONFIG_DIR.$class.'.php');}
			elseif(file_exists($str_file_model_require)){require_once(MODELE_DIR.$class.'.php');}
       }
	   
   }




?>