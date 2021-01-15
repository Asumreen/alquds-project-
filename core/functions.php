<?php

namespace alquds\core;

trait functions{

    public function Redirect($path){
        header("location:" . $path);
        die();
    }
}





?>