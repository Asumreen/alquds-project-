<?php //var_dump($msg);?>
<!DOCTYPE html>
<html>
<head>
  <title>Alquds Scout Group</title>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/body.css">
  <link rel="stylesheet" type="text/css" href="in.css" />
  <link rel="stylesheet" href="../../css/ameeen/table.css">
  <link rel="stylesheet" href="../../css/ameeen/profile.css">
  <link rel="icon" href="../../img/c.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    .pic{
       float: left;
  width: 25%;
  height: 260px;
  margin: 1.66%;
  border-radius: 10px;
    }
  </style>
</head>
<body>
<div class="w3-sidebar w3-bar-block sidebar">
		<center><img src="<?php echo $picture ?>" alt="<?php echo $name ?>"class="w3-circle" style="width: 60%;height: 55%;" ></center>
		<h5 class="w3-bar-item w3-text-blue b"><?php echo $name ?>  </h5>
		<?php echo $sidebar;?>
	</div>

	<img src="../../img/c.png" class="imgg">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="" style="margin-left: 35%; margin-right: 50%; width: 35%; ">
			<div class="" >

				<div class="" style=" margin-right: 100%;">
					<input style="display: none;" type="file" style="" name="file" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected"  multiple />
					<label for="file-1" style="width: 175px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>&hellip; اختيار صورة </span></label>
				</div>
				<input type="submit" name="add" value="save" style="display: inline-block;     background-image: linear-gradient(150deg,#d2d4d4,#f5f5f5,#ffffff);  width:37%;height:17%;" class="w3-button w3-btn ">
			</div>
		</div>
	<div style="margin-right: 17%;">
		<div class='w3-row-padding w3-margin-top'>
    <?php foreach ($activities as $activite):?>
        <div class='w3-third'> 
            <div class='w3-card'>
                <img class='pic' src="<?= '..' . DS . $images_path . $activite?>" style='width:100%''>
                <div class='w3-container' style='margin-top:2%;'>
                    <center><button type='submit' name='del' value='<?=$activite?>' class='w3-button w3-btn 'style='width: 10%; background: white ; ' > <i class='fa fa-trash' ></i> </button></center> 
                </div>
            </div>
        </div>
	<?php endforeach;?>
	    </div>
	</div>
	</form>
	<?php echo $foot;?>
		<?php if(isset($msg)):?>
				 <div id='i' class='w3-modal' style='display:block;'>
                    <div class='w3-modal-content' style='width:30%;'>
                        <div class='w3-container'>
                            <span onclick=document.getElementById('i').style.display='none'; style='color: #990000;' class='w3-button w3-display-topright w3-red'>
                            <?="&times"?>
                            </span>

                         <b><center><p style=' margin-top: 7%;color: #990000;'>
                                <?=$msg?>
                            </p></center></b>
                            <center>
                                <button type='button'class='w3-button w3-btn w3-red' style='border-radius:10%; margin-top:1%; margin-bottom:5%;' class='w3-button'onclick=document.getElementById('i').style.display='none'; > اغلاق </button>
                            </center>
                     </div>
                    </div>
                </div>
      <?php elseif(isset($f)): if($f==1&&$res==1){?>
      	    <div id='i' class='w3-modal' style='display:block;'>
                <div class='w3-modal-content' style='width:30%;'>
                    <div class='w3-container'>
                        <span onclick=document.getElementById('i').style.display='none'; style='color: #990000;' class='w3-button w3-display-topright w3-red'>
                            <?php echo"&times;";?>
                        </span>
                    <b><center><p style=' margin-top: 7%;color: #009900;'>
                            <?php  echo"تم التعديل بنجاح"."<br>"; 
                                echo $newlogin. "=رقم العضو"."<br>";?>
                    </p></center></b>
                    <center>
                     <button type='button'class='w3-button w3-btn w3-red' style='border-radius:10%; margin-top:1%; margin-bottom:5%;' class='w3-button'onclick=document.getElementById('i').style.display='none'; > اغلاق </button>
                </center>";
                </div>
            </div>
        <?php }?>
<?php endif;?>
	<script src="custom-file-input.js"></script>
	</body>
	</html>