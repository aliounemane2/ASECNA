<?php
@session_start();
	require_once("_config$/Connexion_class.php");
	require_once($_SESSION['AVP_CONFIG']);
	$Obj=new Connexion_class();
	
	
	/*echo $_SERVER['DOCUMENT_ROOT'];
	define('DB_SERVEUR','localhost');
	define('DB_BASE','asecna');
    define('DB_TYPE','mysql');
	
	define('DB_USER','admin_app');
	define('DB_PASSWORD','admin123');
	//define('DB_TYPE','pgsql');
	define('CNN_STRING',DB_TYPE.':host='.DB_SERVEUR.';dbname='.DB_BASE);
	*/
	
	//echo sha1("passer123");
	
	$champ_tb="";
	$col_name="";
	$rsqlA="";
	$path=pathinfo('modele/Secteur_class.php');
	//echo"\n". $path["filename"];
	
     //define("DB_TYPE", 'pgsql');
	if(DB_TYPE=='pgsql')
	{
		$rsqlA="SELECT tablename FROM pg_tables WHERE tablename !~ '^pg_' AND tablename !~ '^sql_'";
		$champ_tb="tablename";
		$col_name="column_name";
	}
	elseif(DB_TYPE=='mysql')
	{
		$rsqlA="show tables";
		$champ_tb="Tables_in_".DB_BASE;
		$col_name="COLUMN_NAME";
	}
	else
	{
		$rsqlA="";
	}
	
	$Cnn=$Obj->ma_connexion();
	$retour=$Cnn->query($rsqlA);
	$Tab_tables=$retour->fetchAll(PDO::FETCH_ASSOC);
	        
	
	if(isset($_POST['txt_post']))
	{
		$table=trim($_POST['select_table']);
		$mapper_table='mapper_'.$table;
		
		$rsql="select COLUMN_NAME, DATA_TYPE from INFORMATION_SCHEMA.COLUMNS
		where table_name = '$table'
		order by ORDINAL_POSITION";
        
      //  select * from INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME='db_gpc'
        
                $Cnn=$Obj->ma_connexion();
                $retour=$Cnn->query($rsql);
                $resultat=$retour->fetchAll(PDO::FETCH_ASSOC);
                $nbre_enreg=count($resultat);


		if($_POST['modele']=="OUI")
		{
		$le_file=MODELE_TAMPON_DIR.ucfirst($table).'_class.php';
		$classe=ucfirst($table).'_class';
		
		$fp = fopen($le_file, 'w');
		fwrite($fp, '<?php');
		fwrite($fp, "\r\n");
		fwrite($fp, 'require_once($_SESSION[');
		fwrite($fp, "'AVP_CONFIG']);");
		fwrite($fp, "\r\n");
		fwrite($fp, 'Class '.$classe.' extends Utilitaires_class{');
		
		
		// créer le model 
		fwrite($fp, "\r\n");
		fwrite($fp, "\r\n");
		fwrite($fp, "//création du model ");
		fwrite($fp, "\r\n");
		
		
		fwrite($fp, 'protected $table_'.$table.';');
		
		for($i=0;$i<$nbre_enreg;$i++)
		{
			 fwrite($fp, "\r\n");
			 fwrite($fp, 'protected $champ_'.$resultat[$i][$col_name].';');
		}
		
		fwrite($fp, "\r\n");
		fwrite($fp, "\r\n");
		
		
		fwrite($fp, 'function __construct()');
		fwrite($fp, "\r\n");
		fwrite($fp, "  {\r\n\t");
		
		fwrite($fp, "\r\n\t");
		fwrite($fp, '$this->table_'.$table.'=$Tab[\''.$table.'\'];');
			
		for($i=0;$i<$nbre_enreg;$i++)
		{
			fwrite($fp, "\r\n\t");
			fwrite($fp, '$this->champ_'.$resultat[$i][$col_name].'=\''.$resultat[$i][$col_name].'\';');
		}
	
		fwrite($fp, "\r\n");
		fwrite($fp, "\r\n");
		fwrite($fp, "  }\r\n");
		fwrite($fp, " \r\n");
		
		// les getteurs
		fwrite($fp, "// les getteurs");
		fwrite($fp, " \r\n");
		
		fwrite($fp, 'function Get_table_'.$table.'(){return $this->table_'.$table.';}');
		
		for($i=0;$i<$nbre_enreg;$i++)
		{
			fwrite($fp, "\r\n");
			fwrite($fp, 'function GetCh_'.$resultat[$i][$col_name].'(){return $this->champ_'.$resultat[$i][$col_name].';}');
		}
		
		//lister 
		fwrite($fp, "\r\n");
		fwrite($fp, "\r\n");
		fwrite($fp, "// création de la fonction Lister ".$table);
		fwrite($fp, "\r\n");
		fwrite($fp, "\r\n");
		fwrite($fp, 'function lister_'.$table.'($cle="",$trie="ASC",$nbre_enreg="")');
		fwrite($fp, "\r\n");
		fwrite($fp, "  {\r\n\t");
		
		fwrite($fp, '$le_champ_cle=$this->xxx;');
		fwrite($fp, "\r\n");
		fwrite($fp, "\r\n\t");
		fwrite($fp, '$type_champ="text";');
		fwrite($fp, "\r\n");
		fwrite($fp, "\r\n\t");
		fwrite($fp, '$result=$this->lister_enreg($this->Get_table_'.$table.'(),$le_champ_cle,$type_champ,$cle,$trie,$nbre_enreg);');
		fwrite($fp, "\r\n");
		fwrite($fp, "\r\n\t");
		fwrite($fp, 'return $result;');
		fwrite($fp, "\r\n");
		fwrite($fp, "\r\n");
		fwrite($fp, '  }');
		fwrite($fp, "\r\n");
	
	//supprimer
		fwrite($fp, "\r\n");
		fwrite($fp, "\r\n");
		fwrite($fp, "// création de la fonction supprimer ".$table);
		fwrite($fp, "\r\n");
		fwrite($fp, "\r\n");
		fwrite($fp, 'function supprimer_'.$table.'($cle)');
		fwrite($fp, "\r\n");
		fwrite($fp, "  {\r\n\t");
		
		fwrite($fp, '$le_champ_cle=$this->xxx;');
		fwrite($fp, "\r\n");
		fwrite($fp, "\r\n\t");
		fwrite($fp, 'if($this->supprimer_enreg($this->Get_table_'.$table.'(),$le_champ_cle,$cle))');
		fwrite($fp, "\r\n\t");
		fwrite($fp, "  {\r\n\t\t");
		fwrite($fp, 'return true;');
		fwrite($fp, "\r\n\t");
		fwrite($fp, "  }\r\n\t");
		fwrite($fp, 'else');
		fwrite($fp, "\r\n\t");
		fwrite($fp, "  {\r\n\t\t");
		fwrite($fp, 'return false;');
		fwrite($fp, "\r\n\t");
		fwrite($fp, "  }");
		fwrite($fp, "\r\n\r\n");
		fwrite($fp, "  }");
		fwrite($fp, "\r\n\r\n");
		
		
	// ajout
		fwrite($fp, "//Ajout d'enregistrement");
		fwrite($fp, "\r\n\r\n");
		fwrite($fp, 'function ajouter_enreg_'.$table.'($param,$Cnn)');
		fwrite($fp, "\r\n  {\r\n\r\n\t");
		fwrite($fp, '$insertSQL = sprintf("INSERT INTO ".$this->Get_table_'.$table.'()."(');
		
		for($i=0;$i<$nbre_enreg;$i++)
		{
			fwrite($fp, "\r\n\t");
			if($i!=$nbre_enreg-1)
			{
				fwrite($fp, '".$this->GetCh_'.$resultat[$i][$col_name].'().",');
			}
			else
			{
				fwrite($fp, '".$this->GetCh_'.$resultat[$i][$col_name].'()."');
			}
		}
		
		fwrite($fp, "\r\n\t");
		fwrite($fp, ")\r\n\t");
		fwrite($fp, 'VALUES(');
		
		for($i=0;$i<$nbre_enreg;$i++)
		{
			if($i!=$nbre_enreg-1)
			{
				fwrite($fp, '%s,');
			}
			else
			{
				fwrite($fp, '%s');
			}
		}
	
		fwrite($fp, ')",');
		fwrite($fp, "\r\n");
		
		for($i=0;$i<$nbre_enreg;$i++)
		{
			fwrite($fp, "\r\n\t");
			if($i!=$nbre_enreg-1)
			{
				fwrite($fp, '$this->GetSQLValueString($param[\''.$resultat[$i][$col_name].'\'], "text"),');
			}
			else
			{
				fwrite($fp, '$this->GetSQLValueString($param[\''.$resultat[$i][$col_name].'\'], "text")');
			}
		}
		fwrite($fp, ");");
		
		fwrite($fp, "\r\n\r\n\t");
	
		fwrite($fp, '$retour=$Cnn->exec($insertSQL);');
		
		fwrite($fp, "\r\n\r\n\t");
		
		fwrite($fp, 'if(($retour===false))');
		fwrite($fp, "\r\n\t");
		fwrite($fp, "  {\r\n\t\t");	
		fwrite($fp, 'return false;');
		fwrite($fp, "\r\n\t");
		fwrite($fp, "  }\r\n");	
		fwrite($fp, " \t");	
		fwrite($fp, "else\r\n\t");
		fwrite($fp, "  {\r\n\t\t");	
		fwrite($fp, 'return true;');
		fwrite($fp, "\r\n\t");
		fwrite($fp, "  }\r\n");
			
		fwrite($fp, " \r\n   }");	
	
		fwrite($fp, " \r\n\r\n");	
	
	
	// modification	
		fwrite($fp, "//modification des enregistrements de la table ".$table);	
		fwrite($fp, " \r\n\r\n");
		
		fwrite($fp, 'function modifier_enreg_'.$table.'($param,$Cnn)');
		fwrite($fp, "\r\n  {\r\n\r\n\t");
		fwrite($fp, '$updateSQL = sprintf("UPDATE ".$this->Get_table_'.$table.'()." SET ');
		
		for($i=0;$i<$nbre_enreg;$i++)
		{
			fwrite($fp, "\r\n\t");
			if($i!=$nbre_enreg-1)
			{
				fwrite($fp, '".$this->GetCh_'.$resultat[$i][$col_name].'()."=%s,');
			}
			else
			{
				fwrite($fp, '".$this->GetCh_'.$resultat[$i][$col_name].'()."=%s');
			}
		}
		
		fwrite($fp, "\r\n\t");
		fwrite($fp, ' WHERE ".$this->GetCh_'.$resultat[0][$col_name].'()."=%s",');
		fwrite($fp, "\r\n");
		
		for($i=0;$i<$nbre_enreg;$i++)
		{
			fwrite($fp, "\r\n\t");
			if($i!=$nbre_enreg-1)
			{
				fwrite($fp, '$this->GetSQLValueString($param[\''.$resultat[$i][$col_name].'\'], "text"),');
			}
			else
			{
				fwrite($fp, '$this->GetSQLValueString($param[\''.$resultat[$i][$col_name].'\'], "text")');
			}
		}
		
		fwrite($fp, ");");
		
		fwrite($fp, "\r\n\r\n\t");
	
		fwrite($fp, '$retour=$Cnn->exec($updateSQL);');
		
		fwrite($fp, "\r\n\r\n\t");
		
		fwrite($fp, 'if(($retour===false))');
		fwrite($fp, "\r\n\t");
		fwrite($fp, "  {\r\n\t\t");	
		fwrite($fp, 'return false;');
		fwrite($fp, "\r\n\t");
		fwrite($fp, "  }\r\n");	
		fwrite($fp, " \t");	
		fwrite($fp, "else\r\n\t");
		fwrite($fp, "  {\r\n\t\t");	

		fwrite($fp, 'return true;');
		fwrite($fp, "\r\n\t");
		fwrite($fp, "  }\r\n");
			
		fwrite($fp, " \r\n   }");
		
		fwrite($fp, "\r\n\r\n\r\n");
		
		fwrite($fp, "}");
		fwrite($fp, "\r\n");
		fwrite($fp, "?>");
			
	
		fclose($fp);
		}
		
		if($_POST['controleur']=="OUI")
		{
			$file_controleur=CONTROLER_TAMPON_DIR.ucfirst($table).'_controler.php';
			$controleur=ucfirst($table).'_controler';
			$classe=ucfirst($table).'_class';
			$fp_controleur = fopen($file_controleur, 'w');
			fwrite($fp_controleur, '<?php');
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, 'if(session_id()==""){@session_start();}');
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, 'require_once($_SESSION[');
			fwrite($fp_controleur, "'AVP_CONFIG']);");
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, 'Class '.$controleur.' extends '.$classe.'{');
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "//Controleur ajout");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "function controler_ajout()");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "{");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl=new '.$classe.'();');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Tab_param=array(');
	
			for($i=0;$i<$nbre_enreg;$i++)
			{
				fwrite($fp_controleur, "\r\n\t");
				if($i!=$nbre_enreg-1)
				{
					fwrite($fp_controleur, "\t");
					fwrite($fp_controleur, "\t");
					fwrite($fp_controleur, '\''.$resultat[$i][$col_name].'\'=>$_POST[\''.$resultat[$i][$col_name].'\'],');
				}
				else
				{
					fwrite($fp_controleur, "\t");
					fwrite($fp_controleur, "\t");
					fwrite($fp_controleur, '\''.$resultat[$i][$col_name].'\'=>$_POST[\''.$resultat[$i][$col_name].'\']');
				}
			}
		
			fwrite($fp_controleur, ");");
			fwrite($fp_controleur, "\r\n\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Cnn=$Objcl->ma_connexion();');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, 'if($Objcl->ajouter_enreg_'.$table.'($Tab_param,$Cnn))');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "{");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$message="'.$table.' enregistré avec succès!";');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl->message_box($message);');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl->redirige');
			fwrite($fp_controleur, "(HOME.");
			fwrite($fp_controleur, '$Objcl->param_encode');
			fwrite($fp_controleur, "('liste_$table').'&module='.");
			fwrite($fp_controleur, '$Objcl->param_encode');
			fwrite($fp_controleur, "('xxx'));");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "}");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "else");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "{");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$message="'.$table.' non enregistré!";');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl->message_box($message);');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl->redirige');
			fwrite($fp_controleur, "(HOME.");
			fwrite($fp_controleur, '$Objcl->param_encode');
			fwrite($fp_controleur, "('ajout_$table').'&module='.");
			fwrite($fp_controleur, '$Objcl->param_encode');
			fwrite($fp_controleur, "('xxx'));");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "}");
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "}");
			
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "//Controleur modifier");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "function controler_modifier()");
			fwrite($fp_controleur, "\r\n\t");
			
			fwrite($fp_controleur, "{");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl=new '.$classe.'();');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Tab_param=array(');
	
			for($i=0;$i<$nbre_enreg;$i++)
			{
				fwrite($fp_controleur, "\r\n\t");
				if($i!=$nbre_enreg-1)
				{
					fwrite($fp_controleur, "\t");
					fwrite($fp_controleur, "\t");
					fwrite($fp_controleur, "\t");
					fwrite($fp_controleur, '\''.$resultat[$i][$col_name].'\'=>$_POST[\''.$resultat[$i][$col_name].'\'],');
				}
				else
				{
					fwrite($fp_controleur, "\t");
					fwrite($fp_controleur, "\t");
					fwrite($fp_controleur, "\t");
					fwrite($fp_controleur, '\''.$resultat[$i][$col_name].'\'=>$_POST[\''.$resultat[$i][$col_name].'\']');
				}
			}
		
			fwrite($fp_controleur, ");");
			fwrite($fp_controleur, "\r\n\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Cnn=$Objcl->ma_connexion();');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, 'if($Objcl->modifier_enreg_'.$table.'($Tab_param,$Cnn))');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "{");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$message="'.$table.' modifié avec succès!";');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl->message_box($message);');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl->redirige');
			fwrite($fp_controleur, "(HOME.");
			fwrite($fp_controleur, '$Objcl->param_encode');
			fwrite($fp_controleur, "('liste_$table').'&module='.");
			fwrite($fp_controleur, '$Objcl->param_encode');
			fwrite($fp_controleur, "('xxx'));");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "}");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "else");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "{");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$message="'.$table.' non modifié!";');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl->message_box($message);');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl->redirige');
			fwrite($fp_controleur, "(HOME.");
			fwrite($fp_controleur, '$Objcl->param_encode');
			fwrite($fp_controleur, "('detail_$table').'&module='.");
			fwrite($fp_controleur, '$Objcl->param_encode');
			fwrite($fp_controleur, "('xxx'));");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "}");
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "}");
			
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "//Controleur supprimer");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "function controler_supprimer()");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "{");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl=new '.$classe.'();');
			fwrite($fp_controleur, "\r\n\t");
			
			fwrite($fp_controleur, "\r\n\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$id=$Objcl->param_decode(trim($_GET[xxx]));');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, 'if($Objcl->supprimer_'.$table.'($id))');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "{");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl->redirige');
			fwrite($fp_controleur, "(HOME.");
			fwrite($fp_controleur, '$Objcl->param_encode');
			fwrite($fp_controleur, "('liste_$table').'&module='.");
			fwrite($fp_controleur, '$Objcl->param_encode');
			fwrite($fp_controleur, "('xxx'));");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "}");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "else");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "{");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$message="ATTENTION!'.$table.' non supprimée!";');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl->message_box($message);');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, '$Objcl->redirige');
			fwrite($fp_controleur, "(HOME.");
			fwrite($fp_controleur, '$Objcl->param_encode');
			fwrite($fp_controleur, "('liste_$table').'&module='.");
			fwrite($fp_controleur, '$Objcl->param_encode');
			fwrite($fp_controleur, "('xxx'));");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "}");
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "\t");
			fwrite($fp_controleur, "break;");
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, "\t");
			
			fwrite($fp_controleur, "}");
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, "}");
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, "//*********************************");
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, '@$joker=trim($_REQUEST["joker"]);');
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, '$Obj=new '.$controleur.'();');
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, '@$joker=$Obj->param_decode($joker);');
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, 'switch(trim($joker))');
			fwrite($fp_controleur, "\r\n\t" );
			fwrite($fp_controleur, "{" );
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, 'case 1:{$Obj->controler_ajout();break;}');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, 'case 2:{$Obj->controler_modifier();break;}');
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, 'case 3:{$Obj->controler_supprimer();break;}');
			fwrite($fp_controleur, "\r\n\t");
			
			fwrite($fp_controleur, "\r\n\t");
			fwrite($fp_controleur, "}");
			fwrite($fp_controleur, "\r\n");
			fwrite($fp_controleur, "\r\n");
			
			fwrite($fp_controleur, "?>");
			fclose($fp_controleur);
		}
		
		if($_POST['ajout']=="OUI")
		{
			$file_ajout=VUE_TAMPON_DIR.'ajout_'.$table.'.php';
			$ajout='ajout_'.$table.'.php';
			$classe=ucfirst($table).'_class';
			
			$fp_ajout=fopen($file_ajout,'w');
			
			$var_ajout="";
			$var_ajout.='<html xmlns="http://www.w3.org/1999/xhtml">';
			$var_ajout.="\r\n";
			$var_ajout.='<body>';
			$var_ajout.="\r\n";
			$var_ajout.='<fieldset id="fieldset_style">';
			$var_ajout.="\r\n\t";
			$var_ajout.='<legend id="legend_fielset_style">Ajout</legend>';
			$var_ajout.="\r\n";
			$var_ajout.='<form name="form2" method="POST" action="">';
			$var_ajout.="\r\n\t";
			$var_ajout.='<table width="484" border="0" align="center">';
			$var_ajout.="\r\n\t";
			$var_ajout.='<tr>';
			$var_ajout.="\r\n\t";
			$var_ajout.='<td>&nbsp;</td>';
			$var_ajout.="\r\n\t";
			$var_ajout.='<td>&nbsp;</td>';
			$var_ajout.="\r\n";
			$var_ajout.="\r\n";
			$var_ajout.='</tr>';
			$var_ajout.="\r\n";
			for($i=0;$i<$nbre_enreg;$i++)
			{
				$var_ajout.="\r\n";
				$var_ajout.='<tr>';
				if($i!=$nbre_enreg-1)
				{
					$var_ajout.='<td id="lb">'.ucfirst($resultat[$i][$col_name]).'</td>';
					$var_ajout.="\r\n";
					$var_ajout.='<td><input type="text" name="'.$resultat[$i][$col_name].'" id="'.$resultat[$i][$col_name].'" /></td>';
					$var_ajout.="\r\n";
				}
				else
				{
					$var_ajout.='<td id="lb">'.ucfirst($resultat[$i][$col_name]).'</td>';
					$var_ajout.="\r\n";
					$var_ajout.='<td><input type="text" name="'.$resultat[$i][$col_name].'" id="'.$resultat[$i][$col_name].'" /></td>';
					$var_ajout.="\r\n";
				}
				$var_ajout.='</tr>';
				$var_ajout.="\r\n";
			}
			
			$var_ajout.='<tr>';
			$var_ajout.="\r\n\t";
			
			$var_ajout.='<td colspan="2" id="lb"><input name="joker" type="hidden" id="joker" value="<?php echo $obj->param_encode("1");?>" size="5">';
			$var_ajout.="\r\n\t";
			$var_ajout.="\r\n\t";
			  $var_ajout.='<table width="166" border="0" align="center" style="margin-top:5px;">';
                $var_ajout.='<tr>';
				$var_ajout.="\r\n\t";
                  $var_ajout.='<td width="64"><input name="cmd_annuler" type="reset" class="st_boutton" id="cmd_annuler" value="Annuler"></td>';
				  $var_ajout.="\r\n\t";
                  $var_ajout.='<td width="92"><input name="cmd_enreg" type="submit" class="st_button" id="cmd_enreg" value="Enregistrer"></td>';
				  $var_ajout.="\r\n";
                $var_ajout.='</tr>';
              $var_ajout.='</table>';
			  $var_ajout.='</td>';
			$var_ajout.="\r\n\t";
			
			$var_ajout.="\r\n";
			$var_ajout.='</tr>';
			$var_ajout.="\r\n";
			$var_ajout.='</table>';
			$var_ajout.="\r\n";
			$var_ajout.='</form>';
			$var_ajout.="\r\n";
			$var_ajout.='</fieldset>';
			$var_ajout.="\r\n";
			$var_ajout.='</body>';
			$var_ajout.="\r\n";
			$var_ajout.='</html>';
			
			@fwrite($fp_ajout,$var_ajout);
			@fclose($fp_ajout);
			
		}
		
		
		
		if($_POST['mapper_table']=="OUI")
		{
			$le_file_mapper='generateur_mappage.txt';
		
		$fp = fopen($le_file_mapper, 'w');
		fwrite($fp, 'public function '.$mapper_table.'()');
		fwrite($fp, "\r\n");
		fwrite($fp, '  { ');
		fwrite($fp, "\r\n");
		fwrite($fp, "\t".'$Map=array(');
		fwrite($fp, "\r\n\t");
		fwrite($fp, "'".$table."'=>'".$table."',");
	
		for($i=0;$i<$nbre_enreg;$i++)
		{
			fwrite($fp, "\r\n\t");
			if($i!=$nbre_enreg-1)
			{
			  fwrite($fp, "'".$resultat[$i][$col_name]."'=>'".$resultat[$i][$col_name]."',");
			}
			else
			{
			  fwrite($fp, "'".$resultat[$i][$col_name]."'=>'".$resultat[$i][$col_name]."'");
			}
		}
	
		fwrite($fp, ');');
		fwrite($fp, "\r\n\t");
		fwrite($fp, "\r\n\t");
		fwrite($fp, 'return $Map;');
		fwrite($fp, "\r\n");
		fwrite($fp, '  } ');
		}
		
	echo '<script language="javascript">alert("GENERATION TERMINEE!");</script>';
	}
	
?>

<script type="text/javascript" src="js/scw.js"></script>
<script type="text/javascript" src="js/controles.js"></script>
<script language="javascript">
function verifier_champs_form()
	{
		if(champ_vide_text('select_table','Table')==false){return false;}

	}
</script>
<form id="form1" name="form1" method="post" action="" onSubmit="return verifier_champs_form();">
  <table width="333" border="1" align="center" cellspacing="0">
    <tr>
      <td colspan="2"><div align="center"><strong>ORM ET GENERATEUR </strong></div></td>
      </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      </tr>
    
    <tr>
    <td><div align="center">Table</div></td>
      <td><div align="center">
        <select name="select_table" id="select_table">
           <option value=""></option>
           <?php	
            if(DB_TYPE=='pgsql')
			{
			
				  foreach($Tab_tables as $row)
				  {
					 echo'<option value="'.$row[$champ_tb].'">'.$row[$champ_tb].'</option>';
				  }
            }
            elseif(DB_TYPE=='mysql')
            {
				 foreach($Tab_tables as $row)
				 {
					 echo'<option value="'.$row[$champ_tb].'">'.$row[$champ_tb].'</option>';
			     }
            }
            ?>
        </select>
      </div></td>
    </tr>
    <tr>
      <td width="327"><div align="center">Modéle</div></td>
      <td>
      	<select name="modele" id="modele">
        	<option value=""></option>
        	<option value="OUI">OUI</option>
            <option value="NON">NON</option>
        </select>
      </td
    ></tr>
    <tr>
      <td width="327"><div align="center">Controleur</div></td>
      <td>
      	<select name="controleur" id="controleur">
        	<option value=""></option>
        	<option value="OUI">OUI</option>
            <option value="NON">NON</option>
        </select>
      </td
    ></tr>
    <tr>
      <td width="327"><div align="center">Mapper table</div></td>
      <td>
      	<select name="mapper_table" id="mapper_table">
        	<option value=""></option>
        	<option value="OUI">OUI</option>
            <option value="NON">NON</option>
        </select>
      </td
    ></tr>
    <tr>
      <td width="327"><div align="center">Vue ajout</div></td>
      <td>
      	<select name="ajout" id="ajout">
        	<option value=""></option>
        	<option value="OUI">OUI</option>
            <option value="NON">NON</option>
        </select>
      </td
    ></tr>
    <tr>
    <td height="57" colspan="2"><table width="137" border="1" align="center">
      <tr>
        <td width="68"><input type="submit" name="cmd_annuler" id="cmd_annuler" value="ANNULER" /></td>
        <td width="53"><input type="submit" name="cmd_valider" id="cmd_valider" value="GENERER" /></td>
        </tr>
    </table>
      <input name="txt_post" type="hidden" id="txt_post" value="1" /></td>
    </tr>
    <tr>
    <td height="32" colspan="2"><div align="center"><a href="generateur_mappage.txt" target="_blank">OUVRIR LE FICHIER MAPPAGE</a></div></td>
    </tr>
  </table>
</form>
