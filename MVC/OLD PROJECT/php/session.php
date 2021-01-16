<?php
   include('Config.php');
   session_start();
   
   $user_check = $_SESSION['login_id'];
   #echo  $_SESSION['login_user'];
   $ses_sql = mysqli_query($db,"select LogINID from user where LogINID = '$user_check' ");
   
   $row = mysqli_fetch_assoc($ses_sql);
   
   $login_session = $row['LogINID'];
   
   if(!isset($_SESSION['login_id'])){
      header("location:../login/");
   }
?>