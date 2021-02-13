<?php
require_once("../../standard.php");
require_once("../lib/functions.php");


require_once("../Config/DBServ.php");
session_start();

class User
{
  private $db,  $NID,  $barth, $name, $phone, $add, $unit, $hobbies,
    $rel, $sjob, $sname, $sphone, $sadd, $today;


  function __construct()
  {
    $this->today = date("Y-m-d");
    $a = func_get_args();
    $i = func_num_args();
    if (method_exists($this, $f = '__construct' . $i)) {
      call_user_func_array(array($this, $f), $a);
    }
  }
  function __construct1($data)
  {
    $tmp = "";
    foreach ($data as $index => $val) {
      $tmp = "$index";
      $this->$tmp = $val;
    }
  }

  public function login($myusername = "", $mypassword = "")
  {
    global $db;
    // if($loginid!=""){
    //     $sql_qy="SELECT Type FROM user WHERE LogINID=$loginid";
    //     $result=mysqli_query($db,$sql_qy);
    //     $row=mysqli_fetch_array($result);
    //     $page=$row['Type'];

    //     if($page==='C')
    //           header("location: ../../profiles/ameeen/");
    //         //if user type is B then this user profile is in page leader.php
    //         elseif($page==='B')
    //           header("location: ../../profiles/leaders/");
    //         //if user type is C then this user profile is in page ameeen.php
    //         elseif($page==='A') 
    //           header("location: ../../profiles/members/");   
    //         elseif($page==='D')
    //         $stop=true;
    //   }
    //   else
    //check if the login id that the user submit it is accesstble to the site standard 
    if (preg_match(Logins, $myusername)) {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db, $myusername);
      $mypassword = mysqli_real_escape_string($db, $mypassword);
      //create a ? password using function 'sha1'
      //all the passwords stored in database must be ? using the same function
      $hashpass = sha1($mypassword);
      // search for the user information in the database acording to the login id and cheack the password for this user
      $sql = "SELECT Name,LogINID,Type FROM user WHERE LogINID = '$myusername' and Password = '$hashpass'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_assoc($result);
      //stor the thpe of user to ues it leater 
      //stor the number of rows returned from the database      
      $count = mysqli_num_rows($result);
      // if result matched $myusername and $mypassword, $count must ? 1
      if ($count == 1) {
        $type = $row['Type'];
        //stor the user key information in the session 
        $_SESSION['login_user'] = $row['Name'];
        $_SESSION['login_id'] = $row['LogINID'];
        $_SESSION['Type'] = $type;
        //if user type is C then this user profile is in page ameeen.php
        if ($type === 'C') {
          header("location: ../../profiles/ameeen/");
        }
        //if user type is B then this user profile is in page leader.php
        elseif ($type === 'B')
          header("location:../../profiles/leaders/");
        //if user type is C then this user profile is in page ameeen.php
        elseif ($type === 'A')
          header("location:../../profiles/members/");
        elseif ($type === 'D')
          $stop = true;
      }
      //if $count is not 1 then ther is no user in the database have this login id or the password don't match this user
      else {

        redirect("login", LoginE, "login_error");
      }
    } else {
       redirect("login", LoginidE, "login_error");

    }
  }


  public function registration($post)
  {
    global $db;
    $sql = "SELECT name FROM request WHERE nationalID='$this->NID'";
    $res = mysqli_query($db, $sql);
    if (mysqli_num_rows($res) > 0) {
      $_SESSION['form_inputs'] = $post;
      $_SESSION['error'] = "لقد تم تقديم طلب بأستخدام الرقم الوطني المدخل مسبقاً";
      redirect("registration", $post, "form_inputs");
    } else {

      $sql = "INSERT INTO request (name,barthdate,date,address,phone,super,reletev,Sphone,Saddress,Sjob,Notes,nationalID)
			VALUES('$this->name','$this->barth','$this->today','$this->add','$this->phone','$this->sname','$this->rel','$this->sphone','$this->sadd','$this->sjob','$this->hobbies','$this->NID')";
      $res = mysqli_query($db, $sql);
      if ($res) {
        if (isset($_SESSION['form_inputs']))
          unset($_SESSION['form_inputs']);
      }
      redirect("registration", 1, "res");
    }
  }
}
