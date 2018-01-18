<?php

    session_start();
	
    if(isset($_POST['code']) && !empty($_POST['code'])) 
	{
        $code = strtoupper($_POST['code']);
		
        if(md5($code) == $_SESSION['captcha'])
		{
            echo json_encode(array('classe' => 'correct'));
        }
		else
		{
            echo json_encode(array('classe' => 'incorrect'));
        }
		
    }
	else
	{
        echo json_encode(array('classe' => 'incorrect'));
    }
?>