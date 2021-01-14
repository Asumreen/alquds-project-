<?php
require_once("../Models/User.php");
require_once("../lib/functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['number']) {
        $user=new User();
        // username and password sent from form 
        $myusername = mysqli_real_escape_string($db, $_POST['number']);
        $mypassword = mysqli_real_escape_string($db, $_POST['password']);
        $user->login($myusername,$mypassword);
    }
}


?>