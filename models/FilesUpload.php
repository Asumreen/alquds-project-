<?php

namespace alquds\Models;

class FilesUpload{


    private array $file;
    const MAX_SIZE_OF_IMG = 10000000;
    const IMAGES_ACTIVITIES_PATH = "uploads" . DS;

    public function __construct(array $File)
    {
            $this->file = $File;
            $filename = -1;
    }

    public function get_file_name(){
        if(isset($this->file['name']))
            return $this->file['name'];
        else
            die("is not file or not single file");
    }

    public  function Upload_Activite_Image_(){
       // global $db ;
        $msg = -1;
        if(isset($this->file['error']) && $this->file['error'] != 4):

            $Directoryname = self::IMAGES_ACTIVITIES_PATH;
            $tmp_name = $this->file['tmp_name'];
            $Imagename  = $this->file['name'];

            $Imagetype = explode(".", $Imagename); 
            $Imagetype = end($Imagetype);
            $Imagetype = strtolower($Imagetype);

            $Imagesize = $this->file['size'];

            $Imagename = rand(0, 10000000000) . rand(0, 10000000000) . "." . $Imagetype;
            $Full_path = $Directoryname . $Imagename;
                // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg', 'webp', 'tiff', 'psd'); // From https://blog.filestack.com/thoughts-and-knowledge/complete-image-file-extension-list/
            // check type of image 
            if(!in_array($Imagetype, $allowTypes)){
                $msg = '<br/>الأنواع من الصور مسموح بها jpg, jpeg & png فقط هذا';
            }else if($Imagesize > self::MAX_SIZE_OF_IMG){ // check size of image
                $msg = "<br/>10 MB يجب ان يكون حجم الصوره اقل من ";
            }


            if($msg == -1):

                if(move_uploaded_file($tmp_name, $Full_path)): // Upload To Server
                    $this->file['name'] = $Imagename;
                    return 1; 
                else:
                    $msg = "لم يتم التحميل بنجاح الرجاء إعادة المجاولة";
                endif; // check if file upload to server or not

            endif;
     
        else:
            $msg = 'يجب اختيار ملف';  
        endif; // check not Empty file

        return $msg;
    
    }
}

       

?>