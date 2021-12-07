<?php
 function openCon(){
     $dbhost="localhost";
     $dbuser="root";
     $bdpass="";
     $db="phpques5";

     $conn= mysqli_CONNECT($dbhost,$dbuser,$bdpass,$db) or die("Not Connected." );
     return $conn;
 }
?>