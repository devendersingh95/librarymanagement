<?php

$host = "localhost"; //database location
$user = "root"; //database username
$pass = ""; //database password
//database connection

$link = mysqli_connect($host, $user, $pass);
$db_name='lib_manage';
mysqli_select_db($link,$db_name);
?>
