<?php
    if (isset($_POST['code']) && !empty($_POST['code'])) {
        $code = strtoupper($_POST['code']);
        if(md5($code) == $_SESSION['captcha'])
            echo json_encode(array('class' => 'correct'));
        else
            echo json_encode(array('class' => 'incorrect'));
    }
?>