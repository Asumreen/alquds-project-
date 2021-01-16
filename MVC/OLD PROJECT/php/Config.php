<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'alquds');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   mysqli_query($db,"SET character_set_results = 'utf8'");
   mysqli_query($db,"character_set_client = 'utf8'"); 
   mysqli_query($db,"character_set_connection = 'utf8'");  
   mysqli_query($db,"character_set_database = 'utf8'");
   mysqli_query($db,"SET NAMES utf8mb4");

   $string = "2010-12-22";
   $timestamp = strtotime($string);
   $t=date("d-m", $timestamp);
   $today=date("d-m");
   if($t===$today){
      $sql="DELETE FROM attendance ";
      mysqli_query($db,$sql);
}
?>