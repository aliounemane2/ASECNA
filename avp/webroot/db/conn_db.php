<?php
@session_start();
$host="localhost";
$user="admin_app";
$password="admin123";
$mabase="asecna";
ini_set('display_errors','off');
mysql_connect($host,$user,$password)  or die(mysql_error());
mysql_select_db($mabase)  or die(mysql_error());

?>