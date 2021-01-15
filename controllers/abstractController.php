<?php 
namespace alquds\controllers;
class abstractController{

    private $controller;
    private $action;
    private $params;
    protected $_data = array();

    public function set_CON_ACT_PAR($_controller, $_action, $_params){
        
        $this->controller = $_controller;
        $this->action = $_action;
        $this->params = $_params;

    }

    protected function view(){
        if($this->controller !== null){
            $viewFile = strtolower($this->action) . ".view.php";
            $controllerDir = strtolower($this->controller);
            $viewPath = "views" . DS . $controllerDir . DS . $viewFile;
            if(file_exists($viewPath)){
                extract($this->_data);
                //var_dump($this->_data['msg']);
                require_once($viewPath);
            }else{
                echo "no found page";
            }
        }
    }
}


?>