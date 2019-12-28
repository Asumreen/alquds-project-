<?php
include("../php/session.php");
include("../standard.php");
$user=$_SESSION['login_id'];
unset($_SESSION['Dunit']);
$sql="select ID from user where LogINID=$user";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result);
$ID=$row["ID"];
$sql = "select * from user where ID ='$ID'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);

$picture=$row['Picture'];
$unit=$row['Unit'];
$name=$row['Name'];
$add=$row['Address'];
$super=$row['Super'];
$join=$row['JoinDate'];
$barth=$row['BarthDate'];
$relatev=$row['Relatev'];
$phone=$row['Phone'];
$email=$row['Email'];

if (empty($picture)) $picture = "../img/profile.jpg";

?>
<!DOCTYPE html>
<html>
<head>
<title>Alquds Scout Group</title>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/body.css">
	<link rel="stylesheet" type="text/css" href="in.css" />
	<link rel="stylesheet" href="../css/ameeen/table.css">
	<link rel="stylesheet" href="../css/ameeen/profile.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	
	<div class="w3-sidebar w3-bar-block sidebar">
		<center><img src="<?php echo $picture ?>" alt="<?php echo $name ?>"class="w3-circle" style="width: 60%;height: 55%;" ></center>
		<h5 class="w3-bar-item w3-text-blue b"><?php echo $name ?>  </h5>
		<a href="ameeen.php" class="w3-bar-item w3-button w3-text-blue b w3-right-align"> المعلومات الشخصية  </a>
		<a href="" class="w3-bar-item w3-button w3-text-blue b w3-right-align" >  التقارير </a>
		<div class="w3-dropdown-hover" style="/*overflow: hidden;">
			<a  class=" w3-button w3-text-blue b w3-right-align"> <i class="fa fa-caret-down"></i> الأفراد  </a>
			<div class="w3-dropdown-content w3-bar-block">
			  <a href="show.php" class="w3-bar-item w3-button w3-text-blue e w3-right-align">عرض الافراد</a>
		      <a href="add.php" class="w3-bar-item w3-button w3-text-blue e w3-right-align"> اضافة فرد </a>
		      <a href="delete.php" class="w3-bar-item w3-button w3-text-blue e w3-right-align">
		      	حذف فرد
		      </a>
		      <a href="update.php" class="w3-bar-item w3-button  w3-text-blue e w3-right-align"> تعديل فرد</a>
	   		</div>
		</div>
		<a href="../../activities/add" class="w3-bar-item w3-button w3-text-blue b w3-right-align"> النشاطات </a>
		<a href=""class="w3-bar-item w3-button w3-text-blue b w3-right-align">  المتجر الكشفي </a> 
		<a href="../../php/logout.php" class="w3-bar-item w3-button w3-text-blue b w3-right-align">الخروج </a>
	</div>

	<img src="../img/c.png" class="imgg">



	<img src="../c.png" style="width: 10%; border-radius: 10%; margin-left: 38%;">
	<form action="delete1.php" method="post">
		<div class="" style="margin-left: 35%; margin-right: 50%; width: 35%; ">
			<div class="" >

				<div class="" style="">
					<input style="display: none;" type="file" style="" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected"  multiple />
					<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>&hellip; اختيار صورة </span></label>
									<input type="submit" name="add" value="save" style="display: inline-block;     background-image: linear-gradient(150deg,#d2d4d4,#f5f5f5,#ffffff);  width:36%;height:17%;" class="w3-button w3-btn ">
				</div>
			</div>
		</div>

		<script src="custom-file-input.js"></script>

	</form>
	
	</body>
	</html>