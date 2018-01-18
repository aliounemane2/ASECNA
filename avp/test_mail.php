<?php

   require_once  "Mail.php";
   require_once  "PEAR/Exception.php";
   require_once  'Mail/mime.php';

        $file="test1.txt";
	    $message="Message de test";
	   
	    $destinataires ="ouznd@yahoo.fr";  
		$objet = "Rappel"; 
		$message=htmlspecialchars($message, ENT_QUOTES); 

       
	   $tab=pathinfo($file); 
	   $ext=$tab["extension"];

        switch($ext) 
		{ 
				default:       
				$attach_type =  "application/octet-stream";  
			break; 
				case "gz":    
				$attach_type =  "application/x-gzip";  
			break; 
				case "tgz":   
				$attach_type =  "application/x-gzip";  
			break; 
				case "zip":   
				$attach_type =  "application/zip"; 
			break; 
				case "pdf":   
				$attach_type =  "application/pdf"; 
			break; 
				case "png":   
				$attach_type =  "image/png"; 
			break; 
				case "gif":   
				$attach_type =  "image/gif"; 
			break; 
				case "jpg": 
				case"jpeg":   
				$attach_type =  "image/jpeg"; 
			break; 
				case "txt":   
				$attach_type =  "text/plain"; 
			break; 
				case "htm":   
				$attach_type =  "text/html";   
			break; 
				case "html":  
				$attach_type =  "text/html"; 
			break; 
            
            case "doc":  
				$attach_type =  "application/msword"; 
			break;
            
            
			} 
            $attach_name = $file; 
			
			
		if (file_exists($file)) 
		{ 
			$fp = fopen($file, "r"); 
			$contents = fread($fp , filesize($file)); 
			$encoded_attach = chunk_split(base64_encode($contents)); 
			fclose($fp ); 
         } 
    
        $mailheaders  = "From: ndione.wingo.ousmane@gmail.com\n"; 
        $mailheaders .= "Reply-To:ndione.wingo.ousmane@gmail.com\n"; 
        $mailheaders .= "To: $destinataires\n"; 
        $mailheaders .= "MIME-version: 1.0\n"; 
        $mailheaders .= "Content-type: multipart/mixed; "; 
        $mailheaders .= "boundary=\"Message-Boundary\"\n"; 
        $mailheaders .= "Content-transfer-encoding: 7BIT\n"; 
        $mailheaders .= "X-attachments: $attach_name\n"; 

        $body_top = "--Message-Boundary\n"; 
        $body_top .= "Content-type: text/plain;charset=ISO-8859-1\n"; 
        $body_top .= "Content-transfer-encoding: 7BIT\n"; 
         
        $msg_body = $body_top.$message; 

		$msg_body .= "\n\n--Message-Boundary\n"; 
		$msg_body .= "Content-type: $attach_type; name=\"$attach_name\"\n";     
		$msg_body .= "Content-Length: ".filesize($file). "\n";     
		$msg_body .= "Content-transfer-Encoding: BASE64\n"; 
		$msg_body .= "Content-disposition: attachment; filename=\"$attach_name\"\n\n"; 
		$msg_body .= "$encoded_attach\n"; 
		$msg_body .= "--Message-Boundary--\n"; 
		
		ini_set("SMTP ",'smtp.gmail.com');
		ini_set("smtp_port","465");
		
		//$Obj=new Mail_mime();
        
		if(@mail($destinataires,$objet,$msg_body,$mailheaders)) 
		{ 
			echo "envoi réussi du mail : ".$objet. " à $destinataires."; 
		} 
		else 
		{ 
			echo "Echec de l'envoi du  
	mail".$objet."."; 
		} 

?>