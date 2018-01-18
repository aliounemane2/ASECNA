<?php 

  if(session_id()==""){@session_start();}
  require_once($_SESSION['AVP_CONFIG']);
  
  
Class Controler_connection  extends Utilitaires_class
{
	
	  function connection_appli()
	  {
		  
              $str_login=@$_POST['login'];
              $str_mp=@$_POST['pass'];
			  
            $Obj=new Utilitaires_class();
			$Obj_uti=new Utilisateur_class();
            $Obj_profil=new Profil_user_class();
			

            $Tab_result=$Obj->logOn($str_login,$str_mp);
			
			
			
            $num_retourne=@$Tab_result[0];
		    $id_utilisateur=@$Tab_result[4];
			
            $lister_profil= $Obj_profil->lister_profil_user($id_utilisateur);
			
            switch($num_retourne)
            {
                case 1: // PAGE ACCEUIL
                {
                    $_SESSION[LOGIN]=@$Tab_result[1];
                    $_SESSION[PRENOM]=@$Tab_result[2];
                    $_SESSION[NOM]=@$Tab_result[3];
                  /********************************************/  
                    
                    
                    $_SESSION['profil_param']=$lister_profil[0][$Obj_profil->GetCh_profil_param()];
        			$_SESSION['profil_emploi_temp']=$lister_profil[0][$Obj_profil->GetCh_profil_emploi_temp()];
        			$_SESSION['profil_etudiant']=$lister_profil[0][$Obj_profil->GetCh_profil_etudiant()];
        			$_SESSION['profil_formation']=$lister_profil[0][$Obj_profil->GetCh_profil_formation()];
        			$_SESSION['profil_inscription']=$lister_profil[0][$Obj_profil->GetCh_profil_inscription()];
                  /***********************************************/  
				  
				 
					$redirect_page="../accueil_admin.php";
					$Obj->redirige($redirect_page); 
					exit();
				
                 }
                 case 0: // MOT DE PASSE INCORRECT
                 {
                    $Obj->message_box($Tab_result[5]);
                    $Obj->redirige(LOG_OUT);

                    break;
                 }
                 case -1: // COMPTE DESACTIVE
                 {
                    $Obj->message_box($Tab_result[5]);
                    $Obj->redirige(LOG_OUT);
                    break;
                 }

            }
		  
		  
		  
		  
	  }
	
	
	







}


@$joker=trim($_REQUEST['joker']);
$Obj=new Controler_connection();

switch(trim($joker))
{
	case 1:{$Obj->connection_appli(); break;}
	
}





?>