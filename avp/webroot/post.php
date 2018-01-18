<?php

     if(isset($_FILES['file']))
     {
         $tmp_name=$_FILES['file']["tmp_name"];
         $name=$_FILES['file']["name"];
		 

         if(move_uploaded_file($tmp_name, "demande_emploi/".$name)==true)
         {
            echo "fichier bien uploadé";
         }
      }   


   

    
?>