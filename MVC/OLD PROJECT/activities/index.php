<?php
include("../php/Config.php");
$sql="SELECT name from image";
$result=mysqli_query($db,$sql);
$data=array();
while ($row=mysqli_fetch_array($result))
$data[]=$row['name'];
$data=array_reverse($data)
?>
<!DOCTYPE html>
<html>
<head>
	<title>Alquds Scout Group</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/body.css">
<link rel="icon" href="../img/c.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css"> img{
  float: left;
  width: 30%;
  height: 260px;
  margin: 1.66%;
  border-radius: 10px;
}	
</style>
</head>
<body class="w3-image" style="">
	<div class="w3-bar w3-large " style=" opacity: .9; background-image: linear-gradient(150deg,#d2d4d4,#f5f5f5,#ffffff); margin-top: 5px;
	 border-radius: 10px; border: 1px solid #f5f5f5; ">
		<a href="../welc/" class="w3-bar-item w3-button w3-right w3-padding-14 w3-hover-green"><i class="fa fa-home"></i></a>
    	<a href="../php/Views/login.php" class="w3-bar-item w3-button w3-right w3-padding-14 w3-hover-green"> تسجيل الدخول  </a>
  		<a href="" class="w3-bar-item w3-button w3-left w3-padding-14 w3-hover-green"> أنشطتنا </a>
  		<a href="../contact_us/" class="w3-bar-item w3-button w3-left w3-padding-14 w3-hover-green"> تواصلو معنا </a>
	</div>
	<div class="w3-container">
	<?php
	$i=0;
	 foreach ($data as $key => $value){
	 	echo" <img  src='../uploads/$value'>";
	 }
	?>
	</div>


	  <footer class="w3-container w3-text-blue "  style=" background-image: linear-gradient(150deg,#d2d4d4,#f5f5f5,#ffffff); opacity: .9; margin-top: 10%;padding: 1%;">
        <center><span style=""> Copyright &copy; 2018 - Alquds Scouts Group</span></center>
</footer>
</body>
</html>
