<?php
//import standaer file and Config file
include("../standard.php");
include("../php/Config.php");
session_start();
if(!empty($_SESSION['login_id'])){
  $id=$_SESSION['login_id'];
  $sql_qy="SELECT Type FROM user WHERE LogINID=$id";
  $result=mysqli_query($db,$sql_qy);
  $row=mysqli_fetch_array($result);
  $page=$row['Type'];
  
  if($page==='C')
        header("location: ../profiles/ameeen/");
      //if user type is B then this user profile is in page leader.php
      elseif($page==='B')
        header("location: ../profiles/leaders/");
      //if user type is C then this user profile is in page ameeen.php
      elseif($page==='A') 
        header("location: ../profiles/members/");   
      elseif($page==='D')
      $stop=true;
}

//check if user submit the form or viset the page for the first time
if($_SERVER["REQUEST_METHOD"] == "POST") {

  //check if the login id that the user submit it is accesstble to the site standard 
  if(preg_match(Logins,$_POST['number'])){

    // username and password sent from form 
    $myusername = mysqli_real_escape_string($db,$_POST['number']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
    //create a ? password using function 'sha1'
    //all the passwords stored in database must be ? using the same function
    $hashpass=sha1($mypassword);
    
    // search for the user information in the database acording to the login id and cheack the password for this user
    $sql = "SELECT Name,LogINID,Type FROM user WHERE LogINID = '$myusername' and Password = '$hashpass'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    //stor the thpe of user to ues it leater 
    $type=$row['Type'];
    //stor the number of rows returned from the database      
    $count = mysqli_num_rows($result);
      
    // if result matched $myusername and $mypassword, $count must ? 1
    if($count == 1) {
      //stor the user key information in the session 
      $_SESSION['login_user'] = $row['Name'];
      $_SESSION['login_id'] = $row['LogINID'];
      $_SESSION['Type']=$type;
      $name=$row['Name'];
      //if user type is C then this user profile is in page ameeen.php
      if($type==='C')
        header("location: ../profiles/ameeen/");
      //if user type is B then this user profile is in page leader.php
      elseif($type==='B')
        header("location:../profiles/leaders/");
      //if user type is C then this user profile is in page ameeen.php
      elseif($type==='A') 
        header("location:../profiles/members/");   
      elseif($type==='D')
      $stop=true;
    }
    //if $count is not 1 then ther is no user in the database have this login id or the password don't match this user
    else
      $error=LoginE;
    }
    else{
      $error=LoginidE;
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/body.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="../img/c.png">
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

</head>
<body class="w3-image" style="/*background-image:url(../img/img.jpg);background-repeat: no-repeat;">
	<div class="w3-bar w3-large " style=" opacity: .9; background-image: linear-gradient(150deg,#d2d4d4,#f5f5f5,#ffffff); margin-top: 5px;
     border-radius: 10px; border: 1px solid #f5f5f5;">
        <a href="../welc/" class="w3-bar-item w3-button w3-right w3-padding-14 w3-hover-green"><i class="fa fa-home"></i></a>
    <a href="" class="w3-bar-item w3-button w3-right w3-padding-14 w3-hover-green"> تسجيل الدخول  </a>
        <a href="../activities/" class="w3-bar-item w3-button w3-left w3-padding-14 w3-hover-green"> أنشطتنا </a>
        <a href="../contact_us/" class="w3-bar-item w3-button w3-left w3-padding-14 w3-hover-green"> تواصلو معنا </a>
    </div>
  <form action="../php/Controllers/loginController.php" method="POST">
    	<div class=" w3-container w3-mobile"style=" border: 1px solid #f5f5f5;border-radius: 15px;
    	background-image: linear-gradient(150deg,#d2d4d4,#f5f5f5,#ffffff); opacity: 0.9; margin-left: 40%; margin-top: 2%;margin-bottom: 1.5%; margin-right: 40%;">

    		<img src="../img/c.png" class="cw3-image w3-mobile " style="width: 60%;border-radius: 50px;  margin-top: 1%; margin-left: 20%; ">

    		<input required="required" class="w3-input w3-border w3-round-large" id="num" name="number" placeholder="رقم العضو" type="text" style="margin-top: 5%;">

    		<input required="required" class="w3-input w3-border w3-round-large" id="pass" name="password" placeholder=" كلمة السر " type="password" style="margin-top: 6%;">

      <div>
        <input type="checkbox" name="" id="ch" style="margin-top: 7%; float: right;">
        <span   id="h" style="float: right; margin-top: 5%;
        margin-right: 2%;color: #4d4d4d;">
         اظهار كلمة السر   
        </span>
      </div>

      <br><br>

      <a href="#"><p onclick="document.getElementById('forget').style.display='block'" style="float: right ; margin-top: 5%;color: #4d4d4d;">نسيت كلمة السر؟</p></a>
      <br>
      <button  class="w3-button w3-ripple w3-round-large w3-light-grey "type="submit" style="width: 50%; margin-left: 30%; height: 50%; color:white;"> الدخول </button>
      <br>
      
        <p  style="float: right; margin-top: 5%;color: #4d4d4d;">لست عضوا؟</p>
  
      <br>
      <div>
        <a href="Request.php" style="float: right;">
          <p style="float: right; margin-top: 5%;color: #4d4d4d;">
           تقديم طلب انضمام 
         </p>
        </a>
      </div>

    </form>
  </div>
      
    <div id="forget" class="w3-modal">
      <div class='w3-modal-content' style='width:30%;'>
        <div class="w3-container">
          <span onclick="document.getElementById('forget').style.display='none'" 
            class="w3-button w3-display-topright style='color: #990000;'">
            &times;
         </span>
         <center><p style=' margin-top: 7%;color: #990000;'>
          يرجى مراجعة قائد الوحدة او سكرتير المجموعة
        </p></a>
      </center>
      <center>
        <button type='button'class='w3-button w3-btn w3-red' style='border-radius:10%; margin-top:1%; margin-bottom:5%;'
        onclick="document.getElementById('forget').style.display='none'" > اغلاق </button>
      </center>
        </div>
      </div>
    </div>
     <footer class="w3-container w3-text-blue "  style=" background-image: linear-gradient(150deg,#d2d4d4,#f5f5f5,#ffffff); opacity: .9; margin-top: 7%;padding: 1%;">

        <center>
          <span style="">
           Copyright &copy; 2018 - Alquds Scouts Group
          </span>
        </center>
    </footer>

        <?php
         if(isset($error)){
          echo"<div id='i' class='w3-modal' style='display:block;'>";
            echo"<div class='w3-modal-content' style='width:30%;'>";
             echo"<div class='w3-container'>";
              echo"<span onclick=document.getElementById('i').style.display='none'; style='color: #990000;' class='w3-button w3-display-topright w3-red'>";
               echo"&times;";
              echo"</span>";

              echo"<b><center><p style=' margin-top: 7%;color: #990000;'>";
                echo"$error";
              echo"</p></center></b>";
              echo"<center>
                <button type='button'class='w3-button w3-btn w3-red' style='border-radius:10%; margin-top:1%; margin-bottom:5%;' class='w3-button'onclick=document.getElementById('i').style.display='none'; > اغلاق </button>
                </center>";
              echo"</div>";
            echo"</div>";
          echo"</div>";}
          if(isset($stop)){
            echo"<div id='i' class='w3-modal' style='display:block;'>";
              echo"<div class='w3-modal-content' style='width:30%;'>";
               echo"<div class='w3-container'>";
                echo"<span onclick=document.getElementById('i').style.display='none'; style='color: #990000;' class='w3-button w3-display-topright w3-red'>";
                 echo"&times;";
                echo"</span>";
  
                echo"<br/><b><center><p style=' margin-top: 7%;color: #990000;'>";
                  echo"$name<br/> لقد تم إيقاف حسابك من قبل قادة المجموعة الرجاء مراجعة قائد وحدتك لأعادة تفعيل الحساب";
                echo"</p></center></b>";
                echo"<center>
                  <button type='button'class='w3-button w3-btn w3-red' style='border-radius:10%; margin-top:1%; margin-bottom:5%;' class='w3-button'onclick=document.getElementById('i').style.display='none'; > اغلاق </button>
                  </center>";
                echo"</div>";
              echo"</div>";
            echo"</div>";}?>
  <script type="text/javascript" src="../../jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/login.js"></script>
  
</body>
</html>