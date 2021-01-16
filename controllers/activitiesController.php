<?php 

namespace alquds\controllers;

use alquds\Models\ActivitiesModel;
use alquds\Models\FilesUpload;

class ActivitiesController extends abstractController{


    public function defaultAction(){
        $this->_data['activities'] = ActivitiesModel::get_all_activities();
        $this->_data['images_path'] = FilesUpload::IMAGES_ACTIVITIES_PATH;
        $this->view();
    }

    public function editAction(){

        global $sidebar,$foot,$db;
        $this->_data['sidebar'] = $sidebar;
        $this->_data['foot'] = $foot;
        $user=$_SESSION['login_id'];
        $sql="select ID from user where LogINID=$user";
        $result=mysqli_query($db,$sql);
        $row=mysqli_fetch_assoc($result);
        $ID=$row["ID"];
        $sql = "select * from user where ID ='$ID'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_assoc($result);
        $picture=$row['Picture'];

        $name=$row['Name'];
        if (empty($picture)) $picture = "img/profile.jpg";
        else $picture = "../profiles/pic/". $picture;
        $this->_data['picture'] = $picture;
        $this->_data['name'] = $name;

        if(isset($_SESSION['MASSEGE'])){

            $this->_data['msg'] = $_SESSION['MASSEGE'];
            unset($_SESSION['MASSEGE']);

        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            switch(true){

                case array_key_exists("add",$_POST):
                    $result = ActivitiesModel::add_activity($_FILES["file"]);
                    if($result !== -1) $this->_data['msg'] = $result; 
                break;

                case array_key_exists("del",$_POST):
                    $result = ActivitiesModel::remove_activity($_POST["del"]);
                    if($result !== -1) $this->_data['msg'] = $result;
                break;
            }
            $_SESSION['MASSEGE'] = $this->_data['msg'];
            unset($_POST);
            header("location:" . "/activities/edit");

        }


        $this->_data['activities'] = ActivitiesModel::get_all_activities();
        $this->_data['images_path'] = FilesUpload::IMAGES_ACTIVITIES_PATH;
        $this->view();
    }

}

?>