<?php

if(!isset($_SESSION)) { 
      session_start(); 
    } 
$mysqli = new mysqli("localhost", "root","","siswa_rpl" );
if($mysqli -> connect_errno){
    echo "Failed to connect to Mysql :" . $mysqli -> connect_errno;
    exit();
}
?>