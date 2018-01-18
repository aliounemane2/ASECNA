<?php


Class Connexion_class 
{
    static $_instance_cnn=null;
    
    public function ma_connexion()
    {
        if(is_null(self::$_instance_cnn))
        {
            try
            { 
                self::$_instance_cnn=new PDO(CNN_STRING,DB_USER,DB_PASSWORD);
                self::$_instance_cnn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				self::$_instance_cnn->exec("SET CHARACTER SET utf8");
				
				
			
            }
            catch(PDOException $e)
            {
            	die("Erreur!:".$e->getMessage());
            } 
         }
        
        return self::$_instance_cnn;  
     }

	
	public function ma_deconnexion($dbh)
	{
		try{
			$dbh=null;
		} catch(PDOException $e)
		{
			die("Erreur!:".$e->getMessage());
			
		}
	
	}
   
   public static function getConnexion(){
       return self::$_instance_cnn;
   }
   
}
?>
