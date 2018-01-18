<?php
@session_start();
require_once "Mail.php";
require_once "PEAR/Exception.php";
require_once 'Mail/mime.php'; 
require_once 'PEAR.php'; 

             function envoi_mail($expediteur,$destinataire,$message,$filename="",$sujet="information")
             {   
                   
                    $entete= array ('From' => $expediteur,'To' => $destinataire,'Subject' => $sujet);

                    $crlf = "\n";
                    $mime = new Mail_mime($crlf);
                    $msg = "";
                    $html = '<html><body><p>derty</p></body></html>'; 
                    // Setting the body of the email
                    $mime->setTXTBody($msg);
                    $mime->setHTMLBody($html);
                    
                    
                      try
                        {
                            $smtp = Mail::factory('smtp',array ('host' =>"ssl://smtp.gmail.com",'port'=>465,'auth' => true,'username' =>"ndione.wingo.ousmane@gmail.com",'password' =>"Paccesskilokawa123456$")
                                                 );
                        }  
                        catch(PEAR_Exception $e)  
                        { 
						  echo $e->getMessage(); 
						//return false;    
						
						 } 
						 
						 
						 
						 if($filename!="")
						 {
                            $file =lire_fichier($filename);                                      // Content of the file
                            $file_name = $filename;                               // Name of the Attachment
                            $content_type = "text/plain"; 
                             // Add the attachment to the email                           // Content type of the file
                            $retour_joint=$mime->AddAttachment($file,$content_type,$file_name,0); 
                            
						    $body = $mime->get();
                            $entete = $mime->headers($entete);
							
                            
                            if($retour_joint==true)
                            {
                               $mail = $smtp->send($destinataire,$entete,$body);
                            }
							
						 }
						 else
						 {
                             $mime->setTXTBody($message);
                             $mime->setHTMLBody("<html><body><p>".$message."</p></body></html>");
                             $entete = $mime->headers($entete);
                             $body = $mime->get();
							
                             $mail = $smtp->send($destinataire,$entete,$body);
						 }
                         if(PEAR::isError($mail)) 
                         {
                            return false;
                         }
                         else 
                         { 
                            return true;
                         } 
                  }
                  
                    function lire_fichier($chemin_fichier)
                    {
                         
                        $file = $chemin_fichier;
                      
                        $fp = fopen($file, "r");
                        $contenu = fread($fp, filesize($file));
                        
                        fclose($fp);
                        
                        return $contenu;
                         
                    }
                    
                    
			            
          $expediteur="ndione< ndione.wingo.ousmane@gmail.com > ";
		  $destinataire="ousmane ndione  < ouznd@yahoo.fr > ";
                    
          envoi_mail($expediteur,$destinataire,"Ceci est un test",$filename="",$sujet="information"); 
        
?>