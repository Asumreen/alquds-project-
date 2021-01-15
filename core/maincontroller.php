<?php
    namespace alquds\core;
    class mainController{

        private $controller;
        private $action;
        private $params = array();

        public function __construct()
        {   
            $this->controller = "";
            $this->action="";
            $this->_parseurl();
        }
        private function _parseurl(){

            $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
            $path = strtolower($path);
            $path_parts = explode("/", $path, 3);
            if(isset($path_parts[0]) && trim($path_parts[0], "/") != ""){
                $this->controller = $path_parts[0];
            }
            if(isset($path_parts[1]) && trim($path_parts[1], "/") != ""){
                $this->action = $path_parts[1];
            }
            if(isset($path_parts[2]) && trim($path_parts[2], "/") != ""){
                $this->params = explode("/", $path_parts[2], 2);
            }
            /*  ControllerName/ActionName/Param1/Param2/...  */
            
        }

    
        public function implement(){

            $_class = "alquds\controllers\\";
            $_class .= ucfirst($this->controller) . "Controller";
            if(!class_exists($_class)){
                $_class = "alquds\controllers\\" . "notFoundController";
                $this->controller = "notfound";
            }
            $_controller_class = new $_class;
            $_action = $this->action . "Action";
            if(!method_exists($_controller_class, $_action)){
                $this->action = "default";
                $_action = "defaultAction";
            }
            $_controller_class->set_CON_ACT_PAR($this->controller, $this->action, $this->params);
            $_controller_class->$_action();
            
           
        }

    }