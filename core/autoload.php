<?php 
namespace alquds\core;
class autoload{

    public static function autoLoadingclass($class){
        
        $classname = str_replace("alquds", "", $class);
        $classname = strtolower($classname);
        $path = realpath(dirname(dirname(__FILE__))) . $classname  . ".php";
        $path = str_replace("/", DS , $path);
        $path = str_replace("\\", DS , $path);
        if(file_exists($path)){
            require_once($path);
        }else{
            return;
        }
    }
}
spl_autoload_register(__NAMESPACE__ . DS . "autoload::autoLoadingclass")
?>