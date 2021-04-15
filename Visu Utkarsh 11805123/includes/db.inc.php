<?php
// if(!defined('MyConst')) {
//     die('Direct access not permitted');
//  }
$serverName="localhost";
$dbUserName="root";
$dbPassword="";
$dbName="harsh-task";

$conn= mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName) ; 

if(!$conn){
    die("Connetion failed: ".mysqli_connect_error());
}

