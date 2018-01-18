<?php

@session_start();
require_once("../_Init_file.php");

$email=$_GET["email"];

$obj_utilisateurs=new Utilisateurs_class();
$recu=$obj_utilisateurs->check_email($email);

if($recu==true)
{
    echo "KO";
}
else
{
    echo "OK";
}