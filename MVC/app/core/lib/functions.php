<?php
session_start();





function view($view, $NAVIGATE = [], $ERROR = [])
{
    require_once("../app/Views/" . $view . ".php");
}
// function Error($index = "", $data = "")
// {
//     $_SESSION[$index] = $data;
// }

// function get_error($index)
// {

//     if (isset($_SESSION[$index])) {
//         $tmp = $_SESSION[$index];
//         unset($_SESSION[$index]);
//         return $tmp;
//     }
// }
////////////////// Navigate To View with Data(optional)/////
function redirect($view = "home", $data = "", $DataName = "")
{    /*
    View param => if you want to navigate to root dir (Views) Just pass view file name like => $view="login"
        if you want to navigate to sub dir like (views/test/...) Pass sub File name . views file name like => $view="test.login"
    */



    // $check_url=explode("/",$view);
    // echo $check_url[count($check_url)-1]."\n";

    // //  $realUrl=explode("/",(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    // //  echo $realUrl[count($realUrl)-1]."\n";
    //  die();

    // $path = explode(".", $view);
    // if (count($path) > 1)
    //     $view = "../".$path[0]."/".$path[1];

    if ($view != "home")
        $view = "../" . $view;
    else
        $view = "../";
    if ($data != "")
        $_SESSION[$DataName] = $data;
    header("location:" . $view);
}



////////////////Recive Data From redirect Function////
function receive($name, $save)
{
    /*
    param name => passed data name to redirect function ^
    example => redirect("login",$tmp, "PassedData");
    $catch=receive("PassedData");
    */

    if ($save == false && isset($_SESSION[$name])) {
        $tmp = $_SESSION[$name];
        unset($_SESSION[$name]);
        return $tmp;
    } else {
        $tmp = "";
        if (isset($_SESSION[$name]))
            $tmp = $_SESSION[$name];
        return $tmp;
    }
}


/////////////////// Check Login Status /////
function loggedin()
{
    if (isset($_SESSION["Type"]))
        switch ($_SESSION['Type']) {
            case 'C':
                header("location: ../../profiles/ameeen/");
                //if user type is B then this user profile is in page leader.php
            case 'B':
                header("location: ../../profiles/leaders/");
                //if user type is C then this user profile is in page ameeen.php
            case 'A':
                header("location: ../../profiles/members/");
        }
}


function trans($string)
{

    if (isset($_SESSION['lang']))
        $lang = ($_SESSION['lang']);
    else
        $lang = "ar";
    $data = require_once('../public/lang/' . $lang . '/home.php');



    if (isset($data[$string]))
        return $data[$string];
    else
        return $string;
}

// function set_lang($lang)
// {
//     $lang.="/";
//     // $db = mysqli_connect("localhost",'root','','alquds');
//     //  $sql = "UPDATE user set lang='$lang' where LogINID ='$_SESSION[login_id]'";
//     // $result = mysqli_query($db, $sql) or die("FAILED");

//     $myfile = fopen("lang.txt", "w") or die("Unable to open file!");
//     fwrite($myfile, $lang);
  
   
//     $_SESSION['lang'] = $lang;

//    redirect('home');
// }

// function get_lang(){
//     $myfile = fopen("lang.txt", "r") or die("Unable to open file!");
//     // echo fread($myfile, filesize("lang.txt"));
//     fclose($myfile);
//     $_SESSION['lang'] = $myfile;

// }