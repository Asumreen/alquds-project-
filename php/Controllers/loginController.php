<?php
require_once("../Models/User.php");
require_once("../lib/functions.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['number']) {
        $user=new User();
        // username and password sent from form 
        $myusername =  $_POST['number'];
        $mypassword =  $_POST['password'];
        error_log($myusername ,0);
        $user->login($myusername,$mypassword);
    }
}


?>