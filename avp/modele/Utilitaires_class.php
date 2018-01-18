<?php

if(session_id()==""){@session_start();}
require_once($_SESSION['AVP_CONFIG']);

Class Utilitaires_class  extends Connexion_class 
{
	
  /************************************************************************************************************************/
    public function  date_fr($date)
	{
		$date=trim($date);
		if($date=="")
		{
		   return "00-00-0000";
		}
		elseif($this->La_date_est_en($date))
		{
		   return $this->dateswitch($date);
		}
		else
		{
			return $date;
		}
	}

	public function  date_en($date)
	{
		$date=trim($date);
		if($date=="")
		{
		   return "0000-00-00";
		}
		elseif($this->La_date_est_fr($date))
		{
		   return $this->datefr2en($date);
		}
		else
		{
			return $date;
		}
	}

	function datefr2en($mydate)
	{
		 if(($mydate!="")&&($mydate!="00-00-0000")&&($mydate!="0000-00-00")&&($mydate!="01-01-1970")&&($mydate!="1970-01-01"))
				{
				   @list($jour,$mois,$annee)=explode('-',$mydate);
				   return @date('Y-m-d',mktime(0,0,0,$mois,$jour,$annee));
				 }
		  else
				{
						$mydate="0000-00-00";
						return $mydate;
				}
	
	 }

  public function formater_date($date)
  { 
	
	if($this->La_date_est_fr($date)){$date=$this->datefr2en($date);}
	
    $tab=explode("-",$date);
	$new_an=substr($tab[0],2,2);
	$new_date=$tab[2].$tab[1].$new_an;
	
	return "$new_date";
  }
  function date_heure_systeme_jjmmaa()
  { 
        
        
		$dte=date("d-m-Y");
		$he=date("H:i:s");
		
		$Tab=array(
			'date_enreg'=>$dte,
			'heure_enreg'=>$he);
			return $Tab;
			
  }
    
    function date_heure_systeme_aammjj()
 	{ 
 	  
		$dte=date("Y-m-d");
		$he=date("H:i:s");
		
		$Tab=array(
			'date_enreg'=>$dte,
			'heure_enreg'=>$he);
			return $Tab;
			
	}
	
	 public  function SetSQLValues($value,$valuetype)
	 {
		
		switch($valuetype)
		{
			case "text":
			
			$value = ($value != "") ? "'" . $value . "'" : "NULL";
		
			break;
			
			case "int":
			
			$value = ( $value!= "") ?   intval($value) : "NULL";
			
			break;
			
			case "double":
			
			$value = ($value != "") ? "'" . doubleval($value) . "'" : "NULL";
			
			break;
			
			case "date":
			
			$value = ($value != "") ? "'" . $this->format_date_fr_to_en($value) . "'" : "NULL";
			
			break;
			
			case "float":
			
			$value = ($value != "") ? floatval($value) : "NULL";
			
			break;
		
			
		}
		
		return $value ;
		
	}
	
	/**************************************************************************/
	
	 function lister_enreg($table,$champ_id,$type_champ,$critere="",$trie="",$nbre_enreg="",$champ_code_com="",$code_com="")
	{
		 
		$Rsql = sprintf("SELECT * FROM ". $table." WHERE 1=1" );
        
        if(trim($code_com)!="")
        {
           $Rsql.= sprintf(" AND ".$champ_code_com."=%s",
			   $this->GetSQLValueString($this->format_string($code_com), "text")); 
        }
	
    //********************** le crit�re est renseign? *************************
		
		if(trim($critere)!="")
			{
				
				if(trim($type_champ)=="text")
				{
					
					$Rsql.= sprintf(" AND ".$champ_id."=%s",
			               $this-> SetSQLValues($this->format_string($critere), "text"));
	
				}
				elseif(trim($type_champ)=="date")
				{
					if($this->La_date_est_fr($critere)){$critere=$this->datefr2en($critere);}
					
                    $Rsql.= sprintf(" AND ".$champ_id."=%s",
			               $this-> SetSQLValues($critere, "date"));
	            }
				elseif(trim($type_champ)=="int")
				{
					$Rsql.= sprintf(" AND ".$champ_id."=%s",
			               $this-> SetSQLValues($critere, "int"));
	 
				}
                elseif(trim($type_champ)=="double")
				{
					$Rsql.= sprintf(" AND ".$champ_id."=%s",
			               $this-> SetSQLValues($critere, "double"));
	 
				}
				
			}
		
		//********************** le trie est renseign? *************************
		
		if(trim($trie)!="")
		{
				
				$Rsql.= sprintf(" ORDER BY ".$champ_id." %s",
					   $trie);
			
		}
	
	     // le nombre d'enregistrement est renseign?
		 if($nbre_enreg!="")
		 {
			$Rsql.= sprintf(" LIMIT   0, %s ",
		    $this->SetSQLValues(intval($nbre_enreg), "int"));
		 }

		            
            $Cnn=$this->ma_connexion();
			
			$retour=$Cnn->query($Rsql);
			
			$resultat=$retour->fetchAll(PDO::FETCH_ASSOC);
			
			$Cnn=NULL;
	                    	
			return $resultat;
	}
	
	/******************************************************************************/
	 function format_string($theValue)
	 {
	   
	   $theValue=trim($theValue);
	   $theValue=stripslashes($theValue);
	   $theValue=addslashes($theValue);
	   
	   return $theValue;
	 
	 }
	 
	public function La_date_est_fr($date)
	{
		$tab=explode("-",$date);
		
		  if(strlen($tab[0]) > 2)
		  {
			return false;
		  }
		  else
		  {
			return true;
		  }
	
	}
	
    public function La_date_est_en($date)
	{
		$tab=explode("-",$date);
		
		  if(strlen($tab[0]) > 2)
		  {
			return true;
		  }
		  else
		  {
			return false;
		  }
	
	}
	
	 public function  format_date_fr_to_en($date)
	 {
		  
		  if(($date!="")&&($date!="0000-00-00")&&($date!="00-00-0000"))
		  {
		     $date_str=explode("-",$date);
			 
			 $jour=$date_str[0];
			 $mois=$date_str[1];
			 $annee=$date_str[2];
			 
			 $new_date=$annee."-".$mois."-".$jour;
			 
			 return $new_date;
		  
		  }
		  else
		  {
			  return $date;
			  
		  }
		
	  }
	  
	function dateswitch($Date)			// swith MySql (year-mm-day) - input (day-mm-year)
	{	
	   if(($Date!="")&&($Date!="00-00-0000")&&($Date!="0000-00-00")&&($Date!="01-01-1970")&&($Date!="1970-01-01"))
	   {
			$dates=explode(" ", " ".$Date);
			$Date=@$dates[1];	$Time=@$dates[2];
			//if ($Time!=null) $Time=" $Time";
			$regs=explode("-", "-".$Date);
			return $regs['3']."-".$regs['2']."-".$regs['1']."$Time";
		}
		else
		{
			$Date="";
			return $Date;
		}
		
		
	}	
	  
	  public function redirige($path)
	  {
			 $var="window.location.replace('".$path."')";
			 $var="<SCRIPT LANGUAGE='JavaScript'>".$var."</script>";
            
			 echo $var;
	  }
	  
	  
	  
	  public function message_box($str_message)
	  {
		echo '<script type="text/javascript"> alert("'.utf8_decode($str_message).'"); </script>';
	  }
	  
	/***********************************************************************************/  
	  function charger_fichier($chemin_fichier_tmp,$dossier_destination,$filename) 
      {
				$Tab=array();
			   
				if(move_uploaded_file($chemin_fichier_tmp,$dossier_destination)===true) 
				{
					chmod($dossier_destination,0777);
					$Tab=array('sortie'=>1,'nom_fichier'=>$filename);
					return $Tab;
				} 
				else    
				{
					$Tab=array('sortie'=>0,'nom_fichier'=>"");
					return $Tab;
				}
      }
	/************************************************************************************/
	
	function validate_upload_file($name_field,$extension,$extensions_exclus)
    {
  
		  $errors = "";
		  
		  if(in_array($extension, $extensions_exclus)) //Si l'extension est  dans le tableau
		  {
			$errors = 'le type de fichier choisi n\'est pas pris en compte. Les fichiers d\'extension <<'.$extension.'>> ne peuvent être chargés!';
		  }
		elseif(($_FILES[$name_field]['error'] == UPLOAD_ERR_INI_SIZE)||($_FILES[$name_field]['error'] == UPLOAD_ERR_FORM_SIZE))
		 {
	
			$errors = 'Le fichier chargé est trop lourd.';
	
		 }
		 elseif ($_FILES[$name_field]['error'] == UPLOAD_ERR_PARTIAL)
		 {
	
			$errors = 'Le chargement a été arrété.';
	
		 } 
		 elseif ($_FILES[$name_field]['error'] == UPLOAD_ERR_NO_FILE)
		  {
	
			$errors = 'Aucun fichier n\'a été chargé.';
	
		  }

    return $errors;

}
	
/*************************************************************************/
    function supprimer_fichier($nom_fichier)
    {
			clearstatcache();
			if(file_exists($nom_fichier))
			{
				unlink($nom_fichier);
			}  
    }
	
	function format_array($tab_init,$tab_ajouter)
	{
		$retour_array=array();
		
		foreach($tab_init  as $row)
		{
			$tab=array_merge($tab_ajouter,$row);
			array_push($retour_array ,$tab);
		}
		
		return $retour_array;
	}
	
	
	
	
	/*****************************************************/
	
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
	{
	  
	  // $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;
          $theValue=trim($theValue);
          $theValue = (!get_magic_quotes_gpc()) ? trim($theValue) : $theValue;

           /*$theValue=trim($theValue);
	   $theValue=stripslashes($theValue);
	   $theValue=addslashes($theValue);*/
	             
	   switch ($theType) {
		case "text":
		  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
		  break;    
		case "long":
		case "int":
		  $theValue = ($theValue != "") ? intval($theValue) : "NULL";
		  break;
		case "double":
		  $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
		  break;
		case "date":
		  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
		  break;
		case "defined":
		  $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
		  break;
	  }
	  return $theValue;
	}
    
    public function param_encode($donnee)
    {
       
        //return trim(base64_encode($donnee));
        return $donnee;
    }

    public function param_decode($donnee)
    {
       // return trim(base64_decode($donnee));
        return $donnee;
    }

     function charger_shape_file($chemin_fichier_tmp,$dossier_destination,$filename) 
     {
     
        $Tab=array();
       
        if (move_uploaded_file($chemin_fichier_tmp,$dossier_destination)===true) 
        {
            //chmod($dossier_destination,0777);
            $Tab=array('sortie'=>1,'nom_fichier'=>$filename);
    	    return $Tab;
        } 
        else    
        {
            $Tab=array('sortie'=>0,'nom_fichier'=>"");
            return $Tab;
    
        }
    }
	
    
    function supprimer_enreg($nom_table,$champ_cle, $valeur_critere)
	{
		try
		{
			$ObjCl=new Utilitaires_class();
			$Cnn=$ObjCl->ma_connexion();
			
		 $DeleteSQL = sprintf("Delete  from ". $nom_table ." WHERE  ".$champ_cle."=%s",
						  $ObjCl->GetSQLValueString($valeur_critere, "text"));
						  
						//  echo $DeleteSQL ;
						 
			$retour=$Cnn->exec($DeleteSQL);
			
			    if(($retour===false)||($retour===0))
				{
				return false;
				}
			    else
				{
					return true;
				}
		
		
		}
	    catch(Exception $e)
		{
		
			echo "Erreur! ".$e->getMessage();
			
			return false;
		
		}
	}

// ********************************************************************************************

        function supprimer_enreg2($nom_table,$champ_cle, $valeur_critere,$Cnn)
		{
			try
			{
				$ObjCl=new Utilitaires_class();
				//$Cnn=$ObjCl->ma_connexion();
				 
			  $DeleteSQL = sprintf("Delete  from ". $nom_table ." WHERE  ".$champ_cle."=%s",$ObjCl->GetSQLValueString($valeur_critere, "text"));
                              
                              
				$retour=$Cnn->exec($DeleteSQL);
				  
			  	    if($retour>=0)
					{
						return true;
					}
			    	else
					{
						return false;
					}
			
			}
			catch(Exception $e)
			{
				//echo "Erreur! ".$e->getMessage();

				return false;

			}
		}
     
	    public function destroy_session()
		{
              $_SESSION["login"]   = "";
			  $_SESSION["role"]    = "";
			  $_SESSION["id_user"] =  "";
			  $_SESSION['lastaccess'] = "";
			  $this->redirige(HOME1); 
		}
		// format date entree jj/mm/aaaa
		
		public function calcul_age($date)
		{
			$ObjCl=new Utilitaires_class();
			
			if($ObjCl->La_date_est_en($date)==true)
			{ 
			  $date=$ObjCl->dateswitch($date);
			}

			$list= explode ('-',$date);
			$TSN = strtotime($list[2]."/".$list[1]."/".$list[0]);
			$TS = strtotime(date("Y/m/d"));
			$Age = ($TS-$TSN)/(365*3600*24);
			return ceil($Age);
			
		}
	
	   function current_etape()
	   {
		      $Tab_etape=array(
		                      "1"=>"form_coord_personnelles",
							  "2"=>"form_formation",
							  "3"=>"form_travail_fin_etude",
							  "4"=>"form_autres_form",
							  "5"=>"form_experiences",
							  "6"=>"form_informatique",
							  "7"=>"form_linguistique",
							  "8"=>"form_competence",
							  "9"=>"form_lettre_motivation",
							  "10"=>"form_reference",
							  "11"=>"form_piece_joint",
							  "12"=>"form_validate"
		  
		                    );  
							
				return $Tab_etape; 
				
	   }
	   
	   function afficher_profile($profile)
	   {
		   $len=strlen($profile);
		   $taille_req=12;
		   if($len>$taille_req)
		   {
		     return substr_replace($profile,'.',$taille_req,$len);
		   }
		   else
		   {
			   return $profile;
		   }
	   }
	   
	  public  function getActiveMenu($page)
	   {
			 if($page!="")
			 {
				
				switch($page) 
				{
					case "liste_d_avp" : 
					case "liste_des_avps" :
					case "liste_des_candidats" :
					case "liste_des_postulants" :
					case "liste_d_avps" :
					case "form_coord_personnelles":
					case "form_experiences":
					case "form_formation":
					
					case "form_informatique":
					case "form_liguistique":
					
					case "form_piece_joint":
					case "form_qualite":
					
					case "form_validation":
					case "form_autres_form":
					
					case "form_competence":
					case "form_competence1":
					
					case "form_lettre_motivation":
					case "form_lettre_motivation1":
					case "annonces":
					case "annonce_detail":
					
					case "form_reference":
					
					{ return  "recrutement"; 
					  break; 
					}
					
					case "inscription":
					{
						return "inscription";
						break;
					}
					case "accueil":
					{
						return "index";
						break;
					}
					
					case "login":
					{
						return "connexion";
						break;
					}
				
				}
				
				
			 }
			 else
			 {
				return "index"; 
				break;
			 }
	   }
	   
	   function session_valide()
	   {
		    $path="index.php";
			$var="window.location.replace('".$path."')";
			$var="<SCRIPT LANGUAGE='JavaScript'>".$var."</script>";
			echo $var; 
	   }
	   
	   
			   function mail_attachement($to , $sujet , $message , $fichier , $typemime , $nom , $reply , $from)
			   {  
				 $limite = "_parties_".md5(uniqid (rand()));  
				   
				  $mail_mime = "Date: ".date("l j F Y, G:i")."\n";  
				  $mail_mime .= "MIME-Version: 1.0n";  
				  $mail_mime .= "Content-Type: multipart/mixed;\n";  
				  $mail_mime .= " boundary=".$limite."\n";  
				   
				  //Le message en texte simple pour les navigateurs qui n'acceptent pas le HTML  
				  $texte = "This is a multi-part message in MIME format";  
				  $texte .= "Ceci est un message est au format MIME";  
				  $texte .= "------=$limiten";  
				  $texte .= "Content-Type: text/plain; charset='iso-8859-1'";  
				  $texte .= "Content-Transfer-Encoding:";  
				  $texte .= $message;  
				  $texte .= "nn";  
				   
				  //le fichier  
				  $attachement = "------=$limiten";  
				  $attachement .= "Content-Type: $typemime; name=".$nom."\n";  
				  $attachement .= "Content-Transfer-Encoding: base64 \n";  
				  $attachement .= "Content-Disposition: attachment; filename=".$nom."\n";  
				   
				  $fd = fopen( $fichier, "r" );  
				  $contenu = fread( $fd, filesize( $fichier ) );  
				  fclose( $fd );  
				  $attachement .= chunk_split(base64_encode($contenu));  
				   
				  $attachement .= "nnn------=$limiten";  
				  return mail($to, $sujet, $texte.$attachement, "Reply-to: $replynFrom:$from".$mail_mime);  
		       }
			   
			   function getNomMois($mois_chiffre){
				  
				  switch($mois_chiffre)
				  {
					   case "1":
					   return "Janvier";
					   break;
					   
					   case "2":
					   return "Fevrier";
					   break;
					   
					   case "3":
					   return "Mars";
					   break;
					   
					   case "4":
					   return "Avril";
					   break;
					   
					   case "5":
					   return "MAi";
					   break;
					   
					   case "6":
					   return "Juin";
					   break;
					   
					   case "7":
					   return "Juillet";
					   break;
					   
					   case "8":
					   return "Août";
					   break;
					   
					   case "9":
					   return "Septembre";
					   break;
					   
					   case "10":
					   return "Octobre";
					   break;
					   
					   case "11":
					   return "Novembre";
					   break;
					   
					   case "12":
					   return "Decembre";
					   break;
					   
				  }			   
			   }
  
}

?>