<?php

namespace alquds\Models;

class ActivitiesModel{


    public static function get_all_activities(){
        global $db;
        $sql="SELECT name from image ORDER BY ID DESC";
        $result=mysqli_query($db, $sql);
        $activities = array(); 
        while ($row=mysqli_fetch_array($result))
        $activities[]=$row['name'];
        //$activities=array_reverse($activities);
        return $activities;
    }


    public  static function add_activity($activite){
        global $db;
        // File upload path
        $upload = new FilesUpload($activite);
        $msg = $upload->Upload_Activite_Image_(); // Upload Image To Server 
        if($msg === 1){
            $Imagename = $upload->get_file_name();
             // Insert image file name into database
             $sql="INSERT into image (name) VALUES('$Imagename')";
             $stmt=mysqli_query($db,$sql);
             if($stmt)
                 $msg = "تم أضافة الصورة بنجاح";
             else
                 $msg = "لم يتم التحميل بنجاح الرجاء إعادة المجاولة";  
        }   
        return $msg;  
    }



    public static function remove_activity($name){
        global $db;
        $Full_path = FilesUpload::IMAGES_ACTIVITIES_PATH . $name;
        $sql="DELETE FROM image WHERE name='$name'";
        $result=mysqli_query($db,$sql);
        if($result):
            if(file_exists($Full_path))
                unlink($Full_path);
            return "تم حذف الصورة بنجاح";
        else:
            return -1;
        endif;
    }

          
}


?>